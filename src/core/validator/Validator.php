<?php
namespace  Bba\core\Validator;

class Validator {
    public array $errors=[];
    public function isEmpty(string $nameField, string $sms = "champ obligatoire")
{
    if (empty(trim($_REQUEST[$nameField]))) {
        $this->errors[$nameField]=$sms;
        return true;
    }
    return false;
}
 

public function validate( array $errors):bool
{
   return empty($errors);
}





}