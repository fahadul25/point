<?php

namespace App\Traits;


trait BelongsToTenant
{   
    /**
     * The "boot" method of the model.
     *
     * @return void
     */
    protected static function bootBelongsToTanant()
    {
        static::addGlobalScope(new TenantScope);

         //while creating a department this function will check for the tenant id in session
         static::creating(function($model){

            if(session()->has('tenant_id')){
            $model->tenant_id = session()->get('tenant_id');

            }
        });
    }

    public function tenant(){
        return $this->belongsTo(Tenant::class);
    }
}