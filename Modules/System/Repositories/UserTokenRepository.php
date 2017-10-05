<?php

namespace Modules\System\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface UserTokenRepository extends BaseRepository
{
    /**
     * Get all tokens for the given user
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allForUser($userId);

    /**
     * @param int $userId
     * @return \Modules\System\Entities\Users\UserToken
     */
    public function generateFor($userId);
}
