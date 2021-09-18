<?php

class Form{

    protected $data;

    public $surround = 'p';


    public function __construct($data = array()) {
        $this->data = $data;
    }

    protected function surround($html){
        return "<div class=\"form-floating\">$html</div><br>";


    }

    protected function getValue($index){
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }


    public function input($name_var, $name, $type){
      return $this->surround(

          '

          <input type="' . $type . '" class="form-control" id="' . $name_var . '" name="' . $name_var . '" value="null" required>

          <label for="' . $name_var . '">' . $name . '</label>

          '
        
        );
    }


    public function submit(){
       return $this->surround('<button type="submit">Envoyer</button>');

    }


}