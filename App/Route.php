<?php 

namespace App;

use MF\Init\Bootstrap; //não precisou colocar namespace pq o autoload ja carrega

class Route extends Bootstrap{
    protected function initRoutes(){ 
        // é criado uma variável com duas rotas
        $routes['home'] = array( //caso a rota/PATH seja raiz(/ ou index)
            'route' => '/',
            'controller' => 'indexController',
            'action' => 'index' // qual açao que sera disparada quando a rota for requisitada
        );

        $this->setRoutes($routes);
    }
    
}