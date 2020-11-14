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
<a href="index.php" style="float: left;" class="btn btn-secondary my-2">Volver atras</a>
<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      
    <form enctype="multipart/form-data" action='index.php' method='POST' enctype='multipart/form-data'>
<div class="wrap">
<input type='file' name='upload' value='Upload' id='upload' />
</div>
<div class="wrap">
<input class='button-secondary' type='submit' name='import' value='Import' id='import' />
</div>
</form>
  
    <?php

  if( isset( $_FILES['upload'] )) {
    $target = "estudiantes/data/";
    $target = $target . basename( $_FILES['upload']['name']) ;
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target)) {
        echo "Sorry, file already exists.";
      }
      
      
      
      
      // Allow certain file formats
      if($FileType != "json" && $FileType != "csv") {
        echo "Solo se pueden subir archivos tipo json y csv.";
        
      }


    
    if(move_uploaded_file($_FILES['upload']['tmp_name'], $target))
    {
        echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded";
    }
    else {
        echo "Sorry, there was a problem uploading your file.";
    }
}





?>
  
        

                       
        
      
    </div>
  </section>

  
</main>
<?php $layout->printFooter();?>
