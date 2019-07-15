<?php


class miCuentaController extends Controller
{

    function miCuenta()
    {
        $d["title"] = "Mi Cuenta";
        $d["nombreUsuario"] = $_SESSION["name"];
        $cuenta = new Cuenta();
        $miDinero = $cuenta -> traerMiCuenta($_SESSION["logueado"]);
        $d["cuenta"] = $miDinero;
        $this->set($d);
        $this->render(Constantes::MICUENTAVIEW);
    }

}