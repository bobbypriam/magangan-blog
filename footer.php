<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Kibar Magangan
 */
?>

	</div><!-- #content -->

	<footer id="colophon">
    <div class="container">
      <div class="row">
        <div class="col-md-4 pull-left">
          <img src="<?php echo get_template_directory_uri() . '/img/logo-kibar.png'; ?>" height="32" width="91">
          <p>
            Jalan Prof. Mohammad Yamin No 1, Menteng<br/>
            +62 21 2806 3921<br/>
            kibar@kibar.co.id
          </p>
        </div>
        <div class="col-md-2 pull-right text-right">
          <!-- [Google+] -->
          <div class="g-follow" data-annotation="bubble" data-height="24" data-href="https://plus.google.com/104392521195589992100" data-rel="publisher"></div>
        </div>
      </div>
    </div>
  </footer>
</div><!-- #page -->

<?php wp_footer(); ?>
	<script type="text/javascript">
	  (function() {
	    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	    po.src = 'https://apis.google.com/js/platform.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	  })();
	</script>
</body>
</html>
