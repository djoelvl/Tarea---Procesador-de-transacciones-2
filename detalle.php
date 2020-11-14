

<?php 

require_once 'layout/layout.php';
require_once 'helpers/utilidades.php';
require_once 'estudiantes/estudiantes.php';
require_once 'Service/IServiceBase.php'; 
require_once 'estudiantes/cookies.php'; 

$layout = new Layout(false);
$utilities = new Utilidades();
$service = new EsCookies(); 


if(isset($_GET['id'])){

    $editID=$_GET['id']; 
    
    $element = $service->GetById($editID);
     
    }


?>

<?php $layout->printHeader();?>

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      
        <a href="index.php" class="btn btn-primary my-2">Volver atras</a>
        
      
    </div>
  </section>

  
</main>






    <div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
  <div class="card">
  <img class="bd-placeholder-img card-img-top" src="<?php echo "estudiantes/" . $element->foto; ?>" width="100%" height="225" aria-label="Placeholder: Thumbnail">
  <div class="card-body">
    <h5 class="card-title">Nombre: <?php echo$element->nombre; ?></h5>
    <h5 class="card-subtitle mb-2 text-muted">Apellido: <?php echo $element->apellido; ?></h5>
    <h5 class="card-title">Materias favoritas: <?php echo$element->lista; ?></h5>
    <h5 class="card-subtitle mb-2 text-muted">Carrera: <?php echo $element->getcarreraName();?></h5>
    <h5 class="card-title">Estado del estudiante: <?php echo$element->state; ?></h5>
    <a href="estudiantes/delete.php?id=<?php echo $element->id; ?>" class="card-link">Borrar</a>
    <a href="estudiantes/editar.php?id=<?php echo $element->id; ?>" class="card-link">editar</a>
    
  </div>
</div>
</div>
</div>


  



<?php $layout->printFooter();?>

