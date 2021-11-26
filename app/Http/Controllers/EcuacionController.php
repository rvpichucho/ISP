<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ecuacion;

$a=$_POST['num_a'];

$b=$_POST['num_b'];

$c=$_POST['num_c'];
class EcuacionController extends Controller
{
    

    public function ecuacion($a,$b,$c){
        
        //$result = [['numero_1' =>$a+$b],['numero_2'=>$a+$b]];
        $auxiliar=(pow($b,2)-(4*$a*$c));
        if ($auxiliar>=0){
            $x1=((-$b+sqrt($auxiliar))/(2*$a));
            $x2=((-$b-sqrt($auxiliar))/(2*$a));
            if($x1==$x2){
                return $x1;
            
            }
            else{
                return $x1.$x2;
            }
        }
        
        
        
    }
    public $ecjson;
    public $array;
    public function index(Request $request)
    {
        $ecuacion=new Ecuacion();
        $ecuacion->setA($request->input('a'));
        $ecuacion->setB($request->input('b'));
        $ecuacion->setC($request->input('c'));
       
        $this->array=(array)$ecuacion;
        return json_encode($this->array);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
