
<?php 

    if(isset($_POST['id']) && !empty($_POST['id'])){
        require_once "config.php";

        $id = $_GET['id'];
        $sql = "UPDATE projects SET deleted_project='0' WHERE project_id=".$id;
        $result = mysqli_query($db,$sql);
        $count = mysqli_num_rows($result);

        if($count != 1){
            header("Location: ?page=projects");
        }

        mysqli_close($db);
    }
?>

                <div class="container p-5">
                    <div class="page_heading ">
                            <h2>Restore project</h2>
                    </div>

                    <form method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to restore this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="?page=projects" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
           