<?php

include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $tittle = $row['tittle'];
        $description = $row['description'];

        
    }
}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $tittle = $_POST['tittle'];
    $description = $_POST['description'];

    $query = "UPDATE task set tittle = '$tittle', description = '$description' WHERE id =$id";
    mysqli_query($conn, $query);

    $_SESSION['message']= 'task update successfully';
    $_SESSION['message_type'] = 'warning';
    header("location: index.php");
}

?>

<?php include("includes/header.php")?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="edit.php?id= <?php echo $_GET['id'];?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="tittle" value="<?php echo $tittle; ?>""
                            class="form-contorl" placeholder="update title ">
                        </div>
                        <div class="form-group ">   
                            <textarea name="description"   rows="2" class="form-control" 
                            placeholder="update description "><?php echo $description; ?>
                            </textarea>
                        </div>
                            <button class="btn btn-success" name="update">
                                update

                            </button>
                    </form>

                </div>

            </div>

        </div>

    </div>



<?php include("includes/footer.php")?>