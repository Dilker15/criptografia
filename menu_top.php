<h2 class="text-center mt-5">Criptografía y Seguridad</h2>


<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container-fluid">
                        <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= constant("URL") ?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= constant("URL") ?>informacion_grupo.php">Integrantes</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="<?= constant("URL") ?>desplazamiento" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Desplazamiento
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= constant("URL") ?>desplazamiento/puro.php">Puro</a></li>
                                <li><a class="dropdown-item" href="<?= constant("URL") ?>desplazamiento/con_clave.php">Puro con Palabra Clave</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Transposicion
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= constant("URL") ?>transposicion/grupos.php">Grupos</a></li>
                                <li><a class="dropdown-item" href="<?= constant("URL") ?>transposicion/presentacion/cifradoSerie.php">Series</a></li>
                                <li><a class="dropdown-item" href="<?= constant("URL") ?>transposicion/presentacion/cifradoCol.php">Columnas</a></li>
                                <li><a class="dropdown-item" href="<?= constant("URL") ?>transposicion/presentacion/cifradoFil.php">Filas</a></li>
                                <li><a class="dropdown-item" href="<?= constant("URL") ?>transposicion/zig_zag.php">Zig-Zag</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sustitución 
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= constant("URL") ?>sustitucion/mono_alfabetica.php">Mono alfabética</a></li>
                                <li><a class="dropdown-item" href="<?= constant("URL") ?>sustitucion/poli_alfabetica.php">Poli alfabética</a></li>
                            </ul>
                        </li>
                    </ul>
                        </div>
                            
        </div>
       
        
    </div>
</nav>