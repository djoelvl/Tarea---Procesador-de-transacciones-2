<?php 


require_once '..\helpers\utilidades.php';
require_once 'estudiantes.php';
require_once '../Service/IServiceBase.php'; 
require_once 'cookies.php';
require_once '../helpers/FileHandler/IFileHandler.php';
require_once '../helpers/FileHandler/JsonFileHandler.php';
require_once '../helpers/FileHandler/SerializationFileHandler.php';

require_once 'transServicesFile.php';
include '../log.php'; 

$service = new transServiceFile();

$idContaint = isset($_GET['id']);



if($idContaint){
    
    $estudianteId = $_GET['id'];

    $service->Delete($estudianteId);
    $log="Transaccion Eliminada del ID ($estudianteId)";
    logger($log);
}

header("Location: ../index.php");
exit();

?>