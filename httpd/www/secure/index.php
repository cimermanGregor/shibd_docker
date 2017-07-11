<html>

	<h1>	
		Hello 
<?php 
echo $_SERVER['eduPersonPrincipalName'];
?>
		!
	</h1>

	<br/>
	Test login succeeded! Here you can find list of your attributes:
	<hr>
	<pre>
<?php 
print_r($_SERVER);
?>
	</pre>
	
	<hr>
	Environment tab
	<pre>
<?php 
print_r($_ENV);
?>
	</pre>
</html>
