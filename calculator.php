<?php

	class Calculator{

	private $numbers=['zero','one','two','three','four','five','six','seven','eight','nine','ten'];

	private $symbols=['+'=>'plus','-'=>'minus','*'=>'times'];

	
	public function __call($name,$_){
			$arguments=$this->parseArguments($name);
			
			return eval('return ' . implode(' ', $arguments) . ';');
	}

	private function parseArguments($name){
	$patt='/(?<!^)[A-Z]/';
	$repl=',$0';

	$args=explode(',',strtolower(preg_replace($patt, $repl, $name)));
	
	
	
	return array_map(function($val){


		$key=array_search($val, $this->numbers);
		
		if(is_numeric($key)){
			return $key;

		}
		$key=array_search($val, $this->symbols);
		if($key!==false){
			return $key;
		}


	}, $args);


	

}

}

$obj=new Calculator();
echo $obj->twoPlusFour()."\n";
echo $obj->threePlusEight()."\n";




?>
