<?php

//������֤�룺���������->����ͼƬ->�����д��ͼƬ��->������session��

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
//������ɫ

$bg=imagecolorallocate($im,0,0,0);//��һ���õ�ɫ���ǣ�Ϊ������ɫ
$te=imagecolorallocate($im,255,255,255);

//����������
for($i=0;$i<4;$i++){
	$te2=imagecolorallocate($im, rand(0,255),rand(0,255),rand(0,255));	
	imageline($im,0,rand(0,60),200,rand(0,60),$te2);
}
//�����ŵ�
for($i=0;$i<2500;$i++){
	$te2=imagecolorallocate($im, rand(0,200),rand(0,255),rand(0,255));
	imagesetpixel($im, rand(0,200),rand(0,60),$te2);
}

/*
 * ��Ҫʹ��������֤�룬��
 * iconv("gbk","utf-8","����");
 * imagettftext($im,24,10,rand(0,120),rand(40,60),$te,'ABC.ttf', iconv("gbk","utf-8","����"));
 * 
 */

//д�ַ���
//imagestring($im,rand(1,6),rand(3,70),rand(3,16), $rand,$te);

imagettftext($im,24,rand(0,20),rand(0,120),rand(40,60),$te,'FRABKIT.ttf', $rand);

//���ͼ��
//header("Content-type:image/jpeg");
header("Content-type:text/html");
imagejpeg($im);
?>