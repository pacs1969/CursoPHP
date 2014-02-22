<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Combinatoria</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Combinatoria</a></h1>
		<form id="form_795925" class="appnitro"  method="post" action="<?php $_PHP_SELF ?>">
					<div class="form_description">
			<h2>Combinatoria</h2>
			<p>Calcular el número conjuntos que se pueden formar con M elementos tomados de N en N.
Cm,n</p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="m">Elementos Disponibles (M) </label>
		<div>
			<input id="element_1" name="m" class="element text small" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="n">Tamaño del Conjunto (N)
 </label>
		<div>
			<input id="element_2" name="n" class="element text small" type="text" maxlength="255" value=""/> 
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="795925" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Calcular"  action= "POST"/>
		</li>
			</ul>
		</form>	
		<div id="footer">
			
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
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

