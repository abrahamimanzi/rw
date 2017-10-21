
        <div class="card">
            <div class="body">
                <form id="" method="POST">
                    <div class="msg">Sign into your account</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons col-blue">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons col-blue">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in col-blue chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <input type="hidden" class="form-control" name="request" value="user_login">
                            <button class="btn btn-success bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <!-- <a href="">Register Now!</a> -->
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="<?=DN?>login<?=PL?>?request=resetpassword" class="col-blue">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>