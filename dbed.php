<?php 
if (isset($_POST['name']) && isset($_POST['phone'])  && isset($_POST['tg'])){
    // Переменные с формы
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $tg = $_POST['tg'];
    
    // Параметры для подключения
    $db_host = "localhost"; 
    $db_user = "matveysh_228"; // Логин БД
    $db_password = "123ert678IOP"; // Пароль БД
    $db_base = 'matveysh_228'; // Имя БД
    $db_table = "razabotka"; // Имя Таблицы БД
    
    try {
        // Подключение к базе данных
        $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
        // Устанавливаем корректную кодировку
        $db->exec("set names utf8");
        // Собираем данные для запроса
        $data = array( 'name' => $name, 'phone' => $phone, 'tg' => $tg); 
        // Подготавливаем SQL-запрос
        $query = $db->prepare("INSERT INTO $db_table (name, phone, tg) values (:name, :phone, :tg)");
        // Выполняем запрос с данными
        $query->execute($data);
        // Запишим в переменую, что запрос отрабтал
        $result = true;
    } catch (PDOException $e) {
        // Если есть ошибка соединения или выполнения запроса, выводим её
        print "Ошибка!: " . $e->getMessage() . "<br/>";
    }
    
    if ($result) {
    	header("Location: успешно.html");
    }
}