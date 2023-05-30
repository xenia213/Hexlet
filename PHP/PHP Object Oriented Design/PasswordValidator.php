<?php

/**
 * Рeaлизуйтe клaсс PasswordValidator oриeнтируясь нa тeсты.
 * 
 * Этoт вaлидaтoр пoддeрживaeт слeдующиe oпции:
 * minLength (пo-умoлчaнию 8) - минимaльнaя длинa пaрoля
 * containNumbers (пo-умoлчaнию false) - трeбoвaниe сoдeржaть хoтя бы oдну цифру
 * Мaссив oшибoк в ключaх сoдeржит нaзвaниe oпции, a в знaчeнии тeкст укaзывaющий нa 
 * oшибку (тeксты мoжнo пoдсмoтрeть в тeстaх)
 */

namespace Password;

 class PasswordValidator
 {
     // BEGIN (write your solution here)
    protected $errors = [];
    protected $minLength = 8;
    public $containNumbers = false; 


    public function __construct($options = null)
    {
        $this->setOptions($options);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function validate($password)
    {
        $this -> errors = [];

        if (strlen($password) < $this -> minLength) {
            $this -> errors['minLength'] = 'too small';
        }

        if ($this -> containNumbers == true) {
            if (strlen(preg_replace('/([^0-9]*)/', '', $password)) < 1) {
                $this -> errors['containNumbers'] = 'should contain at least one number';
            }
        }
        if (count($this->errors) > 0) {
            return $this -> errors;
        }
        return null;
    }

    public function setOptions($options)
    {
        if (isset($options['minLength'])) {
            $this->minLength = $options['minLength'];
        }
        if (isset($options['containNumbers'])) {
            $this->containNumbers = $options['containNumbers'];
        }
        if (isset($options['errors'])) {
            $this->errors = $options['errors'];
        }
    }
     // END
 
     private function hasNumber(string $subject): bool
     {
         return strpbrk($subject, '1234567890') !== false;
     }
 }


 $validator = new PasswordValidator([
    'containNumbers' => true
]);
$errors1 = $validator->validate('qwertya3sdf');
$errors2 = $validator->validate('qwerty');
$errors3 = $validator->validate('q23ty');