<?php
// Template de relatório financeiro mensal
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Financeiro</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="row mb-3">
        <div class="col">
            <a href="index.php" class="btn btn-secondary">Dashboard</a>
            <a href="report.php?export=excel&year=<?= $year ?>&month=<?= $month ?>" class="btn btn-success">Exportar Excel</a>
            <a href="report.php?export=pdf&year=<?= $year ?>&month=<?= $month ?>" class="btn btn-danger">Exportar PDF</a>
        </div>
    </div>
    <h3>Resumo de <?= $month ?>/<?= $year ?></h3>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card bg-success text-white mb-3">
                <div class="card-header">Receitas</div>
                <div class="card-body">
                    <h5 class="card-title">R$ <?= number_format($resumo['receita'], 2, ',', '.') ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-danger text-white mb-3">
                <div class="card-header">Despesas</div>
                <div class="card-body">
                    <h5 class="card-title">R$ <?= number_format($resumo['despesa'], 2, ',', '.') ?></h5>
                </div>
            </div>
        </div>
    </div>
    <h4>Por Categoria</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Tipo</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($porCategoria as $cat): ?>
            <tr>
                <td><?= htmlspecialchars($cat['name']) ?></td>
                <td><?= $cat['type'] === 'receita' ? 'Receita' : 'Despesa' ?></td>
                <td>R$ <?= number_format($cat['total'], 2, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <h4>Transações do mês</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Data</th>
                <th>Categoria</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($transacoes as $t): ?>
            <tr>
                <td><?= htmlspecialchars($t['date']) ?></td>
                <td><?= htmlspecialchars($t['category']) ?></td>
                <td><?= htmlspecialchars($t['description']) ?></td>
                <td><?= $t['type'] === 'receita' ? 'Receita' : 'Despesa' ?></td>
                <td>R$ <?= number_format($t['value'], 2, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>