<?php 
    include_once("../header.php");

    include_once("../librerias/CifradoClasico.php");

    $cifrador = new CifradoClasico();

    $alfabeto = $cifrador->getAlfabeto();
    $claves = [];
    $alfabeto_vigenere = [
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
    // Variables 
    $accion = "";
    $resultado = "";
    $texto_plano = "";
    $texto_encriptado = "";
    $clave = "";

    
?>


<div class="container">
    <?php include_once("../menu_top.php") ?>
    <div class="row mx-4 d-flex flex-column justify-content-center align-items-center">
        <div class="col">
            <div class="card">
                <div class="card-header bg-secondary text-light">
                    <h1>Cifrado por Sustitución</h1>
                </div>
                <div class="card-body">
                    <h3 class="card-title">Cifrado por el método de Vigenere</h3>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row mx-4 d-flex flex-column justify-content-center align-items-center">
        <div class="col w-75">
            <h4>Cifrado</h4>
            <form action="" method="GET">
                <input type="hidden" value="cifrar" name="accion">
                <div class="mb-3">
                    <label for="texto_plano" class="form-label">Texto Plano</label>
                    <input onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" id="texto_plano" name="texto_plano" aria-describedby="textoPlano">
                    <div id="textoPlano" class="form-text">Ingrese el texto a cifrar.</div>
                </div>
                <div class="mb-3">
                    <label for="clave" class="form-label">Clave</label>
                    <input onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" id="clave" name="clave" aria-describedby="clave">
                    <div id="clave" class="form-text">Ingrese la clave para el cifrado</div>
                </div>
                <button type="submit" class="btn btn-success">Cifrar</button>
            </form>
            <?php 
                if($resultado != "" && $accion == "cifrar"){ ?>
                    <div class="row pt-3">
                        <div class="col">
                            <h5>Cifrado exitosamente el texto de: <i class="text-secondary"><?= (strtoupper($texto_plano)) ?></i>  a:</h5>
                            <h4 class="text-success">
                                <?= ($resultado) ?>       
                            </h4>
                            
                        </div>
                    </div>
                    <?php 
                }
            ?>

        </div>
        <div class="col w-75">
            <h4>Descifrado</h4>
            <form action="" method="GET">
                <input type="hidden" value="descifrar" name="accion">
                <div class="mb-3">
                    <label for="texto_encriptado" class="form-label">Texto Encriptado</label>
                    <input onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" id="texto_encriptado" name="texto_encriptado" aria-describedby="textoEncriptado">
                    <div id="textoEncriptado" class="form-text">Ingrese el texto a descifrar.</div>
                </div>
                <div class="mb-3">
                    <label for="clave" class="form-label">Clave</label>
                    <input onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" id="clave" name="clave" aria-describedby="clave">
                    <div id="clave" class="form-text">Ingrese la clave para el cifrado</div>
                </div>
                <button type="submit" class="btn btn-warning">Descifrar</button>
            </form>

            <?php 
                if($resultado != "" && $accion == "descifrar"){ ?>
                    <div class="row pt-3">
                        <div class="col">
                            <h5>Descifrado exitosamente el texto encriptado de: <i class="text-secondary"><?= (strtoupper($texto_encriptado)) ?></i>  a:</h5>
                            <h4 class="text-success">
                                <?= ($resultado) ?>       
                            </h4>
                            
                        </div>
                    </div>
                    <?php 
                }
            ?>              
        </div>
    </div>
<?php
if(isset($_REQUEST["accion"])){
    if($_REQUEST["accion"] == "cifrar" ){
        $accion = $_REQUEST["accion"];
        $texto_plano = isset($_REQUEST["texto_plano"])? utf8_decode($_REQUEST["texto_plano"]) : "";
        
   

        $clave = isset($_REQUEST["clave"])? utf8_decode($_REQUEST["clave"]) : "";
        $texto = str_split($cifrador->eliminarEspacios($texto_plano));
        $claves = $cifrador->cargarClaveVigenere($texto_plano, $clave);
        $resultado = $cifrador->cifradoVigenere($texto_plano, $clave);
?>
    <div class="row mx-4 d-flex flex-column justify-content-center align-items-center">
        <div class="col w-75">
            <h1></h1>
            <h3>Esquema</h3>
            <table class="table">
                <tr>
                    <td></td>
                    <?php                         
                        $items_texto = count($texto); 
                        for ($i=0; $i < $items_texto; $i++) { ?>
                            <td><?= $i; ?></td>
                        <?php }
                    ?>
                </tr>
                <tr>
                    <td>M<sub>i</sub></td>
                    <?php 
                        for ($i=0; $i < $items_texto; $i++) { 
                            ?>
                            <td><?= $texto[$i]; ?></td>
                        <?php }
                    ?>
                </tr>
                <tr>
                    <td>C<sub>i</sub></td>
                    <?php 
                        for ($i=0; $i < $items_texto; $i++) { ?>
                            <td><?= $claves[$i]; ?></td>
                        <?php }
                    ?>
                </tr>
            </table>            
            <table class="table table-light">
                <tbody>
                    <tr>
                        <h3>Alfabeto de Vigenere</h3>
                        <?php 
                            $count_alfabeto = count($alfabeto);
                            for ($i=0; $i < $count_alfabeto; $i++) { ?>
                            <tr>
                                <?php 
                                    for ($j=0; $j < $count_alfabeto; $j++) { ?>
                                        <td><?= $alfabeto_vigenere[$i][$j]; ?></td>        
                                        <?php 
                                    }                                
                                ?>
                                
                            </tr>
                            <?php }
                        ?>
                    </tr>
                </tbody>
            </table>            
        </div>       
        <div class="col w-75">
            <h3>Texto plano cifrado: <?php echo $resultado ?></h3>
        </div> 
    </div>
   
<?php

    }

    if($_REQUEST["accion"] == "descifrar" ){
        $accion = $_REQUEST["accion"];
        $texto_encriptado = isset($_REQUEST["texto_encriptado"])? utf8_decode($_REQUEST["texto_encriptado"]) : "";
        $clave = isset($_REQUEST["clave"])? utf8_decode($_REQUEST["clave"]) : "";
        $texto = str_split($cifrador->eliminarEspacios($texto_encriptado));
        $claves = $cifrador->cargarClaveVigenere($texto_encriptado, $clave);
        $resultado = $cifrador->descifradoVigenere($texto_encriptado, $clave);
        ?>
    <div class="row mx-4 d-flex flex-column justify-content-center align-items-center">
             
        <div class="col w-75">
            <h3>Texto crifrado descifrado: <?php echo $resultado ?></h3>
        </div> 
    </div>
   
        <?php
    }
}
?>


</div>


<?php include_once("../footer.php") ?>