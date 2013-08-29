<?php 

class form_maker{
	
	public $fields = array();

	public function __construct($fields){
	  $this->fields = $fields;
	}

	public function create_form($fields){
		
		foreach( $fields as $field ){
			/*
			* Get Attributes, separate based on importance
			*
			*/

			// 1 Type
			$type = $field['type'];
			
			// 2 Atts
			$name 			= $field['atts']['name'];
			$id 			= $field['atts']['id'];
			$placeholder 	= $field['atts']['placeholder'];
			$required 		= $field['atts']['required'];
			$checked 		= $field['atts']['checked'];
			$disabled 		= $field['atts']['disabled'];
			$maxlength 		= $field['atts']['maxlength'];

			// 3 Label		
			$label 	= $field['label'];


			/*
			* Set Attributes For Any of the following fields
			*
			*/
			$atts = "";
			$atts .= 'type="'.$type.'" ';
			$atts .= 'name="'.$name.'" ';
			$atts .= 'id="'.$id.'" ';
			$atts .= 'placeholder="'.$placeholder.'" ';
			$atts .= 'required="'.$required.'" ';
			//$atts .= 'checked="'.$checked.'"';
			//$atts .= 'disabled="'.$disabled.'"';
			$atts .= 'maxlength="'.$maxlength.'" ';


			/*
			* Call Input fields
			*
			*/

			// Input Field
			if ($type == "input"){
				
				$input .= '<fieldset style="border:0;">';
					
					if ( isset($label) ) {
						$input .= '<label for="'.$id.'">'.$label.'</label>';
					}

					// Build Input Field
					$input .= '<input '.$atts.' />';

				$input .= '</fieldset>';
			}

			// Textarea
			if ($type == "textarea"){
				
				$input .= '<fieldset style="border:0;">';
					
					if ( isset($label) ) {
						$input .= '<label for="'.$id.'">'.$label.'</label>';
					}

					// Build Input Field
					$input .= '<textarea '.$atts.'></textarea>';

				$input .= '</fieldset>';
			}

			// Submit Field
			if ($type == "submit"){
				
				$input .= '<fieldset style="border:0;">';
					
					if ( isset($label) ) {
						$input .= '<label for="'.$id.'">'.$label.'</label>';
					}

					// Build Input Field
					$input .= '<input '.$atts.' />';

				$input .= '</fieldset>';
			}
		}

		/*
		* Build Final Form
		*/
		$form = '<form action="" method="post">'.$input.'</form>';
		return $form;
	}
}


// setup the form fields in an array
$fields = array(
	array(
		'type'=>'input',
		'atts'=> array(
					'name'=>'first_name',
					'id'=>'first_name', // This is what links the Label and Input Field
					'placeholder'=>'First Name',
					'required'=>true,
					'maxlength'=>'7'
				),
		'label'=>'First Name'
	),
	array(
		'type'=>'textarea',
		'atts'=> array(
					'name'=>'last_name',
					'id'=>'last_name',
					'placeholder'=>'Last Name'
				),
		'label'=>'Last Name'
	),
	array(
		'type'=>'submit',
		'atts'=> array(
					'name'=>'submit',
					'id'=>'submit'
				)
	),

);


$form = new form_maker();
echo '<h1>Form (Update):</h1>';
echo $form->create_form($fields);


?>

