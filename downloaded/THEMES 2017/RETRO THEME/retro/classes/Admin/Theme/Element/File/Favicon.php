<?php
/**
 * Class for File Html element
 */
class Admin_Theme_Element_File_Favicon extends Admin_Theme_Element_File
{

	public function render() {

		if ( function_exists( 'wp_enqueue_media' ) ) {
			wp_enqueue_media();
		} else {
			wp_enqueue_style( 'thickbox' );
			wp_enqueue_script( 'thickbox' );
		}
		ob_start();
		echo $this->getElementHeader();
		$meta_image = get_option( $this->id );
		?>
		<div class="favicon_bg clearfix">

			<?php if ( $meta_image ) { ?>
				<img src="<?php echo $meta_image ?>" alt="" width="16" height="16" id="image_file_rm_<?php echo $this->id; ?>" class="ox_img" />
			<?php }	?>
			<div class="image-label float-left">
				<input type="button" id="file_up_<?php echo $this->id; ?>" class="button" value="<?php _e( 'Upload', 'retro' ) ?>" data-type="favicon" />
			</div>
			<?php if ( $meta_image ) {?>
				<div id="file_deleted_file_rm_<?php echo $this->id; ?>" class="float-left">
					<input type="button" name="file_rm_<?php echo $this->id; ?>" id="file_rm_<?php echo $this->id; ?>" class="button" value="Delete" data-type="favicon"/>
				</div>
			<?php }?>
		</div>
		<?php
		echo $this->getElementFooter();
		$html = ob_get_clean();
		return $html;

	}
}
?>
