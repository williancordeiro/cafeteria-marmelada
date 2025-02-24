<?php
require_once 'config/geral.php';

class Controller {

    public function handleRequest($uri, $method) {
        
        global $routers;

        if (isset($routers[$uri]) && isset($routers[$uri][$method])) {
            $controllerAction = $routers[$uri][$method];
            list($controllerFile, $controllerMethod) = explode('?method=', $controllerAction);

            if ($controllerFile === RAIZ . 'index.php') {
                require_once RAIZ . 'index.php';
            } else {
                if (file_exists($controllerFile)) {
                    require_once $controllerFile;
    
                    $controllerName = basename($controllerFile, '.php');
                    $reflection = new ReflectionClass($controllerName);
                    $contructor = $reflection->getConstructor();
    
                    if ($contructor && $contructor->getNumberOfParameters() > 0)
                        $controller = new $controllerName($dataBase);
                    else
                        $controller = new $controllerName();
    
                    if (method_exists($controller, $controllerMethod))
                        $controller->$controllerMethod();
                    else
                        $this->handleError();
                } else {
                    $this->handleError();
                }
            }
        } else {
            $this->handleError();
        }
    }

    private function handleError() {
        http_response_code(404);
        require_once CONTROLLER_DIR . 'StatusController.php';
        $controller = new StatusController();
        $controller->error404();
        exit;
    }
}
?>