<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository implements RepositoryInterface
{
    public function all()
    {
        return User::all();
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function update($id, array $data)
    {
        $user = User::find($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = User::find($id);

        if (!$user)
          return throw new ModelNotFoundException();

        return User::destroy($id);
    }
}
