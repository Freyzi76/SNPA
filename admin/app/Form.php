<?php

namespace HM\form;



class Form{

    protected $data;

    public $surround = 'p';


    public function __construct($data = array()) {
        $this->data = $data;
    }

    protected function surround($html){
        return "<div class=\"form-group\">$html</div><br>";


    }

    protected function getValue($index){
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }


    public function input($name){
      return $this->surround(

          '<input class="form-control" type="text" name="' . $name . '" value=" ' . $this->getvalue($name) . '">'
        
        );
    }


    public function submit(){
       return $this->surround('<button type="submit">Envoyer</button>');

    }


}