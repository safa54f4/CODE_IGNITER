<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url("css/bootstrap.min.css") ?>" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <style>
        body,
        html {
            font-family: "Nunito", sans-serif;
        }
    </style>
    <title>Akademik - <?= $title ?></title>
</head>

<body>

    <nav class="navbar  navbar-expand-lg navbar-light bg-light shadow-sm">
        <a class="navbar-brand" href="#">Akademik</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= ($title == "Home" ? "active" : "") ?>">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <?php if (!empty($data) && $data != null) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= (($title == "Data Mahasiswa" || $title == "Kartu Rencana Mahasiswa" || $title == "Jadwal Perkuliahan") ? "active" : "") ?>" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mahasiswa
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/mahasiswa">Data Mahasiswa</a>
                            <a class="dropdown-item" href="/mahasiswa/krs">Kartu Rencana Mahasiswa</a>
                            <a class="dropdown-item" href="/mahasiswa/jadwal">Jadwal Perkuliahan</a>
                        </div>
                    </li>
                <?php endif; ?>

            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (!empty($data) && $data != null) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $data->nama ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/auth/logout">Logout</a>
                        </div>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/auth/login">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>