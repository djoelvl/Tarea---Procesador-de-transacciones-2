<?php 
class Utilidades{

  
    
    
  public function getLastElement($list){
    
        $countList = count($list);
        $lastElement = $list[$countList - 1];
    
        return $lastElement;
    
        
    }
    
    
    
    
    
    public function buscar($list,$property,$value){
    $filter = [];
    
    foreach($list as $item){
        if($item->$property == $value){
            array_push($filter, $item);
        }
    
    }
    
    return $filter;
    }

    public function getElementListCSV($array, $place, $value)
    {
        $filter = [];

        for($f = 0; $f<count($array); $f++) {
            if($array[$f][$place] == $value) {
                array_push($filter, $array[$f]);
            }
        }
        return $filter;
    }
    
    public function GetCookieTime(){
    return time() + 60*60*24*30;
}

public function getIndexElement($list,$property,$value){
        $index = 0;
        
        foreach($list as $key => $item){
            if($item->$property == $value){
               $index = $key;
        }
    }   
    return $index;
    } 

    public function getIndexCSV($array, $place, $value)
    {

        $loc = 0;

        for($f = 0; $f<count($array); $f++) {
            if($array[$f][$place] == $value) {
                $loc = $f;
            }
        }
        return $loc;
    }


    public function uploadImage($directory,$name,$tmpFile,$type,$size){

        $isSucces = false;

        if(($type == "image/gif") || ($type == "image/jpeg") 
        || ($type == "image/png") || ($type == "image/jpg") 
        || ($type == "image/JPG") || ($type == "image/pjpeg") && ($size <1000000)){

            if(!file_exists($directory)){
                
                mkdir($directory,0777,true);

                if(file_exists($directory)){
              
                $this->uploadFile($directory . $name,$tmpFile);
             
                $isSucces = true;
            }
        }
    else{
        $this->uploadFile($directory . $name,$tmpFile);
             
        $isSucces = true;
    }
}
else{
    $isSucces = false;

}
    return $isSucces;
}
    


    private function uploadFile($name,$tmpFile){
        if(!file_exists($name)){
            unlink($name);

        }

        move_uploaded_file($tmpFile, $name);
        

    }


    
}

?>