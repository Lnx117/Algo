<?php

//Простой класс который создает простую строку. На выходе объект с тремя свойствами
class Row
{
    //Конструктор строки. В каждой строке у нас будет id, total и tax
    //Короткий синтаксис PHP 8, создадутся соответствующие свойства объекта
    public function __construct(public int $id, public int $total, public int $tax) {}

}