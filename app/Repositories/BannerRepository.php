<?php 
namespace App\Repositories;
use App\Models\Banner;
class BannerRepository{

	public function index()
	{
		$banners = Banner::leftJoin('users', 'users.id', '=', 'banners.user_id')
					->leftJoin('users as usersU', 'usersU.id', '=', 'banners.updated_by')
					->select('banners.*', 'users.name as nameCreate', 'usersU.name as nameUpdate')
				 	->orderBy('id', 'desc')->paginate(6);
	 
		return response()->json(
		[
			'count' 		=> Banner::count(),
			'active'		=> Banner::where('status', 1)->count(),
			'banners' 			=> $banners,
			 
		]);
	}

	public function store($validated)
	{
		 
		return Banner::create($validated); // return this model
	}

	public function find($id)
	{
		return Banner::find($id);  

	 // trả về a model user
	}

	public function changeActive($id, $value)
	{
		$value = $value == 1 ? 0 : 1; 
		return Banner::where('id', $id)->update(['status' => $value]);
	}

 
	public function update($validated, $id)
	{
		return Banner::where('id', $id)->update($validated);
	}

	public function destroy($id)
    {
        return Banner::destroy($id);
    }

  
}


?>