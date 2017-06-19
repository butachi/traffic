<?php
namespace Modules\Core\Auth\Persistences;

interface PersistenceRepositoryInterface
{
    /**
     * Checks for a persistence code in the current session.
     *
     * @return string
     */
    public function check();

    /**
     * Finds a persistence by persistence code.
     *
     * @param  string  $code
     * @return \Modules\Core\Auth\Persistences\PersistenceInterface|false
     */
    public function findByPersistenceCode($code);

    /**
     * Finds a user by persistence code.
     *
     * @param  string  $code
     * @return \Modules\System\Entities\Users\UserInterface|false
     */
    public function findUserByPersistenceCode($code);

    /**
     * Adds a new user persistence to the current session and attaches the user.
     *
     * @param \Modules\Core\Auth\Persistences\PersistableInterface $persistable
     * @param  bool $remember
     * @return bool
     */
    public function persist(PersistableInterface $persistable, $remember = false);

    /**
     * Adds a new user persistence, to remember.
     *
     * @param  \Modules\Core\Auth\Persistences\PersistableInterface  $persistable
     * @return bool
     */
    public function persistAndRemember(PersistableInterface $persistable);

    /**
     * Removes the persistence bound to the current session.
     *
     * @internal param \Modules\Core\Auth\Persistences\PersistableInterface $persistable
     * @return bool|null
     */
    public function forget();

    /**
     * Removes the given persistence code.
     *
     * @param  string  $code
     * @return bool|null
     */
    public function remove($code);

    /**
     * Flushes persistences for the given user.
     *
     * @param  \Modules\Core\Auth\Persistences\PersistableInterface  $persistable
     * @param  bool  $forget
     * @return void
     */
    public function flush(PersistableInterface $persistable, $forget = true);
}
