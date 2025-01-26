<?php

namespace App\Contracts;

use App\Models\User;

interface IdentityRepositoryInterface
{
    public function getById(int $id);

    public function getByEmail(string $email);

    public function create(User $user);

    public function updateById(string $id, User $user);

    public function deleteById(string $id);

    public function save(User $user);
}
