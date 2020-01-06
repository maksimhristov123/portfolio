<!Doctype html>
<html lang="bg">
<?php 
    session_start();

                    require_once "config.php";

                    $client=$linkTo=$year=$type=$description=$fileDestination=$fileNameNew=$file="";
                    $client_err=$linkTo_err=$year_err=$type_err=$description_err="";

                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        //validate data from form
                        //validate client
                        $client_input = trim($_POST["client"]);
                        if(empty($client_input)){
                            $client_err = "Моля въведете име на клиент!";
                        }else{
                            $client =$client_input;
                        }

                        //validate link
                        $linkTo_input = trim($_POST["link_to"]);
                        if(empty($linkTo_input)){
                            $linkTo_err = "Моля въведете линк!";
                        }else{
                            $linkTo=$linkTo_input;
                        }

                        //validate year
                        $year_input = trim($_POST["year"]);
                        if(empty($year_input)){
                            $year_err = "Моля въведете година!";
                        }else{
                            $year = $year_input;
                        }

                        //select
                        $type=$_POST["type"];

                        //validate description
                        $desc_input = trim($_POST["description"]);
                        if(empty($desc_input)){
                            $description_err = "Моля въведете описание за сайта!";
                        }else{
                            $description = $desc_input;
                        }

                        //UPLOAD FILES
                        $directory = '../uploads/'.basename($_FILES['user_img']['name']);
                        $file_name = $_FILES['user_img']['name'];
                        
                        if(move_uploaded_file($_FILES["user_img"]["tmp_name"],$directory)){
                            
                        mysqli_set_charset($db,"utf8");
                        $client = mysqli_real_escape_string($db, $client);
                        $linkTo = mysqli_real_escape_string($db, $linkTo);
                        $year = mysqli_real_escape_string($db, $year);
                        $description= mysqli_real_escape_string($db, $description);
                        $type = mysqli_real_escape_string($db, $type);
                        
                        //Check errors before insert to db

                        if(empty($client_err) && empty($linkTo_err) && empty($year_err) && empty($description_err)){
                            //Prepare insert statement
                            $sql = "INSERT INTO projects (client_name, desc_proj, link_site, year_dep, type_site, name_img, dir_img) VALUES ('$client','$description','$linkTo','$year', '$type', '$file_name', '$directory')";

                            if(mysqli_query($db, $sql)){
                                header("Location: projects.php");
                                exit();
                            }
                        }
                    }
                        mysqli_close($db);
                    }

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

<body  class="admin_welcomePage">

<div>
    <div class="admin_menu fixed-top">
            <div class="container admin_menu_content">
                <a class="navbar-brand" href="../welcome.php" id="brand"><img src="../admin_images/me-logo.png" alt="Maksim Hristov's Portfolio Logo" width="100"></a>
                <p class="welcome my-auto pr-4">Welcome, <?php echo $_SESSION['name']; ?> </p>
            </div>
        </div>
</div>
<section>
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
                    <h2>Create</h2>
                </div>

                <section class="container mt-5">
                    <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="client">Клиент:</label>
                        <input type="text" class="form-control" name="client" id="client" placeholder="Въведете име на клиент" require>
                        <span class="help-block"><?php echo $client_err;?></span>
                    </div>
                    <div class="form-group">
                        <label for="link_to">Линк:</label>
                        <input type="text" class="form-control" name="link_to" id="link_to" placeholder="Въведете линк към сайта" require>
                        <span class="help-block"><?php echo $linkTo_err;?></span>
                    </div>
                    <div class="form-group">
                        <label for="year">Година:</label>
                        <input type="number" class="form-control" name="year" id="year" placeholder="Въведете година на пускане на сайта" require>
                        <span class="help-block"><?php echo $year_err;?></span>
                    </div>
                    <div class="form-group">
                        <label for="type">Тип/сайт</label>
                        <select class="form-control" name="type" id="type">
                            <option>Избери тип на сайт</option>
                            <option value="Корпоративен (над 15 служители)">Корпоративен (над 15 служители)</option>
                            <option value="Малка фирма (от 1 до 15 служители)">Малка фирма (от 1 до 15 служители)</option>
                            <option value="Личен (Портфолио)">Личен (Портфолио)</option>
                            <option value="Ресторант/ Кафе">Ресторант/ Кафе</option>
                            <option value="Друго">Друго</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Описание:</label>
                        <textarea class="form-control" name="description" id="description" rows="3" require></textarea>
                        <span class="help-block"><?php echo $description_err;?></span>
                    </div>
                    <div class="form-group">
                        <label for="img_upl">Качи снимка на проект:</label>
                        <input type="file" class="form-control-file" name="user_img" id="img_upl">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    </form>
                </section>
                </div>
    </div>
</section>
<footer class="w-100 p-2">
        <span>&copy; <?php echo date("Y"); ?> Maxim Hristov </span>
</footer>


