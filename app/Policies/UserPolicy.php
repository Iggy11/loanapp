<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /*public function before(User $user)
    {
        if($user->id == 1) {
            return true;
        }
    }*/


    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {

        return $model->id == 1; //We assume that always a user with id = 1 is Admin

    }


}
