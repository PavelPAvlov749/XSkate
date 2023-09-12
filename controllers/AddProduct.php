<?php
// Раскомментируйте следующую строку, чтобы отладить $_POST данные
// var_dump($_POST);

// Импорт класса ProductModel из модуля models
use models\ProductModel;

// Определение папки для загрузки файлов
$upload_dir = substr(__DIR__, 0, strrpos(__DIR__, "/")) . "/downloads/";

// Формирование полного пути к загружаемому файлу
$path = $upload_dir . basename($_FILES['photo']['name']);

// Создание экземпляра модели продукта
$product_model = new ProductModel();

// Получение полного пути к загруженному фото
$photo_url = $_FILES['photo']['full_path'];

// Попытка переместить загруженный файл
if (move_uploaded_file($_FILES['photo']['tmp_name'], $path)) {
    // Добавление продукта в модель с использованием данных из $_POST
    $result = $product_model->add_product(
        $_POST['model'],
        $_POST['model'],
        $_POST['description'],
        $_POST['price'],
        $_POST['type'],
        $photo_url
    );

    // Проверка результата операции добавления
    if ($result) {
        // Перенаправление на главную страницу в случае успеха
        header('location:/');
    } else {
        // Перенаправление на страницу добавления продукта в случае ошибки
        header('location:/add_product');
    }
} else {
    // Установка сообщения об ошибке, если не удалось загрузить файл
    $_SESSION['error-message'] = 'ERROR: Unable to upload file';
    header('location:/add_product');
}
?>



?>