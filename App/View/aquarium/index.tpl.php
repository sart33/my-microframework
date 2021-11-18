<h1><?=$title?></h1>
<div class="row">
    <div class="col-12 mb-4">
        <?php if (isset($params['paginate']) && $params['totalPages']): ?>
            <ul class="pagination">
                <?php if(isset($params['sort'])):?>
                    <?php if(isset($params['order'])):?>
                        <li class="page-item">
                            <a class="page-link" href="/page/1<?='?sort=' . $params['sort'] . '&order=' . $params['order']?>">First</a>
                        </li>
                        <li class="page-item <?php if($params['paginate'] <= 1){ echo 'disabled'; } ?>">
                            <a class="page-link" href="<?php if($params['paginate'] <= 1){ echo '#'; } else { echo "/page/" . ($params['paginate'] - 1) . '?sort=' . $params['sort'] . '&order=' . $params['order']; } ?>">Prev</a>
                        </li>
                        <li class="page-item <?php if($params['paginate'] >= $params['totalPages']){ echo 'disabled'; } ?>">
                            <a class="page-link" href="<?php if($params['paginate'] >= $params['totalPages']){ echo '#'; } else { echo "/page/".($params['paginate'] + 1) . '?sort=' . $params['sort'] . '&order=' . $params['order']; } ?>">Next</a>
                        </li>
                        <li class="page-item">

                        <a class="page-link" href="/page/<?php echo $params['totalPages'] . '?sort=' . $params['sort'] . '&order=' . $params['order']; ?>">Last</a>
                        </li>
                    <?php else: ?>
                        <li class="page-item">

                        <a class="page-link" href="/page/1<?='?sort=' . $params['sort'] . '&order=desc'?>">First</a>
                        </li>
                        <li class="page-item <?php if($params['paginate'] <= 1){ echo 'disabled'; } ?>">
                            <a class="page-link" href="<?php if($params['paginate'] <= 1){ echo '#'; } else { echo "/page/" . ($params['paginate'] - 1) . '?sort=' . $params['sort'] . '&order=desc'; } ?>">Prev</a>
                        </li>
                        <li class="page-item <?php if($params['paginate'] >= $params['totalPages']){ echo 'disabled'; } ?>">
                            <a class="page-link" href="<?php if($params['paginate'] >= $params['totalPages']){ echo '#'; } else { echo "/page/".($params['paginate'] + 1) . '?sort=' . $params['sort'] . '&order=desc'; } ?>">Next</a>
                        </li>
                        <li class="page-item">

                        <a class="page-link" href="/page/<?php echo $params['totalPages'] . '?sort=' . $params['sort'] . '&order=' . $params['order']; ?>">Last</a>
                        </li>
                    <?php endif; ?>
                <?php else: ?>
                    <li class="page-item">
                    <a class="page-link" href="/page/1">First</a></li>
                    <li class="page-item <?php if($params['paginate'] <= 1){ echo 'disabled'; } ?>">
                        <a class="page-link" href="<?php if($params['paginate'] <= 1){ echo '#'; } else { echo "/page/".($params['paginate'] - 1); } ?>">Prev</a>
                    </li>
                    <li class="page-item <?php if($params['paginate'] >= $params['totalPages']){ echo 'disabled'; } ?>">
                        <a class="page-link" href="<?php if($params['paginate'] >= $params['totalPages']){ echo '#'; } else { echo "/page/".($params['paginate'] + 1); } ?>">Next</a>
                    </li>
                    <li class="page-item">
                    <a class="page-link" href="/page/<?php echo $params['totalPages']; ?>">Last</a>
                    </li>

                <?php endif; ?>
            </ul>
<!--            <ul class="sorting">Sort by price-->
<!--                <li><a href="?sort=price&order=desc">desc</a></li>-->
<!--                <li><a href="?sort=price&order=asc">asc</a></li>-->
<!--            </ul>-->
            <ul class="sorting">Sort by date
                <li><a href="?sort=created_at&order=desc">desc</a></li>
                <li><a href="?sort=created_at&order=asc">asc</a></li>
            </ul>
        <?php endif; ?>
    </div>
    <?php foreach ($params['result'] as $ad):?>
        <div class="col-6 mb-4">
            <div class="card">
                <div class="card-header"><h3>Data: <?=$ad['created_at']?></h3></div>
                <div class="card-body">
<!--                   --><?php //$tempVar = dirname(__DIR__, 3) . '/public/image/teaser/teaser-' . $ad['img_one']; ?>
                    <?php if(file_exists(dirname(__DIR__, 3) . '/public/image/teaser/teaser-' . $ad['img_one'])):?>

                    <img src="/image/teaser/<?='teaser-' . $ad['img_one']?>" width="100%" alt="" class="img-fluid">
                    <?php else: ?>
                    <img src="/image/<?=$ad['img_one']?>" alt="" class="img-fluid">
                    <?php endif; ?>
                    <p class="mt-3 mb-0"><?=$ad['description']?></p>

</div>
                <div class="card-footer">
                    <div class="clearfix">
                        <?php if($ad['water_change'] > 0): ?>
                        <span class="float-left"><?= 'Water change: <b>' . $ad['water_change'] . '%</b>'?></span>
                        <?php endif; ?>
                        <a href="/view/<?=$ad['id']?>" class="btn btn-dark float-right">Просмотр Данных</a>
                    </div>
                </div>
            </div>
        </div>


    <?php endforeach; ?>
    <div class="col-12 mb-4">
        <?php if (isset($params['paginate']) && $params['totalPages']): ?>
            <ul class="pagination">
                <?php if(isset($params['sort'])):?>
                    <?php if(isset($params['order'])):?>
                        <li>
                            <a class="page-link" href="/page/1<?='?sort=' . $params['sort'] . '&order=' . $params['order']?>">First</a>
                        </li>
                        <li class="page-item <?php if($params['paginate'] <= 1){ echo 'disabled'; } ?>">
                            <a class="page-link" href="<?php if($params['paginate'] <= 1){ echo '#'; } else { echo "/page/" . ($params['paginate'] - 1) . '?sort=' . $params['sort'] . '&order=' . $params['order']; } ?>">Prev</a>
                        </li>
                        <li class="page-item <?php if($params['paginate'] >= $params['totalPages']){ echo 'disabled'; } ?>">
                            <a class="page-link" href="<?php if($params['paginate'] >= $params['totalPages']){ echo '#'; } else { echo "/page/".($params['paginate'] + 1) . '?sort=' . $params['sort'] . '&order=' . $params['order']; } ?>">Next</a>
                        </li>
                        <li>
                            <a class="page-link" href="/page/<?php echo $params['totalPages'] . '?sort=' . $params['sort'] . '&order=' . $params['order']; ?>">Last</a></li>
                    <?php else: ?>
                        <li>
                            <a class="page-link" href="/page/1<?='?sort=' . $params['sort'] . '&order=desc'?>">First</a></li>
                        <li class="page-item <?php if($params['paginate'] <= 1){ echo 'disabled'; } ?>">
                            <a class="page-link" href="<?php if($params['paginate'] <= 1){ echo '#'; } else { echo "/page/" . ($params['paginate'] - 1) . '?sort=' . $params['sort'] . '&order=desc'; } ?>">Prev</a>
                        </li>
                        <li class="page-item <?php if($params['paginate'] >= $params['totalPages']){ echo 'disabled'; } ?>">
                            <a class="page-link" href="<?php if($params['paginate'] >= $params['totalPages']){ echo '#'; } else { echo "/page/".($params['paginate'] + 1) . '?sort=' . $params['sort'] . '&order=desc'; } ?>">Next</a>
                        </li>
                        <li>
                            <a class="page-link" href="/page/<?php echo $params['totalPages'] . '?sort=' . $params['sort'] . '&order=' . $params['order']; ?>">Last</a></li>
                    <?php endif; ?>
                <?php else: ?>
                    <li>
                        <a class="page-link" href="/page/1">First</a>
                    </li>
                    <li class="page-item <?php if($params['paginate'] <= 1){ echo 'disabled'; } ?>">
                        <a class="page-link" href="<?php if($params['paginate'] <= 1){ echo '#'; } else { echo "/page/".($params['paginate'] - 1); } ?>">Prev</a>
                    </li>
                    <li class="page-item <?php if($params['paginate'] >= $params['totalPages']){ echo 'disabled'; } ?>">
                        <a class="page-link" href="<?php if($params['paginate'] >= $params['totalPages']){ echo '#'; } else { echo "/page/".($params['paginate'] + 1); } ?>">Next</a>
                    </li>
                    <li>
                        <a class="page-link" href="/page/<?php echo $params['totalPages']; ?>">Last</a>
                    </li>

                <?php endif; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>