<?php

include("db.php");

if(isset($_POST['save_task'])){
    $nombre = $_POST['nombre'];
    $id = $_POST['id'];

    $query = "INSERT INTO peliculas(nombre, id) VALUES ('$nombre', '$id')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Query Failed");
    }

    $_SESSION['message'] = 'Dato creado';
    $_SESSION['message_type'] = 'primary';

    header("Location: index.php");

    
}

?>