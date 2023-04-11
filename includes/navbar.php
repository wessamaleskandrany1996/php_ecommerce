<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
  <div class="container">
    <a class="navbar-brand" href="index.php">
        <img src="2.png" class="nav-link" alt="logo" style="height: 40px ; width:100px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a style="color:#2ab8ec" class="nav-link a"  aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a style="color:#2ab8ec" class="nav-link" href="categories.php">Categories</a>
        </li>
        <?php if (isset($_SESSION['auth'])) 
        {
           ?>
        <li class="nav-item dropdown">
          <a style="color:#2ab8ec" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['auth_user']['name'] ?>
          </a>
          <ul class="dropdown-menu">
            <li><a style="color:#2ab8ec" class="dropdown-item" href="#">Action</a></li>
            <li><a style="color:#2ab8ec" class="dropdown-item" href="#">Another action</a></li>
            <li><a style="color:#2ab8ec" class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
        <?php 
        }else{
          ?>
            <li class="nav-item">
              <a style="color:#2ab8ec" class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a style="color:#2ab8ec" class="nav-link" href="register.php">Register</a>
            </li>
          <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>