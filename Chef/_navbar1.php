
   <div class="container">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <!-- 右邊選單 -->
            <!-- 未登入時-->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./">Home</a>
                </li>
            
            <!-- 登入後-->
            <?php if(isset($_SESSION['admin'])): ?> 
            <li class="nav-item">
              <a class="nav-link" href="member.php">管理成員表</a>
            </li>
            <?php endif ?>
            <?php if(isset($_SESSION['user'])): ?> 
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                管理資料表
              </a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="cooking_house.php">料理空間</a>
                <a class="dropdown-item" href="#">something</a>
                <a class="dropdown-item" href="#">Something</a>
              </div>
            <?php endif ?>
            </ul>

            <!-- 左邊選單 -->
            <!-- 未登入時-->
          <?php if(!isset($_SESSION['user'])): ?> 
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="login.php">管理者登入</a>
            </li>
           <!--  <li class="nav-item">
              <a class="nav-link" href="#">註冊</a>
            </li> -->
          </ul>
              <!-- 登入後-->
            <?php else: ?>
              <ul class="navbar-nav ml-auto">
                <li class="nav-item"></li>
                  <a class="nav-link" href="member_data_edit.php">編輯個人資料</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="member_password_edit.php">修改密碼</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">登出</a>
                </li>

              <?php endif ?>
            </li>
          </ul>
        </div>
      </nav>
      <!-- navbar -->