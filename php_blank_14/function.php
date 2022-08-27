<?php

function t1()
{

  $imgPath = __DIR__ . "./images/blank.png";
  $fontPath = __DIR__ . './9605.ttf';
  $newImg = __DIR__ . './task_1.png';

  $img = imagecreatefrompng($imgPath);

  $color = imagecolorallocate($img, 255, 99, 71);
  $text = date('Y-m-d');

  imagettftext($img, 40, 0, 250, 150, $color, $fontPath, $text);

  imagepng($img, $newImg);
  imagedestroy($img);
}

function t2()
{
  $imgBgPath = __DIR__ . "./images/blank.png";
  $imgPath = __DIR__ . './images/flash.png';
  $newImg = __DIR__ . './task_2.png';

  $img = imagecreatefrompng($imgBgPath);

  $flashImg = imagecreatefrompng($imgPath);
  imagecopy($img, $flashImg, 512, 0, 0, 0, 256, 256);

  imagepng($img, $newImg);

  imagedestroy($img);
  imagedestroy($flashImg);
}

function t3()
{
  $imgBgPath = __DIR__ . "./images/blank.png";
  $imgPathFlash = __DIR__ . './images/flash.png';
  $imgPathSpider = __DIR__ . './images/spider.png';
  $imgPathThor = __DIR__ . './images/thor.png';
  $newImg = __DIR__ . './task_3.png';

  $img = imagecreatefrompng($imgBgPath);

  $flashImg = imagecreatefrompng($imgPathFlash);
  imagecopy($img, $flashImg, 0, 0, 0, 0, 256, 256);

  $spiderImg = imagecreatefrompng($imgPathSpider);
  imagecopy($img, $spiderImg, 256, 0, 0, 0, 256, 256);

  $thorImg = imagecreatefrompng($imgPathThor);
  imagecopy($img, $thorImg, 512, 0, 0, 0, 256, 256);


  imagepng($img, $newImg);

  imagedestroy($img);
  imagedestroy($flashImg);
  imagedestroy($spiderImg);
  imagedestroy($thorImg);
}

function  t4()
{
  $imgBgPath = __DIR__ . './images/blank.png';
  $imgThorPath = __DIR__ . './images/thor.png';
  $fontPath = __DIR__ . './9605.ttf';
  $newImg = __DIR__. './task_4.png';

  $img = imagecreatefrompng($imgBgPath);

  $color = imagecolorallocate($img, 0,0,0);
  $text = 'hello';

  $thorImg = imagecreatefrompng($imgThorPath);
  imagecopy($img, $thorImg, 200 , 0 , 0, 0, 256, 256);


  imagettftext($img, 36, 45, 400,256, $color, $fontPath, $text);

  imagepng($img, $newImg);
  imagedestroy($img);
  imagedestroy($thorImg);

}

function t5()
{
  $imgFlashPath = __DIR__ . './images/flash.png';
  $newImg = __DIR__. './task_5.png';
  $bgImg = imagecreatetruecolor(300, 300);

  $flashImg = imagecreatefrompng($imgFlashPath);
  imagecopy($bgImg, $flashImg, 22, 22, 0, 0 ,256,256 );

  imagepng($bgImg, $newImg);
  imagedestroy($bgImg);
  imagedestroy($flashImg);
 
}

function t6()
{
  $newImg = __DIR__. './task_6.png';
  $fontPath = __DIR__.'./9605.ttf';
  $newImg = __DIR__.'./task_6.jpg';

  $bgImg = imagecreatetruecolor( 512 , 256);
  $bgColor = imagecolorallocate($bgImg, 50,150,50);
  imagefill($bgImg, 0, 0, $bgColor);
  $text = 'hello jpeg';
  $colorText = imagecolorallocate($bgImg, 0,0,0);


  imagettftext($bgImg, 50, 0, 130, 150, $colorText, $fontPath, $text);

  imagejpeg($bgImg, $newImg, 75);
  imagedestroy($bgImg);
  

}
