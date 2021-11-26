<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecuacion 
{
    private $a;
    private $b;
    private $c;
    private $arrayx=array();
    private $arrayy=array();
    public function __construct()
    {
        
    }
    use HasFactory;
    public function setA($a){
        $this->a=$a;
    }
    public function setB($b){
        $this->b=$b;
    }
    public function setC($c){
        $this->c=$c;
    }
    public function getA(){
       return $this->a;
    }
    public function getB(){
        return $this->b;
     }
     public function getC(){
        return $this->c;
     }
}
