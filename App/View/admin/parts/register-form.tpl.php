<div class="form-group">
    <input type="hidden" class="form-control" name="token" value="<?= $_SESSION['token']?>">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="SignupForm[login]" pattern=^[A-Za-zА-Яа-я0-9]{3,16}$ placeholder="Login (letters and digits)" required value="">
</div>

<!--<div class="form-group">-->
<!--    <input type="text" class="form-control" name="SignupForm[phone]" pattern=^[+]{1}38\s[0]{1}[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{2}$ placeholder="+38___-___-__-__" value="">-->
<!--</div>-->
<div class="form-group">
    <input type="text" class="form-control" name="SignupForm[email]" pattern=^\b(\w+?\b[\.|-]?\b\w*?\b@\w+?\.\b[a-z]{2,32}\b\.?[a-z]{0,32})$ placeholder="E-mail" required value="">
</div>

<div class="checkbox">
    <label for="register-policy-agree">
        <input type="checkbox" id="register-policy-agree" name="SignupForm[agree]" value="1">
        I agree with the terms.
    </label>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </div>
