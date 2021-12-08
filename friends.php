<?php
/**
 * Sky 友情链接
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="col mt-5 animate__animated animate__fadeIn" id="main" role="main">
    <article>
        <h1 class="font-weight-bold post-title">友情链接</h1>
		<hr>
		<?php echo exContent($this->content); ?>
		<div class="row">
			<?php 
			Links_Plugin::output($pattern='
			<div class="col-12 col-sm-6 col-md-4 pt-2 pb-2">
				<a class="friend btn btn-secondary btn-lg text-left w-100" role="button" href="{url}" target="_blank">
        			<img class="avatar position-absolute" src="{image}" alt="{name}"">
        		    <div class="position-relative text-capitalize text-truncate ml-6">
        		    	<span class="font-weight-900">{name}</span> <br>
						<span class="text-gray">{description}</span>
        		    </div>
				</a>
        	</div>
			', $links_num=0, $sort='friends'); ?>
		</div>
        
    </article>
</div>
<?php $this->need('footer.php');
?>