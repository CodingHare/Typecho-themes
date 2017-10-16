<?php    
   /**  
    * about
    * @package custom   
    */    
$this->need('header.php');?>  
<div class="col-8" id="main">
	<div class="res-cons">
		<article class="post">
			<div class="post-content" style="margin-top:-3.5em;">
				<?php $this->content(); ?>
			</div>
		</article>

		
<hr class="hr-style"/>
	</div>

</div>

<?php $this->need('sidebar.php'); ?>

<?php $this->need('footer.php'); ?>