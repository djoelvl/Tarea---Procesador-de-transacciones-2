<?php 

require_once '..\layout\layout.php';
require_once '..\helpers\utilidades.php';
require_once 'estudiantes.php';
require_once '../Service/IServiceBase.php'; 
require_once 'cookies.php';
require_once '../helpers/FileHandler/IFileHandler.php';
require_once '../helpers/FileHandler/JsonFileHandler.php';
require_once '../helpers/FileHandler/SerializationFileHandler.php';
require_once '../helpers/FileHandler/csvFileHandler.php';


require_once 'transServicesFile.php';
include '../log.php'; 



$layout = new Layout(true);
$service = new transServiceFile();
$utilities = new Utilidades();



if (isset($_POST['fecha'])&& isset($_POST['hora']) && isset($_POST['monto']) && isset($_POST['descripcion'])){
  
 $newEstudiante = new estudiantes();

 $newEstudiante->constructor(0, $_POST['fecha'],$_POST['hora'],$_POST['monto'],$_POST['descripcion']);
$service->Add($newEstudiante);

$log="Transaccion agregada";
logger($log);
  

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
       <a href="../index.php" class="btn btn-secondary">Volver atras</a> Registro de estudiantes
  </div>
  <div class="card-body">

  <form enctype="multipart/form-data" action="agregar.php" method="POST">

  <div class="form-group">
    <label for="nombre">Fecha</label>
    <input type="date" class="form-control" id="fecha" name="fecha">

  </div>

  <div class="form-group">
    <label for="nombre">Hora</label>
    <input type="time" class="form-control" id="hora" name="hora">

  </div>


  <div class="form-group">
    <label for="apellido">Monto</label>  
    <input type="text" class="form-control" id="monto" name="monto">
  </div>
    

  <div class="form-group">
    <label for="apellido">Descripcion</label>  
    <input type="text" class="form-control" id="descripcion" name="descripcion">
  </div>
    

    <button type="submit" class="btn btn-secondary">Guardar</button>
</form>



  </div>
  
</div>

</div>
</div>




<div class=" col-md-3"></div> 

</div>





 
</main>


<?php $layout->printFooter();?>
