<header id="header" class="ui-header">

    <div class="navbar-header">
        <!--logo start-->
        <a href="<?php echo site_url('/') ?>" class="navbar-brand"  style="padding-top: 0px;">
            <span class="logo"><img src="<?php echo $member_data['lg_dark_logo']; ?>" width="160" height="50" alt="logo" class="logo-default"/></span>
        </a>
        <!--logo end-->
    </div>

    <div class="navbar-collapse nav-responsive-disabled">

        <!--toggle buttons start-->
        <ul class="nav navbar-nav">
            <li>
                <a class="toggle-btn" data-toggle="ui-nav" href="">
                    <i class="fa fa-bars"></i>
                </a>
            </li>

        </ul>
        <!-- toggle buttons end -->
        <!--notification start-->
        <ul class="nav navbar-nav navbar-right hidden-xs">
            <!--
            <li class="dropdown language-switch">
                <div id="google_translate_element"></div>
                <script type="text/javascript">
                    function googleTranslateElementInit() {
                        new google.translate.TranslateElement({
                            pageLanguage: 'en',
                            includedLanguages: 'ar,bn,en,gu,hi,kn,mr,ms,pa,ta,te',
                            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                            autoDisplay: false
                        }, 'google_translate_element');
                    }
                </script>
                <script type="text/javascript"
                        src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
            </li> -->
            <?php if (config_item('enable_repurchase')=="Yes") { ?>
                <a href="<?php echo site_url('cart/pre_checkout') ?>"
                   class="btn btn-danger hidden-xs glyphicon glyphicon-shopping-cart"
                   style="margin: 10px">
                    Cart: <?php echo count($this->cart->contents()) ?> </a>
            <?php } ?>
            <li class="dropdown dropdown-usermenu">
                <a href="#" class=" dropdown-toggle" data-toggle="dropdown"
                   aria-expanded="true">
                    <span class="hidden-sm hidden-xs"
                          style="font-weight: bold">
                        <?php echo $this->session->name ?></span>
                    <span class="caret hidden-sm hidden-xs"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                    <li><a href="<?php echo site_url('member/settings') ?>"><i
                                    class="fa fa-cogs"></i> Settings</a>
                    </li>
                    <li><a href="<?php echo site_url('member/profile') ?>"><i
                                    class="fa fa-user"></i> Profile</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo site_url('member/logout') ?>"><i
                                    class="fa fa-sign-out"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!--notification end-->

    </div>

</header>