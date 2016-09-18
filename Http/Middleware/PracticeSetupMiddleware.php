<?php

namespace Ignite\Settings\Http\Middleware;

use Closure;
use Ignite\Core\Contracts\Authentication;
use Ignite\Settings\Entities\Practice;
use Illuminate\Http\Request;

class PracticeSetupMiddleware {

    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * PracticeSetup constructor.
     * @param Authentication $auth
     */
    public function __construct(Authentication $auth) {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        if ($this->auth->check()) {
            $setup_route = 'settings.practice';
            $practice = Practice::first();
            if (empty($practice)) {
                if (!$request->isMethod('post')) {
                    $request->session()->flash('info', 'No practice defined please add one');
                }
                if ($request->route()->getName() != $setup_route) {

                    return redirect()->route($setup_route); //you should be here
                }
                return $next($request);
            }
            //make this available always
            config(['practice' => $practice->toArray()]);
            if ($request->session('clinic')) {
                config(['practice.clinic' => $request->cookie('clinic')]);
            } else {
                flash()->warning('Session expired. Try again');
                $request->session()->put('url.intended', $request->url());
                $this->auth->logout();
                // Redirect to the login page
                return redirect()->route('public.login');
            }

            return $next($request);
        }
        return $next($request);
    }

}
