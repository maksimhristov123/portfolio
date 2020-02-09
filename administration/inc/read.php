
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
        header("Location: ?page=projects");
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
        
        
        <div class='admin_btn_group w-100 text-center my-5'><a href='?page=projects'>Обратно</a></div>
        </div>
    </div>";
    echo $content_read;
    mysqli_close($db);
?>