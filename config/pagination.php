<?php
	if ($current_page>3) {
		$first=1;
		?>
	<li class="page-item"><a class="page-link" href="?per_page=<?=$item_per_page?>&page=<?=$first?>">First</a></li>
<?php } 
if ($current_page>1) {
	$prev=$current_page-1;?>
	<li class="page-item"><a class="page-link" href="?per_page=<?=$item_per_page?>&page=<?=$prev?>">Prev</a></li>
  <?php } ?>

<?php 
	for ($num=1;$num<=$totalPages;$num++){ ?>
	<?php if ($num != $current_page) { ?>
		<?php if ($num > $current_page -3 && $num < $current_page +3) { ?>
		<li class="page-item"><a class="page-link" href="?per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a></li>
		<?php } ?>
	<?php  } else { ?>
		<li class="page-item active"><a class="page-link" ><?=$num?></a></li>
	<?php } ?>
<?php } ?>

<?php
if ($current_page<$totalPages-1) {
	$next=$current_page+1;?>
	<li class="page-item"><a class="page-link" href="?per_page=<?=$item_per_page?>&page=<?=$next?>">Next</a></li>
<?php  }
	if ($current_page < $totalPages -3) {
		$end=$totalPages;
		?>
	<li class="page-item"><a class="page-link" href="?per_page=<?=$item_per_page?>&page=<?=$end?>">Last</a></li>
<?php } ?>