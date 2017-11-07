                </div><!-- #content-->                          
                        
                <div id="copyright">
                        <div id="copyright-text" class="small">
<p>All rights reserved. Design by <a target="_blank" href="http://gettinder.net">gettinder.net</a></p>                       
                        
                        </div>
                </div><!-- #copyright -->  
	
        </div><!-- #contentwrap-->        

</div><!-- #wrapper -->

<?php if ( of_get_option('gg_bg_image_custom') ) { ?>
</div><!-- #bg-image -->
<?php } ?>

<?php if ( of_get_option('gg_bg_image_custom') && of_get_option('gg_bg_position') == 'stretched' ) { ?>
       <script type="text/javascript">jQuery.backstretch("<?php echo of_get_option('gg_bg_image_custom'); ?>");</script>
<?php } ?>

<?php wp_footer();  ?>

</div><!-- #page-wrap -->

</body>

</html>