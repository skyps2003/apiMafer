<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait Audit
{
    public static function bootAudit()
    {
        static::creating(function ($model) {
            $model->created_by = Auth::id();
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::id();
        });
    }
}
