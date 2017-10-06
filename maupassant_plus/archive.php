<?php $this->need('header.php'); ?>
<div class="col-8" id="main">
	<div class="res-cons">
        <h3 class="archive-title"><?php $this->archiveTitle(array(
            'category'  =>  _t('Articles Under Category [%s]:'),
            'search'    =>  _t('Articles include keyword [%s]: '),
            'tag'       =>  _t('Articles include tag [%s]: '),
            'author'    =>  _t('Articles published by [%s]: ')
        ), '', ''); ?>
		</h3>
        <?php if ($this->have()): ?>
    	<?php while($this->next()): ?>
            <article class="post">
    			<header>
				<h2 class="post-title">
					<a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
				</h2>
			</header>
			<date class="post-meta">
				<?php $this->date('F j, Y'); ?>
			</date>
                <div class="post-content">
        		<?php $this->content('Read More &raquo'); ?>
                </div>
    		</article>
		<?php endwhile; ?>
        <?php else: ?>
            <article class="post">
                <h2 class="post-title"><?php _e('No Contents Available'); ?></h2>
            </article>
        <?php endif; ?>
        <?php $this->pageNav('&laquo; Prev', 'Next &raquo;'); ?>
	</div>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
