<?php 

    include_once("../librerias/cifradoSustitucion.php");

    $cifrador = new CifradoSustitucion();

    $alfabeto = $cifrador->getAlfabeto();
    $alfabeto_invertido = $cifrador->getAlfabetoInvertido();

    // Variables 
    $accion = "";
    $resultado = "";
    $texto_plano = "";

    if(isset($_REQUEST["accion"])){
        if($_REQUEST["accion"] == "cifrar" ){
            $accion = $_REQUEST["accion"];
            $texto_plano = isset($_REQUEST["texto_plano"])? utf8_decode($_REQUEST["texto_plano"]) : "";
            echo "TExto plano sin ir" . $texto_plano;
            $resultado = $cifrador->cifrarAlfabeticamente($texto_plano, $alfabeto_invertido);
        }

        if($_REQUEST["accion"] == "descifrar" ){
            $accion = $_REQUEST["accion"];
            $texto_encriptado = isset($_REQUEST["texto_encriptado"])? utf8_decode($_REQUEST["texto_encriptado"]) : "";
            $resultado = $cifrador->descifrarAlfabeticamente($texto_encriptado, $alfabeto_invertido);
        }
    }
?>

<!DOCTYPE html>
<html lang="es"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cifrador por sustitución</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header bg-danger text-light">
                    <h1>Cifrado por Sustitución Mono alfabética</h1>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Cifrado por Sustitución con Alfabeto Invertido</h5>
                    <p class="card-text">En este cifrado de sustitución las letras del alfabeto están invertidas</p>
                </div>
            </div>
            <div class="col">
                <h1></h1>
                <h3>Alfabeto Base</h3>
                <table class="table">
                    <tr>
                        <td></td>
                        <?php 
                            $items_alfabeto = count($alfabeto); 

                            for ($i=0; $i < $items_alfabeto; $i++) { ?>
                                <td><?= $i; ?></td>
                            <?php }
                        ?>
                    </tr>
                    <tr>
                        <td>M<sub>i</sub></td>
                        <?php 
                            for ($i=0; $i < $items_alfabeto; $i++) { ?>
                                <td><?= utf8_encode($alfabeto[$i]); ?></td>
                            <?php }
                        ?>
                    </tr>
                    <tr>
                        <td>C<sub>i</sub></td>
                        <?php 
                            for ($i=0; $i < $items_alfabeto; $i++) { ?>
                                <td><?= utf8_encode($alfabeto_invertido[$i]); ?></td>
                            <?php }
                        ?>
                    </tr>
                </table>
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
</body>
</html>
