<?php
  include 'navbar.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../css/services.css" />
</head>
<body>
  <body>
    <div class="banner">
      <div class="slider" style="--quantity: 10">
        <div class="item" style="--position: 1">
          <img src="../image/services/automotive.png" alt="services1" />
        </div>
        <div class="item" style="--position: 2">
          <img src="../image/services/chemical.png" alt="services1" />
        </div>
        <div class="item" style="--position: 3">
          <img src="../image/services/dangerous.png" alt="services1" />
        </div>
        <div class="item" style="--position: 4">
          <img src="../image/services/energy.png" alt="services1" />
        </div>
        <div class="item" style="--position: 5">
          <img src="../image/services/healthcare.png" alt="services1" />
        </div>
        <div class="item" style="--position: 6">
          <img src="../image/services/industrial.png" alt="services1" />
        </div>
        <div class="item" style="--position: 7">
          <img src="../image/services/perishables.png" alt="services1" />
        </div>
        <div class="item" style="--position: 8">
          <img src="../image/services/retail-feshion.png" alt="services1" />
        </div>
        <div class="item" style="--position: 9">
          <img src="../image/services/technology .png" alt="services1" />
        </div>
        <div class="item" style="--position: 10">
          <img src="../image/services/retail-feshion.png" alt="services1" />
        </div>
      </div>
    </div>

    <script>
      function showSidebar() {
        const sidebar = document.querySelector('.sidebar');
        sidebar.style.display = 'flex';
      }
      function hideSidebar() {
        const sidebar = document.querySelector('.sidebar');
        sidebar.style.display = 'none';
      }
    </script>
  </body>
</html>
