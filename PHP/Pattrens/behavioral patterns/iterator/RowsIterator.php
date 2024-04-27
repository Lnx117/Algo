<?php

class RowsIterator implements Iterator {
    private $position = 0;

    //Записываем что необходимо передать класс коллекцию и передать ее в свойство rows
    //Короткий синтаксис PHP 8
    public function __construct(private RowsCollection $rows){}

    public function current(): Row 
    {
        return $this->rows->getRow($this->position);
    }

    public function next(): void 
    {
        ++$this->position;
    }

    public function key(): int 
    {
        return $this->position;
    }

    public function valid(): bool 
    {
        return !is_null($this->rows->getRow($this->position));
    }

    public function rewind(): void 
    {
        $this->position = 0;
    }

}