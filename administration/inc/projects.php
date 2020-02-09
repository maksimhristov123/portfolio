
              
                    <div class="admin_btn_group w-100 text-center my-5">
                        <a href="?page=create_proj">Добавяне</a>
                    </div>

                <?php
                require_once "config.php";
                $sql = "SELECT * FROM projects WHERE best_project = 1";
                mysqli_set_charset($db,"utf8");
                $result = mysqli_query($db,$sql);
                $count = mysqli_num_rows($result);

                if($count>0){
                    echo "<div class='container'><div class='page_heading'><h2>Любими</h2></div><table class='table'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th scope='col'>#</th>";
                    echo "<th scope='col'>Клиент</th>";
                    echo "<th scope='col'>Линк</th>";
                    echo "<th scope='col'>Година</th>";
                    echo "<th scope='col'>Редакция</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td >".$row['project_id']."</td>";
                        echo "<td>".$row['client_name']."</td>";
                        echo "<td><a href=".$row['link_site'].">".$row['link_site']."</a></td>";
                        echo "<td>".$row['year_dep']."</td>";
                        echo "<td>";
                        echo "<div class='settings_group'>
                                <a class='btn btn-info' href='?page=read&id=".$row['project_id']."'>READ</a> 
                                <a class='btn btn-primary' href='?page=edit&id=".$row['project_id']."'>EDIT</a> 
                                <a class='btn btn-danger' href='?page=delete&id=".$row['project_id']."'>DELETE</a>
                                <a class='btn btn-danger' href='?page=notFav&id=".$row['project_id']."'><i class='fas fa-star'></i></a>
                            </div>";
                        echo "</td>";
                        echo "</tr>";
                    }
                
                    echo "</tbody>";
                    echo "</table></div>";
                }
                ?>

                
                <?php
                
                $sql2 = "SELECT * FROM projects  WHERE best_project = 0 AND deleted_project='0' ORDER BY project_id DESC";
                //mysqli_set_charset($db,"utf8");
                $result2 = mysqli_query($db,$sql2);
                $count2 = mysqli_num_rows($result2);

                if($count2>0){
                    echo "<div class='container'><div class='page_heading'><h2>Всички</h2></div><table class='table'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th scope='col'>#</th>";
                    echo "<th scope='col'>Клиент</th>";
                    echo "<th scope='col'>Линк</th>";
                    echo "<th scope='col'>Година</th>";
                    echo "<th scope='col'>Редакция</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while($row = mysqli_fetch_array($result2)){
                        echo "<tr>";
                        echo "<td>".$row['project_id']."</td>";
                        echo "<td>".$row['client_name']."</td>";
                        echo "<td><a href=".$row['link_site'].">".$row['link_site']."</a></td>";
                        echo "<td>".$row['year_dep']."</td>";
                        echo "<td>";
                        echo "<div class='settings_group'>
                                <a class='btn btn-info' href='?page=read&id=".$row['project_id']."'>READ</a> 
                                <a class='btn btn-primary' href='?page=edit&id=".$row['project_id']."'>EDIT</a> 
                                <a class='btn btn-danger' href='?page=delete&id=".$row['project_id']."'>DELETE</a>
                                <a class='btn btn-danger' href='?page=favourite&id=".$row['project_id']."'><i class='far fa-star'></i></a>

                            </div>";
                        echo "</td>";
                        echo "</tr>";
                    }
                
                    echo "</tbody>";
                    echo "</table></div>";
                }

                $sql_deleted = "SELECT * FROM projects WHERE deleted_project='1'";
                mysqli_set_charset($db,"utf8");
                $result_deleted = mysqli_query($db,$sql_deleted);
                $count_deleted = mysqli_num_rows($result_deleted);

                if($count_deleted>0){
                    echo "<div class='container'><div class='page_heading'><h2>Изтрити</h2></div><table class='table'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th scope='col'>#</th>";
                    echo "<th scope='col'>Клиент</th>";
                    echo "<th scope='col'>Линк</th>";
                    echo "<th scope='col'>Година</th>";
                    echo "<th scope='col'>Редакция</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while($row_deleted = mysqli_fetch_array($result_deleted)){
                        echo "<tr>";
                        echo "<td>".$row_deleted['project_id']."</td>";
                        echo "<td>".$row_deleted['client_name']."</td>";
                        echo "<td><a href=".$row_deleted['link_site'].">".$row_deleted['link_site']."</a></td>";
                        echo "<td>".$row_deleted['year_dep']."</td>";
                        echo "<td>";
                        echo "<div class='settings_group'>
                                <a class='btn btn-info' href='?page=read&id=".$row_deleted['project_id']."'>READ</a> 
                                <a class='btn btn-primary' href='?page=edit&id=".$row_deleted['project_id']."'>EDIT</a> 
                                <a class='btn btn-danger' href='?page=recycle_project&id=".$row_deleted['project_id']."'>RECYCLE</a>

                            </div>";
                        echo "</td>";
                        echo "</tr>";
                    }
                
                    echo "</tbody>";
                    echo "</table></div>";
                }
                mysqli_close($db);
                ?>
           


