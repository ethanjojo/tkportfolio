<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/domains/3RD/web/header.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/domains/3RD/web/nav.php';
//echo "<pre>";


if (isset($_GET["album"]) && !empty($_GET["album"])) {
    $albumName = $_GET["album"];
    $album = glob($_SERVER["DOCUMENT_ROOT"] . "/domains/photos/" . $albumName . "/*.*");
    $album = array_slice($album, 1);
    $album = array_map(function ($image) {
        return str_replace($_SERVER["DOCUMENT_ROOT"], "", $image);
    }, $album);
    //var_dump($album);
    if (empty($album)) {
        //redirect to photo using js
        echo "<script>window.location.href = '/photos';</script>";
    }

?>
    <main class="main-content">
        <div class="container-fluid photos">
            <div class="row align-items-stretch">

                <?php
                foreach ($album as $key => $image) {
                ?>
                    <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <a href="<?= $image ?>" class="d-block photo-item" data-fancybox="gallery" data-animation-effect="true">
                            <img src="<?= $image ?>" alt="Image" class="img-fluid">
                            <div class="photo-text-more">
                                <span style="font-size: 30px;" class="icon bi bi-search"></span>
                            </div>
                        </a>
                    </div>
                <?php

                }
                ?>
            </div>
            <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/domains/3RD/web/copyright.php'; ?>
        </div>
    </main>
<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/domains/3RD/web/footer.php';
} else {
    //echo "<script>window.location.href = '/home';</script>";
    //get all images from all albums
    $images = glob($_SERVER["DOCUMENT_ROOT"] . "/domains/photos/*/*.*");
    $images = array_slice($images, 1);
    $images = array_map(function ($image) {
        return str_replace($_SERVER["DOCUMENT_ROOT"], "", $image);
    }, $images);
    //randomize images
    shuffle($images);
    //var_dump($images);
?>
    <main class="main-content">
        <div class="container-fluid photos">
            <div class="row align-items-stretch">

                <?php
                foreach ($images as $key => $image) {
                ?>
                    <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <a href="<?= $image ?>" class="d-block photo-item" data-fancybox="gallery" data-animation-effect="true">
                            <img src="<?= $image ?>" alt="Image" class="img-fluid">
                            <div class="photo-text-more">
                                <span style="font-size: 30px;" class="icon bi bi-search"></span>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
            <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/domains/3RD/web/copyright.php'; ?>
        </div>
    </main>
<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/domains/3RD/web/footer.php';
}
?>