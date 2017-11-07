<!-- searchform-->
<div>
         <form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                 <div>
                         <input type="text" name="s" id="searchinput" value="<?php echo esc_attr_x( 'Search here &hellip;', 'placeholder', 'gxg_textdomain' ); ?>" onblur="if (this.value == '') {this.value = '<?php _e('Search here ...', 'gxg_textdomain') ?>';}" onfocus="if (this.value == '<?php _e('Search here ...', 'gxg_textdomain') ?>') {this.value = '';}"/>
                         <input type="submit" class="button1" id="search-button" value="<?php echo esc_attr_x( 'Go', 'placeholder', 'gxg_textdomain' ); ?>" />                         
                 </div>
         </form>
</div>

<div class="clear">
</div><!-- .clear-->