<?php

    class CifradoClasico {

        private $alfabeto = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
                            
        private $alfabeto_vigenere = [
            ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z'],
            ['B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z','A'],
            ['C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z','A','B'],
            ['D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z','A','B','C'],
            ['E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z','A','B','C','D'],
            ['F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z','A','B','C','D','E'],
            ['G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z','A','B','C','D','E','F'],
            ['H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z','A','B','C','D','E','F','G'],
            ['I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z','A','B','C','D','E','F','G','H'],
            ['J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z','A','B','C','D','E','F','G','H','I'],
            ['K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z','A','B','C','D','E','F','G','H','I','J'],
            ['L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z','A','B','C','D','E','F','G','H','I','J','K'],
            ['M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z','A','B','C','D','E','F','G','H','I','J','K','L'],
            ['N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z','A','B','C','D','E','F','G','H','I','J','K','L','M'],
            ['Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z','A','B','C','D','E','F','G','H','I','J','K','L','M','N'],
            ['O','P','Q','R','S','T','U','V','W','X','Y','Z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ'],
            ['P','Q','R','S','T','U','V','W','X','Y','Z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O'],
            ['Q','R','S','T','U','V','W','X','Y','Z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P'],
            ['R','S','T','U','V','W','X','Y','Z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q'],
            ['S','T','U','V','W','X','Y','Z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R'],
            ['T','U','V','W','X','Y','Z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S'],
            ['U','V','W','X','Y','Z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T'],
            ['V','W','X','Y','Z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U'],
            ['W','X','Y','Z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V'],
            ['X','Y','Z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W'],
            ['Y','Z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X'],
            ['Z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y'],
        ];

        private $alfabeto_invertido = [];
        private $abc;

       

        function __construct() {
            $this->abc = $this->alfabeto;
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

        public function getAlfabetoVigenere(){
            return $this->alfabeto_vigenere;
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

        public function cifradoVigenere($texto, $clave){
            $txt_sin_espacios = $this->eliminarEspacios($texto);

            $dimension = strlen($txt_sin_espacios);

            $claves = $this->cargarClaveVigenere($texto, $clave);

            $texto_cifrado = "";

            for ($i=0; $i < $dimension; $i++) { 
                $fil = array_search($txt_sin_espacios[$i], $this->alfabeto);
                $col = array_search($claves[$i], $this->alfabeto);
                $texto_cifrado .= $this->alfabeto_vigenere[$fil][$col];
            }
            return $texto_cifrado;
        }

        public function descifradoVigenere($texto, $clave){
            $txt_sin_espacios = $this->eliminarEspacios($texto);

            $dimension = strlen($txt_sin_espacios);

            $claves = $this->cargarClaveVigenere($texto, $clave);

            $texto_cifrado = "";

            for ($i=0; $i < $dimension; $i++) { 
                $fil = array_search($claves[$i], $this->alfabeto);

                $col = array_search($txt_sin_espacios[$i], $this->alfabeto_vigenere[$fil]);
                
                $texto_cifrado .= $this->alfabeto[$col];
            }
            return $texto_cifrado;
        }        

        public function cargarClaveVigenere($texto, $clave){
            
            $txt_sin_espacios = $this->eliminarEspacios($texto);
            $clave_sin_espacios = $this->eliminarEspacios($clave);
            
            $dim_texto_claro = strlen($txt_sin_espacios);
            $dim_clave = strlen($clave_sin_espacios);
            
            $claves_repetidas = [];
            $j = 0;
            
            for ($i=0; $i < $dim_texto_claro; $i++) { 
                if($j < $dim_clave){
                    array_push($claves_repetidas, $clave_sin_espacios[$j]);
                    $j++;
                } else {
                    $j = 0;
                    array_push($claves_repetidas, $clave_sin_espacios[$j]);
                    $j++;
                }
                
            }
            return $claves_repetidas;

        }

        public function cifradoZigZag($mensaje, $n_filas){
            $txt_sin_espacios = $this->eliminarEspacios($mensaje);
            $dimension = strlen($txt_sin_espacios);
            $texto_cifrado = "";

            $matriz = [];
            $i = 0;
            $sw = 1;

            for ($j=0; $j < $dimension; $j++) {

                if($i == $n_filas - 1){
                    $sw = -1;
                }

                if($i == 0){
                    $sw = 1;
                }

                $matriz[$i][$j] = $txt_sin_espacios[$j];
                $i = $i + $sw;
            }
     
            for ($i=0; $i < $n_filas ; $i++) { 
                for ($j=0; $j < $dimension; $j++) { 
                    
                    if(isset($matriz[$i][$j])){
                        $texto_cifrado .= $matriz[$i][$j];
                        
                    }
                }
            }

            return $texto_cifrado;
        }
        
        
        
        
        
        
        
        
        
        public function descifradoZigZag($mensaje, $n_filas){
            $txt_sin_espacios = $this->eliminarEspacios($mensaje);
            $dimension = strlen($txt_sin_espacios);

            $ciclo = ($n_filas * 2) - 2;

            $letras_sobrantes = $dimension % $ciclo;
            $n_ciclos = intdiv($dimension, $ciclo);
            $ciclos_fila = $ciclo;
            $matriz = [];
            $columna = 0;            
            $i = 0;
            
            for ($fila=0; $fila < $n_filas; $fila++) { 
                $c = 0;    
                $columna = $fila;
                
                while ($c < $n_ciclos) {
                    if($fila == 0){
                        $matriz[$fila][$columna] = $txt_sin_espacios[$i];    
                        $columna = $columna + $ciclo;
                        $i++;
                        $c++;
                        if($c == $n_ciclos){
                            if($letras_sobrantes > 0){
                                $matriz[$fila][$columna] = $txt_sin_espacios[$i];
                                $letras_sobrantes--;
                                $i++;
                            }
                        } 
                    }
                    if($fila > 0 && $fila < $n_filas - 1){
                        if($columna <= $dimension){
                            $matriz[$fila][$columna] = $txt_sin_espacios[$i];    
                            $i++;
                        }
                        if(($columna + $ciclos_fila) <= $dimension){
                            $matriz[$fila][$columna + $ciclos_fila] = $txt_sin_espacios[$i];    
                            $i++;
                        }

                        $columna = $columna + $ciclo;
                        $c++;

                        if($c == $n_ciclos){
                            if($letras_sobrantes > 0 ){
                                if($columna <= $dimension){
                                    $matriz[$fila][$columna] = $txt_sin_espacios[$i];    
                                    $i++;
                                    $letras_sobrantes--;
                                }  
                            } 
                            if($letras_sobrantes > 0 ){
                                if(($columna + $ciclos_fila) <= $dimension){
                                    $matriz[$fila][$columna] = $txt_sin_espacios[$i];    
                                    $i++;
                                    $letras_sobrantes--;
                                }                                
                            } 
                        } 
                    }

                    if($fila == $n_filas-1){
                        $matriz[$fila][$columna] = $txt_sin_espacios[$i];    
                        $columna = $columna + $ciclo;
                        $i++;
                        $c++;
                        if($c == $n_ciclos){
                            if($letras_sobrantes > 0){
                                if($columna <= $dimension){
                                    $matriz[$fila][$columna] = $txt_sin_espacios[$i];
                                    $letras_sobrantes--;
                                    $i++;
                                }
                            }
                        } 
                    }

                }
                $ciclos_fila = $ciclos_fila - 2;
            }

            $texto_claro = "";
            for ($j=0; $j < $dimension; $j++) { 
                for ($i=0; $i < $n_filas ; $i++) { 
                    if(isset($matriz[$i][$j])){
                        $texto_claro .= $matriz[$i][$j];
                    }
                }
            }

            return $texto_claro;         
         
        }

        public function eliminarEspacios($texto){
            return str_replace(' ', '', $texto);
        }
        
        public function cifradoTransposicionGrupo($mensaje, $clave){
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
            

            for ($i = 0; $i < count($letras); $i++) {
                if (ord($letras[$i]) == 209 ){
                    $meh .= 'Ñ';
                } else {
                    $pos = array_search($letras[$i], $this->abc);
                    if ($pos !== false) {
                        $meh .= $listaDespl[$pos];
                    }
                }
            }
            return $meh;
        }

        public function descifrarDesplazamientoPuro($mensaje, $desplazamiento){
            $meh = "";
            $listaDespl = $this->lista_Despl($desplazamiento);
            $letras = str_split($mensaje);

            for ($i = 0; $i < count($letras); $i++) {
                if (ord($letras[$i]) == 209){
                    $meh .= "Ñ";
                } else {
                    $pos = array_search($letras[$i], $listaDespl);
                    if ($pos !== false) {
                        $meh .= $this->abc[$pos];
                    }
                }
            }
            
            return $meh;
        }
        
        public function lista_Despl($despl){
            
            $lista_Despl = [];
            
            $lista_Despl = $this->abc;
            
            for ($j = 0; $j < $despl; $j++) {
                $aux = $lista_Despl[0];
                array_push($lista_Despl, $aux);
                array_shift($lista_Despl);
            }
            
            return $lista_Despl;
        }
    

        public function cifradoPuroConClave($mensaje, $llave, $desp){
            $lista_llave = $this->listaClave($llave);
            $cola = [];
            for ($i=count($lista_llave)-1; $i >= 0; $i--) { 
                array_push($cola, $lista_llave[$i]);
            }

            for ($i=0; $i < $desp ; $i++) {
                $aux = $cola[0];
                array_push($cola, $aux);
                array_splice($cola, 0, 1);                
            }

            $lista_llave = [];
            $cant = count($cola);
            for ($i=0; $i < $cant ; $i++) { 
                array_push($lista_llave, $cola[$i]);
            }

            $lista_llave = array_reverse($lista_llave);
            
            $letras_Msm = str_split($this->eliminarEspacios($mensaje));

            $meh = ""; 

            for ($i = 0; $i < count($letras_Msm); $i++) {
                $pos = array_search($letras_Msm[$i], $this->abc);
                if ($pos !== false) {
                    $meh .= $lista_llave[$pos];
                }
            }
            
            return $meh;
        }

        public function descifradoPuroConClave($mensaje, $llave, $desp){
            $lista_llave = $this->listaClave($llave);
            $cola = [];
            for ($i=count($lista_llave)-1; $i >= 0; $i--) { 
                array_push($cola, $lista_llave[$i]);
            }

            for ($i=0; $i < $desp ; $i++) {
                $aux = $cola[0];
                array_push($cola, $aux);
                array_splice($cola, 0, 1);                
            }

            $lista_llave = [];
            $cant = count($cola);
            for ($i=0; $i < $cant ; $i++) { 
                array_push($lista_llave, $cola[$i]);
            }

            $lista_llave = array_reverse($lista_llave);
            
            $letras_Msm = str_split($this->eliminarEspacios($mensaje));

            $meh = ""; 

            for ($i = 0; $i < count($letras_Msm); $i++) {
                $pos = array_search($letras_Msm[$i], $lista_llave);
                if ($pos !== false) {
                    $meh .= $this->abc[$pos];
                }
            }
            
            return $meh;
        }

        public function getAlfabetoDespPuroConClave($llave, $desp){
            $lista_llave = $this->listaClave($llave);
            $cola = [];
            for ($i=count($lista_llave)-1; $i >= 0; $i--) { 
                array_push($cola, $lista_llave[$i]); 
            }

            for ($i=0; $i < $desp ; $i++) {
                $aux = $cola[0];
                array_push($cola, $aux);
                array_splice($cola, 0, 1);                
            }

            $lista_llave = [];
            $cant = count($cola);
            for ($i=0; $i < $cant ; $i++) { 
                array_push($lista_llave, $cola[$i]);
            }

            $lista_llave = array_reverse($lista_llave);

            return $lista_llave;
        }
        
        public function mostrarArray($array){
            $texto = "";
            for ($i=0; $i < count($array); $i++) { 
                $texto .= $array[$i];
            }
            return $texto;
        }
        
        public function listaClave($llave){
            $lista_llave = [];
            $llave_Sin_Rep =  $this->llaveSinRepeticion($llave);

            $llaveSinRep = str_split($llave_Sin_Rep);
            
            for ($i = 0; $i < strlen($llave_Sin_Rep); $i++) {
                array_push($lista_llave, $llave_Sin_Rep[$i]);
            }

            
            for ($i = 0; $i < count($this->abc); $i++) {
                $pos = array_search($this->abc[$i], $llaveSinRep);
                if($pos === false){
                    array_push($lista_llave, $this->abc[$i]);
                }
            }
            
            return $lista_llave;
        }
        
        public function llaveSinRepeticion($llave){
            $llave = $this->eliminarEspacios($llave);
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

