<?php

namespace App\Models;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Offer extends Model
{
    use HasFactory;
    protected static function booted()
    {
        static::addGlobalScope(new TenantScope);

         //while creating a department this function will check for the tenant id in session
         static::creating(function($model){

            if(session()->has('tenant_id')){
            $model->tenant_id = session()->get('tenant_id');

            }
        });
    }
}
