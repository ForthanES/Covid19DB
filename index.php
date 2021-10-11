<?php
require_once "autoload.php";
require_once "Database/DB.php";
require_once 'Indice/header.php';

$indexCtrl = new indexCtrl();
$indexCtrl->capturar_opcion();

$ctrl = $indexCtrl->ctrl . 's\\' . $indexCtrl->ctrl . 'Ctrl';

if ($indexCtrl->ctrl != "inicio") {
    $controlador = new $ctrl();
    switch ($indexCtrl->act) {
        case 'alta':
            $controlador->alta();
            break;
        case 'conectar':
            $controlador->conectar();
            break;
        case 'ver':
            $controlador->ver();
            break;
        case 'modificar':
            $controlador->modificar();
            break;
        case 'baja':
            break;
        case 'contacto':
            require_once 'Indice/contacto.php';
            break;
        case 'registro':
            require_once 'Indice/registro.html';
            break;
        case 'salir':
            $controlador->salir();
            break;
        default:
            break;
    };
} else {
    require_once 'Indice/main.php';
}

require_once 'Indice/footer.html';