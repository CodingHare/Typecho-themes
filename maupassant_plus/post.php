<?php $this->need('header.php'); ?>

<div class="col-8" id="main">
	<div class="res-cons">
 
		<article class="post">
			<header>
				<h1 class="post-title"><?php $this->title() ?></h1>
			</header>
                       
			<date class="post-meta">
				<span class= "icon-table2"> </span><?php $this->date('F j, Y'); ?>
                                 <hr class="hr-style"/>
			</date>

			<div class="post-content">
                        
                                
                               
				<?php $this->content(); ?>

			</div>
		</article>




		<?php $this->need('comments.php'); ?>
	</div>
</div>


<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
