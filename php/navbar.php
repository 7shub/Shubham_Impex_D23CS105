<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/navbar.css" />
    <title>Shubham-Impex</title>
  </head>
  <body>
    <nav>
      <ul class="sidebar">
        <li onclick="hideSidebar()">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            height="44px"
            viewBox="0 -960 960 960"
            width="48px"
            fill="#000000"
          >
            <path
              d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"
            />
          </svg>
        </li>
        <li><a href="../php/home.php">Home</a></li>
        <li><a href="../php/services.php">Services</a></li>
        <li><a href="../php/industries.php">Industries</a></li>
        <li><a href="../html/resources.html">Resources</a></li>
        <li><a href="../php/aboutus.php">About Us</a></li>
        <li><a href="../contactus/index.php">Contact Us</a></li>
        <button class="hideOnMenu2"><a href="../php/login.php">Login</a></button>
      </ul>
      <ul>
        <li>
          <img class="logo" src="../images/navbar/logo.png" alt="logo" />
        </li>
        <li class="hideOnMobile"><a href="../php/home.php">Home</a></li>
        <li class="hideOnMobile">
          <a href="../php/services.php">Services</a>
        </li>
        <li class="hideOnMobile"><a href="../php/industries.php">Industries</a></li>
        <li class="hideOnMobile">
          <a href="#">Resources</a>
        </li>
        <li class="hideOnMobile">
          <a href="../php/aboutus.php">About Us</a>
        </li>
        <li class="hideOnMobile"><a href="../contactus/index.php">Contact Us</a></li>
        <button class="hideOnMobile"><a href="../php/login.php">login/SignUp</a></button>
        <li class="menu-button" onclick="showSidebar()">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            height="48px"
            viewBox="0 -960 960 960"
            width="48px"
            fill="#000000"
          >
            <path
              d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"
            />
          </svg>
        </li>
      </ul>
    </nav>
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
