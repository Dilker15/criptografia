<?php include("../includes/header.php") ?>
<?php include("../negocio/cifrado_serie.php") ?>

<?php
if ((isset($_REQUEST['cifrar']) or isset($_REQUEST['descifrar'])) and (!isset($_REQUEST['primerSerie']) or !isset($_REQUEST['segundaSerie']) or !isset($_REQUEST['terceraSerie']))) { ?>
    <div class="container mt-2 alert alert-success text-center" role="alert">
        fijate bien el orden de serie, deben de ser distintas, y estar presionadas
    </div>
<?php  } ?>

<h1 class="text-center mt-4">Cifrado de transposicion por serie</h1>
<div class="card container bg-secondary " style="width: 60rem;">
    <div class="card-body">
        <form action="cifradoSerie.php" method="GET">
            <div class="mb-3">
                <label for="cifrar" class="form-label">Palabra a cifrar </label>
                <textarea type="text" class="form-control" placeholder="palabra a cifrar" id="cifrar" name="cifrado" required><?php if (isset($_REQUEST['cifrado'])) {
                                                                                                                                    $aux = $_REQUEST['cifrado'];
                                                                                                                                    echo $aux;
                                                                                                                                } ?></textarea>
            </div>
            <div class="mb-3">
                <label for="cifrar" class="form-label">Orden de la serie </label>

                <div class="row card-columns mb-3">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Primer serie</h5>
                                <p class="card-text"></p>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="primerSerie" id="flexRadioDefault1" value="1" <?php
                                                                                                                                        if (isset($_REQUEST['primerSerie'])) {
                                                                                                                                            if ($_REQUEST['primerSerie'] == 1) {
                                                                                                                                        ?> checked <?php
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                                    ?>>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        serie primo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="primerSerie" id="flexRadioDefault2" value="2" <?php
                                                                                                                                        if (isset($_REQUEST['primerSerie'])) {
                                                                                                                                            if ($_REQUEST['primerSerie'] == 2) {
                                                                                                                                        ?> checked <?php
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                                    ?>>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        serie par
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="primerSerie" id="flexRadioDefault3" value="3" <?php
                                                                                                                                        if (isset($_REQUEST['primerSerie'])) {
                                                                                                                                            if ($_REQUEST['primerSerie'] == 3) {
                                                                                                                                        ?> checked <?php
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                                    ?>>
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        serie los demas
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Segunda serie</h5>
                                <p class="card-text"></p>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="segundaSerie" id="flexRadioDefault4" value="1" <?php
                                                                                                                                        if (isset($_REQUEST['segundaSerie'])) {
                                                                                                                                            if ($_REQUEST['segundaSerie'] == 1) {
                                                                                                                                        ?> checked <?php
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                                    ?>>
                                    <label class="form-check-label" for="flexRadioDefault4">
                                        serie primo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="segundaSerie" id="flexRadioDefault5" value="2" <?php
                                                                                                                                        if (isset($_REQUEST['segundaSerie'])) {
                                                                                                                                            if ($_REQUEST['segundaSerie'] == 2) {
                                                                                                                                        ?> checked <?php
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                                    ?>>
                                    <label class="form-check-label" for="flexRadioDefault5">
                                        serie par
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="segundaSerie" id="flexRadioDefault6" value="3" <?php
                                                                                                                                        if (isset($_REQUEST['segundaSerie'])) {
                                                                                                                                            if ($_REQUEST['segundaSerie'] == 3) {
                                                                                                                                        ?> checked <?php
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                                    ?>>
                                    <label class="form-check-label" for="flexRadioDefault6">
                                        serie los demas
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Tercer serie</h5>
                                <p class="card-text"></p>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="terceraSerie" id="flexRadioDefault7" value="1" <?php
                                                                                                                                        if (isset($_REQUEST['terceraSerie'])) {
                                                                                                                                            if ($_REQUEST['terceraSerie'] == 1) {
                                                                                                                                        ?> checked <?php
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                                    ?>>
                                    <label class="form-check-label" for="flexRadioDefault7">
                                        serie primo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="terceraSerie" id="flexRadioDefault8" value="2" <?php
                                                                                                                                        if (isset($_REQUEST['terceraSerie'])) {
                                                                                                                                            if ($_REQUEST['terceraSerie'] == 2) {
                                                                                                                                        ?> checked <?php
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                                    ?>>
                                    <label class="form-check-label" for="flexRadioDefault8">
                                        serie par
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="terceraSerie" id="flexRadioDefault9" value="3" <?php
                                                                                                                                        if (isset($_REQUEST['terceraSerie'])) {
                                                                                                                                            if ($_REQUEST['terceraSerie'] == 3) {
                                                                                                                                        ?> checked <?php
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                                    ?>>
                                    <label class="form-check-label" for="flexRadioDefault9">
                                        serie los demas
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" name="sinEspacio" id="flexCheckDefault" <?php
                                                                                                                        if (isset($_REQUEST['sinEspacio'])) {
                                                                                                                        ?> checked <?php
                                                                                                                                }
                                                                                                                                    ?>>
                    <label class="form-check-label" for="flexCheckDefault">
                        Cifrar sin espacios
                    </label>
                </div>
                <div class="">
                    <input type="submit" class="btn btn-success " name="cifrar" value="CifrarPalabra">
                    <input type="submit" class="btn btn-success " name="descifrar" value="Descifrar palabra">

                    <a type="submit" href="cifradoSerie.php" class="btn btn-success " name="resetear" value="Resetear">
                        resetear</a>
                    <a type="submit" href="../../index.php" class="btn btn-success " name="resetear" value="Resetear">
                        menu</a>
                </div>
        </form>
    </div>
</div>
</div>


<?php if (isset($_REQUEST['cifrar'])) { ?>
    <?php
    if (!isset($_REQUEST['primerSerie']) or !isset($_REQUEST['segundaSerie']) or !isset($_REQUEST['terceraSerie'])) { ?>
        <!-- no hara nada -->
    <?php  } else { ?>

        <?php
        $cifra = new CifradoSerie();
        if (isset($_REQUEST['sinEspacio'])) {
            $cifra->setcifrarSinEspacios($_REQUEST['cifrado']);
        } else {
            $cifra->setcifrar($_REQUEST['cifrado']);
        }
        $cifra->cifradoSerie($_REQUEST['primerSerie'], $_REQUEST['segundaSerie'], $_REQUEST['terceraSerie']);
        $cifra->armandoCifrado();
        ?>
        <h1 class="text-center">Cifrado</h1>
        <div class="card container bg-secondary mt-3 mb-3" style="width: 60rem;">
            <div class="card-body">
                <h4>La palabra a cifrar es : </h4>
                <label for="">
                    <?php echo $cifra->cifrar; ?>
                </label>

                <h3>Orden de permutacion</h3>
                <label for="palabracifrada">
                    1er orden de serie : <?php echo $cifra->mostrarSerieOrden($_REQUEST["primerSerie"]); ?>
                </label><br>
                <label for="palabracifrada">
                    2da orden de serie : <?php echo $cifra->mostrarSerieOrden($_REQUEST["segundaSerie"]); ?>
                </label><br>
                <label for="palabracifrada">
                    3ra orden de serie : <?php echo $cifra->mostrarSerieOrden($_REQUEST["terceraSerie"]); ?>
                </label>

                <h4>Palabra cifrada : </h4>
                <input type="text" for="palabracifrada" value="<?php echo $cifra->palabraCifrada; ?>">
            </div>
        </div>


<?php }
} ?>

<?php if (isset($_REQUEST['descifrar'])) { ?>
    <?php
    if (!isset($_REQUEST['primerSerie']) or !isset($_REQUEST['segundaSerie']) or !isset($_REQUEST['terceraSerie'])) { ?>
        <!-- no hara nada -->
    <?php  } else { ?>

        <?php
        $cifra = new CifradoSerie();
        if (isset($_REQUEST['sinEspacio'])) {
            $cifra->setcifrarSinEspacios($_REQUEST['cifrado']);
        } else {
            $cifra->setcifrar($_REQUEST['cifrado']);
        }
        $cifra->cifradoSerie($_REQUEST['primerSerie'], $_REQUEST['segundaSerie'], $_REQUEST['terceraSerie']);
        $cifra->armandoDescifrado();
        ?>
        <h1 class="text-center">Descifrado</h1>
        <div class="card container bg-secondary mt-3 mb-3" style="width: 60rem;">
            <div class="card-body">
                <h4>Palabra a descifrar : </h4>
                <label for="palabracifrada">
                    <?php echo $cifra->cifrar; ?>
                </label>
                <h3>Orden de permutacion</h3>
                <label for="palabracifrada">
                    1er orden de serie : <?php echo $cifra->mostrarSerieOrden($_REQUEST["primerSerie"]); ?>
                </label><br>
                <label for="palabracifrada">
                    2da orden de serie : <?php echo $cifra->mostrarSerieOrden($_REQUEST["segundaSerie"]); ?>
                </label><br>
                <label for="palabracifrada">
                    3ra orden de serie : <?php echo $cifra->mostrarSerieOrden($_REQUEST["terceraSerie"]); ?>
                </label>
                <h4>Palabra descifrada : </h4>
                <input type="text" for="palabracifrada" value="<?php echo $cifra->palabraCifrada; ?>">
                    
                </input>
            </div>
        </div>

    <?php } ?>
<?php } ?>