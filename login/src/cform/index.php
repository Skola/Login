<?php
// Include CForm
include('CForm.php');

/**
* Create a class for a contact-form with name, email and phonenumber.
*/
class CFormContact extends CForm
{
 
/**
* Create all form elements and validation rules in the constructor.
*/
public function __construct()
{
parent::__construct();
 
$this->AddElement(new CFormElementText('name', array('label'=>'Namn på kontaktperson:', 'required'=>true)))
->AddElement(new CFormElementText('email', array('label'=>'E-post:','required'=>true)))
->AddElement(new CFormElementText('phone', array('label'=>'Telefon:','required'=>true)))
->AddElement(new CFormElementSubmit('submit', array('callback'=>array($this, 'DoSubmit'))))
->AddElement(new CFormElementSubmit('submit-fail', array('callback'=>array($this, 'DoSubmitFail'))));

$this->SetValidation('name', array('not_empty'))
->SetValidation('email', array('not_empty'))
->SetValidation('phone', array('not_empty', 'numeric'));
}
 
/**
* Callback for submitted forms, will always fail
*/
protected function DoSubmitFail()
{
echo "<p><i>DoSubmitFail(): Form was submitted but I failed to process/save/validate it</i></p>";
return false;
}


/**
* Callback for submitted forms
*/
protected function DoSubmit()
{
echo "<p><i>DoSubmit(): Form was submitted. Do stuff (save to database) and return true (success) or false (failed processing form)</i></p>";
return true;
}
 
}
// -----------------------------------------------------------------------
//
// Use the form and check its status.
//
session_name('cform_example');
session_start();
$form = new CFormContact();

// Check the status of the form
//$status = $form->Check();

 
// What to do if the form was submitted?
//if($status === true)
if($_POST['submit'])
{
echo "<p><i>Form was submitted and the callback method returned true. I should redirect to a page to avoid issues with reloading posted form.</i></p>";
}
// What to do when form could not be processed?
//else if($status === false)
else if ($_POST['submit-fail'])
{
echo "<p><i>Form was submitted and the callback method returned false. I should redirect to a page to avoid issues with reloading posted form.</i></p>";
}

?>

<!doctype html>
<meta charset=utf8>
<title>Example on using forms with Lydia CForm</title>
<!-- Echo out the form -->
<h1>Example on using forms with Lydia CForm</h1>
<?=$form->GetHTML()?>
<p><code>$_POST</code> <?php if(empty($_POST)) {echo '<i>is empty.</i>';} else {echo '<i>contains:</i><pre>' . print_r($_POST, 1) . '</pre>';} ?></p>