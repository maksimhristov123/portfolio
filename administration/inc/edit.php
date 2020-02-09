<?php 
require_once "config.php";
$id = $_GET['id'];
echo "Id project:".$id;
//mysqli_set_charset($db,"utf8");
$sql = "SELECT * FROM projects WHERE project_id=".$id;
$result = mysqli_query($db,$sql);
$count = mysqli_num_rows($result);
if($count != 1){
    header("Location: ?page=projects");
}
$project = mysqli_fetch_assoc($result);
$client = $project['client_name'];
$desc = $project['desc_proj'];
$link = $project['link_site'];
$year = $project['year_dep'];
$type = $project["type_site"];

//UPDATE DATA
$client_update=$desc_update=$link_update=$year_update=$type_update="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //validate data 
    //validate client
    $client_input = trim($_POST['client']);
    if(empty($client_input)){
        $client_update = $client;
    }else{
        $client_update = $client_input;
    }
    //validate link
    $link_input = trim($_POST['link_to']);
    if(empty($link_input)){
        $link_update = $link;
    }else{
        $link_update = $link_input;
    }
    //validate year
    $year_input = trim($_POST['year']);
    if(empty($year_input)){
        $year_update = $year;
    }else{
        $year_update = $year_input;
    }
    //validate type
    $type_input = trim($_POST['type']);
    if(empty($type_input)){
        $type_update = $type;
    }else{
        $type_update = $type_input;
    }
    //validate description
    $desc_input = trim($_POST['description']);
    if(empty($desc_input)){
        $desc_update = $desc;
    }else{
        $desc_update = $desc_input;
    }
    
    //escape
    $client_update = mysqli_real_escape_string($db,$client_update);
    $desc_update = mysqli_real_escape_string($db,$desc_update);
    $link_update = mysqli_real_escape_string($db,$link_update);
    $year_update = mysqli_real_escape_string($db,$year_update);
    $type_update = mysqli_real_escape_string($db,$type_update);
    mysqli_set_charset($db,"utf8");
    $sql = "UPDATE projects SET client_name='$client_update', desc_proj='$desc_update', link_site='$link_update', year_dep='$year_update', type_site='$type_update' WHERE project_id=".$id;

    if(mysqli_query($db, $sql)){
        header("Location: ?page=projects");
        exit();
    } else{
        echo "ERROR UPLOAD";
    }

}
mysqli_close($db);
?>
<div class="page_heading">
    <h2>EDIT</h2>
</div>
<section class="container mt-5">
        <form method="POST">
        <div class="form-group">
            <label for="client">Клиент:</label>
            <input type="text" class="form-control" name="client" id="client" placeholder="<?php echo $client; ?>">
        </div>
        <div class="form-group">
            <label for="link_to">Линк:</label>
            <input type="text" class="form-control" name="link_to" id="link_to" placeholder="<?php echo $link; ?>">
        </div>
        <div class="form-group">
            <label for="year">Година:</label>
            <input type="number" class="form-control" name="year" id="year" placeholder="<?php echo $year; ?>" >
        </div>
        <div class="form-group">
            <label for="type">Тип/сайт</label>
            <select class="form-control" name="type" id="type" require>
                <option>Избери тип на сайт</option>
                <option>Корпоративен (над 15 служители)</option>
                <option>Малка фирма (от 1 до 15 служители)</option>
                <option>Личен (Портфолио)</option>
                <option>Ресторант/ Кафе</option>
                <option>Друго</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Описание:</label>
            <textarea class="form-control" name="description" id="description" rows="3" placeholder="<?php echo $desc; ?>"></textarea>
        </div>
        <div class="form-group">
            <label for="upload">Качи снимка на проект:</label>
            <input type="file" class="form-control-file" id="upload">
        </div>
        <input type="submit" class="btn btn-primary" value="Submit">
        </form>
</section>

