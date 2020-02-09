
<div class="admin_btn_group w-100 text-center my-5">
    <a href="?page=create_article">Добавяне</a>
</div>
 
 <?php

 require_once "config.php";

 $sql_latest="SELECT * FROM articles WHERE deleted='0' ORDER BY onDate DESC LIMIT 4";
 mysqli_set_charset($db,"utf8");
 $result_latest = mysqli_query($db,$sql_latest);
 $count_latest = mysqli_num_rows($result_latest);

 if($count_latest>0){
     echo "<div class='container'><div class='page_heading'><h2>Най-нови</h2></div><table class='table'>";
     echo "<thead>";
     echo "<tr>";
     echo "<th scope='col'>#</th>";
     echo "<th scope='col'>Заглавие</th>";
     echo "<th scope='col'>Категория</th>";
     echo "<th scope='col'>Дата</th>";
     echo "<th scope='col'>Редакция</th>";
     echo "</tr>";
     echo "</thead>";
     echo "<tbody>";
     while($row_latest = mysqli_fetch_array($result_latest)){
         echo "<tr>";
         echo "<td>".$row_latest['article_id']."</td>";
         echo "<td>".$row_latest['article_title']."</td>";
         echo "<td>".$row_latest['article_category']."</td>";
         echo "<td>".$row_latest['onDate']."</td>";
         echo "<td>";
         echo "<div class='settings_group'>
                 <a class='btn btn-info' href='?page=read_article&id=".$row_latest['article_id']."'>READ</a> 
                 <a class='btn btn-primary' href='?page=edit_article&id=".$row_latest['article_id']."'>EDIT</a> 
                 <a class='btn btn-danger' href='?page=delete_article&id=".$row_latest['article_id']."'>DELETE</a>

             </div>";
         echo "</td>";
         echo "</tr>";
     }
 
     echo "</tbody>";
     echo "</table></div>";
 }

 $sql3 = "SELECT * FROM articles WHERE deleted='0' ORDER BY onDate DESC";
 mysqli_set_charset($db,"utf8");
 $result3 = mysqli_query($db,$sql3);
 $count3 = mysqli_num_rows($result3);

 if($count3>0){
     echo "<div class='container'><div class='page_heading'><h2>Всички</h2></div><table class='table'>";
     echo "<thead>";
     echo "<tr>";
     echo "<th scope='col'>#</th>";
     echo "<th scope='col'>Заглавие</th>";
     echo "<th scope='col'>Категория</th>";
     echo "<th scope='col'>Дата</th>";
     echo "<th scope='col'>Редакция</th>";
     echo "</tr>";
     echo "</thead>";
     echo "<tbody>";
     while($row_art = mysqli_fetch_array($result3)){
         echo "<tr>";
         echo "<td>".$row_art['article_id']."</td>";
         echo "<td>".$row_art['article_title']."</td>";
         echo "<td>".$row_art['article_category']."</td>";
         echo "<td>".$row_art['onDate']."</td>";
         echo "<td>";
         echo "<div class='settings_group'>
                 <a class='btn btn-info' href='?page=read_article&id=".$row_art['article_id']."'>READ</a> 
                 <a class='btn btn-primary' href='?page=edit_article&id=".$row_art['article_id']."'>EDIT</a> 
                 <a class='btn btn-danger' href='?page=delete_article&id=".$row_art['article_id']."'>DELETE</a>

             </div>";
         echo "</td>";
         echo "</tr>";
     }
 
     echo "</tbody>";
     echo "</table></div>";
 }

 $sql_deleted = "SELECT * FROM articles WHERE deleted='1' ORDER BY onDate DESC";
 mysqli_set_charset($db,"utf8");
 $result_deleted = mysqli_query($db,$sql_deleted);
 $count_deleted = mysqli_num_rows($result_deleted);

 if($count_deleted>0){
     echo "<div class='container'><div class='page_heading'><h2>Изтрити</h2></div><table class='table'>";
     echo "<thead>";
     echo "<tr>";
     echo "<th scope='col'>#</th>";
     echo "<th scope='col'>Заглавие</th>";
     echo "<th scope='col'>Категория</th>";
     echo "<th scope='col'>Дата</th>";
     echo "<th scope='col'>Редакция</th>";
     echo "</tr>";
     echo "</thead>";
     echo "<tbody>";
     while($row_deleted = mysqli_fetch_array($result_deleted)){
         echo "<tr>";
         echo "<td>".$row_deleted['article_id']."</td>";
         echo "<td>".$row_deleted['article_title']."</td>";
         echo "<td>".$row_deleted['article_category']."</td>";
         echo "<td>".$row_deleted['onDate']."</td>";
         echo "<td>";
         echo "<div class='settings_group'>
                 <a class='btn btn-info' href='?page=read_article&id=".$row_deleted['article_id']."'>READ</a> 
                 <a class='btn btn-primary' href='?page=edit_article&id=".$row_deleted['article_id']."'>EDIT</a> 
                 <a class='btn btn-danger' href='?page=recycle_article&id=".$row_deleted['article_id']."'>RECYCLE</a>

             </div>";
         echo "</td>";
         echo "</tr>";
     }
 
     echo "</tbody>";
     echo "</table></div>";
 }
 mysqli_close($db);
 ?>
           


