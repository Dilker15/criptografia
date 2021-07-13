<?php

    class CifradoSustitucion {

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

        public $texto_claro;
        public $texto_cifrado;
        private $tipo_seleccionado;
        private $tipos = [
            "0" => "Mono alfabï¿½tica",
            "1" => "Poli alfabï¿½tica",
        ];

        function __construct() {
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
                    $this->cifrarAlfabeticamente();
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


        function __destruct() {
            
        }

    }

