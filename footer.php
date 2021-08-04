<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->

<script>
    $(document).ready(function(){
        $("article .post-content img").addClass("img-fluid mx-auto d-block shadow rounded");
        $("article blockquote").addClass("shadow rounded");
        $("article pre").addClass("shadow rounded");
        $("table").addClass("table");
    });
    Lately({'target' : '.lately-a, .lately-b, .lately-c'});
</script>
<footer class="mt-5 mb-5" id="footer" role="footer">
    <div class="container">
        <hr>
        <div class="text-center">
            <p>
                <?php if ($this->options->nisInfo != "") {?>
                <a id="nis" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=<?php echo mb_substr($this->options->nisInfo, 5, 14) ?>" target="_blank">
                    <?php echo $this->options->nisInfo ?>
                </a> | <?php } ?>
                <?php if ($this->options->icpInfo != "") {?>
                <a href="https://beian.miit.gov.cn/" target="_blank"><?php echo $this->options->icpInfo ?></a> | <?php } ?>
                <a href="<?php $this->options->siteUrl();?>sitemap.xml">Sitemap</a> |
                <a href="<?php $this->options->siteUrl();?>links">Links</a>
            </p>
            <p>&copy; <?php echo date('Y');?> <?php $this->options->title(); ?> ♥ <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?><?php $stat->publishedPostsNum() ?> Posts <?php allOfCharacters();?> Words crafted</p>
            <p>Powered by <a href="https://www.typecho.org">Typecho</a> | Theme <a href="https://skywt.cn/sky-theme">Sky</a> by <a href="https://skywt.cn/">SkyWT</a></p>
        </div>
    </div>
</footer><!-- end #footer -->

<!--<pre><?php #print_r($this); ?></pre>-->

<?php $this->footer(); ?>

</body>
</html>
