<?php

if(isset($_GET['name'])){
     $socccd = trim($_GET['socccd']);
    $name = trim($_GET['name']);
     $name = iconv('UTF-8', 'ASCII//TRANSLIT', $name);
$name = preg_replace('/[^A-Za-z0-9 ]/', '', $name);
$fullname = "\n".str_replace(' ', '<<', $name);
    $birthday = trim($_GET['birthday']);
    $sex = trim($_GET['sex']);
    $quequan = trim($_GET['quequan']);
    $thuongtru = trim($_GET['thuongtru']);
    $ngaycap = trim($_GET['ngaycap']);
    if(empty($socccd) || empty($name) || empty($birthday) || empty($sex) || empty($quequan) || empty($thuongtru) || empty($ngaycap)){
        die();
    }
function imagettftextSpWithEffects($image, $size, $angle, $x, $y, $text, $font, $spacing = 0, $textColor, $shadowColor, $shadowOffsetX, $shadowOffsetY, $outerGlowSize)
{
    // Create a temporary image for the text with shadow
    $temp_image = imagecreatetruecolor(imagesx($image), imagesy($image));

    // Allocate colors for text and shadow
    $textColor = imagecolorallocatealpha($temp_image, $textColor[0], $textColor[1], $textColor[2], $textColor[3]);
    $shadowColor = imagecolorallocatealpha($temp_image, $shadowColor[0], $shadowColor[1], $shadowColor[2], $shadowColor[3]);

    // Fill the temporary image with a transparent background
    $transparentColor = imagecolorallocatealpha($temp_image, 0, 0, 0, 127);
    imagefill($temp_image, 0, 0, $transparentColor);
    imagesavealpha($temp_image, true);

    // Draw the text on the temporary image with shadow
    if ($spacing == 0) {
        for ($i = 0; $i < $outerGlowSize; $i++) {
            imagettftext($temp_image, $size, $angle, $x + $shadowOffsetX, $y + $shadowOffsetY, $shadowColor, $font, $text);
        }
        imagettftext($temp_image, $size, $angle, $x, $y, $textColor, $font, $text);
    } else {
        $temp_x = $x;
        for ($i = 0; $i < strlen($text); $i++) {
            for ($j = 0; $j < $outerGlowSize; $j++) {
                imagettftext($temp_image, $size, $angle, $temp_x + $shadowOffsetX, $y + $shadowOffsetY, $shadowColor, $font, $text[$i]);
            }
            $bbox = imagettftext($temp_image, $size, $angle, $temp_x, $y, $textColor, $font, $text[$i]);
            $temp_x += $spacing + ($bbox[2] - $bbox[0]);
        }
    }

    // Merge the temporary image with the original image
    imagecopy($image, $temp_image, 0, 0, 0, 0, imagesx($image), imagesy($image));

    // Clean up
    imagedestroy($temp_image);
}

// Set the Content Type
header('Content-type: image/jpeg');

// Create Image From Existing File
$jpg_image = imagecreatefrompng('fsdf.png');
$white_image = imagecreatetruecolor(imagesx($jpg_image), imagesy($jpg_image));

// Allocate the white color
$whiteColor = imagecolorallocate($white_image, 255, 255, 255);

// Fill the white image with white color
imagefill($white_image, 0, 0, $whiteColor);

// Merge the white background with the original image
imagecopy($jpg_image, $white_image, 0, 0, 0, 0, imagesx($white_image), imagesy($white_image));


imagecopy($jpg_image, imagecreatefrompng('matsau.png'), 0, 0, 0, 0, imagesx(imagecreatefrompng('matsau.png')), imagesy(imagecreatefrompng('matsau.png')));

// Define colors
$textColor = [0, 0, 0, 0]; // Black text with alpha channel for transparency
$shadowColor = [0, 0, 0, 50]; // Black shadow with alpha channel for transparency

// Add the text with effects to the image

imagettftextSpWithEffects($jpg_image, 20, 0, 845, 290, $ngaycap, 'SVN-Arial Regular.ttf', 0, $textColor, $shadowColor, 1, 1, 1);
imagettftextSpWithEffects($jpg_image, 44, 0, 420, 720, strtoupper('idvnm'.substr($socccd, 3).'1'.$socccd.'<<6
'.rand(000000,999999).'f'.rand(00000000,99999999).'vnm<<<<<<<<<<<6'.$fullname.'<<<<<<<<<<<<'), 'font.ttf', 0, $textColor, $shadowColor, 1, 1, 1);
// Create a black overlay with transparency
$overlay = imagecreatetruecolor(imagesx($jpg_image), imagesy($jpg_image));
$black = imagecolorallocatealpha($overlay, 0, 0, 0, 100);
imagefill($overlay, 0, 0, $black);
imagecopymerge($jpg_image, $overlay, 0, 0, 0, 0, imagesx($overlay), imagesy($overlay), 5);




imagejpeg($jpg_image);

// Clear Memory
imagedestroy($jpg_image);




// Đừng quên dọn dẹp $adjustedImage khi bạn đã sử dụng xong
imagedestroy($adjustedImage);
}
?>
