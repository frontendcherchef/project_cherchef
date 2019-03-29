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
    <a href="clients_list.php"><button type="button" class="btn btn-warning  col-md-3 "><-回到資料表</button></a>
    </div>

    <!-- "新增資料"的表單 -->
    <div class="row">
        <div class="col-lg-6 center_div">
                <div id="info_bar" class="alert alert-success" role="alert" style="display: none">
                </div>
            <br>
            <div class="card">
              <div class="card-body">
              <div class="form-group">
                    <h5 class="card-title">新增圖片
                    </h5>
            
    
                    <form name="form1" action="clients_profile_pic_insert_api.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                            <label for="clients_sid">用戶sid</label>

                            <input type="text" class="form-control" id="clients_sid" name="clients_sid" placeholder="" value="">
                        選擇上傳檔案:
                         <br>                
                         <input type="file" name="my_file[]" multiple="multiple"><br>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-warning btn-lg btn-block" name="submit">上傳圖片</button>
                    <!-- <input type="submit" value="上傳圖片" name="submit"> -->
                    </div>
                
                    </form>
                

        </div>
    </div>


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

                fetch('clients_profile_pic_insert_api.php', {
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