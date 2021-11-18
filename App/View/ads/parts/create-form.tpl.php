<div class="form-group">
    <input type="hidden" class="form-control" name="token" value="<?= $_SESSION['token']?>">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="CreateForm[title]" maxlength="200" placeholder="Заголовок" required value="">
</div>
<div class="form-group">
    <textarea class="form-control" name="CreateForm[body]" maxlength="1000" placeholder="Описание" rows="7" required></textarea>
</div>
<div class="form-group">
    <input type="text" class="form-control" name="CreateForm[price]" maxlength="8" placeholder="Стоимость" required value="">
</div>
<div class="form-group">
    <input type="file" class="form-control-file" name="images[]" multiple="multiple" accept="image/png, image/jpeg">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>