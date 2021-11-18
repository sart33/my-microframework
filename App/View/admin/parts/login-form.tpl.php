<div class="form-group">
    <input type="hidden" class="form-control" name="token" value="<?= $_SESSION['token']?>">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="LoginForm[login]" pattern=^[A-Za-zА-Яа-я0-9]{3,16}$ placeholder="Login" required value="">
</div>

<div class="form-group">
    <input type="text" class="form-control" name="LoginForm[password]" pattern=^[^\s]{6,32}$ placeholder="Password" required value="">
</div>

<div class="checkbox">
    <label for="LoginForm-agree">
        <input type="checkbox" id="LoginForm-remember" name="LoginForm[remember]" value="1">
        Remember me
    </label>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Sign In</button>
    </div>
