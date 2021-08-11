<?php

    include("db.php");

    if  (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM peliculas WHERE id=$id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $id = $row['id'];
            $nombre = $row['nombre'];
        }
    }

    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];

        $query = "UPDATE peliculas set nombre = $nombre WHERE id = $id";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Dato actualizado';
        $_SESSION['message_type'] = 'primary';
        header("Location: index.php");
    }


?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <class class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="update_task.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" value="<?php echo $nombre?>" class="form-control" placeholder="Actualiza el nombre">
                    </div>

                    <button class="btn btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </class>
</div>

<?php include("includes/footer.php") ?>

