<footer class="content-footer footer bg-footer-theme">
    <div id="bottom-navigation">
        <div class="container">
            <div class="home-navigation-menu">
                <div class="row">
                    <div class="col-12">
                        <div class="bottom-panel nagivation-menu-wrap">
                            <ul class="sc-bottom-bar furniture-bottom-nav" id="furniture_navbar">
                                
                                <!-- Home Icon -->
                                <li class="nav-menu-icon active">
                                    <a href="index.php" class="home-icon navigation-icons active">
                                        <i class="bi bi-house-door-fill"></i> <!-- Home Icon -->
                                    </a>
                                </li>
                                
                                <!-- Add Icon -->
                                <li class="nav-menu-icon">
                                    <a href="new_product.php">
                                        <i class="bi bi-plus-square-fill"></i> <!-- Add Icon -->
                                    </a>
                                </li>
                                
                                <!-- Products Icon -->
                                <li class="nav-menu-icon">
                                    <a href="edit_product.php" class="cart-icon navigation-icons">
                                        <i class="bi bi-pencil-square"></i> <!-- Products Icon -->
                                    </a>
                                </li>
                                
                                <!-- Orders Icon -->
                                <li class="nav-menu-icon nav-notifi-icon">
                                    <a href="orders.php" class="account-icon navigation-icons">
                                        <i class="bi bi-bag-fill"></i> <!-- Orders Icon -->
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
#bottom-navigation {
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: #ffffff;
    box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
    z-index: 999;
}

.bottom-panel {
    padding: 10px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.sc-bottom-bar {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: space-around;
    width: 100%;
}

.nav-menu-icon {
    flex: 1;
    text-align: center;
}

.nav-menu-icon a {
    display: inline-block;
    padding: 5px;
    font-size: 24px; /* Adjust size of icons */
    transition: all 0.3s ease;
}

.nav-menu-icon.active a {
    color: #000000;
}

.nav-menu-icon i {
    color: #666666;
    transition: color 0.3s ease;
}

.nav-menu-icon.active i {
    color: #000000;
}

.nav-menu-icon a:hover {
    background-color: #f8f8f8;
    border-radius: 50%;
}

@media (max-width: 767px) {
    .bottom-panel {
        padding: 5px 0;
    }
}
</style>
</footer>

<!-- Add this in the <head> of your HTML to load Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
