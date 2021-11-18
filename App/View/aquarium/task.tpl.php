
    <?php if(isset($params['danger'][0])):?>
    <?php foreach ($params['danger'] as $danger):?>
       <h2 style="color: darkred"><?=$danger?></h2>
    <?php endforeach; ?>
    <?php endif; ?>
    <?php foreach ($params as $param):?>
    <?php if(is_array($param)):?>
            <h2 style="color: darkred"><?=$param[0]?></h2>
    <?php elseif(is_string($param)):?>
        <p><?=$param?></p>
    <?php endif?>
    <?php endforeach; ?>