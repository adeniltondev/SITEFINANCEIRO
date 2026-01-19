<?php
require_once __DIR__ . '/../src/bootstrap.php';
require_once __DIR__ . '/../src/User.php';
require_once __DIR__ . '/../src/Transaction.php';

if (!User::isLogged()) {
    header('Location: login.php');
    exit;
}

$userId = $_SESSION['user_id'];
$year = $_GET['year'] ?? date('Y');
$month = $_GET['month'] ?? date('m');


$pdo = Database::getConnection();

// Exportação Excel
if (isset($_GET['export']) && $_GET['export'] === 'excel') {
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="relatorio_'. $month .'_'. $year .'.xls"');
    echo "<table border='1'><tr><th>Data</th><th>Categoria</th><th>Descrição</th><th>Tipo</th><th>Valor</th></tr>";
    foreach ($transacoes as $t) {
        echo "<tr><td>".htmlspecialchars($t['date'])."</td><td>".htmlspecialchars($t['category'])."</td><td>".htmlspecialchars($t['description'])."</td><td>".($t['type']==='receita'?'Receita':'Despesa')."</td><td>R$ ".number_format($t['value'],2,',','.')."</td></tr>";
    }
    echo "</table>";
    exit;
}

// Exportação PDF (simples, HTML para impressão)
if (isset($_GET['export']) && $_GET['export'] === 'pdf') {
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="relatorio_'. $month .'_'. $year .'.pdf"');
    echo '<h2>Relatório Financeiro</h2>';
    echo '<table border="1"><tr><th>Data</th><th>Categoria</th><th>Descrição</th><th>Tipo</th><th>Valor</th></tr>';
    foreach ($transacoes as $t) {
        echo "<tr><td>".htmlspecialchars($t['date'])."</td><td>".htmlspecialchars($t['category'])."</td><td>".htmlspecialchars($t['description'])."</td><td>".($t['type']==='receita'?'Receita':'Despesa')."</td><td>R$ ".number_format($t['value'],2,',','.')."</td></tr>";
    }
    echo "</table>";
    exit;
}

// Resumo mensal
$stmt = $pdo->prepare('SELECT type, SUM(value) as total FROM transactions WHERE user_id=? AND YEAR(date)=? AND MONTH(date)=? GROUP BY type');
$stmt->execute([$userId, $year, $month]);
$resumo = ['receita'=>0, 'despesa'=>0];
foreach ($stmt->fetchAll() as $row) {
    $resumo[$row['type']] = $row['total'];
}

// Por categoria
$stmt = $pdo->prepare('SELECT c.name, t.type, SUM(t.value) as total FROM transactions t JOIN categories c ON t.category_id = c.id WHERE t.user_id=? AND YEAR(t.date)=? AND MONTH(t.date)=? GROUP BY c.name, t.type');
$stmt->execute([$userId, $year, $month]);
$porCategoria = $stmt->fetchAll();

// Todas transações do mês
$stmt = $pdo->prepare('SELECT t.*, c.name as category FROM transactions t JOIN categories c ON t.category_id = c.id WHERE t.user_id=? AND YEAR(t.date)=? AND MONTH(t.date)=? ORDER BY t.date DESC');
$stmt->execute([$userId, $year, $month]);
$transacoes = $stmt->fetchAll();

include __DIR__ . '/../templates/report.php';
