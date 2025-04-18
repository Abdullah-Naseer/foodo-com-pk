<?php

namespace App\Helpers;

use App\Models\History;
use Illuminate\Support\Facades\Request;

class LogActivity

{
    public static function addToLog($entity, $action, $values = null, $changes = null)
    {
        if ($values && is_array($values)) {
            unset($values['_token']);
        }

        $log = [];
        $log['entity'] = $entity;
        $log['action'] = $action;
        $log['values'] = $values ? json_encode($values) : null;
        $log['changes'] = $changes ? json_encode($changes) : null;
        $log['url'] = Request::fullUrl();
        $log['method'] = Request::method();
        $log['ip'] = Request::ip();
        $log['agent'] = Request::header('user-agent');
        $log['user_id'] = auth()->check() ? auth()->user()->id : null;

        History::create($log);
    }

}
