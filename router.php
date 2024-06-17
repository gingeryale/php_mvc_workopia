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

    /** GET ROUTE
     * @param string $uri
     * @param string $controller
     * return void
     */
    public function get($uri,$controller){
        $this->$routes;
    }

        /** POST ROUTE
     * @param string $uri
     * @param string $controller
     * return void
     */
    public function post($uri,$controller){}

        /** PUT ROUTE
     * @param string $uri
     * @param string $controller
     * return void
     */
    public function put($uri,$controller){}

        /** DELETE ROUTE
     * @param string $uri
     * @param string $controller
     * return void
     */
    public function delete($uri,$controller){}
}