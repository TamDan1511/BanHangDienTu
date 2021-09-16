<?php 
namespace App\Repositories;
use App\Models\User;
class UserRepository{

	public function index()
	{
		$userAll = User::leftJoin('users as users1', 'users.id', '=', 'users1.user_id')
						->leftJoin('users as users2', 'users.id', '=', 'users2.updated_by')
						->select('users.*', 'users1.name as nameCreate', 'users2.name as nameUpdate')
						->paginate(6);
		return response()->json(
		[
			'count' => User::count(),
			'active'=> User::where('status', 1)->count(),
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

	public function update($validated, $id)
	{
		return User::where('id', $id)->update($validated);
	}
}


?>