<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CheckTaskOwnership
{
    public function handle(Request $request, Closure $next)
    {
        $task = $request->route('task');

        if (!Gate::allows('update-task', $task)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
