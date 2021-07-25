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
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        Hi! 这是一个正在开发中的网站。原网站：<a class="text-secondary" href="https://skywt.cn/">skywt.cn</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
	<?php while($this->next()): ?>
    <article class="mt-5 mb-5" itemscope itemtype="http://schema.org/BlogPosting">
		<h1 class="font-weight-bold post-title" itemprop="name headline">
		    <a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
		</h1>
		<!--<div class="post-meta" role="meta">-->
		<!--	<span class="nav-item"><i class="czs-calendar"></i><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></span>-->
		<!--	<?php if (count($this->tags) > 0) { ?>-->
  <!--          <span class="nav-item"><i class="czs-tag"></i><?php $this->tags(",",true,'aa'); ?></span>-->
  <!--          <?php } ?>-->
  <!--          <?php if ($this->commentsNum > 0) {?>-->
  <!--          <span class="nav-item"><i class="czs-comment"></i><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('0 评', '1 评', '%d 评');?></a></span>-->
  <!--          <?php } ?>-->
  <!--      </div>-->
        <div class="summary post-content" itemprop="articleBody">
    		<?php $this->content('More...'); ?>
        </div>
    </article>
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
