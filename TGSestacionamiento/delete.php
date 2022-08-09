<?php

include("cone.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM product WHERE id = $id";
  $result = mysqli_query($conexion, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>