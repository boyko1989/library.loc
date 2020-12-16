<?php

require_once('html/head.php');
  require_once('html/header.php');
print_r($url);

?>
<style type="text/css">
body {
margin: 0 auto;
}
</style>
</head>
<body>
<?php if (isset($mes)):?>
	<?=$mes?>
	<?php else: ?>
<form action="create-user" method="post">
<input type="text" name="login" placeholder="Логин"><br>
<input type="text" name="vis_name" placeholder="Отображаемое имя"><br>
<input type="password" name="password" placeholder="Пароль"><br>
<input type="submit" value="Регистрация">
</form>
<?php endif; ?>
</body>
</html>