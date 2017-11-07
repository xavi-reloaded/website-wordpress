<?php
/**
 * Class for File Html element
 */
class Admin_Theme_Element_File extends Admin_Theme_Menu_Element
{

	protected $is_customized = Admin_Theme_Menu_Element::CUSTOMIZED; // file element is customized by default

	protected $option = array(
							'type' => Admin_Theme_Menu_Element::TYPE_FILE,
						);

	public function render() {

		wp_enqueue_style( 'thickbox' );
		wp_enqueue_script( 'thickbox' );
		ob_start();
		echo $this->getElementHeader();
		if ( get_option( $this->id ) != '' ) {
			$meta_image = get_option( $this->id );?>
			<div class="float-left image_wrap">
				<img src="<?php echo $meta_image ?>" alt="" id="image_file_rm_<?php echo $this->id; ?>" class="ox_img" title="<img src='<?php echo get_option( $this->id ) ?>' alt='' />"  />
			</div>
			<div id="file_deleted_file_rm_<?php echo $this->id; ?>">
				<div>
					<input type="button" name="file_rm_<?php echo $this->id; ?>" id="file_rm_<?php echo $this->id; ?>" class="button" value="Delete" />
				</div>
			</div>
		<?php }	?>
			<div class="image-label">
				<input type="button" id="file_up_<?php echo $this->id; ?>" class="button" value="<?php _e( 'Upload', 'retro' ) ?>" />
			</div>
			<div class="clearfix"></div>
		<?php
		echo $this->getElementFooter();
		$html = ob_get_clean();
		return $html;
	}


	public function save() {

		/**
		 * element value save by ajax
		 */
		// $keys = array_keys($_FILES);
		//
		// $i = 0;
		// foreach ($_FILES as $image)
		// {
		// if ($image['size'])
		// {
		// if (preg_match('/(jpg|jpeg|png|gif)$/', $image['type']))
		// {
		// $override = array('test_form' => false);
		// $file = wp_handle_upload($image, $override);
		// if(isset($file['url']))
		// {
		// update_option($keys[$i], $file['url']);
		// }
		// }
		// else
		// {
		// wp_die('No image was uploaded.');
		// }
		// }
		// $i++;
		// }
	}

	public function setStd( $std ) {
		if ( null === get_option( $this->getId(), null ) ) {
			add_option( $this->getId(), $std );
		}
		$this->option['std'] = $std;
		return $this;
	}

	public function add_customize_control( $wp_customize ) {
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $this->getId(), array(
			'label'    => $this->getName(),
			'section'  => $this->getCustomizeSection(),
			'settings' => $this->getId(),
		) ) );
	}
}
?>
