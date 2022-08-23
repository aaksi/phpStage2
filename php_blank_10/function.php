<?php

function t1($path)
{
  if (file_exists($path)) {
    return 1;
  } else {
    return 0;
  }
}

function t2($path)
{
  if (file_exists($path)) {
    return filesize($path);
  } else {
    return 0;
  }
}

function t3($path)
{

  if (is_dir($path)) {
    return 'dir';
  } elseif (is_file($path)) {
    return 'file';
  }
}

function  t4($path)
{
  // $arr = [];
  // $info =new SplFileInfo(basename($path) );
  // $arr[] =  $info->getExtension();
  // return $arr;

  $name = stristr(basename($path), '.', true);
  $extension = stristr(basename($path), '.');
  $arr[] = $name;
  $arr[] = $extension;
  return $arr;
}

function t5($path)
{

  $filename = $path;
  $handle = fopen($filename, "r");
  $contents = fread($handle, filesize($filename));
  fclose($handle);
  return $contents;
}

function t6($path, $str)
{

  $fp = fopen($path, "w+");
  fwrite($fp, $str);
  fclose($fp);
}

function t7($path, $str)
{

  $fp = fopen($path, 'a+');
  fwrite($fp, $str);
  fclose($fp);
}

function t8($path)
{
  // $arr =  scandir($path);
  // $size = 0;

  // for ($i = 0; $i < count($arr); $i++) {
  //   if (is_file($path . $arr[$i])) {
  //     $size += filesize($path . $arr[$i]);
  //   }
  // }
  // return $size;
  $size = 0;

  if ($handle = opendir($path)) {

    while (false !== ($entry = readdir($handle))) {
      if ($entry != "." && $entry != "..") {
        $size += filesize($path.$entry);
        
      }
    }
    closedir($handle);
  }
  return $size;

}
function t9($path)
{

  $res = [];

  if ($handle = opendir($path)) {

    while (false !== ($entry = readdir($handle))) {
      if ($entry != "." && $entry != "..") {
        $arr = [];
        $arr[] = $entry;
        $arr[] = stristr(basename($entry), '.');
        $arr[] = filesize($path.$entry);
        $res[] = $arr;
      }
    }
    closedir($handle);
  }
  return $res;
}

function t10($path)
{
  if(file_exists($path)){
    return 0;
  }else{
    $fp =fopen($path, 'w+');
    fwrite($fp, 42);
    fclose($fp);
  }
}
