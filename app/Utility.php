<?php

namespace App;

use Illuminate\Support\Facades\Auth;

class Utility
{
    public static function addCreate($paramObj)
    {
        if (Auth::guard('Admin')->check()) {
            $paramObj->created_at = date("Y-m-d H:i:s");
            $paramObj->created_by = Auth::guard("Admin")->user()->id;
            $paramObj->updated_at = date("Y-m-d H:i:s");
            $paramObj->updated_by = Auth::guard("Admin")->user()->id;
        }

        return $paramObj;
    }

    public static function addUpdate($paramObj)
    {
        if (Auth::guard('Admin')->check()) {
            $paramObj->updated_at = date("Y-m-d H:i:s");
            $paramObj->updated_by = Auth::guard("Admin")->user()->id;
        }

        return $paramObj;
    }
}
