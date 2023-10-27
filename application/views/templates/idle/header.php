

<header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <a href="index.php"><img src="logo.png" class="img img-responsive" style="max-height: 40px"></a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li  <?php if($active=='home'){ ?> class="menu-active" <?php } ?>><a href="index.php">Home</a></li>
          <li <?php if($active=='about'){ ?> class="menu-active" <?php } ?>><a href="about.php">About Us</a></li>
          <li <?php if($active=='contact'){ ?> class="menu-active" <?php } ?>><a href="contact.php">Contact</a></li>
          <li><a href="<?php echo site_url('site/login'); ?>" target="_blanl">Login</a></li>
          <li><a href="<?php echo site_url('site/register'); ?>" target="_blank">Join Now</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->