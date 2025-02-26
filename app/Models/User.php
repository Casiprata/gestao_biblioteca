<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    const ROLE_ADMIN = 'ADMIN';
    const ROLE_BIBLIOTECARIO = 'BIBLIOTECARIO';
    const ROLE_USUARIO = 'USUARIO';

    const ROLES = [
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_BIBLIOTECARIO => 'Bibliotecario',
        self::ROLE_USUARIO => 'Usuario',
    ];

    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isBibliotecario()
    {
        return $this->role === self::ROLE_BIBLIOTECARIO;
    }

    public function isUsuario()
    {
        return $this->role === self::ROLE_USUARIO;
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function canUserAccessPanel($role): bool
    {
        return strtolower($this->role) === strtolower($role);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return strtolower($this->role) === strtolower('ADMIN');;
        } else if ($panel->getId() === 'bibliotecario') {
            return strtolower($this->role) === strtolower('BIBLIOTECARIO');;
        } else if ($panel->getId() === 'usuario') {
            return strtolower($this->role) === strtolower('USUARIO');;
        }

        return true;
    }
}
