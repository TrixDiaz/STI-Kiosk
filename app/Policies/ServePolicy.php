<?php

namespace App\Policies;

use App\Models\Serve;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ServePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $user->hasRole([1,2]);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Serve $serve)
    {
        
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Serve $serve)
    {
        
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Serve $serve)
    {
        
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Serve $serve)
    {
        
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Serve $serve)
    {
        
    }
}
