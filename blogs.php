<?php
require_once('___function.php');
$page=1;
if(!empty($_GET['page'])){
  $page=$_GET['page']; 
}
$page_records = 4;
$urldata="";
$sqlstr='';
 $totalrow=getTotalRow($con,'tablename',$sqlstr);


$startLimit = (($page-1)*$page_records);


 $query_data=mysqli_query($con,"select * from tablename WHERE `status` = '1' ORDER BY `blog`.`id` ASC limit $startLimit, $page_records"); 
?>
<style>
  .prev_paginateion_left {
  width: 15px!important;
  transform: rotate(180deg);
}
.next_paginateion_left {
  width: 15px!important;
}
.blog_text_area{
  margin-bottom: 20px;
  border-radius: 4px;
}
.page-item.active .page-link {
  background-color: #044e0b;
  border-color: #044e0b;
}
.page-link{
  color: #044e0b;
}
</style>



<div class="col-md-12">
            <?php  
            include 'pagination.php';
           $data= getpagination($con,$page,$totalrow,$page_records,$urldata);
            ?>
        </div><br>

