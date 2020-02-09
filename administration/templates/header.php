<!Doctype html>
<html lang="bg">
<?php 
    session_start();
?>
<head>
    <?php require_once ('head.php'); ?>
</head>

<body>

    <nav class="navbar navbar-expand-lg admin_menu d-flex justify-content-between w-100 shadow-lg">
        <a class="navbar-brand" href="?page=home" id="brand"><img src="admin_images/me-logo.png" class="img-fluid my-2" alt="Maksim Hristov's Portfolio Logo" width="100"></a>
        
        <span class="navbar-text">
            <p class="welcome my-auto pr-4">Welcome, <?php echo $_SESSION['full_name']; ?> </p>
        </span>
    </nav>

    <section>
        <div class="row">
            <div class="col-2 vertical_menu p-5 shadow-lg">
                <nav class="navbar">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <a href="#"><?php echo $_SESSION['full_name']; ?></a><i class="fas fa-chevron-left"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link" href="#"><i class="fas fa-user"></i>My profile</a>
                            <a class="nav-item nav-link" href="#"><i class="fas fa-user-cog"></i>Settings</a>
                            <a>
                                <form action="inc/logout.php" method="post">
                                    <button type="submit" name="logout" class="bg-transparent border-0"><i class="fas fa-door-open"></i>Logout</button>
                                </form>
                            </a>
                        </div>
                    </div>
                </nav>

                <ul>
                    <li><a href="?page=home"><i class="fas fa-chart-pie"></i></i>Dashboard</a></li>
                    <li><a href="?page=projects"><i class="fas fa-project-diagram"></i>Projects</a></li>
                    <li><a href="?page=articles"><i class="fas fa-cube"></i>Blog</a></li>
                </ul>
            </div>
            <div class="col-10 content_welcomePage">
                
                  