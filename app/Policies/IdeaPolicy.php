<?php

namespace App\Policies;

use App\User;
use App\Idea;
use Illuminate\Auth\Access\HandlesAuthorization;

class IdeaPolicy
{
    use HandlesAuthorization;


    public function before($user, $ability)
    {
        // if ($user->isAdmin()) {
        //     return true;
        // }
    }


    public function view(User $user, Idea $idea)
    {
        return $user->id === $idea->user_id;
    }


    public function create(User $user)
    {
        //
    }


    public function update(User $user, Idea $idea)
    {
        //
    }


    public function delete(User $user, Idea $idea)
    {
        //
    }
}
