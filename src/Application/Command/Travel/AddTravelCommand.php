<?php

namespace App\Application\Command\Travel;

use App\Application\Command\Command;
use App\Domain\Travel\Model\Travel;
use App\Domain\User\Model\User;

class AddTravelCommand extends Command
{
    /** @var Travel */
    private $travel;
    /** @var User */
    private $user;

    /**
     * UpdateTravelCommand constructor.
     *
     * @param Travel $travel
     */
    public function __construct(Travel $travel, User $user)
    {
        $this->travel = $travel;
        $this->user = $user;
    }

    /**
     * @return Travel
     */
    public function getTravel(): Travel
    {
        return $this->travel;
    }

    /**
     * @param Travel $travel
     */
    public function setTravel(Travel $travel): void
    {
        $this->travel = $travel;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }
}
