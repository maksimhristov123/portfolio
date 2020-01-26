<!Doctype html>
<html lang="bg">

<head>
    <?php require_once ('head.php'); ?>
</head>

<body>

<div class="hero" id="top">
    <nav class="navbar navbar-expand-lg fixed-top">
        <a class="navbar-brand" href="index.php" id="brand"><img src="images/me-logo.png" alt="Maksim Hristov's Portfolio Logo" width="100"></a>
        <button class="navbar-toggler mobile-menu" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse menu" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item pr-md-3">
                    <a class="nav-link" id="about" href="?page=about">За</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" id="what" href="?page=what">Какво</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href=""></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="work" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false">Работя</a>
                    <div class="dropdown-menu bg-transparent border-none">
                        <a class="dropdown-item bg-transparent" href="?page=work">Опитът</a>
                        <a class="dropdown-item bg-transparent" href="?page=blog">Блог</a>
                        <!-- <a class="dropdown-item bg-transparent" href="#">What next?</a> -->
                    </div>
                </li>
            </ul>
        </div>
        <a class="contacts" href="?page=contacts">Контакти</a>
    </nav>

    <div class="hero_content rellax">
        <p class="prof">Здравейте!</p>
        <h1 class="hero_head">Аз съм Максим Христов</h1>
        <p class="slog">Web Developer и Web Designer.</p>
    </div>
</div>