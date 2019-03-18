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
    <a href="cooking_house.php"><button type="button" class="btn btn-primary  col-md-3 "><-回到資料表</button></a>
    </div>

    <!-- "新增資料"的表單 -->
    <div class="row">
        <div class="col-lg-6 center_div">
                <div id="info_bar" class="alert alert-success" role="alert" style="display: none">
                </div>
            <br>
            <div class="card">
              <div class="card-body">
                    <h5 class="card-title">新增資料
                    </h5>

                    <form name="form1" method="post" onsubmit="return checkForm();">
                        <input type="hidden" name="checkme" value="check123">
                        <div class="form-group">
                            <label for="name">料理空間名稱</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="米花工作坊"
                                   value="">
                            
                        </div>
                        <div class="form-group">
                            <label for="phone">聯絡電話</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="02-1234"
                                   value="">
                           
                        </div>
                        <div class="form-group">
                            <label for="address">地址</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder=""
                                   value="">
                            
                        </div>
                        <div class="form-group">
                            <label for="web">網站(選填)</label>
                            <input type="text" class="form-control" id="web" name="web" placeholder=""
                                   value="">
                            
                        </div>
                        <div class="form-group">
                            <label for="intro">簡介</label>
                            <textarea class="form-control" id="intro" name="intro" placeholder="請簡要介紹料理空間" cols="30" rows="3"></textarea>
                            
                        </div>

                        <button id="submit_btn" type="submit" class="btn btn-primary">Submit</button>
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
            'phone',
            'address',
            'web',
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


    
            if(isPassed) {
                let form = new FormData(document.form1);

                submit_btn.style.display = 'none';

                fetch('cooking_house_data_insert_api.php', {
                    method: 'POST',
                    body: form
                })
                    .then(response=>response.json())
                    .then(obj=>{
                        console.log(obj);

                        info_bar.style.display = 'block';

                        if(obj.success){
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
        };

    </script>
<?php include __DIR__. '/_html_footer.php';  ?>