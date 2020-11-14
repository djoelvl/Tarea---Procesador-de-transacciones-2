<?php 

require_once '..\layout\layout.php';
require_once '..\helpers\utilidades.php';
require_once 'estudiantes.php';
require_once '../Service/IServiceBase.php'; 
require_once 'cookies.php';
require_once '../helpers/FileHandler/IFileHandler.php';
require_once '../helpers/FileHandler/JsonFileHandler.php';
require_once '../helpers/FileHandler/SerializationFileHandler.php';

require_once 'transServicesFile.php';
include '../log.php'; 

$layout = new Layout(true);
$service = new transServiceFile();
$utilities = new Utilidades();


if(isset($_GET['id'])){

$editID=$_GET['id']; 

$element = $service->GetById($editID);

if(isset($_POST['fecha']) && isset($_POST['hora']) && isset($_POST['monto'])  && isset($_POST['descripcion'])){
  $log="Trasaccion editada del ID($editID) ";
  logger($log);
  
  $updateAlum = new estudiantes();
$updateAlum->constructor($editID,$_POST['fecha'],$_POST['hora'],$_POST['monto'],$_POST['descripcion']);
  

  $service->Update($editID,$updateAlum);

  header("Location: ../index.php");
  exit();



}

}else{
    header("Location: ../index.php");
    exit(); 
  }

?>

<?php $layout->printHeader();?>

<main role="main"> 
<div class="row margin-top">
<div class=" col-md-3"></div>

<div class=" col-md-6">
<div class="card">
  <div class="card-header">
       <a href="../index.php" class="btn btn-secondary">Volver atras</a> 
  </div>
  <div class="card-body">

  <form enctype="multipart/form-data" action="editar.php?id=<?php echo $element->id ?>" method="POST">

  <div class="form-group">
    <label for="nombre">Fecha</label>
    <input type="date" value="<?php echo $element->fecha?>"class="form-control" id="fecha" name="fecha">
  </div>

  <div class="form-group">
    <label for="apellido">Hora</label>  
    <input type="time" value="<?php echo $element->hora?>" class="form-control" id="hora" name="hora">
  </div>

  <div class="form-group">
    <label for="apellido">Monto</label>  
    <input type="text" value="<?php echo $element->monto?>" class="form-control" id="monto" name="monto">
  </div>
  <div class="form-group">
    <label for="apellido">Descripcion</label>  
    <input type="text" value="<?php echo $element->descripcion?>" class="form-control" id="descripcion" name="descripcion">
  </div>

  

  
    <button type="submit" class="btn btn-secondary">Guardar</button>
</form>



  </div>
  
</div>

</div>




<div class=" col-md-3"></div> 

</div>





 
</main>

<?php $layout->printFooter();?>

