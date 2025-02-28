<?php

class Manager{
    private $rutaJson;

    public function __construct($ruta = "Sin ruta")
    {
        $this->rutaJson = $ruta;
}


public function extract(){
    $arrayObjetos = [];
    $codificado = file_get_contents($this->rutaJson);

    $arrayDeArrays = json_decode($codificado, true);

    if ($arrayDeArrays == null){
        return $arrayObjetos;
    }else{
        foreach ($arrayDeArrays as $array){
            $arrayObjetos[] = $array->toObjeto();
        }
        return $arrayObjetos;
    }



}

public function insert($arrayObjetos){
    $arrayDeArrays = [];

    foreach ($arrayObjetos as $objeto){
        $arrayDeArrays[] = $objeto->toArray();
    }

    $codificado = json_encode($arrayDeArrays);

    file_put_contents($this->rutaJson, $codificado);
}


public function create(){}

public function read(): void{}

public function update(){}

public function delete(){}
    
}  
    ?>