<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
	
	public function __construct() {
		//$this->middleware('auth', ['only' => 'index']);
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = User::latest()->get();
		if ($request->ajax() || $request->wantsJson()) {
    		return new JsonResponse($users);
    	}
		return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $input = $request->all();
		$user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
        ]);
		
		if ($request->ajax() || $request->wantsJson()) {
    		return new JsonResponse($user);
    	}
		
		flash()->success('salvato con successo!');
		
		return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(User $user)
    {
		return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(User $user)
    {
		return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UserRequest $request, User $user)
    {
		$input = $request->all();
		$user->update([
            'name' => $input['name'],
            'password' => bcrypt($input['password']),
        ]);
		
		
		if ($request->ajax() || $request->wantsJson()) {
    		return new JsonResponse($user);
    	}
		
		flash()->success('aggiornato con successo!');
		
		return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();
        if ($request->ajax() || $request->wantsJson()) {
        	return new JsonResponse($user);
        }
        return redirect('users');
    }
}
