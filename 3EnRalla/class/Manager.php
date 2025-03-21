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
            $arrayObjetos[] = Partida::toObjeto($array);
        }
        return $arrayObjetos;
    }



}

public function insert($objeto){
    $arrayDeArrays = [];

        $arrayDeArrays[] = $objeto->toArray();

    $codificado = json_encode($arrayDeArrays);

    file_put_contents($this->rutaJson, $codificado);
}

public function read(): void {
    $objetos = $this->extract();
    
    if (empty($objetos)) {
        echo "No hay datos disponibles.\n";
    } else {
        foreach ($objetos as $objeto) {
            $objeto->mostrartablero();
        }
    }
}

public function update(){}


public function delete(){}
    
}  
    ?>