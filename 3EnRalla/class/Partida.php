<?php

class Partida{
    protected $ganador;
    protected $turno;
    protected $tablero;


    public function __construct($ganador = "x", $turno = "0", $tablero = [["O"],["X"],["X"],[""],[""],[""],[""],[""],[""]]){
        $this->ganador = $ganador;
        $this->turno = $turno;
        $this->tablero = $tablero;
    }



    public function mostrartablero(){
        echo"<div class='container'>";
        $tablero = $this->tablero;
        for ($i=0; $i<9; $i++){
                echo '<form class="casilla"><input type="hidden" name="borrar" value="' . $i . '">
                <input type="submit" name="borrar" value=' . $tablero[$i][0] . '></input></form>';
            }
    echo "</div>";
    }


    public function turno(){
        
    }

    public function toArray(){
        return [
            'ganador' => $this->ganador,
            'turno' => $this->turno,
            'tablero' => $this->tablero,
        ];
    }


    public static function toObjeto($data){
        return new Partida($data["ganador"], $data["turno"], $data["tablero"]);

    }




    /**
     * Get the value of tablero
     */ 
    public function getTablero()
    {
        return $this->tablero;
    }

    /**
     * Set the value of tablero
     *
     * @return  self
     */ 
    public function setTablero($tablero)
    {
        $this->tablero = $tablero;

        return $this;
    }
}
    
    
    
    
    
    
    
    ?>