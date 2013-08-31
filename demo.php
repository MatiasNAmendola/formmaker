<?php 

include('form_maker_class.php');
// create the form
$form = new form_maker();

// setup the form fields in an array
$fields = array(
	array(
		'type'=>'input',
		'name'=>'first_name',
		'label'=>'First Name',
		'id'=>'first_name',
		'placeholder'=>'First Name',
		'required'=>true,
		'maxlength'=>'7',
		'value'=> $_POST['first_name']
	),
	array(
		'type'=>'textarea',
		'name'=>'last_name',
		'id'=>'last_name',
		'placeholder'=>'Last Name',
		'label'=>'Last Name',
		'required'=>true,
		'value'=> $_POST['last_name']
	),
	array(
		'type'=>'input',
		'name'=>'dela23',
		'id'=>'deal',
		'placeholder'=>'deal Name',
		'label'=>'deal Name',
	),
	array(
		'type'=>'select',
		'name'=>'dela23',
		'id'=>'deal',
		'placeholder'=>'deal Name',
		'label'=>'deal Name',
		'options'=> array('Afghanistan','Albania','Algeria','American Samoa'),
		'value'=> $_POST['dela23']
	),
	array(
		'type'=>'submit',
		'name'=>'submit',
		'id'=>'submit',
		'value'=>'save'
	)
);

if(isset($_POST['submit'])){
	echo $form->validate_form($fields, $_POST);
	
	// $required = array('login', 'password', 'confirm', 'name', 'phone', 'email');


	// // blank array to hold emails
	// $emails = array();

	// echo $_POST;

	// foreach($_POST as $key => $value){
	//     echo $key.' '.$value;
	// }

}





echo '<h1>Form (Update):</h1>';
echo $form->create_form($fields);


?>

