<?php

require_once('../config.php');
require_once('../functions.php');

$dbh = connectDb();

$entries = array();

$sql = "select * from entries where status = 'active' order by created desc";

foreach ($dbh->query($sql) as $row) {
	array_push($entries, $row);
}

// var_dump($entries);

// exit;

?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>お問い合わせ一覧</title>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<h1>データ一覧</h1>
		<p>お問い合わせ件数：<?php echo count($entries); ?>件</p>
		<ul>
			<?php foreach ($entries as $entry) : ?>
				<li>
					<?php echo h($entry['email']); ?>
					<a href="edit.php?id=<?phpecho h($entry['id']); ?>">[削除]</a>
					<span class="deleteLink" data-id="<?php echo h($entry['id']); ?>">[削除]</span>
				</li>
			<?php endforeach ; ?>
		</ul>
		<p><a href="<?php echo SITE_URL; ?>">お問い合わせフォームへ</a></p>
	</body>
</html>