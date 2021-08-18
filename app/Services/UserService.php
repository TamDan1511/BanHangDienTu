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

	public function store($validated, $type)
	{
		$validated['password'] = Hash::make($validated['password']);
		if(isset($validated['picture'])){
			$picture = $validated['picture'];
			$ext = $picture->extension();
			$validated['password'] = Str::random(40). '.' . $ext;
		}
		 
 		$user = $this->userRepository->store($validated); 	 
		return response()->json([
			'user' => $user
		]);	 
	}

	public function update($validated)
	{
		
	}

	public function changeActive($request)
	{
		$update = $this->userRepository->changeActive($request->id, $request->value, $request->type);
		return response()->json(['update' => $update > 0]);
	}
}
	
 ?>