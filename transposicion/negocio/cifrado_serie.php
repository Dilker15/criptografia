<?php
class cifradoSerie
{
    public $cifrar;//palabra a cifrar
    public $seriePrimo; // puede ser 1,2 o 3, lo cual indica la posicion en el cifrado
    public $seriePar;
    public $restantes;
    public $cifrado;
    public $palabraCifrada;//palabra descifrada
    const PRIMO = 1;
    const PAR = 2;
    const RESTANTES = 3;
    //constructor
    public function __construct()
    {
        // $this->cifrar= array();
        $this->seriePrimo = array();
        $this->seriePar = array();
        $this->restantes = array();
        $this->cifrado = array();
        $this->palabraCifrada = "";
    }
    // setter
    public function setcifrar($cifra)
    {
        $this->cifrar = strtoupper($cifra);
    }
    public function setcifrarSinEspacios($cifra)
    {
        $this->cifrar = strtoupper(preg_replace("/[[:space:]]/", "", trim($cifra)));
    }

    public function setSeriePrimo($cifra)
    {
        $this->cifrar = $cifra;
    }
    public function setSeriePar($cifra)
    {
        $this->cifrar = $cifra;
    }
    public function setRestantes($cifra)
    {
        $this->cifrar = $cifra;
    }
    // funciones de cifrado
    public function longitudPalabra()
    {
        return strlen($this->cifrar);
    }
    public function SeriePar()
    {
        for ($i = 0; $i < $this->longitudPalabra(); $i++) {
            if (($i + 1) % 2 == 0) {
                $this->seriePar[] = $i;
            }
        }
    }
    public function SeriePrimo()
    {
        for ($i = 0; $i < $this->longitudPalabra(); $i++) {
            if ($this->primo($i + 1)) {
                $this->seriePrimo[] = $i;
            }
        }
    }
    public function primo($cant)
    {
        for ($i = 2; $i <= ($cant / 2); $i++) {
            if ($cant % $i == 0) {
                return false;
            }
        }
        return true;
    }
    public function otros()
    {
        for ($i = 0; $i < $this->longitudPalabra(); $i++) {
            if (($i + 1) % 2 != 0) {
                if (!($this->primo($i + 1))) {
                    $this->restantes[] = $i;
                }
            }
        }
    }
    public function mostrarSerieOrden($a){
        if ($a==cifradoSerie::PRIMO) {
            foreach ($this->seriePrimo as $key => $value) {
                echo ($value+1). ", ";
            }
        }elseif ($a==cifradoSerie::PAR) {
            foreach ($this->seriePar as $key => $value) {
                echo ($value+1). ", ";
            }
        }else{
            foreach ($this->restantes as $key => $value) {
                echo ($value+1). ", ";
            }
        }
    }
    public function cifradoSerie($a, $b, $c)
    { //1=primo, 2=par, 3= restantes
        $this->SeriePar();
        $this->SeriePrimo();
        $this->otros();

        if (cifradoSerie::PRIMO == $a) {
            unset($this->seriePar[0]);
            foreach ($this->seriePrimo as $key => $value) {
                $this->cifrado[] = $value;
            }
            if ($b == cifradoSerie::PAR) {
                foreach ($this->seriePar as $key => $value) {
                    $this->cifrado[] = $value;
                }
                foreach ($this->restantes as $key => $value) {
                    $this->cifrado[] = $value;
                }
            } else {
                foreach ($this->restantes as $key => $value) {
                    $this->cifrado[] = $value;
                }
                foreach ($this->seriePar as $key => $value) {
                    $this->cifrado[] = $value;
                }
            }
        } elseif (cifradoSerie::PAR == $a) {
            unset($this->seriePrimo[1]);
            foreach ($this->seriePar as $key => $value) {
                $this->cifrado[] = $value;
            }
            if (cifradoSerie::PRIMO == $b) {
                foreach ($this->seriePrimo as $key => $value) {
                    $this->cifrado[] = $value;
                }
                foreach ($this->restantes as $key => $value) {
                    $this->cifrado[] = $value;
                }
            }else{
                foreach ($this->restantes as $key => $value) {
                    $this->cifrado[] = $value;
                }
                foreach ($this->seriePrimo as $key => $value) {
                    $this->cifrado[] = $value;
                }
            }
        } else {
            foreach ($this->restantes as $key => $value) {
                $this->cifrado[] = $value;
            }
            if (cifradoSerie::PRIMO == $b) {
                unset($this->seriePar[0]);
                foreach ($this->seriePrimo as $key => $value) {
                    $this->cifrado[] = $value;
                }
                foreach ($this->seriePar as $key => $value) {
                    $this->cifrado[] = $value;
                }
            }else{
                unset($this->seriePrimo[1]);
                foreach ($this->seriePar as $key => $value) {
                    $this->cifrado[] = $value;
                }
                foreach ($this->seriePrimo as $key => $value) {
                    $this->cifrado[] = $value;
                }
            
            }
        }
    }
    public function armandoCifrado(){
        foreach ($this->cifrado as $key => $value) {
            $this->palabraCifrada=$this->palabraCifrada. $this->cifrar[$value];
        }
    }
    public function armandoDescifrado(){
        $i=0;
        // for ($i=0; $i < $this->longitudPalabra(); $i++) { 
        //     $this->palabraCifrada=$this->palabraCifrada."A";
        // }
        foreach ($this->cifrado as $key => $value) {
            $this->palabraCifrada[$value]=$this->cifrar[$i];
            $i++; 
        }
    }
}
