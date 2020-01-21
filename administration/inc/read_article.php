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
                            <a><form action="logout.php" method="post">
                                    <button type="submit" name="logout" class="bg-transparent border-0"><i class="fas fa-door-open"></i>Logout</button>
                                </form></a>
                            </div>
                        </div>
                    </nav>

                    <ul>
                        <li><a href="../welcome.php"><i class="fas fa-chart-pie"></i>Dashboard</a></li>
                        <li><a href="projects.php"><i class="fas fa-project-diagram"></i>Projects</a></li>
                        <li><a href="articles.php"><i class="fas fa-cube"></i>Blog</a></li>
                    </ul>
                </div>
            <div class=" col-10 content_welcomePage">

            <div class="page_heading">
                <h2>Read</h2>
            </div>


            <?php 
                require_once "config.php";
                $id=$_GET['id'];
                echo "ID is: ".$id;

                mysqli_set_charset($db,"utf8");
                $sql = "SELECT * FROM articles WHERE article_id=".$id;
                $result = mysqli_query($db,$sql);
                $count = mysqli_num_rows($result);

                if($count != 1){
                    header("Location: articles.php");
                }
                $article = mysqli_fetch_assoc($result);

                $title = $article['article_title'];
                $text = $article['article_text'];
                $date = $article['onDate'];
                $category = $article['article_category'];
                $img = $article['art_dir_img'];

                //escaping
                $title = mysqli_real_escape_string($db,$title);
                $text = mysqli_real_escape_string($db,$text);
                $date = mysqli_real_escape_string($db,$date);
                $category = mysqli_real_escape_string($db,$category);
                                           
                $content_read = "<div class='container p-5 m-5'>
                <div class='row'>
                    <div class='col'>
                        <h2 class='read_heading'>Заглавие: ".$title."<h2>
                        <p class='read_descr'>Статия: ".$text."</p>
                        <p class='read_link'>Последна промяна: ".$date."</p>
                        <p class='read_year'>Категория: ".$category."</p>
                    </div>
                    <div class='col'>
                        <img src=".$img." width='80%' height='80%'>     
                    </div>
                    
                    
                    <div class='admin_btn_group w-100 text-center my-5'><a href='articles.php'>Обратно</a></div>
                    </div>
                </div>";

                echo $content_read;
                mysqli_close($db);
            ?>
            </div>
        </div>
</section>
<footer class="w-100 p-2 fixed-bottom">
        <span>&copy; <?php echo date("Y"); ?> Maxim Hristov </span>
</footer>
