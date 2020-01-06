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

    <title>Здравей, <?php echo $_SESSION['name']; ?>!</title>
</head>

<body>


<section   class="admin_welcomePage">
<div >
    <div class="admin_menu fixed-top">
            <div class="container admin_menu_content">
                <a class="navbar-brand" href="../welcome.php" id="brand"><img src="../admin_images/me-logo.png" alt="Maksim Hristov's Portfolio Logo" width="100"></a>
                <p class="welcome my-auto pr-4">Welcome, <?php echo $_SESSION['name']; ?> </p>
            </div>
        </div>
</div>
        <div class="row">
            <div class="col-2 vertical_menu p-5">
                <ul>
                    <li><a href="#">Профил</a></li>
                    <li><a href="projects.php">Проекти</a></li>
                    <li><a href="#">Блог</a></li>
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
                $sql = "SELECT * FROM projects WHERE project_id=".$id;
                $result = mysqli_query($db,$sql);
                $count = mysqli_num_rows($result);

                if($count != 1){
                    header("Location: projects.php");
                }
                $project = mysqli_fetch_assoc($result);

                $client = $project['client_name'];
                $desc = $project['desc_proj'];
                $link = $project['link_site'];
                $year = $project['year_dep'];
                $type = $project['type_site'];
                $img ="../uploads/".$project['name_img'];
                
                //escaping
                $client = mysqli_real_escape_string($db,$client);
                $desc = mysqli_real_escape_string($db,$desc);
                $link = mysqli_real_escape_string($db,$link);
                $type = mysqli_real_escape_string($db,$type);
                                
                $content_read = "<div class='container p-5 m-5'>
                <div class='row'>
                    <div class='col'>
                        <h2 class='read_heading'>Клиент: ".$client."<h2>
                        <p class='read_descr'>Описание: ".$desc."</p>
                        <p class='read_link'>Линк: ".$link."</p>
                        <p class='read_year'>Година: ".$year."</p>
                        <p class='read_type'>Тип: ".$type."</p>
                    </div>
                    <div class='col'>
                        <img src=".$img." width='80%' height='80%'>     
                    </div>
                    
                    
                    <div class='admin_btn_group w-100 text-center my-5'><a href='projects.php'>Обратно</a></div>
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
