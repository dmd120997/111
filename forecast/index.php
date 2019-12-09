<html lang="ua">
<head>
<meta charset="utf-8" />
<meta name="author" content="Maryna Salimonenko">
<title>OpenWeatherMap API - Прогноз погоди</title>
<style>

.bg-green-600 {
  background-color: #11c26d!important;
}
.badge {
  margin: 3px 3px;
}
</style>
</head>
<?php
include($_SERVER['DOCUMENT_ROOT'].'/inc/head-links.php');
include($_SERVER['DOCUMENT_ROOT'].'/forecast/getdata_ua.php');
include($_SERVER['DOCUMENT_ROOT'].'/forecast/689531_Vynohradove.php');
include($_SERVER['DOCUMENT_ROOT'].'/forecast/711435_Brylivka.php');
?>

<body>
  <?php
  include($_SERVER['DOCUMENT_ROOT'].'/inc/nav.php');
  ?>

    <div class="container-fluid">
      <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">OpenWeatherMap API - Прогноз погоди</h1>
          </div>
          <div class="card-deck mb-3 text-center" style="width: 700px;">
          <div class="card mb-4 shadow-sm" style="width: 320px; text-transform: uppercase;">
             <div class="card-header bg-green-600 text-white text-left">
               <span class="iconify" data-icon="entypo:location-pin" data-inline="false" style="color: white;"></span><span><?php echo $data_V->name; ?>, <?php echo $data_V->sys->country; ?></span>
               <span class="badge badge-pill badge-light justify-content-end"><?php echo date("H:i"); ?></span>
             </div>
             <div class="card-body test" style="width: 320px; height: 100%;">
               <div class="row">
                 <div class="col-sm">
                   <span class="badge badge-pill badge-light">
                   <span class="iconify" data-icon="ic:baseline-date-range" data-inline="false" style="color: #11c26d;"></span><?php echo getDateUa(); ?>
                 </span>
                 </div>
                 <div class="col-sm">
                   <span class="badge badge-pill badge-light">
                     <span class="iconify" data-icon="mdi:calendar-today" data-inline="false" style="color: #11c26d;"></span><?php echo getDayUa(); ?>
                   </span>
                 </div>
               </div>
               <div class="row">
                 <div class="col-sm">
                 <img src="http://openweathermap.org/img/wn/<?php echo $data_V->weather[0]->icon; ?>.png" class="weather-icon mx-auto" />
                 </div>
                 <div class="col-sm">
                   <h1 style="color: #11c26d;"><?php echo $data_V->main->temp_max; ?>&deg;c</h1>
                 </div>
               </div>
               <div class="row">
                 <div class="col-sm">
                   <span class="badge badge-pill badge-light">
                   <span class="iconify" data-icon="ant-design:cloud-outline" data-inline="false" style="color: #11c26d;"></span><?php echo ucwords($data_V->weather[0]->description); ?>
                 </span>
                 </div>
                 <div class="col-sm">
                   <span class="badge badge-light"><span class="iconify" data-icon="ant-design:up-outline" data-inline="false" style="color: #11c26d;"></span><?php echo $data_V->main->temp_max; ?>&deg;c<span></span>
                   <span class="iconify" data-icon="ant-design:down-outline" data-inline="false" style="color: #c21e11;"></span><?php echo $data_V->main->temp_min; ?>&deg;c
                 </div>
               </div>

               <div class="row">
                 <div class="col-sm">
                   <span class="badge badge-pill badge-light">
                   <span class="iconify" data-icon="bx:bx-droplet" data-inline="false" style="color: #11c26d;"></span>Вологість: <?php echo $data_V->main->humidity; ?> %
                 </span>
                 </div>
                 <div class="col-sm">
                   <span class="badge badge-light">
                     <span class="iconify" data-icon="bx-bx-wind" data-inline="false" style="color: #11c26d;"></span>Вітер: <?php echo $data_V->wind->speed; ?> м/с
                   </span>
                 </div>
               </div>
             </div>
           </div>


<!-- Brilyvka next-->


          <div class="card mb-4 shadow-sm" style="width: 320px; text-transform: uppercase;">
             <div class="card-header bg-green-600 text-white text-left">
               <span class="iconify" data-icon="entypo:location-pin" data-inline="false" style="color: white;"></span><span><?php echo $data_B->name; ?>, <?php echo $data_B->sys->country; ?></span>
               <span class="badge badge-pill badge-light justify-content-end"><?php echo date("H:i"); ?></span>
             </div>
             <div class="card-body test" style="width: 320px; height: 100%;">
               <div class="row">
                 <div class="col-sm">
                   <span class="badge badge-pill badge-light">
                   <span class="iconify" data-icon="ic:baseline-date-range" data-inline="false" style="color: #11c26d;"></span><?php echo getDateUa(); ?>
                 </span>
                 </div>
                 <div class="col-sm">
                   <span class="badge badge-pill badge-light">
                     <span class="iconify" data-icon="mdi:calendar-today" data-inline="false" style="color: #11c26d;"></span><?php echo getDayUa(); ?>
                   </span>
                 </div>
               </div>
               <div class="row">
                 <div class="col-sm">
                 <img src="http://openweathermap.org/img/wn/<?php echo $data_B->weather[0]->icon; ?>.png" class="weather-icon mx-auto" />
                 </div>
                 <div class="col-sm">
                   <h1 style="color: #11c26d;"><?php echo $data_B->main->temp_max; ?>&deg;c</h1>
                 </div>
               </div>
               <div class="row">
                 <div class="col-sm">
                   <span class="badge badge-pill badge-light">
                   <span class="iconify" data-icon="ant-design:cloud-outline" data-inline="false" style="color: #11c26d;"></span><?php echo ucwords($data_B->weather[0]->description); ?>
                 </span>
                 </div>
                 <div class="col-sm">
                   <span class="badge badge-light"><span class="iconify" data-icon="ant-design:up-outline" data-inline="false" style="color: #11c26d;"></span><?php echo $data_B->main->temp_max; ?>&deg;c<span></span>
                   <span class="iconify" data-icon="ant-design:down-outline" data-inline="false" style="color: #c21e11;"></span><?php echo $data_B->main->temp_min; ?>&deg;c
                 </div>
               </div>

               <div class="row">
                 <div class="col-sm">
                   <span class="badge badge-pill badge-light">
                   <span class="iconify" data-icon="bx:bx-droplet" data-inline="false" style="color: #11c26d;"></span>Вологість: <?php echo $data_B->main->humidity; ?> %
                 </span>
                 </div>
                 <div class="col-sm">
                   <span class="badge badge-light">
                     <span class="iconify" data-icon="bx-bx-wind" data-inline="false" style="color: #11c26d;"></span>Вітер: <?php echo $data_B->wind->speed; ?> м/с
                   </span>
                 </div>
               </div>
             </div>
           </div>

         </div>

        </main>
      </div>
    </div>
</body>
</html>
