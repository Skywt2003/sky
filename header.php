<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php $this->archiveTitle(array(
            'category'  =>  '分类 %s 下的文章',
            'search'    =>  '包含关键字 %s 的文章',
            'tag'       =>  '标签 %s 下的文章',
            'author'    =>  '%s 发布的文章'
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <link rel="apple-touch-icon" href="<?php $this->options->logoUrl() ?>">
    <link rel="shortcut icon" href="<?php $this->options->themeUrl('/assets/favicon.ico')?>" />
    <link rel="bookmark" href="<?php $this->options->themeUrl('/assets/favicon.ico')?>" type="image/x-icon"/>

    <!-- FontAwesome Icons -->
    <link type="text/css" href="<?php $this->options->themeUrl('/assets/css/fa-all.min.css')?>" rel="stylesheet">

	<!-- Google Fonts -->
	<link href="https://fonts.loli.net/css2?family=Noto+Serif+SC:wght@200;300;400;500;600;700;900&display=swap" rel="stylesheet"> 

    <!-- JS: jQuery & popper & bootstrap -->
    <script src="<?php $this->options->themeUrl('/assets/js/core/jquery.min.js');?>"></script>
    <script src="<?php $this->options->themeUrl('/assets/js/core/popper.min.js');?>"></script>
    <script src="<?php $this->options->themeUrl('/assets/js/core/bootstrap.min.js');?>"></script>

    <!-- lately.js -->
    <script src="<?php $this->options->themeUrl('/assets/js/plugins/lately.js');?>"></script>

    <!-- Argon Theme CSS & JS-->
    <link type="text/css" href="<?php $this->options->themeUrl('/assets/css/argon-design-system.css')?>" rel="stylesheet">
    <script src="<?php $this->options->themeUrl('/assets/js/argon-design-system.min.js');?>"></script>

    <!-- Sky CSS-->
    <link type="text/css" href="<?php $this->options->themeUrl('/assets/style.css')?>" rel="stylesheet">

    <!-- Highlight.js -->
    <link type="text/css" href="<?php $this->options->themeUrl('/assets/css/atom-one-dark.min.css')?>" rel="stylesheet">
    <script src="<?php $this->options->themeUrl('/assets/js/plugins/highlight.min.js');?>"></script>
    <script>hljs.highlightAll();</script>

    <!-- Darkreader.js -->
    <script src="<?php $this->options->themeUrl('/assets/js/plugins/darkreader.min.js');?>"></script>
    <script>DarkReader.auto({brightness:100, contrast:90, sepia:10});</script>

    <!-- KaTeX css-->
    <link type="text/css" href="<?php $this->options->themeUrl('/assets/css/katex.min.css')?>" rel="stylesheet">

    <!-- fancybox js&css-->
    <script src="<?php $this->options->themeUrl('/assets/js/plugins/jquery.fancybox.min.js');?>"></script>
    <link type="text/css" href="<?php $this->options->themeUrl('/assets/css/jquery.fancybox.min.css')?>" rel="stylesheet">

    <!-- Animate.css -->
    <link type="text/css" href="<?php $this->options->themeUrl('/assets/css/animate.min.css')?>" rel="stylesheet">

    <?php $this->options->headerCode(); ?>
    <style><?php $this->options->cutsomCSS(); ?></style>

    <?php $this->header(); ?>
</head>
<!--[if lt IE 8]>
    当前网页不支持你正在使用的浏览器。为了正常访问, 请升级你的浏览器！
<![endif]-->
<body>

<?php if ($this->user->hasLogin()): ?>
<nav class="container fixed-bottom p-2 navbar navbar-light">
    <div>
        欢迎，<a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>
        <?php if ($this->is('post')): ?>
        <a class="badge badge-primary ml-1 mr-1" href="<?php $this->options->siteUrl();?>admin/write-post.php?cid=<?php $this->cid();?>" title="Edit">
            <i class="far fa-edit"></i>编辑此文
        </a>
        <?php endif; ?>
        <?php if ($this->is('page')): ?>
        <a class="badge badge-primary ml-1 mr-1" href="<?php $this->options->siteUrl();?>admin/write-page.php?cid=<?php $this->cid();?>" title="Edit">
            <i class="far fa-edit"></i>编辑此页
        </a>
        <?php endif; ?>
        <a class="badge badge-default ml-1 mr-1" href="<?php $this->options->siteUrl('admin/manage-posts.php?status=draft'); ?>" title="Drafts">
            <i class="far fa-edit"></i>草稿箱
        </a>
        <a class="badge badge-default ml-1 mr-1" href="<?php $this->options->siteUrl('admin'); ?>" title="Backstage">
            <i class="fas fa-user-cog"></i>网站后台
        </a>
        <a class="badge badge-default ml-1 mr-1" href="<?php $this->options->siteUrl('admin/options-theme.php'); ?>" title="Settings">
            <i class="fas fa-cog"></i>主题设置
        </a>
        <a class="badge badge-secondary ml-1 mr-1" href="#" onclick="javascript:location.reload();" title="Refresh">
            <i class="fas fa-redo"></i>刷新
        </a>
        <a class="badge badge-secondary ml-1 mr-1" href="<?php $this->options->logoutUrl(); ?>" title="Logout">
            <i class="fas fa-sign-out-alt"></i>退出
        </a>
    </div>
</nav>
<?php endif; ?>

<header id="header" class="clearfix mt-5 mb-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="text-center">
                    <img src="<?php $this->options->logoUrl() ?>" class="site-avatar shadow rounded-circle mx-auto d-block" alt="<?php $this->options->title() ?>" width=128 height=128>
                    <h2 class="mt-3 font-weight-bold text-default"><?php $this->options->title() ?></h2>
                    <p class="description"><?php $this->options->description() ?></p>
                </div>
            </div>
        </div><!-- end .row -->
    </div>
</header><!-- end #header -->

<nav class="container navbar navbar-light navbar-expand-lg sticky-top">
    <a></a> <!-- 十分简陋的处理方式 -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <div class="navbar-collapse-header">
            <div class="row">
                <div class="col-6 collapse-brand">Menu</div>
                <div class="col-6 collapse-close">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="true" aria-label="Toggle navigation">
                        <!-- Argon 里默认用两根竖线拼成 × 符号，默认这里的元素会被旋转 45 度 -->
                        <i class="fas fa-times" style="transform: none"></i>
                    </button>
                </div>
            </div>
        </div>
        <ul class="col navbar-nav justify-content-center pr-0">
            <?php if ($this->options->realHomepage){ ?>
            <li class="nav-item">
                <a class="nav-link nav-link-icon text-gray" href="<?php $this->options->realHomepage();?>">
                    <i class="fa fa-home"></i> 首页 </a>
            </li>
            <?php } ?>
            <?php if (strpos($this->options->frontPage, 'file') !== FALSE) {?>
            <li class="nav-item">
                <a class="nav-link nav-link-icon <?php if ($this->is('index')){echo 'text-default';}else{echo 'text-gray';}?>" href="<?php $this->options->siteUrl();?>">
                    <i class="fa fa-home"></i> 首页 </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-icon <?php if ($this->is('archive')){echo 'text-default';}else{echo 'text-gray';}?>" href="<?php echo $this->options->siteUrl.$this->options->routingTable['archive']['url'] ?>">
                    <i class="fa fa-book"></i> 文章 </a>
            </li>
            <?php } else {?>
                <li class="nav-item">
                <a class="nav-link nav-link-icon <?php if ($this->is('index')){echo 'text-default';}else{echo 'text-gray';}?>" href="<?php $this->options->siteUrl();?>">
                    <i class="fa fa-book"></i> 博客 </a>
            </li>
            <?php } ?>
            <?php $this->widget('Widget_Contents_Page_List')->to($pagelist);
                while ($pagelist->next()): ?>
            <li class="nav-item">
                <a class="nav-link nav-link-icon <?php if ($this->is('page', $pagelist->slug)){echo 'text-default';}else{echo 'text-gray';}?>" href="<?php echo $pagelist->permalink ?>">
                    <?php if ($pagelist->fields->pageIcon != '') {?>
                    <i class="<?php echo $pagelist->fields->pageIcon ?>"></i>
                    <?php } ?>
                <?php echo $pagelist->title ?> </a>
            </li>
            <?php endwhile;?>
        </ul>
    </div>
</nav>

<div id="body">
    <div class="container">
        <div class="row">