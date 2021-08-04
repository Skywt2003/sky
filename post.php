<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col mt-5" id="main" role="main">
    <article itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="font-weight-bold post-title" itemprop="name headline"><?php $this->title() ?></h1>
        <div>
            <i class="far fa-calendar-alt"></i> <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('Y-m-d D h:i a'); ?></time>
            <?php if ($this->user->hasLogin()): ?>
                <a class="badge badge-primary" href="<?php $this->options->siteUrl();?>admin/write-post.php?cid=<?php $this->cid();?>">
                    <i class="far fa-edit"></i>
                    <?php _e('编辑'); ?>
                </a>
            <?php endif;?>
            </div>
        <hr>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
        <!--<p itemprop="keywords" class="post-tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></p>-->
    </article>
    <hr>
    <span>
        <i class="fa fa-copyright"></i>
        <a class="badge badge-default" rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons BY-SA 4.0</a>
    </span>
    <span>
        <i class="fa fa-folder text-info"></i>
        <?php foreach($this->categories as $categories): ?>
		<a href="<?php print($categories['permalink']) ?>" class="badge badge-info"><?php print($categories['name']) ?></a>
	    <?php endforeach;?>
    </span>
    <?php if (count($this->tags) > 0): ?>
    <span>
        <i class="fa fa-tags text-success"></i>
	    <?php foreach($this->tags as $tags): ?>
	    <a href="<?php print($tags['permalink']) ?>" class="badge badge-success"><?php print($tags['name']) ?></a>
	    <?php endforeach;?>
    </span>
	<?php endif;?>
    <?php if ($this->commentsNum > 0): ?>
    <span>
        <i class="fa fa-comments"></i>
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
