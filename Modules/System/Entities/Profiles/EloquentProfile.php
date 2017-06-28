<?php
namespace Modules\System\Entities\Profiles;

use Modules\Core\Auth\Permissions\PermissibleTrait;
use Illuminate\Database\Eloquent\Model;

class EloquentProfile extends Model implements ProfileInterface
{
    protected $primaryKey = 'profile_id';

    public $incrementing = true;
    /**
     * {@inheritDoc}
     */
    protected $table = 'tbl_profile';

    /**
     * {@inheritDoc}
     */
    protected $fillable = [
        'profile_name',
        'description'
    ];


    /**
     * The Eloquent profile2utility model name.
     *
     * @var string
     */
    protected static $profile2UtilityModel = 'Modules\System\Entities\Profiles\EloquentProfile2Utility';

    /**
     * {@inheritDoc}
     */
    public function getProfileId()
    {
        return $this->getKey();
    }

    /**
     * The function get utility with profile id
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function utilities()
    {
        return $this->hasMany(static::$profile2UtilityModel, 'profile_id');
    }
}