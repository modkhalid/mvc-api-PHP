<?php

class View{
    function __construct()
    {
        // echo "inside the view object<br>";
    }
    public function render($name)
    {
       require 'view/'.$name.".php";
    }
}