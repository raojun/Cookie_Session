<?php

session_start();

if(@$_POST[check]){
	if(@$_POST[check]==@$_SESSION[check_pic]){
		echo "验证码正确";
	}else{
		echo "验证码错误";
	}
}

?>

<form action="" method="post">
	<img src="verification_code.php"><br>
	<input type="text" name="check"><br>
	<input type="submit" value="提交">
</form>