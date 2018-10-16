<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link href="<?=base_url();?>css/style.css" rel="stylesheet">

</head>
<body>

<div id="container">
	<h1>Get Articles</h1>

	<div id="body">


		//Форма поиска по датам
		<form method="post" action="<?=base_url();?>index.php/welcome/getArticles">
			<select name="seach">
				<?php foreach($articles as $item):?>
				<option>
					<?=$item['date'];?>
				</option>
				<?php endforeach;?>
			</select>
			<input type="submit" name="seach" value="Поиск">
		</form>

		//форма отображения кол-ва сообщений
		<form method="post" action="<?=base_url();?>index.php/welcome/getArticles">
			<input type="text" name="limit" value="">
			<input type="submit" name="lim" value="Выбор">
		</form>

		//форма отображения сообщений
		<table border="1" width="100%">
			<tr>
				<th>Номер телефона</th>
				<th>Текст сообщения</th>
				<th>Дата отправки</th>
			</tr>
			<?php foreach($articles as $item):?>
			<tr>
				<td><p><?=$item['title'];?></p></td>
				<td><p><?=$item['text'];?></p></td>
				<td><p><?=$item['date'];?></p></td>
			</tr>
			<?php endforeach;?>
		</table>

		<code><?php echo $this->pagination->create_links(); ?></code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
		<p><a href="<?=base_url();?>">welcome</a></p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>