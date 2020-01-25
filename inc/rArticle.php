<?php 
                require_once "administration/inc/config.php";
                $id=$_GET['id'];

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
                $img = $article['art_cover_name'];
                                
                $content_read = "
                <ul class='breadcrumb bg-transparent'>
                    <li><a href='#' class='text-warning pr-2'>Home<i class='fas fa-angle-right pl-2'> </i></a></li>
                    <li><a href='?page=blog' class='text-warning pr-2'>My place<i class='fas fa-angle-right pl-2'> </i></a></li>
                    <li id='section-name'>".$title."</li>
                </ul>
                
                <div class='container py-5 my-5 mx-auto'>
                    <div class='row d-block d-md-flex container mx-auto'>
                        <div class='col'>
                            <p class='container container-fluid'>".$text."</p>
                            <hr>
                            <div class='d-block d-md-flex'>
                                <p class='read_link'>Дата: ".$date."</p>
                                <p class='read_year'>Категория: ".$category."</p>
                            </div>
                        </div>
                        <div class='col'>
                            <img src='administration/uploads/articles/".$img."' width='100%' height='400'>     
                        </div>
                    
                    
                        <div class='w-100 my-5'><a class='buts' href='?page=blog'>Обратно</a></div>
                    </div>
                </div>
                <script>
                    $('.hero').css({
                        'background':'linear-gradient(45deg, rgba(0,0,0,.7), rgba(0,0,0,.8)), url(administration/uploads/articles/".$img.")',
                        'background-position':' center',
                        'background-attachment': 'fixed',
                        'background-repeat': 'no-repeat',
                        'background-size': 'cover'
                    });
                    $('.hero_content .slog').html('<p>".$category.", on ".$date."</p>');
                </script>
                ";

                echo $content_read;
                mysqli_close($db);
?>