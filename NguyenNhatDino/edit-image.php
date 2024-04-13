<?php

if(isset($_GET['name'])){
    $socccd = trim($_GET['socccd']);
    $name = trim($_GET['name']);
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

// Set Text to Be Printed On Image
$qr_image_url = 'https://quickchart.io/qr?text='.urlencode($socccd.'||'.$name.'|'.str_replace('/','',$birthday).'|'.$sex.'|'.$thuongtru.'|'.str_replace('/','',$ngaycap)).'&light=0000&ecLevel=Q&format=png&size=170';
$qr_image = imagecreatefromstring(file_get_contents($qr_image_url));
imagecopy($jpg_image, imagecreatefrompng('mattruoc.png'), 0, 0, 0, 0, imagesx(imagecreatefrompng('mattruoc.png')), imagesy(imagecreatefrompng('mattruoc.png')));

// Define colors
$textColor = [0, 0, 0, 0]; // Black text with alpha channel for transparency
$shadowColor = [0, 0, 0, 50]; // Black shadow with alpha channel for transparency

// Add the text with effects to the image
imagettftextSpWithEffects($jpg_image, 40, 0, 845, 535, $socccd, 'SVN-Arial 3 bold.ttf', 0, $textColor, $shadowColor, 0, 0, 2);
imagettftextSpWithEffects($jpg_image, 31, 0, 725, 630, mb_strtoupper($name, 'UTF-8'), 'SVN-Arial Regular.ttf', 0, $textColor, $shadowColor, 1, 1, 1);
imagettftextSpWithEffects($jpg_image, 28, 0, 1060, 670, $birthday, 'SVN-Arial Regular.ttf', 0, $textColor, $shadowColor, 1, 1, 1);
imagettftextSpWithEffects($jpg_image, 28, 0, 935, 715, $sex, 'SVN-Arial Regular.ttf', 0, $textColor, $shadowColor, 1, 1, 1);
imagettftextSpWithEffects($jpg_image, 28, 0, 1340, 722, 'Việt Nam', 'SVN-Arial Regular.ttf', 0, $textColor, $shadowColor, 1, 1, 1);
imagettftextSpWithEffects($jpg_image, 28, 0, 725, 810, $quequan, 'SVN-Arial Regular.ttf', 0, $textColor, $shadowColor, 1, 1, 1);
imagettftextSpWithEffects($jpg_image, 28, 0, 725, 900, $thuongtru, 'SVN-Arial Regular.ttf', 0, $textColor, $shadowColor, 1, 1, 1);
imagettftextSpWithEffects($jpg_image, 18, 0, 555, 875, $ngaycap, 'SVN-Arial Regular.ttf', 0, $textColor, $shadowColor, 0, 0, 1);
// Create a black overlay with transparency
$overlay = imagecreatetruecolor(imagesx($jpg_image), imagesy($jpg_image));
$black = imagecolorallocatealpha($overlay, 0, 0, 0, 100);
imagefill($overlay, 0, 0, $black);
imagecopymerge($jpg_image, $overlay, 0, 0, 0, 0, imagesx($overlay), imagesy($overlay), 5);

// Send Image to Browser
imagecopy($jpg_image, $qr_image, 1360, 200, 0, 0, imagesx($qr_image), imagesy($qr_image));
$anhthe = imagecreatefromstring(file_get_contents(trim($_GET['anhthe'])));

// Desired width and height for the image
$desiredWidth = 295;
$desiredHeight = 405;

// Create a blank image with the desired dimensions
$adjustedImage = imagecreatetruecolor($desiredWidth, $desiredHeight);

// Set a transparent background for the adjusted image
$transparentColor = imagecolorallocatealpha($adjustedImage, 0, 0, 0, 127);
imagefill($adjustedImage, 0, 0, $transparentColor);
imagesavealpha($adjustedImage, true);

// Calculate the aspect ratio of the source image
$sourceWidth = imagesx($anhthe);
$sourceHeight = imagesy($anhthe);
$sourceAspectRatio = $sourceWidth / $sourceHeight;

// Calculate the aspect ratio of the desired dimensions
$desiredAspectRatio = $desiredWidth / $desiredHeight;

// Calculate the cropping or resizing dimensions
if ($sourceAspectRatio > $desiredAspectRatio) {
    // Crop horizontally
    $cropWidth = $sourceHeight * $desiredAspectRatio;
    $cropX = ($sourceWidth - $cropWidth) / 2;
    imagecopyresampled($adjustedImage, $anhthe, 0, 0, $cropX, 0, $desiredWidth, $desiredHeight, $cropWidth, $sourceHeight);
} else {
    // Crop vertically
    $cropHeight = $sourceWidth / $desiredAspectRatio;
    $cropY = ($sourceHeight - $cropHeight) / 2;
    imagecopyresampled($adjustedImage, $anhthe, 0, 0, 0, $cropY, $desiredWidth, $desiredHeight, $sourceWidth, $cropHeight);
}

// Create a black overlay image with opacity (màu đen với độ mờ)
$blackOverlay = imagecreatetruecolor($desiredWidth, $desiredHeight);
$black = imagecolorallocatealpha($blackOverlay, 0, 0, 0, 100); // Độ mờ ở đây là 80, bạn có thể thay đổi giá trị này
imagefill($blackOverlay, 0, 0, $black);

// Kết hợp ảnh thẻ với lớp màu đen với độ mờ
imagecopymerge($adjustedImage, $blackOverlay, 0, 0, 0, 0, $desiredWidth, $desiredHeight, 20);

// Bây giờ, bạn có thể sử dụng $adjustedImage theo nhu cầu của bạn
// Ví dụ: imagejpeg($adjustedImage);

// Dọn dẹp bộ nhớ

// Now, copy the adjusted image to your destination image
// Kích thước của ảnh gốc và ảnh đã điều chỉnh
$originalWidth = imagesx($jpg_image);
$originalHeight = imagesy($jpg_image);

// Tạo ảnh mới để làm việc với nó
$blurredImage = imagecreatetruecolor($desiredWidth, $desiredHeight);

// Sao chép ảnh đã điều chỉnh vào ảnh mới
imagecopy($blurredImage, $adjustedImage, 0, 0, 0, 0, $desiredWidth, $desiredHeight);

// Áp dụng hiệu ứng mờ xung quanh bằng cách tạo một ảnh trắng và kết hợp nó với ảnh đã điều chỉnh
$blurAmount = 10; // Điều chỉnh độ mờ tùy ý
$blurImage = imagecreatetruecolor($desiredWidth, $desiredHeight);
imagefilledrectangle($blurImage, 0, 0, $desiredWidth, $desiredHeight, imagecolorallocate($blurImage, 255, 255, 255));
imagecopymerge($blurImage, $blurredImage, 0, 0, 0, 0, $desiredWidth, $desiredHeight, 100 - $blurAmount);

// Sao chép ảnh đã làm mờ lên ảnh gốc với các tọa độ và kích thước tương ứng
imagecopy($jpg_image, $blurImage, 400, 430, 0, 0, $desiredWidth, $desiredHeight);

// Giải phóng bộ nhớ của các ảnh tạm thời
imagedestroy($blurredImage);
imagedestroy($blurImage);


imagejpeg($jpg_image);

// Clear Memory
imagedestroy($jpg_image);
imagedestroy($qr_image);
imagedestroy($anhthe);
imagedestroy($blackOverlay);

// Đừng quên dọn dẹp $adjustedImage khi bạn đã sử dụng xong
imagedestroy($adjustedImage);
}
?>
