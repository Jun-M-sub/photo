<?php
include("header.php");
?>


<?php 
if(isset($_POST['user_name'])){
$user_name = $_POST['user_name'];
$pass_word = $_POST['pass'];
}
   
if(!isset($_SESSION['user_name'])){
//    セッションにユーザー名とパスを登録する
    $_SESSION['user_name'] = $user_name;
    $_SESSION['pass_word'] = $pass_word;
}   
   
if(($_SESSION['user_name'] == "rinsendo") && ($_SESSION['pass_word'] == "rinsendo5500")){ ?>

<main>
    <div class="main-first">
        <div class="img">
            <img src="img/image823.png">
        </div>
        <h1>フォームリスト</h1>
    </div>
    <div class="main-inner">
        <h2><a href="list.php">通常申し込み</a></h2>

    </div>
</main>


<?php 

}else{ ?>
    <main>
         <div class="main-first">
        <div class="img">
            <img src="img/image823.png">
        </div>
        <h1>ログインエラー</h1>
    </div>
    <div class="main-inner">
        ログインできませんでした。
    </div>
</main>
<?php } ?>
<?php
include("footer.php");
?>
