<div class="row">
    <div class="col-12">
        <div class="card mt-4 mb-4">
            <div class="card-header">
                <h1><?='Data for: ' . $params['created_at']?></h1>
                <?php  ?>
            </div>
            <div class="card-body">


                <img src="/image/<?=$params['img_one']?>"  height="auto" width="100%" alt="" class="img-fluid">



                <p class="mt-3 mb-0"><h2>Description</h2><br><?=$params['description']?></p>
                <?php if($params['temperature'] != null):?>
                    <p class="mt-3 mb-0"><b>Temperature:</b> <?=$params['temperature']?> (C)</p>
                <?php endif; ?>
                <p class="mt-3 mb-0"><b>Daylight hours:</b> <?=$params['daylight_hours']?></p>
                <p class="mt-3 mb-0"><b>Feed:</b> <?=$params['feed']?></p>
                <p class="mt-3 mb-0"><b>Feed quantity:</b> <?=$params['feed_quantity']?> (mg/day)</p>

                <p class="mt-3 mb-0"><b>Added Micro:</b> <?=$params['added_micro']?> (ml)</p>
                <p class="mt-3 mb-0"><b>Added Fe:</b> <?=$params['added_fe']?> (ml)</p>
                <p class="mt-3 mb-0"><b>Added NO3:</b> <?=$params['added_no3']?> (ml)</p>
                <p class="mt-3 mb-0"><b>Added PO4:</b> <?=$params['added_po4']?> (ml)</p>
                <?php if($params['added_k'] != 0):?>
                <p class="mt-3 mb-0"><b>Added K:</></b> <?=$params['added_k']?> (ml)</p>
                <?php endif; ?>
                <p class="mt-3 mb-0"><b>Added CO2:</b> <?=$params['added_co2']?> (mg/l)</p>
                <?php if($params['added_cidex'] !== null):?>
                <p style="color: darkred" class="mt-3 mb-0"><b>Added Cidex:</b> <?=$params['added_cidex']?> (ml)</p>
                <?php endif; ?>
<!--                --><?php //if($params['water_change'] != 0):?>
                <p style="color: navy" class="mt-3 mb-0"><b>Water change:</b> <?=$params['water_change']?> %</p>
<!--                --><?php //endif; ?>

                <?php if($params['added_con_k'] != 0):?>
                    <p class="mt-3 mb-0"><b>Added K:</></b> <?=$params['added_con_k']?> (mg/l)</p>
                <?php endif; ?>
                                <?php if($params['added_con_no3'] != 0):?>
                    <p class="mt-3 mb-0"><b>Added NO3:</></b> <?=$params['added_con_no3']?> (mg/l)</p>
                <?php endif; ?>
                                <?php if($params['added_con_po4'] != 0):?>
                    <p class="mt-3 mb-0"><b>Added PO4:</></b> <?=$params['added_con_po4']?> (mg/l)</p>
                <?php endif; ?>
                                <?php if($params['added_con_fe'] != 0):?>
                    <p class="mt-3 mb-0"><b>Added Fe:</></b> <?=$params['added_con_fe']?> (mg/l)</p>
                <?php endif; ?>
                                <?php if($params['added_con_mg'] != 0):?>
                    <p class="mt-3 mb-0"><b>Added Mg:</></b> <?=$params['added_con_mg']?> (mg/l)</p>
                <?php endif; ?>
                                <?php if($params['added_con_mn'] != 0):?>
                    <p class="mt-3 mb-0"><b>Added Mn:</></b> <?=$params['added_con_mn']?> (mg/l)</p>
                <?php endif; ?>
                                <?php if($params['added_con_cu'] != 0):?>
                    <p class="mt-3 mb-0"><b>Added Cu:</></b> <?=$params['added_con_cu']?> (mg/l)</p>
                <?php endif; ?>
                                <?php if($params['added_con_mo'] != 0):?>
                    <p class="mt-3 mb-0"><b>Added Mo:</></b> <?=$params['added_con_mo']?> (mg/l)</p>
                <?php endif; ?>
                                <?php if($params['added_con_b'] != 0):?>
                    <p class="mt-3 mb-0"><b>Added B:</></b> <?=$params['added_con_b']?> (mg/l)</p>
                <?php endif; ?>
                                <?php if($params['added_con_zn'] != 0):?>
                    <p class="mt-3 mb-0"><b>Added Zn:</></b> <?=$params['added_con_zn']?> (mg/l)</p>
                <?php endif; ?>

                <?php if($params['added_con_glutaraldehyde'] != 0):?>
                    <p style="color: darkred" class="mt-3 mb-0"><b>Added Glutaraldehyd:</></b> <?=$params['added_con_glutaraldehyde']?> (mg/l)</p>
                <?php endif; ?>

                <br>

                <?php if($params['test_no3'] !== null):?>
                <p class="mt-3 mb-0"><b>Test NO3:</b> <?=$params['test_no3']?> (mg/l)</p>
                <?php endif; ?>
                <?php if($params['test_po4'] !== null):?>
                <p class="mt-3 mb-0"><b>Test PO4:</b> <?=$params['test_po4']?> (mg/l)</p>
                <?php endif; ?>
                <?php if($params['test_ph'] !== null):?>
                <p class="mt-3 mb-0"><b>Test pH:</b> <?=$params['test_ph']?></p>
                <?php endif; ?>
                <?php if($params['test_kh'] !== null):?>
                <p class="mt-3 mb-0"><b>Test kH:</b> <?=$params['test_kh']?></p>
                <?php endif; ?>
                <?php if($params['test_gh'] !== null):?>
                <p class="mt-3 mb-0"><b>Test gH:</b> <?=$params['test_gh']?></p>
                <?php endif; ?>
                <?php if($params['test_k'] !== null):?>
                <p class="mt-3 mb-0"><b>Test K:</b> <?=$params['test_k']?> (mg/l)</p>
                <?php endif; ?>

                <div class="col-12 mb-0">
                    <?php if(isset($params['img_two'])): ?>
                        <div class="col-6 mb-0">
                            <img src="/image/<?=$params['img_two']?>"  height="auto" width="100%" alt="" class="img-fluid">
                        </div>
                    <?php endif;?>
                    <?php if(isset($params['img_three'])): ?>
                        <div class="col-6 mb-0">
                            <img src="/image/<?=$params['img_three']?>"  height="auto" width="100%" alt="" class="img-fluid">
                        </div>
                    <?php endif;?>
                    <?php if(isset($params['img_four'])): ?>
                        <div class="col-6 mb-0">
                            <img src="/image/<?=$params['img_four']?>"  height="auto" width="100%" alt="" class="img-fluid">
                        </div>
                        <?php endif;?>
                    <?php if(isset($params['img_five'])): ?>
                        <div class="col-6 mb-0">
                            <img src="/image/<?=$params['img_five']?>"  height="auto" width="100%" alt="" class="img-fluid">
                        </div>
                    <?php endif;?>
                </div>

                <div class="col-12 mb-0">
                    <?php if(isset($params['video_one'])): ?>
                        <div class="col-6 mb-0">
                            <video controls width="100%" height="100%" poster="/img/poster-video.png" preload="none">
                                <source src="/video/<?=$params['video_one']?>" type="video/mp4">
<!--                                <source src="/examples/media/martynko.webm" type="video/webm">-->
<!--                                <source src="/examples/media/martynko.ogv" type="video/ogg">-->
                            </video>
                        </div>
                    <?php endif;?>
                    <?php if(isset($params['video_two'])): ?>
                        <div class="col-6 mb-0">
                            <video controls width="100%" height="100%" poster="/img/poster-video.png" preload="none">
                                <source src="/video/<?=$params['video_two']?>" type="video/mp4">
<!--                                <source src="/examples/media/martynko.webm" type="video/webm">-->
<!--                                <source src="/examples/media/martynko.ogv" type="video/ogg">-->
                            </video>
                        </div>
                    <?php endif;?>
                    <?php if(isset($params['video_three'])): ?>
                        <div class="col-6 mb-0">
                            <video controls width="100%" height="100%" poster="/img/poster-video.png" preload="none">
                                <source src="/video/<?=$params['video_three']?>" type="video/mp4">
<!--                                <source src="/examples/media/martynko.webm" type="video/webm">-->
<!--                                <source src="/examples/media/martynko.ogv" type="video/ogg">-->
                            </video>
                        </div>
                    <?php endif;?>
                    <?php if(isset($params['video_four'])): ?>
                        <div class="col-6 mb-0">
                            <video controls width="100%" height="100%" poster="/img/poster-video.png" preload="none">
                                <source src="/video/<?=$params['video_four']?>" type="video/mp4">
<!--                                <source src="/examples/media/martynko.webm" type="video/webm">-->
<!--                                <source src="/examples/media/martynko.ogv" type="video/ogg">-->
                            </video>
                        </div>
                    <?php endif;?>
                    <?php if(isset($params['video_five'])): ?>
                        <div class="col-6 mb-0">
                            <video controls width="100%" height="100%" poster="/img/poster-video.png" preload="none">
                                <source src="/video/<?=$params['video_five']?>" type="video/mp4">
<!--                                <source src="/examples/media/martynko.webm" type="video/webm">-->
<!--                                <source src="/examples/media/martynko.ogv" type="video/ogg">-->
                            </video>
                        </div>
                    <?php endif;?>

                </div>

            </div>
            <div class="card-footer">
                <div class="clearfix">
                        <span class="float-left">

                        </span>
                    <a href="/edit/<?php echo $params['id']?>" class="btn btn-dark float-right">Edit</a>

                    <form action="/delete/<?=$params['id']?>" method="post" onsubmit="return confirm('Удалить этот пост?')" class="d-line">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="token" value="<?=$_SESSION['token']?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="AquariumDeleteForm[id]" value="<?=$params['id'] ?? ''?>">
                        </div>
                        <div class="form-group">
                        <input type="submit" class="btn btn-danger" value="Delete">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
