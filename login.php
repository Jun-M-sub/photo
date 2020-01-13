<?php
include("header.php");
?>
<main>
    <div class="main-first">
        <div class="img">
            <img src="img/image823.png">
        </div>
        <h1>ログイン</h1>
    </div>
    <div class="main-inner">

        <div>
            <form action="choice.php" method="post">
                <div class="wrap">
                    <h2><i class="fas fa-map-marker-alt"></i>ログイン情報</h2>
                    <table class="table table-bordered table-striped table-contactform7">
                        <tbody>
                            <tr>
                                <th>
                                    <div><span class="table-contactform7">ユーザー名</span></div>
                                </th>
                                <td><input type="text" name="user_name" class="form-medium" placeholder="" required></td>
                            </tr>

                            <tr>
                                <th>
                                    <div>パスワード</div>
                                </th>
                                <td><input type="text" name="pass" class="form-medium" placeholder="" required></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="btn-inner">
                    <input class="next-btn btn-flat-vertical-border" type="submit" value="確認">
                </div>
            </form>
        </div>

   
        
    </div>
</main>
<?php
include("footer.php");
?>
