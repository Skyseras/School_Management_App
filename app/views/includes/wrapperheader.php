<header class="bg-yellow" style="height:15vh;">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 d-flex justify-content-between">
        <div class="align-items-center">
            <img src="<?php echo URLROOT; ?>/public/img/icons/arrow.svg" id="menu-toggle" alt="switch">
        </div>
        <div class="d-flex search-container">
            <form action="<?= basename($_SERVER['REQUEST_URI']) == 'students'? URLROOT.'/Pages/students':'' ?>" method="GET">
                <input type="text" placeholder="Search.." value="<?= $_GET['w']??''?>" name="w">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
            <img class="px-2" src="<?php echo URLROOT; ?>/public/img/icons/notbell.svg" alt="notification bell">
        </div>
    </nav>
</header>