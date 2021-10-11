<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-header p-0 border">
        <div class="container-fluid w-100 row">
            <div class="w-100 d-flex flex-row">
                <a class="navbar-brand h3 col-1" href="index.php">Home</a>
                <ul class="navbar-nav d-flex flex-row col-6">
                    <?php if (isset($_SESSION['paciente'])) {?>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="?ctrl=paciente&act=contacto">Contacto</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="?ctrl=paciente&act=ver">Usuario</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="?ctrl=paciente&act=modificar">Modificar mis datos</a>
                    </li>
                    <?php } else {?>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="?ctrl=paciente&act=registro">Registrarme</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="">(usuario abc123. creado por defecto)</a>
                    </li>
                    <?php }?>
                </ul>
                <div class="py-1 col-5 d-flex justify-content-end">
                <?php if (!isset($_SESSION['paciente'])) {?>
                    <form class="form-inline row" action="?ctrl=paciente&act=conectar" method="POST">
                        <input type="hidden" name="conectar">
                        <div class="form-group col-5">
                            <input type="text" class="form-control" name="nombre" placeholder="Usuario">
                        </div>
                        <div class="form-group col-5">
                            <input type="password" class="form-control" name="clave" placeholder="Clave">
                        </div>
                        <button type="submit" class="btn btn-primary col-2">Entrar</button>
                    </form>
                <?php } else { $paciente = unserialize($_SESSION['paciente']);?>
                        <span class="mx-2">Bienvenido <?php echo $paciente->getNome() ?></span>
                        <a href="index.php?ctrl=paciente&act=salir">Desconectar</a>
                <?php }?>
                </div>
            </div>
        </div>
    </nav>
</header>