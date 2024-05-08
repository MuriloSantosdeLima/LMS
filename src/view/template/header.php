<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>

    <style>
        .exclude-icon {
            padding: 10px 15px;
            color: #fff;
            border: none;
            cursor: pointer;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/></svg>');
            background-repeat: no-repeat;
            background-position: center;
        }
        .search-icon {
            padding: 10px 15px;
            color: #fff;
            border: none;
            cursor: pointer;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/></svg>');
            background-repeat: no-repeat;
            background-position: center;
        }
        .dataTables_wrapper .dataTables_filter {
            display: none;
        }
        .dataTables_length {
            display: none;
        }
        .btn {
            border-radius: 0px !important;
            margin-left: 5px;
        }
        .breadcrumb {
            margin: 40px 0px;
        }
        .nav-item {
            color: #fff !important;
            width: 16%;
        }
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }   
    </style>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/index.js"></script></head>

<body>
    <div class="topheader">
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary" >
            <div class="container-fluid">
                <a class="navbar-brand" href="#">SISTEMA ESCUDO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-flex">
                <div style="width:100%;" class="bg-info rounded-circle">
                    <img src="https://via.placeholder.com/150" alt="Avatar" class="avatar">
                </div>
            </div>
        </nav>
    </div>

    <nav class="navbar navbar-expand-lg bg-light" style="background-color: red !important;">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav flex-grow-1 justify-content-center">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="bi bi-gear-fill"></i> <!-- Ícone de engrenagem -->
                        Administração
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="bi bi-book-fill"></i> <!-- Ícone de livro -->
                        Aprendizagem
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="bi bi-folder-fill"></i> <!-- Ícone de pasta -->
                        Repositório
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="bi bi-file-earmark-text-fill"></i> <!-- Ícone de arquivo -->
                        Relatórios
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="bi bi-person-fill"></i> <!-- Ícone de pessoa -->
                        Tutoria
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="bi bi-gear-fill"></i> <!-- Ícone de engrenagem -->
                        Configurações
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?php
                    $path = parse_url($_SERVER['REQUEST_URI'])['path'];
                    $quebra = explode('/', $path);
                    foreach ($quebra as $value) { ?>
                       <li class="breadcrumb-item"><?=$value?></li>
                <?php }?>
            </ol>
        </nav>
    </div>