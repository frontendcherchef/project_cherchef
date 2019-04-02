<?php 
require __DIR__ . '/connect.php';
$page_name = 'worktable';
?>


<?php include __DIR__ . '/_html_header.php' ?>
<?php include __DIR__ . '/_navbar.php' ?>
<br>
<div class="container pt-3">
<div class="form_data_font_style" style="color:orange;">工作分工表</div>



        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">17吳朋謙</th>
                    <th scope="col">18許晉瑜</th>
                    <th scope="col">14蔡士民</th>
                    <th scope="col">11陳文韻</th>
                    <th scope="col">29張雅婷</th>
                    <th scope="col">08李佳穎</th>
                    <th scope="col">03林家如</th>
                </tr>
            </thead>
            <tbody class="text-wrap">
                 <tr class="form_data_font_style">
                    <td>CRUD功能</td>
                    <td>會員.廚房照片</td>
                    <td>廚師<br>
                        廚房設備</td>
                    <td>餐點<br>(套餐、風格、細項)</td>
                    <td>管理員帳號<br>
                        料理空間</td>
                    <td>餐具</td>
                    <td>餐廳</td>
                    <td>活動</td>
                </tr>
                 <tr class="form_data_font_style">
                    <td>照片功能(包含CRUD)</td>
                    <td>會員照片<br>
                        廚房照片</td>
                    <td>廚師照片</td>
                    <td>餐點照片</td>
                    <td>空間照片</td>
                    <td>餐具照片</td>
                    <td>餐廳照片</td>
                    <td>活動照片</td>
                </tr>
                <tr class="form_data_font_style">
                    <td>資料表</td>
                    <td>clients<br>
                        clients_profile_pics<br>
                        clients_kitchen_pics<br>
                        clients_order<br></td>
                    <td>chef<br>
                        chef_photo<br>
                        tool<br>
                        tool_photo<br></td>
                    <td>food_set<br>
                        food_style<br> 
                        food_set_class<br> 
                        food_set_meal<br>
                        food_set_photo<br> </td>
                    <td>team member<br>
                        cooking_house <br>
                        cooking_house_photo</td>
                    <td>add_utensils <br>
                         add_utensils_photo </td>
                    <td>restaurant<br>
                       restaurant_photo </td>
                    <td>activities<br>   
                        activities_photo<br> 
                        act_client<br> 
                        act_lottery<br> </td>
                </tr>
                <tr class="form_data_font_style">
                    <td>額外</td>
                    <td>CSS,RWD</td>
                    <td>首頁CSS,跳轉、警示script
                        光箱,RWD,Checkbox資料抓取</td>
                    <td>CSS主要設計與統一,RWD</td>
                    <td>主要網站架構,debug,彙整 <br>
                        光箱,資料驗證</td>
                    <td>首頁Logo動畫CSS<br>
                          </td>
                    <td>CSS,RWD</td>
                    <td>工作分配,彙整</td>
                </tr>
             </tbody>
             </div>
        <script>
        
        </script>
        <?php include __DIR__ . '/_html_footer.php';  ?> 