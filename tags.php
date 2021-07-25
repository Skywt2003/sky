<?php 
/**
* 标签云
*
* @package custom
*/
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<main>
    <section class="content">
        <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=100')->to($tags); ?>
        <!--<div class="meta">共有 <?php #$this->tag(); ?> 个标签</div>-->
        <?php if ($tags->have()): ?>
            <?php while ($tags->next()): ?>
                <a href="<?php $tags->permalink(); ?>" rel="tag"><?php $tags->name(); ?> (<?php $tags->count(); ?>)</a> / 
            <?php endwhile; ?>
        <?php else: ?>
            <?php _e('没有任何标签'); ?>
        <?php endif; ?>
    </section>
    <section class="pager">
        <div class="paginator pager pagination no_pages" >
            <div class="paginator_container pagination_container">
            </div>
        </div>
    </section>
</main>
</div>
<?php $this->need('footer.php'); ?>