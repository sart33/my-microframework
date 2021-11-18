<div class="form-group">
    <input type="hidden" class="form-control" name="token" value="<?= $_SESSION['token']?>">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="WebForm[name]" pattern=^[A-Za-zА-Яа-я]{3,16}$ placeholder="Имя" required value="">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="WebForm[surname]" placeholder="Фамилия" required value="">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="WebForm[phone]" pattern=^[+]{1}38\s[0]{1}[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{2}$ placeholder="+38 ___-___-__-__" required value="">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="WebForm[email]" pattern=^\b(\w+?\b[\.|-]?\b\w*?\b@\w+?\.\b[a-z]{2,32}\b\.?[a-z]{0,32})$ placeholder="E-mail" required value="">
</div>
<div class="form-group" id="select-list">
    <label for="select-list">Выберите:</label><br>
    <select id="select-list" name="WebForm[select]" size="4" multiple>
        <option value="1">Один</option>
        <option value="2">Два</option>
        <option value="3">Три</option>
        <option value="4">Четыре</option>
    </select>
</div>
<div class="form-group">
    <input type="file" class="form-control-file" name="images[]" multiple="multiple" accept="image/png, image/jpeg">
</div>
<div class="checkbox">
    <label for="webform-agree">
        <input type="checkbox" id="webform-agree" name="WebForm[agree]" value="1">
        С условиями согласен
    </label>

<div class="form-group">
    <a href="#" id="btn-success" class="btn btn-success">Далее</a>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary"">Далее</button>
</div>
