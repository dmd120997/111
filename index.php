<html lang="ua">
<head>
<meta charset="utf-8" />
<meta name="author" content="Maryna Salimonenko">
<title>Виноградівська ОТГ+ ver.1.0</title>
<style>
.body_bg {
  width: 100%;
  height: 100%;
  display: block;
  position: relative;
}

.body_bg::after {
  content: "";
  background: url(../bg.jpg);
  opacity: 0.3;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  position: absolute;
  z-index: -1;
}
</style>

</head>
<?php
include($_SERVER['DOCUMENT_ROOT'].'/inc/head-links.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/connection.php');
?>


  <body class="text-center body_bg">
    <div class="container">
      <div class="row h-100">
    <div class="col-sm-12 my-auto">
      <div class="jumbotron text-center container" style="width: 75%; background-color: #ffffff;">

      <h1>Виноградівська ОТГ+ ver.1.0
</h1>
      <p class="lead text-muted">Раді вітати Вас на веб-додатку Виноградівської ОТГ.</p>
      <p>
        <a href="/population" class="btn btn-primary my-2">Чисельність населення</a>
        <a href="/born-dead" class="btn btn-primary my-2">Природний та міграційний рух населення</a>
        <a href="/population-age" class="btn btn-primary my-2">Розподіл населення</a>
      </p>

  </div>
  </div>
</div>

    </div>
    </body>

</html>
