<html>
  <head>
    <title>DolganKUL</title>
    <link rel="shortcut icon" type="image/x-icon" href="img\icon.ico">
    <link rel="stylesheet" href="style1.css">
    <meta charset="utf-8">
  </head>
  <body>
    <?php
    $host='localhost';
    $name='root';
    $pass='';
    $base='dolganbd-ot';

    $conn=mysqli_connect($host,$name,$pass,$base);
    ?> 
    <header>
      <div class="shapka" align="left">
      <ul class="dropdown">
        <li class="logotype"><a href="index.php"><img src="img/logo.png" height="100%"></a>
        <ul >
          <li><a class="shapka-dropdown-logotype-a" href="#">dolganSOBAKAMAIL.RU</a></li>
          <li><a class="shapka-dropdown-logotype-a" href="#">пр. Ленина, 1, Якутск, Респ. Саха (Якутия)</a></li>
          <li><a class="shapka-dropdown-logotype-a" href="#">+79243678225</a></li>
        </ul>
        </li>
      </ul>
    </div>
      <div align="center">
        <a href="dol.php" class="button_1622692227046"> Долганы</a>
        <a href="uslugi.php" class="button_1622692227046"> Услуги</a>
        <a href="ob-sv.php" class="button_1622692227046"> Обратная связь</a>
      </div>
    </header>
    <main>
      <?
      if ($_POST['otzivi']=='Отправить')
        {
          $name=$_POST['name'];
          $text=$_POST['text'];

          $query = "INSERT INTO `otzivi`(`name`,`text`) VALUES ('$name','$text')";
            $result=mysqli_query($conn,$query);
            echo "<br><br> Отзыв отправлен,<a href='ob-sv-ot.php'>Посмотреть</a><br><br>";
        }
        else{
      ?>
      <div class="otzivi">
        <?
        $query="SELECT * FROM `otzivi`";
        $result=mysqli_query($conn,$query);

        while($row=mysqli_fetch_array($result))
        {
        ?>
        <h2 class="otzivi-h1"> <?echo $row[1];?> </h2>
        <h3 class="otzivi-h3"> <?echo $row[2];?> </h3>
        <?
        }
        ?>
        <table class="otzivi-table">
            <form action="ob-sv-ot.php" method="post">
              <tr>
               <td><label>Введите имя:</label></td>
               <td><input type="text"name='name'></td>
              </tr>
              <tr>
               <td><label>Введите отзыв:</label></td> 
               <td><textarea rows="10" cols="45" name="text"></textarea></td>
              </tr>
              </tr>
               <tr height="5px"></tr> 
               <td><input type="submit" name="otzivi" value="Отправить"></td>
              </form>
        </table>
      </div>
      <?
      }
      ?>
    </main>
    <footer>
      <div class="footer-info">
        <a href="index.php" class="button-footer"> Долганы</a>
        <a href="uslugi.php" class="button-footer"> Услуги</a>
        <a href="ob-sv.php" class="button-footer"> Обратная связь</a>
      </div>
      <div class="footer-social">
        <a href="" class="footer-social-a"><img src="img/inst.png" height="20%"> Instagram</a>
        <br>
        <a href="" class="footer-social-a"><img src="img/yt.png" height="20%"> YouTube</a>
        <br>
        <a href="" class="footer-social-a"><img src="img/vk.png" height="20%"> Vkонтакте</a>    
      </div>
    </footer> 
  </body>
</html>