<?php

abstract class ImageAnalyzer {

    // get parameter image file in ./img folder. convert each pixel into a Json file with coord and color.
    public static function imgToJson($img) {

        $imgX = getimagesize('img/'.$img.'.bmp')[0];
        $imgY = getimagesize('img/'.$img.'.bmp')[1];

        $imgSize = fopen('json/'.$img.'.size.json', 'w+');
        fwrite($imgSize, json_encode(['x'=>$imgX, 'y'=>$imgY], JSON_FORCE_OBJECT));
        fclose($imgSize);

        $imgJson = fopen('json/'.$img.'.json', 'w+');
        $imgFile = imagecreatefrombmp('img/'.$img.'.bmp');    
        for ( $y=0 ; $y<$imgY ; $y++ ) {
            for ( $x=0 ; $x<$imgX ; $x++ ) {
                $imgArray[] = [$x,$y,imagecolorat($imgFile, $x, $y)];
            }
        }
        fwrite($imgJson, json_encode($imgArray, JSON_FORCE_OBJECT));
        fclose($imgJson);
    }
}
