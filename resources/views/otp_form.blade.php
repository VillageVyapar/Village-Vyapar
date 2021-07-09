<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<style>
.card {
    width: 350px;
    padding: 10px;
    border-radius: 20px;
    background: #fff;
    border: none;
    height: 400px;
    position: relative
}

.container {
    height: 100vh
}

body {
    background: #eee
}

.mobile-text {
    color: #989696b8;
    font-size: 15px
}

.form-control {
    margin-right: 12px
}

.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #ff8880;
    outline: 0;
    box-shadow: none
}

.cursor {
    cursor: pointer
}
</style>
<form method='post' action='verify_acc'>
    {{ @csrf_field(); }}
    <div class="d-flex justify-content-center align-items-center container">
        <div class="card py-5 px-3">
            <h5 class="m-0" style='text-align:center;'>E-mail verification</h5>
            <hr style='border-top:2px solid red;'><span class="mobile-text">Enter the code we just send on your
                Email-id <b class="text-danger">{{$email}}</b></span>
            <div class="d-flex flex-row mt-5"><input type="number" max='999999' min=0 name='otp' class="form-control"
                    autofocus=""></div><br>

            <input type='submit' value='Verify & Processing'
                style='border-radius:10%;color:black;width:305px;text-align:center;' />
            <div class="text-center mt-5"><span class="d-block mobile-text">Don't receive the code?</span><span
                    class="font-weight-bold text-danger cursor">Resend</span></div>
        </div>
    </div>
</form>