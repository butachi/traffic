<?php namespace Modules\System\Http\Controllers\Admin;

use Illuminate\Support\Facades\Request;
use Modules\Core\Permissions\PermissionManager;
use Modules\System\Http\Requests\RolesRequest;
use Modules\System\Repositories\ProfileRepository;

class ProfileController
{
    /**
     * @var ProfileRepository
     */
    private $profile;

    public function __construct(
        PermissionManager $permissions,
        ProfileRepository $profile)
    {
        $this->permissions = $permissions;
        $this->profile = $profile;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $profiles = $this->profile->paginate(20);

        return view('system::admin.profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('user::admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RolesRequest $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $this->mergeRequestWithPermissions($request);

        $this->role->create($data);

        flash(trans('user::messages.role created'));

        return redirect()->route('admin.user.role.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function edit($id)
    {
        if (!$profile = $this->profile->find($id)) {
            flash()->error(trans('system::messages.profile not found'));

            return redirect()->route('admin.system.profile.index');
        }

        return view('system::admin.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int          $id
     * @param  RolesRequest $request
     * @return Response
     */
    public function update($id, Request $request)
    {
        $data = $request->all();


        $this->role->update($id, $data);

        flash(trans('user::messages.role updated'));

        return redirect()->route('admin.user.role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int      $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->role->delete($id);

        flash(trans('user::messages.role deleted'));

        return redirect()->route('admin.user.role.index');
    }
}
