<?php
namespace Modules\Core\Auth\Cookies;

use Illuminate\Cookie\CookieJar;
use Illuminate\Http\Request;

class IlluminateCookie implements CookieInterface
{
    /**
     * The current request.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * The cookie object.
     *
     * @var \Illuminate\Cookie\CookieJar
     */
    protected $jar;

    /**
     * The cookie key.
     *
     * @var string
     */
    protected $key = 'butachi_bebuti';

    /**
     * Create a new Illuminate cookie driver.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Illuminate\Cookie\CookieJar $jar
     * @param  string $key
     * @return \Modules\Core\Auth\Cookies\IlluminateCookie
     */
    public function __construct(Request $request, CookieJar $jar, $key = null)
    {
        $this->request = $request;

        $this->jar = $jar;

        if (isset($key)) {
            $this->key = $key;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function put($value)
    {
        $cookie = $this->jar->forever($this->key, $value);

        $this->jar->queue($cookie);
    }

    /**
     * {@inheritDoc}
     */
    public function get()
    {
        $key = $this->key;

        // Cannot use $this->jar->queued($key, function()) because it's not
        // available in 4.0.*, only 4.1+
        $queued = $this->jar->getQueuedCookies();

        if (isset($queued[$key])) {
            return $queued[$key];
        }

        return $this->request->cookie($key);
    }

    /**
     * {@inheritDoc}
     */
    public function forget()
    {
        $cookie = $this->jar->forget($this->key);

        $this->jar->queue($cookie);
    }
}
