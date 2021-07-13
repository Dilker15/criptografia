<?php require_once("header.php"); ?>
    
    <div class="container">
        <?php include_once("menu_top.php") ?>

        <div class="card">
            <div class="card-header">
                Criptografía Clásica
            </div>
            <div class="card-body">
                <h5 class="card-title">Proyecto para Criptografía y Seguridad - UAGRM</h5>
                <p class="card-text">Content</p>
            </div>
        </div>



        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-dark text-light">                        
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Cifra de Desplazamiento</h5>
                        <p class="card-text">Este cifrado se basa principalmente en desplazamientos sobre un alfabeto.</p>
                    </div>
                    <div class="card-footer">
                        <a href="desplazamiento">
                            <button type="button" class="btn btn-dark">Ingresar</button>
                        </a>
                    </div>
                </div>
                
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header bg-warning text-dark">                        
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Cifra por Transposición</h5>
                        <p class="card-text"> método de cifra que consiste en cambiar de lugar los elementos del texto en claro en el criptrograma</p>
                    </div>
                    <div class="card-footer">
                        <a href="transposicion">
                            <button type="button" class="btn btn-warning">Ingresar</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header bg-danger text-dark">                        
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Sustitución</h5>
                        <p class="card-text">son los que han tenido un mayor desarrollo en la historia de la criptografía clásica</p>
                    </div>
                    <div class="card-footer">
                        <a href="sustitucion">
                            <button type="button" class="btn btn-danger">Ingresar</button>
                        </a>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once("footer.php"); ?>