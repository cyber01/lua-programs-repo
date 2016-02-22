<div class="container">

    <div class="page-header" id="banner">
        <div class="row">
            <center><h1>Computercraft.ru Repository</h1>
                <p class="lead">Программы на Lua</p></center>
        </div>
    </div>

    <!-- Navbar
    ================================================== -->
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-4">
                <div class="bs-component">
                    <?php require $_SERVER["DOCUMENT_ROOT"].'/class/cat.inc.tpl'; ?>

                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <?php if (empty($programs)): ?>
                <div class="well"><div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
                                <div class="row"><p><h4><b>В данной категории еще нет программ</b></h3></p></div>
                            </div>
                        </div>
                    </div>
                <?php else: foreach ($programs as $arr) { ?>
                    <div class="well">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <center><h1><?php echo $arr['name']; ?> <?php echo  $arr['version']; ?></h1></center>
                                <hr>
                                <?php if(!empty($arr['image'])) { ?> <center><img src="<?php echo $arr['image'];?>" alt="<?php echo $arr['name']; echo $arr['version']; ?>"></img></center> <?php } ?>
                                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> &nbsp;<b>Дата публикации:</b> <?php echo date("d.m.Y", strtotime($arr['time'])); ?> | <span class="glyphicon glyphicon-folder-open"></span>&nbsp; <b>Категория:</b> <?php echo $catnamebyurl["name"]; ?> | <span class="glyphicon glyphicon-user"></span>&nbsp; <b>Автор:</b> <?php echo $arr['author']; ?><br>
                                <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> &nbsp;<b>Количество загрузок:</b> <?php echo $arr["downloads"]; ?> | <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp; <b>Рейтинг(не реализовано):</b> <?php echo $arr["rating"]; ?>
                                <h3>Описание</h3>
                                <p class="text-muted"><?php echo $arr['sdesc'];?></p>
                                <?php echo "<a href=\"http://$this->basepath/program/".$arr['id']."/\" class=\"btn btn-info\">Подробнее</a>"; ?>
                                <br>
                                <br>
                                <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> &nbsp;<b>Теги:</b> <?php if(!empty($arr['tags'])) { $tags=explode(",", $arr['tags']); for($i = 0; $i < sizeof($tags); ++$i) { ?>
                                <a target='blank' href='http://<?=$this->basepath;?>/tags/<?=$tags[$i];?>/'><?=$tags[$i];?></a>
                                <?php }} else { echo "Нет"; } ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>