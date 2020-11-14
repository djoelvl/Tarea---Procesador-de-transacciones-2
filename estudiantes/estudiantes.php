<?php 
class estudiantes{

    public $id;
    public $fecha;
    public $monto;
    public $hora;

    public $descripcion;
    private $utilities;


    public function __construct (){

        $this->utilities = new Utilidades();
    }

    public function constructor($id,$fecha,$hora,$monto,$descripcion){


        $this ->id = $id;
        $this ->fecha = $fecha;
        $this ->monto = $monto;
        $this ->descripcion = $descripcion;
        $this ->hora = $hora;


    }

    public function set($data){
        foreach($data as $key => $value) $this->{$key}= $value;
    }

    

}
?>