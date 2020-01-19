<!Doctype html>
<html lang="bg">
<?php 
    session_start();

    if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {

        header ("Location: error.php");
        
    }

    $ttl_err=$categ_err=$txt_err="";
    require_once "config.php";

    $id = $_GET["id"];
                    
    $sql_article = "SELECT * FROM articles WHERE article_id=".$id;
    mysqli_set_charset($db, "utf8");
    $result = mysqli_query($db,$sql_article);
    
    $row=mysqli_fetch_object($result);

    if(isset($_POST['edit_article'])){
        $art_title=mysqli_real_escape_string($db, $_POST['art_title']);
        $art_category=mysqli_real_escape_string($db, $_POST['art_category']);
        $art_text=mysqli_real_escape_string($db, $_POST['art_text']);

        if(empty($art_title)){
            $ttl_err="Моля въведете коректно име!";
        }

        if(empty($art_category)){
            $categ_err="Моля въведете категория!";
        }

        if(empty($art_text)){
            $txt_err="Моля въведете описание!";
        }

        if(empty($ttl_err) && empty($categ_err) && empty($txt_err)){
            mysqli_set_charset($db, "utf8");
            $sql_update = "UPDATE articles SET article_title='$art_title',article_text='$art_text',article_category='$art_category' WHERE article_id=".$id;
            $result_update = mysqli_query($db, $sql_update);
            header("Location: articles.php");
        }
    }
mysqli_close($db);             
?>

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--  Global css -->
    <link rel="stylesheet" href="../css/admin.css">
    <!-- <link rel="shortcut icon" href="favicon.ico" /> -->

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

    <!-- Custom js
    <script src="js/script.js" type="text/javascript"></script> -->

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
                    <h2>EDIT</h2>
                </div>

                <section class="container mt-5">
                    <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="art_title">Заглавие:</label>
                        <input type="text" class="form-control" name="art_title" id="art_title" value="<?php echo $row->article_title; ?>" require>
                        <span class="help-block"><?php echo $ttl_err;?></span>
                    </div>
                    <div class="form-group">
                        <label for="art_category">Категория:</label>
                        <input type="text" class="form-control" name="art_category" id="art_category" value="<?php echo $row->article_category; ?>" require>
                        <span class="help-block"><?php echo $categ_err;?></span>
                    </div>
                    <div class="form-group">
                        <label for="art_text">Текст:</label>
                        <textarea class="form-control" name="art_text" id="art_text" rows="3" placeholder="<?php echo $row->article_text; ?>" require></textarea>
                        <span class="help-block"><?php echo $txt_err;?></span>
                    </div>
                    
                    <input type="submit" name="edit_article" class="btn btn-primary" value="Submit">
                    </form>
                </section>
            </div>
        </div>
</section>
<!-- Tiny plugin for textarea
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script> -->

<footer class="w-100 p-2 fixed-bottom">
        <span>&copy; <?php echo date("Y"); ?> Maxim Hristov </span>
</footer>
