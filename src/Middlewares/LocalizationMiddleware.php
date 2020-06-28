<?php

namespace WebApp\Localization\Middlewares;

use Closure;

class LocalizationMiddleware
{
    public function handle($request, Closure $next)
    {
        $localeConfigs = config('localization');
        $requestedLang = strtolower($request->query($localeConfigs['query_var']));

        if(in_array($requestedLang, $localeConfigs['available_locales'])) {
            session([$localeConfigs['session_key'] => $requestedLang]);
        }

        if( ! session()->has($localeConfigs['session_key'])) {

            if( ! empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {

                $userLang = strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));

                if(in_array($userLang, $localeConfigs['available_locales'])) {

                    session([$localeConfigs['session_key'] => $userLang]);
                }
            }

            if( ! session()->has($localeConfigs['session_key'])) {

                session([$localeConfigs['session_key'] => $localeConfigs['fallback_locale'] ?: config('app.fallback_locale')]);
            }
        }
        
        app()->setLocale(session()->get($localeConfigs['session_key']));
        return $next($request);
    }
}
