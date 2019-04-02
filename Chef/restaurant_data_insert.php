<?php
require __DIR__. '/connect.php';
$page_name = 'restaurant_data_insert';

//抓food_style的checkbox的value跟名字配對
$t_sql = "SELECT * FROM `food_style` ORDER BY `food_style`.`sid`";
$t_stmt = $pdo->query($t_sql);
$all_food_style = $t_stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include __DIR__. '/_html_header.php';  ?>
<?php include __DIR__. '/_navbar.php';  ?>
    <style>
        .form-group small {
            color: red !important;
        }
        p.reminder{
            color: red;
            text-align: right;
        }
    </style>

<div class="container">
    <!-- 上排按鈕 -->
    <br>
    <div class="center_div">
    <a href="restaurant_list.php"><button type="button" class="btn btn-warning  col-md-3 "><-回到資料表</button></a>
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
                    <p class="reminder">標示*為必填項目</p>

                    <form name="form1" method="post" onsubmit="return checkForm();">
                        <input type="hidden" name="checkme" value="check123">
                        <div class="form-group">
                            <label for="name">*餐廳名稱</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder=""
                                   value="">
                            
                        </div>
                        <div class="form-group">
                            <label for="phone">*電話</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder=""
                                   value="">
                           
                        </div>
                        <div class="form-group">
                            <label for="address">*地址</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder=""
                                   value="">
                            
                        </div>
                        <div class="form-group">
                            <label for="open_time">*營業時間</label>
                            <input type="text" class="form-control" id="open_time" name="open_time" placeholder="一週營業時間，或採預約制"
                                   value="">
                            
                        </div>
                        <div class="form-group">
                            <label for="web">網址</label>
                            <input type="text" class="form-control" id="web" name="web" placeholder=""
                                   value="">
                            
                        </div>
                        <div class="form-group">
                            <label for="intro">*餐廳簡介（100字以內）</label>
                            <textarea class="form-control" id="intro" name="intro" placeholder="" cols="30" rows="3"></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label for="food_style">料理風格（可複選）</label>
                            <div class="d-flex flex-wrap justify-content-between">                                    
                                <?php foreach ($all_food_style as $food_style) : ?>
                                    <div style="display:inline-block">
                                        <input type="checkbox" id="food_style_<?= $food_style['sid'] ?>" name="food_style[]"
                                                value="<?= $food_style['sid'] ?>">
                                        <label for="food_style_<?= $food_style['sid'] ?>"><?= $food_style['name'] ?></label>
                                    </div>
                                <?php endforeach ?>
                                </div>
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
            'phone',
            'address',
            'open_time',
            'web',
            'intro',
            'food_style[]'
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

                fetch('restaurant_data_insert_api.php', {
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