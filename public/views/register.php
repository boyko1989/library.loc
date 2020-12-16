<?php
	require_once('html/head.php');
	require_once('html/header.php');
?>	
	<body>
		<form action="create-user" method="post">
			<input type="text" name="login" placeholder="Логин"><br>
			<input type="text" name="vis_name" placeholder="Отображаемое имя"><br>
			<input type="password" name="password" placeholder="Пароль"><br>
			<input type="submit" value="Регистрация">
		</form>		
	</body>
</html>