<?php
require __DIR__. '/connect.php';
?>
<?php include __DIR__. '/_html_header.php';  ?>
<?php include __DIR__. '/_navbar.php';  ?>
    <style>
        .form-group small {
            color: red !important;
        }
    </style>

<div class="container">
    <!-- 上排按鈕 -->
    <br>
    <div class="center_div">
    <a href="activities.php"><button type="button" class="btn btn-warning  col-md-3 "><-回到資料表</button></a>
    </div>

    <!-- "新增資料"的表單 -->
    <div class="row">
        <div class="col-lg-6 center_div">
                <div id="info_bar" class="alert alert-success" role="alert" style="transform:translate(-50%,-50%); position:fixed;top:50%; left:50%; display: none; z-index:15">
                </div>
            <br>
            <div class="card">
              <div class="card-body">
                    <h5 class="card-title">新增資料
                    </h5>

                    <form name="form1" method="post" onsubmit="return checkForm();">
                        <input type="hidden" name="checkme" value="check123">
                        <div class="form-group">
                            <label for="name">活動名稱</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="料理活動"
                                   value="">
                            
                        </div>
                        <div class="form-group">
                            <label for="chef">帶領廚師</label>
                            <input type="text" class="form-control" id="chef" name="chef" placeholder="詹姆士"
                                   value="">
                           
                        </div>
                        <div class="form-group">
                            <label for="places">地點</label>
                            <input type="text" class="form-control" id="places" name="places" placeholder="宜蘭縣"
                                   value="">
                           
                        </div>
                        <div class="form-group">
                            <label for="time">時間</label>
                            <input type="text" class="form-control" id="time" name="time" placeholder="2019-00-00"
                                   value="">
                            
                        </div>
                        <div class="form-group">
                            <label for="duration">活動長度</label>
                            <input type="text" class="form-control" id="duration" name="duration" placeholder="x天x夜"
                                   value="">
                            
                        </div>
                        <div class="form-group">
                            <label for="price">價格</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="x元"
                                   value="">
                            
                        </div>
                        <div class="form-group">
                            <label for="content">內容</label>
                            <input type="text" class="form-control" id="content" name="content" placeholder="活動內容"
                                   value="">
                            
                        </div>
                        <div class="form-group">
                            <label for="details">細節(選填)</label>
                            <textarea class="form-control" id="details" name="details" placeholder="請介紹活動細節" cols="30" rows="3"></textarea>
                                                 
                        </div>
                        <div class="form-group">
                            <label for="u_limit">活動人數上限</label>
                            <input type="text" class="form-control" id="u_limit" name="u_limit" placeholder=""
                                   value="">
                            
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
            'name',
            'chef',
            'places',
            'time',
            'duration',
            'price',
            'content',
            'details',
            'u_limit'
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


            // if(fsv.name.length < 2){
            //     fs.name.style.borderColor = 'red';
            //     document.querySelector('#nameHelp').innerHTML = '請填寫正確的名稱!';

            //     isPassed = false;
            // }



            if(isPassed) {
                let form = new FormData(document.form1);

                submit_btn.style.display = 'none';

                fetch('activities_data_insert_api.php', {
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
        return false;
        };

    </script>
<?php include __DIR__. '/_html_footer.php';  ?>