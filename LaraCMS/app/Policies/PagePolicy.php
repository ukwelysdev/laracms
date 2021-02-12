<?php

namespace App\Policies;

use App\Models\Page;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function before($user, $ability){
        if($user->isAdminOrEditor()){
            return true;
       }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Page  $page
     * @return mixed
     */
    public function update(User $user, Page $page)
    {

       return $user->id == $page->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Page  $page
     * @return mixed
     */
    public function delete(User $user, Page $page)
    {

       return $user->id == $page->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Page  $page
     * @return mixed
     */
    public function restore(User $user, Page $page)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Page  $page
     * @return mixed
     */
    public function forceDelete(User $user, Page $page)
    {
        //
    }
}
