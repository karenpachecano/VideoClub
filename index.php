<?php include("db.php") ?>

<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php if(isset($_SESSION['message'])){ ?>
                    <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>  
            <?php session_unset();} ?>


            <div class="card card-body">
                <form action="create_task.php" method="POST">
                <div class="form-group">
                        <input type="text" name="nombre" class="form-control" 
                        placeholder="Nombre" autofocus>
                    </div>
                <div class="from-group">
                        <textarea name="id" rows="1" class="form-control"
                        placeholder="Id"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="+">
                </form> 
            </div>

        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Id</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM peliculas";
                    $result_tasks = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result_tasks)) { ?>
                        <tr>
                            <td><?php echo $row ['nombre'] ?> </td>
                            <td><?php echo $row ['id'] ?> </td>
                            <td>
                                <a href="update_task.php?id=<?php echo $row['id']?>">
                                    Editar
                                </a>

                                <a href="delete_task.php?id=<?php echo $row['id']?>">
                                    Borrar
                                </a>
                            </td>
                        </tr>
                    <?php } ?>  
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php include("includes/footer.php")?> 
