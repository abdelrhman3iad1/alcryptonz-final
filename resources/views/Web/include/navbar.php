<nav class="navbar nav-me bg-dark navbar-light navbar-expand-sm one-nav">
    <div class="container-fluid">
        <a href="index.php" class="navbar-brand" style="font-weight:bold;font-size:19px;color:white">
            <img src="images/Alcryptonz_White_transparent.png" alt="Alcryptonz-logo" style="width:250px;height:44px;">
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#menu" style="border:0; background-color:black;padding:10px 0 0">
            <i class="fas fa-bars navbar-toggler-icon" style="color:white !important;font-size:27px !important;"></i>
        </button>
        <div class="collapse navbar-collapse" id="menu" style="z-index: 566311111111111 !important;">
            <div class="search-bar">
                <div class="container d-flex justify-content-center">
                    <form action="search-result.php" method="POST">
                        <input type="search" name="search-post" class="navbar-search py-1 px-3" placeholder="Search This Blog">
                        <button class="ser-btn px-2 py-1" type="submit" name="searched">Search</button>
                    </form>
                </div>
            </div>
            <ul class="navbar-nav ml-auto" style="z-index: 566311111111111;">
                <li class="nav-item">
                    <a href="index.php" class="nav-link spec2">HOME</a>
                </li>
                <li class="nav-item">
                    <a href="aboutus.php" class="nav-link spec2">ABOUT US</a>
                </li>
                <li class="nav-item">
                    <a href="#ar" class="nav-link spec2">ARTICLES</a>
                </li>
                <li class="nav-item">
                    <a href="#te" class="nav-link spec2">TEAM</a>
                </li>
                <li class="nav-item">
                    <a href="alcrypto-news.php" class="nav-link spec2">ALCRYPTO NEWS</a>
                </li>
                <li class="nav-item">
                    <a href="#fo" class="nav-link spec2">CONTACT US</a>
                </li>
            </ul>
            <!-- Language Toggle -->
            <div class="dropdown ml-3">
                <button class="btn btn-outline-light btn-sm dropdown-toggle" type="button" id="languageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Language
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languageDropdown">
                    <a class="dropdown-item" href="#">English</a>
                    <a class="dropdown-item" href="#">عربي</a>
                </div>
            </div>
        </div>
    </div>
</nav>
