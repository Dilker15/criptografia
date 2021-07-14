<?php include("../includes/header.php") ?>
<?php include("../negocio/cifrado_columnas.php") ?>

<h1 class="text-center mt-4">Cifrado de transposicion por columna</h1>
<div class="card container bg-primary" style="width: 60rem;">
    <form action="">
        <div class="card-body">
            <div class="card w-80 bg-primary">
                <div class="card-body">
                    <label for="cifrar" class="form-label">Palabra a cifrar</label>
                    <textarea name="cifrado" id="cifrar" placeholder="palabra a cifrar" required class="form-control"><?php if (isset($_REQUEST['cifrado'])) {
                                                                                                                                    $aux = $_REQUEST['cifrado'];
                                                                                                                                    echo $aux;
                                                                                                                                } ?></textarea>
                </div>
            </div>

            <div class="card w-80 bg-primary">
                <label>Clave transposicion por columnas</label>
                <div class="card-body">
                    <div>
                        <label for="columna" class="form-label m">Numero de columnas</label>
                        <input type="number" id="columna" name="col" required value="<?php if (isset($_REQUEST['col'])) {
                                                                                                                                    $aux = $_REQUEST['col'];
                                                                                                                                    echo $aux;
                                                                                                                                } ?>">
                        <label for="relleno" class="form-label">Caracter de relleno</label>
                        <input type="text" id="relleno" name="relleno" value="<?php if (isset($_REQUEST['relleno'])) {
                                                                                                                                    $aux = $_REQUEST['relleno'];
                                                                                                                                    echo $aux;
                                                                                                                                } ?>">
                    </div>
                </div>
            </div>
            <div class="card w-80 bg-primary">
                <div class="card-body">
                    <input type="submit" class="btn btn-success " name="cifrar" value="CifrarPalabra">
                    <input type="submit" class="btn btn-success " name="descifrar" value="Descifrar palabra">

                    <a type="submit" href="cifradoCol.php" class="btn btn-success " name="resetear" value="Resetear">
                        resetear</a>
                    <a type="submit" href="../../index.php" class="btn btn-success " name="resetear" value="Resetear">
                        menu</a>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
if (isset($_REQUEST['cifrar'])) {
    $a1 = new cifradoColumnas($_REQUEST['cifrado'], $_REQUEST['col']);
    $a1->crearMatrizCol();
    $a1->armandoCifradoCol();
?>

    <div class="card container bg-primary mt-4" style="width: 60rem;">

        <h5 class="card-title text-center mt-2">Cifrado por transposicion de columnas</h5>
        <div class="card w-80 bg-primary mt-2">
            <div class="card-body">
                <p class="card-text mb-1">El texto a cifrar fue el siguiente:</p>
                <label for="" class="mx-5 mb-3"><?php echo $a1->palabraCifrar; ?></label>
                <p class="card-text mb-1">El numero de columnas es:</p>
                <label for="" class="mx-5 mb-3"><?php echo $a1->cantCol; ?></label>
                <p class="card-text mb-1">El caracter de relleno es:</p>
                <label for="" class="mx-5 mb-3"><?php echo $a1->llenado; ?></label>
            </div>
        </div>

        <div class="card w-80 bg-primary">
            <div class="card-body">
                <h5 class="card-title text-center">Detalle del cifrado</h5>
                <p class="card-text m-3 mb-1">El texto lo ordenamos de derecha a izquierda, teniendo que formar <?php echo $a1->cantCol ?> columnas, dandonos <?php echo $a1->cantFilas ?> filas.</p>
                <p class="card-text mx-3 mb-3 ">Si sobran espacios estos se rellenar con <?php echo $a1->llenado ?></p>
                <label for=""><?php
                                for ($i = 0; $i < $a1->cantFilas; $i++) {
                                    for ($j = 0; $j < $a1->cantCol; $j++) {
                                        echo $a1->matriz[$i][$j] . "  ";
                                    }
                                ?><br><?php
                                }
                                ?></label>

                <p class="card-text m-3">El texto cifrado lo obtenemos leyendo de arriba hacia abajo.</p>
            </div>
        </div>
        <div class="card w-80 bg-primary">
            <div class="card-body">
                <h5 class="card-title text-center">Fin del detalle del cifrado</h5>
                <p class="card-text">Texto cifrado:</p>
                <input for="" type="text" class="mx-5 mb-3" value="<?php echo $a1->palabraCifrada ?>">
            </div>
        </div>

    </div>
<?php } ?>


<?php
if (isset($_REQUEST['descifrar'])) {
    $a1 = new cifradoColumnas($_REQUEST['cifrado'], $_REQUEST['col']);
    $a1->crearDesMatrizCol();
    $a1->armandoDescifradoCol();
?>

    <div class="card container bg-primary mt-4" style="width: 60rem;">

        <h5 class="card-title text-center mt-2">Descifrado por transposicion de columnas</h5>
        <div class="card w-80 bg-primary mt-2">
            <div class="card-body">
                <p class="card-text mb-1">El texto a descifrar fue el siguiente:</p>
                <label for="" class="mx-5 mb-3"><?php echo $a1->palabraCifrar; ?></label>
                <p class="card-text mb-1">El numero de columnas es:</p>
                <label for="" class="mx-5 mb-3"><?php echo $a1->cantCol; ?></label>
                <p class="card-text mb-1">El caracter de relleno es:</p>
                <label for="" class="mx-5 mb-3"><?php echo $a1->llenado; ?></label>
            </div>
        </div>

        <div class="card w-80 bg-primary">
            <div class="card-body">
                <h5 class="card-title text-center">Detalle del descifrado</h5>
                <p class="card-text m-3">El texto lo ordenamos de arriba hacia abajo, teniendo que formar <?php echo $a1->cantCol ?> columnas, por lo que tendremos <?php echo $a1->cantFilas ?> filas.</p>
                <label for=""><?php
                                for ($i = 0; $i < $a1->cantFilas; $i++) {
                                    for ($j = 0; $j < $a1->cantCol; $j++) {
                                        echo $a1->matriz[$i][$j] . "  ";
                                    }
                                ?><br><?php
                                }
                                ?></label>

                <p class="card-text m-3">El texto descifrado lo obtenemos leyendo de izquierda a derecha.</p>
            </div>
        </div>
        <div class="card w-80 bg-primary">
            <div class="card-body">
                <h5 class="card-title text-center">Fin del detalle del descifrado</h5>
                <p class="card-text">Texto descifrado:</p>
                <input for="" class="mx-5 mb-3" value="<?php echo $a1->palabraCifrada ?>">
            </div>
        </div>

    </div>
<?php } ?>