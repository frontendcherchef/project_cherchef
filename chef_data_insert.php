<?php
require __DIR__ . '/connect.php';
?>
<?php include __DIR__ . '/_html_header.php';  ?>
<?php include __DIR__ . '/_navbar.php';  ?>
<style>
    .form-group small {
        color: red !important;
    }
</style>

<div class="container">
    <!-- 上排按鈕 -->
    <br>
    <div class="center_div">
        <a href="chef.php"><button type="button" class="btn btn-primary  col-md-3 ">
                <-回到資料表</button> </a> </div> <!-- "新增資料" 的表單 -->
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
                                            <label for="name">姓名</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="傅培梅" value="">

                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="peimei@cherchef.com" value="">

                                        </div>
                                        <div class="form-group">
                                            <label for="password">密碼</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="" value="">

                                        </div>
                                        <div class="form-group">
                                            <label for="mobile">手機</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="0919199200" value="">

                                        </div>
                                        <div class="form-group">
                                            <label for="birthday">生日</label>
                                            <input type="date" class="form-control" id="birthday" name="birthday" placeholder="1985-03-16" value="">

                                        </div>
                                        <!-- picture??? -->
                                        <div class="form-group">
                                            <label for="title">頭銜</label>
                                            <input type="text" class="form-control" id="title" name="title" placeholder="0919199200" value="">

                                        </div>

                                        <div class="form-group">
                                            <label for="info">個人簡介</label>
                                            <textarea class="form-control" id="info" name="info" placeholder="請簡要介紹你自己" cols="30" rows="3"></textarea>

                                        </div>
                                        <div class="form-group">
                                            <label for="experience">工作經歷</label>
                                            <textarea class="form-control" id="experience" name="experience" placeholder="敘述你曾經在何處任職以及時間" cols="30" rows="3"></textarea>

                                        </div>
                                        <div class="form-group">
                                            <label for="restaurant">目前是否在餐廳任職</label>
                                            <label for="yes">是</label>
                                            <input type="radio" class="form-control" id="yes" name="restaurant" value="1">
                                            <label for="no">否</label>
                                            <input type="radio" class="form-control" id="no" name="restaurant" value="0">
                                            
                                        </div>
										<div class="form-group">
                                            <label for="own_kitchen">是否擁有個人工作室</label>
                                            <label for="yes">是</label>
                                            <input type="radio" class="form-control" id="yes" name="own_kitchen" value="1">
                                            <label for="no">否</label>
                                            <input type="radio" class="form-control" id="no" name="own_kitchen" value="0">
                                            
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
        for (let v of fields) {
            fs[v] = document.form1[v];
        }
        console.log(fs);
        console.log('fs.name:', fs.name);


        const checkForm = () => {
            let isPassed = true;
            info_bar.style.display = 'none';

            // 拿到每個欄位的值
            const fsv = {};
            for (let v of fields) {
                fsv[v] = fs[v].value;
            }
            console.log(fsv);



            if (isPassed) {
                let form = new FormData(document.form1);

                submit_btn.style.display = 'none';

                fetch('chef_data_insert_api.php', {
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
        };
    </script>
    <?php include __DIR__ . '/_html_footer.php';  ?> 