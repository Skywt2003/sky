<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<?php if ($this->fields->linkTo): ?>
    <script type='text/javascript'>window.location.href = '<?php echo $this->fields->linkTo ?>';</script>
<?php endif; ?>

<div class="col mt-5" id="main" role="main">
    <article>
        <h1 class="font-weight-bold post-title"><?php $this->title() ?></h1>
        <hr>
        <div class="post-content">
            <?php $this->content(); ?>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
