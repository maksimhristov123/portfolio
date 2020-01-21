<?php 
                require_once "administration/inc/config.php";
                $id=$_GET['id'];
                echo "ID is: ".$id;

                mysqli_set_charset($db,"utf8");
                $sql = "SELECT * FROM articles WHERE article_id=".$id;
                $result = mysqli_query($db,$sql);
                $count = mysqli_num_rows($result);

                if($count != 1){
                    header("Location: blog.php");
                }
                $article = mysqli_fetch_assoc($result);

                $title = $article['article_title'];
                $text = $article['article_text'];
                $date = $article['onDate'];
                $category = $article['article_category'];
                $img = $article['art_dir_img'];
                                
                $content_read = "
                <ul class='breadcrumb bg-transparent d-none'>
                    <li><a href='#' class='text-warning'>Home<i class='fas fa-angle-right'></i></a></li>
                    <li id='section-name'>".$title."</li>
                </ul>
                
                <div class='container p-5 m-5'>
                <div class='row'>
                    <div class='col'>
                        <h2 class='read_heading'>Клиент: ".$title."<h2>
                        <p class='read_descr'>Описание: ".$text."</p>
                        <p class='read_link'>Линк: ".$date."</p>
                        <p class='read_year'>Година: ".$category."</p>
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