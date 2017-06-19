<?php
namespace Modules\System\Entities\Profiles;

use Modules\Core\Auth\Permissions\PermissibleTrait;
use Illuminate\Database\Eloquent\Model;

class EloquentProfile2Utility extends Model
{
    protected $primaryKey   = null;

    public $incrementing    = false;
    /**
     * {@inheritDoc}
     */
    protected $table = 'tbl_profile2utility';

    /**
     * {@inheritDoc}
     */
    protected $fillable = [
        'profile_id',
        'tab_id',
        'activity_id',
        'permission'
    ];
}