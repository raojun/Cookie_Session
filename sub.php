<?php

session_start();

if(@$_POST[check]){
	if(@$_POST[check]==@$_SESSION[check_pic]){
		echo "��֤����ȷ";
	}else{
		echo "��֤�����";
	}
}

?>

<form action="" method="post">
	<img src="verification_code.php"><br>
	<input type="text" name="check"><br>
	<input type="submit" value="�ύ">
</form>