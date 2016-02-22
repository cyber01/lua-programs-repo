<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title><?=$this->title?></title>
    <meta charset="utf-8">
    <meta name="description" content="Репозиторий Lua программ мода OpenComputers">
    <meta name="keywords" content="репозиторий,lua,программы,скрипты,lua программы">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" media="all" href="http://<?=$this->basepath;?>/style/general/css/bootstrap.css" media="screen">
    <link rel="icon" type="image/png" href="http://<?=$this->basepath;?>/style/general//images/favicon.png">
    <!--[if lt IE 9]>
    <script src="http://<?=$this->basepath;?>/style/general/js/html5shiv.js"></script>
    <script src="http://<?=$this->basepath;?>/style/general/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="line-green"></div>
<header>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
            <?php foreach ($this->menu as $key => $value): ?>
            <li <?php if ($value['status'] == 'selected' and $value['url'] != 'register'): echo 'class="active"'; elseif ($value['url'] == 'register'): echo 'class="gold"'; endif; ?>><a href="http://<?=$this->basepath;?>/<?php if ($value['url'] != 'main'): echo $value['url'].'/'; endif; ?>"><?=$value['name']?></a></li>
            <?php endforeach; ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
            <li><a href="http://computercraft.ru/">На форум</a></li>
      </ul>
    </div>
  </div>
</header>
<?=$this->controller?>
<script src="http://<?=$this->basepath;?>/style/general/js/jquery-1.11.3.min.js"></script>
<script src="http://<?=$this->basepath;?>/style/general/js/bootstrap.js"></script>
<?php if ($_GET['page'] == progsadd || $_GET['page'] == progsedit) { ?>
<script>
    $(function() {
        $('#save').click(function() {
            var formValid = true;
            $("#form").find("input,select,textarea").not('[type="submit"]').each(function() {
                var formGroup = $(this).parents('.form-group');
                var glyphicon = formGroup.find('.form-control-feedback');
                if (this.checkValidity()) {
                    formGroup.addClass('has-success').removeClass('has-error');
                    glyphicon.addClass('glyphicon-ok').removeClass('glyphicon-remove');
                } else {
                    formGroup.addClass('has-error').removeClass('has-success');
                    glyphicon.addClass('glyphicon-remove').removeClass('glyphicon-ok');
                    formValid = false;
                }
            });
            if (formValid) {
                $('#form').form('hide');
                $("#form").submit();
                $('#success-alert').removeClass('hidden');
            }
        });
    });
</script>
<? } ?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter33182708 = new Ya.Metrika({
                    id:33182708,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/33182708" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>