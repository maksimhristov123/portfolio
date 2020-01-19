<!Doctype html>
<html lang="bg">
<?php 
    session_start();

    if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {

        header ("Location: error.php");
        
        }

                    require_once "config.php";

                    $art_ttl=$art_txt=$art_cat="";
                    $art_ttl_err=$art_txt_err=$art_cat_err="";

                    if(isset($_POST['submit'])){

                        //validate data from form
                        //validate title
                        $title_input = trim($_POST["art_title"]);
                        if(empty($title_input)){
                            $art_ttl_err = "Моля въведете заглавие!";
                        // }elseif(strlen($title_input)>=71){
                        //     $art_ttl_err .= "Моля въведете заглавие до 70 символа(включително разстояние)!";
                        }else{
                            $art_ttl =$title_input;
                        }

                        //validate category of article art_category 
                        $art_category_input = trim($_POST["art_category"]);
                        if(empty($art_category_input)){
                            $art_cat_err = "Моля въведете категория!";
                        }else{
                            $art_cat=$art_category_input;
                        }

                        //validate text of article art_text
                        $art_text_input = trim($_POST["art_text"]);
                        if(empty($art_text_input)){
                            $art_txt_err = "Моля въведете текст!";
                        }else{
                            $art_txt = $art_text_input;
                        }
                        
                        
                        //UPLOAD FILES
                        $art_file_name = basename($_FILES['art_cover']['name']);
                        $art_directory = 'administration/uploads/articles/'.$art_file_name;
                        
                        
                        if(move_uploaded_file($_FILES["art_cover"]["tmp_name"],$art_directory)){
                            
                            mysqli_set_charset($db,"utf8");

                            $art_ttl = mysqli_real_escape_string($db, $art_ttl);
                            $art_txt = mysqli_real_escape_string($db, $art_txt);
                            $art_cat = mysqli_real_escape_string($db, $art_cat);
                            
                            //Check errors before insert to db

                            if(empty($art_ttl_err) && empty($art_txt_err) && empty($art_cat_err)){
                                echo "<p>".$art_ttl."</p><br><p>".$art_cat."</p><p>".$art_txt."</p><p>".$art_file_name."</p><p>".$art_directory."</p>";
                                //Prepare insert statement
                                $sql = "INSERT INTO `articles` (article_title, article_text, article_category, art_cover_name, art_dir_img) VALUES ('$art_ttl', '$art_txt', '$art_cat', '$art_file_name', '$art_directory')";

                                if(mysqli_query($db, $sql)){
                                    header("Location: articles.php");
                                    exit();
                                }
                            }
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
                    <h2>Create article</h2>
                </div>

                <section class="container mt-5">
                    <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="art_title">Заглавие:</label>
                        <input type="text" class="form-control" name="art_title" id="art_title" placeholder="Въведете име на статия" require>
                        <span class="help-block"><?php echo $art_ttl_err;?></span>
                    </div>
                    <div class="form-group">
                        <label for="art_category">Категория:</label>
                        <input type="text" class="form-control" name="art_category" id="art_category" placeholder="Въведете категория" require>
                        <span class="help-block"><?php echo $art_cat_err;?></span>
                    </div>
                    <div class="form-group">
                        <label for="art_text">Текст:</label>
                        <textarea class="form-control" name="art_text" id="art_text" rows="3" require></textarea>
                        <span class="help-block"><?php echo $art_txt_err;?></span>
                    </div>
                    <div class="form-group">
                        <label for="art_cover">Качи снимка за корица:</label>
                        <input type="file" class="form-control-file" name="art_cover" id="art_cover">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                    </form>
                </section>
                </div>
        </div>
    </section>
<footer class="w-100 p-2 fixed-bottom">
        <span>&copy; <?php echo date("Y"); ?> Maxim Hristov </span>
</footer>


 <!-- Tiny plugin for textarea -->
 <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>

</body>
</html>