<?php
    ini_set('display_errors', 'On');
    include_once 'inc/config.php';
    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($db, $_POST['email']);
        $pwd = mysqli_real_escape_string($db, $_POST['pass']);

        $query = "SELECT * FROM users WHERE username='$username'";
        $res = $db->query($query);
        $row = $res->fetch_assoc();
        $hashpwd = password_verify($pwd, $row['password']);

        //Check if user exists
        if($res->num_rows == 0) {
            header('Location: inc/error.php');
        }else if($hashpwd != $pwd) { //Check if passwords match
            header('Location: inc/error.php');
        } else { // Login and start session
            session_start();
            $_SESSION['id'] = $row['user_id'];
            $_SESSION['name'] = $row['username'];
            $_SESSION['full_name'] = $row['full_name'];
            header('Location: welcome.php');
            exit();
        }
    }
    mysqli_close($db);
?>

<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--  Global css -->
    <link rel="stylesheet" href="css/admin.css">
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

    <title>Админ</title>
</head>
<body class="admin_loginPage">

    <div class="login">
        <div class="logo">
            <img src="admin_images/me-logo.png" alt="My brand logo" class="img-fluid logo_loginPage p-2">
           
        </div>
        
        <form method="POST" class="form_loginPage">
            <p class="text">Login</p>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" autocomplete="off" require>
            </div>
            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password" class="form-control" name="pass" id="pass" autocomplete="off"  require>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Вход</button>
        </form>
    </div>

    <footer class="w-100 p-2">
        <span>&copy; <?php echo date("Y"); ?> Maxim Hristov </span>
    </footer>

    
</body>
</html>

