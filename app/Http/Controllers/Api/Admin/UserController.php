<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;

    }
     

    public function index()
    {
        return $this->userService->index();
         
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();
      //  dd($validated); 
       return $this->userService->store($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->userService->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $validated = $request->validated();
        return $this->userService->update($validated, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Models\User::find($id)->AauthAcessToken()->delete();
        return \App\Models\User::destroy($id);
    }

    public function login(Request $request)
    {
        if(!empty(auth('api')->user())) return response()->json(['user' =>auth('api')->user()]);

        $rules = [
            'email' => 'bail|required',
            'password' => 'bail|required'
        ];

        $messages = [
            'email.required' => 'Email không được để trống!',
            'password.required' => 'Mật khẩu không được để trống!'
        ];


        $validated = $request->validate($rules, $messages);

        if(Auth::attempt(
            ['email' => $request->email, 'password' => $request->password, 'status' => 1, 'isAdmin' => 1])){

            $user = Auth::user();
            $user->token  = $user->createToken('App')->accessToken;
            return response()->json(['user' => $user]);
        }

        return response()->json([
                'errors' => ['email' => "Email hoặc mật khẩu không chính xác!"]
            ], 401);
    }

    public function getUser(){
        return response()->json(['user' => auth('api')->user()]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Đăng xuất thành công'
        ], 401);
    }

    public function changeActive (Request $request)
    {       
        return $this->userService->changeActive($request);
    }

}

 