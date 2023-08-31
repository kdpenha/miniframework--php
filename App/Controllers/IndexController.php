<?php 
    namespace App\Controllers;

    //miniframework
    use MF\Controller\Action;
    use MF\Model\Container;

    //models
    use App\Models\Produto;
    use App\Models\Info;

    class IndexController extends Action {
        public function index(){
            //$this->view->dados = array('Sofá','Cadeira','Cama'); //criando um novo atributo

            $produto = Container::getModel('Produto');

            $produtos = $produto->getProdutos();

            $this->view->dados = $produtos;

            $this->render('index', 'layout1');
        }
        public function sobreNos(){

            $info = Container::getModel('Info');

            $infos = $info->getInfo();

            $this->view->dados = $infos;

            $this->render("sobre_nos", 'layout1');
        }

        
    }
