<?php

    namespace MF\Init;

    abstract class Bootstrap {

        private $routes;

        public function __construct() {
            $this->initRoutes();
            $this->run($this->getUrl());
        }

        public function getRoutes() {
            return $this->routes;
        }

        public function setRoutes(array $routes) {
            $this->routes = $routes;
        }

        abstract protected function initRoutes();

        protected function run($url) {
            foreach($this->getRoutes() as $path => $route) {
                if($url == $route['route']) {
                    $class = 'App\\Controllers\\'. ucfirst($route['controller']);
                    $action = $route['action'];

                    $controller = new $class;
                    $controller->$action();

                    return;
                }
            }

            echo '

            <style>

                #parent {
                    height: 100%;
                    text-align: center;
                    background-color: #f8f9fa;
                    
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                #contents {
                    display: flex;
                    flex-direction: column;
                    gap: 8px;
                }
            </style>

            <div id="parent">
                <div class="container rounded border bg-white">
                    <div id="contents" class="p-3">
                        <h1 class="display-4 text-danger">Houve um erro ao tentar acessar esta rota.</h1>
                        <p class="font-monospace fs-5">Vá para a página de início clicando abaixo.</p>

                        <button class="btn btn-outline-danger py-2 px-5" onclick="window.location.href=`/`" type="button">Ir</button>
                    </div>
                </div>
            </div>
            ';
        }

        protected function getUrl() {
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        }

    }
?>