<?php
/**
 * Created by PhpStorm.
 * User: Globons
 * Date: 11/5/2019
 * Time: 10:23
 */

abstract class Constantes
{
    //Vistas
    const INDEXVIEW = "index";
    const USUARIOVIEW = "indexUsuario";
 	const REGISTRARVIEW = "registrar";
	const PUBLICARVIEW = "publicar";
    const BUSCADORVIEW = "buscador";
    const MOSTRARVIEW = "MostrarProducto";
    const COMPRAVIEW="compra";
    const CARRITOVIEW = "carrito";
    const NAVLOGUEADOVIEW = "navLogueado";
    const NAVNOLOGUEADOVIEW = "navNoLogueado";
    const PUBLICACIONESVIEW="mispublicaciones";
    const MODIFICARPUBLICACIONESVIEW="modificar";
    const INDEXADMINVIEW="vistaAdmin";
    const BUSCARUSERSVIEW="buscarUsuarios";
    const MISCOMPRASVIEW="misCompras";
    const MICUENTAVIEW="miCuenta";
    const PUBLICACIONESADMINVIEW = "publicacionesAdmin";
    const LIQUIDACIONVIEW ="liquidacion";
    const PREGUNTASVIEW ="preguntas";
    const COMPRASADMINVIEW ="comprasAdmin";


    const ESTADISTICASVIEW="estadisticas";

    const ELIMINARPUBLICACIONESVIEW="eliminarProducto";

    const PERFILESVIEW="perfiles";
    const BLOQUEARWIEW="bloquear";
    const DESBLOQUEARWIEW="desbloquear";


    const INICIOVIEW = "inicio";

    //Propiedades Usuario
    const USUARIONOMBRE = "nombre";
    const USUARIOAPELLIDO = "apellido";


	//Regular Expression
    const REGEXLETRAS = '/[A-Za-z]+/';
    const REGEXEMAIL = '/^(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6}$/';
    const REGEXNUMEROS = '/[0-9]+/';
    //pass extension de 6 a 18
    const REGEXLETRASYNUMEROS = '/^0-9a-zA-Z]{6,18}$/';
    const REGEXLETRASNUMEROSYESPACIOS = '/[A-Za-zñÑ0-9#&\-\s]/';



}