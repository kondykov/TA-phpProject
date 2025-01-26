<?php

namespace App\Repositories;

use App\Contracts\IdentityRepositoryInterface;
use App\Models\User;
use Webmozart\Assert\Assert;

class IdentityRepository implements IdentityRepositoryInterface
{

    public function getById(int $id)
    {
        // TODO: Implement getById() method.
    }

    public function getByEmail(string $email)
    {
        Assert::email($email);
        $user = User::where('email', $email)->first();
        Assert::null($user); // Исправлено на Assert::null

        return $user;
    }

    public function create(User $user)
    {
        // Проверяем, существует ли пользователь с таким email
        $userExist = $this->getByEmail($user->getEmailForVerification());
        Assert::null($userExist); // Исправлено на Assert::null

        // Сохраняем нового пользователя
        $user->save();
    }

    public function updateById(string $id, User $user)
    {
        // TODO: Implement updateById() method.
    }

    public function deleteById(string $id)
    {
        // TODO: Implement deleteById() method.
    }

    public function save(User $user)
    {
        // TODO: Implement save() method.
    }
}
