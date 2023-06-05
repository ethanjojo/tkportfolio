<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="bi bi-x js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body">

    </div>
</div>
<header class="header-bar d-flex d-lg-block align-items-center" data-aos="fade-left">
    <div class="site-logo" style="margin-bottom: 0;">
        <a href="<? $_SERVER["DOCUMENT_ROOT"] ?>/home">Konečný <i class="bi bi-camera"></i></a>
    </div>
    <div class="d-inline-block d-xl-none ml-md-0 ml-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white">
            <h2 class="bi bi-list"></h2>
        </a></div>
    <div class="main-menu">
        <ul class="js-clone-nav">
            <li class="<?php if(basename(dirname($_SERVER["PHP_SELF"]))=="home"){echo "active";}?>"><a href="<? $_SERVER["DOCUMENT_ROOT"]?>/home">Domů</a></li>
            <li class="<?php if(basename(dirname($_SERVER["PHP_SELF"]))=="photos"){echo "active";}?>"><a href="<? $_SERVER["DOCUMENT_ROOT"]?>/photos">Fotky</a></li>
            <li class="<?php if(basename(dirname($_SERVER["PHP_SELF"]))=="bio"){echo "active";}?>"><a href="<? $_SERVER["DOCUMENT_ROOT"]?>/bio">Bio</a></li>
            <!--<li class="<?php //if(basename(dirname($_SERVER["PHP_SELF"]))=="contact"){echo "active";}?>"><a href="<? //$_SERVER["DOCUMENT_ROOT"]?>/contact">Kontakt</a></li>-->
        </ul>
        <ul class="social js-clone-nav">
            <li><a target="_blank" href="https://www.facebook.com/profile.php?id=100008629140294"><i class="bi bi-facebook"></i></a></li>
            <!--<li><a href="#"><i class="bi bi-twitter"></i></a></li>-->
            <li><a target="_blank" href="https://www.instagram.com/tomaskonecny__/"><i class="bi bi-instagram"></i></a></li>
            <li><a href="mailto:konecny@test.cz"><i class="bi bi-envelope"></i></a></li>
        </ul>
    </div>
</header>