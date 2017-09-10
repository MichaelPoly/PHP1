<?php
require_once 'functions.php';

$dbName = 'inet_shop';
createDb($dbName);
$link = db_connect($dbName);
$tableName = "clients(id INT NOT NULL AUTO_INCREMENT,
              first_name VARCHAR(30) NOT NULL,
              second_name VARCHAR(30) NOT NULL,
              last_name VARCHAR(30) NOT NULL,
              birth_date DATE NULL,
              email VARCHAR(30) NOT NULL,
              login VARCHAR(30) NOT NULL,
              password VARCHAR(30) NOT NULL,
              PRIMARY KEY (`id`))";
tableCreate($link, $tableName);
$tableName1 = "item(id INT NOT NULL AUTO_INCREMENT,
              articul VARCHAR(30) NOT NULL,
              item_name VARCHAR(30) NOT NULL,
              quantity_stock INT NOT NULL,
              price INT NOT NULL,
              PRIMARY KEY (`id`))";
tableCreate($link, $tableName1);
$tableName2 = "purchase(id INT NOT NULL AUTO_INCREMENT,
              id_client INT NOT NULL,
              id_item INT NOT NULL,
              quantity_item INT NOT NULL,
              PRIMARY KEY (`id`))";
tableCreate($link, $tableName2);
add_client($link, "Иван", "Иванович", "Иванов", "1985-05-12", "ivan@mail.ru", "ivan@mail.ru", "123qwer");
add_client($link, "Светлана", "Петровна", "Захарова", "1995-07-01", "sveta95@rambler.ru", "Sveta95", "Qwerty123");
add_client($link, "Петр", "Степанович", "Васильев", "1979-08-11", "vasilevp@rambler.ru", "vasilevp@rambler.ru", "VasPetr.1108");
add_client($link, "Ирина", "Васильевна", "Петрова", "1999-06-21", "ira_petrova99@yandex.ru", "ira_petrova99@yandex.ru", "Ira99");
add_client($link, "Лариса", "Сергеевна", "Савелова", "1997-06-15", "savelova_lar@gmail.com", "savelova_lar@gmail.com", "jfid18mn");
add_client($link, "Сергей", "Александрович", "Наумов", "1993-10-15", "naum_s_a@gmail.com", "naum_s_a@gmail.com", "naumov!s!a");
add_client($link, "Сергей", "Андреевич", "Александров", "", "aleksandrov_s@mail.ru", "aleksandrov_s@mail.ru", "porsh911");
add_client($link, "Анатолий", "Андреевич", "Степанов", "", "stepanov77@mail.ru", "Stepan77", "mosk77Anatolij");
add_client($link, "Анна", "Сергеевна", "Сташкова", "2001-02-03", "stashkovaas@yandex.ru", "stashkovaas@yandex.ru", "2001Saratov");
add_client($link, "Галина", "Олеговна", "Камаева", "1998-11-12", "gala_kamaj@yandex.ru", "GalinaKamaeva", "KamaevaG1112");

add_item($link, "TN001", "Товар1", "50", "2990");
add_item($link, "TN002", "Товар2", "35", "3290");
add_item($link, "TN003", "Товар3", "20", "3190");
add_item($link, "TN004", "Товар4", "60", "4090");
add_item($link, "TN005", "Товар5", "90", "3490");
add_item($link, "TN006", "Товар6", "2", "5690");
add_item($link, "TN007", "Товар7", "5", "990");
add_item($link, "TN008", "Товар8", "7", "1290");
add_item($link, "TN009", "Товар9", "9", "1990");
add_item($link, "TN009", "Товар10", "9", "590");

$query = "SELECT * FROM clients";
$result = mysqli_query($link, $query);
if (!$result) die(mysqli_error($link));
$clients = mysqli_fetch_assoc($result);
foreach ($clients as $key => $value) {
    echo "$value<br>";
}
 ?>
