<?php


class Year extends Model
{
    private $id;
    private $year;


    function getAllYears(){
        $resultado= $this->pageRows(0,PHP_INT_MAX);
        return $resultado;
    }

    function consultarYearPorPk($pk){
        $resultado = $this->pageRows(0,PHP_INT_MAX,"id=$pk");
        return $resultado[0]["year"];
    }

    function getYearById($id){
        $resultado = $this->pageRows(0,1, "id = $id");
        return $resultado[0]["year"];
    }

    /**
 * @return mixed
 */
public function getId()
{
    return $this->id;
}/**
 * @param mixed $id
 */
public function setId($id)
{
    $this->id = $id;
}/**
 * @return mixed
 */
public function getYear()
{
    return $this->year;
}/**
 * @param mixed $year
 */
public function setYear($year)
{
    $this->year = $year;
}

}