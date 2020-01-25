<ul class="breadcrumb bg-transparent d-none">
    <li><a href="#" class="text-warning">Home  <i class="fas fa-angle-right"></i></a></li>
    <li id="section-name">My place</li>
</ul>

<section class="blog py-5 px-0 px-lg-5">
    <div class="row d-block d-lg-flex">
        <div class="col-sm col-lg-8 shadow-lg pb-5">
            <h2 class="heading mb-5 py-5 text-center">Maxim Hristov's blog</h2>

            <?php 
                require_once "administration/inc/config.php";

                $sql = "SELECT * FROM articles WHERE deleted='0' ORDER BY onDate DESC";

                mysqli_set_charset($db, "utf8");
                $result = mysqli_query($db, $sql);
                $count = mysqli_num_rows($result);

                if($count>0){
                    while($row=mysqli_fetch_array($result)){
                        echo '<div class="container">
                                <div class="card card_article mt-5 mb-5 mx-auto"  data-aos="fade-down" data-aos-anchor-placement="top-bottom"  data-aos-delay="400" data-aos-offset="0">
                                    <img src="administration/uploads/articles/'.$row["art_cover_name"].'" class="card-img-top" alt="Cover profile photo">
                                    <div class="card-body">
                                    <p class="text-center '.$row["article_category"].'">'.$row["article_category"].'</p>
                                    <h4 class="text-center">'.$row["article_title"].'</h4>
                                    <p class="card-text pt-3 mx-auto text-truncate">'.$row['article_text'].'</p>
                                </div>
                                <div class="btn_cont mx-auto my-3">
                                    <a href="?page=rArticle'.'&id='.$row["article_id"].'" class="buts m-0 text-center">Learn more...</a>
                                </div>
                                <hr>
                                <p class="card-text text-center py-3 text-muted"><i>On '.$row['onDate'].'</i></p>
                            </div>
                        </div>';
                    }
                
                    echo '</div>
                    <div class="col-sm col-lg-4  mt-5 mb-5 mt-md-0">
                    <div class="card card_profile mx-auto shadow-lg">
                        <img src="images/profile.jpg" class="card-img-top" alt="Cover profile photo">
                        <div class="card-body">
                            <div class="text-center p-3">
                                <img src="images/me.jpg" class="profile_img img-fluid" alt="Profile picture to me" width="200">
                            </div>
                            <h5 class="text-center">Maxim Hristov</h5>
                            <p class="card-text pt-3">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                        </div>
                        <div class="social_group mx-auto py-4">
                            <a href="" class="p-3"><i class="fab fa-facebook"></i></a>
                            <a href="" class="p-3"><i class="fab fa-github"></i></a>
                            <a href="" class="p-3"><i class="fab fa-instagram"></i></a>
                            <a href="" class="p-3"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
    
                    <div class="row d-block">
                        <h5 class="text-center latest my-5">Latest:</h5>';
                }

                        $sql_latest = "SELECT * FROM articles WHERE deleted='0' ORDER BY onDate DESC LIMIT 4";

                        mysqli_set_charset($db, "utf8");
                        $result_latest = mysqli_query($db, $sql_latest);
                        $count_latest = mysqli_num_rows($result_latest);
                        $counter=0;
                        
                            while($row_late = mysqli_fetch_array($result_latest)){
                                $counter = $counter + 1;
                    
                                if($counter<=4){
                                    echo '<div class="col">
                                            <div class="card mb-3 mx-auto shadow-lg">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4 my-auto">
                                                        <img src="'.$row_late["art_dir_img"].'" class="card-img p-0 p-md-3" alt="Latest articles">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body h-auto">
                                                            <h5 class="card-title">'.$row_late['article_title'].'</h5>
                                                            <p class="card-text">'.$row_late['article_text'].'</p>
                                                            <hr>
                                                            <p class="card-text"><small class="text-muted">On '.$row_late['onDate'].'</small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                }else{
                                    return;
                                }
                                
                            }
                        
                
            ?>
            </div>
        </div>
    </div>
</section>
