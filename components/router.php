<?php
/**
 * Created by PhpStorm.
 * User: HyperX
 * Date: 27.06.2019
 * Time: 14:35
 */
class Router
{
    private $rot;

    public function __construct()
    {
        $routPath = ROOT.'/config/routes.php';
        $this->rot = include($routPath);
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
//        print_r($this->rot);
//        echo 'ALL working';
        $uri = $this->getURI();
//        echo $uri."<br>";
        foreach ($this->rot as $uriKey => $path) {
            if (preg_match("~^$uriKey$~", $uri)) {

//                echo "path: $path <br>uriKey: $uriKey<br>";
                $internalRoute = preg_replace("~^$uriKey$~", $path, $uri);

//                echo "$internalRoute<br>";
                $segments = explode('/', $internalRoute);

//                print_r($segments);
//                echo ROOT;
//                break;

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);


                $actionName = 'action'.ucfirst(array_shift($segments));

                $parameters = $segments;

                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

//                echo "<br> $controllerName<br>";
//                echo $actionName. "<br>";
//                echo $controllerFile.'<br>';

//                print_r($parameters);

                if (!file_exists($controllerFile))
                    exit("404 - Not object");
                include_once($controllerFile);
                $controllerObject = new $controllerName;

//                $result = $controllerObject->$actionName($parameters);
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if ($result != null) {
//                    echo "DONE!";
                    exit();
                }
                }
        }

        echo '405 - Not object';

    }

}