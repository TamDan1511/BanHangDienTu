<?php 
namespace App\Services;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;
use Illuminate\Support\Str;

class UserService{

	private $userRepository;

	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function index()
	{
		return $this->userRepository->index();
	}

	public function store($validated)
	{
		$validated['password'] = Hash::make($validated['password']);
		if(isset($validated['picture'])){
			$picture = $validated['picture'];
			$ext = $picture->extension();
			$validated['picture'] = Str::random(40). '.' . $ext;
		}

		unset($validated['confirmpassword']);
		 
 		$user = $this->userRepository->store($validated); 	 
		return response()->json([
			'user' => $user
		]);	 
	}

	public function update($validated, $id)
	{
		return $this->userRepository->update($validated, $id);
	}

	public function find($id)
	{
		$user = $this->userRepository->find($id);
		return response()->json([
			'user' => $user
		]);	
	}

	public function changeActive($request)
	{
		$update = $this->userRepository->changeActive($request->id, $request->value, $request->type);
		return response()->json(['update' => $update > 0]);
	}
}
	
 ?>