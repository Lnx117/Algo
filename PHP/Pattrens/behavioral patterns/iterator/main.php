<?php

include "Row.php";
include "RowsIterator.php";
include "InvoiceRender.php";
include "RowsCollection.php";
include "RowsHeap.php";


//1) Получили данные
$responseJson = file_get_contents('http://127.0.0.1:8090/data');
$transactions = json_decode($responseJson, true);

//2)Сделали из полученных данных коллекцию создав класс коллекции и пройдясь по каждой строке добавляя обекты строк в объект коллекции
//$collection
//Только коллекция знает какой итератор использовать
$collection = new RowsCollection();
foreach ($transactions as $transaction) {
    $collection->addRow(new Row($transaction['id'], $transaction['total'], $transaction['tax']));
}

//Или закидываем кучу
$heap = new RowsHeap();
foreach ($transactions as $transaction) {
    $heap->insert(new Row($transaction['id'], $transaction['total'], $transaction['tax']));
}

//3) Вывели данные
//Класс рендеринга даже не знает как храняться данные, он ждет итератор
//Можем подкинуть ему кучу
$render = new InvoiceRender();
$render->render($collection);