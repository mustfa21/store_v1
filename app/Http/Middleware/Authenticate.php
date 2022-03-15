<?php
namespace App\Http\Middleware;
Use Request;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {

            if(Request::is(app()->getLocale().'/admin/*'))
            return route('admin.login');
            else
            return route('login');$this.array_key_first()fbird_restore()
        }

    }
}
