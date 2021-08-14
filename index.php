<?php
/**
 * Sky 是一个简洁多彩的 Typecho 主题。
 * 
 * @package Sky
 * @author SkyWT
 * @version 1.0
 * @link https://skywt.cn/sky-theme/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
    $this->need('header.php');
?>

<div class="col mt-5" id="main" role="main">
    <?php if ($this->options->notification !='') { ?>
    <div class="alert alert-primary alert-dismissible fade show shadow" role="alert">
        <?php $this->options->notification(); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php } ?>
    
	<?php while($this->next()): ?>
    <article class="mt-5 mb-5" itemscope itemtype="http://schema.org/BlogPosting">
        <?php if ($this->fields->headPic !=''): ?>
            <img src=<?php $this->fields->headPic(); ?> class="img-fluid mx-auto d-block shadow rounded mb-3" alt="<?php $this->title(); ?>">
        <?php endif; ?>
        <div>
            <h1 class="font-weight-bold post-title" itemprop="name headline">
                <a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
		    </h1>
            <!-- <p class="text-gray">
                <time class="lately-a" datetime="<?php $this->date('c'); ?>" itemprop="datePublished" pubdate>Lately</time>
            </p> -->
        </div>
        <div class="summary post-content" itemprop="articleBody">
    		<?php $this->content('More...'); ?>
        </div>
    </article>
    <hr>
	<?php endwhile; ?>

    <!-- 210720 pageNav 的实现方式，有待改进 -->
    <?php $this->pageNav('&laquo;', '&raquo;', 3, '...', array(
        'wrapTag' => 'ul',
        'wrapClass' => 'pagination justify-content-center',
        'itemTag' => 'li',
        'currentClass' => 'active',
    )); ?>
    <script>
        $(document).ready(function(){
            $("ul.pagination li").addClass("page-item");
            $("ul.pagination li a").addClass("page-link");
        });
    </script>

</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
