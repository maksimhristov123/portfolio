<ul class="breadcrumb bg-transparent d-none">
    <li><a href="#" class="text-warning">Home<i class="fas fa-angle-right"></i></a></li>
    <li id="section-name">work</li>
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
                if($counter%2){
                    echo '<section class="lets_do_it my-0">
                            <div class="half_scr_img" style="background-image: url(administration/uploads/'.$row["name_img"].');"></div> 
                            <div class="section_content">
                                <p class="intro">'.$row["year_dep"].'</p>
                                <h2 class="heading">'.$row["client_name"].'</h2>
                                <p class="descr">'.$row["desc_proj"].'</p>
                                <div class="btn_cont"> <a href="http://'.$row['link_site'].'" class="buts">Link to...</a></div>
                            </div>
                          </section>';
                }else{
                    echo '<section class="lets_do_it my-0">
                            <div class="section_content">
                                <p class="intro">'.$row["year_dep"].'</p>
                                <h2 class="heading">'.$row["client_name"].'</h2>
                                <p class="descr">'.$row["desc_proj"].'</p>
                                <div class="btn_cont"> <a href="http://'.$row['link_site'].'" class="buts">Link to...</a></div>
                            </div>
                            <div class="half_scr_img" style="background-image: url(administration/uploads/'.$row["name_img"].');"></div> 
                          </section>';
                }
            }else{
                return;
            }
            
        }
    }
?>



       