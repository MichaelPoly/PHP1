<?php
require_once 'functions.php';

$dbName = 'inet_shop';
createDb($dbName);
$link = db_connect($dbName);
$tableName = "clients(id INT NOT NULL AUTO_INCREMENT,
              first_name VARCHAR(30) NOT NULL,
              second_name VARCHAR(30) NOT NULL,
              last_name VARCHAR(30) NOT NULL,
              phone VARCHAR(30) NOT NULL,
              email VARCHAR(30) NOT NULL,
              login VARCHAR(30) NOT NULL,
              password VARCHAR(30) NOT NULL,
              PRIMARY KEY (`id`))";
tableCreate($link, $tableName);
add_client($link, "Иван", "Иванович", "Иванов", "+7 903-300-05-07", "ivan@mail.ru", "ivan@mail.ru", "123qwer");
add_client($link, "Светлана", "Петровна", "Захарова", "+7 917-300-05-07", "sveta95@rambler.ru", "Sveta95", "Qwerty123");
add_client($link, "Петр", "Степанович", "Васильев", "+7 963-300-05-07", "vasilevp@rambler.ru", "vasilevp@rambler.ru", "VasPetr.1108");
add_client($link, "Ирина", "Васильевна", "Петрова", "+79273000507", "ira_petrova99@yandex.ru", "ira_petrova99@yandex.ru", "Ira99");
add_client($link, "Лариса", "Сергеевна", "Савелова", "+79063000515", "savelova_lar@gmail.com", "savelova_lar@gmail.com", "jfid18mn");
add_client($link, "Сергей", "Александрович", "Наумов", "+7 952-500-23-09", "naum_s_a@gmail.com", "naum_s_a@gmail.com", "naumov!s!a");
add_client($link, "Сергей", "Андреевич", "Александров", "89063004515", "aleksandrov_s@mail.ru", "aleksandrov_s@mail.ru", "porsh911");
add_client($link, "Анатолий", "Андреевич", "Степанов", "89063004518", "stepanov77@mail.ru", "Stepan77", "mosk77Anatolij");
add_client($link, "Анна", "Сергеевна", "Сташкова", "89063004520", "stashkovaas@yandex.ru", "stashkovaas@yandex.ru", "2001Saratov");
add_client($link, "Галина", "Олеговна", "Камаева", "89173004554", "gala_kamaj@yandex.ru", "GalinaKamaeva", "KamaevaG1112");

$tableName1 = "item(id INT NOT NULL AUTO_INCREMENT,
              articul VARCHAR(30) NOT NULL,
              item_name VARCHAR(30) NOT NULL,
              quantity_stock INT NOT NULL,
              price INT NOT NULL,
              main_photo VARCHAR(225) NOT NULL,
              describtion VARCHAR(1024) NOT NULL,
              img_folder varchar(225),
              PRIMARY KEY (`id`))";
tableCreate($link, $tableName1);
add_item($link, "TN001", "Товар1", "50", "2990", "elefant1.png", "Описание товара номер 1\nхарактеристики товара номер 1", "img/TN001/");
add_item($link, "TN002", "Товар2", "35", "3990", "elefant1.png", "Описание товара номер 2\nхарактеристики товара номер 2", "img/TN002/");
add_item($link, "TN003", "Товар3", "20", "3190", "elefant1.png", "Описание товара номер 3\nхарактеристики товара номер 3", "img/TN003/");
add_item($link, "TN004", "Товар4", "60", "4090", "elefant1.png", "Описание товара номер 4\nхарактеристики товара номер 4", "img/TN004/");
add_item($link, "TN005", "Товар5", "90", "3490", "elefant1.png", "Описание товара номер 5\nхарактеристики товара номер 5", "img/TN005/");
add_item($link, "TN006", "Товар6", "2", "5690", "elefant1.png", "Описание товара номер 6\nхарактеристики товара номер 6", "img/TN006/");
add_item($link, "TN007", "Товар7", "4", "990", "elefant1.png", "Описание товара номер 7\nхарактеристики товара номер 7", "img/TN007/");
add_item($link, "TN008", "Товар8", "7", "1290", "elefant1.png", "Описание товара номер 8\nхарактеристики товара номер 8", "img/TN008/");
add_item($link, "TN009", "Товар9", "9", "1990", "elefant1.png", "Описание товара номер 9\n характеристики товара номер 9", "img/TN009/");
add_item($link, "TN010", "Товар10", "15", "5990", "elefant1.png", "Описание товара номер 10\nхарактеристики товара номер 10", "img/TN010/");

$tableName2 = "orders(id INT NOT NULL AUTO_INCREMENT,
               order_num VARCHAR(30) NULL,
               clientid INT NOT NULL,
               itemid INT NOT NULL,
               quantity INT NOT NULL,
               confirmed BOOLEAN NOT NULL,
               payed BOOLEAN NOT NULL,
               order_state VARCHAR(30) NOT NULL,
               date DATE NOT NULL,
               PRIMARY KEY (`id`))";
 tableCreate($link, $tableName2);

 $query = "ALTER TABLE orders ADD FOREIGN KEY(`clientid`) REFERENCES clients(id)";
 mysqli_query($link, $query);
 $query1 = "ALTER TABLE orders ADD FOREIGN KEY(`itemid`) REFERENCES item(id)";
 mysqli_query($link, $query1);
