<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . '/domains/3RD/web/header.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/domains/3RD/web/nav.php';
//echo "<pre>";

//find all names of folders in the photos folder
$folders = scandir($_SERVER["DOCUMENT_ROOT"] . "/domains/photos");
//remove the first two elements from the array
$folders = array_slice($folders, 2);
//add to each folder the first image or image with the name banner
//change the array so it will be [0]{name, image}, [1]{name, image}...
foreach ($folders as $key => $folder) {
    //try to find the banner image if not found use the first image
    $image = glob($_SERVER["DOCUMENT_ROOT"] . "/domains/photos/" . $folder . "/banner.*");
    if (empty($image)) {
        $image = glob($_SERVER["DOCUMENT_ROOT"] . "/domains/photos/" . $folder . "/*.*");
    }
    if(!empty($image)){
        $image = $image[0];
    }
    //count the number of images in the folder
    $images = glob($_SERVER["DOCUMENT_ROOT"] . "/domains/photos/" . $folder . "/*.*");
    $images = count($images);
    //remove the $_SERVER["DOCUMENT_ROOT"] from the path
    $image = str_replace($_SERVER["DOCUMENT_ROOT"], "", $image);
    $folders[$key] = array("name" => $folder, "image" => $image, "images" => $images);
}

//var_dump($folders);

//8,4   3,6,3   6,6     4,4,4   3,6,3   8,4    6,6    4,8
//create an array of these values and create a array for each group
$grid = array(8, 4, 3, 6, 3, 6, 6, 4, 4, 4, 3, 6, 3, 8, 4, 6, 6, 4, 8);
?>
<main class="main-content">
    <div class="container-fluid photos">
        <div class="row align-items-stretch">

            <?php
            $i = 0;
            foreach ($folders as $key => $folder) {
                if (isset($folder["image"]) && !empty($folder["image"])) {
                    $photo = $folder["image"];
                    //var_dump($folder);
            ?>
                    <div class="col-6 col-md-6 col-lg-<?= $grid[$i] ?>" data-aos="fade-up">
                        <a href="/photos?album=<?= $folder["name"] ?>" class="d-block photo-item">
                            <img src="<?= $photo ?>" alt="Image" class="img-fluid">
                            <div class="photo-text-more">
                                <div class="photo-text-more">
                                    <h2 class="heading" style="font-size: 28px;"><?= $folder["name"] ?></h2>
                                    <span class="meta"><?= $folder["images"] ?> <?php if($folder["images"]==1){ echo "Fotka"; } else if($folder["images"]>1 && $folder["images"]<5){ echo "Fotky"; } else{ echo "Fotek"; } ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
            <?php
                    $i++;
                }
            }
            ?>

        </div>
        <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/domains/3RD/web/copyright.php'; ?>
    </div>
</main>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/domains/3RD/web/footer.php'; ?>