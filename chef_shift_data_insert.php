<?php
require __DIR__. '/connect.php';
?>
<?php include __DIR__. '/_html_header.php';  ?>
<?php include __DIR__. '/_navbar.php';  ?>
    <style>
        .form-group small {
            color: red !important;
        }
        .mini-radio {
            width: 1rem;
        }
    </style>

<div class="container">
    <!-- 上排按鈕 -->
    <br>
    <div class="center_div">
    <a href="chef_shift.php"><button type="button" class="btn btn-primary  col-md-3 "><-回到資料表</button></a>
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
                            <label for="chef_id">廚師sid</label>
                            <input type="text" class="form-control" id="chef_id" name="chef_id" placeholder=""
                                   value=""> 
                                                             
                        </div> 
                        <div class="form-group">
                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-3 d-flex">
                                            <input type="radio" class="mini-radio form-control" id="this_month" name="this_next_month"
                                   value="1" checked> 
                                            <label for="this_month">本月</label>
                                        </div>
                                        <div class="col-3 d-flex">
                                            <input type="radio" class="mini-radio form-control" id="next_month" name="this_next_month"
                                   value="2"> 
                                            <label for="this_month">次月</label> 
                                        </div>
                                    </div>
                                </div>
                                                                                        
                        </div> 
                        <input type="hidden" name="lunch_free[]" value=""> 
                        <input type="hidden" name="dinne_free[]" value="">                   
                        
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
            'tool_name'
    
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

                fetch('chef_shift_data_insert_api.php', {
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