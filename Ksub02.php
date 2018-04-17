<?php
session_start();

require_once('Encode.php');

if (isset($_POST['payment']) === TRUE) { $_SESSION['payment'] = $_POST['payment']; }

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
<meta charset="UTF-8" />
<style type="text/css">

@media screen and (min-width:300px){
 dl{
  width: 80%;
 }
}

@media screen and (min-width:600px){
  dl{
   width : 300px;
  }
}


dt{
  font-size : 15px;
  font-weight : bold;

  margin-bottom : 10px;
   
  border-bottom-width : 1px;
  border-bottom-style : solid;
  border-bottom-color : #a73836;

  border-left-width : 7px;
  border-left-style : solid;
  border-left-color : #5a5a2e;

  padding-top : 2px;
  padding-left : 2px;
  padding-bottom : 2px;
}

dd{  
  font-size : 90%;
  line-height : 1.8;    
  margin-bottom : 45px;    
 
  border-bottom-width : 1px;
  border-bottom-style : solid;
  border-bottom-color : #5a5a2e;    

  padding-left : 5px;
  padding-right : 15px;
}
</style>

<title>Modifying Comfirm</title>
</head>
<body background="faintBacl.jpg">
<span style="color:#ffdd00;"><h3>Modifying Form</h3>
<p>修正入力フォーム</p></span>

    <?php
    $payment2 = array('銀行振込', 'Pay pal', 'Cash Registration');
    ?>


	<form method="POST" action="Ksub03.php">
	<dl><font color="#ffdd00">
	<?php print('<dt>Your Name:</dt><dd><input type="text" name="yourname" value="'.e($_SESSION['yourname']).'"></dd>'); ?>
	<dt>Your Site:</dt><dd><input type="text" name="address" value="<?php print(e($_SESSION['address'])); ?>"></dd>
	<dt>Zip code：</dt><dd><input type="text" id="zip" name="zip" value="<?php print(e($_SESSION['zip'])); ?>"></dd>
	<dt>E mail：</dt><dd><input type="text" name="email" value="<?php print(e($_SESSION['email'])); ?>"></dd>
	<dt>Please choose one you buy</dt><dd>

    <?php
    $works = array('H Photos' => 'KIgaS 100 H Photos', 'KINO' => 'KINO -HEN-', 'KURODA EXTRA' => '黒田の福袋');
    foreach ($works as $k_ws => $v_ws) {
      print('<label>');
      print('<input type="checkbox" name="prc[]" value="'.$k_ws.'"');
      if (isset($_SESSION['prc']) === TRUE) {
        foreach ($_SESSION['prc'] as $ws) {
          if ($k_ws === $ws) { print(' checked'); }
        }
      }
      print(' />');
      print($v_ws.'</label>');
    }
    ?>
</dd>
	<dt>Free Opinion</dt><dd><textarea name="opinion" cols="15" rows="5"><?php print(e($_SESSION['opinion'])); ?></textarea></dd>
	
    <dt>How to pay(支払方法)：</dt>
    <dd><select id="payment" name="payment">
    <?php 
      for ($i = 0; $i < count($payment2); $i ++) {
        print('<option value="'.$payment2[$i].'"');
       if (isset($_POST['payment']) === TRUE) { print(' selected'); }
	//$i === (int)$POST['payment']
        print('>' . $payment2[$i] .'</option>');
      }
    ?>
    </select></dd></font></dl>

　  <input type="button" value="QUIT(最初に戻る)!" onclick="location.href='KigaSubscribe.html'";/>
　  <input type="submit" value=" I comfirmed(注文を確定する)!" />
</form>



