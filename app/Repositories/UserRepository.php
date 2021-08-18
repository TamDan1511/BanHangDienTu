<?php 
namespace App\Repositories;
use App\Models\User;
class UserRepository{

	public function index()
	{
		$userAll = User::paginate(6);
		return response()->json(
		[
			'users' => $userAll
		]);
	}

	public function store($validated)
	{
		return User::create($validated); // return this model
	}

	public function find($id)
	{
		return User::find($id);  

	 // trả về a model user
	}

	public function changeActive($id, $value, $type)
	{
		$value = $value == 1 ? 0 : 1; 
		return User::where('id', $id)->update([$type => $value]);
	}
}


?>