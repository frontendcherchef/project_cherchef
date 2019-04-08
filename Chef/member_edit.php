<?php
require __DIR__. '/connect.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

$sql = "SELECT * FROM member WHERE sid=$sid";

$stmt = $pdo->query($sql);
if($stmt->rowCount()==0){
    header('Location: member.php');
    exit;
}
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<?php include __DIR__. '/_html_header.php';  ?>
<?php include __DIR__. '/_navbar.php';  ?>

<div class="container">
    <!-- 上排按鈕 -->
    <br>
    <div class="center_div">
    <a href="member.php"><button type="button" class="btn btn-warning  col-md-3 "><-回到資料表</button></a>
    </div>

    <div class="row">
        <div class="col-lg-6 center_div">
                <div id="info_bar" class="alert alert-success" role="alert" style="display: none">
                </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">修改資料
                    </h5>
                    <form name="form1" method="post" onsubmit="return checkForm();">
                        <input type="hidden" name="checkme" value="check123">
                        <input type="hidden" name="sid" value="<?= $row['sid']?>">
                        <div class="form-group">
                           <input type="text"  class="form-control" name="email" value="<?=$row['email']?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="password">密碼</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder=""
                                   >
                        </div>
                        <div class="form-group">
                            <label for="password2">再次輸入密碼</label>
                            <input type="password" class="form-control" id="password2" name="password2" placeholder=""
                                   >
                        </div>
                        <div class="form-group">
                            <label for="name">姓名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder=""
                                   value="<?= $row['name']?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">電話</label>
                            <input type="number" class="form-control" id="phone" name="phone" placeholder=""
                                   value="<?= $row['phone']?>">
                        </div>
                        <div class="form-group">
                            <label for="address">地址</label>
                            <input class="form-control" id="address" name="address" value="<?= $row['address']?>">
                        </div>

                        <button id="submit_btn" type="submit" class="btn btn-warning">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>




</div>
    <script>
        const info_bar = document.querySelector('#info_bar');
        const submit_btn = document.querySelector('#submit_btn');

        const fields = [
            'password',
            'password2',
            'name',
            'phone',
            'address',
        ];

        // 拿到每個欄位的參照
        const fs = {};
        for(let v of fields){
            fs[v] = document.form1[v];
        }
        console.log(fs);
        console.log('fs.name:', fs.name);


        const checkForm = ()=>{
            let isPassed = true;
            info_bar.style.display = 'none';

            // 拿到每個欄位的值
            const fsv = {};
            for(let v of fields){
                fsv[v] = fs[v].value;
            }
            console.log(fsv);


            if(isPassed) {
                let form = new FormData(document.form1);

                submit_btn.style.display = 'none';

                fetch('member_edit_api.php', {
                    method: 'POST',
                    body: form
                })
                    .then(response=>response.json())
                    .then(obj=>{
                        console.log(obj);

                        info_bar.style.display = 'block';

                        if (obj.success) {
                    info_bar.className = 'alert alert-success';
                    let t = 3;

                    function countdown() {
                        t -= 1;
                        info_bar.innerHTML = `資料修改成功，${t}秒後返回列表`;
                        if (t == 0) {
                            let back = document.referrer;
                            window.location.href = back;
                        }
                        setTimeout(countdown, 1000);
                    }
                    countdown();
                } else {
                    info_bar.className = 'alert alert-danger';
                    info_bar.innerHTML = obj.errorMsg;
                    setTimeout(() => {
                        info_bar.style.display = 'none';
                    }, 1500);
                }

                submit_btn.style.display = 'block';
            });


    }
    return false;
        };

    </script>
<?php include __DIR__. '/_html_footer.php';  ?>