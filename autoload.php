<?php
function Autoload($clase)
{
    //echo $clase;
    require_once $clase . ".php";
}
spl_autoload_register('Autoload');
