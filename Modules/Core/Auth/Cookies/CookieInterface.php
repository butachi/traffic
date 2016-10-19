<?php
namespace Modules\Core\Auth\Cookies;

interface CookieInterface
{
    /**
     * Put a value in the Sentinel cookie (to be stored until it's cleared).
     *
     * @param  mixed  $value
     * @return void
     */
    public function put($value);

    /**
     * Returns the Sentinel cookie value.
     *
     * @return mixed
     */
    public function get();

    /**
     * Remove the Sentinel cookie.
     *
     * @return void
     */
    public function forget();
}
