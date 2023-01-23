<?php
    namespace MF\Controller;

    abstract class Action {

        protected $view;

        public function __construct() {
            $this->view = new \stdClass();
        }

        protected function render($view, $layout) {
            $this->view->page = $view;

            $path = '../App/Views/'.$layout.'.phtml';
            if(file_exists($path)) {
                require_once $path;
                return;
            }

            $this->content();
        }

        protected function content() {
            $className = get_class($this);
            $className = str_replace('App\\Controllers\\', '', $className);
            $className = strtolower(str_replace('Controller', '', $className));

            require_once '../App/Views/'.$className.'/'.$this->view->page.'.phtml';
        }
    }
?>