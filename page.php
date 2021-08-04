<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col mt-5" id="main" role="main">
    <article itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="font-weight-bold post-title" itemprop="name headline"><?php $this->title() ?></h1>
        <hr>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
