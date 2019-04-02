<?php
require __DIR__. '/connect.php';

$page_name = 'clients_add';

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
        <div class="col-12">
            <div id="info_bar" class="alert alert-success" role="alert" style="display: none;">
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增資料
                    </h5>

                    <form method="post" name="form1" onsubmit="return checkForm();" >
                        <input type="hidden" name="checkme" value="checkcheck">
                        <div class="form-group">
                            <label for="name">姓名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder=""
                                   value="">
                            <small id="nameHelp" class="form-text text-muted"></small>
                        </div>
<!--                        <div class="form-group">-->
<!--                            <div class="form-check form-check-inline">-->
<!--                                <input class="form-check-input" type="radio" name="gender" id="gender_m" value="男">-->
<!--                                <label class="form-check-label" for="gender_m">男性</label>-->
<!--                            </div>-->
<!--                            <div class="form-check form-check-inline">-->
<!--                                <input class="form-check-input" type="radio" name="gender" id="gender_f" value="女">-->
<!--                                <label class="form-check-label" for="gender_f">女性</label>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="form-group">
                            <label for="mobile">手機</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder=""
                                   value="">
                            <small id="mobileHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="email">電子信箱</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder=""
                                   value="">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="password">密碼</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder=""
                                   value="">
                            <small id="passwordHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            
                            <label for="address">地址</label>
<!--                            <Select name="city">-->
<!--                                <Option Value="" Selected>請選擇縣市</Option>-->
<!--                                <Option Value="台北市">台北市</Option>-->
<!--                                <Option Value="新北市">新北市</Option>-->
<!--                            </Select>-->
                            <input type="text" class="form-control" id="address" name="address" placeholder=""
                                   value="">
                            <small id="addressHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="birthday">生日</label>
                            <input type="text" class="form-control" id="birthday" name="birthday" placeholder=""
                                   value="">
                            <small id="birthdayHelp" class="form-text text-muted"></small>
                        </div>
<!--                        <form name="form2" action="clients_profile_pic_insert_api.php" enctype="multipart/form-data"-->
<!--                              method="post">-->
<!--                        <div class="form-group" >-->
<!--                            <label for="profile_pic">個人照片上傳(非必須)</label>-->
<!--                            <input type="file" class="form-control" id="profile_pic" name="profile_pic"-->
<!--                                   value="">-->
<!--                        </div>-->
<!--                        </form>-->
<!--                        <div>-->
<!--                            <label for="tool">請勾選家裡有的廚具</label><br>-->
<!--                            <div class="d-block">-->
<!--                                 <input type="checkbox" value="1">電磁爐-->
<!--                                 <input type="checkbox" value="2">瓦斯爐-->
<!--                                 <input type="checkbox" value="3">電鍋-->
<!--                                 <input type="checkbox" value="4">微波爐-->
<!--                                 <input type="checkbox" value="5">旋風爐-->
<!--                            </div>-->
<!--                              <input type="checkbox" value="6">大型烤箱-->
<!--                              <input type="checkbox" value="7">冰箱(配備冷凍庫)-->
<!--                              <input type="checkbox" value="8">壓力鍋-->
<!--                              <input type="checkbox" value="9">不鏽鋼盆-->
<!--                              <input type="checkbox" value="10">砧板<br>-->
<!--                              <input type="checkbox" value="11">鍋鏟-->
<!--                              <input type="checkbox" value="12">平底鍋-->
<!--                              <input type="checkbox" value="13">鐵鍋-->
<!--                              <input type="checkbox" value="14">刀具-->
<!--                              <input type="checkbox" value="15">湯勺<br>-->
<!--                              <input type="checkbox" value="16">電動攪拌器-->
<!--                              <input type="checkbox" value="17">食物調理機-->
<!--                              <input type="checkbox" value="18">磨碎器-->
<!--                              <input type="checkbox" value="19">餐具-->
<!--                              <input type="checkbox" value="20">篩網<br>-->
<!--                              <input type="checkbox" value="21">磅秤-->
<!--                              <input type="checkbox" value="22">果汁機-->
<!--                              <input type="checkbox" value="23">烤盤-->
<!--                              <input type="checkbox" value="24">削皮刀-->
<!--                              <input type="checkbox" value="25">不鏽鋼茶壺-->
<!--                        </div>-->


<!--                        <div class="form-group">-->
<!--                            <label for="kitchen_pic">廚房照片上傳(至少三張)</label>-->
<!--                            <input type="file" class="form-control" id="kitchen_pic" name="kitchen_pic"-->
<!--                                   value="">-->
<!--                        </div>-->
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
            // 'gender',
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
        if (password.length<8){
            document.form1.password.style.borderColor = 'red';
            document.querySelector('#passwordHelp').innerHTML = '請輸入至少8個字元的密碼';

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



        if (isPassed) {
            let form = new FormData(document.form1);
            // let form2 = new FormData(document.form2);

            submit_btn.style.display = 'none';
            fetch('clients_add_api.php', {
                method: 'POST',
                body: form
            })
                .then(response => response.json())
                .then(obj => {
                    console.log(obj);

                    info_bar.style.display = 'block';
                    if (obj.success) {
                        info_bar.className = 'alert alert-success';
                        info_bar.innerHTML = '資料新增成功';
                    } else {
                        info_bar.className = 'alert alert-danger';
                        info_bar.innerHTML = obj.errorMsg;
                    }

                    submit_btn.style.display = 'block';
                });
        }
        return false;
    }

</script>

<?php include __DIR__. '/_html_footer.php'; ?>
