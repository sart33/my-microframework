<?php if(isset($params['id'])):?>

<div class="form-group">
    <input type="hidden" class="form-control" name="token" value="<?= $_SESSION['token']?>">
</div>
<div class="form-group">
    <input type="hidden" class="form-control" name="AquariumDailyForm[id]" value="<?=$params['id'] ?? ''?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Description</label>
    <textarea class="form-control" name="AquariumDailyForm[description]" minlength="5" maxlength="5000" placeholder="Description" rows="10" required><?=$params['description']?></textarea>
</div>
    <div class="form-group"><label class="control-label" for="aquarium-daily">Temperature (C)</label>
        <input type="text" class="form-control" name="AquariumDailyForm[temperature]" pattern='^[0-9]{2}\.*?[0-9]{0,1}$' minlength="4" maxlength="5" placeholder="Temperature" required value="<?=$params['temperature']?>">
    </div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Daylight hours</label>
    <input type="text" class="form-control" name="AquariumDailyForm[daylight_hours]" pattern=[0-9]{1,2}\.*?[0-9]{0,2}$  minlength="4"maxlength="5" placeholder="Daylight hours" required value="<?=$params['daylight_hours']?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Feed</label>
    <input type="text" class="form-control" name="AquariumDailyForm[feed]" pattern=^[A-Za-zА-Яа-я0-9,\s]{3,100}$ maxlength="100" placeholder="Feed" required value="<?=$params['feed']?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Feed quantity(mg)</label>
    <input type="text" class="form-control" name="AquariumDailyForm[feed_quantity]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$ maxlength="6" placeholder="Feed quantity" required value="<?=$params['feed_quantity']?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Added micro(ml)</label>
    <input type="text" class="form-control" name="AquariumDailyForm[added_micro]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$ maxlength="6" placeholder="Added NO3" required value="<?=$params['added_micro']?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Added Fe(ml)</label>
    <input type="text" class="form-control" name="AquariumDailyForm[added_fe]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$ maxlength="6" placeholder="Added Fe" required value="<?=$params['added_fe']?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Added NO3(ml)</label>
    <input type="text" class="form-control" name="AquariumDailyForm[added_no3]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$ maxlength="6" placeholder="Added NO3" required value="<?=$params['added_no3']?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Added PO4(ml)</label>
    <input type="text" class="form-control" name="AquariumDailyForm[added_po4]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$ maxlength="6" placeholder="Added PO4" required value="<?=$params['added_po4']?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Added K(ml)</label>
    <input type="text" class="form-control" name="AquariumDailyForm[added_k]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$ maxlength="6" placeholder="Added K" required value="<?=$params['added_k']?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Added CO2(mg/l)</label>
    <input type="text" class="form-control" name="AquariumDailyForm[added_co2]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$ maxlength="6" placeholder="Added CO2" required value="<?=$params['added_co2']?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Water change, %</label>
    <input type="text" class="form-control" name="AquariumDailyForm[water_change]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$ maxlength="6" placeholder="Water change" required value="<?=$params['water_change']?>">
</div>

<div class="form-group"><label class="control-label" for="aquarium-daily">Added Cidex(mg/l)</label>
    <input type="text" class="form-control" name="AquariumDailyForm[added_cidex]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$|^null$ maxlength="6" placeholder="Added Cidex" required value="<?=$params['added_cidex'] ?? 'null'?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Test NO3(mg/l)</label>
    <input type="text" class="form-control" name="AquariumDailyForm[test_no3]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$|^null$ maxlength="6" placeholder="Test NO3" required value="<?=$params['test_no3'] ?? 'null'?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Test PO4(mg/l)</label>
    <input type="text" class="form-control" name="AquariumDailyForm[test_po4]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$|^null$ maxlength="6" placeholder="Test PO4" required value="<?=$params['test_po4'] ?? 'null'?>">
</div>
    <div class="form-group"><label class="control-label" for="aquarium-daily">Test K(mg/l)</label>
        <input type="text" class="form-control" name="AquariumDailyForm[test_k]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$|^null$ maxlength="6" placeholder="Test K" required value="<?=$params['test_k'] ?? 'null'?>">
    </div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Test pH</label>
    <input type="text" class="form-control" name="AquariumDailyForm[test_ph]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$|^null$ maxlength="6" placeholder="Test pH" required value="<?=$params['test_ph'] ?? 'null'?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Test kH</label>
    <input type="text" class="form-control" name="AquariumDailyForm[test_kh]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$|^null$ maxlength="6" placeholder="Test kH" required value="<?=$params['test_kh'] ?? 'null'?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Test gH</label>
    <input type="text" class="form-control" name="AquariumDailyForm[test_gh]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$|^null$ maxlength="6" placeholder="Test gH" required value="<?=$params['test_gh'] ?? 'null'?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">img_one</label>
    <input type="text" class="form-control" name="AquariumDailyForm[img_one]" pattern=^[[:xdigit:]]{32}.jpg$|^[[:xdigit:]]{32}.png$|^null$ maxlength="36" required value="<?=$params['img_one'] ?? 'null'?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">img_two</label>
    <input type="text" class="form-control" name="AquariumDailyForm[img_two]" pattern=^[[:xdigit:]]{32}.jpg$|^[[:xdigit:]]{32}.png$|^null$ maxlength="36" required value="<?=$params['img_two'] ?? 'null'?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">img_three</label>
    <input type="text" class="form-control" name="AquariumDailyForm[img_three]" pattern=^[[:xdigit:]]{32}.jpg$|^[[:xdigit:]]{32}.png$|^null$ maxlength="36" required value="<?=$params['img_three'] ?? 'null'?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">img_four</label>
    <input type="text" class="form-control" name="AquariumDailyForm[img_four]" pattern=^[[:xdigit:]]{32}.jpg$|^[[:xdigit:]]{32}.png$|^null$ maxlength="36" required value="<?=$params['img_four'] ?? 'null'?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">img_five</label>
    <input type="text" class="form-control" name="AquariumDailyForm[img_five]" pattern=^[[:xdigit:]]{32}.jpg$|^[[:xdigit:]]{32}.png$|^null$ maxlength="36" required value="<?=$params['img_five'] ?? 'null'?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">video_one</label>
    <input type="text" class="form-control" name="AquariumDailyForm[video_one]" pattern=^[[:xdigit:]]{32}.jpg$|^[[:xdigit:]]{32}.png$|^null$ maxlength="36" required value="<?=$params['video_one'] ?? 'null'?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">video_two</label>
    <input type="text" class="form-control" name="AquariumDailyForm[video_two]" pattern=^[[:xdigit:]]{32}.jpg$|^[[:xdigit:]]{32}.png$|^null$ maxlength="36" required value="<?=$params['video_two'] ?? 'null'?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">video_three</label>
    <input type="text" class="form-control" name="AquariumDailyForm[video_three]" pattern=^[[:xdigit:]]{32}.jpg$|^[[:xdigit:]]{32}.png$|^null$ maxlength="36" required value="<?=$params['video_three'] ?? 'null'?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">video_four</label>
    <input type="text" class="form-control" name="AquariumDailyForm[video_four]" pattern=^[[:xdigit:]]{32}.jpg$|^[[:xdigit:]]{32}.png$|^null$ maxlength="36" required value="<?=$params['video_four'] ?? 'null'?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">video_five</label>
    <input type="text" class="form-control" name="AquariumDailyForm[video_five]" pattern=^[[:xdigit:]]{32}.jpg$|^[[:xdigit:]]{32}.png$|^null$ maxlength="36" required value="<?=$params['video_five'] ?? 'null'?>">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Images</label>
    <input type="file" class="form-control-file" name="images[]" multiple="multiple" accept="image/png, image/jpeg">
</div>

<?php if(!empty($params['img_one'])):?>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="remove" id="remove">
        <label class="form-check-label" for="remove">
            Delete downloaded <a href="<?=$params['img_one']?>>" target="_blank">image</a>
        </label>
    </div>
<?php endif;?>
    <?php if(!empty($params['img_two'])):?>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="remove" id="remove">
            <label class="form-check-label" for="remove">
                Delete downloaded <a href="<?=$params['img_two']?>>" target="_blank">image 2</a>
            </label>
        </div>
    <?php endif;?>
    <?php if(!empty($params['img_three'])):?>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="remove" id="remove">
            <label class="form-check-label" for="remove">
                Delete downloaded <a href="<?=$params['img_three']?>>" target="_blank">image 3</a>
            </label>
        </div>
    <?php endif;?>
    <?php if(!empty($params['img_four'])):?>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="remove" id="remove">
            <label class="form-check-label" for="remove">
                Delete downloaded <a href="<?=$params['img_four']?>>" target="_blank">image 4</a>
            </label>
        </div>
    <?php endif;?>
    <?php if(!empty($params['img_five'])):?>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="remove" id="remove">
            <label class="form-check-label" for="remove">
                Delete downloaded <a href="<?=$params['img_five']?>>" target="_blank">image 5</a>
            </label>
        </div>
    <?php endif;?>
    <div class="form-group"><label class="control-label" for="aquarium-daily">Videos</label>
        <input type="file" class="form-control-file" name="videos[]" multiple="multiple" accept="video/mpeg4-generic, video/mp4">
    </div>
    <?php if(!empty($params['video_one'])):?>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="remove" id="remove">
            <label class="form-check-label" for="remove">
                Delete downloaded <a href="<?=$params['video_one']?>>" target="_blank">video</a>
            </label>
        </div>
    <?php endif;?>
    <?php if(!empty($params['video_two'])):?>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="remove" id="remove">
            <label class="form-check-label" for="remove">
                Delete downloaded <a href="<?=$params['video_two']?>>" target="_blank">video 2</a>
            </label>
        </div>
    <?php endif;?>
    <?php if(!empty($params['video_three'])):?>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="remove" id="remove">
            <label class="form-check-label" for="remove">
                Delete downloaded <a href="<?=$params['video_three']?>>" target="_blank">video 3</a>
            </label>
        </div>
    <?php endif;?>
    <?php if(!empty($params['video_four'])):?>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="remove" id="remove">
            <label class="form-check-label" for="remove">
                Delete downloaded <a href="<?=$params['video_four']?>>" target="_blank">video 4</a>
            </label>
        </div>
    <?php endif;?>
    <?php if(!empty($params['video_five'])):?>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="remove" id="remove">
            <label class="form-check-label" for="remove">
                Delete downloaded <a href="<?=$params['video_five']?>>" target="_blank">video 5</a>
            </label>
        </div>
    <?php endif;?>

<?php else: ?>
<div class="form-group">
    <input type="hidden" class="form-control" name="token" value="<?= $_SESSION['token']?>">
</div>

<div class="form-group"><label class="control-label" for="aquarium-daily">Description</label>
    <textarea class="form-control" name="AquariumDailyForm[description]" minlength="5" maxlength="5000" placeholder="Description" rows="7" required></textarea>
</div>

<div class="form-group"><label class="control-label" for="aquarium-daily">Temperature (C)</label>
    <input type="text" class="form-control" name="AquariumDailyForm[temperature]" pattern=^[0-9]{2}\.*?[0-9]{0,1}$|^null$' minlength="3" maxlength="5" placeholder="Temperature" required value="null">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Daylight hours</label>
    <input type="text" class="form-control" name="AquariumDailyForm[daylight_hours]" pattern=[0-9]{1,2}\.*?[0-9]{0,2}$  minlength="3" maxlength="5"  placeholder="Daylight hours" required value="8">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Feed</label>
    <input type="text" class="form-control" name="AquariumDailyForm[feed]" pattern=^[A-Za-zА-Яа-я0-9,\s]{3,100}$ maxlength="100" placeholder="Feed" required value="">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Feed quantity(mg)</label>
    <input type="text" class="form-control" name="AquariumDailyForm[feed_quantity]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$ maxlength="6" placeholder="Feed quantity" required value="0">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Added micro(ml)</label>
    <input type="text" class="form-control" name="AquariumDailyForm[added_micro]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$ maxlength="6" placeholder="Added NO3" required value="0">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Added Fe(ml)</label>
    <input type="text" class="form-control" name="AquariumDailyForm[added_fe]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$ maxlength="6" placeholder="Added Fe" required value="0">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Added NO3(mg/l)</label>
    <input type="text" class="form-control" name="AquariumDailyForm[added_no3]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$ maxlength="6" placeholder="Added NO3" required value="0">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Added PO4(mg/l)</label>
    <input type="text" class="form-control" name="AquariumDailyForm[added_po4]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$ maxlength="6" placeholder="Added PO4" required value="0">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Added K(mg/l)</label>
    <input type="text" class="form-control" name="AquariumDailyForm[added_k]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$ maxlength="6" placeholder="Added K" required value="0">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Added CO2(mg/l)</label>
    <input type="text" class="form-control" name="AquariumDailyForm[added_co2]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$ maxlength="6" placeholder="Added CO2" required value="0">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Water change, %</label>
    <input type="text" class="form-control" name="AquariumDailyForm[water_change]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$ maxlength="6" placeholder="Water change" required value="0">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Added Cidex(mg/l)</label>
    <input type="text" class="form-control" name="AquariumDailyForm[added_cidex]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$|^null$ maxlength="6" placeholder="Added Cidex" required value="null">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Test NO3(mg/l)</label>
    <input type="text" class="form-control" name="AquariumDailyForm[test_no3]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$|^null$ maxlength="6" placeholder="Test NO3" required value="null">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Test PO4(mg/l)</label>
    <input type="text" class="form-control" name="AquariumDailyForm[test_po4]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$|^null$ maxlength="6" placeholder="Test PO4" required value="null">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Test pH</label>
    <input type="text" class="form-control" name="AquariumDailyForm[test_ph]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$|^null$ maxlength="6" placeholder="Test pH" required value="null">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Test kH</label>
    <input type="text" class="form-control" name="AquariumDailyForm[test_kh]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$|^null$ maxlength="6" placeholder="Test kH" required value="null">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Test gH</label>
    <input type="text" class="form-control" name="AquariumDailyForm[test_gh]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$|^null$ maxlength="6" placeholder="Test gH" required value="null">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Test K(mg/l)</label>
    <input type="text" class="form-control" name="AquariumDailyForm[test_k]" pattern=^[0-9]{1,3}\.*?[0-9]{0,3}$|^null$ maxlength="6" placeholder="Test K" required value="null">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Images</label>
    <input type="file" class="form-control-file" name="images[]" multiple="multiple" accept="image/png, image/jpeg">
</div>
<div class="form-group"><label class="control-label" for="aquarium-daily">Videos</label>
    <input type="file" class="form-control-file" name="videos[]" multiple="multiple" accept="video/mpeg4-generic">
</div>
<?php endif; ?>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>
