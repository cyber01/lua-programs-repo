<div class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Список категорий</h3>
        </div>
        <div class="panel-body">
            <ul class="list-group">
                <? foreach ($cats as $arr) {
                                        echo '<li class="list-group-item">';
                echo "<span class='badge'>".$arr['count']."</span>";
                echo "<a href=\"http://$this->basepath/cat/".$arr['url']."/\"> ".$arr['name']."</a>";
                echo '</li>';
                }
                ?>
            </ul>
        </div>
    </div>