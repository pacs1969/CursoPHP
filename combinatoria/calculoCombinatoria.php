<?php
////include $_SERVER['DOCUMENT_ROOT'].'/combinatoria/public/calculoCombinatoria.php';
//** Calculo de factorial
// $a: entrada: Integer
// salida: Factorial

function factorial($a)
{
	$result = 1;
	
	while ($a > 1)
	{
		
		$result = $result * $a;
		$a--;
	}
	return $result;
}

function combinatoria($m, $n)
{
	return (factorial($m)/factorial(($m-$n)));
}

if (isset($_POST['m']) & isset($_POST['n']))
{
	
	$m = $_POST['m'];
	$n = $_POST['n'];
	
	echo "C".$m.",".$n." = ". combinatoria($m,$n). "<br />";

	echo 'factorial de 5 = '. factorial(5);
	exit();

}
?>

