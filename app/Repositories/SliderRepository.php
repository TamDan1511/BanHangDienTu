<?php 
namespace App\Repositories;
use App\Models\Slider;
class SliderRepository{

	public function index()
	{
		$sliders = Slider::leftJoin('users', 'users.id', '=', 'sliders.user_id')
					->leftJoin('users as usersU', 'usersU.id', '=', 'sliders.updated_by')
					->select('sliders.*', 'users.name as nameCreate', 'usersU.name as nameUpdate')
				 	->orderBy('id', 'desc')->paginate(6);
	 
		return response()->json(
		[
			'count' 		=> Slider::count(),
			'active'		=> Slider::where('status', 1)->count(),
			'sliders' 			=> $sliders,
			 
		]);
	}

	public function store($validated)
	{
		 
		return Slider::create($validated); // return this model
	}

	public function find($id)
	{
		return Slider::find($id);  

	 // trả về a model user
	}

	public function changeActive($id, $value)
	{
		$value = $value == 1 ? 0 : 1; 
		return Slider::where('id', $id)->update(['status' => $value]);
	}

 
	public function update($validated, $id)
	{
		return Slider::where('id', $id)->update($validated);
	}

	public function destroy($id)
    {
        return Slider::destroy($id);
    }

  
}


?>