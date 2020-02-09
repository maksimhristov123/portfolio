
<?php 
require_once "config.php";
$client=$linkTo=$year=$type=$description=$fileDestination=$fileNameNew=$file="";
$client_err=$linkTo_err=$year_err=$type_err=$description_err="";
if(isset($_POST['submit'])){
    //validate data from form
    //validate client
    $client_input = trim($_POST["client"]);
    if(empty($client_input)){
        $client_err .= "Моля въведете име на клиент!";
    }elseif(strlen($client_input)>20){
        $client_err .= "Моля въведете име на клиент по-малко от 30 символа!";
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
    if($year_input<1990 || $year_input>2060){
        $year_err = "Моля въведете коректна година! Между 1990 и 2060.";
    }else{
        if(empty($year_input)){
            $year_err = "Моля въведете година!";
        }else{
            $year = $year_input;
        }
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
    $file_name = basename($_FILES['user_img']['name']);
    $directory = '../uploads/'.$file_name;
     
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
            $sql = "INSERT INTO `projects` (client_name, desc_proj, link_site, year_dep, type_site, name_img, dir_img) VALUES ('$client','$description','$linkTo','$year', '$type', '$file_name', '$directory')";
            if(mysqli_query($db, $sql)){
                header("Location: ?page=projects");
                exit();
            }
        }
    }
 }
 mysqli_close($db);
?>         
                
<div class="container p-5">
    <div class="page_heading">
        <h2>Създай клиент</h2>
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
        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
        </form>
    </section>
</div>
              
      

