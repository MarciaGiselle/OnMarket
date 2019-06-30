<?php


class VistaAdminController extends Controller
{
function admin()
    {
        $d["title"] = "Cuenta Admin";
        $this->set($d);


        $this->render(Constantes::INDEXADMINVIEW);

    }
}