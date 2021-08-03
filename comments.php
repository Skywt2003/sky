<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->levels > 0) $commentClass .= ' ml-5';
    if ($comments->type == 'pingback' || $comments->type == 'traceback') $commentClass .= ' bg-secondary';
?>
    <!-- 评论列表区域 -->
	<div id="<?php $comments->theId(); ?>" class="<?php echo $commentClass; ?>">
	    <div class="d-flex align-items-center">
	        <?php $comments->gravatar(64, '', '', 'avatar'); ?>
            <div class="d-inline-block">
                <span class="font-weight-900"><?php $comments->author(); ?></span>
                <?php if ($comments->authorId == $comments->ownerId): ?>
                    <span class="badge badge-secondary"><?php _e('博主') ?></span>
                <?php endif; ?>
                <?php if ($comments->status == 'waiting'): ?>
                    <span class="badge badge-warning"><?php _e('等待审核') ?></span>
                <?php endif; ?>
                <br>
	            <span class="small"><?php $comments->date('F jS, Y'); ?> at <?php $comments->date('h:i a'); ?></span>
                <span class="small"><?php $comments->reply('Reply'); ?><span>
            </div>
        </div>
        <p><?php $comments->content(); ?></p>
        <?php if ($comments->children): $comments->threadedComments($options); endif; ?>
    </div>
<?php } ?>

<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
    <hr>
    <?php $comments->listComments(array('before'=>'','after'=>'')); ?>
    <?php endif; ?>

    <!-- 评论提交区域 -->
    <?php if ($this->allow('comment')): ?>
    <hr>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
        </div>
    	<h2 id="response"><?php _e('添加新评论'); ?></h2>
    	<form method="post" action="<?php $this->commentUrl(); ?>" id="comment-form" role="form">
            <?php if ($this->user->hasLogin()): ?>
		    <p><?php _e('登录身份: '); ?>
		        <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a> | <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a>
   		    </p>
            <?php else: ?>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3 col-xs-12">
                        <input type="text" name="author" id="author" class="form-control" placeholder="Name" value="<?php $this->remember('author'); ?>" required />
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <input type="email" name="mail" id="mail" class="form-control" placeholder="Email" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <input type="url" name="url" id="url" class="form-control" placeholder="Website" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                    </div>
                    <div class="col-md-3 col-xs-12 align-self-center">
                        <div class="d-flex align-content-stretch">
                        <label class="custom-toggle mb-0">
                            <input type="checkbox" name="receiveMail" id="receiveMail" value="yes" checked />
                            <span class="custom-toggle-slider rounded-circle"></span>
                        </label>
                        <label class="mb-0 ml-2"><?php _e('接收邮件通知'); ?></label>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="form-group">
                <textarea rows="8" cols="50" name="text" id="textarea" class="form-control" placeholder="Say something!" required ><?php $this->remember('text'); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    	</form>
    </div>
    <?php endif; ?>
</div>
