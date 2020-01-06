<!Doctype html>
<html lang="bg">

<head>
    <?php require_once ('head.php'); ?>
</head>

<body>

<div class="hero">
    <nav class="navbar navbar-expand-lg fixed-top">
        <a class="navbar-brand" href="index.php" id="brand"><img src="images/me-logo.png" alt="Maksim Hristov's Portfolio Logo" width="100"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="mobile-menu"><?php echo file_get_contents("images/menu.svg"); ?></div>
        </button>

        <div class="collapse navbar-collapse menu" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto ">
            <li class="nav-item">
                <a class="nav-link" id="about" href="?page=about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="what" href="?page=what">What</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="work" href="?page=work">I Work</a>
            </li>
            </ul>
        </div>
        <a class="contacts" href="#">Contact Me</a>
    </nav>

    <div class="hero_content">
        <p class="prof">Hello</p>
        <h1 class="hero_head">Maxim Hristov's Portfolio</h1>
        <p class="slog">Web Developer and Web Designer.</p>
    </div>

</div>

<!-- 
<div class="brown_rect dept_2 rellax"></div>
<div class="brown_rect dept_3 rellax"></div>
<div class="brown_rect dept_4 rellax"></div>
<div class="brown_rect dept_5 rellax"></div>
<div class="brown_rect dept_6 rellax"></div>
<div class="brown_rect dept_7 rellax"></div>
<div class="brown_rect dept_8 rellax"></div>
<div class="brown_rect dept_9 rellax"></div> -->


