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
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">   
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css"> 
</head> 

<body>
    <!-- ******HEADER****** --> 
    
    <nav class="navbar navbar-default navbar-fixed-top">
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
            

                <li><a onclick="page(<? echo $row[0]; ?>)" href="#"><?php echo $row[1]?><span class="sr-only">(current)</span></a></li>
            
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
        ?></ul>
        <form class="navbar-form navbar-left" method="POST" >
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Искать" id="search">
          </div>
          <button type="button" onclick="btn()" class="btn btn-default">Поиск</button>
      </form>
      
      
  </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="..." alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
  </div>
</div>
    <div class="container sections-wrapper">
        <div class="row">
            <div class="primary col-md-8 col-sm-12 col-xs-12">
                <?php
                $result = mysqli_query($connection, "SELECT * FROM spisok INNER JOIN menu ON spisok.id_menu=menu.id WHERE spisok.id=".$_GET['id']);
                while ($row =mysqli_fetch_row($result)) {
                    ?>
                    <section class="latest section">
                        <div class="section-inner row">
                            <h2 class="heading">Latest Projects</h2>
                            <div class="content">    

                                <div class="item featured text-center">
                                    <h3 class="title summary"><? echo $row[1]; ?></h3>
                                    <div class="featured-image">
                                        <img class="img-responsive project-image" src="assets/images/projects/project-featured.png">           
                                        <div class="desc text-left">                                    
                                            <h4>Описание</h4>
                                            <p><? echo $row[4]; ?></p>
                                            <h4>Участники</h4>
                                            <p><? echo $row[7]; ?></p>
                                            <h4>Организаторы</h4>
                                            <p><? echo $row[6]; ?></p>
                                            <h4>Контакты</h4>
                                            <p><? echo $row[8]; ?></p>
                                        </div><!--//desc-->   
                                        <script language="javascript" type="text/javascript">
                                            function number1(s) {
                                             $.ajax({

                                              url: 'number_src.php?id='+s,
                                              success: function(data) {
                                                $('.results').html(data);
                                            }
                                        });
                                         }                    
                                     </script>
                                     <section class="number">
                                         <div class="alarm"><i class="fa fa-bell-o bell" aria-hidden="true"></i><span class="time"><?php echo $row[2]?></span></div>     
                                         <div class=" button1">
                                             <span class="results">
                                                <button onclick="number1(<?php echo $row[0]; ?>)" type="button" class="btn btn-info">Я пойду</button>
                                                <?php
                                                if($row[9]==0){
                                                    echo '<b>Вы будете первым </b>';
                                                }
                                                else{
                                                    echo '<b> Уже идут '.$row[9].' человека</b>';
                                                }
                                                ?>
                                            </span> 
                                        </div>
                                    </section>                 
                                </div><!--//item-->
                                <hr class="divider" />
                            </div>
                        </div><!--//content-->  
                    </div><!--//section-inner-->                 
                </section><!--//section-->
                <?
            }
            ?>                
        </div><!--//primary-->

        <div class="secondary col-md-4 col-sm-12 col-xs-12">



            <aside class="languages aside section">
                <div class="section-inner">
                    <h2 class="heading">Последние объявления</h2>
                    <?php
                    $result = mysqli_query($connection, "SELECT * FROM spisok");
                    while ($row = mysqli_fetch_row($result))
                    { 
                        ?>
                        <div class="item row">

                            <div class="desc  col-xs-12">                                                                              
                                <h3 class="title"><a href="index2.php?id=<?php echo $row['0']?>"><?php echo $row[1] ?></a></h3>
                                <span class="title2"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $row[2]?></span>

                            </div><!--//desc-->                        
                        </div><!--//item-->
                        <hr>
                        <?php
                    }
                    ?>
                </div><!--//section-inner-->
            </aside><!--//section-->



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
<script type="text/javascript" src="assets/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>    
<!-- custom js -->
<script type="text/javascript" src="assets/js/main.js"></script>     

</body>
</html> 

