<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    protected $tabel = 'custom_fields';
    public $timestamps = false;
    protected $fillable = array('appraisalsId', 'customFieldTypeId', 'label', 'required');

    public function customFieldType(){
        return $this->belongsTo('App\CustomFieldType','customFieldTypeId');
    }

    public function appraisal(){
        return $this->belongsTo('App\Appraisal', 'appraisalsId');
    }
}
