<?php

//生成验证码：生成随机数->创建图片->随机数写进图片中->保持在session中

session_start();

$arr1=range(0,9);
$arr2=range('a','z');
$arr3=range('A','Z');
$arr=array_merge($arr1,$arr2,$arr3);
$rand=null;
for($i=0;$i<4;$i++){
	$rand.=$arr[rand(0,61)];
}

@$_SESSION[check_pic]=$rand;
$im=imagecreatetruecolor(200, 60);
//设置颜色

$bg=imagecolorallocate($im,0,0,0);//第一次用调色板是，为背景颜色
$te=imagecolorallocate($im,255,255,255);

//画干扰线条
for($i=0;$i<4;$i++){
	$te2=imagecolorallocate($im, rand(0,255),rand(0,255),rand(0,255));	
	imageline($im,0,rand(0,60),200,rand(0,60),$te2);
}
//画干扰点
for($i=0;$i<2500;$i++){
	$te2=imagecolorallocate($im, rand(0,200),rand(0,255),rand(0,255));
	imagesetpixel($im, rand(0,200),rand(0,60),$te2);
}

/*
 * 如要使用中文验证码，则
 * iconv("gbk","utf-8","汉字");
 * imagettftext($im,24,10,rand(0,120),rand(40,60),$te,'ABC.ttf', iconv("gbk","utf-8","汉字"));
 * 
 */

//写字符串
//imagestring($im,rand(1,6),rand(3,70),rand(3,16), $rand,$te);

imagettftext($im,24,rand(0,20),rand(0,120),rand(40,60),$te,'FRABKIT.ttf', $rand);

//输出图像
//header("Content-type:image/jpeg");
header("Content-type:text/html");
imagejpeg($im);
?>