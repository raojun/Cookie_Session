<?php
//cookie&&session 

session_start();

if(@$_GET[out]){
	unset($_SESSION[user]);
	unset($_SESSION[pass]);
}

if(@$_POST[name]&&@$_POST[password]){
	$_SESSION[user]=$_POST[name];
	$_SESSION[pass]=$_POST[password];
}

if(@$_SESSION[user]&&@$_SESSION[pass]){
	echo "登陆成功：<br>".@$_SESSION[user]."<br>密码：".md5(@$_SESSION[pass]);
	
	echo "<br><a href='login.php?out=out'>退出</a>";
}


/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////

if(@$_GET[out]){
	setcookie('user','');
	setcookie('pass','');
	echo"<script>location.href='login.php'</script>";
}

if(@$_POST[name]&&@$_POST[password]){
	setcookie('user',@$_POST["name"],time()+3600);
	setcookie('pass',@$_POST[password],time()+3600);
	
	echo"<script>location.href='login.php'</script>";
}

if(@$_COOKIE[user]&&@$_COOKIE[pass]){
	echo "登陆成功：<br>".@$_COOKIE[user]."<br>密码：".md5(@$_COOKIE[pass]);
	
	echo "<br><a href='login.php?out=out'>退出</a>";
}

?>

<form action="" method="post">
用户：
<input type="text" name="name" ><br><br>
密码：
<input type="password" name="password"><br><br>
<input type="submit" value="登录">
</form>

