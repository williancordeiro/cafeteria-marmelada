<?php
require_once 'config/geral.php';

class StatusController {

    public function error404() {
        require_once VIEW_DIR . 'Status-pages/404.php';
    }

    public function error503() {
        require_once VIEW_DIR . 'Status-pages/503.php';
    }
}
?>