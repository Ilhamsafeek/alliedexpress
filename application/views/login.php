
<body class="signin">


<section>
    <div class="panel panel-signin">
        <div class="panel-body">
            <div class="logo text-center">
                <img src="<?php echo base_url('assets/images/icon.png'); ?>" alt="Logo" width="35%"></div>
            <br>
            <h4 class="text-center mb5">Connecting Hearts</h4>
            <p class="text-center">Sign in to your account</p>

            <div class="mb30"></div>
            <?php echo validation_errors(); ?>  

                <?php if(!empty($errors)) {
                        echo $errors;
                } ?>
            <form action="<?php echo base_url('auth/login') ?>" method="post">
                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" placeholder="Username" name="email"></div><!-- input-group -->
                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" placeholder="Password" name="password"></div><!-- input-group -->

                <div class="clearfix">
                    <div class="pull-left">
                        <div class="ckbox ckbox-primary mt10">
                            <input type="checkbox" id="rememberMe" value="1"><label for="rememberMe">Remember
                                Me</label>
                        </div>
                    </div>
                 
                </div>
           

        </div><!-- panel-body -->
        <div class="panel-footer">
           <button type="submit" class="btn btn-primary btn-block">Sign in</button>
        </div><!-- panel-footer -->
        </form>
    </div><!-- panel -->

</section>