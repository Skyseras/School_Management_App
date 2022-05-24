<?php
require APPROOT . '/views/includes/head.php';
?>
<div id="section-landing">
    <?php
    require APPROOT . '/views/includes/navigation.php';
    ?>

    <div>
        <div class="banner-content">
            <div class="container">
                <div style="height:100px;">
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6 d-flex justify-content-center align-item-center">
                        <div class="col-md-9">
                            <form action="<?php echo URLROOT; ?>/users/login" method="POST">
                                <!-- Username input -->
                                <div class="form-outline mb-4">
                                    <span class="invalidFeedback">
                                        <?php echo $data['usernameError']; ?>
                                    </span>
                                    <input type="text" placeholder="Username *" name="username" id="form2Example1" class="form-control" />
                                    <label class="form-label text-light" for="form2Example1">Username</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <span class="invalidFeedback">
                                        <?php echo $data['passwordError']; ?>
                                    </span>
                                    <input type="password" placeholder="Password *" name="password" id="form2Example2" class="form-control" />
                                    <label class="form-label text-light" for="form2Example2">Password</label>
                                </div>

                                <!-- 2 column grid layout for inline styling -->
                                <div class="row mb-4">
                                    <div class="col d-flex justify-content-center">
                                        <!-- Checkbox -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                            <label class="form-check-label text-light" for="form2Example31"> Remember me </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <div class="text-center">
                                    <button type="submit" value="submit" class="btn btn-style" style="padding: 10px 46px 12px;">Log in</button>
                                </div>
                                <!-- Register buttons -->
                                <div class="text-center mt-3">
                                    <p class="text-light">Not a member? <a class="text-info" href="<?php echo URLROOT; ?>/users/register">Create an account!</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 right-banner-2 text-end position-relative mt-md-0 mt-5">
                        <div class="sub-banner-image mx-auto">
                            <img src="<?php echo URLROOT; ?>/public/img/banner.png" style="width: 80%;" class="img-fluid position-relative" alt=" ">
                        </div>
                        <div class="banner-style-1 position-absolute">
                            <div class="banner-style-2 position-relative text-white">
                                <h4>Let's Log In</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>