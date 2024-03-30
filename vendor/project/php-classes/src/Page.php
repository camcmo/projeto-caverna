<?php

namespace CavernaGames;


use Rain\Tpl;


class Page{
    
    private $tpl; //criou a variável de forma privada
    private $defaults = [
        "data" =>[]
    ];
    public function __construct($opts = array()){

        $this-> options = array_merge($this->defaults, $opts); //faz um merge entre o defaults e o array do opts, junta as partes
        $config = array(
            "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]. "/views", //acessar por variavel de ambiente a pasta local
            "cache_dir"     => $_SERVER["DOCUMENT_ROOT"] ."/views-cache",
            "debug"         => false, // set to false to improve the speed
        );
        
        Tpl::configure( $config );
        $this->tpl = new Tpl;

        $this->setData($this->options["data"]);
        // para substituir, irá chamar o setData mas irá substituir o data por $this->options["data"]
        // foreach ($this->options["data"] as $key => $value){ //acessar os componentes
        //     $this->tpl->assign($key, $value);
        // }

        $this->tpl->draw("header"); //desenha na tela
        

    }
    private function setData($data = array()){
        foreach ($data as $key => $value){
            $this->tpl->assign($key, $value);
        }
    }

    // este método iria se repetir, então criamos um metodo privado que será apenas adaptado para cada parte do código

    public function setTpl($name, $data = array(), $returnHTML = false){ //método vai repetir então criamos um método para isso
        $this->setData($data);
        $this->tpl->draw($name, $returnHTML);
        
    }

    // Método para chamar o template html



    public function __destruct(){
        $this->tpl->draw("footer");
    }
}

// ao final do código constroi-se o footer


?>
