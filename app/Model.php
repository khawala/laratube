<?php
//this my custom model not the default model
namespace Laratube;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
  protected $guarded=[];
public $incrementing = false;
protected static function boot()
{
    parent::boot();
    static::creating(function ($model){
$model->{$model->getKeyName()} = (string) Str::uuid();//this will search for the primary key of table and change it to be more secure with anothe uniq long key key
    });
}

}
