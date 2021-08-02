<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments">
    
    <!-- 评论列表区域 -->
    
    <?php #$this->comments()->to($comments); ?>
    <?php #if ($comments->have()): ?>
	<h2><?php #$this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h2>
    <?php #$comments->listComments(); ?>
    <?php #$comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    <?php #endif; ?>
    
    <?php $this->comments('comment')->to($comments); ?>
    <?php if ($comments->have()): ?>
    <hr>
	<?php while ($comments->next()): ?>
	    <div id="<?php $comments->theId() ?>">
	        <p>
		        <?php $comments->gravatar(32, '', '', 'avatar'); ?>
		        <span class="font-weight-900"><?php $comments->author() ?></span>
		        <span class="small"><?php $comments->date('F jS, Y'); ?> at <?php $comments->date('h:i a'); ?><span>
            </p>
		    <p><?php $comments->content() ?></p>
        </div>
        <hr>
	<?php endwhile; ?>
    <?php endif; ?>


    <!-- 评论提交区域 -->

    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
        </div>
    	<h3 id="response"><?php _e('添加新评论'); ?></h3>
    	<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
            <?php if($this->user->hasLogin()): ?>
		    <p><?php _e('登录身份: '); ?>
		        <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>; <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a>
   		    </p>
            <?php else: ?>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <input type="text" name="author" id="author" class="form-control" placeholder="Name" value="<?php $this->remember('author'); ?>" required />
                    </div>
                    <div class="col">
                        <input type="email" name="mail" id="mail" class="form-control" placeholder="Email" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                    </div>
                    <div class="col">
                        <input type="url" name="url" id="url" class="form-control" placeholder="Website" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                    </div>
                    <!-- 太困难了！！ -->
                    <!--<div class="col custom-control custom-checkbox">-->
                    <!--    <input type="checkbox" name="receiveMail" id="receiveMail" value="yes" class="custom-control-input" checked />-->
                    <!--    <label for="receiveMail" class="custom-control-label">接收邮件通知</label>-->
                    <!--</div>-->
                    <div class="col">
                        <label class="custom-toggle">
                            <input class="shadow" type="checkbox" name="receiveMail" id="receiveMail" value="yes" checked />
                            <span class="custom-toggle-slider rounded-circle"></span>
                        </label>
                        <label>接收邮件通知</label>
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
    <?php else: ?>
    <!--<h3><?php _e('评论已关闭'); ?></h3>-->
    <?php endif; ?>
</div>
