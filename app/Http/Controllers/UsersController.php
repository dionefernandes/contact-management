<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Repositories\User\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->all();

		return view('user.index', [
			'users' => $users
		]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserStoreRequest $request)
    {
        $validatedAttributes = $request->validated();
        $validatedAttributes['password'] = bcrypt( $validatedAttributes['password'] );

        $user = $this->userRepository->create($validatedAttributes);

        if (!$user)
            return redirect()->back()->with('error', 'Ocorreu um erro ao criar o contato.');

		return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($user)
    {
        return view('user.show', [
			'user' => $user
		]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user)
    {
        if (!$user)
			return throw new ModelNotFoundException();

		return view('user.edit', [
			'user' => $user
		]);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $validatedAttributes = $request->validated();

        if( isset($validatedAttributes['password']) )
            $validatedAttributes['password'] = bcrypt( $validatedAttributes['password'] );

        $user = $this->userRepository->update($id, $validatedAttributes);

        if (!$user)
            return redirect()->back()->with('error', 'Ocorreu um erro ao atualizar o contato.');

		return redirect()->route('user.index');
    }

    public function destroy(Request $request, $id)
    {
        $this->userRepository->delete($id);

        return redirect()->back();
    }
}
