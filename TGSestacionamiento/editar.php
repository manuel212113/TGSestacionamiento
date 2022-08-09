<?php
include("cone.php");
$serie = '';
$sala= '';
$descripcion= '';
$otro= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM product WHERE id=$id";
  $result = mysqli_query($conexion, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $serie = $row['serie'];
    $sala = $row['sala'];
    $descripcion = $row['descripcion'];
    $otro = $row['otro'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $serie= $_POST['serie'];
  $sala = $_POST['sala'];
  $descripcion = $_POST['descripcion'];
  $otro = $_POST['otro'];

  $query = "UPDATE product set serie = '$serie', sala = '$sala', descripcion = '$descripcion', otro = '$otro' WHERE id=$id";
  mysqli_query($conexion, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Control de productos</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="home.php">Control de productos</a>
      </div>
    </nav>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="serie" type="text" class="form-control" value="<?php echo $serie; ?>" placeholder="Update serie">
        </div>
        <div class="form-group">
        <textarea name="sala" class="form-control" cols="30" rows="10"><?php echo $sala;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="descripcion" class="form-control" cols="30" rows="10"><?php echo $descripcion;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="otro" class="form-control" cols="30" rows="10"><?php echo $otro;?></textarea>
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php  ?>