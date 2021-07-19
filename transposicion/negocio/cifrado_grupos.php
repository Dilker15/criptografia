<?php 
    class cifradoGrupo{
        public $textoClaro;
        public $cifrar;
        public $descifrar;
        public $clave;
        public $cantidadClave;
        public $cantGrupo;

        public function __construct($texto, $clavee){
            $this->textoClaro=strtoupper(preg_replace("/[[:space:]]/", "", trim($texto)));
            $this->clave="";
            $this->clave= $this->clave.$clavee;
            $this->cifrar="";
            $this->descifrar="";
            $this->cantidadClave=strlen($this->clave);
        }
        public function llenado(){
            if ((strlen($this->textoClaro)) % $this->cantidadClave == 0) {
                $this->cantGrupo = (strlen($this->textoClaro)) / $this->cantidadClave;
            } else {
                $this->cantGrupo = intval(((strlen($this->textoClaro)) / $this->cantidadClave) + 1);
            }
            if ((strlen($this->textoClaro)!= $this->cantidadClave* $this->cantGrupo)) {
                $a=strlen($this->textoClaro);
                $b=$this->cantidadClave* $this->cantGrupo;
                for ($i=0; $i < $b-$a; $i++) {
                    $this->textoClaro=$this->textoClaro.'X';
                }
            }
        }
        public function cifrado(){
            for ($j=0; $j < $this->cantGrupo; $j++) { 
                for ($i=0; $i < $this->cantidadClave; $i++) { 
                    $aux=$this->clave[$i] + ($j*$this->cantidadClave);
                    $this->cifrar=$this->cifrar . $this->textoClaro[$aux-1];
                }
                $this->cifrar=$this->cifrar . " ";
            }
        }
        public function descifrado(){
            $aux2=0;
            for ($j=0; $j < $this->cantGrupo; $j++) { 
                for ($i=0; $i < $this->cantidadClave; $i++) { 
                    $aux=$this->clave[$i] + ($j*$this->cantidadClave);
                    $this->descifrar[$aux]=$this->textoClaro[$aux2];
                    $aux2++;
                }
                // $this->descifrar=$this->cifrar . " ";
            }
        }
    }

?>
<?php 
    // $a=new cifradoGrupo("ALHO DNMU XXOX", 4312);
    // $a->llenado();
    // $a->descifrado();
    // // echo $a->clave;
    // // echo $a->cantidadClave;
    // // echo $a->cantGrupo;
    // echo $a->textoClaro;
    // // echo $a->cifrar;
    // echo $a->descifrar;
?>