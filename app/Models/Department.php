<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\TenantScope;


class Department extends Model
{
    
    protected $guarded = [];

    //This function will tenant id to every department department so the department could be recognizable
    protected static function booted()
    {
        static::addGlobalScope(new TenantScope);
        //while creating a department this function will check for the tenant id in session
        static::creating(function($department){

            if(session()->has('tenant_id')){
            $department->tenant_id = session()->get('tenant_id');

            }
        });
    }
}
