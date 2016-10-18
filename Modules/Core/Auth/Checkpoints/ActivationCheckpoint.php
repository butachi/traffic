<?php
namespace Modules\Core\Auth\Checkpoints;

use Modules\Core\Auth\Users\UserInterface;

class ActivationCheckpoint implements CheckpointInterface
{
    use AuthenticatedCheckpoint;

    /**
     * The activation repository.
     *
     * @var \Modules\Core\Auth\Activations\ActivationRepositoryInterface
     */
    protected $activations;

    /**
     * Create a new activation checkpoint.
     *
     * @param  \Modules\Core\Auth\Activations\ActivationRepositoryInterface  $activations
     * @return void
     */
    public function __construct(ActivationRepositoryInterface $activations)
    {
        $this->activations = $activations;
    }

    /**
     * {@inheritDoc}
     */
    public function login(UserInterface $user)
    {
        return $this->checkActivation($user);
    }

    /**
     * {@inheritDoc}
     */
    public function check(UserInterface $user)
    {
        return $this->checkActivation($user);
    }

    /**
     * Checks the activation status of the given user.
     *
     * @param  \Modules\Core\Auth\Users\UserInterface  $user
     * @return bool
     * @throws \Modules\Core\Auth\Checkpoints\NotActivatedException
     */
    protected function checkActivation(UserInterface $user)
    {
        $completed = $this->activations->completed($user);

        if (! $completed) {
            $exception = new NotActivatedException('Your account has not been activated yet.');

            $exception->setUser($user);

            throw $exception;
        }
    }
}
