<style>
    a{
        color: white;
    }
    .navbar {
        background:#0E1D27;
    }
    nav.navbar a:hover, nav.navbar a:active {
    color: #ffc107;
    }
    /* .container .dropdown .dropdown-menu
    {
    color: #fff !important;
    background-color: #0E1D27;
    border-color: #0E1D27;
    }
    .container .dropdown .dropdown-menu a
    {
    color: #fff;
    }
    .container .dropdown .dropdown-menu a:hover
    {
    color: #ffc107;
    background-color: #25435B;
    } */
</style>
<div class="row mx-0">
    <div class="col-lg-12 px-0">
        <nav class="navbar navbar-expand-lg h-150 ">
            <div class="container">
                <a class="navbar-brand" href="#">CherChef</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto ">
                        <li class="nav-item text-white active">
                            <a class="nav-link " href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">登出</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                套餐管理
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="data_food_set.php">套餐</a>
                                <a class="dropdown-item" href="data_food_style.php">料理風格</a>
                                <a class="dropdown-item" href="data_food_set_class.php">套餐大項</a>
                                <a class="dropdown-item" href="data_food_set_meal.php">套餐細項</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">餐點圖片</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</div>