<?php
namespace Pacientes;

class pacienteCtrl
{
    public function alta()
    {
        if (isset($_POST['alta'])) {
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            $clave = hash('sha256', $_POST['clave']);

            Paciente::altaPaciente($nombre, $clave, $edad);
            $this->conectar();
        }
    }

    public function conectar()
    {
        if (isset($_POST['conectar'])) {
            $nombre = $_POST['nombre'];
            $clave = hash('sha256', $_POST['clave']);
        }
        $paciente = Paciente::conectar($nombre, $clave);
        if ($paciente != null) {
            $_SESSION['paciente'] = serialize($paciente);
        }
        header('Location:index.php#');
        die();
    }

    public function ver()
    {
        $contagios = Paciente::ver();
        if (!empty($contagios)) {
            $_SESSION['contagios'] = serialize($contagios);
        }
        require 'Pacientes\pacienteVerView.php';
    }

    public function modificar()
    {
        if (isset($_POST['mod'])) {
            $cod = $_POST['mod'];
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            $clave = hash('sha256', $_POST['clave']);
            Paciente::modificarPaciente($cod, $nombre, $edad);
            $this->conectar();
        }
        require 'Pacientes\pacienteModView.php';
    }

    public function baja()
    {
        if (isset($_POST['mod'])) {
            $nombre = $_POST['nombre'];
            $clave = hash('sha256', $_POST['clave']);
            Paciente::bajaPaciente($nombre, $clave);
            $this->salir();
        }
    }

    public function salir()
    {
        if (isset($_SESSION['paciente'])) {
            unset($_SESSION['paciente']);
            header('Location:index.php');
            die();
        }
    }
}
