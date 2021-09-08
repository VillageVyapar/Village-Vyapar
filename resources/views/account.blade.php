@include('categorymenu');
<!-- catg header banner section -->
<section id="aa-catg-head-banner">
    <div class="container">
        <div class="aa-catg-head-banner-content">
            <h2 align='center' style='padding:20px;height:auto;border:1px solid red;'>ACCOUNT PAGE
            </h2>
        </div>
    </div>
</section>
<!-- / catg header banner section -->
<script>
function forgotpass() {
    var fg = document.getElementById('forgot');
    if (fg.style.display == 'none') {
        fg.style.display = 'block';
    } else {
        fg.style.display = 'none';

    }
}
</script>
<!-- Cart view section -->
<section id="aa-myaccount">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-myaccount-area">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="aa-myaccount-login">
                                <h4>Login Form</h4>
                                <?php $random=rand(100000,999999);?>
                                <form action="" method="post" class="aa-login-form">
                                    {{ @csrf_field() }}
                                    <label for="">Email address<span>*</span></label>
                                    <input type="email" name='email' required placeholder="Enter Email Id">
                                    <label for="">Password<span>*</span></label>
                                    <input type="password" name='password' required placeholder="Enter Password">
                                    <label for="" style='float:left;'>Capcha Code <span>* &nbsp;</span></label>
                                    <input type="number" style='float:left;width:150px;font-size:25px' name="capcha"
                                        readonly value='{{$random}}' />
                                    <input type="number" required
                                        style='float:;width:150px;margin-left:50px;font-size:25px;'
                                        name="cuscapcha" /><br><br>
                                    <button type="submit" class="aa-browse-btn">Login</button>
                                    <!-- <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label> -->
                                    <p class="aa-lost-password"><a style='cursor:pointer;color:blue;padding-left:30px;'
                                            onClick='forgotpass()'><b>Lost your password ?</b></a></p>
                                </form><br><br><br>
                                <div id="forgot" style='display:none'>
                                    <h4>Forgot Password</h4>
                                    <form action="/forgot_pass" method="post" class="aa-login-form">
                                        {{ @csrf_field() }}
                                        <label for="">Email address<span>*</span></label>
                                        <input type="email" name='email' required placeholder="Enter Email Id">
                                        <button type="submit" class="aa-browse-btn">Send</button><br><br><br><br>
                                        <!-- <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label> -->
                                        <b>Note : </b>
                                        <p> Password will be send in email id and if you want to reset your password
                                            then also send link of change password link !!</p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="aa-myaccount-register">
                                <h4>New Register Form</h4>
                                <form action="reg" enctype="multipart/form-data" method='post' class="aa-login-form"
                                    id="regForm">
                                    {{@csrf_field()}}

                                    <label for="">Full Name<span>*</span></label>
                                    <input type="text" required name='regname' placeholder="Enter Name"><br>

                                    <label for="">Email<span>*</span></label>
                                    <input type="email" required name='regemail' placeholder="Enter Email Address"><br>

                                    <label for="">Password<span>*</span></label>
                                    <input type="password" required name='regpassword' placeholder="Password"><br>

                                    <label for="">Confirm Password<span>*</span></label>
                                    <input type="password" required name='confirm_password'
                                        placeholder="Confirm Password"><br>

                                    <label for="">Phone No<span>*</span></label>
                                    <input type="text" required name='regphone' placeholder="Enter Phone No"><br>

                                    <label for="">Address<span>*</span></label>
                                    <input type="text" required name='regaddress' placeholder="Enter Address"><br>

                                    <label for="">District<span>*</span></label>
                                    <input type="text" required name='regdistrict' placeholder="Enter District"><br>

                                    <label for="">Village<span>*</span></label>
                                    <input type="text" required name='regvillage' placeholder="Enter Village"><br>

                                    <label for="">Pincode<span>*</span></label>
                                    <input type="text" required name='regpincode' placeholder="Enter Pincode"><br>

                                    <button type="submit" name='register' class="aa-browse-btn">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Cart view section -->


@include('footer');
<!-- Login Modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Login or Register</h4>
                <form class="aa-login-form" action="">
                    <label for="">Username or Email address<span>*</span></label>
                    <input type="text" placeholder="Username or email">
                    <label for="">Password<span>*</span></label>
                    <input type="password" placeholder="Password">
                    <button class="aa-browse-btn" type="submit">Login</button>
                    <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me
                    </label>
                    <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                    <div class="aa-register-now">
                        Don't have an account?<a href="account.html">Register now!</a>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>



<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>
<!-- SmartMenus jQuery plugin -->
<script type="text/javascript" src="js/jquery.smartmenus.js"></script>
<!-- SmartMenus jQuery Bootstrap Addon -->
<script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>
<!-- To Slider JS -->
<script src="js/sequence.js"></script>
<script src="js/sequence-theme.modern-slide-in.js"></script>
<!-- Product view slider -->
<script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
<script type="text/javascript" src="js/jquery.simpleLens.js"></script>
<!-- slick slider -->
<script type="text/javascript" src="js/slick.js"></script>
<!-- Price picker slider -->
<script type="text/javascript" src="js/nouislider.js"></script>
<!-- Custom js -->
<script src="js/custom.js"></script>


</body>

</html>