<?php
require __DIR__. '/connect.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

$sql = "SELECT * FROM cooking_house_photo WHERE sid=$sid";

$stmt = $pdo->query($sql);
if($stmt->rowCount()==0){
    header('Location: ./');
    exit;
}


$stmt = $pdo->query($sql);
if($stmt->rowCount()==0){
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
    <a href="cooking_house_photo.php"><button type="button" class="btn btn-warning  col-md-3 "><-回到資料表</button></a>
    </div>

    <div class="row">
        <div class="col-lg-6 center_div">
                <div id="info_bar" class="alert alert-success" role="alert" style="display: none">
                </div>
            <br>
            <div class="card">
              <div class="card-body">
              <div class="form-group">
                    <h5 class="card-title">修改圖片資料
                    </h5>
            
    
                    <form name="form1" method="post" enctype="multipart/form-data" onsubmit="checkForm()">
                    <div class="form-group">
                             <input type="hidden" name="sid" value="<?= $row['sid']?>">
                             <input type="hidden" name="file_name" value="<?= $row['file_name']?>">
                             <label for="cooking_house_sid">料理空間sid</label>
                            <input type="text" class="form-control" id="cooking_house_sid" name="cooking_house_sid" placeholder="" value="<?= $row['cooking_house_sid']?>">
                        選擇上傳檔案:
                         <br>                
                         <input type="file" name="my_file" multiple="multiple"><br> 
                    <br>
                    <br>
                    <button type="submit" class="btn btn-warning btn-lg btn-block" name ="submit" id="submit_btn" >上傳圖片</button>
                    <!-- <input type="submit" value="上傳圖片" name="submit"> -->
                    </div>
                
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
            'cooking_house_sid',
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

                fetch('cooking_house_photo_data_edit_api.php', {
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