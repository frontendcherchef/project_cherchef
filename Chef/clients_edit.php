<?php
require __DIR__. '/connect.php';

$page_name = 'clients_edit.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

$sql = "SELECT * FROM clients WHERE sid=$sid";

$stmt = $pdo->query($sql);
if ($stmt->rowCount()==0){
    header('Location: clients_list.php');
    exit;
}
$row = $stmt->fetch(PDO::FETCH_ASSOC);


?>
<?php include __DIR__. '/_html_header.php'; ?>
<?php include __DIR__. '/_navbar.php'; ?>
    <style>
        .form-group small{
            color: red !important;
        }

    </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div id="info_bar" class="alert alert-success" role="alert" style="display: none;">
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">修改資料
                        </h5>

                        <form method="post" name="form1" onsubmit="return checkForm();">
                            <input type="hidden" name="checkme" value="checkcheck">
                            <input type="hidden" name="sid" value="<?= $row['sid']?>">
                            <div class="form-group">
                                <label for="name">姓名</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder=""
                                       value="<?= $row['name']?>">
                                <small id="nameHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="mobile">手機</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder=""
                                       value="<?= $row['mobile']?>">
                                <small id="mobileHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="email">電子信箱</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder=""
                                       value="<?= $row['email']?>">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="password">密碼</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder=""
                                       value="<?= $row['password']?>">
                                <small id="passwordHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="address">地址</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder=""
                                       value="<?= $row['address']?>">
                                <small id="addressHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="birthday">生日</label>
                                <input type="text" class="form-control" id="birthday" name="birthday" placeholder=""
                                       value="<?= $row['birthday']?>">
                                <small id="birthdayHelp" class="form-text text-muted"></small>
                            </div>

                            <button id="submit_btn" type="submit" class="btn btn-warning">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        const checkForm =() =>{
            let isPassed = true;
            info_bar.style.display = 'none';

            const fields = [
                'name',
                'mobile',
                'email',
                'password',
                'address',
                'birthday'
            ];


            let name = document.form1.name.value;
            let mobile = document.form1.mobile.value;
            let email = document.form1.email.value;
            let password = document.form1.password.value;
            let birthday = document.form1.birthday.value;

            //後面的i是指不區分大小寫
            let email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
            //後面的錢記號是結束的意思，d{}大括號內代表要有幾個字元，-?代表有沒有dash都可以
            let mobile_pattern = /^09\d{2}\-?\d{3}\-?\d{3}$/;
            let bd_pattern = /^\d{4}\-?\d{2}\-?\d{2}$/;


            for (let k in fields){
                document.form1[fields[k]].style.borderColor = '#cccccc';
                document.querySelector('#' + fields[k] + 'Help').innerHTML = '';
            }

            if (name.length<2){
                document.form1.name.style.borderColor = 'red';
                document.querySelector('#nameHelp').innerHTML = '請輸入正確姓名';

                isPassed = false;
            }
            // if is not true
            if ( ! email_pattern.test(email)){
                document.form1.email.style.borderColor = 'red';
                document.querySelector('#emailHelp').innerHTML = '請輸入正確email';

                isPassed = false;
            }
            if ( ! mobile_pattern.test(mobile)){
                document.form1.mobile.style.borderColor = 'red';
                document.querySelector('#mobileHelp').innerHTML = '請輸入正確的手機號碼';

                isPassed = false;
            }
            if ( ! bd_pattern.test(birthday)){
                document.form1.birthday.style.borderColor = 'red';
                document.querySelector('#birthdayHelp').innerHTML = '請輸入正確的生日';

                isPassed = false;
            }

            if (isPassed){
                let form = new FormData(document.form1);

                submit_btn.style.display = 'none';

                fetch('clients_edit_api.php', {
                    method: 'POST',
                    body: form
                })
                    .then(response=>response.json())
                    .then(obj=>{
                        console.log(obj);

                        info_bar.style.display = 'block';
                        if (obj.success){
                            info_bar.className = 'alert alert-success';
                            info_bar.innerHTML = '資料修改成功';
                        } else {
                            info_bar.className = 'alert alert-danger';
                            info_bar.innerHTML = obj.errorMsg;
                        }
                        submit_btn.style.display = 'block';
                    });
            }

            return false;

        };

    </script>
<?php include __DIR__. '/_html_footer.php'; ?>