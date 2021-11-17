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

    <!-- FontAwesome Icons -->
    <link href="//cdn.staticfile.org/font-awesome/5.15.3/css/all.css" rel="stylesheet">

    <!-- JS: jQuery & popper & bootstrap -->
    <!-- <script src="<?php #$this->options->themeUrl('/assets/js/core/jquery.min.js');?>"></script> -->
    <script src="//cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
    <script src="<?php $this->options->themeUrl('/assets/js/core/popper.min.js');?>"></script>
    <!-- <script src="<?php #$this->options->themeUrl('/assets/js/core/bootstrap.min.js');?>"></script> -->
    <script src="//cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>

    <!-- lately.js -->
    <!-- <script src="<?php #$this->options->themeUrl('/assets/js/lately.js');?>"></script> -->

    <!-- Argon Theme CSS & JS-->
    <link type="text/css" href="<?php $this->options->themeUrl('/assets/css/argon-design-system.css')?>" rel="stylesheet">
    <script src="<?php $this->options->themeUrl('/assets/js/argon-design-system.min.js');?>"></script>

    <!-- Sky CSS-->
    <link type="text/css" href="<?php $this->options->themeUrl('/assets/style.css')?>" rel="stylesheet">

    <!-- Highlight.js via jsDelivr -->
    <!-- <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.1.0/build/styles/atom-one-dark.min.css">
    <script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.1.0/build/highlight.min.js"></script>
    <script>hljs.highlightAll();</script> -->

    <!-- Darkreader.js via jsDelivr -->
    <script src="//cdn.jsdelivr.net/npm/darkreader@latest/darkreader.min.js"></script>
    <script>DarkReader.auto({brightness:100, contrast:90, sepia:10});</script>
    
    <!-- KaTeX css via jsDelivr-->
    <!-- <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/katex@latest/dist/katex.min.css"> -->

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
        <a class="badge badge-default ml-1 mr-1" href="<?php $this->options->siteUrl('admin/manage-posts.php?status=draft'); ?>" title="Drafts">
            <i class="far fa-edit"></i>
            <?php _e('草稿箱'); ?>
        </a>
        <a class="badge badge-default ml-1 mr-1" href="<?php $this->options->siteUrl('admin/options-theme.php'); ?>" title="Settings">
            <i class="far fa-cog"></i>
            <?php _e('主题设置'); ?>
        </a>
        <a class="badge badge-secondary ml-1 mr-1" href="#" onclick="javascript:location.reload();" title="Refresh">
            <i class="fas fa-redo"></i>
            <?php _e('刷新'); ?>
        </a>
        <a class="badge badge-secondary ml-1 mr-1" href="<?php $this->options->logoutUrl(); ?>" title="Logout">
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
    <nav class="container navbar navbar-light navbar-expand-lg">
        <!-- 这里好像是 Argon 的 bug，如果写 navbar-expand-sm 的话屏幕大小在一定范围内导航栏会消失 -->
        <!-- 其实更喜欢原生 Bootstrap5 的折叠样式而非 Argon 的浮窗样式。如果删除 navbar-expand-lg 的 class 就会调用折叠样式，只可惜没法自适应 -->
        <a></a> <!-- 十分简陋的处理方式，为了让 × 符号在右边 -->
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
            <!-- <p>&copy; <?php #echo date('Y');?> <?php #$this->options->title(); ?> ♥ <?php #Typecho_Widget::widget('Widget_Stat')->to($stat); ?><?php #$stat->publishedPostsNum() ?> Posts <?php #allOfCharacters();?> Words crafted</p> -->
            <p>&copy; <?php echo date('Y');?> <?php $this->options->title(); ?> <i class="fas fa-heart text-danger"></i> <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?><?php $stat->publishedPostsNum() ?> Posts <?php allOfCharacters();?> Words crafted</p>
            <p>Powered by <a href="https://www.typecho.org">Typecho</a> | Theme <a href="https://skywt.cn/sky-theme">Sky</a> by <a href="https://skywt.cn/">SkyWT</a></p>
        </div>
    </div>
</footer><!-- end #footer -->

<?php $this->footer(); ?>

</body>
</html>