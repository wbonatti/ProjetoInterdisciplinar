
<?php

class BaseModel extends Eloquent {
    public $timestamps = false;
    public function getDateTime($attr) {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->$attr);
    }
    public function getDate($attr) {
        return Carbon\Carbon::createFromFormat('Y-m-d', $this->$attr);
    }
}
