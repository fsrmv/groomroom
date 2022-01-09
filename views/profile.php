<?php require 'incl/header.php'; ?>

<head>
  <title>Личный кабинет</title>
</head>

<!-- Обложка личного кабинета -->
<section id="home">
  <div class="row">
    <div class="col-6 home1"></div>
    <div class="col-6 home2">
      <h1 style="margin-top: 250px;" align="center">Добро пожаловать, <?=$_SESSION['fio']?>!</h1> <hr>
              <h3 align="center">
                <?php 
                if ($_SESSION['login'] != 'admin') {
                  echo 'Вы - Пользователь';
                } else {
                  echo 'Вы - Администратор';
                }
                ?>
              </h3>
    </div>
  </div>
</section>

<!-- Секция заявок авторизированного пользователя -->
<section id="my_orders" name="my_orders"><br>
    <div class="container">
      <div class="row">
        <div class="col-10">
          <h2>Мои заявки</h2>
        </div>
        <div class="col-2">
          <a href="#" class="btn btn-info" onclick="openForm()">Создать заявку</a>
        </div>
        <div id="ordersForm" style="display: none;">
          <div class="row">
            <div class="col-12">
              <form method="post" enctype="multipart/form-data"><br>
                <input type="text" name="name" placeholder="Кличка домашнего животного" required class="form-control"><br>
                <textarea name="desc" cols="30" rows="2" placeholder="Описание работы" required class="form-control"></textarea><br>
                <select name="cats" class="form-select">
                  <option disabled selected>Выберите категорию</option>
                  <?php foreach ($cats as $c) : ?>
                    <option value="<?=$c['c_id']?>"><?=$c['c_name']?></option>
                  <?php endforeach; ?>
                </select><br>
                <input type="file" name="photo" accept=".png, .jpg, .jpeg, .bmp" required class="form-control"><br>
                <input type="submit" id="add_order" name="add_order" class="btn btn-outline-info" value="Добавить">
              </form><br>
            </div>
          </div>
        </div><br><br><br>

        <?php if (!empty($myOrders)): ?>
          <form method="post">
            <div class="row">
              <div class="col-10">
                <select name="status" class="form-select">
                  <option disabled selected>Выберите статус заявки</option>
                  <option value="Новая">Новая</option>
                  <option value="Обработка данных">Обработка данных</option>
                  <option value="Услуга оказана">Услуга оказана</option>
                </select>
              </div>
              <div class="col-2">
                <button type="submit" name="sort" class="btn btn-outline-info w-70">Сортировать</button>
              </div>
            </div>
          </form><br><br>
          <div class="row">
            <?php foreach($myOrders as $o): ?>
              <div class="col-4">
                <div class="card">
                  <div class="img" style="background: url(<?=PATH?>img/<?=$o['o_img1']?>) center center no-repeat; height: 250px">
                    <div class="timestamp"><?=$o['o_timestamp']?></div>
                  </div>
                  <div class="card-body">
                    <h5>Категория: <?=$o['c_name']?></h5><hr>
                    <p><b>Кличка: </b><?=$o['o_name']?></p>
                    <p><b>Описание: </b><?=$o['o_desc']?></p>
                      <p><b>Статус: </b><?=status($o['o_status'])?></p>
                      <a href="/?view=profile&del=<?=$o['o_id']?>" class="btn btn-outline-info" onclick="return confirm('Вы действительно хотите удалить заявку?');">Удалить</a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
              <?php else: ?>
                <h2 align="center">У вас нет созданных заявок</h2>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </section><br>

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