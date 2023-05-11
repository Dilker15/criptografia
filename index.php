<?php require_once("header.php"); ?>
    
    <div class="container m-0" style="width:100vh">
        <?php include_once("menu_top.php") ?>
        <div class="row justify-content-md-center my-5" >
            <div class="col col-lg-6">
            <div class="card">
            <div class="card-header">
                Criptografía Clásica
            </div>
            <div class="card-body">
                <h5 class="card-title">Proyecto para Criptografía y Seguridad - UAGRM</h5>
                <p class="card-text">Content</p>
            </div>
        </div>



        <div class="row d-flex flex-column">
            <div class="col  mt-4">
                <div class="card w-75 m-auto">
                    <div class="card-header bg-dark text-light">                        
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Cifra de Desplazamiento</h5>
                        <p class="card-text">Este cifrado se basa principalmente en desplazamientos sobre un alfabeto.</p>
                    </div>
                    <div class="card-footer">
                        <a href="<?= constant("URL") ?>desplazamiento/puro.php">
                            <button type="button" class="btn btn-dark">Puro</button>
                        </a>
                        <a href="<?= constant("URL") ?>desplazamiento/con_clave.php">
                            <button type="button" class="btn btn-dark">Con Clave</button>
                        </a>
                    </div>
                </div>
                
            </div>
            <div class="col mt-4">
                <div class="card w-75 m-auto">
                    <div class="card-header bg-warning text-dark">                        
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Cifra por Transposición</h5>
                        <p class="card-text"> método de cifra que consiste en cambiar de lugar los elementos del texto en claro en el criptrograma</p>
                    </div>
                    <div class="card-footer">
                        <a href="<?= constant("URL") ?>transposicion/grupos.php">
                            <button type="button" class="btn btn-warning">Grupos</button>
                        </a>
                        <a href="<?= constant("URL") ?>transposicion/presentacion/cifradoSerie.php">
                            <button type="button" class="btn btn-warning">Series</button>
                        </a>
                        <a href="<?= constant("URL") ?>transposicion/presentacion/cifradoCol.php">
                            <button type="button" class="btn btn-warning">Columnas</button>
                        </a>
                        <a href="<?= constant("URL") ?>transposicion/presentacion/cifradoFil.php">
                            <button type="button" class="btn btn-warning">Filas</button>
                        </a>
                        <a href="<?= constant("URL") ?>transposicion/zig_zag.php">
                            <button type="button" class="btn btn-warning">Zig-Zag</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col  mt-4">
                <div class="card w-75 m-auto">
                    <div class="card-header bg-danger text-dark">                        
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Sustitución</h5>
                        <p class="card-text">son los que han tenido un mayor desarrollo en la historia de la criptografía clásica</p>
                    </div>
                    <div class="card-footer">
                        <a href="<?= constant("URL") ?>sustitucion/mono_alfabetica.php">
                            <button type="button" class="btn btn-danger">Mono alfabética</button>
                        </a>
                        <a href="<?= constant("URL") ?>sustitucion/poli_alfabetica.php">
                            <button type="button" class="btn btn-danger">Poli alfabética</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
            </div>
        </div>
        

<?php require_once("footer.php"); ?>