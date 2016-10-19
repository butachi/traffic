<?php
namespace Modules\Core\Auth\Sessions;

interface SessionInterface
{
    /**
     * Put a value in the Sentinel session.
     *
     * @param  mixed  $value
     * @return void
     */
    public function put($value);

    /**
     * Returns the Sentinel session value.
     *
     * @return mixed
     */
    public function get();

    /**
     * Removes the Sentinel session.
     *
     * @return void
     */
    public function forget();
}
