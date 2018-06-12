<?php 
$connection = mysqli_connect("localhost", "root", "", "osh");
mysqli_set_charset($connection,'utf8');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Osh</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <!-- Global CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen"
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="fonts/glyphicons-halflings-regular" media="screen" />
    <link rel="stylesheet" type="text/css" href="fonts/glyphicons-halflings-regular" media="screen" />
    <!-- github calendar css -->   
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" type="text/css" href="css/slider.css">
</head>
<body>

    
    <nav class="navbar navbar-default navbar-fixed-top ">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Главная</a></li>
        <?php
        $result = mysqli_query($connection, "SELECT * FROM  menu");
        while ($row =mysqli_fetch_row($result)) {
            ?>
            

                <li><a onclick="page(<? echo $row[0]; ?>)" href="#"><?php echo $row[1]?></a></li>
            
            <script language="javascript" type="text/javascript">
              var s = document.getElementById('search').value;
              function page(id) {
                $.ajax({
                  url: 'page.php?id='+id,
                  success: function(data) {
                    $('.results').html(data);
                  }
                });
              }                    
            </script>
            <?php
        }
        ?>
      </ul>

      <form action="search_post.php" method="post" class=" navbar-form navbar-left search">
        <input type="search" name="search" placeholder="поиск" class="input" />
        <input type="submit" name="seke" value="" class="submit" />
      </form>
      
      
  </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="slider/1.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="slider/1.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    ...
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="">
<div class="container sections-wrapper">
    <div class="row">
        <div class="primary col-md-8 col-sm-12 col-xs-12">

           <section class="latest section">
            <div class="section-inner">
                <h2 class="heading">Объявления</h2>
                <div class="content">    
                <div class="results">

<?php
if (isset($_POST['seke'])) {

$connection = mysqli_connect("localhost", "root", "", "osh");

mysqli_set_charset($connection,'utf8');


$search=$_POST['search'];
$begin = substr($search,strpos($search, ' ')+1);
 $result = mysqli_query($connection, "SELECT * FROM spisok WHERE name  LIKE '$search%'");
    while ($row = mysqli_fetch_row($result))
{

 
                        ?>
                        <div class="item row">

                            <div class="desc col-md-8 col-sm-8 col-xs-12">

                                <li>
                                    <h3 class="title"><a href="index2.php?id=<?php echo $row['0']?>"><?php echo $row[1] ?></a></h3>
                                    <div class="col-xs-6"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $row[2]?></div>
                                    <div class="enter col-xs-6 col-xs-offset-6"><i class="fa fa-user-plus" aria-hidden="true"></i> Вы будете 
                                      <?php
                                      if($row[9]==0){
                                        echo 'первым';
                                    }
                                    else{
                                        echo $row[9]+1 .'-ым';
                                    }


                                    ?>
                                </div>
                            </li>                                          

                        </div><!--//desc-->                          
                    </div><!--//item-->
                    <hr>
                    <?php
                }}
                ?>

<?php

if (isset( $_POST['search'])) {

$result = mysqli_query($connection, "SELECT * FROM menu INNER JOIN spisok ON menu.id=spisok.id_menu WHERE menu.id=".$_POST['check']);
while ($row = mysqli_fetch_row($result))
{ 
    ?>
    <div class="item row">

        <div class="desc col-md-8 col-sm-8 col-xs-12">

            <li>
                <a href="index2.php?id=<?php echo $row['0']?>"><?php echo $row[1] ?></a></h3>
                <div class="col-xs-6"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $row[2]?></div>
                <div class="enter col-xs-6 col-xs-offset-6"><i class="fa fa-user-plus" aria-hidden="true"></i> Вы будете 
                  <?php
                  if($row[9]==0){
                    echo 'первым';
                }
                else{
                    echo $row[9]+1 .'-ым';
                }


                ?>
            </div>
        </li>                                          

    </div><!--//desc-->                          
</div><!--//item-->
<hr>
<?php
}
}
?>

                </div>
            </div><!--//content-->  
        </div><!--//section-inner-->                 
    </section><!--//section-->

    


</div><!--//primary-->
<div class="secondary col-md-4 col-sm-12 col-xs-12">                
  <aside class="skills aside section">
  <form action="sorting.php" method="POST">
    <div class="heading1"><h2>Сортировать объявления</h2></div>
    <div class="section-inner">
    <div class="date">
    <style>
    td{
      width:10px;
      font-family: 'ALS Schlange Sans',sans-serif;
    }
    .click{
      cursor: pointer;
    }
#calendar2 {
  width: 100%;
  font: monospace;
  line-height: 1.2em;
  font-size: 15px;
  text-align: center;
}
#calendar2 thead tr:last-child {
  font-size: small;
  color: rgb(85, 85, 85);
  background-color: #eee;
  padding: 5px;
}
#calendar2 thead td{
padding: 5px 0;
}
#calendar2 thead tr:nth-child(1) td:nth-child(2) {
  color: rgb(50, 50, 50);
}
#calendar2 thead tr:nth-child(1) td:nth-child(1):hover, #calendar2 thead tr:nth-child(1) td:nth-child(3):hover {
  cursor: pointer;
}
#calendar2 tbody td {
  color: rgb(44, 86, 122);
}
#calendar2 tbody td:nth-child(n+6), #calendar2 .holiday {
  color: rgb(231, 140, 92);
  padding: 10px 0;
}
#calendar2 tbody td.today {
  background: rgb(220, 0, 0);
  color: #fff;
}
</style>

<table id="calendar2">
  <thead>
    <tr><td>‹<td colspan="4"><td>›
    <tr><td>Пн<td>Вт<td>Ср<td>Чт<td>Пт<td>Сб<td>Вс
  <tbody>
</table>

<script>
function Calendar2(id, year, month) {
var Dlast = new Date(year,month+1,0).getDate(),
    D = new Date(year,month,Dlast),
    DNlast = new Date(D.getFullYear(),D.getMonth(),Dlast).getDay(),
    DNfirst = new Date(D.getFullYear(),D.getMonth(),1).getDay(),
    calendar = '<tr>',
    month=["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"];
if (DNfirst != 0) {
  for(var  i = 1; i < DNfirst; i++) calendar += '<td>';
}else{
  for(var  i = 0; i < 6; i++) calendar += '<td>';
}
for(var  i = 1; i <= Dlast; i++) {
  if (i == new Date().getDate() && D.getFullYear() == new Date().getFullYear() && D.getMonth() == new Date().getMonth()) {
    calendar += '<td class="today">' + i;
  }else{
    calendar += '<td class="click"  >' + i + '</td>';
  }
  if (new Date(D.getFullYear(),D.getMonth(),i).getDay() == 0) {
    calendar += '<tr>';
  }
}
for(var  i = DNlast; i < 7; i++) calendar += '<td>&nbsp;';
document.querySelector('#'+id+' tbody').innerHTML = calendar;
document.querySelector('#'+id+' thead td:nth-child(2)').innerHTML = month[D.getMonth()] +' '+ D.getFullYear();
document.querySelector('#'+id+' thead td:nth-child(2)').dataset.month = D.getMonth();
document.querySelector('#'+id+' thead td:nth-child(2)').dataset.year = D.getFullYear();
if (document.querySelectorAll('#'+id+' tbody tr').length < 6) {  // чтобы при перелистывании месяцев не "подпрыгивала" вся страница, добавляется ряд пустых клеток. Итог: всегда 6 строк для цифр
    document.querySelector('#'+id+' tbody').innerHTML += '<tr><td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;';
}
}
Calendar2("calendar2", new Date().getFullYear(), new Date().getMonth());
// переключатель минус месяц
document.querySelector('#calendar2 thead tr:nth-child(1) td:nth-child(1)').onclick = function() {
  Calendar2("calendar2", document.querySelector('#calendar2 thead td:nth-child(2)').dataset.year, parseFloat(document.querySelector('#calendar2 thead td:nth-child(2)').dataset.month)-1);
}
// переключатель плюс месяц
document.querySelector('#calendar2 thead tr:nth-child(1) td:nth-child(3)').onclick = function() {
  Calendar2("calendar2", document.querySelector('#calendar2 thead td:nth-child(2)').dataset.year, parseFloat(document.querySelector('#calendar2 thead td:nth-child(2)').dataset.month)+1);
}
</script>
<script language="javascript" type="text/javascript">
              var s = document.getElementById('search').value;
              function page(id) {
                $.ajax({
                  url: 'page.php?id='+id,
                  success: function(data) {
                    $('.results').html(data);
                  }
                });
              }                    
            </script>
    <input type="date" name="">
    </div>
    <div class="checkbox">
    <h4>По теме</h4>
     <?php
     $result = mysqli_query($connection, "SELECT * FROM  menu");
     while ($row =mysqli_fetch_row($result)) {
      ?>
      <label class="check" name="check" value="<?php echo $row['0']?>">
        <input  type="checkbox" />
        <span class="check_left"><?php echo $row[1]?></span>
      </label><br>


      <?php
    }
    ?>
    <input type="submit" value="Применить" name="search">
    </div> 
    </div><!--//section-inner-->
    </form>               
  </aside><!--//section-->
</div>



</div><!--//secondary-->    
</div><!--//row-->
</div><!--//masonry-->

<!-- ******FOOTER****** --> 
<footer class="footer">
    <div class="container text-center">
        <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can check out other license options via our website: themes.3rdwavemedia.com */-->
        <small class="copyright">Designed with <i class="fa fa-heart"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
    </div><!--//container-->
</footer><!--//footer-->
<!-- Javascript -->          
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- custom js -->
<script type="text/javascript" src="js/main.js"></script>     
<script type="text/javascript" src="js/jquery-1.11.3.min"></script>     
<script src="js/scripts.js"></script>
</body>
</html> 

  




























