<?php
// Template de listagem de transações
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $type === 'receita' ? 'Receitas' : 'Despesas' ?></title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="row mb-3">
        <div class="col">
            <a href="transaction_form.php?type=<?= $type ?>" class="btn btn-success">Adicionar <?= $type === 'receita' ? 'Receita' : 'Despesa' ?></a>
            <a href="index.php" class="btn btn-secondary">Dashboard</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <?= $type === 'receita' ? 'Receitas' : 'Despesas' ?>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Categoria</th>
                                <th>Descrição</th>
                                <th>Valor</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($transactions as $t): if ($t['type'] !== $type) continue; ?>
                            <tr>
                                <td><?= htmlspecialchars($t['date']) ?></td>
                                <td><?= htmlspecialchars($t['category']) ?></td>
                                <td><?= htmlspecialchars($t['description']) ?></td>
                                <td>R$ <?= number_format($t['value'], 2, ',', '.') ?></td>
                                <td>
                                    <a href="transaction_form.php?type=<?= $type ?>&id=<?= $t['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
                                    <a href="transactions.php?type=<?= $type ?>&delete=<?= $t['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir?')">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>