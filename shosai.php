<?php include("header.php") ?>
<?php 
$user_name = $_SESSION['user_name'];
$pass_word = $_SESSION['pass_word'];

if($user_name == "rinsendo" && $pass_word == "rinsendo5500"){ ?>
<?php
$id = $_GET['id']; 
    $dsn = 'mysql:dbname=_wp_phototherapy;host=mysql137.heteml.jp';
    $user = '_wp_phototherapy';
    $password ='rinsendo5500';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->query('SET NAMES utf8');
    
    $sql ='SELECT * FROM `SaveContactForm7_8` WHERE id="'.$id.'"';

    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    foreach($rec as $key => $value){
            $rec[$key] = htmlspecialchars($value);
        }
    
//    金額計算
    if($rec['hettarer'] !=""){
        $hettarer = 1380;
    }else{
        $hettarer = 0;
    }
    $x39 = (int)$rec['number_1'] * 17500;
    $at = (int)$rec['number_7'] * 23800;
    $some = ((int)$rec['number_2'] + (int)$rec['number_3'] +(int)$rec['number_4'] +(int)$rec['number_5'] +(int)$rec['number_6'] +(int)$rec['number_8'] +(int)$rec['number_9'] +(int)$rec['number_10']) * 10700;
    $total = $x39 + $at + $some + $hettarer;
    
    
//    購入存在確認
    $patch = array('number_1'=>"X39",'number_2'=>"nightwave",'number_3'=>"icewave",'number_4'=>"energy enhancer",'number_5'=>"SP6",'number_6'=>"ALAVIDA",'number_7'=>"ALAVIDA Regenerating Trio",'number_8'=>"glutathione",'number_9'=>"carnosine",'number_10'=>"aeon");
    $bought = array();
    foreach($patch as $key => $value){
        if($rec[$key] != ""){ 
            $bought[] = $value."・・・".$rec[$key]."個";
        }
    }
?>
<main>
    <div class="main-first">
        <div class="img">
            <img src="img/image823.png">
        </div>
        <h1 class="shosai_h1"><?php echo $rec['your_name']; ?>様</h1>
    </div>
    <div class="main-inner">
        <h2>購入者情報</h2>
        <dl class="shosai row">
            <dt class="col-sm-3">名前</dt>
            <dd class="col-sm-9"><?php echo $rec['your_name']; ?></dd>
            <dt class="col-sm-3">メールアドレス</dt>
            <dd class="col-sm-9"><?php echo $rec['your_email']; ?></dd>
            <dt class="col-sm-3 border-none">電話番号</dt>
            <dd class="col-sm-9 border-none"><?php echo $rec['your_tel']; ?></dd>
        </dl>

        <dl class="shosai row">
            <dt class="col-sm-3">郵便番号</dt>
            <dd class="col-sm-9"><?php echo $rec['your_zip_code']; ?></dd>
            <dt class="col-sm-3 border-none">住所</dt>
            <dd class="col-sm-9 border-none"><?php echo $rec['your_address'].$rec['your_address2']; ?></dd>
        </dl>

        <h2>注文内容</h2>

        <dl class="shosai row">
            <dt class="col-sm-3">X39</dt>
            <dd class="col-sm-9"><?php echo $rec['number_1']; ?></dd>
            <dt class="col-sm-3">nightwave</dt>
            <dd class="col-sm-9"><?php echo $rec['number_2']; ?></dd>
            <dt class="col-sm-3">icewave</dt>
            <dd class="col-sm-9"><?php echo $rec['number_3']; ?></dd>
            <dt class="col-sm-3">energy enhancer</dt>
            <dd class="col-sm-9"><?php echo $rec['number_4']; ?></dd>
            <dt class="col-sm-3">SP6</dt>
            <dd class="col-sm-9"><?php echo $rec['number_5']; ?></dd>
            <dt class="col-sm-3">ALAVIDA</dt>
            <dd class="col-sm-9"><?php echo $rec['number_6']; ?></dd>
            <dt class="col-sm-3">ALAVIDA Regenerating Trio</dt>
            <dd class="col-sm-9"><?php echo $rec['number_7']; ?></dd>
            <dt class="col-sm-3">glutathione</dt>
            <dd class="col-sm-9"><?php echo $rec['number_8']; ?></dd>
            <dt class="col-sm-3">carnosine</dt>
            <dd class="col-sm-9"><?php echo $rec['number_9']; ?></dd>
            <dt class="col-sm-3 border-none">aeon</dt>
            <dd class="col-sm-9 border-none"><?php echo $rec['number_10']; ?></dd>
        </dl>
        <h2>その他</h2>



        <dl class="shosai row">
            <dt class="col-sm-3">電磁波シール</dt>
            <dd class="col-sm-9"><?php echo $rec['hettarer']; ?></dd>
            <dt class="col-sm-3 border-none">記入欄</dt>
            <dd class="col-sm-9 border-none"><?php echo $rec['your_message2']; ?></dd>
        </dl>
        
        <h2>金額</h2>



        <dl class="shosai row">
            <dt class="col-sm-3">商品のみ（税別）</dt>
            <dd class="col-sm-9">
                <?php echo $total; ?>円</dd>
            <dt class="col-sm-3 border-none">請求金額</dt>
            <dd class="col-sm-9 border-none"><?php echo ($total + 200) * 1.1; ?>円</dd>
            <dt class="col-sm-3 border-none">確認メールを送る</dt>
            <dd class="col-sm-9 border-none">
            <form method="post" action="send.php">
                <input type="submit" value="送信">
                <input type="hidden" name ="name" value="<?php print $rec['your_name']; ?>">
                <input type="hidden" name="add" value="<?php print $rec['your_zip_code'].$rec['your_address'].$rec['your_address2']; ?>">
                <input type="hidden" name ="email" value="<?php print $rec['your_email']; ?>">
                <?php 
                    for($i=0; $i < count($bought); $i++){
                        ?>
                <input type="hidden" name ="bought[]" value="<?php print $bought[$i]; ?>">
                <?php    } ?>
                <input type="hidden" name ="hettarer" value="<?php print $hettarer ?>">
                <input type="hidden" name ="total" value="<?php print $total; ?>">
                
                </form>
            </dd>
        </dl>


        <?php 
    
$dbh =null;
      
?><div class="btn-inner"><input class="back-confirm-btn" type="button" onclick="history.back()" value="戻る"></div>
    </div>
</main>
<?php }else{?>
<main>
    <div class="main-first">
        <div class="img">
            <img src="img/image823.png">
        </div>
        <h1>アクセスエラー</h1>
    </div>
    <div class="main-inner">
        <p>不正なアクセスです。</p>
    </div>
</main>
<?php } ?>
<?php include("footer.php"); ?>
