<?php

class cifradoColumnas
{

    public $palabraCifrar;
    public $palabraCifrada;
    public $matriz;
    public $cantCol;
    public $llenado;
    public $cantFilas;

    public function __construct($cifrar, $cant)
    {
        $this->cantCol = $cant;
        
        $this->palabraCifrar = strtoupper(preg_replace("/[[:space:]]/", "", trim($cifrar)));
        $this->palabraCifrada = "";
        $this->matriz = array();
        $this->llenado = 'X';
    }
    public function setLlenado($a){
        $this->llenado = strtoupper($a);
    }
    public function llenarMatriz($a, $b, $c)
    {
        $this->matriz[$a][$b] = $c;
    }
    public function crearMatrizCol()
    {
        if ((strlen($this->palabraCifrar)) % $this->cantCol == 0) {
            $this->cantFilas = (strlen($this->palabraCifrar)) / $this->cantCol;
        } else {
            $this->cantFilas = intval(((strlen($this->palabraCifrar)) / $this->cantCol) + 1);
        }
        $aux = 0;
        for ($i = 0; $i < $this->cantFilas; $i++) {
            for ($j = 0; $j <  $this->cantCol; $j++) {
                if ($aux < strlen($this->palabraCifrar)) {
                    $this->matriz[$i][$j] = $this->palabraCifrar[$aux];
                    $aux++;
                } else {
                    $this->matriz[$i][$j] = $this->llenado;
                }
            }
        }
    }
    public function crearDesMatrizCol()
    {
        if ((strlen($this->palabraCifrar)) % $this->cantCol == 0) {
            $this->cantFilas = (strlen($this->palabraCifrar)) / $this->cantCol;
        } else {
            $this->cantFilas = intval(((strlen($this->palabraCifrar)) / $this->cantCol) + 1);
        }
        $aux = 0;
        for ($i = 0; $i < $this->cantCol; $i++) {
            for ($j = 0; $j <  $this->cantFilas; $j++) {
                if ($aux < strlen($this->palabraCifrar)) {
                    $this->matriz[$j][$i] = $this->palabraCifrar[$aux];
                    $aux++;
                } else {
                    $this->matriz[$j][$i] = $this->llenado;
                }
            }
        }
    }
    public function armandoCifradoCol()
    {
        $aux = 0;
        for ($i = 0; $i < $this->cantCol; $i++) {
            for ($j = 0; $j < $this->cantFilas; $j++) {
                $this->palabraCifrada=$this->palabraCifrada. $this->matriz[$j][$i];
                // $this->palabraCifrada = $this->palabraCifrada . "a";
                $aux++;
                if ($aux % $this->cantCol == 0) {
                    $this->palabraCifrada = $this->palabraCifrada . " ";
                }
                // echo "si";
            }
        }
    }
    public function armandoDescifradoCol()
    {
        $aux = 0;
        for ($i = 0; $i < $this->cantFilas; $i++) {
            for ($j = 0; $j < $this->cantCol; $j++) {
                $this->palabraCifrada=$this->palabraCifrada. $this->matriz[$i][$j];
                // $this->palabraCifrada = $this->palabraCifrada . "a";
                $aux++;
                // echo "si";
            }
        }
    }
}
?>