<?php

namespace App\Traits; 


trait ValidationTrait {

    protected $validateFields;

    public function getValidData($asObj = true): array|object
    {
        $rules = $this->rules();
        $fields = $this->validate($rules);
        $dataToUpdate = array_filter($fields, function ($value) {
            return !is_null($value);
        });
        $this->validateFields = $dataToUpdate;
        
        if ($asObj) {
            return (object)$dataToUpdate;
        }else {
            return $dataToUpdate;
        }
    }

    public function clearForm(): void
    {
        if (!empty($this->validateFields)) {
            foreach ($this->validateFields as $key => $value) {
                $this->$key = '';
            }
        }
    }
}
