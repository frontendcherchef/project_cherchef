<?php
require __DIR__. '/connect.php';
$page_name = 'login';
$page_title = '登入';

if(empty($_SERVER['HTTP_REFERER'])){
    $come_from = './';
} else {
    $come_from = $_SERVER['HTTP_REFERER'];
}

?>
<?php include __DIR__. '/_html_header.php' ?>
<?php include __DIR__. '/_navbar.php' ?>

<div class="mainbg">

<div class="container center_div">

            <div id="info" class="alert" role="alert" style="display: none"></div>
          
            <div class=" login_box col-9 col-md-4 card py-4">
            <div class="  col-12 align-items-center">   
            <?php if(isset($_SESSION['user'])):?>
            <script>
            location.href = './index.php';
            </script>
            <?php endif;?>

                    <h5 class="card-title">登入</h5>
                    <div class="card-text">

                    <form name="form1" method="post" class="d-flex flex-column" onsubmit="return formCheck()">
                    <div class="form-group">
                        <input type="email"  required class="form-control" id="email" name="email" placeholder="用戶名稱（E-mail）">
                        <small id="emailHelp" class="form-text" style="color:red"></small>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="密碼（password）">
                        <small id="passwordHelp" class="form-text"  style="color:red"></small>
                    </div>

                    <button type="submit" class="m-auto btn btn-warning" style="width:40%">登入</button>
                </form>

                    </div>


                </div>
            
        </div>
    </div>
</div>

</div>
    <script>

        var fields = ['email', 'password'];
        var i, s;
        var info = $('#info');
        var submit_btn = $('button[type=submit]');
        var come_from = '<?= $come_from ?>';

        function formCheck(){
            info.hide();
            submit_btn.hide();
            // 讓每一欄都恢復原來的狀態
            for(s in fields){
                cancelAlert(fields[s]);
            }

            var isPass = true;
            var email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;


            if(! email_pattern.test(document.form1.email.value)){
                setAlert('email', '請輸入正確的 email 格式');
                isPass = false;
            }
            if(document.form1.password.value.length < 8){
                setAlert('password', '密碼請輸入八個字以上');
                isPass = false;
            }

            if(isPass){

                $.post('login_api.php', $(document.form1).serialize(), function(data){
                    var alertType = 'alert-danger';

                    info.removeClass('alert-danger');
                    info.removeClass('alert-success');

                    if(data.success){
                        alertType = 'alert-success';
                        setTimeout(function(){
                            location.href = 'index.php';
                        }, 2000);
                    } else {
                        submit_btn.show();
                        alertType = 'alert-danger';
                    }
                    info.addClass(alertType);
                    if(data.info){
                        info.html( data.info );
                        info.slideDown();
                    }
                }, 'json');

            } else {
                submit_btn.show();
            }

            return false;
        }

        // 設定警示
        function setAlert(fieldName, msg){
            $('#'+fieldName).css('border', '1px solid red');
            $('#'+fieldName+'Help').text(msg);
        }

        // 取消警示
        function cancelAlert(fieldName){
            $('#'+fieldName).css('border', '1px solid #cccccc');
            $('#'+fieldName+'Help').text('');
        }
    </script>
<?php include __DIR__. '/_html_footer.php' ?>