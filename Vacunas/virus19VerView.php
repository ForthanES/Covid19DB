<?php
namespace Vacunas;

use database\DBconexion;
?>
<table class="table mt-2">
    <thead>
        <tr><th scope="row">Tipo de Virus</th><th scope="row">Tiempo de Incubación</th></tr>
    </thead>
    <tbody>
<?php
$conn = DBconexion::connect();
$data = $conn->query("SELECT tipo, incubacion FROM virus");
if ($conn->affected_rows == 0) {
    ?>
        <tr><td class="text-center" colspan="2">No hay vacunas registradas</td></tr>
    <?php
}
while ($row = $data->fetch_assoc()) {
    ?>
        <tr><td scope="col"><?=$row['tipo']?></td><td scope="col"><?=$row['incubacion']?></td></tr>
    <?php
}
?>
    </tbody>
</table>