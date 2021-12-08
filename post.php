<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<?php if ($this->fields->linkTo): ?>
    <script type='text/javascript'>window.location.href = '<?php echo $this->fields->linkTo ?>';</script>
<?php endif; ?>

<div class="col mt-5 animate__animated animate__fadeIn" id="main" role="main">
    <article>
        <?php if ($this->fields->headPic !=''): ?>
            <a data-fancybox="gallery" href="<?php $this->fields->headPic(); ?>" data-caption="<?php $this->title(); ?>">
                <img src=<?php $this->fields->headPic(); ?> class="img-fluid mx-auto d-block shadow rounded mb-3" alt="<?php $this->title(); ?>" title="<?php $this->title(); ?>">
            </a>
        <?php endif; ?> 
        <h1 class="font-weight-bold post-title"><?php $this->title() ?></h1>
        <div>
            <span class="text-gray">
                <i class="far fa-calendar-alt ml-1 mr-1"></i>
                <time class="lately" datetime="<?php $this->date('c'); ?>" pubdate>Lately</time> | 
                <time datetime="<?php $this->date('c'); ?>"><?php $this->date('Y-m-d D h:iA'); ?></time>
                <?php if ($this->fields->pubPlace != ''): ?>
                    <br>
                    <i class="fas fa-map-marker-alt ml-1 mr-1"></i>
                    <?php echo $this->fields->pubPlace; ?>
                <?php endif; ?>
            </span>
        </div>
        <hr>
        <?php $date1=date_create(date('c',$this->date->timeStamp)); $date2=date_create(date('c')); $days=date_diff($date1,$date2); ?>
        <?php if ($this->options->oldPosts != '' && $days->format('%a') > $this->options->oldPosts): ?>
        <div class="alert alert-primary alert-dismissible fade show shadow mb-5" role="alert">
            <span class="alert-inner--icon"><i class="fas fa-clock"></i></span>
            <span class="alert-inner--text">这是一篇发布于 <?php echo $days->format('%a'); ?> 天以前的旧文。其中的部分内容可能已经过时。</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <?php endif; ?>
        <div class="post-content">
            <?php echo exContent($this->content); ?>
        </div>
    </article>
    <hr>
    <span>
        <i class="fa fa-copyright ml-1 mr-1"></i>
        <a class="badge badge-default" rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons BY-SA 4.0</a>
    </span>
    <span>
        <i class="fa fa-folder text-info ml-1 mr-1"></i>
        <?php foreach($this->categories as $categories): ?>
		<a href="<?php print($categories['permalink']) ?>" class="badge badge-info"><?php print($categories['name']) ?></a>
	    <?php endforeach;?>
    </span>
    <?php if (count($this->tags) > 0): ?>
    <span>
        <i class="fa fa-tags text-success ml-1 mr-1"></i>
	    <?php foreach($this->tags as $tags): ?>
	    <a href="<?php print($tags['permalink']) ?>" class="badge badge-success"><?php print($tags['name']) ?></a>
	    <?php endforeach;?>
    </span>
	<?php endif;?>
    <?php if ($this->commentsNum > 0): ?>
    <span>
        <i class="fa fa-comments ml-1 mr-1"></i>
        <span class="badge badge-secondary"><?php echo $this->commentsNum?> 条评论</span>
    </span>
    <?php endif; ?>
    <!-- 暂时找不到好的办法让这个很好地兼容 Bootstrap 的写法 -->
    <!-- <ul class="post-near">
        <li>上一篇: <?php #$this->thePrev('%s','没有了'); ?></li>
        <li>下一篇: <?php #$this->theNext('%s','没有了'); ?></li>
    </ul> -->
    <?php $this->need('comments.php'); ?>
</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
