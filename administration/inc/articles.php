<!Doctype html>
<html lang="bg">
<?php 
    session_start();
?>

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--  Global css -->
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="shortcut icon" href="favicon.ico" />

    <!-- Fontawesome -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display|Roboto&display=swap" rel="stylesheet">
    <!-- Bootstrap css -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <!-- Bootstrap js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Custom js -->
    <script src="js/script.js" type="text/javascript"></script>

    <title>Здравей, <?php echo $_SESSION['full_name']; ?>!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg admin_menu d-flex justify-content-between w-100 shadow-lg">
        <a class="navbar-brand" href="../welcome.php" id="brand"><img src="../admin_images/me-logo.png" class="img-fluid my-2" alt="Maksim Hristov's Portfolio Logo" width="100"></a>
        
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
                            <a class="nav-item nav-link" href="#"><i class="fas fa-door-open"></i>Logout</a>
                            </div>
                        </div>
                    </nav>

                    <ul>
                        <li><a href="../welcome.php"><i class="fas fa-chart-pie"></i>Dashboard</a></li>
                        <li><a href="inc/projects.php"><i class="fas fa-project-diagram"></i>Projects</a></li>
                        <li><a href="#"><i class="fas fa-cube"></i>Blog</a></li>
                    </ul>
                </div>
                <div class="col-10 content_welcomePage p-5">
                    <div class="admin_btn_group w-100 text-center my-5">
                        <a href="create_article.php">Добавяне</a>
                    </div>


                <div class="page_heading">
                    <h2>All articles</h2>
                </div>
                <?php

                require_once "config.php";
                $sql3 = "SELECT * FROM articles";
                mysqli_set_charset($db,"utf8");
                $result3 = mysqli_query($db,$sql3);
                $count3 = mysqli_num_rows($result3);

                if($count3>0){
                    echo "<table class='table'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th scope='col'>#</th>";
                    echo "<th scope='col'>Заглавие</th>";
                    echo "<th scope='col'>Статия</th>";
                    echo "<th scope='col'>Категория</th>";
                    echo "<th scope='col'>Дата</th>";
                    echo "<th scope='col'>Име/Снимка</th>";
                    echo "<th scope='col'>Редакция</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while($row = mysqli_fetch_array($result3)){
                        echo "<tr>";
                        echo "<td>".$row['article_id']."</td>";
                        echo "<td>".$row['article_title']."</td>";
                        echo "<td class='d-inline-block text-truncate' style='max-width:200px;'>".$row['article_text']."</td>";
                        echo "<td>".$row['article_category']."</td>";
                        echo "<td>".$row['onDate']."</td>";
                        echo "<td class='d-inline-block text-truncate' style='max-width:200px;'>".$row['art_cover_name']."</td>";
                        echo "<td>";
                        echo "<div class='settings_group'>
                                <a class='btn btn-info' href='read.php?id=".$row['project_id']."'>READ</a> 
                                <a class='btn btn-primary' href='edit.php?id=".$row['project_id']."'>EDIT</a> 
                                <a class='btn btn-danger' href='delete.php?id=".$row['project_id']."'>DELETE</a>
                                <a class='btn btn-danger' href='favourite.php?id=".$row['project_id']."'><i class='far fa-star'></i></a>

                            </div>";
                        echo "</td>";
                        echo "</tr>";
                    }
                
                    echo "</tbody>";
                    echo "</table>";
                }
                mysqli_close($db);
                ?>
            </div>
    </div>
</section>
<footer class="w-100 p-2 fixed-bottom">
        <span>&copy; <?php echo date("Y"); ?> Maxim Hristov </span>
</footer>

