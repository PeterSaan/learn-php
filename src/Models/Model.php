<?php

namespace App\Models;

use App\Database;

class Model
{
    public static $table;
    public $id;

    public static function all() {
        $db = new Database();
        return $db->all(static::$table, static::class);
    }

    public static function find($id) {
        $db = new Database();
        return $db->find(static::$table, static::class, $id);
    }

    public function save(){
        $db = new Database();
        $fields = get_object_vars($this);
        unset($fields['id']);
        if($this->id){
            $db->update(static::$table, $fields, $this->id);
        } else {
            $db->insert(static::$table, $fields);
        }
    }
    
    public function delete(){
        $db = new Database();
        $db->delete(static::$table, $this->id);
    }
}