<?php 
namespace App\Services;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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
		$validated['user_id'] = auth('api')->user()->id;

 		$user = $this->userRepository->store($validated); 	 
		return response()->json([
			'user' => $user
		]);	 
	}

	public function update($validated, $id)
	{
		
	
		if(isset($validated['password'])){
			$validated['password'] = Hash::make($validated['password']);
			unset($validated['confirmpassword']);
		}else{
			unset($validated['confirmpassword'], $validated['password']);
		} 
		 
		$validated['updated_by'] = auth('api')->user()->id;
		$affected = $this->userRepository->update($validated, $id);
		return response()->json(['affected' => $affected]);
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