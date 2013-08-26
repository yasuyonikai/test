
<?php
// twitteroauth.phpを読み込む
require_once("twitteroauth.php");

// Consumer keyの値
$consumer_key = "jOLneyZPUhYvFrVkmoI4zg";
// Consumer secretの値
$consumer_secret = "aX6es1Ei0mizDN8e4reF0T7DeMqQz5dJxn3OEswvyg";
// Access Tokenの値
$access_token = "173817234-UQdUkjpjr8beDdAGbIT22wK4on8IbBm2P13BKhPK";
// Access Token Secretの値
$access_token_secret = "WyUCX7rtoDHHTlHpuYe91RCfZEcFsQnRKzl8G1KSQQ";

// OAuthオブジェクト生成
$to = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

// home_timelineの取得。TwitterからXML形式が返ってくる
$req = $to->OAuthRequest("https://api.twitter.com/1.1/statuses/home_timeline.json","GET",array("count"=>"50"));

// Twitterから返されたJSONをデコードする
$result = json_decode($req);
// print_r($result);

//ユーザー情報
$account = $to->get('account/verify_credentials');
	$name = $account->name;//名前
	$screen_name = $account->screen_name;//ID
	$description = $account->description;//プロフィール文
	$image = $account->profile_image_url;//画像

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>RELEAGATED TO THE ATTIC</title>
<link href="../../css/reset.css" rel="stylesheet" type="text/css" />
<link href="../../css/base.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript">
$('head').append('<style type="text/css">.fadein{display:none;}</style>');
function windowFade(){
    $('.fadein').fadeIn(1000);
    $('a').click(function(){
        var url = $(this).attr("href");
        $('.fadein').animate({"opacity":0},0,function(){
            location.href = url;
        });
        return false;
    });
};
window.onload = function() {
    windowFade();
};

window.onunload = function() {
    windowFade();
};
</script>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
<script type='text/javascript' charset='UTF-8' src='http://b.tipszone.jp/jquery.url2link.js'></script>
<script type='text/javascript'>
$(function(){
    $('body').url2link();

    // target="_blank" を指定する場合
    $('body').url2link({attr: {target: '_blank'}});

    // 外部サイトへのリンクのみ target="_blank" を指定する場合
    var origin = location.href.match(/^https?:\/\/[^/]+/i)[0];
    $('body').url2link({callback: function(url){
        if (origin != url.match(/^https?:\/\/[^/]+/i)[0])
            $(this).attr('target', '_blank');
    }});
});
</script>
<style>
	div.account{
		padding:10px;
		border-radius: 3px;        /* CSS3草案 */  
	    -webkit-border-radius: 3px;    /* Safari,Google Chrome用 */  
	    -moz-border-radius: 3px;   /* Firefox用 */
	    background-color:#F5F5F5;
	    margin:30px 0;
	    border:1px solid #ccc;
	}
	div.fadein{font-size:90%;}
	div.fadein a{color:#7FB9D7;}
	div.fadein a:hover{color:#3598DC;}
</style>
</head>

<body id="container" class="trying">
	<div id="header">
		<div class="inner clearfix">
		<ul class="inner clearfix">
			<li><a href="../../index.html" target="_self" title="home">home</a></li>
			<li style="width:3em;text-align:center;"><a href="../../WP/" target="_self" title="blog">blog</a></li>
			<!-- <li data-filter="trying"><a href="trying/index.html" target="_self" title="trying">trying</a></li>
			<li><a href="#" target="_self" title="hobby">hobby</a></li> -->
		</ul>
		<p style="float:right;padding:10px 0 0 0;width:324px;" ><img src="../../images/logo_limb.png" height="27" width="324" alt="RELEGATED TO THE ATTIC"/></p>
		</div>
	</div>

	<div class="wrap inner clearfix">
		<h2><img src="../img/title.png" height="75" width="204" alt="TRYING" /></h2>
		<div class="als-container">
			<div class="title">
				<p>2013/07/22</p>
				<h3>OAuth Twitter</h3>
			</div>
			<p>参考サイト1（TLを表示）：http://www.sdn-project.net/labo/oauth.html</p>
			<p>参考サイト2（ユーザー情報を表示）：http://blog.elkc.net/?p=378</p>
			<p class="mb20">参考サイト3（URL自動リンク化）：http://tipszone.jp/20120604_jquery_url2link/</p>
			<div class="account clearfix">
				<a href="<?=$image?>"><img src="<?=$image?>" alt="" style="float:left;margin-right:20px;"/></a>
				<p>
					<span style="font-weight:bold;"><?=$name?></span>
					 <span style="color:#ccc;font-size:90%;">@<?=$screen_name?></span><br />
					<?=$description?>
				</p>
			</div>
			<div class="fadein">
<?php
// foreachで呟きの分だけループする
foreach($result as $status){
      $status_id = $status->id_str; // 呟きのステータスID
      $text = $status->text; // 呟き
      $user_id = $status->user->id_str; // ID（数字）
      $screen_name = $status->user->screen_name; // ユーザーID（いわゆる普通のTwitterのID）
      $name = $status->user->name; // ユーザーの名前（HNなど
      $time = $status->created_at;
?>
		      <p style='padding:10px;border-bottom:1px solid #E7EAF0;'>
		      	<span style="font-weight:bold;"><?=$name?></span>　<span style="color:#ccc;font-size:90%;">@<?=$screen_name?></span>　 <?=$time?>　
		      	<a href=\"http://twitter.com/<?=$screen_name?>/status/<?=$status_id?>\">tweet</a><br />
		      	<?=$text?>
		      </p>
<? } ?>
			</div>
		</div>
	</div>
	<div id="footer">
		<address id="footer" class="inner">Copyright (C) yausyonika Corporation. All Rights Reserved.</address>
	</div>
</body>
</html>

