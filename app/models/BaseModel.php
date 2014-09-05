
<?php

class BaseModel extends Eloquent {
    public $timestamps = false;
    public function getDate($attr) {        
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->$attr.' 00:00:00');
    }
}
