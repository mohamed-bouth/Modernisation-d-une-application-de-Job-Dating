<?php

namespace Models;

class User extends BaseModel {
    
    protected array $attributes = [];
    protected $tableName = 'users';

    public function __set($key, $value)
    {

        if ($key === 'password') {
            $key = 'password_hash';
        }
        
        $this->attributes[$key] = $value;
    }

    public function __get($key)
    {
        return $this->attributes[$key] ?? null;
    }

    protected function getTable(): string
    {
        return $this->tableName;
    }

    public function save()
    {
        return $this->create($this->attributes);
    }
}
