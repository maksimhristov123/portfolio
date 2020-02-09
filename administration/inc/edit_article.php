<?php 
    $ttl_err=$categ_err=$txt_err="";
    require_once "config.php";

    $id = $_GET["id"];
                    
    $sql_article = "SELECT * FROM articles WHERE article_id=".$id;
    mysqli_set_charset($db, "utf8");
    $result = mysqli_query($db,$sql_article);
    
    $row=mysqli_fetch_object($result);

    if(isset($_POST['edit_article'])){
        $art_title=mysqli_real_escape_string($db, $_POST['art_title']);
        $art_category=mysqli_real_escape_string($db, $_POST['art_category']);
        $art_text=mysqli_real_escape_string($db, $_POST['art_text']);

        if(empty($art_title)){
            $ttl_err="Моля въведете коректно име!";
        }

        if(empty($art_category)){
            $categ_err="Моля въведете категория!";
        }

        if(empty($art_text)){
            $txt_err="Моля въведете описание!";
        }

        if(empty($ttl_err) && empty($categ_err) && empty($txt_err)){
            mysqli_set_charset($db, "utf8");
            $sql_update = "UPDATE articles SET article_title='$art_title',article_text='$art_text',article_category='$art_category' WHERE article_id=".$id;
            $result_update = mysqli_query($db, $sql_update);
            header("Location: ?page=articles");
        }
    }
mysqli_close($db);             
?>
                
<div class="page_heading">
    <h2>EDIT</h2>
</div>
<section class="container mt-5">
    <form method="POST" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="art_title">Заглавие:</label>
        <input type="text" class="form-control" name="art_title" id="art_title" value="<?php echo $row->article_title; ?>" require>
        <span class="help-block"><?php echo $ttl_err;?></span>
    </div>
    <div class="form-group">
        <label for="art_category">Категория:</label>
        <input type="text" class="form-control" name="art_category" id="art_category" value="<?php echo $row->article_category; ?>" require>
        <span class="help-block"><?php echo $categ_err;?></span>
    </div>
    <div class="form-group">
        <label for="art_text">Текст:</label>
        <textarea class="form-control" name="art_text" id="art_text" rows="3" placeholder="<?php echo $row->article_text; ?>" require></textarea>
        <span class="help-block"><?php echo $txt_err;?></span>
    </div>
    
    <input type="submit" name="edit_article" class="btn btn-primary" value="Submit">
    </form>
</section>
           
