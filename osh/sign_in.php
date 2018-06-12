<?php 
$connection = mysqli_connect("localhost", "root", "", "osh");
mysqli_set_charset($connection,'utf8');

if (isset($_POST['sign_in'])) {

  
  $result = mysqli_query($connection, "SELECT count(id),login FROM users WHERE login='".$_POST['login']."' AND pass='".md5($_POST['pass'])."'");
 while ($row =mysqli_fetch_row($result)) {

 	if ($row[0] == 1) {
 		 session_start();
 		$_SESSION['login'] = $row[1];
 		$error = '<span class="error_s">Вы усрешно вошли в свой акк</span>';
 		header('location:index.php');

  }

  else{

  	$error = '<span class="error_s">Логин или пароль введён не верно!</span>';

  }
  }
}

if(isset($_GET['exit'])) {
  session_destroy();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link  href="css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<script type="js/javascript.js"></script>
</head>
<body>

                            <!-- AD -->




														<!-- HEADER -->
	<header class="header">
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
			 data-toggle="collapse"
			 data-target="#bs-example-navbar-collapse-1"
			 aria-expanded="false">
			 <span class="sr-only">Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<span class="logo"><img src="img/logo.png"></span>
		</div>

        <div class="collapse navbar-collapse"
         id="bs-example-navbar-collapse-1">
		<div class="navbar-form navbar-right">
    <?php  

      if(isset($_SESSION['login'])) {

    ?>
			<div class="user"><? echo $_SESSION['login'] ?></div>
      <a href="session_destroy.php?id=1" class="btn btn-primary" onclick="exit()" id="ex">Выйти</a>

    <?
    }
    else {
      ?>
        <a href="sign_in.php" class="btn btn-primary" id="login">Войти</a>
      <a href="chek_in.php" class="btn btn-success" id="reg">Зарегистрироваться</a>
    <?
    }
    ?>
 		</div>
</div>
	</div>
	</nav>
</header>

																<!-- SECTION2 -->
<section class="section1" style="margin-top: 50px">
	<nav class="navbar navbar-default">
 		<div class="container">
    	<div class="row">
    	<form class="navbar-form" action="search.php" method="POST">
    			<div class="col-md-3 col-sm-4 col-xs-6 bot">
    				<div class="input-group">
      				<input type="text" class="form-control" placeholder="Поиск" name="search">
      				<span class="input-group-btn">
        				<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
      				</span>
    				</div>
    			</div>
    			<div class="col-md-2 col-sm-2 col-xs-6 bot">
    				<select  class="form-control" name="aa">
    					<option value=1>Нашёл</option>
    					<option value=2>Потерял</option>
    				</select>
    			</div>
    			<div class="col-md-6 col-sm-6 col-xs-12 bot">
    				<div class="form-control"><a href="get.html">Расширенный поиск</a></div>
    			</div>

    	</form>
    	</div>
		</div>
	</nav>
</section>


                                  <!-- NAVIGATION -->

<div class="container">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="index.php">Главная</a></li>
  </ol>
  </div>
</div>
  <div id="login" class="form">
    <form action="sign_in.php" method="POST" class="login-form">
      <h2>Вход</h2>
      <input type="text" placeholder="Логин" name="login">
      <input type="password" placeholder="Пароль" name="pass">
      <? echo $error; ?>
      <button type="submit" name="sign_in">Войти</button>
    </form>
  </div>


<footer class="footer">
  <div class="navbar navbar-default">
    <div class="container">
      <div class="row">
      <div class="col-md-10 col-md-offset-2">
        <ul class="nav navbar-nav center">
          <li><a href="">Сотрудничество</a></li>
          <li><a href="">Ответы на вопросы</a></li>
          <li><a href="">Коммерческие сервисы</a></li>
          <li><a href="">Подписка</a></li>
          <li><a href="">Реклама</a></li>
          <li><a href="">Контакты</a></li>
        </ul>
      </div>
        <div class="col-md-9 col-md-offset-3">Copyright © 2016 Единая Национальная Служба Бюро Находок</div> 
      </div>
    </div>
  </div>
</footer>





</body>
</html>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
