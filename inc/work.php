<ul class="breadcrumb bg-transparent d-none">
    <li><a href="#" class="text-warning">Home<i class="fas fa-angle-right"></i></a></li>
    <li id="section-name">projects</li>
</ul>

<?php 
    require_once "administration/inc/config.php";

    $sql = "SELECT * FROM projects WHERE best_project = 1";
    mysqli_set_charset($db, "utf8");
    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);

    $counter=0;
    if($count>0){
        while($row = mysqli_fetch_array($result)){
            $counter = $counter + 1;

            if($counter<=4){
                    echo '<section class="project my-0">
                            <div class="project_image_container">
                                <div class="project_image" style="background-image:url(administration/uploads/'.$row["name_img"].')"></div> 
                            </div>
                            <div class="project_info" data-aos="zoom-in">
                                <div class="project_content text-center">
                                    <p class="project_intro">'.$row["year_dep"].'</p>
                                    <h2 class="project_heading">'.$row["client_name"].'</h2>
                                    <p class="project_descr">'.$row["desc_proj"].'</p>
                                </div>
                                <div class="btn_cont my-auto"> <a href="http://'.$row['link_site'].'" class="buts buts_white">'.$row["client_name"].'</a></div>
                            </div>
                           
                          </section>';
            }else{
                return;
            }
            
        }
    }
?>



       