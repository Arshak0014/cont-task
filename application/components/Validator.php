<?php


namespace application\components;


class Validator
{
    public $rules = [];

    public function __construct($rules)
    {
        $this->rules = $rules;
    }

    public function validate()
    {
        $rules = $this->rules;
        if (!empty($rules)) {
            $data = [];

            if (isset($rules['required'])) {
                $required = $rules['required'];
                foreach ($required as $key=>$value){
                    if ($value == '') {
                        $data[$key] = ucfirst(str_replace('_', ' ', $key).' is required');
                    }
                }
                if (!empty($data)) {
                    return $data;
                }
            }
        }
        return [];
    }
}