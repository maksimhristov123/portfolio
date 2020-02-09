

            <div class="page_heading">
                <h2>Read</h2>
            </div>


            <?php 
                require_once "config.php";
                $id=$_GET['id'];
                echo "ID is: ".$id;

                mysqli_set_charset($db,"utf8");
                $sql = "SELECT * FROM articles WHERE article_id=".$id;
                $result = mysqli_query($db,$sql);
                $count = mysqli_num_rows($result);

                if($count != 1){
                    header("Location: articles.php");
                }
                $article = mysqli_fetch_assoc($result);

                $title = $article['article_title'];
                $text = $article['article_text'];
                $date = $article['onDate'];
                $category = $article['article_category'];
                $img = $article['art_dir_img'];

                //escaping
                $title = mysqli_real_escape_string($db,$title);
                $text = mysqli_real_escape_string($db,$text);
                $date = mysqli_real_escape_string($db,$date);
                $category = mysqli_real_escape_string($db,$category);
                                           
                $content_read = "<div class='container p-5 m-5'>
                <div class='row'>
                    <div class='col'>
                        <h2 class='read_heading'>Заглавие: ".$title."<h2>
                        <p class='read_descr'>Статия: ".$text."</p>
                        <p class='read_link'>Последна промяна: ".$date."</p>
                        <p class='read_year'>Категория: ".$category."</p>
                    </div>
                    <div class='col'>
                        <img src=".$img." width='80%' height='400'>     
                    </div>
                    
                    
                    <div class='admin_btn_group w-100 text-center my-5'><a href='?page=articles'>Обратно</a></div>
                    </div>
                </div>";

                echo $content_read;
                mysqli_close($db);
            ?>