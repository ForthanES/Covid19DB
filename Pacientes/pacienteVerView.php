<?php
namespace Pacientes;

use database\DBconexion;

if (isset($_SESSION['paciente']) && isset($_SESSION['contagios'])) {
    $paciente = unserialize($_SESSION['paciente']);
    $contagios = unserialize($_SESSION['contagios']);
    ?>

<div class="p-2">
    <h1 class="text-center">Historial de Contagios</h1>
    <div class="w-100 p-2">
        <span class="btn btn-light">Nombre: <?php echo $paciente->getNome() ?></span>
        <span class="btn btn-light">Edad: <?php echo $paciente->getEdad() ?> años</span>
    </div>
<table class="table mt-2">
    <thead>
        <tr>
            <th scope="row">Tipo de Virus</th>
            <th scope="row">Fecha de Detección</th>
            <th scope="row">Fecha de Finalización</th>
        </tr>
    </thead>
    <tbody>
    <?php if (empty($contagios)) {?>
        <tr><td class="text-center" colspan="3">No hay registros de contagios</td></tr>
    <?php } else {
        foreach ($contagios as $contagio) {?>
        <tr>
        <?php if ($contagio->getFechafin() == "") {?>
            <form action="?ctrl=contagio&act=modificar" method="POST">
                <input type="hidden" name="contagio" value="<?=$paciente->getCod()?>">
                <td><input class="form-control" type="text" name="virus" value="<?=$contagio->getVirus()?>"></td>
                <td><input class="form-control" type="text" name="fechades" value="<?=$contagio->getFechades()?>"></td>
                <td><button class="form-control" type="submit" name="modificar">Finalizar</button></td>
            </form>
        <?php } else {?>
            <td><?=$contagio->getVirus()?></td>
            <td><?=$contagio->getFechades()?></td>
            <td><?=$contagio->getFechafin()?></td>
        <?php }?>
        </tr>
        <?php }?>
    <?php }?>
        <tr>
            <form action="?ctrl=contagio&act=alta" method="POST">
                <input type="hidden" name="paciente" value="<?=$paciente->getCod()?>">
                <td>
                    <select class="form-control" name="virus">
                        <option selected>Seleccione el contagio</option>
        <?php
$conn = DBconexion::connect();
    $data = $conn->query("SELECT id, tipo FROM virus");
    while ($row = $data->fetch_assoc()) {
        ?>
                            <option value="<?=$row['id']?>"><?=$row['tipo']?></option>
        <?php }?>
                    </select>
                </td>
                <td><input class="form-control" type="date" name="fechades" value="<?=date('Y-m-d')?>"></td>
                <td><button class="form-control" type="submit" name="alta">Informar</button></td>
            </form>
        </tr>
    </tbody>
</table>
</div>
<?php }?>