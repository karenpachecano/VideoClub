<?php
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM peliculas WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query Failed");
        }

        $_SESSION['message'] = 'Dato eliminado';
        $_SESSION['message_type'] = 'primary';
        header("Location: index.php");
    }
?>