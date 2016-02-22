<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-4">
                <div class="bs-component">
                    <div class="container-fluid">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Облако тегов</h3>
                            </div>
                            <div class="panel-body">
                                <ul>
                                    <? foreach ($tags_cloud as $tagg)
                                     {
                                    $size_font =  $tagg["count"]/2+$tagg["count"]+11;
                                    printf("
						   <li style='font-size:%spx'><a href='/tags/%s'>%s (программ %s)</a></li>
                                    ",$size_font,$tagg["tag_name"],$tagg["tag_name"],$tagg["count"]);
                                    } ?>
                                </ul>
                            </div>
                        </div>


                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <? if (!empty($tag)) {

            foreach($result_choice_up as $arr) {
            $tags = $arr["tags"];
            $search = "/$tag/";
            }
            if(preg_match($search,$tags,$array)) {


            ?>
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
            </div><?php } ?>
            <?php } else { ?>
            <div class="well">
                <div class="panel panel-default">
                    <div class="panel-body">
            <h3>Не указан тег</h3>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div> </div>
</div>
</div>