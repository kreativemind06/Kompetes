
<?php if(isset($_GET['redirect'])){$action_link = 'login?redirect='.$_GET['redirect'];}else{ $action_link ='login';}?>
<section class="content login-bg" style="margin-top: 45px">
    <div class="container-fluid" style="min-height: 520px">

        <div class="col-sm-4 col-sm-offset-4 col-xs-12 col-xs-offset-0">
            <?php //echo $_GET['redirect']?>

            <div class="form-style" style="">
                <div style="z-index: 10000;">
                    <h3 style="color: #fff;margin-bottom: 20px" class="">Login Here !!!</h3>
                    <?php echo form_open(base_url($action_link)) ?>
                    <?php echo $success ?>
                        <div class="form-group">
                            <!--<label>Username</label>-->
                            <?php echo form_error('username')?>
                            <input type="text" name="username" value="<?php echo set_value('username')?>" class="container" placeholder="Username">
                        </div>


                        <div class="form-group">
                            <!--<label>Password</label>-->
                            <?php echo form_error('password')?>
                            <input type="password" name="password" class="container" placeholder="Password">
                        </div>


                        <div class="checkbox">
                            <label class="pull-left">
                                <input type="checkbox" class="checkbox">
                                Remember Me
                            </label>

                            <label class="pull-right"><a href="forgot.html" style="font-weight: 700;color: #1eb2ff">Forgot Password?</a></label>
                            <br>
                        </div>

                        <div class="form-group">
                            <!--<input type="submit" class="btn btn-success btn-lg" name="submit" style="border-radius: 0; width: 100%; background: #449D44" value="Login">-->
                            <button class="btn btn-success btn-lg" type="submit" style="border-radius: 0; width: 100%; background: #449D44">Login</button>
                        </div>

                        <div class="text-center"style="color: #f00;font-weight: 700;padding-bottom: 10px">
                            <span class="text-center">OR</span>
                        </div>

                        <div>
                            <a href="#" class="btn btn-primary btn-lg" style="width: 100%;border-radius: 0">Login with Facebook</a>
                        </div>
                    <?php echo form_close() ?>
                </div>
            </div>
            <p class="text-center" style="color: #fff;">By creating your account you agree with our <a href="#"><b>terms</b></a> of service. </p>
        </div>
    </div>

