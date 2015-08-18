<?php

require_once('config.php');
require_once('functions.php');

?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>お問い合わせフォーム</title>
	</head>
	<body>
		<h1>お問い合わせフォーム</h1>
		<form action="" method="post">
			<p>お名前：<input type="text" name="name" value=""></p>
			<p>メールアドレス*：<input type="text" name="email" value=""></p>
			<p>内容*；</p>
			<p><textareatype="textarea" name="memo" cols="40" rows="5"></textarea></p>
			<p><input type="submit" value="送信"></p>
		</form>
	</body>
</html>