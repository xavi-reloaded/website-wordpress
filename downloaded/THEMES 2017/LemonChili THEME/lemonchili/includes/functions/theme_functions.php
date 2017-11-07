<?php



/** AUTOMATICALLY ADD REL PRETTYPHOTO TO <A> TAGS THAT LINK TO AN IMAGE********/
add_filter('the_content', 'addlightboxrel_replace', 12);
add_filter('get_comment_text', 'addlightboxrel_replace');

function addlightboxrel_replace ($content) {
         global $post;
         $pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
         $replacement = '<a$1href=$2$3.$4$5 class="pretty_image" data-rel="prettyPhoto['.$post->ID.']"$6>$7</a>';
         $content = preg_replace($pattern, $replacement, $content);
         return $content;
}



/** PAGINATION ****************************************************************/
function gg_pagination($pages = '', $range = 2) {
     $showitems = ($range * 2)+1;

     global $paged;
     if ( empty($paged) ) $paged = 1;

     if ($pages == '') {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if (!$pages) {
             $pages = 1;
         }
     }

     if (1 != $pages) {
         echo "<div class='pagination_main'>";
         if ($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if ($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++) {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}



/** STYLE COMMENTS ************************************************************/
function gg_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        
        static $counter;
        if (!isset($counter))
        $counter = $args['per_page'] * ($args['page'] - 1) + 1;
        elseif ($comment->comment_parent==0) {
        $counter++;
        }
        
        ?>   
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        
                <div id="comment-<?php comment_ID(); ?>" class="single-comment">
                
                        <div class="comment-author vcard">
                           <?php echo get_avatar( $comment->comment_author_email, 40 ); ?>
                        </div>
                        
                        <div class="comment-body">
                                
                                <div class="comment-meta commentmetadata">
                                        <?php printf('<cite class="fn">%s</cite>', get_comment_author_link()) ?>
                                        <div class="comment-date">
                                                <?php comment_time('F jS, Y') ?>
                                        </div>                                  
                                </div>
                                
                                <div class="comment-text">
                                        <?php if ($comment->comment_approved == '0') : ?>
                                           <em class="moderation"><?php _e('Your comment is awaiting moderation.', 'gxg_textdomain') ?></em>
                                           <br />
                                        <?php endif; ?>
                                                    
                                        <?php comment_text() ?>
                                </div>
                        </div>

                        <span class="reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
                      	
                        <div class="comment-counter"><?php echo $counter; ?> </div>
                        <div class="comment-arrow"> &uarr; </div>
                        
                </div>
<?php
}





/** FONT-AWESOME **************************************************************/

// replace old icons with new ones
add_filter( 'widget_title', 'old_fa_replace' );
add_filter( 'widget_text', 'old_fa_replace' );
add_filter( 'the_content', 'old_fa_replace');
add_filter( 'the_title', 'old_fa_replace' );

function old_fa_replace ($content) {
        global $post;

        $pattern = array();
        $pattern[0] = '#icon-time#';
        $pattern[1] = '#icon-food#';
        
        $replacement = array();
        $replacement[0] = 'fa-clock-o';
        $replacement[1] = 'fa-cutlery';
        
        $content = preg_replace($pattern, $replacement, $content);
        return $content;
}


// icon code replacements
add_filter( 'widget_title', 'icon_replace' );
add_filter( 'widget_text', 'icon_replace' );
add_filter( 'the_content', 'icon_replace');
add_filter( 'the_title', 'icon_replace' );

function icon_replace ($content) {
         global $post;
         $pattern1 = '#<i class="icon-(.*?)"></i>#'; // replace icon- with fa fa-
         $pattern2 = '#\[i class=icon-(.*?)\]\[/i\]#'; // replace shortcode icon- with fa fa-
         $pattern3 = '#\[i class=fa-(.*?)\]\[/i\]#'; // replace shortcode old fa with fa fa-
         $pattern4 = '#\[fa-(.*?)\]#'; // replace shortcode fa- with fa fa-
         $replacement = '<i class="fa fa-$1"></i>';
         
         $content = preg_replace(array($pattern1, $pattern2, $pattern3, $pattern4 ), $replacement, $content);
         return $content;
}





/** ADD FILTER DROPDOWN FOR MENU CATEGORIES **************************************************/

function gxg_add_taxonomy_filters() {
    global $typenow;

    // an array of all the taxonomyies you want to display. Use the taxonomy name or slug
    $taxonomies = array('menu_category');

    // must set this to the post type you want the filter(s) displayed on
    if( $typenow == 'menu' ){

        foreach ($taxonomies as $tax_slug) {
            $tax_obj = get_taxonomy($tax_slug);
            $tax_name = $tax_obj->labels->name;
            $terms = get_terms($tax_slug);
            if(count($terms) > 0) {
                echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
                echo "<option value=''>Show All $tax_name</option>";
                foreach ($terms as $term) {

                    $current_tax_slug = isset( $_GET[$tax_slug] ) ? $_GET[$tax_slug] : false;

                    echo '<option value='. $term->slug, $current_tax_slug == $term->slug ? ' selected="selected"' : '','>' . $term->name .' </option>';
                }
                echo "</select>";
            }
        }
    }
}
add_action( 'restrict_manage_posts', 'gxg_add_taxonomy_filters' );