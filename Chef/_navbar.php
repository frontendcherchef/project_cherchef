<div class="row mx-0">
    <div class="col-lg-12 px-0">
        <nav class="navbar navbar-expand-lg h-150 ">
            <div class="container">
                <div class="mr-3">
                <a class="navbar-brand m-0" href="index.php" >
                    <img src="pic/chef_logo.svg" width="110" height="35" alt="">
                </a>
                <div class="d-inline-block logo-font">後台管理系統</div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars" style="color:white"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- 左邊選單 -->
                    <!-- 未登入時-->
                    <ul class="navbar-nav mr-auto">
                    
                    <!-- 登入後-->
                     <!-- 登入後-->
            <?php if(isset($_SESSION['admin'])): ?> 
            <li class="nav-item">
              <a class="nav-link text-nowrap" href="member.php">管理成員表</a>
            </li>
            <?php endif ?>
                    <?php if(isset($_SESSION['user'])): ?> 
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                會員管理
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="clients_list.php">會員</a>
                                <a class="dropdown-item" href="clients_order.php">會員訂單</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="clients_profile_pic.php">會員圖片</a>
                            <a class="dropdown-item" href="clients_kitchen_pic.php">會員廚房圖片</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                廚師管理
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="chef.php">廚師</a>
                                <a class="dropdown-item" href="tool.php">設備管理</a>
                                <a class="dropdown-item" href="chef_photo.php">廚師圖片</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="data_food_set.php">套餐</a>
                                <a class="dropdown-item" href="data_food_style.php">料理風格</a>
                                <a class="dropdown-item" href="data_food_set_class.php">套餐大項</a>
                                <a class="dropdown-item" href="data_food_set_meal.php">套餐細項</a>
                                <a class="dropdown-item" href="data_food_set_photo.php">套餐圖片</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                料理空間管理
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="cooking_house.php">料理空間</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="cooking_house_photo.php">料理空間圖片</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                加購商品管理
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="add_utensils.php">加購餐具</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="add_utensils_photo.php">餐具圖片</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                餐廳管理
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="restaurant_list.php">餐廳</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="restaurant_photo.php">餐廳圖片</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                活動管理
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="activities.php">活動</a>
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="activities_photo.php">活動圖片</a>
                            </div>
                        </li>
                    <?php endif ?>
                    </ul>

                    <!-- 右邊選單 -->
                    <!-- 未登入時-->
                    <?php if(!isset($_SESSION['user'])): ?> 
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                        <a class="nav-link" href="login.php">管理者登入</a>
                        </li>
                    </ul>

                        <!-- 登入後-->
                    <?php else: ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown arrow-none">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-circle icon-1"></i><span class="icon-2">管理者帳號</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="member_data_edit.php">編輯個人資料</a>
                                <a class="dropdown-item" href="member_password_edit.php">修改密碼</a>
                                <a class="dropdown-item" href="worktable.php">分工表</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">登出</a>
                            </div>
                        </li>
                    <?php endif ?>
                    </ul>

                </div>
            </div>
        </nav>
    </div>
</div>