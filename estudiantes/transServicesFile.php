<?php 
class transServiceFile implements IServiceBase{

    private $utilities;
    public $filehandler;
    public $directory;
    public $filename;

    public function __construct($directory = "data"){
        $this->utilities = new Utilidades();
        $this->directory = $directory;
        $this->filename = "transacciones";
        $this->filehandler = new JsonFileHandler( $this->directory,  $this->filename);

    }
    

    public function GetList(){
        $listadoestudiantesDecode = $this->filehandler->ReadFile();
$listadoestudiantes = array();

if($listadoestudiantesDecode==false){
    $this->filehandler->SaveFile($listadoestudiantes);


    

}else{

    foreach($listadoestudiantesDecode as $elementDecode){
        $element = new estudiantes();
        $element->set($elementDecode);
        
        array_push($listadoestudiantes,$element);
    }


}
return $listadoestudiantes;
}

public function GetById($id){

    $listadoestudiantes = $this->GetList();
    $estudiante = $this->utilities->buscar($listadoestudiantes,'id',$id)[0];
    return $estudiante;

}

public function Add($entity){

    $listadoestudiantes = $this->GetList();
    $estudianteId= 1;

    if(!empty($listadoestudiantes)){
        $lastEstudiante = $this->utilities->getLastElement($listadoestudiantes);
        $estudianteId = $lastEstudiante->id + 1;
    }

    $entity->id = $estudianteId;
    
    

    array_push($listadoestudiantes,$entity);

    $this->filehandler->SaveFile($listadoestudiantes);


}

public function Update($id,$entity){
     
        $element = $this->GetById($id);
        $listadoestudiantes = $this->GetList();

        $elementIndex = $this->utilities->getIndexElement($listadoestudiantes,'id',$id);

        $listadoestudiantes[$elementIndex] = $entity;
        $this->filehandler->SaveFile($listadoestudiantes);
    }

public function Delete($id){
    $listadoestudiantes = $this->GetList();

    $elementIndex = $this->utilities->getIndexElement($listadoestudiantes,'id',$id);

    unset($listadoestudiantes[$elementIndex]);

    $listadoestudiantes = array_values($listadoestudiantes);
    $this->filehandler->SaveFile($listadoestudiantes);


}



}
?>