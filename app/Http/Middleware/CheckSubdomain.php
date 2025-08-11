<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Company;
use Illuminate\Http\Request;

class CheckSubdomain
{
    public function handle(Request $request, Closure $next)
    {
        $subdomain = explode('.', $request->getHost())[0];
        
        $query = Company::where('subdomain', $subdomain)->first();
        if (is_null($query) && $subdomain != 'localhost' && $subdomain != 'www' && $subdomain != '127') {
            return response('Subdomain not found', 404);
        }
        return $next($request);
    }
}
