<?php

namespace Modules\System\Entities\Users;

use Illuminate\Database\Eloquent\Model;

class UserToken extends Model
{
    protected $table = 'tbl_user_tokens';
    protected $fillable = ['user_id', 'access_token'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(EloquentUser::class);
    }
}
