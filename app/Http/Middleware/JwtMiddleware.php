<?php
namespace App\Http\Middleware;

//use App\Models\Account;
use Closure;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $token = $request->bearerToken();

        if(!$token) {
            // Unauthorized response if token not there
            return response()->json([
                'error' => 'Token not provided.'
            ], Response::HTTP_UNAUTHORIZED);
        }
        try {
            $credentials = JWT::decode($token, 'JhbGciOiJIU', ['HS256']);

            if($credentials->iss == "lumen-jwt")
            {
                if(Cache::has($token)){
                    $user = Cache::get($token);
                }else{
                    $user = \App\Models\User::find($credentials->sub);
                }

                if ($user->id == $credentials->sub && $token != $user->remember_token){

                    //TODO: executar evento que reporta tentativa de ataque

                    return response()->json([
                        'error' => 'Tentativa XSS Cross-Site Scripting detectado. [xss]'
                    ], Response::HTTP_UNAUTHORIZED);
                }

                $account_id = $user->account->id;

                if(!Cache::has('account_'.$account_id)){
                    Cache::rememberForever('account_'.$account_id, function () use ($user){
                        return $user->account;
                    });
                }
                return $next($request);
            }

            elseif ($credentials->iss == "bridge") {
                if(!Cache::has('bridge_'.$token))
                {
                    $user = \App\Models\User::find($credentials->sub);
                    $api_token = \App\Models\ApiToken::query()->where(['user_id' => $user->id, 'token' => $token])->get();

                    if($api_token->isNotEmpty())
                    {
                        $account_id = $user->account->id;

                        if(!Cache::has('account_'.$account_id)){
                            Cache::rememberForever('account_'.$account_id, function () use ($user){
                                return $user->account;
                            });
                        }

                        Cache::rememberForever('bridge_'.$token, function () use ($user){
                            return $user;
                        });
                    }else{
                        return response()->json([
                            'error' => 'Token de acesso bridge inválido.'
                        ], Response::HTTP_UNAUTHORIZED);
                    }
                }else{
                    return $next($request);
                }
            }
            else{

                return response()->json([
                    'error' => 'Acesso restrito apenas para Administradores'
                ], Response::HTTP_FORBIDDEN);
            }

        } catch(ExpiredException $e) {
            return response()->json([
                'error' => 'O token expirou.'
            ], Response::HTTP_UNAUTHORIZED);

        } catch(Exception $e) {
            return response()->json([
                'error' => 'Não foi possível decodificar o token.',
                'exception' => $e->getMessage()
            ], Response::HTTP_UNAUTHORIZED);
        }
    }
}