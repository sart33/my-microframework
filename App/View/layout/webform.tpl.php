<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    <title>--><?php// echo $params['title']?><!--</title>-->
    <link rel="shortcat icon" type="image/png" href="/images/favicon.ico"/>
    <link rel="stylesheet" href="/css/app.css">
    <!--    <link rel="stylesheet" href="/admin/css/bootstrap-reboot.min.css">-->
    <!--    <link rel="stylesheet" href="/admin/css/bootstrap-grid.min.css">-->
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Главная</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
<!--                    <a class="nav-link" href="/create">Создать объявление</a>-->
                </li>
                <li class="nav-item">
<!--                    <a class="nav-link" href="/adm/portfolio">Портфолио</a>-->
                </li>
                <li class="nav-item">
<!--                    <a class="nav-link" href="/adm/contact">Контакты</a>-->
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="search">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Поиск" aria-label="Поиск">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
            </form>
            <ul class="navbar-nav ml-auto">
                <!-- Right Side Of Navbar -->
                <!-- Authentication Links -->
                <li class="nav-item">
                    <a class="nav-link" href="/user/login">Войти</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/register">Регистрация</a>
                </li>

            </ul>
        </div>
    </nav>

    <?php if (isset($params) && is_array($params)):?>
        <?php if (isset($params['message'])):?>
            <div class="alert alert-success alert-dismissible mt-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                    <span aria-hidden="true">&times;</span>

                </button>
                <?=$params['message']?>
            </div>
        <?php endif; ?>

    <?php elseif (isset($params) && is_object($params)): ?>
        <?php if (isset($params->message)):?>
            <div class="alert alert-success alert-dismissible mt-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                    <span aria-hidden="true">&times;</span>

                </button>
                <?=$params->message?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?='%content%'?>
</div>

</body>
</html>
