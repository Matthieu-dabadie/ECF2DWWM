<?php

namespace App\Controllers;

abstract class Controller
{
    protected function token()
    {
        $token = bin2hex(random_bytes(32));
        $_SESSION['token'] = $token;
        return $token;
    }

    public function render(string $path, array $data = [])
    {
        extract($data);

        ob_start();

        $viewPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . $path . '.php';

        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            http_response_code(500);
            echo "Erreur : la vue $path n'a pas pu être trouvée.";
            echo '<pre>';
            var_dump($viewPath);
            echo '</pre>';
        }

        $content = ob_get_clean();

        include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'template.php';
    }
}
