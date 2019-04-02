<?php
require __DIR__. '/connect.php';


$sid = isset($_SESSION['user'] ['sid']) ? intval($_SESSION['user'] ['sid']) : 0;

$sql = "SELECT * FROM member WHERE sid=$sid";

$stmt = $pdo->query($sql);
if($stmt->rowCount()==0){
    header('Location: ./');
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
    <a href="./"><button type="button" class="btn btn-warning  col-md-3 "><-回首頁</button></a>
    </div>

    <div class="row">
        <div class="col-lg-6 center_div">
                <div id="info_bar" class="alert alert-success" role="alert" style="display: none">
                </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">修改密碼
                    </h5>
                    <form name="form1" method="post" onsubmit="return checkForm();">
                        <input type="hidden" name="checkme" value="check123">
                        <div class="form-group">
                            <label for="old_password">輸入舊密碼</label>
                            <input type="password" class="form-control" id="old_password" name="old_password" placeholder="">
                    
                        </div>
                        <div class="form-group">
                            <label for="new_password">新密碼</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="address">確認新密碼</label>
                            <input type="password" class="form-control" id="new_password2" name="new_password2" placeholder="">
                        </div>
                        
                        <button id="submit_btn" type="submit" class="btn btn-warning">變更密碼</button>
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
            'old_password',
            'new_password',
            'new_password2',
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

                fetch('member_password_edit_api.php', {
                    method: 'POST',
                    body: form
                })
                    .then(response=>response.json())
                    .then(obj=>{
                        console.log(obj);

                        info_bar.style.display = 'block';

                        if(obj.success){
                            info_bar.className = 'alert alert-success';
                            info_bar.innerHTML = '密碼修改成功'; 
                            info_bar.innerHTML += '<br>請重新登入, 3秒後自動跳頁';  

                        setTimeout(function () {
                        window.location.href = "logout.php"; //will redirect to your blog page (an ex: blog.html)
                        }, 3000);
                           // window.location.href = "logout.php";   
                                            
                        
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