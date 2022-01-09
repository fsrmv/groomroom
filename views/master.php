<?php require 'incl/header.php'; ?>

<head>
  <title>Панель управления</title>
</head>

<!-- Обложка админпанели -->
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
</section><br>

<!-- Секция управления заявками и категориями -->
<section id="myOrders">
    <div class="container">
      <div class="row">
        <div class="col-10">
          <h2>Управление категориями</h2>
        </div>
        <div class="col-2">
          <a href="#" class="btn btn-info w-100" onclick="event.preventDefault();$('div#addCat').slideToggle(300);">Добавить категорию</a>
        </div>
      </div><br>
      <div id="addCat" style="display: none;">
        <div class="row">
          <div class="col-12">
            <form method="post">
              <input type="text" name="nameCat" placeholder="Название категории" required class="form-control"><br>
              <button type="submit" name="addCat" class="btn btn-outline-info">Добавить категорию</button>
            </form>
          </div>
        </div><br><br>
      </div>
      <div class="row">
        <div class="col-12">
          <?php foreach($cats as $c): ?>
            <div class="row d-flex align-items-center">
              <div class="col-10"><?=$c['c_name']?></div>
              <div class="col-2">
                <a href="/?view=master&delCat=<?=$c['c_id']?>" onclick="return confirm('Вы действительно хотите удалить категорию?')" class="btn btn-outline-info w-100">Удалить</a>
              </div>
            </div><br>
          <?php endforeach; ?>
        </div>
      </div><br><br>

      <div class="row">
        <div class="col-12">
          <h2>Все заявки</h2>
        </div>
      </div><br>

      <form method="post">
        <div class="row">
          <div class="col-10">
            <select name="status" class="form-select">
              <option disabled selected>Укажите статус</option>
              <option value="Новая">Новая</option>
              <option value="Обработка данных">Обработка данных</option>
              <option value="Услуга оказана">Услуга оказана</option>
            </select>
          </div>
          <div class="col-2">
            <button type="submit" class="btn btn-info w-100" name="sort">Сортировать</button>
          </div>
        </div>
      </form><br><br>
      <?php if(!empty($myOrders)): ?>

        <div class="row">
          <?php foreach($myOrders as $o): ?>
            <div class="col-12 mb-3">
              <div class="card">
                <div class="row">
                  <div class="col-3">
                    <div class="img_master" style="background: url(<?=PATH?>img/<?=$o['o_img1']?>) center center no-repeat; height: 250px;"><div class="timestamp_master"><?=$o['o_timestamp']?></div></div>
                  </div>
                  <div class="col-9">
                    <div class="card-body">
                      <h5 class="card-title">Категория: <?=$o['c_name']?></h5>
                      <p><b>Кличка: </b><?=$o['o_name']?></p>
                      <p><b>Описание: </b><?=$o['o_desc']?></p>
                        <?php if ($o['o_status'] == 'Новая'): ?>
                          <select class="form-select w-auto" onchange="changeStatus(this, <?=$o['o_id']?>)">
                            <option disabled selected>Новая</option>
                            <option value="Обработка данных">Обработка данных</option>
                            <option value="Услуга оказана">Услуга оказана</option>
                          </select><br>
                          <div id="formComment<?=$o['o_id']?>" style="display: none;">
                            <form method="post">
                              <div class="row">
                                <div class="col-9">
                                  <input type="text" name="comment" placeholder="Комментарий" class="form-control" required>
                                  <input type="hidden" name="idOrder" value="<?=$o['o_id']?>">
                                </div>
                                <div class="col-3">
                                  <button type="submit" name="changeStatus" class="btn btn-outline-info w-100">Сменить статус</button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div id="formPhoto<?=$o['o_id']?>" style="display: none;">
                            <form method="post" enctype="multipart/form-data">
                              <div class="row">
                                <div class="col-9">
                                  <input type="file" name="photo2" class="form-control" required>
                                  <input type="hidden" name="idOrder" value="<?=$o['o_id']?>">
                                </div>
                                <div class="col-3">
                                  <button type="submit" name="changeStatus" class="btn btn-outline-info w-100">Сменить статус</button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <?php else: ?>
                            <p><b>Статус: </b><?=status($o['o_status'])?></p>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
              <?php else: ?>
                <div align="center"><h2>Нет заявки с таким статусом</h2></div>
              </div>
            <?php endif; ?>
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