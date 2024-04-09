<?php 
    include_once './db.php';
    // Partials  
    include "./includes/header.php"; 
?>
<!-- Main Content -->

    <div class="container">
        <div class="row">
            <div class="insert-data-form">
                <!-- Alert -->
                <?php if(isset($_SESSION['message'])){ ?>
                    <div id="message" class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'];?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
                    </div>
                <?php session_unset(); } ?>
                <!-- Form to create a new task -->
                <div class="card card-body">
                    <form action="save_task.php" method="POST">
                        <div class="insert-title">
                            <input type="text" name="title" class="form-control" placeholder="Task title" autofocus>
                        </div>
                        <div class="insert-desc">
                            <textarea name="description" rows="2" class="form-control" placeholder="Task description"></textarea>
                        </div>
                        <div class="d-grid gap-2 mt-2">
                            <input type="submit" class="submit-bttn" name="save_task" value="Save Task">
                        </div>
                    </form>
                </div>
            </div>
            <div class="read-data">
                    <table class="table table-bordered table-dark">
                        <thead class="table-head">
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM task";
                                $result_tasks = mysqli_query($conn, $query);

                                while($row = mysqli_fetch_array($result_tasks)){ 
                            ?>

                                    <tr>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['description']; ?></td>
                                        <td><?php echo $row['created_at']; ?></td>
                                        <td >
                                            <a href="./edit_task.php?id=<?php echo $row['id'] ?>" class="edit-row"> edit<i class="fa fa-marker"></i></a>
                                            <a href="./delete_task.php?id=<?php echo $row['id'] ?>" class="delete-row"> delete<i class="fa fa-trash-alt"></i></a>
                                        </td>
                                    </tr>

                            <?php } ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>



<!-- End Main Content -->
<!-- Partials -->
<?php include "./includes/footer.php"; ?>