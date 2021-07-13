<?php 
class cifradoFil{
    public $palabraCifrar;
    public $palabraCifrada;
    public $matriz;
    public $cantCol;
    public $llenado;
    public $cantFil;
    public function __construct($cifrar, $cant)
    {
        $this->cantFil = $cant;
        $this->palabraCifrar = strtoupper(preg_replace("/[[:space:]]/", "", trim($cifrar)));
        $this->palabraCifrada = "";
        $this->matriz = array();
        $this->llenado = 'X';
    }
    public function setLlenado($a){
        $this->llenado = strtoupper($a);
    }
    public function crearMatrizFil()
    {
        if ((strlen($this->palabraCifrar)) % $this->cantFil == 0) {
            $this->cantCol = (strlen($this->palabraCifrar)) / $this->cantFil;
        } else {
            $this->cantCol = intval(((strlen($this->palabraCifrar)) / $this->cantFil) + 1);
        }
        $aux = 0;
        for ($i = 0; $i < $this->cantCol; $i++) {
            for ($j = 0; $j <  $this->cantFil; $j++) {
                if ($aux < strlen($this->palabraCifrar)) {
                    $this->matriz[$j][$i] = $this->palabraCifrar[$aux];
                    $aux++;
                } else {
                    $this->matriz[$j][$i] = $this->llenado;
                }
            }
        }
    }
    public function crearDesMatrizFil()
    {
        if ((strlen($this->palabraCifrar)) % $this->cantFil == 0) {
            $this->cantCol = (strlen($this->palabraCifrar)) / $this->cantFil;
        } else {
            $this->cantCol = intval(((strlen($this->palabraCifrar)) / $this->cantFil) + 1);
        }
        $aux = 0;
        for ($i = 0; $i < $this->cantFil; $i++) {
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
    public function armandoCifradoFil()
    {
        $aux = 0;
        for ($i = 0; $i < $this->cantFil; $i++) {
            for ($j = 0; $j < $this->cantCol; $j++) {
                $this->palabraCifrada=$this->palabraCifrada. $this->matriz[$i][$j];
                // $this->palabraCifrada = $this->palabraCifrada . "a";
                $aux++;
                if ($aux % $this->cantFil == 0) {
                    $this->palabraCifrada = $this->palabraCifrada . " ";
                }
            }
        }
    }
    public function armandoDescifradoFil()
    {
        $aux = 0;
        for ($i = 0; $i < $this->cantCol; $i++) {
            for ($j = 0; $j < $this->cantFil; $j++) {
                $this->palabraCifrada=$this->palabraCifrada. $this->matriz[$j][$i];
                // $this->palabraCifrada = $this->palabraCifrada . "a";
                $aux++;
                // echo "si";
            }
        }
    }
}

?>