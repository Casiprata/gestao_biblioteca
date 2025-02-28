<?php

namespace App\Policies;

use App\Models\LivroFisico;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LivroFisicoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, LivroFisico $livroFisico): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isBibliotecario();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, LivroFisico $livroFisico): bool
    {
        return $user->isAdmin() || $user->isBibliotecario();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, LivroFisico $livroFisico): bool
    {
        return $user->isAdmin();
    }

    public function deleteAny(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, LivroFisico $livroFisico): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, LivroFisico $livroFisico): bool
    {
        return $user->isAdmin();
    }
}
