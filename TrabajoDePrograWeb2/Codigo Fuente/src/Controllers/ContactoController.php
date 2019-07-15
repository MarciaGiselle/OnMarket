<?php


class ContactoController extends Controller
{


    function formularioContacto()
    {
        $d["nombreUsuario"]= $_SESSION["name"];
        $d["title"] = "Contacto";
        $this->set($d);

        $this->render(Constantes::CONTACTOVIEW);

    }

    function enviarMensaje($datos)
    {
        $d["title"] = "Contacto";
            $cuerpo = '
        <!DOCTYPE html>
        <html>
        <head>
         <title></title>
        </head>
        <body>
        '.$datos['cuerpo'].'
        </body>
        </html>';
            //para el envío en formato HTML
            $headers  = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
            //dirección del remitente
            $headers .= "From: ".$datos['nombre']." <".$datos['emisor'].">\r\n";
            //Una Dirección de respuesta, si queremos que sea distinta que la del remitente
            $headers .= "Reply-To: ".$datos['emisor']."\r\n";
            //Direcciones que recibián copia
            //$headers .= "Cc: ejemplo2@gmail.com\r\n";
            //direcciones que recibirán copia oculta
            //$headers .= "Bcc: ejemplo3@yahoo.com\r\n";
            if(mail($_POST['receptor'],$datos['asunto'],$cuerpo,$headers)){
                echo "<script>alert('Funcion \"mail()\" ejecutada, por favor verifique su bandeja de correo.');</script>";
            }else{
                echo "<script>alert('No se pudo enviar el mail, por favor verifique su configuracion de correo SMTP saliente.');</script>";
            }

            $this->set($d);

        $this->render(Constantes::CONTACTOVIEW);

    }
}