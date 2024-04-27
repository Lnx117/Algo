<?php

class InvoiceRender
{
    //Тут мы сообщаем что хотим получить ЛЮБОЙ итератор. Как например наша коллекция ИЛИ куча (которая тоже реализует итератор abstract class SplHeap implements Iterator, Countable {...})
    //Если хоти использовать кучу, то вместо public function render(RowsCollection $iterator) будет public function render(Iterator $iterator) 
    public function render(RowsCollection $iterator) 
    {
        echo sprintf('ID ----------- Сумма ----------- Налог %s', PHP_EOL);

        //В качестве первого элемента передаем коллекцию, которая по сути и есть наш итератор
        foreach ($iterator as $row) {
            echo sprintf('%d ----------- %d ----------- %s %s', $row->id, $row->total, $row->tax, PHP_EOL);
        }
    }
}