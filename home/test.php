<?php
echo "<pre>";
require_once $_SERVER['DOCUMENT_ROOT'] . '/domains/3RD/cdn/vendor/autoload.php';

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Admin\AdminApi;

//set configuration
Configuration::instance("cloudinary://745771318524437:mLnJ1RHsXmnf4NcjXqe0s6p5dAI@dj2qptrlw");
$adminApi = new AdminApi();

$folders=$adminApi->subFolders("active");
$folders=$folders["folders"];
$album=array();
foreach($folders as $key => $folder){
    $album[$key]=array("name" => $folder["path"]);
}

//https://res.cloudinary.com/<cloud_name>/<asset_type>/<delivery_type>/<transformations>/<version>/<public_id>.<extension>
//https://res.cloudinary.com/dj2qptrlw/image/upload/active/auta/IMG_1761_szhmbp.jpg

//get all images from folders
$images=$adminApi->assets();
$images=$images["resources"];
//var_dump($images);

//run through the album array and then through the images array and if the image is in the album, add it to the album array
foreach($album as $key => $folder){
    foreach($images as $image){
        if($image["folder"]==$folder["name"]){
            $album[$key]["images"][]=$image["url"];
        }
    }
}
var_dump($album);

?>