<?php

    class CifradoClasico {

        private $alfabeto = [
            0  => 'A',
            1  => 'B',
            2  => 'C',
            3  => 'D',
            4  => 'E',
            5  => 'F',
            6  => 'G',
            7  => 'H',
            8  => 'I',
            9  => 'J',
            10 => 'K', 
            11 => 'L',
            12 => 'M',
            13 => 'N',
            14 => 'Ñ', 
            15 => 'O',
            16 => 'P',
            17 => 'Q',
            18 => 'R',
            19 => 'S',
            20 => 'T',
            21 => 'U',
            22 => 'V',
            23 => 'W',
            24 => 'X',
            25 => 'Y',
            26 => 'Z'
        ];

        private $alfabeto_sustitucion = [];
        private $alfabeto_invertido = [];
        private $abc;

        public $texto_claro;
        public $texto_cifrado;
        private $tipo_seleccionado;
        
        private $tipos = [
            "0" => "Mono alfabética",
            "1" => "Poli alfabética",
        ];

        function __construct() {
            $this->abc = $this->alfabeto;
        }

        public function getTipoCifrado($tipo) {
            if($this->getTipoCifrado($tipo)){
                return $this->tipos[$this->tipo_seleccionado];
            }
        }

        public function setTipoCifrado($tipo) {
            switch ($tipo) {
                case 0: 
                    $this->tipo_seleccionado = $this->tipos[$tipo];
                    break;
                case 1: 
                    $this->tipo_seleccionado = $this->tipos[$tipo];
                    break;
                default:                
                    return false;
            }
        }

        public function getAlfabeto(){
            return $this->alfabeto;
        }

        private function setAlfabetoInvertido(){
            $cantidad_letras = count($this->alfabeto);
            $j = $cantidad_letras-1;
            for ($i=0; $i < $cantidad_letras; $i++) { 
                $this->alfabeto_invertido[$j] = $this->alfabeto[$i];
                $j--;
            }
        }

        public function getAlfabetoInvertido(){
            if($this->alfabeto_invertido == null ){
                $this->setAlfabetoInvertido();                
            } 
            return $this->alfabeto_invertido;
        }

        public function cifrar(){
            switch ($this->tipo_seleccionado) {
                case $this->tipos[0]:
                    $this->cifrarAlfabeticamente($this->texto_claro, $this->alfabeto_sustitucion);
                    break;
                case $this->tipos[1]:
                    $this->cifrarPoliAlfabeticamente();
                    break;
                    
                default:
                    # code...
                    break;
            }
        }

        public function cifrarAlfabeticamente($texto_claro, $alfabeto){
            $texto_cifrado = "";
            $texto_claro = strtoupper($texto_claro);
            $longitud_texto = strlen($texto_claro);
            for($i=0; $i < $longitud_texto ;$i++){                 
                $letra_tc = $texto_claro[$i];
                $indice = array_search($letra_tc, $this->alfabeto);
                if($indice !== false){
                    $texto_cifrado .= $alfabeto[$indice];
                }
            }
            return $texto_cifrado;
        }

        public function descifrarAlfabeticamente($texto_encriptado, $alfabeto){
            $texto_claro = "";
            $texto_encriptado = strtoupper($texto_encriptado);
            $longitud_texto = strlen($texto_encriptado);
            for($i=0; $i < $longitud_texto ;$i++){                
                $letra_tc = $texto_encriptado[$i];
                
                $indice = array_search($letra_tc, $alfabeto);
                if($indice !== false){
                    $texto_claro .= $this->alfabeto[$indice];
                }
            }
            return $texto_claro;
        }

        public function cifrarPoliAlfabeticamente(){

        }
        
        public function cifrarTransposicion($mensaje, $clave){
            $noSpace = str_replace(' ', '', $mensaje);
            $letras_Msm = str_split($noSpace);
            $orden = str_split($clave);

            $meh = "";
            $i = 0;          

            while ($i < count($letras_Msm) + count($orden)) {
                for ($j = 0; $j < count($orden); $j++) {
                    $pos = array_search($orden[$j], $letras_Msm);
                    if (($i + ($pos-1)) < count($letras_Msm)) {
                        $meh .= $letras_Msm[$i + ($pos-1)];
                    }
                }
                $meh .= " ";
                $i = $i + count($orden);
            }            
            return $meh;
        }

        public function cifrarDesplazamientoPuro($mensaje, $desplazamiento){
            $meh = "";
            $listaDespl = $this->lista_Despl($desplazamiento);
            $letras = str_split($mensaje);
            //print_r($this->abc);
            //var_dump($listaDespl);
            for ($i = 0; $i < count($letras); $i++) {
                $pos = array_search($letras[$i], $this->abc);
                if ($pos !== false) {
                    $meh .= $listaDespl[$pos];
                }
            }
            
            return $meh;
        }
        
        public function lista_Despl($despl){
            $lista_Final = [];
            $lista_Despl = [];
            
            $lista_Despl = $this->abc;
            
            for ($j = 0; $j < $despl; $j++) {
                $aux = $lista_Despl[$j];
                array_push($lista_Despl, $aux);
                array_splice($lista_Despl, 1, $j);
            }
            
            $cant = count($lista_Despl);
            for ($i = 0; $i < $cant; $i++) {
                array_push($lista_Final, $lista_Despl[$i]);                
            }
            return $lista_Final;
        }
    

        public function cifradoPuroConClave($mensaje, $llave, $desp){
            $lista_llave = $this->listaClave($llave);
            $cola = [];
            for ($i=count($lista_llave)-1; $i >= 0; $i--) { 
                array_push($cola, $lista_llave[$i]);
            }

            for ($i=0; $i < $desp ; $i++) {
                array_push($cola, $cola[$i]);
                array_splice($cola, 1, 0);
            }

            $lista_llave = [];
            $cant = count($cola);
            for ($i=0; $i < $cant ; $i++) { 
                array_push($lista_llave, $cola[$i]);
            }

            $lista_llave = array_reverse($lista_llave);
            $letras_Msm = str_split($mensaje);
            $meh = ""; 

            for ($i = 0; $i < count($letras_Msm); $i++) {
                $pos = array_search($letras_Msm[$i], $this->abc);
                if ($pos !== false) {
                    $meh .= $lista_llave[$pos];
                }
            }
            
            return $meh;
        }
        
        
        public function listaClave($llave){
            $lista_llave = [];
            $llave_Sin_Rep =  $this->llaveSinRepeticion($llave);
            
            for ($i = 0; $i < strlen($llave_Sin_Rep); $i++) {
                array_push($lista_llave, $llave_Sin_Rep[$i]);
            }
            for ($i = 0; $i < count($this->abc); $i++) {
                $llave_Sin_Rep = str_split($llave_Sin_Rep);
                $pos = array_search($this->abc[$i], $llave_Sin_Rep);
                if($pos === false){
                    array_push($lista_llave, $this->abc[$i]);
                }
            }
            
            return $lista_llave;
        }
        
        public function llaveSinRepeticion($llave){
            $lista_llave = [];
            $meh = "";
            $letras = str_split($llave);
            
            for ($i = 0; $i < count($letras); $i++) {
                $pos = array_search($letras[$i], $lista_llave);
                if ($pos === false || $lista_llave == []) {
                    array_push($lista_llave, $letras[$i]);
                }
            }
            for ($i = 0; $i < count($lista_llave); $i++) {
                $meh .=  $lista_llave[$i];
            }
            return $meh;
        }
    


        function __destruct() {
            
        }

    }

