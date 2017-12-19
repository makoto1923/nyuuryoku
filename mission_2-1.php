<?php
//編集記入 パスワード分岐まだできない
if($_POST['hid']="val1"){
	$editno=$_POST['hen'];
	$pass=$_POST['epass'];
	$lines = file("kadai6.txt");
	$cnt1 =count($lines);
		for( $i=0;$i<$cnt1;$i++ ){
			$lines2 = $lines[$i];
			$li =explode("<>",$lines2);
			$list = $li[0];
			if($list==$_POST['hen']){
				if($pass ==$li[4]){
				$name = $li[1];
				$comment = $li[2];
				$pass = $li[4];
				echo $editno;
				echo "を編集中";
				echo '<br>'; 
				}else{
				unset($editno);
				$pass='入力無効';
				$comment='入力無効';
				$name='入力無効';
				echo 'パスワードが間違っています、ホームからやり直してください';
				echo '<br>'; 
				}
			}
		}
}else{
	unset($_POST['hen']);
	echo '編集番号が存在しません';
	echo '<br>'; 
}


?>


<title>おもしろ発見掲示板</title>
<body>
<font size="5" color="#ff0000"><b>おもしろ発見掲示板</b></font>
<form action = "mission_2-6.php" method = "post">
<a>名前:</a><input type = "text" name ="editname" value = "<?php echo $name;?>"><br/>
<a>コメント:</a><input type = "text" name ="editcomment" value = "<?php echo $comment;?>"><br/>
<a>パスワード:</a><input type = "text" name ="epass" value = "<?php echo $pass;?>" ><br/>
<input type = "hidden" name ="editno" value="<?php echo $editno;?>">
<input type = "submit" value ="送信">
</form>
</body>
<a href="http://co-404.it.99sv-coco.com">ホームへ戻る</a>

<?php
echo '<br>'; 
$filename = 'kadai6.txt';
if (is_readable($filename)) {
	$lines = file("kadai6.txt");
	$cnt1 =count($lines);
	for( $i=0;$i<$cnt1;$i++ ){
		$lines2 = $lines[$i];
		$li =explode("<>",$lines2);
		for ($s=0;$s<4;$s++){
			$lis=$li[$s];
			echo $lis." ";
		}

		
		echo '<br>'; 
	}
}
?>