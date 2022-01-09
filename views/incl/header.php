<!doctype html>
  <html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=PATH?>css/style.css">
    <link rel="stylesheet" href="<?=PATH?>css/bootstrap.min.css">
  </head>
  <body>

    <!-- Хедер №1 -->
    <section id="header">
      <div class="container">
        <div class="row">
          <div class="col-4 d-flex justify-content-center">
            <a href="/"><img src="<?=PATH?>img/logo.jpg" style="width: 120px; height: 100px;"></a>
          </div>
          <div class="col-4 d-flex justify-content-center align-items-center" style="border-left: 1px solid #7dc8a1; border-right: 1px solid #7dc8a1;">
            <ul class="address" style="list-style-type: none;">
              <li>г. Уфа,</li>
              <li>ул. Генерала Горбатова,</li>
              <li>д. 16, строение 3</li>
            </ul>
          </div>
          <div class="col-4 d-flex justify-content-center align-items-center">
            <h6>8-800-555-35-35</h6>
          </div>
        </div>
      </div>
    </section>

    <!-- Хедер №2 -->
    <section id="nav">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-4 mb-lg-0 nav-justified">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Главная</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Услуги</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Отзывы</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Контакты</a>
              </li>
            </ul>

            <?php if(isset($_SESSION['login']) && !empty($_SESSION['login'])): ?>
            <?php if($_SESSION['is_admin'] == 1): ?>
            <a href="/master" class="btn btn-outline-success" style="margin-right:20px;">Панель управления</a>
            <a href="/exit" class="btn btn-success" style="margin-right: 100px;">Выйти</a>
            <?php else: ?>
            <a href="/profile" class="btn btn-outline-success" style="margin-right:20px;">Личный кабинет</a>
            <a href="/exit" class="btn btn-success" style="margin-right: 100px;">Выйти</a>
            <?php endif; ?>
            <?php else: ?>
            <a href="#" class="btn btn-outline-success" style="margin-right:20px;" data-bs-toggle="modal" data-bs-target="#auth">Войти</a>
            <a href="#" class="btn btn-success" style="margin-right: 100px;" data-bs-toggle="modal" data-bs-target="#reg">Регистрация</a>
            <?php endif; ?>
          </div>
        </div>
      </nav>
    </section>