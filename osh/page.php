<?php 
$connection = mysqli_connect("localhost", "root", "", "osh");
mysqli_set_charset($connection,'utf8');

?>


<?php
$result = mysqli_query($connection, "SELECT * FROM spisok WHERE id_menu=".$_GET['id']);
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
?>