<?php

namespace Framework;
use App\Controllers\ErrorController;

// $routes = require basePath('routes.php');

// inspect($uri);
// if(array_key_exists($uri,$routes)){
//     require (basePath($routes[$uri]));
// }else{
//     http_response_code(404);
//     require basePath($routes['404']);
// }

class Router{
    protected $routes = [];

    public function registerRoute($method, $uri, $action){
         list($controller, $controllerMethod) = explode('@', $action);

        $this->routes[] = [
         'method'=>$method,
         'uri'=> $uri,
         'controller'=> $controller,
         'controllerMethod'=> $controllerMethod
        ];
     }

    // public function registerRoute($method, $uri, $controller){
    //    $this->routes[] = [
    //     'method'=>$method,
    //     'uri'=> $uri,
    //     'controller'=>$controller
    //    ];
    // }

    /** GET ROUTE
     * @param string $uri
     * @param string $controller
     * return void
     */
    public function get($uri,$controller){
        $this->registerRoute('GET',$uri,$controller);
    }

        /** POST ROUTE
     * @param string $uri
     * @param string $controller
     * return void
     */
    public function post($uri,$controller){
        $this->registerRoute('POST',$uri,$controller);
    }

        /** PUT ROUTE
     * @param string $uri
     * @param string $controller
     * return void
     */
    public function put($uri,$controller){
        $this->registerRoute('PUT',$uri,$controller);
    }

        /** DELETE ROUTE
     * @param string $uri
     * @param string $controller
     * return void
     */

    public function delete($uri,$controller){
        $this->registerRoute('DELETE',$uri,$controller);
    }
    /** Load error page 
     * @param int $httpCode
     * return void
    */
    // public function error($httpCode = 404){
    //     http_response_code($httpCode);
    //     loadView("error/{$httpCode}");
    //     exit;
    // }

      /** 
       * Route request
       * @param string $uri
       * @param string $method
       * @return  void
       */
      public function route($uri){
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        foreach($this->routes as $route){

            // split current URI into segments EXPLODE
            $uriSegments = explode('/', trim($uri, '/'));
           
            // split route URI into segments
            $routeSegments = explode('/', trim($route['uri'], '/'));

            $match = true;

            // check for equal no of segments
            if(count($uriSegments) === count($routeSegments) && 
            strtoupper($route['method'] === $requestMethod)) 
            {
                $params = [];
                $match = true;

                for($i=0;$i<count($uriSegments);$i++){
                    // if URIs don't match and n o param
                    if($routeSegments[$i] !== $uriSegments[$i] && 
                    !preg_match('/\{(.+?)\}/', $routeSegments[$i])){
                        $match = false;
                        break;
                    }
                    // checks param + add to params arr
                    if(preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)){
                        $params[$matches[1]] = $uriSegments[$i];
                    }
                }
                if($match){
                   
                    // require basepath('App/'. $route['controller']);
                    // EXTRACT CONTROLLER + METHOD
                    $controller = 'App\\Controllers\\'.$route['controller'];
                    $controllerMethod =$route['controllerMethod'];
    
                    // instantiate controller and call method
                    $controllerInstance = new $controller();
                    $controllerInstance->$controllerMethod($params);
                    return;
                    
                }
            }
           
            
        }
        ErrorController::notFound();
      //$this->error();
      }
}