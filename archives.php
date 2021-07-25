<?php
/**
 * Sky 文章归档
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="col mt-5" id="main" role="main">
    <article>
        <h1 class="font-weight-bold post-title">文章归档</h1>
        <p class="meta">
            共有 <?php Typecho_Widget::widget('Widget_Stat')->to($stat);?><?php $stat->publishedPostsNum() ?> 篇文章，<?php $this->allOfCharacters();?> 文字
        </p>
        <?php
            $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
            $year = 0;
            $mon = 0;
            $i = 0;
            $j = 0;
            while ($archives->next()):
            if (empty($archives->title) || $archives->title == " ") continue;
            $year_tmp = date('Y',$archives->created);
            $mon_tmp = date('m',$archives->created);
            $y = $year;
            $m = $mon;
            if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';
            if ($year != $year_tmp && $year > 0) $output .= '</ul>';
            if ($year != $year_tmp) {
                $year = $year_tmp;
                $output .= '<h2>'. $year .'</h2><ul class="archived-posts">';
                //输出年份
            }
            $output .= '<li> <time>'.date('m.d ',$archives->created).'</time> <a href="'.$archives->permalink .'">'. $archives->title .'</a>';
            if ($archives->commentsNum != 0): $output .= ' <span>'.$archives->commentsNum.'</span>'; endif;
            $output .= '</li>';
            //输出文章日期和标题
            endwhile;
            $output .= '</ul></li></ul>';
            echo $output;
        ?>
    </article>
</div>
<?php $this->need('footer.php');
?>