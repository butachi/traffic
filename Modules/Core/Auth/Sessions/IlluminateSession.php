<?php
namespace Modules\Core\Auth\Sessions;

use Illuminate\Session\Store as SessionStore;

class IlluminateSession implements SessionInterface
{
    /**
     * The session store object.
     *
     * @var \Illuminate\Session\Store
     */
    protected $session;

    /**
     * The session key.
     *
     * @var string
     */
    protected $key = 'butachi_bebuti';

    /**
     * Create a new Illuminate Session driver.
     *
     * @param  \Illuminate\Session\Store $session
     * @param  string $key
     * @return \Modules\Core\Auth\Sessions\IlluminateSession
     */
    public function __construct(SessionStore $session, $key = null)
    {
        //dd($session);
        $this->session = $session;

        if (isset($key)) {
            $this->key = $key;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function put($value)
    {
        $this->session->put($this->key, $value);
    }

    /**
     * {@inheritDoc}
     */
    public function get()
    {
        return $this->session->get($this->key);
    }

    /**
     * {@inheritDoc}
     */
    public function forget()
    {
        $this->session->forget($this->key);
    }
}
