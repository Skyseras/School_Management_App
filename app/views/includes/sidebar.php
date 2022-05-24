<!-- Sidebar -->
<div class="bg-yellow bodyh" id="sidebar-wrapper">
    <div class="text-center py-3">
        <a class="m-0" href="<?php echo URLROOT; ?>/index">
            <img src="<?php echo URLROOT; ?>/public/img/logo.png" alt="logo" width="200" class="d-inline-block align-text-top">
        </a>
    </div>
    <div class="text-center">
        <img class="mt-4 w-50 rounded-full" style="height: 115px;" src="<?php echo URLROOT; ?>/public/img/visuals/profil.png" alt="profil image">
        <h6 class="mt-3 fw-bold"><?php echo $_SESSION['username']; ?></h6>
        <p class="ps mt-1 text-info">Admin</p>
    </div>
    <div class="text-left list-group list-group-flush my-3">
        <a href="<?php echo URLROOT; ?>/pages/home" class="px-4 py-1 list-group-item-action bg-transparent second-text"><button class="w-100  btn1 text-black fs-6 fw-bold <?php if (basename($_SERVER['REQUEST_URI']) == 'home') echo 'standard'; ?>" type="submit"><img class="mleft pb-1" src="<?php echo URLROOT; ?>/public/img/icons/Home.svg" alt="">&nbsp;&nbsp;Home</button></a>
        <a href="<?php echo URLROOT; ?>/pages/students" class="px-4 py-1 list-group-item-action bg-transparent second-text fw-bold"><button class="w-100 btn1 text-black fs-6 fw-bold <?php if (basename($_SERVER['REQUEST_URI']) == 'students') echo 'standard'; ?>" type="submit"><img class="mleft pb-1" src="<?php echo URLROOT; ?>/public/img/icons/students.svg" alt="">&nbsp;&nbsp;Students</button></a>
        <a href="<?php echo URLROOT; ?>/pages/teachers" class="px-4 py-1 list-group-item-action bg-transparent second-text fw-bold"><button class="w-100 btn1 text-black fs-6 fw-bold <?php if (basename($_SERVER['REQUEST_URI']) == 'teachers') echo 'standard'; ?>" type="submit"><img class="mleft px-1 pb-1" src="<?php echo URLROOT; ?>/public/img/icons/Course.svg" alt="">&nbsp;&nbsp;Teachers</button></a>
        <a href="<?php echo URLROOT; ?>/pages/parents" class="px-4 py-1 list-group-item-action bg-transparent second-text fw-bold"><button class="w-100 btn1 text-black fs-6 fw-bold <?php if (basename($_SERVER['REQUEST_URI']) == 'parents') echo 'standard'; ?>" type="submit"><img class="mleft px-1 pb-1" src="<?php echo URLROOT; ?>/public/img/icons/parents.svg" style="width: 25px;" alt="">&nbsp;Parents</button></a>
        <a href="<?php echo URLROOT; ?>/pages/admins" class="px-4 py-1 list-group-item-action bg-transparent second-text fw-bold"><button class="w-100 btn1 text-black fs-6 fw-bold <?php if (basename($_SERVER['REQUEST_URI']) == 'admins') echo 'standard'; ?>" type="submit"><img class="mleft px-1 pb-1" src="<?php echo URLROOT; ?>/public/img/icons/Report.svg" alt="">&nbsp;&nbsp;Admins</button></a>
    </div>
    <div class="text-left list-group list-group-flush my-4">
        <a href="<?php echo URLROOT; ?>/users/logout" class="px-4 py-1 list-group-item-action bg-transparent second-text fw-bold"><button class="w-100 btn1 text-black fs-6 fw-bold pleft" type="submit">Logout&nbsp;&nbsp;&nbsp;&nbsp;<img class="pb-1" src="<?php echo URLROOT; ?>/public/img/icons/logout.svg" alt=""></button></a>
    </div>
</div>
<!-- /#sidebar-wrapper -->