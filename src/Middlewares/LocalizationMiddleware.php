<?php

namespace WebApp\Localization\Middlewares;

use Closure;

class LocalizationMiddleware
{
    public function handle($request, Closure $next)
    {
        $localeConfigs = config('localization');
        $sessionKey = 'webCodeLocale';
        $requestedLang = strtolower($request->query($localeConfigs['query_var']));

        if(in_array($requestedLang, $localeConfigs['available_locales'])) {
            session([$sessionKey => $requestedLang]);
        }

        if( ! session()->has($sessionKey)) {

            if( ! empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {

                $userLang = strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));

                if(in_array($userLang, $localeConfigs['available_locales'])) {

                    session([$sessionKey => $userLang]);
                }
            }

            if( ! session()->has($sessionKey)) {

                session([$sessionKey => $localeConfigs['fallback_locale'] ?: config('app.fallback_locale')]);
            }
        }
        
        app()->setLocale(session()->get($sessionKey));
        return $next($request);
    }
}
