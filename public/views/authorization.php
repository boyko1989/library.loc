<?php
	require_once('html/head.php');
	require_once('html/header.php');
?>
	<body>	
		
		<form action="enter" method="post">
			<input type="text" name="login" placeholder="Логин"><br>			
			<input type="password" name="password" placeholder="Пароль"><br>
			<input type="submit" value="Войти">
		</form>
	</body>
</html>