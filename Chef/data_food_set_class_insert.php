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
    <!-- "新增資料"的表單 -->
    <div class="row d-flex flex-column align-items-center">
        <div class="col-lg-6 center_div">
                <div id="info_bar" class="alert alert-warning" role="alert" style="display: none">
                </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增資料
                    </h5>

                    <form name="form1" method="post" onsubmit="return checkForm();">
                        <input type="hidden" name="checkme" value="check123">
                        <div class="form-group">
                            <label for="name">套餐大項</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder=""
                                   value="">
                            
                        </div>
                        <div class="form-group">
                            <label for="food_set">套餐sid</label>
                            <input type="text" class="form-control" id="food_set" name="food_set" placeholder=""
                                   value="">
                           
                        </div>


                        <button id="submit_btn" type="submit" class="btn btn-warning">Submit</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="pt-3 text-nowrap">
            <a href="data_food_set_class.php"><button type="button" class="btn btn-warning">回到資料表</button></a>
        </div>
    </div>


</div>
    <script>
        const info_bar = document.querySelector('#info_bar');
        const submit_btn = document.querySelector('#submit_btn');

        const fields = [
            'name',
            'food_set',
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

                fetch('data_food_set_class_insert_api.php', {
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