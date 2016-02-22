<?php if (empty($get_progs)): ?>
<div class="col-lg-8"><h4>Вы еще не добавили ни одной программы</h4></div>
<?php else:
		if ($_GET["result"]== 'success') {?>
<div class="row">
<div class="col-lg-4 col-lg-offset-4">
<div class="alert alert-dismissible alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>
Программа успешно добавлена
</div></div>
</div>
<? } ?>
<div class="col-lg-6"><h1>Мои программы</h1></div>
<div class="col-lg-12 ">
<table class="table table-striped table-hover table-bordered">
	<thead>

	<tr>
		<th>ID программы</th>
		<th>Название программы</th>
		<th>Версия</th>
		<th>Категория</th>
		<th>Pastebin</th>
		<th>Форум</th>
		<th>Дата публикации</th>
		<th>Опции</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($get_progs as $proginf) :
		$catid = $proginf['category'];
		$forumlink = $proginf['forum_url'];
		$catnamebyid = $db->rows("SELECT name FROM categories where id= $catid"); ?>
	<tr>
		<td><?=$proginf['id']?></td>
		<td><a href="http://<?=$this->basepath;?>/program/<?=$proginf['id'];?>/"><?=$proginf['name'];?></a></td>
		<td><?=$proginf['version']?></td>
		<? foreach ($catnamebyid as $catname)  { ?>
		<td><?=$catname['name']?></td>
		<? } ?>
		<td><a href="http://pastebin.com/<?=$proginf['pastebin_url']?>/">Pastebin</a></td>
		<td><a href="<?=$forumlink?>">Форум</a></td>
		<td><?=date("d.m.Y H:i:s", strtotime($proginf['time']))?></td>
		<td><a href="http://<?=$this->basepath;?>/progs/edit/<?=$proginf['id']?>/"><span class="glyphicon glyphicon-cog"></span> Редактировать</a>/<a href="http://<?=$this->basepath;?>/progs/del/<?=$proginf['id']?>/"><span class="glyphicon glyphicon-trash"></span> Удалить</a></td>
	</tr>
	<?php endforeach; ?>
	</tbody>
</table></div>
<?php endif; ?>
