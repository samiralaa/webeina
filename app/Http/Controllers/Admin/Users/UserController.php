<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Services\User\UserServices;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userServices;

    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }

    public function index()
    {
        $users = $this->userServices->getAllUsers();
        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        return view('dashboard.auth.register');
    }

    public function store(CreateUserRequest $request)
    {
        // Validate the request data
        $dataValidated = $request->validated();

        // Encrypt the password
        $dataValidated['password'] = bcrypt($dataValidated['password']);

        // Create the user
        $user = $this->userServices->createUser($dataValidated);

        // Log the user in
        Auth::login($user);

        // Redirect to a dashboard or home page
        return redirect()->route('user-profile')->with('success', 'User created and logged in successfully');
    }


    public function edit($id)
    {
        $user = $this->userServices->getUserById($id);
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->userServices->updateUser($request->all(), $id);
        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        $this->userServices->deleteUser($id);
        return redirect()->route('admin.users.index');
    }
}
