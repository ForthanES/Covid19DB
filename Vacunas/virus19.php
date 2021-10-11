<?php
namespace Vacunas;

class Virus19
{
    // Atributos
    private $id;
    private $tipo;
    private $fechades;
    private $fechafin;

    // Constructor
    public function __construct($id, $tipo, $fechades, $fechafin)
    {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->fechades = $fechades;
        $this->fechafin = $fechafin;
    }
    // Métodos

    // Getter & Setter
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getFechades()
    {
        return $this->fechades;
    }

    public function setFechades($fechades)
    {
        $this->fechades = $fechades;
    }

    public function getFechafin()
    {
        return $this->fechafin;
    }

    public function setFechafin($fechafin)
    {
        $this->fechafin = $fechafin;
    }
}
