<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?php amigable('?module=home&function=home_list'); ?>">Wines</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto" id="ulMenu">
          
          <li class="nav-item active">
            <a class="nav-link" href="<?php amigable('?module=home&function=home_list'); ?>" data-tr="">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php amigable('?module=shop&function=shop_list'); ?>" data-tr="">Shop</a>
          </li>
          <!-- <li class="nav-item">
          <a class="nav-link" href="<?php amigable('?module=login&function=login_list'); ?>" data-tr="">Log in</a>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link" href="<?php amigable('?module=cart&function=cart'); ?>" data-tr="Cart"></a>
          </li>  -->
          <li class="nav-item">
            <a class="nav-link" href="<?php amigable('?module=contact&function=contact_list'); ?>" >Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>