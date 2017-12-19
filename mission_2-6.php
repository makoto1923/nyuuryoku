<?php

//新規記入　完成
//記入の分岐（名前未記入のみ）
if(($_POST['name']=="")){
unset($_POST['name']);
unset($_POST['comment']);
}else{
	$time = time();
	$date = date( "Y/m/d H:i:s" , $time );
	$name = $_POST['name'];
	$comment = $_POST['comment'];
	$pass = $_POST['pass'];

//テキストファイル名を変数$filenameに代入する
	$filename='kadai6.txt';

	if (is_readable($filename)) {
		$lines = file("kadai6.txt");
		$lastLine = $lines[count($lines) - 1];
		$numb = explode("<>", $lastLine);
		$num = $numb[0] +1;
		} else {
			$num = 1;
		}

	$fp=fopen($filename,'a+');
	$tag="<>";
	fwrite($fp,$num.$tag.$name.$tag.$comment.$tag.$date.$tag.$pass.$tag."\n");
	fclose($fp);
}

//削除　パスワード分岐まだできない

$del=$_POST['delete'];
if(($_POST['delete']=="")){
	unset($_POST['delete']);
	echo '<br>'; 
}else{
	$pass = $_POST['spass'];
	$lines = file("kadai6.txt");
	$cnt1 =count($lines);
		for( $i=0;$i<$cnt1;$i++ ){
			$lines2 = $lines[$i];
			$li =explode("<>",$lines2);
			$list = $li[0];

			if($list==$_POST['delete']){
				$password=$li[4];
				echo $pass;//デバック
				echo '<br>'; //de
				echo $password;//デバック
				if($pass==$password){
					unset($lines[$i]);
					$lines=array_merge($lines);
					echo $del.'番を削除しました';
					echo '<br>'; 
				}else{
					echo "パスワードが間違ってます";
					echo '<br>'; 
				}
			}
		}
		$filename='kadai6.txt';
		$fp=fopen($filename,'w+');
		$cnt2=count($lines);
		for($s=0;$s<$cnt2;$s++){
		fwrite($fp,$lines[$s]);
		}
		unset($_POST['delete']);
		fclose($fp);

}
	
	//編集記入パスワード機能完成（２−１の方のパスワード分岐がまでできない）
	$eno = $_POST['editno'];
if(($_POST['editno']=="")){
	unset($_POST['editname']);
	unset($_POST['editcomment']);
}else{
	echo $eno.'を変更しました';
	echo nl2br("\n");
	$lines = file("kadai6.txt");
	$cnt1 =count($lines);
		for( $i=0;$i<$cnt1;$i++ ){
			$lines2 = $lines[$i];
			$li =explode("<>",$lines2);
			$list = $li[0];
			if($list==$_POST['editno']){
			$ename =$_POST['editname'];
			$ecomment =$_POST['editcomment'];
			$epass =$_POST['epass'];
			$tag ="<>";
			$time = time();
			$edate = date( "Y/m/d H:i:s" , $time );
			$lines[$i]=$eno.$tag.$ename.$tag.$ecomment.$tag.$edate.$tag.$epass.$tag."\n";
			}
		}
		$filename='kadai6.txt';
		$fp=fopen($filename,'w+');
		$cnt2=count($lines);
		//print_r($lines);
		for($s=0;$s<$cnt2;$s++){
		fwrite($fp,$lines[$s]);
		}
		unset($_POST['editname']);
		unset($_POST['editcomment']);
		unset($_POST['epass']);
		fclose($fp);
	}

?>

<title>おもしろ発見掲示板</title>
<body>
<font size="5" color="#ff0000"><b>おもしろ発見掲示板</b></font>
<form action = "mission_2-6.php" method = "post">
<a>名前:</a><input type = "text" name ="name"><br/>
<a>コメント:</a><input type = "text" name ="comment"><br/>
<a>パスワード(半角数字のみ):</a><input type = "text" name ="pass" ><br/>
<input type = "submit" value ="送信">
</form>
<form action = "mission_2-6.php" method = "post">
<a>削除対象番号:</a><input type = "text" onKeyup="this.value=this.value.replace(/[^0-9]+/,'')" name ="delete"><br/>
<a>パスワード:</a><input type = "text" name ="spass" ><br/>
<input type = "submit"value ="削除">
</form>
<form action = "mission_2-1.php" method = "post">
<a>編集対象番号:</a><input type = "text" onKeyup="this.value=this.value.replace(/[^0-9]+/,'')" name ="hen"><br/>
<a>パスワード:</a><input type = "text"name ="epass" ><br/>
<input type = "hidden" name ="hid" value="val1">
<input type = "submit"value ="編集">
</form>
<a href="http://co-404.it.99sv-coco.com">ホームへ戻る</a>
</body>



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
			echo $lis."　";
		}
		echo '<br>'; 
	}
}
?>