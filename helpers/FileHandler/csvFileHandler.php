<?php

class csvFileHandler implements IFileHandler{

    public $directory;
    public $filename;

function __construct($directory,$filename){

    $this->directory=$directory;
    $this->filename=$filename;
}


    function CreateDirectory(){
     
    if(!file_exists($this->directory)){

        mkdir($this->directory, 0777, true);
    }
    
    }
    function SaveFile($value){
       
        $this->CreateDirectory($this->directory);
        $path=$this->directory . "/" . $this->filename . ".csv";
        $serializationFileHandler=json_encode($value);
        $file =fopen($path, "a");

        foreach ($value as $datos) {
            
            $data=array();
            array_push($data,$datos->id);
             array_push($data,$datos->monto);
              array_push($data,$datos->fecha);
               array_push($data,$datos->descripcion);

               fputcsv($file,$data);
        }
fclose($file);
        
    }
    
    function ReadFile(){
        

$this->CreateDirectory($this->directory);
$path=$this->directory . "/" . $this->filename . ".csv";

if(file_exists($path)){

    $file=fopen($path,"r");
    $contents=fread($file,filesize($path));
    fclose($file);

    return json_decode($contents);
}else{
    
    return false;
}

    

    
}
}


?>