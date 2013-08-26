<?php
session_start();

/* ===============================================*/
/* XMLファイル読み込みはhtml内に組み込み 87行目～*/
/* ===============================================*/

//ディレクトリ 
$dirName = "files"; 


/* ===============================================*/
/* XMLファイルに書き出し*/
/* ===============================================*/

if(isset($_POST["enter"])){
	$_SESSION["cont"]["title"] = $_POST["title"];
	$_SESSION["cont"]["text"] = $_POST["text"];
	
	if(!empty($_POST["title"]) && !empty($_POST["text"])){
	
		//書きこむ内容
		$title = $_SESSION["cont"]["title"];
		$text = $_SESSION["cont"]["text"];
		$datelist = date("Y年m月d日　H時i分s秒");
		// ファイル名
		$date = date(YmdHis);
		$filename = 'files/'.$date.'.xml';
		 
		// Domを生成
		$dom = new DomDocument('1.0', 'utf-8');
		$dom->formatOutput = true;
		 
		// 元となる要素を生成
		$root = $dom->appendChild($dom->createElement('root'));
		$body = $root->appendChild($dom->createElement('body'));
		 
		// ボディ要素を生成
		$body->appendChild($dom->createElement('datelist', $datelist));
		$body->appendChild($dom->createElement('title', $title));
		$body->appendChild($dom->createElement('text', $text));
		 
		$dom->save($filename);
		
		unset($_SESSION["cont"]);
		header("Location: comp.php");
		
	}else{
		echo"タイトルと本文を入力してください。";
	}
}else{
	$_SESSION["cont"]="";
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>データベースを使わないBBS</title>
<style>
<!--
h1 {font-size:35px; font-weight:bold; margin-bottom:50px;}
div.formBox{padding-bottom:20px; border-bottom:1px solid #ccc;}
h2{font-size:20px; margin-bottom:20px;}
ul{list-style-type:none;}
ul li{padding-bottom:5px; margin-bottom:5px; border-bottom:1px dotted #ccc;}
ul li:last-child{padding-bottom:10px; margin-bottom:0; border-bottom:none;}
-->
</style>
</head>

<body>
<h1>BBS</h1>
<div class="formBox">
	<h2>入力フォーム</h2>
	<form method="post">
	<table>
		<tr>
			<th>タイトル</th>
			<td><input type="text" name="title" value="<?=$_SESSION["cont"]["title"]?>"></td>
		</tr>
		<tr>
			<th>本文</th>
			<td><textarea cols=40 rows=8 name="text"><?=$_SESSION["cont"]["text"]?></textarea></td>
		</tr>
	</table>
	<input type="submit" name="enter"/>
	</form>
</div>
<div class="listBox">
	<h2>投稿一覧</h2>
	<ul>
		<?
		//ディレクトの存在チェック 
		if (is_dir($dirName)) { 
		//ディレクトリハンドル取得 
		if ($dir = opendir($dirName)) {
			//ファイル読み込み、表示 
			while (($file = readdir($dir)) !== false) {
				if(mb_strlen($file) ==18){
					$filename = "files/".$file;
					$xml = @simplexml_load_file($filename);
					if ($xml) {
						foreach($xml->body as $val){?>
						<li>
							<p><strong><?=$val->title?></strong>　<?=$val->datelist?></p>
							<p><?=$val->text?></p>
						</li>
					<?	}
					} else {
					   echo"読み込みエラー";
					}
				}
			}
		}else{?>
		<li>投稿がありません</li>
<?		}
		closedir($dir); 
		}?>
	</ul>
</body>
</html>

