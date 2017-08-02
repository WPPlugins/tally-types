<?php
/**
 * @package Tally Types
 *
 * Custom functions for building metabox form fields.
**/


/*	sanitize function
--------------------------------------*/
function tallytypes_mb_field_sanitize($sanitize, $value){
	global $allowedposttags;
	
	$tags = $allowedposttags;
	
	$tags['iframe'] = array(
		'src' => true,
		'width' => true,
		'height' => true,
		'frameborder' => true,
		'style' => true,
		'allowfullscreen' => true,
		'class' => true,
		'id' => true,
	);
	
	if(function_exists($sanitize)){
		if($sanitize == 'wp_kses'){
		   $value = $sanitize($value, $tags);
		}else{
			$value = $sanitize($value);
		}
	}
	
	return $value;
}


/*	default arguments of fields
--------------------------------------*/
function tallytypes_mb_field_default_arguments(){
	return array(
		'id' => '',
		'name' => '',
		'title' => '',
		'des' => '',
		'class' => '',
		'value' => '',
		'choices' => '',
		'type' => '',
		'rows' => '4',
		'sanitize' => 'wp_kses',
		'items' => '',
	);
}


/*	Before after function of fields
--------------------------------------*/
function tallytypes_mb_field_before($id, $title, $class){
	echo '<div class="tallytypes_mb_field '.$class.'">';
		echo '<label for="'.$id.'">'.$title.'</label>';
}

function tallytypes_mb_field_after($des){
		echo '<span class="des">'.$des.'</span>';
	echo '</div>';
}



/*	Save function of fields
--------------------------------------*/
function tallytypes_mb_field_save($post_id, $arg){
	extract(array_merge( tallytypes_mb_field_default_arguments(), $arg ));
	
	if ( isset( $_POST[$id] ) ){
		update_post_meta( $post_id, $id, $_POST[$id] );
		
	}
}




/*	Text
--------------------------------------*/
function tallytypes_mb_field_text($arg){
	extract(array_merge( tallytypes_mb_field_default_arguments(), $arg ));
	if($name == ''){ $name = $id; }
	
	tallytypes_mb_field_before($id, $title, $class);
		echo '<input type="text" name="'.$name.'" id="'.$id.'" value="'.tallytypes_mb_field_sanitize($sanitize, $value).'">';	
	tallytypes_mb_field_after($des);
}


/*	Color
--------------------------------------*/
function tallytypes_mb_field_color($arg){
	extract(array_merge( tallytypes_mb_field_default_arguments(), $arg ));
	if($name == ''){ $name = $id; }
	
	tallytypes_mb_field_before($id, $title, $class);
		echo '<input type="text" name="'.$name.'" id="'.$id.'" value="'.tallytypes_mb_field_sanitize($sanitize, $value).'" class="tt_color">';	
	tallytypes_mb_field_after($des);
}


/*	Select
--------------------------------------*/
function tallytypes_mb_field_select($arg){
	extract(array_merge( tallytypes_mb_field_default_arguments(), $arg ));
	if($name == ''){ $name = $id; }
	
	/* doing some data validation for Database output */
	$d_value = tallytypes_mb_field_sanitize($sanitize, $value);

	tallytypes_mb_field_before($id, $title, $class);
		if(is_array($choices)){
			echo '<select name="'.$name.'" id="'.$id.'">';
				foreach($choices as $choice){
					/* doing some data validation for user input */
					$c_value = tallytypes_mb_field_sanitize($sanitize, $choice['value']);
					echo '<option value="'.$c_value.'" '.selected( $d_value, $c_value, false ).'>'.$choice['title'].'</option>';
				}
			echo '</select>';
		}	
	tallytypes_mb_field_after($des);
}



/*	Textarea
--------------------------------------*/
function tallytypes_mb_field_textarea($arg){
	extract(array_merge( tallytypes_mb_field_default_arguments(), $arg ));
	if($name == ''){ $name = $id; }

	tallytypes_mb_field_before($id, $title, $class);
		echo '<textarea type="text" name="'.$name.'" id="'.$id.'" rows="'.$rows.'">'.tallytypes_mb_field_sanitize($sanitize, $value).'</textarea>';
		
	tallytypes_mb_field_after($des);
}


/*	Image Upload
--------------------------------------*/
function tallytypes_mb_field_image_upload($arg){
	extract(array_merge( tallytypes_mb_field_default_arguments(), $arg ));
	if($name == ''){ $name = $id; }

	tallytypes_mb_field_before($id, $title, $class);		
		echo '<img id="'.$id.'-img" src="'. $value.'" width="200" /><br />';
		echo '<input type="text" class="tt-image-upload-field" name="'. $name.'" id="'. $id.'" value="'.tallytypes_mb_field_sanitize($sanitize, $value).'" />';
		echo '<input type="button" name="upload-btn" id="'. $id.'-upload-btn" class="button-primary tt-upload-btn" value="Upload Image" data-tt-input-field-id="#'. $id.'" data-tt-image-id="#'.$id.'-img">';
	tallytypes_mb_field_after($des);
}


/*	group
--------------------------------------*/
function tallytypes_mb_field_group($arg){
	extract(array_merge( tallytypes_mb_field_default_arguments(), $arg ));

	tallytypes_mb_field_before($id, $title, $class);
		if(is_array($items)){
			echo '<div class="ttmbf_group" id="ttmbf_group_'.$id.'">';
				if(is_array($value)){
					foreach($value as $key => $valu){
						echo '<div class="ttmbf_group_item">';
							echo '<div class="ttmbf_group_item_header">';
								echo '<span class="ttmbf_group_item_title">'.($valu['title'] ? $valu['title'] : '--').'</span>';
								echo '<a href="#" class="ttmbf_group_item_edit">Edit</a>';
								echo '<a href="#" class="ttmbf_group_item_delete">Delete</a>';
							echo '</div>';
							echo '<div class="ttmbf_group_item_content">';
								
								tallytypes_mb_field_text(array(
									'id' => $id.'title',
									'name' => $id.'['.$key.'][title]',
									'title' => "Title",
									'value' => $valu['title'],
									'class' => 'ttmbf_group_input_title',
								));
								foreach($items as $item){
									$item['value'] = (isset($valu[$item['id']])) ? $valu[$item['id']] : '';
									$item['name'] = $id.'['.$key.']['.$item['id'].']';
									$item['id'] = $id.'-'.$key.'-'.$item['id'];
									
									$field_function_name = 'tallytypes_mb_field_'.$item['type'];
									if(function_exists($field_function_name)){
										$field_function_name($item);
									}
								}
								echo '<input type="hidden" name="'.$id.'hidden[]" value="1">';
							echo '</div>';
						echo '</div>';
					}
				}
			echo '</div>';
			echo '<a href="#" class="button-primary ttmbf_add_new_group" id="ttmbf_add_new_group_'.$id.'">Add New</a>';
			
			echo '<div style="display:none;" id="ttmbf_group_temp_'.$id.'"></div>';
			
			echo '<div class="ttmbf_group_sample" style="display:none;" id="ttmbf_group_sample_'.$id.'">';
				echo '<div class="ttmbf_group_item">';
					echo '<div class="ttmbf_group_item_header">';
						echo '<span class="ttmbf_group_item_title">--</span>';
						echo '<a href="#" class="ttmbf_group_item_edit">Edit</a>';
						echo '<a href="#" class="ttmbf_group_item_delete">Delete</a>';
					echo '</div>';
					echo '<div class="ttmbf_group_item_content">';
						tallytypes_mb_field_text(array(
							'id' => $id.'title',
							'name' => $id.'[__s__][title]',
							'title' => "Title",
							'value' => '',
							'class' => 'ttmbf_group_input_title',
						));
						foreach($items as $item){
							$item['name'] = $id.'[__s__]['.$item['id'].']';
							$item['id'] = $id.'-__s__-'.$item['id'];
							
							$field_function_name = 'tallytypes_mb_field_'.$item['type'];
							if(function_exists($field_function_name)){
								$field_function_name($item);
							}
						
						}
						echo '<input type="hidden" name="'.$id.'[__s__][hidden]" value="1">';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		}
	tallytypes_mb_field_after($des);
	?>
    <script type="text/javascript">
		jQuery(document).ready(function($){
			$(".ttmbf_group_sample *").attr("disabled", true);
			
			$('#ttmbf_add_new_group_<?php echo $id; ?>').click(function(){			
				
				var ttmbf_section_count = $("#ttmbf_group_<?php echo $id; ?>").children().length+1;
				var ttmbf_empty_section = $('#ttmbf_group_sample_<?php echo $id; ?> .ttmbf_group_item').prop('outerHTML');
				var ttmbf_filter_empty_section = ttmbf_empty_section.replace(/__s__/gi, ttmbf_section_count);
		
				$("#ttmbf_group_<?php echo $id; ?>").append(ttmbf_filter_empty_section);
				
				$("#ttmbf_group_<?php echo $id; ?> *").attr('disabled', false);
				
				return false;
			});
			
			$( ".ttmbf_group" ).on('click', '.ttmbf_group_item_edit',function() {
				$(this).parent().next().toggle(400, 'linear');
			  	return false;
			});
			
			$( ".ttmbf_group" ).on('click', '.ttmbf_group_item_delete',function() {
				if(confirm("Are you sure? You are going to delete it.")){
					$(this).parent().parent().remove();
					return false;
				}
			});
			
			jQuery(".ttmbf_group").sortable({
				'tolerance':'intersect',
				'cursor':'pointer',
				'items':'.ttmbf_group_item',
				'placeholder':'placeholder',
				'nested': 'tbody'
			});
			//jQuery(".ttmbf_group").disableSelection();
		});
	</script>
    <?php
}


/*	Image size Select
--------------------------------------*/
function tallytypes_mb_field_image_size_select($arg){
	extract(array_merge( tallytypes_mb_field_default_arguments(), $arg ));
	if($name == ''){ $name = $id; }
	global $_wp_additional_image_sizes; 
	
	/* doing some data validation for Database output */
	$value = tallytypes_mb_field_sanitize($sanitize, $value);

	tallytypes_mb_field_before($id, $title, $class);
		echo '<select name="'.$name.'" id="'.$id.'">';
			echo '<option value="">--</option>';
			echo '<option value="thumbnail" '.selected($value, 'thumbnail').'>thumbnail</option>';
			echo '<option value="medium" '.selected($value, 'medium').'>medium</option>';
			echo '<option value="large" '.selected($value, 'large').'>large</option>';
			echo '<option value="full" '.selected($value, 'full').'>full</option>';
			foreach ( $_wp_additional_image_sizes as $item_key => $item ) { 
				echo '<option value="'.$item_key.'" '.selected($value, $item_key).'>'.$item_key.' ('.$item['width'].'x'.$item['height'].')</option>';		
			}
		echo '</select>';
	tallytypes_mb_field_after($des);
}



/*	Class of the metabox generator
--------------------------------------*/
class tallytypes_metabox{
	
	public $mb_id;
	public $mb_title;
	public $mb_post_type;
	public $mb_context;
	public $mb_priority;
	public $mb_fields;
	
	function __construct($arg){
		$arg = array_merge( array(
			'id' => '',
			'title' => '',
			'post_type' => 'post',
			'context' => 'normal',
			'priority' => 'default',
			'fields' => '',
		), $arg );
		
		$this->mb_id = $arg['id'];
		$this->mb_title = $arg['title'];
		$this->mb_post_type = $arg['post_type'];
		$this->mb_context = $arg['context'];
		$this->mb_priority = $arg['priority'];
		$this->mb_fields = $arg['fields'];
		
		add_action( 'add_meta_boxes', array($this, 'add_metabox') );
		add_action( 'save_post', array($this, 'save') );
	}
	
	
	function add_metabox(){
		add_meta_box(
			$this->mb_id,
			$this->mb_title,
			array($this, 'metabox_html'),
			$this->mb_post_type,
			$this->mb_context,
			$this->mb_priority
		);
	}
	
	
	function metabox_html($post){
		wp_nonce_field( '_'.$this->mb_id.'_nonce', $this->mb_id.'_nonce' );
		
		$fields = $this->mb_fields;
		if(is_array($fields)){
			foreach($fields as $field){
				$saved_value = get_post_meta($post->ID, $field['id'], true);
				if($saved_value != ''){
					$field['value'] = $saved_value;
				}
				
				$field_function_name = 'tallytypes_mb_field_'.$field['type'];
				if(function_exists($field_function_name)){
					$field_function_name($field);
				}
				
			}
		}
	}
	
	
	function save($post_id){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if ( ! isset( $_POST[$this->mb_id.'_nonce'] ) || ! wp_verify_nonce( $_POST[$this->mb_id.'_nonce'], '_'.$this->mb_id.'_nonce' ) ) return;
		if ( ! current_user_can( 'edit_post', $post_id ) ) return;
		
		$fields = $this->mb_fields;
		if(is_array($fields)){
			foreach($fields as $field){
				tallytypes_mb_field_save($post_id, $field);
			}
		}
	}
}