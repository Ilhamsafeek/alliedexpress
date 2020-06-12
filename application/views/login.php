<div class="auth-wrapper">
    <div class="container-fluid h-100">
        <div class="row flex-row h-100 bg-white">
            <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                <div class="lavalite-bg" style="background-image: url('<?php echo base_url('assets/img/auth/login-bg.jpg'); ?>')">
                    <div class="lavalite-overlay"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                <div class="authentication-form mx-auto">
                    <div class="logo-centered">
                        <a href="#"><img src="<?php echo base_url('assets/src/img/brand.png'); ?>" alt="" width="200px"></a>
                    </div>
                    <h3>Sign In</h3>
                    <?php echo validation_errors(); ?>

                    <?php if (!empty($errors)) {
                        echo $errors;
                    } ?>
                    <form action="<?php echo base_url('auth/login') ?>" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email" required="" value="">
                            <i class="ik ik-user"></i>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="" value="">
                            <i class="ik ik-lock"></i>
                        </div>
                        <div class="row">
                            <div class="col text-left">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                    <span class="custom-control-label">&nbsp;Remember Me</span>
                                </label>
                            </div>
                            <!-- <div class="col text-right">
                                <a href="forgot-password.html">Forgot Password ?</a>
                            </div> -->
                        </div>
                        <div class="sign-btn text-center">
                            <button class="btn btn-theme">Sign In</button>
                        </div>
                    </form>
                    <div class="register">
                        <!-- <p>Don't have an account? <a href="register.html">Create an account</a></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>