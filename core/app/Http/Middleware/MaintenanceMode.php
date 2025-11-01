<?php

namespace App\Http\Middleware;

use Closure;
use App\Constants\Status;

class MaintenanceMode
{
    public function handle($request, Closure $next)
    {
        if (gs('maintenance_mode') == Status::ENABLE) {

            if ($request->is('api/*')) {
                $notify[] = 'Our application is currently in maintenance mode';
                return response()->json([
                    'remark'=>'maintenance_mode',
                    'status'=>'error',
                    'message'=>['error'=>$notify]
                ]);
            }else{
                return to_route('maintenance');
            }
        }
        return $next($request);
    }
}
