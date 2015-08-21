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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<h1>データ一覧</h1>
		<p><span id="num">お問い合わせ件数：<?php echo count($entries); ?></span>件</p>
		<ul>
			<?php foreach ($entries as $entry) : ?>
				<li id="entry_<?php echo h($entry['id']); ?>">
					<?php echo h($entry['email']); ?>
					「<?php echo h($entry['memo']); ?>」
					<a href="edit.php?id=<?phpecho h($entry['id']); ?>">[編集]</a>
					<span class="deleteLink" data-id="<?php echo h($entry['id']); ?>">[削除]</span>
				</li>
			<?php endforeach ; ?>
		</ul>
		<p><a href="<?php echo SITE_URL; ?>">お問い合わせフォームへ</a></p>
		<script>
			$(function() {
				$('.deleteLink').click(function() {
					if (confirm("削除してもよろしいですか？")) {
						var num = $('#num').text();
						num--;
						$.post('./delete.php', {
							id: $(this).data('id')
						}, function(rs) {
							$('#entry_' + rs).fadeOut(800);
							// ここ使うと削除した時にバグが起きる→要検証！
							// $('#num').text(num);
						});
					}
				});
			});
		</script>
	</body>
</html>














