<?php

class RegistrarController extends Controller
{

    function registrar()
    {
        $d["title"] = "Registrarse";
        $this->set($d);
        $this->render(Constantes::REGISTRARVIEW);

    }

    function validarRegistro($datosUsuario)
    {
        header("Content-type: application/json");
        $datos = json_decode(utf8_decode($datosUsuario['data']));


        $usuario = new Usuario();
        $rol = new Rol();
        $usuario->setName($datos->nombre);
        $usuario->setLastname($datos->apellido);
        $usuario->setUserName($datos->nombreUsuario);
        // $usuario->setPassword($datos->pass);
        $usuario->setCuit($datos->cuit);
        $usuario->setSexo($datos->sexo);
        $usuario->setEmail($datos->correo);


        if (isset($datos->terminos)) {
            $terminosYcondiciones = $datos->terminos;
        } else {
            $terminosYcondiciones = "no";
        }

        $rolASetear = $rol->determinarRol();
        $usuario->setRol($rolASetear);

        $pass = $datos->pass;
        $pass2 = $datos->pass2;

        if (!$usuario->consultarUserName()) {
            throw new ExcentionRegistar("Nombre de usuario ya existente", CodigoError::ExcentionRegistar);
        } else if ($pass == $pass2) {
            //creo su logalizacion para luego setearla
            $localizacion = new Localizacion();
            $localizacion->setLatitud($datos->lat);
            $localizacion->setLongitud($datos->lon);


            $passSHA = sha1($pass2);
            $usuario->setPassword($passSHA);
            $usuario->setEstado(1);
            $id_user = $usuario->insertarRegistro();
            $_SESSION["logueado"] = $id_user;

            //Crear cuenta
            $this->crearCuenta($id_user);

            if (isset($id_user)) {
                $localizacion->setIdUser($id_user);
                $localizacion->insertarLocalizacion();
            }

        } else {
            throw new ExcentionRegistar("las contraseñas no son iguales", CodigoError::ExcentionRegistar);

        }


        echo json_encode(true);
    }


    function redireccionarALaPaginaDelUsuario()
    {
        $this->render(Constantes::INDEXVIEW);

    }

    function crearCuenta($id){


    }

}
