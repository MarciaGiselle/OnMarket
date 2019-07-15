<?php


class VistaAdminController extends Controller
{
function admin()
    {
        $d["title"] = "Cuenta Admin";
        $d["nombreUsuario"]= $_SESSION["name"];
        $this->set($d);
        $this->render(Constantes::INDEXADMINVIEW);

    }
}