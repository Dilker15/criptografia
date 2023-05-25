<?php include("../includes/header.php") ?>
<?php include("../negocio/cifrado_filas.php") ?>


<div class="card container bg-secondary" style="width: 60rem;">
    <div class="card-header">
    <h1 class="text-center mt-4 text-light">Cifrado de transposicion por fila</h1>
    </div>
    <form action="">
        <div class="card-body">
            <div class="card w-80 m-2">
                <div class="card-body">
                    <div class="card-header">
                        
                    </div>
                    <label for="cifrar" class="form-label">Palabra a cifrar</label>
                    <textarea name="cifrado" id="cifrar" placeholder="palabra a cifrar" required class="form-control"><?php if (isset($_REQUEST['cifrado'])) {
                                                                                                                                    $aux = $_REQUEST['cifrado'];
                                                                                                                                    echo $aux;
                                                                                                                                } ?></textarea>
                </div>
            </div>

            <div class="card w-80 m-2">
                <label>Clave transposicion por fila</label>
                <div class="card-body">
                    <div>
                        <label for="columna" class="form-label m">Numero de filas</label>
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
            <div class="card w-80 m-2">
                <div class="card-body">
                    <input type="submit" class="btn btn-success " name="cifrar" value="CifrarPalabra">
                    <input type="submit" class="btn btn-success " name="descifrar" value="Descifrar palabra">

                    <a type="submit" href="cifradoFil.php" class="btn btn-success " name="resetear" value="Resetear">
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
    $a1 = new cifradoFil($_REQUEST['cifrado'], $_REQUEST['col']);
    $a1->crearMatrizFil();
    $a1->armandoCifradoFil();
?>
    <div class="card container bg-secondary mt-4" style="width: 60rem;">

        <h5 class="card-title text-center mt-2 text-light">Cifrado por transposicion de filas</h5>
        <div class="card w-80  m-2">
            <div class="card-body">
                <p class="card-text mb-1">El texto a cifrar fue el siguiente:</p>
                <label for="" class="mx-5 mb-3"><?php echo $a1->palabraCifrar; ?></label>
                <p class="card-text mb-1">El numero de filas es:</p>
                <label for="" class="mx-5 mb-3"><?php echo $a1->cantFil; ?></label>
                <p class="card-text mb-1">El caracter de relleno es:</p>
                <label for="" class="mx-5 mb-3"><?php echo $a1->llenado; ?></label>
            </div>
        </div>

        <div class="card w-80 m-2">
            <div class="card-body">
                <h5 class="card-title text-center text-light">Detalle del cifrado</h5>
                <p class="card-text m-3">El texto lo ordenamos de arriba hacia abajo, teniendo que formar <?php echo $a1->cantFil ?> filas, dandonos <?php echo $a1->cantCol ?> columnas, si sobran espacios se rellenaran con <?php echo $a1->llenado ?></p>
                <label for=""><?php
                                for ($i = 0; $i < $a1->cantFil; $i++) {
                                    for ($j = 0; $j < $a1->cantCol; $j++) {
                                        echo $a1->matriz[$i][$j] . "  ";
                                    }
                                ?><br><?php
                                }
                                ?></label>

                <p class="card-text m-3">El texto cifrado lo obtenemos leyendo de izquierda a derecha.</p>
            </div>
        </div>
        <div class="card w-80 m-2">
            <div class="card-body">
                <h5 class="card-title text-center text-light">Fin del detalle del cifrado</h5>
                <p class="card-text">Texto cifrado:</p>
                <input for="" type="text" class="mx-5 mb-3" value="<?php echo $a1->palabraCifrada ?>">
            </div>
        </div>

    </div>

<?php } ?>

<?php
if (isset($_REQUEST['descifrar'])) {
    $a1 = new cifradoFil($_REQUEST['cifrado'], $_REQUEST['col']);
    $a1->crearDesMatrizFil();
    $a1->armandoDescifradoFil();
?>
    <div class="card container bg-secondary mt-4" style="width: 60rem;">

        <h5 class="card-title text-center mt-2">Descifrado por transposicion de filas</h5>
        <div class="card w-80 bg-secondary mt-2">
            <div class="card-body">
                <p class="card-text mb-1">El texto a descifrar fue el siguiente:</p>
                <label for="" class="mx-5 mb-3"><?php echo $a1->palabraCifrar; ?></label>
                <p class="card-text mb-1">El numero de filas es:</p>
                <label for="" class="mx-5 mb-3"><?php echo $a1->cantFil; ?></label>
                <p class="card-text mb-1">El caracter de relleno es:</p>
                <label for="" class="mx-5 mb-3"><?php echo $a1->llenado; ?></label>
            </div>
        </div>

        <div class="card w-80 bg-secondary">
            <div class="card-body">
                <h5 class="card-title text-center">Detalle del descifrado</h5>
                <p class="card-text m-3">El texto lo ordenamos de derecha a izquierda, teniendo que formar <?php echo $a1->cantFil ?> filas, dandonos <?php echo $a1->cantCol ?> columnas.</p>
                <label for=""><?php
                                for ($i = 0; $i < $a1->cantFil; $i++) {
                                    for ($j = 0; $j < $a1->cantCol; $j++) {
                                        echo $a1->matriz[$i][$j] . "  ";
                                    }
                                ?><br><?php
                                }
                                ?></label>
                <p class="card-text m-3">El texto descifrado lo obtenemos leyendo de arriba hacia abajo.</p>
            </div>
        </div>
        <div class="card w-80 bg-secondary">
            <div class="card-body">
                <h5 class="card-title text-center">Fin del detalle del descifrado</h5>
                <p class="card-text">Texto descifrado:</p>
                <input for="" class="mx-5 mb-3" value="<?php echo $a1->palabraCifrada ?>"></input>
            </div>
        </div>

    </div>

<?php } ?>