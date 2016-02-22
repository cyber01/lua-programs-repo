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
                    <?php require $_SERVER["DOCUMENT_ROOT"].$tpl->basehome.'/class/cat.inc.tpl'; ?>

                        </div>
                    </div>
                </div>

            <div class="col-lg-8">
                <? foreach ($programinfo as $arr) { ?>
                <div class="well">
                    <div class="panel panel-default">
                        <div class="panel-body">
                                <center><h1><?php echo $arr['name']; ?> <?php echo  $arr['version']; ?></h1></center>
                            <hr>
                            <?php if(!empty($arr['image'])) { ?> <center><img src="<?php echo $arr['image'];?>" alt="<?php echo $arr['name']; echo $arr['version']; ?>"></img></center> <?php } ?>
                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> &nbsp;<b>Дата публикации:</b> <?php echo date("d.m.Y", strtotime($arr['time'])); ?> | <span class="glyphicon glyphicon-folder-open"></span>&nbsp; <b>Категория:</b> <?php echo $catnamebyurl["name"]; ?> | <span class="glyphicon glyphicon-user"></span>&nbsp; <b>Автор:</b> <?php echo $arr['author']; ?><br>
                            <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> &nbsp;<b>Количество загрузок:</b> <?php echo $arr["downloads"]; ?> | <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp; <b>Рейтинг(не реализовано):</b> <?php echo $arr["rating"]; ?>
                            <h3>Описание</h3>
                            <p class="text-muted"><?php echo $arr['description'];?></p>
                            <h3>Загрузки</h3>
                                <h4><b>Код загрузки:</b> <?=$arr['id'];?></h4>
                            <span class="glyphicon glyphicon-random" aria-hidden="true"></span> &nbsp;<b>Зависимости:</b> <?php $deps = explode(",", $arr['deps']); if(strlen(substr($arr['deps'], 0)) == 0) { echo 'Нет';} else {
                                for($i = 0; $i < sizeof($deps); ++$i) {
                                echo ("<ul><li><a target = 'blank' href='http://$this->basepath/program/$deps[$i]/'>Программа №$deps[$i]</a></li></ul>"); }} ?><br><br>
                            <div class="btn-group btn-group-justified">
                                <?php if(!empty($arr['pastebin_url'])) { ?>
                                <a href="http://pastebin.com/<?php echo $arr['pastebin_url']; ?>" class="btn btn-primary">С Pastebin</a>
                                <?php }
                                elseif(!empty($arr['git_url'])) { ?>
                                <a href="<?php echo $arr['git_url']; ?>" class="btn btn-primary">С Github/Gist</a>
                                <?php } ?>
                                <a href="http://<?php echo $this->basepath."/download/".$arr['id']; ?>/" class="btn btn-primary">Через сайт</a>
                                <a href="<?php echo $arr['forum_url']; ?>" class="btn btn-primary">Тема на форуме</a>
                            </div><br>
                            <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> &nbsp;<b>Теги:</b> <?php if(!empty($arr['tags'])) { $tags=explode(",", $arr['tags']); for($i = 0; $i < sizeof($tags); ++$i) { ?>
                            <a target='blank' href='http://<?=$this->basepath;?>/tags/<?=$tags[$i];?>/'><?=$tags[$i];?></a>
                            <?php }} else { echo "Нет"; } ?>
                        </div>
                    </div>
                </div><?php } ?>
            </div>
        </div> </div>
</div>
</div>