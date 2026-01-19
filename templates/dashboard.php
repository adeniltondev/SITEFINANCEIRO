<?php
// Template do dashboard principal
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Financeiro</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Financeiro</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <span class="navbar-text text-white me-3">Olá, <?= htmlspecialchars($userName) ?></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Sair</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Saldo</div>
                <div class="card-body">
                    <h5 class="card-title">R$ <?= number_format($saldo, 2, ',', '.') ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Receitas</div>
                <div class="card-body">
                    <h5 class="card-title">R$ <?= number_format($receitas, 2, ',', '.') ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Despesas</div>
                <div class="card-body">
                    <h5 class="card-title">R$ <?= number_format($despesas, 2, ',', '.') ?></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <a href="#" class="btn btn-primary">Adicionar Receita</a>
            <a href="#" class="btn btn-danger">Adicionar Despesa</a>
            <a href="#" class="btn btn-secondary">Categorias</a>
            <a href="#" class="btn btn-outline-dark">Relatórios</a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>