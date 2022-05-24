<nav class="top-nav">
    <div style="margin: 0; padding: 0; position: absolute; left: 4%; top: 2%;">
        <a class="navbar-brand" href="<?php echo URLROOT; ?>/index">
            <img src="<?php echo URLROOT; ?>/public/img/logow.png" alt="logo" width="200" class="d-inline-block align-text-top">
        </a>
    </div>
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/index">Home</a>
        </li>
        <li type="button" class="btn btn-style" style="padding: 5px 36px 6px;">
            <?php if (isset($_SESSION['user_id'])) : ?>
                <a href="<?php echo URLROOT; ?>/users/logout">Log out</a>
            <?php else : ?>
                <a href="<?php echo URLROOT; ?>/users/login">Login</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>