<?php

namespace application\Core;


class Validator
{
    protected $data;
    private $rules;


    /**
     * Validator constructor.
     * @param $data
     * @param array $rules
     */
    public function __construct($data, $rules = [])
    {
        $this->rules = $rules;
        $this->data = $data;
    }

    /**
     * @return array|bool
     */
    public function fails()
    {
        $validator = new \Valitron\Validator($this->data);
        $validator->mapFieldsRules($this->rules);
        $validator->validate();

        if ($errors = $validator->errors())
            session()->flashErrors($errors);

        return $errors;
    }
}