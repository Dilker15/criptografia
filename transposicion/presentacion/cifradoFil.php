<?php include("../includes/header.php") ?>
<?php include("../negocio/cifrado_filas.php") ?>

<h1 class="text-center mt-4">Cifrado de transposicion por fila</h1>
<div class="card container bg-primary" style="width: 60rem;">
    <form action="">
        <div class="card-body">
            <div class="card w-80 bg-primary">
                <div class="card-body">
                    <label for="cifrar" class="form-label">Palabra a cifrar</label>
                    <textarea name="cifrado" id="cifrar" placeholder="palabra a cifrar" required class="form-control"></textarea>
                </div>
            </div>

            <div class="card w-80 bg-primary">
                <label>Clave transposicion por columnas</label>
                <div class="card-body">
                    <div>
                        <label for="columna" class="form-label m">Numero de columnas</label>
                        <input type="number" id="columna" name="col" required>
                        <label for="relleno" class="form-label">Caracter de relleno</label>
                        <input type="text" id="relleno" name="relleno">
                    </div>
                </div>
            </div>
            <div class="card w-80 bg-primary">
                <div class="card-body">
                    <input type="submit" class="btn btn-success " name="cifrar" value="CifrarPalabra">
                    <input type="submit" class="btn btn-success " name="descifrar" value="Descifrar palabra">

                    <a type="submit" href="cifradoFil.php" class="btn btn-success " name="resetear" value="Resetear">
                        resetear</a>
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
    <div class="card container bg-primary mt-4" style="width: 60rem;">
    
    <h5 class="card-title text-center mt-2">Cifrado por transposicion de filas</h5>
        <div class="card w-80 bg-primary mt-2">
            <div class="card-body">
                <p class="card-text">El texto a cifrar fue el siguiente:</p>
                <label for=""><?php echo $a1->palabraCifrar; ?></label>
                <p class="card-text">El numero de columnas es:</p>
                <label for=""><?php echo $a1->cantCol; ?></label>
                <p class="card-text">El caracter de relleno es:</p>
                <label for=""><?php echo $a1->llenado; ?></label>
            </div>
        </div>

        <div class="card w-80 bg-primary">
            <div class="card-body">
                <h5 class="card-title text-center">Detalle del cifrado</h5>

                <label for=""><?php 
                    for ($i=0; $i < $a1->cantFil; $i++) { 
                        for ($j=0; $j < $a1->cantCol; $j++) { 
                            echo $a1->matriz[$i][$j]. "  ";
                        }
                        ?><br><?php 
                    }
                ?></label>

                <p class="card-text">El texto cifrado lo obtenemos leyendo de izquierda a derecha.</p>
            </div>
        </div>
        <div class="card w-80 bg-primary">
            <div class="card-body">
                <h5 class="card-title text-center">Fin del detalle del cifrado</h5>
                <p class="card-text">Texto cifrado:</p>
                <label for=""><?php echo $a1->palabraCifrada ?></label>
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
    <div class="card container bg-primary mt-4" style="width: 60rem;">
    
    <h5 class="card-title text-center mt-2">Cifrado por transposicion de filas</h5>
        <div class="card w-80 bg-primary mt-2">
            <div class="card-body">
                <p class="card-text">El texto a cifrar fue el siguiente:</p>
                <label for=""><?php echo $a1->palabraCifrar; ?></label>
                <p class="card-text">El numero de columnas es:</p>
                <label for=""><?php echo $a1->cantCol; ?></label>
                <p class="card-text">El caracter de relleno es:</p>
                <label for=""><?php echo $a1->llenado; ?></label>
            </div>
        </div>

        <div class="card w-80 bg-primary">
            <div class="card-body">
                <h5 class="card-title text-center">Detalle del cifrado</h5>

                <label for=""><?php 
                    for ($i=0; $i < $a1->cantFil; $i++) { 
                        for ($j=0; $j < $a1->cantCol; $j++) { 
                            echo $a1->matriz[$i][$j]. "  ";
                        }
                        ?><br><?php 
                    }
                ?></label>
                <p class="card-text">El texto cifrado lo obtenemos leyendo de arriba hacia abajo.</p>
            </div>
        </div>
        <div class="card w-80 bg-primary">
            <div class="card-body">
                <h5 class="card-title text-center">Fin del detalle del cifrado</h5>
                <p class="card-text">Texto cifrado:</p>
                <label for=""><?php echo $a1->palabraCifrada ?></label>
            </div>
        </div>

    </div>

<?php } ?>