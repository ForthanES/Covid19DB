<?php
namespace Contagios;

class contagioCtrl
{
    public function alta()
    {
        if (isset($_POST['alta'])) {
            $paciente = $_POST['paciente'];
            $virus = $_POST['virus'];
            $fechades = $_POST['fechades'];
            contagio::altaContagio($paciente, $virus, $fechades);
            $this->ver();
        }
    }

    public function ver()
    {
        header('Location:index.php?ctrl=paciente&act=ver');
        die();
    }

    public function modificar()
    {
        if (isset($_POST['contagio'])) {
            $paciente = $_POST['contagio'];
            $virus = $_POST['virus'];
            $fechades = $_POST['fechades'];
            $fechafin = date('Y-m-d');
            contagio::modificarContagio($paciente, $virus, $fechades, $fechafin);
            $this->ver();
        }
    }

    public function baja()
    {

    }

}
