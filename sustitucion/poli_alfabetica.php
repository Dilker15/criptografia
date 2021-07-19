<?php 
    include_once("../header.php");

    include_once("../librerias/CifradoClasico.php");

    $cifrador = new CifradoClasico();

    $alfabeto = $cifrador->getAlfabeto();
    $claves = [];
    $alfabeto_vigenere = $cifrador->getAlfabetoVigenere();

    // Variables 
    $accion = "";
    $resultado = "";
    $texto_plano = "";
    $texto_encriptado = "";
    $clave = "";

    if(isset($_REQUEST["accion"])){
        if($_REQUEST["accion"] == "cifrar" ){
            $accion = $_REQUEST["accion"];
            $texto_plano = isset($_REQUEST["texto_plano"])? utf8_decode($_REQUEST["texto_plano"]) : "";
            $clave = isset($_REQUEST["clave"])? utf8_decode($_REQUEST["clave"]) : "";
            $texto = str_split($cifrador->eliminarEspacios($texto_plano));
            $claves = $cifrador->cargarClaveVigenere($texto_plano, $clave);
            $resultado = $cifrador->cifradoVigenere($texto_plano, $clave);
        }

        if($_REQUEST["accion"] == "descifrar" ){
            $accion = $_REQUEST["accion"];
            $texto_encriptado = isset($_REQUEST["texto_encriptado"])? utf8_decode($_REQUEST["texto_encriptado"]) : "";
            $clave = isset($_REQUEST["clave"])? utf8_decode($_REQUEST["clave"]) : "";
            $texto = str_split($cifrador->eliminarEspacios($texto_encriptado));
            $claves = $cifrador->cargarClaveVigenere($texto_encriptado, $clave);
            $resultado = $cifrador->descifradoVigenere($texto_encriptado, $clave);
        }
    }
?>


<div class="container">
    <?php include_once("../menu_top.php") ?>
    <div class="row">
        <div class="card">
            <div class="card-header bg-danger text-light">
                <h1>Cifrado por Sustitución</h1>
            </div>
            <div class="card-body">
                <h3 class="card-title">Cifrado por el método de Vigenere</h3>
                <p class="card-text"></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
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
        <div class="col">
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
    <div class="row">
        <div class="col">
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
                        for ($i=0; $i < $items_texto; $i++) { ?>
                            <td><?= utf8_encode($texto[$i]); ?></td>
                        <?php }
                    ?>
                </tr>
                <tr>
                    <td>C<sub>i</sub></td>
                    <?php 
                        for ($i=0; $i < $items_texto; $i++) { ?>
                            <td><?= utf8_encode($claves[$i]); ?></td>
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
                                        <td><?= utf8_encode($alfabeto_vigenere[$i][$j]); ?></td>        
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
    </div>
</div>


<?php include_once("../footer.php") ?>