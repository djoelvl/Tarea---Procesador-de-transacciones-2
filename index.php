<?php 

require_once 'layout/layout.php';
require_once 'helpers/utilidades.php';
require_once 'estudiantes/estudiantes.php';
require_once 'Service/IServiceBase.php'; 
require_once 'estudiantes/cookies.php'; 
require_once 'helpers/FileHandler/IFileHandler.php';
require_once 'helpers/FileHandler/JsonFileHandler.php';
require_once 'helpers/FileHandler/SerializationFileHandler.php';
require_once 'helpers/FileHandler/csvFileHandler.php';

require_once 'estudiantes/transServicesFile.php';

$layout = new Layout(false);
$utilities = new Utilidades();
$service = new transServiceFile("estudiantes/data");


$listado = $service->GetList();


?>

<?php $layout->printHeader();?>
<a href="subir.php" style="float: right;" class="btn btn-secundary my-2">Subir transaccion</a>

<a href="estudiantes/data/transacciones.json" style="float: right;" class="btn btn-primary my-2" download>Descargar transacciones</a>
<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      
        <a href="estudiantes/agregar.php" class="btn btn-primary my-2">Ingresar transacciones</a>
        

                       
        
      
    </div>
  </section>

  
</main>


<?php if(empty($listado)):?>
<p>No hay transacciones registrados <p>


<?php else:?>
  
  

  <div class="row">
<div class="col-md-2"></div>

<div class="col-md-8">
<table class="table">
<thead class="thead-dark">
  <tr>
    <th>ID</th>
    <th>Fecha</th>
    <th>Hora</th>
    <th>Monto</th>
    <th>Descripción</th>
  </tr>
  </thead>
  <?php foreach($listado as $contact):?>
  <tr>
  <td><?php echo$contact->id; ?></td>
    <td><?php echo $contact->fecha; ?></td>
    <td><?php echo $contact->hora; ?></td>
    <td><?php echo $contact->monto;?>$</td>
    <td><?php echo$contact->descripcion; ?></td>
    <td><a href="estudiantes/editar.php?id=<?php echo $contact->id; ?>" class="btn btn-outline-primary">editar</a></td>
    <td><a href="#" data-id="<?php echo $contact->id;?>" class="btn btn-outline-danger delete-trans">Borrar </a></td>

    
    
  </tr>
  
  


</div>
<div class="col-md-2"></div>
</div>


  <?php endforeach;?>

<?php endif;?>

<?php $layout->printFooter();?>

<script src="assets/js/index/Sections/Index/Index.js"></script>