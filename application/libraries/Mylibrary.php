<?php


if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   
class Mylibrary{

    function hello(){
        return 'hello';
    }
  
    function addition($num1, $num2){
        $sum = $num1 + $num2;

        return $sum;
    }

    function subtration($num1, $num2){
        $sum = $num1 - $num2;

        return $sum;
    }


    function tax_count($price,$taxRate){
       
        $taxs = $price * $taxRate / 100;
        return $taxs;
    }




    


}