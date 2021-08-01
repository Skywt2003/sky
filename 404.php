<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col mt-5 text-center" id="main" role="main">
    <article>
            <h1 class="font-weight-bold">404 NOT FOUND.</h1>
            <p><?php _e('您要找的页面不存在！'); ?></p>
            <p><a href=<?php $this->options->siteUrl(); ?> ><?php _e('返回首页'); ?></a> </p>
    </article>
</div><!-- end #content-->

<?php $this->need('footer.php'); ?>
