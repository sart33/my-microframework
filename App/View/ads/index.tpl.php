<h1><?=$params['title']?></h1>
<div class="row">
    <div class="col-12 mb-4">
        <?php if (isset($params['paginate']) && $params['totalPages']): ?>
            <ul class="pagination">
                <?php if(isset($params['sort'])):?>
                    <?php if(isset($params['order'])):?>
                        <li><a href="/page/1<?='?sort=' . $params['sort'] . '&order=' . $params['order']?>">First</a></li>
                        <li class="<?php if($params['paginate'] <= 1){ echo 'disabled'; } ?>">
                            <a href="<?php if($params['paginate'] <= 1){ echo '#'; } else { echo "/page/" . ($params['paginate'] - 1) . '?sort=' . $params['sort'] . '&order=' . $params['order']; } ?>">Prev</a>
                        </li>
                        <li class="<?php if($params['paginate'] >= $params['totalPages']){ echo 'disabled'; } ?>">
                            <a href="<?php if($params['paginate'] >= $params['totalPages']){ echo '#'; } else { echo "/page/".($params['paginate'] + 1) . '?sort=' . $params['sort'] . '&order=' . $params['order']; } ?>">Next</a>
                        </li>
                        <li><a href="/page/<?php echo $params['totalPages'] . '?sort=' . $params['sort'] . '&order=' . $params['order']; ?>">Last</a></li>
                    <?php else: ?>
                        <li><a href="/page/1<?='?sort=' . $params['sort'] . '&order=desc'?>">First</a></li>
                        <li class="<?php if($params['paginate'] <= 1){ echo 'disabled'; } ?>">
                            <a href="<?php if($params['paginate'] <= 1){ echo '#'; } else { echo "/page/" . ($params['paginate'] - 1) . '?sort=' . $params['sort'] . '&order=desc'; } ?>">Prev</a>
                        </li>
                        <li class="<?php if($params['paginate'] >= $params['totalPages']){ echo 'disabled'; } ?>">
                            <a href="<?php if($params['paginate'] >= $params['totalPages']){ echo '#'; } else { echo "/page/".($params['paginate'] + 1) . '?sort=' . $params['sort'] . '&order=desc'; } ?>">Next</a>
                        </li>
                        <li><a href="/page/<?php echo $params['totalPages'] . '?sort=' . $params['sort'] . '&order=' . $params['order']; ?>">Last</a></li>
                    <?php endif; ?>
                <?php else: ?>
                    <li><a href="/page/1">First</a></li>
                    <li class="<?php if($params['paginate'] <= 1){ echo 'disabled'; } ?>">
                        <a href="<?php if($params['paginate'] <= 1){ echo '#'; } else { echo "/page/".($params['paginate'] - 1); } ?>">Prev</a>
                    </li>
                    <li class="<?php if($params['paginate'] >= $params['totalPages']){ echo 'disabled'; } ?>">
                        <a href="<?php if($params['paginate'] >= $params['totalPages']){ echo '#'; } else { echo "/page/".($params['paginate'] + 1); } ?>">Next</a>
                    </li>
                    <li><a href="/page/<?php echo $params['totalPages']; ?>">Last</a></li>

                <?php endif; ?>
            </ul>
            <ul class="sorting">Sort by price
                <li><a href="?sort=price&order=desc">desc</a></li>
                <li><a href="?sort=price&order=asc">asc</a></li>
            </ul>
            <ul class="sorting">Sort by date
                <li><a href="?sort=created_at&order=desc">desc</a></li>
                <li><a href="?sort=created_at&order=asc">asc</a></li>
            </ul>
        <?php endif; ?>
    </div>
    <?php foreach ($params['result'] as $ad):?>
        <div class="col-6 mb-4">
            <div class="card">
                <div class="card-header"><h3><?=$ad['title']?></h3></div>
                <div class="card-body">
                    <img src="/image/<?=$ad['img_one']?>" alt="" class="img-fluid">
                    <p class="mt-3 mb-0"><?=$ad['body']?></p>
                    <p class="mt-3 mb-0"><?=$ad['id']?></p></div>
                <div class="card-footer">
                    <div class="clearfix">
                        <span class="float-left"><?=$ad['price']?></span>
                        <a href="/view/<?=$ad['id']?>" class="btn btn-dark float-right">Просмотр Объявления</a>
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
                <li><a href="/page/1<?='?sort=' . $params['sort'] . '&order=' . $params['order']?>">First</a></li>
                <li class="<?php if($params['paginate'] <= 1){ echo 'disabled'; } ?>">
                    <a href="<?php if($params['paginate'] <= 1){ echo '#'; } else { echo "/page/" . ($params['paginate'] - 1) . '?sort=' . $params['sort'] . '&order=' . $params['order']; } ?>">Prev</a>
                </li>
                <li class="<?php if($params['paginate'] >= $params['totalPages']){ echo 'disabled'; } ?>">
                    <a href="<?php if($params['paginate'] >= $params['totalPages']){ echo '#'; } else { echo "/page/".($params['paginate'] + 1) . '?sort=' . $params['sort'] . '&order=' . $params['order']; } ?>">Next</a>
                </li>
        <li><a href="/page/<?php echo $params['totalPages'] . '?sort=' . $params['sort'] . '&order=' . $params['order']; ?>">Last</a></li>
        <?php else: ?>
                <li><a href="/page/1<?='?sort=' . $params['sort'] . '&order=desc'?>">First</a></li>
                <li class="<?php if($params['paginate'] <= 1){ echo 'disabled'; } ?>">
                    <a href="<?php if($params['paginate'] <= 1){ echo '#'; } else { echo "/page/" . ($params['paginate'] - 1) . '?sort=' . $params['sort'] . '&order=desc'; } ?>">Prev</a>
                </li>
                <li class="<?php if($params['paginate'] >= $params['totalPages']){ echo 'disabled'; } ?>">
                    <a href="<?php if($params['paginate'] >= $params['totalPages']){ echo '#'; } else { echo "/page/".($params['paginate'] + 1) . '?sort=' . $params['sort'] . '&order=desc'; } ?>">Next</a>
                </li>
                <li><a href="/page/<?php echo $params['totalPages'] . '?sort=' . $params['sort'] . '&order=' . $params['order']; ?>">Last</a></li>
        <?php endif; ?>
        <?php else: ?>
                <li><a href="/page/1">First</a></li>
                <li class="<?php if($params['paginate'] <= 1){ echo 'disabled'; } ?>">
                    <a href="<?php if($params['paginate'] <= 1){ echo '#'; } else { echo "/page/".($params['paginate'] - 1); } ?>">Prev</a>
                </li>
                <li class="<?php if($params['paginate'] >= $params['totalPages']){ echo 'disabled'; } ?>">
                    <a href="<?php if($params['paginate'] >= $params['totalPages']){ echo '#'; } else { echo "/page/".($params['paginate'] + 1); } ?>">Next</a>
                </li>
                <li><a href="/page/<?php echo $params['totalPages']; ?>">Last</a></li>

        <?php endif; ?>
    </ul>
    <?php endif; ?>
    </div>
</div>