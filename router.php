<?php

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

    public function registerRoute($method, $uri, $controller){
       $this->routes[] = [
        'method'=>$method,
        'uri'=> $uri,
        'controller'=>$controller
       ];
    }

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
    public function error($httpCode = 404){
        http_response_code($httpCode);
        loadView("error/{$httpCode}");
        exit;
    }

      /** 
       * Route request
       * @param string $uri
       * @param string $method
       * @return  void
       */
      public function route($uri,$method){
        foreach($this->routes as $route){
            if($route['uri']===$uri && $route['method']===$method){
                require basepath($route['controller']);
                return;
            }
        }

      $this->error();
      }
}