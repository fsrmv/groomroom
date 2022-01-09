<?php require 'incl/header.php'; ?>

<head>
  <title>Главная страница</title>
</head>

<!-- Модальное окно регистрации -->
<div class="modal fade" id="reg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Регистрация</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post">
        <div class="modal-body">
          <input type="text" name="fio" placeholder="ФИО" required pattern="^^[А-Яа-яЁё\s]+$" class="form-control"><br>
          <input type="text" name="login" placeholder="Логин" required pattern="^[A-Za-z.]+$" class="form-control" onchange="checkLogin(this)">
          <small id="errorLogin" style="color: red; font-weight: 500; display: none">Логин уже занят!</small><br>
          <input type="email" name="email" placeholder="Email" required class="form-control"><br>
          <input type="password" name="pass1" placeholder="Пароль" required class="form-control"><br>
          <input type="password" name="pass2" placeholder="Повторите пароль" required class="form-control" onchange="checkPass(this)">
          <small id="errorPass" style="color: red; font-weight: 500; display: none">Пароли не совпадают!</small><br>
          <input type="checkbox" name="sogl" id="sogl" required><label for="sogl">Согласие на обработку персональных данных</label>
        </div>
        <div class="modal-footer">
          <button type="submit" name="reg" class="btn btn-outline-success">Зарегестрироватся</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Модальное окно авторизации -->
<div class="modal fade" id="auth" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Авторизация</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" onsubmit="checkUser(this, event)">
        <div class="modal-body">
          <input type="text" name="loginAuth" placeholder="Логин" required class="form-control"><br>
          <input type="password" name="passAuth" placeholder="Пароль" required class="form-control">
          <small id="errorAuth" style="color: red; font-weight: 500; display: none;">Неправильная пара логин-пароль!</small><br>
        </div>
        <div class="modal-footer">
          <button type="submit" name="auth" class="btn btn-outline-success">Войти</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Обложка сайта -->
<section id="home">
  <div class="row">
    <div class="col-6 home1"></div>
    <div class="col-6 home2">
      <h3 align="center" style="margin-top: 250px;">ГрумRoom - ножницы, пинцет, машинка - и ваш любимец как картинка!</h3><hr>
      <h4 align="center">Повседневная практика показывает, что новая модель организационной деятельности обеспечивает актуальность форм воздействия?</h4>
    </div>
  </div>
</section>

<!-- Секция с заявками  -->
<section id="orders" name="orders">
    <div class="container">
      <div class="row">
        <div class="col-10"><br>
          <h4>Выполненные заявки</h4>
          </div>
          <div class="col-2"><br>
            <h5><span class="badge bg-dark"><span id="countOrders"><?=$count[0]['count'] ?></span> выполненных заявок</span></h5>
          </div>
        </div><br>
        <div class="row">
          <?php foreach ($orders as $o):?>
          <div class="col-sm-12 col-lg-6 col-xl-4">
            <div class="card">
              <div class="img">
                <div class="cardText" style="top: 0; left: 0;">
                  <?=$o['o_timestamp'] ?>
                </div>
                <div class="img1" style="background-image: url(<?=PATH?>img/<?=$o['o_img1']?>)"></div>
                <div class="img2" style="background-image: url(<?=PATH?>img/<?=$o['o_img2']?>)"></div>
              </div>
              <div class="card-body">
                <h5 class="card-title">Категория: <?=$o['c_name'] ?></h5>
                <hr>
                <p class="card-text">Кличка животного: <?=$o['o_name'] ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
      </div>
      <br>
    </section>

<!-- Футер -->
<section id="footer">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <p>ГрумRoom&copy; 2021. Все права защищены!</p>
      </div>
    </div>
  </div>
</section>

<script src="<?=PATH?>js/bootstrap.min.js"></script>
<script src="<?=PATH?>js/jquery-3.4.1.min.js"></script>
<script src="<?=PATH?>js/main.js"></script>
</body>
</html>