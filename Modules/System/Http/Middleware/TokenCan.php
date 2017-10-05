<?php

namespace Modules\System\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Contracts\Authentication;
use Modules\System\Entities\Users\UserInterface;
use Modules\System\Repositories\UserTokenRepository;

class TokenCan
{
    /**
     * @var UserTokenRepository
     */
    private $userToken;
    /**
     * @var Authentication
     */
    private $auth;

    public function __construct(UserTokenRepository $userToken, Authentication $auth)
    {
        $this->userToken = $userToken;
        $this->auth = $auth;
    }

    /**
     * @param Request $request
     * @param \Closure $next
     * @param string $permission
     * @return Response
     */
    public function handle(Request $request, \Closure $next, $permission)
    {
        if ($request->header('Authorization') === null) {
            return new Response('Forbidden', Response::HTTP_FORBIDDEN);
        }

        $user = $this->getUserFromToken($request->header('Authorization'));

        if ($user->hasAccess($permission) === false) {
            return response('Unauthorized.', Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }

    /**
     * @param string $token
     * @return UserInterface
     */
    private function getUserFromToken($token)
    {
        $token = $this->userToken->findByAttributes(['access_token' => $this->parseToken($token)]);

        return $token->user;
    }

    /**
     * @param string $token
     * @return string
     */
    private function parseToken($token)
    {
        return str_replace('Bearer ', '', $token);
    }
}
