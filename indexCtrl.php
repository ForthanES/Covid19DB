<?php

class indexCtrl
{
    public $ctrl = "inicio";
    public $act = null;

    public function capturar_opcion()
    {
        if (isset($_GET['ctrl'])) {
            $this->ctrl = $_GET['ctrl'];
            if (array_key_exists('act', $_GET)) {
                $this->act = $_GET['act'];
            }
        } else {
            $this->ctrl = "inicio";
            $this->act = null;
        }
    }

}
