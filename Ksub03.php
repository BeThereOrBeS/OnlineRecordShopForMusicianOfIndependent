<?php
session_start();

require_once('Encode.php');

if (isset($_POST['payment']) === TRUE) { $_SESSION['payment'] = $_POST['payment']; }

/*if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
  die('不正なアクセスが行われました。postは'.$_POST['token'].'で、sessionは'.$_SESSION['token'].'です。');
}*/

$payName = explode("::",$_SESSION['payment']);

$price = array('H Photos' => '980', 'KINO' => '1000', 'KURODA EXTRA' => '780');

$realPrice = '';
    foreach ((array)$price as $k_pc => $v_pc) {
      foreach ((array)$_SESSION['prc'] as $pric) {
        if ($k_pc === $pric) {$realPrice += $v_pc;}
      }

    }

$strPrc = implode(",", $_SESSION['prc']);

$fp = @fopen("counter1.txt", "r+") or die("Counter Error");
flock($fp, LOCK_EX);
$count = fgets($fp);
$count++;
rewind($fp);
fputs($fp, $count);
fclose($fp);

$num = $count;

$file = fopen('guest.dat', 'ab');

flock($file, LOCK_EX);

fputs($file, "\t");
fputs($file, $num."\t");
fputs($file, date('Y年 m月 d日 H:i:s')."\t");
fputs($file, $_SESSION['yourname']."\t");
fputs($file, $_SESSION['address']."\t");
fputs($file, $_SESSION['zip']."\t");
fputs($file, $_SESSION['email']."\t");
fputs($file, $strPrc."\t");
fputs($file, $_SESSION['opinion']."\t");
fputs($file, $realPrice."\n");

$str = mb_convert_encoding((string)$file, "UTF-8");
fwrite($file, $str);
flock($file, LOCK_UN);
fclose($file);


?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
<title>Thank you for subscription</title>

<style type="text/css">

@media screen and (min-width:300px){
ul.sample1{
  padding: 0;
  font: 14px/1.6 'arial narrow', sans-serif;
  width: 80%;
  list-style: none;
 }
}

@media screen and (min-width:600px){
ul.sample1{
  padding: 0;
  font: 14px/1.6 'arial narrow', sans-serif;
  width:350px;
  list-style: none;
 }
}

ul.sample1 li{
  position: relative;
  padding: 7px 5px 7px 35px;
  margin-bottom:5px;
  border-radius: 2px;
  background: #5cffe7;
  color: #000;
}
ul.sample1 li:before{
  content: "";
  position: absolute;
  left: 10px;
  display: block;
  width: 1em;
  height: 1em;
  border-radius: 90%;
  background: #fff;
  top: 50%;
  -moz-transform: translateY(-50%);
  -webkit-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}

@media screen and (min-width:300px){
 dl{
  font-size : 15px;
  background-color : #f2f2e6;    
  margin-bottom : 30px;
  border-width : 2px;
  border-style : solid;
  border-color : #5a5a2e;
  width: 80%;
 }
}

@media screen and (min-width:600px){
 dl{  
  background-color : #f2f2e6;    
  margin-bottom : 30px;
  border-width : 2px;
  border-style : solid;
  border-color : #5a5a2e;
  width: 350px;
 }
}

dt{
  font-weight : bold;
  color : #ffffff;
  background-color :#673836;
  padding-left : 4px;
  text-align : left;
  margin-bottom : 4px;
  border-bottom-width : 2px;
  border-bottom-style : solid;
  border-bottom-color : #5a5a2e;
  padding-top : 2px;  
  padding-bottom : 2px;  
}

dd{
  font-size : 85%;
  line-height : 1.8;
  margin-right : 4px;
  padding-right : 2px;
  padding-left : 2px;
  padding-bottom : 4px;  
}
</style>

</head>

<body background="DDpart12.jpg">
<ul class="sample1">
<li>How to pay(支払方法)：
<?php print(e($payName[1])); ?>
</li><li>
Your Order(注文した商品)：
<?php print(e($strPrc)); ?>
</li><li>
Your Name(お名前):
<?php print(e($_SESSION['yourname'])); ?>
</li><li>
Your Site(あなたの住所):
<?php print(e($_SESSION['address'])); ?>
</li><li>
Zip Code(郵便番号):
<?php print(e($_SESSION['zip'])); ?>
</li><li>
E Mail(メールアドレス):
<?php print(e($_SESSION['email'])); ?>
</li><li>
Total price(お支払い合計金額):
<?php print(e($realPrice)); ?>
</li><li>
Free Opinion(感想、emailアドレスなど):
<?php print(e($_SESSION['opinion'])); ?>
</li></ul>

<h4><span style="color:#ffffff;">無音企画は、以下のとおり個人情報保護方針を定め、個人情報の保護を推進致します。</span></h4>

<dl>
<dt>個人情報の管理
</dt><dd>無音企画は、お客さまの個人情報を正確かつ最新の状態に保ち、個人情報への不正アクセス・紛失・破損・改ざん・漏洩などを防止するため、セキュリティシステムの維持・管理体制の整備・社員教育の徹底等の必要な措置を講じ、安全対策を実施し個人情報の厳重な管理を行ないます。
</dd><dt>個人情報の利用目的
</dt><dd>お客さまからお預かりした個人情報は、無音企画からのご連絡や業務のご案内やご質問に対する回答として、電子メールや資料のご送付に利用いたします。

</dd><dt>個人情報の第三者への開示・提供の禁止
</dt><dd>無音企画は、お客さまよりお預かりした個人情報を適切に管理し、次のいずれかに該当する場合を除き、個人情報を第三者に開示いたしません。<br>
<br>お客さまの同意がある場合
<br>お客さまが希望されるサービスを行なうために無音企画が業務を委託する業者に対して開示する場合
<br>法令に基づき開示することが必要である場合

</dd><dt>個人情報の安全対策
</dt><dd>無音企画は、個人情報の正確性及び安全性確保のために、セキュリティに万全の対策を講じています。
</dd><dt>ご本人の照会
</dt><dd>お客さまがご本人の個人情報の照会・修正・削除などをご希望される場合には、ご本人であることを確認の上、対応させていただきます。
</dd><dt>法令、規範の遵守と見直し
</dt><dd>無音企画は、保有する個人情報に関して適用される日本の法令、その他規範を遵守するとともに、本ポリシーの内容を適宜見直し、その改善に努めます。
</dd><dt>お問い合せ
</dt><dd>無音企画の個人情報の取扱に関するお問い合せは下記までご連絡ください。
<br>株式会社 xxx
<br>〒xxx-xxxx　xx県xx市xx町x-x-x
<br>TEL:XXX-XXX-XXXX FAX:XXX-XXX-XXXX
<br>Mail:info@example.co.jp 
</dd></dl>


</body>
</HTML>