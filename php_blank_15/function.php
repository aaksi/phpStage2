<?php

function t1()
{
  $archive = new ZipArchive();
  $archiveFile = '1.zip';

  if ($archive->open($archiveFile, ZipArchive::CREATE) !== true) {
    exit('errors');
  }

  $archive->addFile('t1.txt');
  $archive->close();
}

function t2()
{
  $zip = new ZipArchive();
  $zipFile = '2.zip';
  $textFile = 't1.txt';

  if($zip->open($zipFile, ZipArchive::CREATE) !== true){
    exit('errors');
  }

  $zip->addFile($textFile);
  $zip->close();

  echo filesize($textFile);
  echo '<br>';
  echo filesize($zipFile);
}

function t3()
{
  $zip = new ZipArchive();
  $zipFile = '3.zip';
  $textZip = 't1.txt';
  $imgZip = './images/flash.png';

  if($zip->open($zipFile, ZipArchive::CREATE) !== true){
    exit('errors');
  }

  $zip->addFile($imgZip);
  $zip->addFile($textZip, 'flash.png');
  $zip->close();
}

function  t4()
{
  $zip = new ZipArchive;
  $zipFile = '4.zip';
  $textFile = 't1.txt';

  if($zip->open($zipFile, ZipArchive::CREATE) !==true){
    exit('errors');
  }

  $zip->addFile($textFile, 'one/t1.txt');
  $zip->close();
}

function t5($arc, $folder)
{
  $zip = new ZipArchive;
  $zip->open($arc);
  $zip->extractTo($folder);
  $zip->close();
}
