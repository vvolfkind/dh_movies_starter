<div class="row">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">
            <img src="https://www.digitalhouse.com/wp-content/themes/dh/assets/img/header-logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/movies">Listado de Peliculas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/actors">Actores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/genres">Peliculas por Genero</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/backoffice">Administrar</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="" method="get">
            @csrf
                <input class="form-control mr-sm-2" type="text" placeholder="Buscar..." aria-label="Buscar..." name="busqueda">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </nav>
</div>
<div class="spacer"></div>
