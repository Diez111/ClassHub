<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" href="/mvc/vistas/calendario/calendario.css">
 
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />


  <?php require 'vistas/includes/scripts.php'; ?> 
  <title>ClassHub</title>
</head>
<body>
  <?php require "vistas/includes/header.php"; ?>
  <?php require "vistas/includes/nav.php"; ?>
  
  <dir class="cont" style="float: left;">
    <div class="containercal">
      <div class="calendar">
        <div class="month">
          <i class="fas fa-angle-left prev"></i>
          <div class="date">
            <h1></h1>
            <p></p>
          </div>
          <i class="fas fa-angle-right next"></i>
        </div>
        <div class="weekdays">
          <div>Sun</div>
          <div>Mon</div>
          <div>Tue</div>
          <div>Wed</div>
          <div>Thu</div>
          <div>Fri</div>
          <div>Sat</div>
        </div>
        <div class="days"></div>
      </div>
    </div>
  </dir>

    <script src="/mvc/vistas/calendario/calendario.js"></script>

  <?php require "vistas/includes/footer.php"; ?>
</body>
</html>
 