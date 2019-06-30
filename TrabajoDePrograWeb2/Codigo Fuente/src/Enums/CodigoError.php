<?php
/**
 * Created by PhpStorm.
 * User: Globons
 * Date: 5/6/2019
 * Time: 10:30
 */

abstract class CodigoError
{
    const UsuarioNoRegistrado = 1;
    const PasswordInvalida = 5;
    const UsuarioNoEncontrado = 15;
    const ProductoNoEncontrado = 20;
    const PublicacionInvalida = 25;
    const CarritoFallido = 30;
    const EliminarCarritoFallido = 35;


    //nuestras
    const NombreOPassInvalidoException = 7;
    const ExcentionRegistar=20;
}