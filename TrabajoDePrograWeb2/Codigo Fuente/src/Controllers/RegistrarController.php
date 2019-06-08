<?php
class RegistrarController extends Controller
{    


    function registrar()
    {
        $d["title"] = "Registrarse";
        $this->set($d);
        $this->render(Constantes::NAVVIEW);
        $this->render(Constantes::REGISTRARVIEW);
        $this->render(Constantes::FOOTERVIEW);
        
    }

     function validarRegistro($datosUsuario){

        $usuario=new Usuario();
        $rol= new Rol();
         $usuario->setName($datosUsuario["nombre"]);
         $usuario->setLastname($datosUsuario["apellido"]);
         $usuario->setUserName($datosUsuario["nombreUsuario"]);
         $usuario->setPassword($datosUsuario["pass"]);
         $usuario->setCuit($datosUsuario["cuit"]);
         $usuario->setSexo($datosUsuario["sexo"]);
         $usuario->setEmail($datosUsuario["correo"]);


       if(isset($datosUsuario["terminosYcondiciones"])){
        $terminosYcondiciones=$datosUsuario["terminosYcondiciones"];
        }else{
            $terminosYcondiciones="no";
        }

        $rolASetear=$rol->determinarRol();
       $usuario->setRol($rolASetear);
        $pass2=$datosUsuario["pass2"];
       
        if($usuario->consultarUserNameYPass($pass2)){
            if($usuario->validarFormatos($terminosYcondiciones)){
                 $usuario->insertarRegistro();
                 $this->redireccionarALaPaginaDelUsuario();
        }
        }

        }

    function redireccionarALaPaginaDelUsuario(){
            $this->render(Constantes::NAVLOGUEADOVIEW);
            $this->render(Constantes::INDEXVIEW);
            $this->render(Constantes::FOOTERVIEW);
           
    }

    /**
     * @return bool
     */
//no valida distintas constraseñas


  

    
    
}
