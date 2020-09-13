<?php

# check color of every pixels in a *.bmp file
# depending of color matches with predefined color list, will create a *.json file for html tags. 

class ImageAnalyzer {
    
    public static $colorList; 

    protected $pixelList;

    function imageAnalyzer($img) {

        $imgJson = fopen('json/'.$img.'.json', 'w+');
        $imgMaxX = getimagesize('img/'.$img)[0];
        $imgMaxY = getimagesize('img/'.$img)[1];
        $imgFile = imagecreatefrombmp('img/'.$img);

        for ( $y=0 ; $y<$imgMaxY ; $y++ ) {
            for ( $x=0 ; $x<$imgMaxX ; $x++ ) {
                $imgArray[] = [$x,$y,imagecolorat($imgFile, $x, $y)];
            }
        }

        fwrite($imgJson, json_encode($imgArray));
        fclose($imgJson);

    }

    // imageAnalyzer('testimage.bmp');
}