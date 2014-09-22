
<?php

class BaseModel extends Eloquent {
    public $timestamps = false;
    public function getDateTime($attr) {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->$attr);
    }
    public function getDate($attr) {
        return Carbon\Carbon::createFromFormat('Y-m-d', $this->$attr);
    }
    public function getFormatedDate($attr, $format) {
        if(empty($this->$attr)) return null;
        $dt = Carbon\Carbon::createFromFormat('Y-m-d', $this->$attr);
        return $dt->format($format);
    }
}
