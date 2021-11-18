<div class="row">
    <div class="col-12">
        <div class="card mt-4 mb-4">
            <div class="card-header">
                <h1><?=$params['title']?></h1>
                <?php  ?>
            </div>
            <div class="card-body">
                <img src="/images/source/<?=$params['img_one']?>" alt="" class="img-fluid">
                <p class="mt-3 mb-0"><?=$params['body']?></p>
            </div>
            <div class="card-footer">
                <div class="clearfix">
                        <span class="float-left">

                        </span>
<!--                    <a href="/edit/--><?php //echo $params->id?><!--" class="btn btn-dark float-right">Редактировать</a>-->
                    <!-- Форма для удаления категории -->
<!--                    <form action="#"method="post" onsubmit="return confirm('Удалить этот пост?')"  class="d-line">-->
<!---->
<!--                        <input type="submit" class="btn btn-danger" value="Удалить">-->
<!--                    </form>-->
                </div>
            </div>
        </div>
    </div>
</div>
