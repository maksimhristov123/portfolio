
<?php
                    require_once "config.php";

                    $art_ttl=$art_txt=$art_cat="";
                    $art_ttl_err=$art_txt_err=$art_cat_err="";

                    if(isset($_POST['submit'])){

                        //validate data from form
                        //validate title
                        $title_input = trim($_POST["art_title"]);
                        if(empty($title_input)){
                            $art_ttl_err = "Моля въведете заглавие!";
                        // }elseif(strlen($title_input)>=71){
                        //     $art_ttl_err .= "Моля въведете заглавие до 70 символа(включително разстояние)!";
                        }else{
                            $art_ttl =$title_input;
                        }

                        //validate category of article art_category 
                        $art_category_input = trim($_POST["art_category"]);
                        if(empty($art_category_input)){
                            $art_cat_err = "Моля въведете категория!";
                        }else{
                            $art_cat=$art_category_input;
                        }

                        //validate text of article art_text
                        $art_text_input = trim($_POST["art_text"]);
                        if(empty($art_text_input)){
                            $art_txt_err = "Моля въведете текст!";
                        }else{
                            $art_txt = $art_text_input;
                        }
                        
                        
                        //UPLOAD FILES
                        $art_file_name = basename($_FILES['art_cover']['name']);
                        $art_directory = '../uploads/articles/'.$art_file_name;
                        
                        
                        if(move_uploaded_file($_FILES["art_cover"]["tmp_name"],$art_directory)){
                            
                            mysqli_set_charset($db,"utf8");

                            $art_ttl = mysqli_real_escape_string($db, $art_ttl);
                            $art_txt = mysqli_real_escape_string($db, $art_txt);
                            $art_cat = mysqli_real_escape_string($db, $art_cat);
                            
                            //Check errors before insert to db

                            if(empty($art_ttl_err) && empty($art_txt_err) && empty($art_cat_err)){
                                echo "<p>".$art_ttl."</p><br><p>".$art_cat."</p><p>".$art_txt."</p><p>".$art_file_name."</p><p>".$art_directory."</p>";
                                //Prepare insert statement
                                $sql = "INSERT INTO `articles` (article_title, article_text, article_category, art_cover_name, art_dir_img) VALUES ('$art_ttl', '$art_txt', '$art_cat', '$art_file_name', '$art_directory')";

                                if(mysqli_query($db, $sql)){
                                    header("Location: ?page=articles");
                                    exit();
                                }
                            }
                        }
                        
                    }  
                    mysqli_close($db);
                ?>




                
                <div class="page_heading">
                    <h2>Create article</h2>
                </div>

                <section class="container mt-5">
                    <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="art_title">Заглавие:</label>
                        <input type="text" class="form-control" name="art_title" id="art_title" placeholder="Въведете име на статия" require>
                        <span class="help-block"><?php echo $art_ttl_err;?></span>
                    </div>
                    <div class="form-group">
                        <label for="art_category">Категория:</label>
                        <input type="text" class="form-control" name="art_category" id="art_category" placeholder="Въведете категория" require>
                        <span class="help-block"><?php echo $art_cat_err;?></span>
                    </div>
                    <div class="form-group">
                        <label for="art_text">Текст:</label>
                        <textarea class="form-control" name="art_text" id="art_text" rows="3" require></textarea>
                        <span class="help-block"><?php echo $art_txt_err;?></span>
                    </div>
                    <div class="form-group">
                        <label for="art_cover">Качи снимка за корица:</label>
                        <input type="file" class="form-control-file" name="art_cover" id="art_cover">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                    </form>
                </section>
              