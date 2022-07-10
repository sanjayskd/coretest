<?php

function getpagination($conn,$page,$total_records,$page_records,$urldata){
	$domain='https://www.domain.com/';
if (!empty($total_records) && !empty($page_records) && $total_records > $page_records) {

    if (!empty($total_records)) {
        $totalPages = ceil($total_records / $page_records);
    }
    if (empty($page) || $page == 0) {
        $page = 1;
    }
	$sortVal = "";
	if(!empty($_GET['sort']) && $_GET['sort'] == "grid"){
		$sortVal = "&sort=".$_GET['sort'];
	}else if(!empty($_GET['sort']) && $_GET['sort'] == "list"){
		$sortVal = "&sort=".$_GET['sort'];
	}
    $explode = explode('?', $_SERVER["REQUEST_URI"]);
    $next = 'javascript:void(0);';
    $previous = 'javascript:void(0);';
    $firstPage = 'javascript:void(0);';
    $lastPage = 'javascript:void(0);';
    if ($page < $totalPages) {
        $next = $explode[0] . '?page=' . ($page + 1).$sortVal.$urldata;
        $lastPage = $explode[0] . '?page=' . $totalPages.$urldata;
    }
    if ($page > 1) {
        $previous = $explode[0] . '?page=' . ($page - 1).$sortVal.$urldata;
        $firstPage = $explode[0] . '?page=1'.$urldata;
    }
?>
<div class="paginatio_table_about text-center">
<input type="hidden" value="<?= $totalPages ?>" id="pageitemcount">
	<nav aria-label="Page navigation example">
		<ul class="pagination pagination-circle pg-blue justify-content-center">
			
			<li class="page-item <?php if ($firstPage=='javascript:void(0);'){ echo "disabled"; } ?>"><a class="page-link" href="<?= $firstPage; ?>">First</a></li>
			<li class="page-item <?php if ($firstPage=='javascript:void(0);'){ echo "disabled"; } ?>" id="prevpage">
				<a class="page-link" href="<?= $previous; ?>" tabindex="-1"> 
					<span aria-hidden="true"><img class="prev_paginateion_left"
							src="<?= $domain ?>images/arrowhead-pointing-to-the-right.png" alt=""></span>
					<span class="sr-only">Previous</span>
				</a>
			</li>
			<?php 			
			for ($i = 1; $i <= $totalPages; $i++) {
                $active = '';
                if ($i == $page) {
                    $active = 'active';
                }

                if($i <= 4 && $i !==$page){
                	$show = 'pageitemnew';
                }else{
                	$show = '';
                }
			?>	
				<li class="page-item <?= $active.' '.$show ?> pageitemnone"><a class="page-link" href="<?= $explode[0].'?page='.$i.$urldata; ?>"><?= $i; ?></a></li>
	<?php 	} ?>
			
			<li class="page-item <?php if ($lastPage=='javascript:void(0);'){ echo "disabled"; } ?>" id="nextpage">
				<a class="page-link pageitemnew" href="<?= $next; ?>">
					<span aria-hidden="true"><img class="next_paginateion_left"
							src="<?= $domain ?>images/arrowhead-pointing-to-the-right.png" alt=""></span>
					<span class="sr-only">Next</span>
				</a>
			</li>
			<li class="page-item <?php if ($lastPage=='javascript:void(0);'){ echo "disabled"; } ?>"><a class="page-link" href="<?= $lastPage; ?>">Last</a></li>
		</ul>
	</nav>
</div>
<?php 

}

}
?>
<style type="text/css">
	
	.pageitemnone{
		display: none!important;
	}
	.pageitemnew{
		display: block!important;
	}
	.active.pageitemnone
	{display: inline!important;}
</style>
