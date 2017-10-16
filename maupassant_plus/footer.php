		</div>
    </div>
</div>
<footer id="footer">
	<div class="container">

		&copy; <?php echo date('Y'); ?> <a rel="nofollow" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>. Powered by <a href="http://typecho.org">Typecho</a>.
	</div>
</footer>
<?php $this->footer(); ?>

<script type="text/x-mathjax-config">
  MathJax.Hub.Config({
    showProcessingMessages: false, //关闭js加载过程信息
    messageStyle: "none", //不显示信息 
    extensions: ["tex2jax.js"],
    jax: ["input/TeX", "output/HTML-CSS"],
    tex2jax: {
      inlineMath: [ ['$','$'], ["\\(","\\)"] ],
      displayMath: [ ['$$','$$'], ["\\[","\\]"] ],
      processEscapes: true
    },
    "HTML-CSS": { availableFonts: ["TeX"] }
  });
</script>


<script type="text/javascript" async
  src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.2/MathJax.js?config=TeX-MML-AM_CHTML">
</script>


<script src="<?php $this->options->themeUrl('javascript/instantclick.min.js'); ?>" data-no-instant></script>
<script data-no-instant>
    InstantClick.on('change', function(isInitialLoad) {
        if (isInitialLoad === false) {
            if (typeof MathJax !== 'undefined') 
                MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
            if (typeof Prism !== 'undefined'){<?php  if (Helper::options()->plugin('Prismjs')->showln): ?>
var pres = document.getElementsByTagName('pre');
                for (var i = 0; i < pres.length; i++){
                    if (pres[i].getElementsByTagName('code').length > 0)
                        pres[i].className  = 'line-numbers';}<?php endif; ?> 
                Prism.highlightAll(true,null);}
            if (typeof ga !== 'undefined') 
                ga('send', 'pageview', location.pathname + location.search);
        }
    });InstantClick.init('mousedown');</script>
</body>
</html>
