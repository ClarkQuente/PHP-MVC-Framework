<?php
    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    use App\Models\Produto;
    use App\Models\Info;

    class IndexController extends Action {

        // This method is called on public/index.php
        public function index() {
            $produto = Container::getModel('Produto');

            $this->view->data = $produto->getProdutos();

            $this->render('index', 'layout1');
        }

        public function sobreNos() {
            $info = Container::getModel('Info');

            $this->view->data = $info->getInfo();

            $this->render('sobreNos', 'a');
        }

    }
?>