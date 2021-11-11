<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->levels > 0) $commentClass .= ' ml-5';
    ?>
    <?php if ($comments->type == 'pingback' || $comments->type == 'traceback'){?>
	    <div id="<?php $comments->theId(); ?>">
            <div class="card">
                <div class="card-body">
                    <span class="font-weight-900"><?php $comments->author(); ?></span>
                    <br>
	                <span class="small"><?php $comments->date('F jS, Y'); ?> at <?php $comments->date('h:i a'); ?></span>
                </div>
            </div>
        </div>
    <?php } else { ?>
	    <div id="<?php $comments->theId(); ?>" class="mt-3 mb-3<?php echo $commentClass; ?>">
	        <div class="d-flex align-items-center">
                <?php $qq = str_replace('@qq.com', '', $comments->mail);
                    // 原计划如果是 QQ 邮箱并且没有 Gravatar 头像设置，则显示为 QQ 头像，
                    // 但是好像没法把 QQ 头像调用的 API 设置成 gravatar 的 default，返回 400 错误
                    // 只好采用 是 QQ 邮箱就显示 QQ 头像 的方案
			        if (strstr($comments->mail, "qq.com") && is_numeric($qq) && strlen($qq) < 11 && strlen($qq) > 4){
			            $avatarUrl = 'https://q3.qlogo.cn/g?b=qq&nk='.$qq.'&s=100';
			        } else {
                        $avatarUrl = __TYPECHO_GRAVATAR_PREFIX__;
                        if (!empty($comments->mail)) { $avatarUrl .= md5(strtolower(trim($comments->mail))); }
                        $avatarUrl .= '?s='. '64' . '&amp;r=' . Helper::options()->commentsAvatarRating . '&amp;d=' . Helper::options()->themeUrl.'/assets/visitor.png';
                    }
                ?>
                <img class="avatar" src="<?php echo $avatarUrl; ?>" alt="<?php echo $comments->author; ?>" width="64" height="64" />
                <div class="d-inline-block ml-2">
                    <span class="font-weight-900"><?php $comments->author(); ?></span>
                    <?php if ($comments->authorId == $comments->ownerId): ?>
                        <span class="badge badge-secondary ml-1 mr-1"><?php _e('博主') ?></span>
                    <?php endif; ?>
                    <?php if ($comments->status == 'waiting'): ?>
                    <span class="badge badge-warning ml-1 mr-1">
                        <i class="fas fa-ellipsis-h"></i>
                        <?php _e('等待审核') ?>
                    </span>
                    <?php endif; ?>
                    <?php UserAgent_Plugin::render($comments->agent); ?>
                    <br>
	                <span class="small"><?php $comments->date('F jS, Y'); ?> at <?php $comments->date('h:i a'); ?></span>
                    <span class="small ml-1 mr-1"><?php $comments->reply('<i class="fa fa-reply"></i> Reply'); ?><span>
                </div>
            </div>
            <p><?php $comments->content(); ?></p>
            <?php if ($comments->children): $comments->threadedComments($options); endif; ?>
        </div>
    <?php } ?>
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
    <?php if ($this->options->comments_noti !='') { ?>
    <div class="alert alert-primary alert-dismissible fade show shadow" role="alert">
        <span class="alert-inner--icon"><i class="fas fa-exclamation-circle"></i></span>
        <span class="alert-inner--text"><?php $this->options->comments_noti(); ?></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php } ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div>
            <?php $comments->cancelReply('<i class="fa fa-window-close"></i> 取消回复'); ?>
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
                        <label for="receiveMail" class="mb-0 ml-2"><?php _e('接收邮件通知'); ?></label>
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
