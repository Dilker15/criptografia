<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Criptografía y Seguridad</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                        <li><a class="dropdown-item" href="<?= constant("URL") ?>transposicion/series.php">Series</a></li>
                        <li><a class="dropdown-item" href="<?= constant("URL") ?>transposicion/columnas.php">Columnas</a></li>
                        <li><a class="dropdown-item" href="<?= constant("URL") ?>transposicion/filas.php">Filas</a></li>
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
</nav>