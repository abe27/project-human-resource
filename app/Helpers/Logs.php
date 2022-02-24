<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Request;
use App\Models\ActivityRecord;

class Logs
{
    public static function log($subject)
    {
        $log = [];
        $log['subject'] = $subject;
        $log['urls'] = Request::fullUrl();
        $log['methods'] = Request::method();
        $log['address'] = Request::ip();
        $log['agent'] = Request::header('user-agent');
        $log['user_id'] = auth()->check() ? auth()->user()->id : 1;
        ActivityRecord::create($log);
    }

    public static function ActivityLists()
    {
        return ActivityRecord::latest()->get();
    }
}
