<?php

class Test_Model extends Model{
    function __construct()
    {
        parent::__construct();
    }

    function printSomething(){
        echo "Hello from test model";
    }
    
}