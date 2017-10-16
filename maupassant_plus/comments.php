<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?> 
<?php function threadedComments($comments, $singleCommentOptions) {
$commentClass = '';
if ($comments->authorId) {
if ($comments->authorId == $comments->ownerId) {
$commentClass .= ' comment-by-author';
} else {
$commentClass .= ' comment-by-user';
}
}

$commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';
?>
<li id="<?php $comments->theId(); ?>" class="comment-body<?php
if ($comments->_levels > 0) {
echo ' comment-child';
$comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">



              <span class="pull-left">
                <?php
                //头像CDN by Rich https://forum.typecho.org/viewtopic.php?f=5&t=6165&p=29961&hilit=gravatar#p29961
                $host = 'https://cdn.v2ex.com'; //自定义头像CDN服务器
                $url = '/gravatar/'; //自定义头像目录,一般保持默认即可
                $size = '42'; //自定义头像大小
                $rating = Helper::options()->commentsAvatarRating;
                $hash = md5(strtolower($comments->mail));
                $avatar = $host . $url . $hash . '?s=' . $size . '&r=' . $rating . '&d=';
                ?>
                <img class="avatar media-object" src="<?php echo $avatar ?>">
              </span>

 <div id="<?php $comments->theId(); ?>" class="media-body">
                <h4 class="media-heading">
<span class="comment-author<?php echo $commentClass; ?>"><?php $comments->author(); ?></span>
<span class="comment-reply"><?php $comments->reply(); ?></span>
<div class="comment-time"><time datetime="<?php echo timesince($comments->created);?>"><span class="glyphicon glyphicon-time"></span><?php echo timesince($comments->created);?></div>
</h4>

                <div class="comment-content">
<p class ="comment-at"><?php get_comment_at($comments->coid); ?> </p>
<?php $comments->content(); ?></div>
              </div>
             
              <?php if ($comments->children) { ?>
              <div class="comment-children">
                <?php $comments->threadedComments($options); ?>
                
              </div>
              <?php } ?>
              
            </li>
            <?php } ?>
            
            <div id="comments"><?php echo $commentClass; ?>
                           
              <?php $this->comments()->to($comments); ?>
              <?php if ($comments->have()): ?>
              <p class="bg-warning"><?php $this->commentsNum(_t('No comment'), _t('Only a comment'), _t(' %d Comments')); ?></p>
              <?php $comments->listComments(); ?>
              <?php $comments->pageNav('&laquo; Prev', 'Next &raquo;'); ?>
              <?php endif; ?>             
              <?php if($this->allow('comment')): ?>
              <div id="<?php $this->respondId(); ?>" class="respond">
                <div class="cancel-comment-reply">
                  <?php $comments->cancelReply(); ?>
                </div>
                <span id="response" class="widget-title"><?php _e('Leave Comment'); ?></span>
                <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form">
            <div class="col1">
            <p>
                <textarea rows="8" cols="50" name="text" class="textarea"><?php $this->remember('text'); ?></textarea>
            </p>
            </div>
            <div class="col2">
            <?php if($this->user->hasLogin()): ?>
            <p><?php _e('Signed As：'); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('Exit'); ?> &raquo;</a></p>
            <?php else: ?>
            <p>
                <label for="author" class="required"><?php _e('Name:'); ?></label>
                <input type="text" name="author" id="author" class="text" value="<?php $this->remember('author'); ?>" />
            </p>
            <p>
                <label for="mail"<?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif; ?>><?php _e('Email:'); ?></label>
                <input type="email" name="mail" id="mail" class="text" value="<?php $this->remember('mail'); ?>" />
            </p>
            <p>
                <label for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>><?php _e('Site:'); ?></label>
                <input type="url" name="url" id="url" class="text" placeholder="<?php _e('http://example.com'); ?>" value="<?php $this->remember('url'); ?>" />
            </p>
            <?php endif; ?>
            <p>
                <button type="submit" class="submit"><?php _e('Submit'); ?></button>
            </p>
            </div>
            <div class="clear"></div>
        </form>
              </div>
              <?php else: ?>
              <p class="bg-warning">Comments has been closed.</p>
              <?php endif; ?>
            </div>

