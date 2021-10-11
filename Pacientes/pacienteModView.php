<?php
namespace Pacientes;

if (isset($_SESSION['paciente'])) {
    $paciente = unserialize($_SESSION['paciente']);
    ?>
<div class="p-2 text-center">
    <h1>Mis datos</h1>
    <div class="d-flex justify-content-center">
    <form action="?ctrl=logueado&act=modificar" method="POST" class="w-50">
        <input type="hidden" name="mod" value="<?php echo $paciente->getCod(); ?>">
        <div class="form-group py-4 ">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $paciente->getNome(); ?>">
            <label for="edad">Edad</label>
            <input type="number" class="form-control" id="edad" name="edad" value="<?php echo $paciente->getEdad(); ?>" min=0>
        </div>
        <div class="form-group">
            <label for="clave">Contraseña</label>
            <input type="password" class="form-control" id="clave" name="clave" aria-describedby="claveinfo" required>
            <small id="claveinfo" class="form-text text-muted">No compartas tu contraseña.</small>
        </div>
        <div class="form-group py-4 d-flex flex-column">
            <button type="submit" name="modificar" class="btn btn-primary">Modificar</button>
            <hr/>
            <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>
        </div>
    </form>
    </div>
</div>
<?php }?>