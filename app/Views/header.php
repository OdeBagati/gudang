<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/datatables.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/styles.css" />
    <title>Morato Bali</title>
</head>
<body>

    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="<?= base_url(); ?>/assets/img/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                Bootstrap
            </a>
            <div class="collapse navbar-collapse justify-content-end text-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item me-2">
                        <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>">Process</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link active" href="<?= base_url(); ?>/family">Family</a>
                    </li>
                    <li class="nav-item me-2 dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Produk
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= base_url(); ?>/produk">Produk</a></li>
                            <li><a class="dropdown-item" href="<?= base_url(); ?>/detail-produk">Detail Produk</a></li>
                        </ul>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link active" href="<?= base_url(); ?>/warna">Warna</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link active" href="<?= base_url(); ?>/client">Client</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>