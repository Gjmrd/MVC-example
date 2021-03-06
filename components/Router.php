<?php



class Router
{
    const ROUTES_PATH = ROOT.'\config\routes.php';

    private $routes;

    public function __construct()
    {
        $this->routes = include(self::ROUTES_PATH);
    }

    private function getRequestUri()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }

    }



    /**
     * defines what controller and action should be called
     */
    public function run()
    {
        $uri = $this->getRequestUri();

        //checking routes
        foreach ($this->routes as $uriPattern => $path) {

            if (preg_match("~$uriPattern~", $uri)) {

                $internalRoute = preg_replace("~$uriPattern~", $path ,$uri);

                $segments = explode("/", $internalRoute);

                $controllerName = ucfirst(array_shift($segments)."Controller");
                $actionName = array_shift($segments);
                $parameters = $segments;

                $controller = "Controllers\\" . $controllerName;
                $controllerObject = new $controller;

                $result = call_user_func_array([$controllerObject, $actionName], $parameters);

                if ($result != null) {
                    break;
                }
            }

        }

    }

}