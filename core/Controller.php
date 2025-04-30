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
        // Build absolute URL
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $host = $_SERVER['HTTP_HOST'];
        $absoluteUrl = $protocol . $host . $url;

        // Clear output buffer
        if (ob_get_length()) {
            ob_end_clean();
        }

        header("Location: " . $absoluteUrl);
        exit;
    }
}
