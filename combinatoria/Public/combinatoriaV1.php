
<html>
<body>
  <form action="<?php $_PHP_SELF ?>" method="POST">
Combinatoria (M,N)<br />
  M: <input type="text" name='m' />
  N: <input type="text" name="n" />

  <input type="submit" />
  </form>
</body>
</html>


<?php
//include $_SERVER['DOCUMENT_ROOT'].'/combinatoria/public/calculoCombinatoria.php';
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

/*
if( isset($_POST['name']) || isset($_REQUEST["age"]) )
{
	echo "Welcome ". $_REQUEST['name']. "<br />";
	echo "You are ". $_REQUEST['age']. " years old.";
	exit();
}
*/
?>
