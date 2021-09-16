<?php 
namespace App\Repositories;
use App\Models\Menu;
class MenuRepository{

	public function index()
	{
		$menus = Menu::leftJoin('users', 'users.id', '=', 'menus.user_id')
					->leftJoin('users as usersU', 'usersU.id', '=', 'menus.updated_by')
					->select('menus.*', 'users.name as nameCreate', 'usersU.name as nameUpdate')
					->orderByDesc('order')->paginate(6);
	 
		return response()->json(
		[
			'count' 		=> Menu::count(),
			'active'		=> Menu::where('status', 1)->count(),
			'menus' 			=> $menus,
			 
		]);
	}

	public function store($validated)
	{
		$max = Menu::max('order');
		$validated['order'] = $max + 1;
		return Menu::create($validated); // return this model
	}

	public function find($id)
	{
		return Menu::find($id);  

	 // trả về a model user
	}

	public function changeActive($id, $value)
	{
		$value = $value == 1 ? 0 : 1; 
		return Menu::where('id', $id)->update(['status' => $value]);
	}

	public function changeOrder($request)
	{
		$id = $request->id;
		if($request->type == 'up'){
			$objUp = Menu::where('order', $request->order + 1)->first();
			Menu::where('id', $id)->update(['order' => $request->order + 1]);
			Menu::where('id', $objUp->id)->update(['order' => $request->order]);

		}else{
			$objDown = Menu::where('order', $request->order - 1)->first();
			Menu::where('id', $id)->update(['order' => $request->order - 1]);
			Menu::where('id', $objDown->id)->update(['order' => $request->order]);
		}
		
		return 200;
	}

	public function update($validated, $id)
	{
		return Menu::where('id', $id)->update($validated);
	}

	public function destroy($id)
    {
		$obj = Menu::find($id);
		Menu::where('order', '>', $obj->order)->decrement('order', 1);
        return Menu::destroy($id);
    }

  
}


?>