<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSlugConflict
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
public function handle($request, Closure $next, $exclude = null)
{
    $slug = $request->route('slug');

    if ($exclude && in_array($slug, [$exclude, $exclude.'/en', $exclude.'/id'])) {
        return redirect('/locale/'.str_replace('locale/', '', $slug));
    }

    return $next($request);
}
}
