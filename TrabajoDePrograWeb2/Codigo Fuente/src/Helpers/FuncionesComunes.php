<?php
/**
 * Created by PhpStorm.
 * User: Globons
 * Date: 11/5/2019
 * Time: 10:23
 */
abstract class FuncionesComunes{

    static function validarCadena($cadena){
        if(preg_match(Constantes::REGEXLETRAS, $cadena)){
            return true;
        }
    }


    static function validarCadenaYNumeros($cadena){
        if(preg_match(Constantes::REGEXLETRASYNUMEROS, $cadena)){
            return true;
        }
    }

    static function validarNumeros($cadena){
        if(preg_match(Constantes::REGEXNUMEROS, $cadena)){
            return true;
        }
    }

    static function validarEmail($cadena){
        if(preg_match(Constantes::REGEXEMAIL, $cadena)){
            return true;
        }
    }

    static function validarCadenaNumerosYEspacios($cadena){
        if(preg_match(Constantes::REGEXLETRASNUMEROSYESPACIOS, $cadena)){
            return true;
        }
    }
}