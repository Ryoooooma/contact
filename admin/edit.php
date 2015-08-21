<?php

session_start();

require_once('../config.php');
require_once('../functions.php');


if ($_SERVER['REQUEST_METHOD'] != "POST") {
	// 投稿前

	// CSRF対策
	setToken();	
} else {
	// 投稿後
	checkToken();

	$name = $_POST['name'];
	$email = $_POST['email'];
	$memo = $_POST['memo'];

	$error = array();

	// エラー処理
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error['email'] = "メールアドレスの形式が正しくありません";
	}
	if ($email == '') {
		$error['email'] = 'メールアドレスを入力してください';
	}
	if ($memo == '') {
		$error['memo'] = '内容を入力してください';
	}

	if (empty($error)) {
		// DBに格納
		$dbh = connectDb();

		// thanksページにとばす
		header('Location: '.ADMIN_URL);
		exit;
	}
}

?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>データの編集</title>
	</head>
	<body>
		<h1>データの編集</h1>
		<form action="" method="POST">
			<p>お名前：<input type="text" name="name" value=""></p>
			<p>
				メールアドレス*：<input type="text" name="email" value="">
				<?php if ($error['email']) { echo h($error['email']); } ?>
			</p>
			<p>内容*：</p>
			<p><textarea name="memo" cols="40" rows="5"></textarea></p>
			<?php if ($error['memo']) { echo h($error['memo']); } ?>
			<p><input type="submit" value="更新"></p>
			<input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>">
		</form>
		<p><a href="<?php echo ADMIN_URL; ?>">戻る</a></p>
	</body>
</html>