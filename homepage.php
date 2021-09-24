<?php
/**
 * 网站首页
 *
 * @package index
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('functions.php'); // 不知道为啥，似乎模版页面不会自动引用 functions.php
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php $this->options->title(); ?></title>

    <link rel="apple-touch-icon" href="<?php $this->options->logoUrl() ?>">
    <link rel="shortcut icon" href="<?php $this->options->themeUrl('/assets/favicon.ico')?>" />
    <link rel="bookmark" href="<?php $this->options->themeUrl('/assets/favicon.ico')?>" type="image/x-icon"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link href="https://cdn.staticfile.org/font-awesome/5.15.3/css/all.css" rel="stylesheet">
    
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
    <!-- <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.1.0/build/styles/default.min.css">
    <script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.1.0/build/highlight.min.js"></script>
    <script>hljs.highlightAll();</script> -->

    <!-- Darkreader.js via jsDelivr -->
    <script src="https://cdn.jsdelivr.net/npm/darkreader@4.9.34/darkreader.min.js"></script>
    <script>DarkReader.auto({brightness:100, contrast:90, sepia:10});</script>

    <?php $this->header(); ?>
</head>
<!--[if lt IE 8]>
    <?php _e('当前网页不支持你正在使用的浏览器。为了正常访问, 请升级你的浏览器！'); ?>
<![endif]-->
<body>

<?php if ($this->user->hasLogin()): ?>
<nav class="container fixed-bottom p-2 navbar navbar-light">
    <div>
        欢迎，<a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>
        <a class="badge badge-default ml-1 mr-1" href="<?php $this->options->siteUrl('admin'); ?>" title="Backstage">
            <i class="fas fa-user-cog"></i>
            <?php _e('网站后台'); ?>
        </a>
        <a class="badge badge-default ml-1 mr-1" href="<?php $this->options->siteUrl('admin/options-theme.php'); ?>" title="Settings">
            <i class="far fa-cog"></i>
            <?php _e('主题设置'); ?>
        </a>
        <a class="badge badge-default ml-1 mr-1" href="#" onclick="javascript:location.reload();" title="Refresh">
            <i class="fas fa-redo"></i>
            <?php _e('刷新'); ?>
        </a>
        <a class="badge badge-default ml-1 mr-1" href="<?php $this->options->logoutUrl(); ?>" title="Logout">
            <i class="fas fa-sign-out-alt"></i>
            <?php _e('退出'); ?>
        </a>
    </div>
</nav>
<?php endif; ?>

<div class="flex-container">
    <header id="header" class="clearfix mb-4">
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
    <nav class="container navbar navbar-light navbar-expand-sm">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="col navbar-nav justify-content-center pr-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-icon text-gray" href="<?php $this->options->siteUrl();?>">
                        <i class="fa fa-home"></i> <?php _e('首页') ?>
                    </a>
                </li>
                <?php if (strpos($this->options->frontPage, 'file') !== FALSE) {?>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon text-gray" href="<?php echo $this->options->siteUrl.$this->options->routingTable['archive']['url'] ?>">
                        <i class="fa fa-book"></i> <?php _e('文章') ?>
                    </a>
                </li>
                <?php } ?>
                <?php $this->widget('Widget_Contents_Page_List')->to($pagelist);
                    while ($pagelist->next()): ?>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon text-gray" href="<?php echo $pagelist->permalink ?>">
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
<script>$(document).ready(function(){$(".navbar ul.navbar-nav li:last-child").addClass("mr-0");});</script>

<footer class="mt-5 mb-5" id="footer" role="footer">
    <div class="container">
        <hr>
        <div class="text-center">
            <p>
                <?php if ($this->options->nisInfo != ""): ?>
                <a id="nis" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=<?php echo mb_substr($this->options->nisInfo, 5, 14) ?>" target="_blank">
                    <?php echo $this->options->nisInfo ?>
                </a> | <?php endif; ?>
                <?php if ($this->options->icpInfo != ""): ?>
                <a href="https://beian.miit.gov.cn/" target="_blank"><?php echo $this->options->icpInfo ?></a>
                <?php endif; ?>
                <?php if ($this->options->bottomLinks != ""): ?>
                    <?php Links_Plugin::output($pattern=' | <a href="{url}" title="{title}" target="_blank">{name}</a>', $links_num=0, $sort=$this->options->bottomLinks); ?>
                <?php endif; ?>
            </p>
            <p>&copy; <?php echo date('Y');?> <?php $this->options->title(); ?> ♥ <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?><?php $stat->publishedPostsNum() ?> Posts <?php allOfCharacters();?> Words crafted</p>
            <p>Powered by <a href="https://www.typecho.org">Typecho</a> | Theme <a href="https://skywt.cn/sky-theme">Sky</a> by <a href="https://skywt.cn/">SkyWT</a></p>
        </div>
    </div>
</footer><!-- end #footer -->

<?php $this->footer(); ?>

</body>
</html>