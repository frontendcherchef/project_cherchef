<?php
require __DIR__. '/connect.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

$sql = "SELECT * FROM add_utensils WHERE sid=$sid";

$stmt = $pdo->query($sql);
if($stmt->rowCount()==0){
    header('Location: add_utensils.php');
    exit;
}
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<?php include __DIR__. '/_html_header.php';  ?>
<?php include __DIR__. '/_navbar.php';  ?>

<div class="container">
    <!-- 上排按鈕 test test -->
    <br>
    <div class="center_div">
    <a href="add_utensils.php"><button type="button" class="btn btn-warning  col-md-3 "><-回到資料表</button></a>
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
                            <label for="clients">會員編號</label>
                            <input type="text" class="form-control" id="clients" name="clients" placeholder=""
                                   value="<?= $row['clients']?>">
                    
                        </div>

                        <div class="form-group">
                            <label for="name">產品名稱</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder=""
                                   value="<?= $row['name']?>">
                    
                        </div>
                        <div class="form-group">
                            <label for="rent">產借金額</label>
                            <input type="text" class="form-control" id="rent" name="rent" placeholder=""
                                   value="<?= $row['rent']?>">
                        </div>
                        <div class="form-group">
                            <label for="price">購買價錢</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder=""
                                   value="<?= $row['price']?>">
                        </div>
                        <div class="form-group">
                            <label for="quantity">加購數量</label>
                            <input type="text" class="form-control" id="quantity" name="quantity" placeholder=""
                                   value="<?= $row['quantity']?>">
                        </div>
                        <div class="form-group">
                            <label for="details">詳細資訊</label>
                            <input type="text" class="form-control" id="details" name="details" placeholder=""
                                   value="<?= $row['details']?>">
                        </div>
                        <div class="form-group">
                            <label for="intro">商品特色</label></label>
                            <textarea class="form-control" id="intro" name="intro" cols="30" rows="3"><?= $row['intro']?></textarea>
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
            'clients',
            'name',
            'rent',
            'price',
            'quantity',
            'details',
            'intro',
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


            if (isPassed) {
            let form = new FormData(document.form1);

            submit_btn.style.display = 'none';

            fetch('add_utensils_data_insert_api.php', {
                    method: 'POST',
                    body: form
                })
                .then(response => response.json())
                .then(obj => {
                    console.log(obj);

                    info_bar.style.display = 'block';

                    if (obj.success) {
                        info_bar.className = 'alert alert-success';
                        let t = 3;

                        function countdown() {
                            t -= 1;
                            info_bar.innerHTML = `資料新增成功，${t}秒後返回列表`;
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
        return false;        };

    </script>
<?php include __DIR__. '/_html_footer.php';  ?>