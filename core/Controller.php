<?php
class Controller {
    protected function view($view, $data = []) {
        extract($data);
        require __DIR__ . '/../app/views/' . $view . '.php';
    }

    protected function redirect($url) {
        if (strpos($url, '/') !== 0) {
            $url = '/' . $url;
        }
        header("Location: " . $url);
        exit;
    }
}
