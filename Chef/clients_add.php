<?php
require __DIR__. '/connect.php';

$page_name = 'clients_add';

?>
<?php include __DIR__. '/_html_header.php'; ?>
<?php include __DIR__. '/_navbar.php'; ?>
<style>
    span.required {
        color: red;
    }

    #clients_add label.error {
        color: red;
        width: auto;
        padding: 3px;
        font-size: 12px;
    }
</style>
<div class="container">
<nav aria-label="breadcrumb" class="mt-2">
    <ol class="breadcrumb cyan lighten-4">
      <li class="breadcrumb-item"><a class="" style="color:skyblue;" href="index.php">Home</a></li>
      <li class="breadcrumb-item"><a class="" style="color:skyblue;" href="clients_list.php">會員資料表</a></li>
      <li class="breadcrumb-item active" style="color:orange;">會員新增</li>
    </ol>
</nav>
    <div class="row">
        <div class="col-12">
            <div id="info_bar" class="alert alert-success" role="alert" style="display: none;">
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增資料<span class="required">(前方有*為必填欄)</span>
                    </h5>

                    <form id="clients_add" method="post" name="form1" enctype="multipart/form-data" action="clients_add_api.php">
                        <input type="hidden" name="checkme" value="checkcheck">
                        <div class="form-group">
                            <label for="name"><span class="required">*</span>姓名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="請至少輸入兩個字元" value="" minlength="2" required>
                            <small id="nameHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="gender"><span class="required">*</span>性別</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender_m" value="男" checked>
                                <label class="form-check-label" for="gender_m">男性</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender_f" value="女">
                                <label class="form-check-label" for="gender_f">女性</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mobile"><span class="required">*</span>手機</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" value="" required>
                            <small id="mobileHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="email"><span class="required">*</span>電子信箱</label>
                            <input type="email" class="form-control" id="email" name="email" value="" required>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="password"><span class="required">*</span>密碼</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="至少8個字元以上" value="" minlength="8" required>
                            <small id="passwordHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">

                            <label for="address"><span class="required">*</span>地址</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="" value="" required>
                            <small id="addressHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="birthday"><span class="required">*</span>生日</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" placeholder="YYYY-MM-DD" value="" required>
                            <small id="birthdayHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            個人照片上傳
                            <div>
                                <img id="my_image" src="" alt="" width="200px">
                            </div>
                            <input type="file" class="form-control" id="my_file" name="my_file">
                        </div>
                        <!-- <div class="form-group">
                            <label for="kitchen_pic"><span class="required">*</span>廚房照片上傳(至少三張)</label>

                        </div>    -->
                        <button id="submit_btn" type="submit" class="btn btn-primary">Submit</button>
                    </form>

            </div>
            </div>
            </div>
        </div>
    </div>

</div>

<script>
    const my_image = document.querySelector('#my_image');
    const my_file = document.querySelector('#my_file');

    my_file.addEventListener('change', event => {
        const fd = new FormData;

        fd.append('my_file', my_file.files[0]);



        fetch('upload_ajax_api.php', {
                method: 'POST',
                body: fd
            })
            .then(response => response.json())
            .then(obj => {
                console.log(obj);
                my_image.setAttribute('src', 'pic/uploads/' + obj.filename);
            });
    })

    $("#submit_btn").click(function(){
                $.ajax({
                    type: "POST",
                    url: "clients_add_api.php",
                    dataType: "text",
                    data:{
                        checkme: $("#checkme").val(),
                        name: $("#name").val(),
                        gender: $("#gender_m").val(),
                        gender: $("#gender_f").val(),
                        mobile: $("#mobile").val(),
                        email: $("#email").val(),
                        password: $("#password").val(),
                        address: $("#address").val(),
                        birthday: $("#birthday").val()
                    },
                    success: function(data) {
                        window.location.href = 'clients_list.php'  
                    },
                    error: function(jqXHR) {
                        alert("發生錯誤: " + jqXHR.status);
                    }
            })
    })

</script>

<?php include __DIR__. '/_html_footer.php'; ?>
