<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php?page=controller_home&op=list">Wines</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          
          <li class="nav-item active">
            <a class="nav-link" href="index.php?page=controller_home&op=list" data-tr="Home">
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=controller_shop&op=list" data-tr="Shop"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=controller_wines&op=list" data-tr="Wines"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=controller_order&op=list" data-tr="Order"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=aboutus" data-tr="About"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=controller_contact&op=list" data-tr="Contact"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=controller_cart&op=list" data-tr="Cart"></a>
          </li>
          </li>
            <a class="nav-link" href="index.php?page=controller_login&op=profile"><?php echo $_SESSION['username']?><img style="margin-left: 2px; height: 20px; width: 20px;" src="<?php echo $_SESSION['avatar']?>"/></a>
          </li>
          </li>
            <a class="nav-link" id="logout" data-tr="Log out"></a>
          </li>
        
        </ul>
      </div>
    </div>
  </nav>