<?php

class Partida{
    protected $ganador;
    protected $turno;
    protected $tablero;


    public function __construct($ganador = "", $turno = "O", $tablero = [[""],[""],[""],[""],[""],[""],[""],[""],[""]]){
        $this->ganador = $ganador;
        $this->turno = $turno;
        $this->tablero = $tablero;
    }



    public function mostrartablero(){
        echo"<div class='container'>";
        $tablero = $this->tablero;
        for ($i=0; $i<9; $i++){
                echo '<form class="casilla" method="post"><input type="hidden" name="borrar" value="' . $i . '">
                <input type="submit" name="mostrar" value=' . $tablero[$i][0] . '></input></form>';
            }
    echo "</div>";
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

    public function turno($manager){
        $arrayObjetos = $manager->extract();
        $turno = $arrayObjetos[0]->getTurno();
        if ($turno == "O"){
            $turno = "X";
        }else {
            $turno = "O";
        }
        $arrayObjetos[0]->setTurno($turno);

        $manager->insert($arrayObjetos[0]);
    }

    public function jugada($play, $manager){
        $libro = $manager->extract();
        $turno = $libro[0]->getTurno();
        $tablero = $libro[0]->getTablero();
        $tablero[$play] = [$turno];
        $libro[0]->setTablero($tablero);
        $manager->insert($libro[0]);
    }

    public function ganador($manager){
        $arrayObjetos = $manager->extract();
        $partida = $arrayObjetos[0];
        $tablero = $partida->getTablero();

        $c0 = $tablero[0][0];
        $c1 = $tablero[1][0];
        $c2 = $tablero[2][0];
        $c3 = $tablero[3][0];
        $c4 = $tablero[4][0];
        $c5 = $tablero[5][0];
        $c6 = $tablero[6][0];
        $c7 = $tablero[7][0];
        $c8 = $tablero[8][0];
    
        if (
            ($c0 == $c1 && $c1 == $c2 && $c1 != "") ||
            ($c3 == $c4 && $c4 == $c5 && $c3 != "") ||
            ($c6 == $c7 && $c7 == $c8 && $c6 != "") ||
            ($c0 == $c3 && $c3 == $c6 && $c0 != "") ||
            ($c1 == $c4 && $c4 == $c7 && $c1 != "") ||
            ($c2 == $c5 && $c5 == $c8 && $c2 != "") ||
            ($c0 == $c4 && $c4 == $c8 && $c0 != "") ||
            ($c2 == $c4 && $c4 == $c6 && $c2 != "")
        ) 
        {return true;}
        else{return false;}


    }




    /** Getters y setters
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

        /**
         * Get the value of turno
         */ 
        public function getTurno()
        {
            return $this->turno;
        }

        /**
         * Set the value of turno
         *
         * @return  self
         */ 
        public function setTurno($turno)
        {
            $this->turno = $turno;

            return $this;
        }

        /**
         * Get the value of ganador
         */ 
        public function getGanador()
        {
            return $this->ganador;
        }

        /**
         * Set the value of ganador
         *
         * @return  self
         */ 
        public function setGanador($ganador)
        {
            $this->ganador = $ganador;

            return $this;
        }

    /* */




}
    
    
    
    
    
    
    
    ?>