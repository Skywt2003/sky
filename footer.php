<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->

<!-- Advanced styles -->
<script>
    $(document).ready(function(){
        $("article .post-content img").addClass("img-fluid mx-auto d-block shadow rounded");
        $("article blockquote").addClass("shadow rounded");
        $("article pre").addClass("shadow rounded");
        $("table").addClass("table");
        $(".aplayer").addClass("shadow");
    });
    /*
     * Fancybox settings
     * https://web.archive.org/web/20210325170940/https://fancyapps.com/fancybox/3/docs
     */
    $('[data-fancybox="gallery"]').fancybox({
        buttons: ["zoom", "slideShow", "fullScreen", "download", "thumbs", "close"],
        clickContent: function(current, event) {
            return "close";
        }
    });
</script>

<!-- lately.js -->
<script>Lately({'target' : '.lately'});</script>

<!-- KaTeX js -->
<script src="<?php $this->options->themeUrl('/assets/js/plugins/katex/katex.min.js');?>"></script>
<script src="<?php $this->options->themeUrl('/assets/js/plugins/katex/auto-render.min.js');?>"></script>
<script>
    function triggerRenderingLaTeX(element) {
        renderMathInElement(
            element,
            {
                delimiters: [
                    {left: "$$", right: "$$", display: true},
                    {left: "$", right: "$", display: false},
                ]
            }
        );
    }
    document.addEventListener("DOMContentLoaded", function() {
        triggerRenderingLaTeX(document.body);
    });
    document.addEventListener("DOMContentLoaded", function() {
        var wmdPreviewLink = document.querySelector("a[href='#wmd-preview']");
        var wmdPreviewContainer = document.querySelector("#wmd-preview");
        if(wmdPreviewLink && wmdPreviewContainer) {
            wmdPreviewLink.onclick = function() {
                triggerRenderingLaTeX(wmdPreviewContainer);
            };
        }
    });
</script>

<div class="position-fixed d-flex" style="right:20px; bottom:30px; z-index:100; flex-direction:column">
    <button type="button" class="btn btn-secondary btn-icon-only shadow mb-3" onclick="document.documentElement.scrollTo({top: 0, behavior: 'smooth'});">
        <i class="fas fa-arrow-up"></i>
    </button>
    <button type="button" class="btn btn-secondary btn-icon-only shadow mb-3" onclick="">
        <i class="fas fa-search"></i>
    </button>
    <!-- <button type="button" class="btn btn-secondary btn-icon-only shadow mb-3" onclick="">
        <i class="fas fa-qrcode"></i>
    </button> -->
    <!-- <button type="button" class="btn btn-secondary btn-icon-only shadow mb-3" onclick="">
        <i class="fas fa-share-alt"></i>
    </button> -->
    <button type="button" class="btn btn-secondary btn-tooltip btn-icon-only shadow" onclick="if (DarkReader.isEnabled()) DarkReader.disable(); else DarkReader.enable({brightness: 100, contrast: 90, sepia: 10});"
        data-toggle="tooltip" data-placement="left" title="✨ 你能听到星星的呼唤吗？" data-container="body" data-animation="true">
        <i class="fas fa-moon"></i>
    </button>
</div>

<footer class="mt-5 mb-5 animate__animated animate__fadeIn" id="footer" role="footer">
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
            <p>Powered by <a href="https://www.typecho.org">Typecho</a> | Theme <a href="https://github.com/Skywt2003/sky">Sky</a> by <a href="https://skywt.cn/">SkyWT</a></p>
            <?php $this->options->footerCode(); ?>
        </div>
    </div>
</footer><!-- end #footer -->

<!--<pre><?php #print_r($this); ?></pre>-->

<?php $this->footer(); ?>

</body>
</html>
