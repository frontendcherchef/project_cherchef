<?php
require __DIR__ . '/connect.php';

//抓tool的checkbox的value跟名字配對
$t_sql = "SELECT * FROM `tool` ORDER BY `tool`.`sid`";
$t_stmt = $pdo->query($t_sql);
$all_tool = $t_stmt->fetchAll(PDO::FETCH_ASSOC);

//抓area的checkbox的value跟名字配對
$a_sql = "SELECT * FROM `taiwan_area` ORDER BY `sid`";
$a_stmt = $pdo->query($a_sql);
$all_area = $a_stmt->fetchAll(PDO::FETCH_ASSOC);

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

$sql = "SELECT * FROM chef WHERE sid=$sid";

$stmt = $pdo->query($sql);
if ($stmt->rowCount() == 0) {
    header('Location: chef.php');
    exit;
}
$row = $stmt->fetch(PDO::FETCH_ASSOC);


?>
<?php include __DIR__ . '/_html_header.php'; ?>
<?php include __DIR__ . '/_navbar.php'; ?>
<style>
.form-group small {
    color: red !important;
}

.mini-radio {
    vertical-align: middle;
    width: 20px;
    height: 20px;
}

.mini-label {
    height: 20px;
    line-height: 20px
}
</style>
<div class="container">
    <!-- 上排按鈕 -->
    <br>
    <div class="center_div">
        <a href="chef.php">
            <button type="button" class="btn btn-warning  col-md-3 ">
                <-回到資料表</button> </a> </div> <div class="row">
                    <div class="col-lg-6 center_div">
                        <div id="info_bar" class="alert alert-success" role="alert"
                            style="transform:translate(-50%,-50%); position:fixed; top:50%; left:50%; display:none; z-index:15">
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">修改資料</h5>
                                <form name="form1" method="post" onsubmit="return checkForm();">
                                    <input type="hidden" name="checkme" value="check123">
                                    <input type="hidden" name="sid" value="<?= $row['sid'] ?>">
                                    <div class="form-group">
                                        <label for="name">姓名</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder=""
                                            value="<?= $row['name'] ?>">

                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder=""
                                            value="<?= $row['email'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">密碼</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="" value="<?= $row['password'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">手機</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder=""
                                            value="<?= $row['mobile'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="birthday">生日</label>
                                        <input type="date" class="form-control" id="birthday" name="birthday"
                                            placeholder="" value="<?= $row['birthday'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">頭銜</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder=""
                                            value="<?= $row['title'] ?>">

                                    </div>

                                    <div class="form-group">
                                        <label for="info">個人簡介</label>
                                        <textarea class="form-control" id="info" name="info" placeholder="" cols="30"
                                            rows="3"><?= $row['info'] ?></textarea>

                                    </div>
                                    <div class="form-group">
                                        <label for="experience">工作經歷</label>
                                        <textarea class="form-control" id="experience" name="experience" placeholder=""
                                            cols="30" rows="3"><?= $row['experience'] ?></textarea>

                                    </div>
                                    <div class="form-group">
                                        <h6>服務範圍</h6>
                                        <div class="d-flex flex-wrap justify-content-between">
                                        <?php $chef_areas=explode(",",$row['area']) ?>
                                            <?php foreach ($all_area as $area) : ?>
                                            <div style="display:inline-block">
                                                <input class="mini-radio " 
                                                <?php foreach ($chef_areas as $chef_area): ?><?=$chef_area==$area['sid']? 'checked':"";endforeach ?>type="checkbox"
                                                    id="area_<?= $area['area_code'] ?>" name="area[]"
                                                    value="<?= $area['area_code'] ?>">
                                                <label for="area_<?= $area['area_code'] ?>"
                                                    class="form-label mini-label"><?= $area['area_name'] ?></label>
                                            </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="info">服務範圍</label>
                                        <input type="text" class="form-control" id="area" name="area" placeholder=""
                                            value="<?= $row['area'] ?>"> -->

                                        <div class="form-group">
                                            <h6>目前是否在餐廳任職</h6>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-3 d-flex">
                                                        <label for="yesr" class="mini-label">是 &nbsp</label>
                                                        <input type="radio" class="form-control mini-radio" id="yesr"
                                                            name="restaurant" value="1"
                                                            <?= $row['restaurant'] == 1 ? 'checked' : " " ?>>

                                                    </div>
                                                    <div class="col-3 d-flex">
                                                        <label for="nor" class="mini-label">否 &nbsp</label>
                                                        <input type="radio" class="form-control mini-radio" id="nor"
                                                            name="restaurant" value="0"
                                                            <?= $row['restaurant'] == 0 ? 'checked' : " " ?>>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h6>是否擁有個人工作室</h6>
                                            <div class="row">
                                                <div class="col-3 d-flex">
                                                    <label for="yesk" class="mini-label">是 &nbsp</label>
                                                    <input type="radio" class="form-control mini-radio" id="yesk"
                                                        name="own_kitchen" value="1"
                                                        <?= $row['own_kitchen'] == 1 ? 'checked' : " " ?>>
                                                </div>
                                                <div class="col-3 d-flex">
                                                    <label for="nok" class="mini-label ">否 &nbsp</label>
                                                    <input type="radio" class="form-control mini-radio" id="nok"
                                                        name="own_kitchen" value="0"
                                                        <?= $row['own_kitchen'] == 0 ? 'checked' : " " ?>>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h6>設備需求</h6><br>
                                            <div class="d-flex flex-wrap justify-content-between">
                                                <?php $require_tools=explode(",",$row['tool']) ?>
                                                <?php foreach ($all_tool as $tool) :?>
                                                <div style="display:inline-block">
                                                    <input class="mini-radio"
                                                        <?php foreach ($require_tools as $require_tool): ?><?=$require_tool==$tool['sid']? 'checked':"";endforeach ?>
                                                        type="checkbox" id="tool_<?= $tool['sid'] ?>" name="tool[]"
                                                        value="<?= $tool['sid'] ?>">
                                                    <label for="tool_<?= $tool['sid'] ?>" class="form-label mini-label">
                                                        <?= $tool['tool_name'] ?></label>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="note">注意事項</label>
                                            <textarea class="form-control" id="note" name="note" placeholder=""
                                                cols="30" rows="3"><?= $row['note'] ?></textarea>
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
    'name', 'email', 'password', 'mobile', 'birthday', 'title', 'info', 'experience', 'area[]', 'restaurant',
    'own_kitchen', 'tool[]', 'note'
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

        fetch('chef_data_edit_api.php', {
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
<?php include __DIR__ . '/_html_footer.php'; ?>