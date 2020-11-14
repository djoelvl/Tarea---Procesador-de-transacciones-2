<?php 
class EsCookies implements IServiceBase{

    private $utilities;
    private $cookieName;

    public function __construct(){
        $this->utilities = new Utilidades();
        $this->cookieName = "estudiantes";
    }

    public function GetList(){
$listadoestudiantes = array();

if(isset($_COOKIE[$this->cookieName])){

    $listadoestudiantesDecode = json_decode($_COOKIE[$this->cookieName],false);

    foreach($listadoestudiantesDecode as $elementDecode){
        $element = new estudiantes();
        $element->set($elementDecode);
        
        array_push($listadoestudiantes,$element);
    }


}else{

    setcookie($this->cookieName,json_encode($listadoestudiantes),$this->utilities->GetCookieTime(),"/");
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
    $entity->foto = "";

    if(isset($_FILES['foto'])){
        $photofile =  $_FILES['foto'];

        if($photofile['error']== 4){
            $entity->foto= $element->foto;
        }else{

        $typeReplace = str_replace("image/","",  $photofile['type']);
        $type =  $photofile['type'];
        $size =  $photofile['size'];
        $name =  $estudianteId . '.' . $typeReplace;
        $tmpname =  $photofile['tmp_name'];

        $success = $this->utilities->uploadImage("../assets/img/estudiante/",$name,$tmpname,$type,$size);

        if($success){
            $entity->foto=$name;
        }
    }
    }

    array_push($listadoestudiantes,$entity);
    setcookie($this->cookieName,json_encode($listadoestudiantes),$this->utilities->GetCookieTime(),"/");


}

public function Update($id,$entity){
     
        $element = $this->GetById($id);
        $listadoestudiantes = $this->GetList();

        $elementIndex = $this->utilities->getIndexElement($listadoestudiantes,'id',$id);

        $listadoestudiantes[$elementIndex] = $entity;
        setcookie($this->cookieName,json_encode($listadoestudiantes),$this->utilities->GetCookieTime(),"/");

        if(isset($_FILES['foto'])){
            $photofile =  $_FILES['foto'];

            if($photofile['error']== 4){
                $entity->foto= $element->foto;
            }
else{
            $typeReplace = str_replace("image/", "",  $_FILES['foto']['type']);
            $type =  $photofile['type'];
            $size =  $photofile['size'];
            $name = $id . '.' . $typeReplace;
            $tmpname =  $photofile['tmp_name'];
    
            $success = $this->utilities->uploadImage("../assets/img/estudiante/",$name,$tmpname,$type,$size);
    
            if($success){
                $entity->foto=$name;
            }
        }
        
        }
}

public function Delete($id){
    $listadoestudiantes = $this->GetList();

    $elementIndex = $this->utilities->getIndexElement($listadoestudiantes,'id',$id);

    unset($listadoestudiantes[$elementIndex]);

    $listadoestudiantes = array_values($listadoestudiantes);\
    setcookie($this->cookieName,json_encode($listadoestudiantes),$this->utilities->GetCookieTime(),"/");

}



}
?>