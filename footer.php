<?php
/** Standard footer for all pages */
?>
<div id="footer" role="footer">

<div id="sidebar-3">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-3') ) : ?>
<?php endif; ?>
</div> <!-- end #sidebar-3 -->

<div id="sidebar-4">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-4') ) : ?>
<?php endif; ?>
</div> <!-- end #sidebar-4 -->

</div> <!-- end #footer -->

<?php wp_footer(); ?>

<script type="text/javascript">

    jQuery(function(){
     jQuery(window).resize(function(){
         if(jQuery(this).width() >= 1025){
             var s = skrollr.init();
         }
      })
      .resize();//trigger resize on page load
});
</script>

</body>
</html>