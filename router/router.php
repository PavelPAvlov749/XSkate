<?php
use models\AuthModel;
class Router
{
    private $current_url;
    private $path;


    // Массив соответствия маршрутов и путей к фалам соответствуюхих странци

    private array $routes = [
        '/' => './pages/main.php',
        '/login' => './pages/login.php',
        '/product' => './pages/product.php',
        '/auth' => './controllers/LoginController.php',
        '/register' => './pages/Register.php',
        '/auth-register' => './controllers/RegisterController.php',
        '/logout' => "./controllers/LogoutController.php",
        '/profile' => './pages/Profile.php',
        '/add-product' => './controllers/AddProduct.php',
        '/add_product' => './pages/AddProduct.php',
        '/add-adress' => './pages/AddAdress.php',
        '/addToCart' => './controllers/addToCartController.php',
        '/cart' => './pages/Cart.php',
        '/clear_cart' => './controllers/ClearCartController.php',
        "/order" => "./pages/Order.php",
        "/skates" => "./pages/Product.php",
        '/filer_product' => './controllers/FilerProducts.php',
        '/frames' => './pages/Product.php',
        '/wheels' => './pages/Product.php'
    ];

    public function __construct()
    {
        // Получаем текущий URL и извлекаем путь

        $this->current_url = $_SERVER['REQUEST_URI'];
        $this->path = parse_url($this->current_url)['path'];
    }

    public function route()
    {
        // Проверяем, есть ли текущий путь в массиве маршрутов

        if (array_key_exists($this->path, $this->routes)) {
            // Если есть, включаем соответствующий файл
            if (file_exists($this->routes[$this->path])) {
                include($this->routes[$this->path]);

            } else {
                echo "FILE DOES NOT EXIST" . "</br>";

            }
        } else {
            // Если нет, включаем страницу ошибки
            include('../pages/error.php');
        }

    }
}
?>