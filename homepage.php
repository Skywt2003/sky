<?php
/**
 * 网站首页
 *
 * @package index
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <!-- 草莓图标库 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/assets/strawberry-v2.0.0/style.css'); ?>">
    
    <!-- Argon Theme CSS -->
    <link type="text/css" href="<?php $this->options->themeUrl('/assets/css/argon-design-system.min.css')?>" rel="stylesheet">
    
    <!-- Sky CSS-->
    <link type="text/css" href="<?php $this->options->themeUrl('/assets/style.css')?>" rel="stylesheet">
    
    <!-- JS: jQuery & popper & bootstrap -->
    <script src="<?php $this->options->themeUrl('/assets/js/core/jquery.min.js');?>"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>-->
    <script src="<?php $this->options->themeUrl('/assets/js/core/popper.min.js');?>"></script>
    <script src="<?php $this->options->themeUrl('/assets/js/core/bootstrap.min.js');?>"></script>

    <!-- Argon Theme JS -->
    <script src="<?php $this->options->themeUrl('/assets/js/argon-design-system.min.js');?>"></script>
    
    <!-- Highlight.js via jsDelivr -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.1.0/build/styles/default.min.css">
    <script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.1.0/build/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>

    <?php $this->header(); ?>
</head>
<!--[if lt IE 8]>
    <?php _e('当前网页不支持你正在使用的浏览器。为了正常访问, 请升级你的浏览器！'); ?>
<![endif]-->
<body>

<div class="text-center cover-container d-flex h-100 p-3 mx-auto flex-column">

<header id="header" class="inner cover clearfix mt-5 mb-4">
    <div class="container">
        <div class="row">
            <div class="site-name col">
            <?php if ($this->options->logoUrl): ?>
                <div class="text-center">
                    <img src="<?php $this->options->logoUrl() ?>" class="site-avatar shadow rounded-circle mx-auto d-block" alt="<?php $this->options->title() ?>" width=128 height=128>
                    <h2 class="mt-3 font-weight-bold text-default"><?php $this->options->title() ?></h2>
                    <p class="description"><?php $this->options->description() ?></p>
                </div>
            <?php else: ?>
                <a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
        	    <p class="description text-gray"><?php $this->options->description() ?></p>
            <?php endif; ?>
            </div>
        </div><!-- end .row -->
    </div>
</header><!-- end #header -->

<?php $randColor = array_rand(array("primary"=>0,"info"=>0,"success"=>0,"danger"=>0,"warning"=>0)); ?>
<nav class="inner cover navbar navbar-light navbar-expand sticky-top shadowb">
    <div class="container">
        <ul class="col navbar-nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link nav-link-icon <?php if ($this->is('index')){echo 'text-'.$randColor;}else{echo 'text-gray';}?>" href="<?php $this->options->siteUrl();?>">
                    <i class="czs-home"></i> Home
                </a>
            </li>
            <?php if (strpos($this->options->frontPage, 'file') !== FALSE) {?>
            <li class="nav-item">
                <a class="nav-link nav-link-icon <?php if ($this->is('archives')){echo 'text-'.$randColor;}else{echo 'text-gray';}?>" href="<?php echo '.'.$this->options->routingTable['archive']['url'] ?>">
                    <i class="czs-read"></i> Passages
                </a>
            </li>
            <?php } ?>
            <?php $this->widget('Widget_Contents_Page_List')->to($pagelist);
                while ($pagelist->next()): ?>
            <li class="nav-item">
                <a class="nav-link nav-link-icon <?php if ($this->is('page', $pagelist->slug)){echo 'text-'.$randColor;}else{echo 'text-gray';}?>" href="<?php echo $pagelist->permalink ?>">
                    <?php if ($pagelist->fields->pageIcon != '') {?>
                    <i class="<?php echo $pagelist->fields->pageIcon ?>"></i>
                    <?php } ?>
                <?php echo $pagelist->title ?>
                </a>
            </li>
            <?php endwhile;?>
        </ul>
    </div>
</nav>

</div>

<div id="body">
    <div class="container">
        <div class="row">
<?php $this->need('footer.php'); ?>