<?php include_once("../header.php") ?>


<?php 

    include_once("../librerias/CifradoClasico.php");

    $cifrador = new CifradoClasico();

    $alfabetoM = $cifrador->getAlfabeto();
    $alfabetoC = $cifrador->getAlfabeto();
    $alfabeto_invertido = $cifrador->getAlfabetoInvertido();

    

    $accion = "";
    $resultado = "";
    $texto_plano = "";
    $texto_encriptado = "";
    $llave = "";
    $desplazamiento = "";

    if(isset($_REQUEST["accion"])){
        if($_REQUEST["accion"] == "cifrar" ){
            $accion = $_REQUEST["accion"];
            $texto_plano    = isset($_REQUEST["texto_plano"])   ? utf8_decode($_REQUEST["texto_plano"]) : "";
            $llave    = isset($_REQUEST["llave"])   ? utf8_decode($_REQUEST["llave"]) : "";
            $desplazamiento = isset($_REQUEST["desplazamiento"])? utf8_decode($_REQUEST["desplazamiento"]) : "";
            $alfabetoC = $cifrador->getAlfabetoDespPuroConClave($llave, $desplazamiento);
            $resultado = $cifrador->cifradoPuroConClave($texto_plano, $llave, $desplazamiento);
        }

        if($_REQUEST["accion"] == "descifrar" ){
            $accion = $_REQUEST["accion"];
            $texto_encriptado = isset($_REQUEST["texto_encriptado"])? utf8_decode($_REQUEST["texto_encriptado"]) : "";
            $llave    = isset($_REQUEST["llave"])   ? utf8_decode($_REQUEST["llave"]) : "";
            $desplazamiento = isset($_REQUEST["desplazamiento"])? utf8_decode($_REQUEST["desplazamiento"]) : "";
            $alfabetoC = $cifrador->getAlfabetoDespPuroConClave($llave, $desplazamiento);
            $resultado = $cifrador->descifradoPuroConClave($texto_encriptado, $llave, $desplazamiento);
        }
    }
?>





<div class="container">
    <?php include_once("../menu_top.php") ?>
    <div class="row mx-4 d-flex flex-column justify-content-center align-items-center">
        <div class="col">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    <h1>Cifrado por Desplazamiento</h1>
                </div>
                <div class="card-body">
                    <h3 class="card-title">Cifrado por Desplazamiento Puro con Clave</h3>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>

        <div class="col w-50">
            <h1></h1>
            <h4>Alfabeto Base</h4>
            <table class="table">
                <tr>
                    <td></td>
                    <?php 
                        $items_maximo = count($alfabetoM); 

                        for ($i=0; $i < $items_maximo; $i++) { ?>
                            <td><?= $i; ?></td>
                        <?php }
                    ?>
                </tr>
                
                <tr>
                    <td>M<sub>i</sub></td>
                    <?php 
                        $items_alfabetoM = count($alfabetoM); 
                        for ($i=0; $i < $items_alfabetoM; $i++) { ?>
                            <td><?= utf8_encode($alfabetoM[$i]); ?></td>
                        <?php }
                    ?>
                </tr>
                <?php
                    if($alfabetoC != []) {?>
                        <tr>
                            <td>C<sub>i</sub></td>
                            <?php                     
                                $items_alfabetoC = count($alfabetoC); 
                                for ($i=0; $i < $items_alfabetoC; $i++) { ?>
                                    <td><?= utf8_encode($alfabetoC[$i]); ?></td>
                                <?php }
                            ?>
                        </tr>  
                        <?php 
                    }

                ?>                
            </table>
        </div>
    </div>
    <div class="row mx-4 mb-4 d-flex flex-column justify-content-center align-items-center">
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
                    <label for="llave" class="form-label">Llave</label>
                    <input onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" id="llave" name="llave" aria-describedby="llave">
                    <div id="llave" class="form-text">Ingrese la llave</div>
                </div>
                <div class="mb-3">
                    <label for="desplazamiento" class="form-label">Desplazamiento</label>
                    <input onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" id="desplazamiento" name="desplazamiento" aria-describedby="desplazamiento">
                    <div id="desplazamiento" class="form-text">Ingrese las posiciones a desplazar</div>
                </div>
                <button type="submit" class="btn btn-success">Cifrar</button>
            </form>
            <?php 
                if($resultado != "" && $accion == "cifrar"){ ?>
                    <div class="row pt-3">
                        <div class="col">
                            <h5>Cifrado exitosamente el texto de: <i class="text-secondary"><?= utf8_encode(strtoupper($texto_plano)) ?></i>  a:</h5>
                            <h4 class="text-success">
                                <?= utf8_encode($resultado) ?>       
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
                    <label for="llave" class="form-label">Llave</label>
                    <input onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" id="llave" name="llave" aria-describedby="llave">
                    <div id="llave" class="form-text">Ingrese la llave</div>
                </div>
                <div class="mb-3">
                    <label for="desplazamiento" class="form-label">Desplazamiento</label>
                    <input onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" id="desplazamiento" name="desplazamiento" aria-describedby="desplazamiento">
                    <div id="desplazamiento" class="form-text">Ingrese las posiciones a desplazar</div>
                </div>
                <button type="submit" class="btn btn-warning">Descifrar</button>
            </form>
            <?php 
                if($resultado != "" && $accion == "descifrar"){ ?>
                    <div class="row pt-3">
                        <div class="col">
                            <h5>Descifrado exitosamente el texto encriptado de: <i class="text-secondary"><?= utf8_encode(strtoupper($texto_encriptado)) ?></i>  a:</h5>
                            <h4 class="text-success">
                                <?= utf8_encode($resultado) ?>       
                            </h4>
                            
                        </div>
                    </div>
                    <?php 
                }
            ?>              
        </div>
    </div>
</div>

<?php include_once("../footer.php") ?>
