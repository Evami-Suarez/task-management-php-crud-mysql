<?php
include "./db.php";
// Partials
include "./includes/header.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM task WHERE id = $id";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows(($result))== 1){
        $row = mysqli_fetch_array($result);
    }
}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE task SET title = '$title', description = '$description' WHERE id = $id";
  
    $result = mysqli_query($conn, $query);

    if(!$result){
        $_SESSION['message'] = "Failed update";
        $_SESSION['message_type'] = 'danger';
        die(header("Location: index.php"));
    }

    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'primary';

    header('Location: index.php');
}

?>
<!-- Main Content -->

    <div class="edit-container">
        <div class="edit-card">
            <div>
                <div>
                    <form action="edit_task.php?id=<?php echo $row['id'] ?>" method="POST">
                        <div class="insert-title">
                            <input type="text" name="title" class="form-control" value="<?php echo $row['title'] ?>" placeholder="Update title">
                        </div>
                        <div class="insert-desc">
                            <textarea name="description" class="form-control" rows="2" placeholder="Update description"><?php echo $row['description'] ?></textarea>
                        </div>
                        <div>
                            <input type="submit" class="update-bttn" name="update" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


<!-- Main Content -->
<?php include "./includes/footer.php"; ?>