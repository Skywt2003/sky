<?php
/**
 * Sky 文章归档
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="col mt-5 animate__animated animate__fadeIn" id="main" role="main">
    <article>
        <h1 class="font-weight-bold post-title">文章归档</h1>
        <?php Typecho_Widget::widget('Widget_Stat')->to($stat);?><?php $stat->publishedPostsNum() ?> 篇文章，<?php echo allOfCharacters();?> 文字。
        <hr>
        <?php echo exContent($this->content); ?>
        <form class="form-inline mb-3" id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
            <label class="sr-only" for="s">搜索文章</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
                <input type="text" id="s" name="s" class="form-control" placeholder="输入关键字搜索" />
            </div>
            <button type="submit" class="form-control btn btn-secondary">搜索</button>
        </form>
        <?php
            $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
            $year = 0; $mon = 0;
            while ($archives->next()):
                if (empty($archives->title) || $archives->title == " ") continue;
                $year_tmp = date('Y',$archives->created);
                $mon_tmp = date('m',$archives->created);
                if ($year != $year_tmp && $year > 0) $output .= '</ul>';
                if ($year != $year_tmp):
                    $year = $year_tmp;
                    $output .= '<h2>'. $year.'</h2><ul>';
                endif;
                $output .= '<li><span class="badge badge-secondary"><time>'.date('m-d ',$archives->created).'</time></span> <a href="'.$archives->permalink .'">'. $archives->title .'</a>';
                if ($archives->commentsNum > 0)  $output .= ' <span class="badge badge-secondary"><i class="far fa-comments"></i> '.$archives->commentsNum.'</span>';
                $output .= '</li>';
            endwhile;
            $output .= '</li>';
            echo $output;
        ?>
    </article>
</div>
<?php $this->need('footer.php');
?>