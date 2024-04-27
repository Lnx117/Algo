<?php

//В классе коллекций мы с помощью класса Row создаем массив из строк, то есть создаем коллекцию
class RowsCollection implements IteratorAggregate
{
    //Содержит весь массив наших строк
    private $rows = [];

    //В этом методе мы вибираем какой итератор использовать
    //В нашем случае у нас есть один итератор RowsIterator, поэтому возвращаем его
    public function getIterator(): Traversable
    {
        return new RowsIterator($this);
    }

    //Возвращает строку по индексу
    public function getRow(int $position) 
    {
        //Проверяем, если ли строка под такорй позицией, если есть - возвращаем ее, если нет
        if(isset($this->rows[$position])) {
            return $this->rows[$position];
        }
        return null;
    }

    //Добавляет строку в коллекцию
    public function addRow(Row $row) 
    {
        $this->rows[] = $row;
    }
}