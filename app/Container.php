<?php
namespace App;

use Closure;


class Container{
    private $bindings=[];
    public function __construct($key,Closure $value){
        $this->bind($key,$value);
    }
    public function bind($key,$value){
        $this->bindings[$key]=call_user_func($value);
    }
    public function make($key){
        if(array_key_exists($key,$this->bindings)){
            return $this->bindings[$key];
        }
    }


}
