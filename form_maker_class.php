<?php 

class form_maker{
	
	public $fields = array();

	public function __construct($fields){
	  $this->fields = $fields;
	}


	public function validate_form($fields, $post_array){
		foreach($fields as $field){

			$name 		   = $field['name'];
			$required      = $field['required'];
			
			if($required){
				if($post_array[$name] == ""){
					echo 'You must enter a title';
				}
				
			}
		
			// foreach($post_array as $key => $value){
			//     if($key
			//     $name 
			// }
		}
		// return true;
	}


	/**
	 * create_form 
	 * @param  [array] $fields
	 * @return [string] 
	 */
	public function create_form($fields){
		
		foreach($fields as $field){
			
			// get all field properties
			$type          = $field['type'];
			$name 		   = $field['name'];
			$label 	       = $field['label'];
			$id 		   = $field['id'];
			$value 		   = $field['value'];
			$placeholder   = $field['placeholder'];
			$required 	   = $field['required'];
			$checked       = $field['checked'];
			$disabled 	   = $field['disabled'];
			$maxlength 	   = $field['maxlength'];
			$options	   = $field['options'];
			
			// setup universal attributes
			$atts = "";
			$atts .= $name ? 'name="'.$name.'" ': null;
			$atts .= $id ? 'id="'.$id.'" ': null;
			$atts .= $required ? 'required="'.$required.'" ': null;
			$atts .= $checked ? 'checked="'.$checked.'" ': null;
			$atts .= $disabled ? 'disabled="'.$disabled.'" ': null;
			$atts .= $maxlength ? 'maxlength="'.$maxlength.'" ': null;

			// setup other rules
			$placeholder = $placeholder ? 'placeholder="'.$placeholder.'" ': null;	
			
			// Setup the fields
			$input .= '<fieldset style="border:0;">';
				// create the label
				if($label){
					$input .= '<label for="'.$id.'">'.$label.'</label>';
				}

				// create any input field
				if($type == "input" || $type == "submit"){	
						
					$input .= '<input type="'.$type.'" '.$atts.' '.$placeholder.'  value="'.$value.'"/>';
				} 

				// create any textarea field
				else if($type == "textarea" ){
					$input .= '<textarea '.$atts.' '.$placeholder.'>'.$value.'</textarea>';
				}

				// create any select field
				else if($type == "select"){
					$input .= '<select '.$atts.'>';
					foreach($options as $option){
						if($value == $option){ $selected = 'selected="selected" ';} else { $selected = ''; }
						$input .= '<option value="'.$option.'" '.$selected.'>'.$option.'</option>';		
					}
					$input .= '</select>';
				}
				// if field is required
				if($type == "textarea" ){
					$input .= '<p>This field is required </p>';
				}

				
			$input .= '</fieldset>';					
		}
		
		// Build Final Form
		$form = '<form action="" method="post">'.$input.'</form>';
		return $form;
	}
}

?>

