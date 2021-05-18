<div class="main-section">
	<?php if(isset($DataList) && count($DataList)>0  && $DataList !=FALSE) { 
		foreach($DataList as $row){
	?>
	<div class="dashbord email-content">
			<div class="title-section">
		<p>Product <?php echo ($row['productaCount'] != 0 ? 'A' : 'B')?> </p>
			</div>
			<div class="icon-text-section">
				<div class="icon-section">
					<i class="fa fa-envelope-o" aria-hidden="true"></i>
				</div>
				
					<h1><?php echo ($row['productaCount'] != 0 ? $row['productaCount'] : $row['productbCount'])?></h1>
			
				<div style="clear:both;"></div>
			</div>
			
		</div>
	
	<?php } }else{
		 echo '<tr class="text-center"><td colspan="13">Record not found</td></tr>';
	} ?>
	</div>