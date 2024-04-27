<?php
//Эмуляция сервера, а конкретнее ресурса который присылает нам данные
//Перейти в папку и выполнить команду php -S localhost:8090 server.php
//Теперь в браузере перейдя по http://127.0.0.1:8090/data вам выкинет все эти данные
if(preg_match('/\/data$/', $_SERVER['REQUEST_URI'])) {
    header('Content-type: application/json charset=utf-8;');


    $lines = [
        ['id' => 1, 'total' => 11400, 'tax' => 100],
        ['id' => 2, 'total' => 3400, 'tax' => 500],
        ['id' => 3, 'total' => 4400, 'tax' => 50],
    ];

    echo json_encode($lines);
}