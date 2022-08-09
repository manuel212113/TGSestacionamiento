<?php

include('cone.php');

if (isset($_POST['save_task'])) {
  $serie = $_POST['serie'];
  $sala = $_POST['sala'];
  $descripcion = $_POST['descripcion'];
  $otro = $_POST['otro'];

  $query = "INSERT INTO product(serie , sala, descripcion, otro) 
  VALUES ('$serie', '$sala','$descripcion','$otro')";

  $result = mysqli_query($conexion, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>