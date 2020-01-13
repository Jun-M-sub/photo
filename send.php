<?php
include("header.php");
date_default_timezone_set('Asia/Tokyo');
?>
 <?php
        $name = $_POST['name'];
        $add = $_POST['add'];
        $email = $_POST['email'];
        $bought = $_POST['bought'];
        $hettarer = $_POST['hettarer'];
        $total = $_POST['total'];
?>

<?php 
//try{
//    $dsn = 'mysql:dbname=meoform;host=localhost';
//    $user = 'root';
//    $password ='';
//    $dbh = new PDO($dsn,$user,$password);
//    $dbh->query('SET NAMES utf8');
//    
//    $sql ='INSERT INTO omakase_form (person_name, person_phone, my_id, shop_name, main_cat,zip_code, adds, shop_phone, description, card_num, card_month, card_year, card_code, card_name, date) VALUES ("'.$person_name.'","'.$person_phone.'","'.$my_id.'","'.$shop_name.'","'.$main_cat.'","'.$zip_code.'","'.$add.'","'.$shop_phone.'","'.$description.'","'.$card_num.'","'.$card_month.'","'.$card_year.'","'.$card_code.'","'.$card_name.'","'.$date.'")';
//    $stmt = $dbh->prepare($sql);
//    $stmt->execute();
//    
//    $dbh =null;
//    }
//    catch(Exception $e){
//        print "ただいま停止中<br>";
//        print "エラーの理由";
//        print $e->getMessage();
//        exit();
//    }
 ?>



<main>
    <div class="main-first">
       
        <div class="img">
            <img src="img/image823.png">
        </div>
        <h1>サンクスメール完了</h1>
    </div>
    <div class="main-inner">
        <div id="firstBox">
            <div class="wrap">
                <h2>以下の内容でメールを送りました。</h2>
<p><?php print $name; ?>　様<br>
<br>
この度はPHOTO THERAPYご購入フォームをご利用いただきありがとうございます。<br>
ご購入につきまして下記の内容でお間違いがないか、確認させていただきたいと存じます。<br><br>
    ・ご購入商品と合計金額<br>
<?php 
    for($i=0;$i<count($bought);$i++){
        print "&nbsp;&nbsp;".$bought[$i];
    }
    if($hettarer == 1380){
        print "&nbsp;&nbsp;電磁波除去シール・・・1個";
    }
    ?>
    &nbsp;&nbsp;送料・・・200円（税別）<br>
    <b>&nbsp;&nbsp;合計金額 <?php print ($total + 200) * 1.1; ?></b>

<br><br>・お届け先、払込用紙発送先ご住所<br>
　　&nbsp;&nbsp;〒<?php print $add; ?>
    <br><br><br>
以上をご確認の上、ご返信をお願いいたします。<br>
恐れ入りますがご返信を確認後の発送となりますので、よろしくお願い申し上げます。
</p>
                <div class="btn-inner">
                    <form action="choice.php">
                        <input class="next-btn btn-flat-vertical-border" type="submit" value="フォーム別">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
 <?php
$mail_sub="【PHOTO THERAPY】お申込み内容ご確認";
$mail_body=$name."様\n";
$mail_body.="この度はPHOTO THERAPYご購入フォームをご利用いただきありがとうございます。\n";
$mail_body.="ご購入につきまして下記の内容でお間違いがないか、確認させていただきたいと存じます。\n\n";
$mail_body.="・ご購入商品とご請求金額\n";

for($i=0;$i<count($bought);$i++){
       $mail_body.= "  ".$bought[$i]."\n";
    }
    if($hettarer == 1380){
        $mail_body.= "  電磁波除去シール・・・1個\n";
    }

$mail_body.="  送料・・・200円（税別）\n";
$mail_body.="  ご請求金額".($total + 200) * 1.1."円\n\n";
$mail_body.="・お届け先、払込用紙発送先ご住所\n";
$mail_body.="  〒".$add."\n\n";
$mail_body.="以上をご確認の上、ご返信をお願いいたします。\n";
$mail_body.="恐れ入りますがご返信を確認後の発送となりますので、よろしくお願い申し上げます。\n";

$mail_body.="----------------------------------\n";
$mail_body.="e-mail patch_cast@photo-therapy.jp\n";
$mail_body.="----------------------------------";
$mail_body=html_entity_decode($mail_body,ENT_QUOTES,"UTF-8");
$mail_head="From: patch_cast@photo-therapy.jp";
$mail_head.="\n";
//$mail_head.="Bcc: ishida@rinsendo.com";
mb_language('Japanese');
mb_internal_encoding("UTF-8");
mb_send_mail($email,$mail_sub,$mail_body,$mail_head);
?>
<?php
include("footer.php");
?>
