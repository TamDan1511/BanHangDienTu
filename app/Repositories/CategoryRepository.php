<?php 
namespace App\Repositories;
use App\Models\Category;
class CategoryRepository{

	public function index()
	{
		$categories = Category::where('left', '>', 0)
								->leftJoin('users', 'users.id', '=', 'categories.user_id')
								->leftJoin('users as usersU', 'usersU.id', '=', 'categories.updated_by')
								->select('categories.*', 'users.name as nameCreate', 'usersU.name as nameUpdate')
								->orderBy('left')->paginate(6);
		$categoriesAll = Category::orderBy('left')->get();
		 
		return response()->json(
		[
			'count' 		=> Category::count(),
			'active'		=> Category::where('status', 1)->count(),
			'categories' 	=> $categories,
			'categoriesAll' => $categoriesAll
		]);
	}

	public function store($validated)
	{
		return Category::create($validated); // return this model
	}

	public function find($id)
	{
		return Category::find($id);  

	 // trả về a model user
	}

	public function changeActive($id, $value)
	{
		$value = $value == 1 ? 0 : 1; 
		return Category::where('id', $id)->update(['status' => $value]);
	}

	public function update($validated, $id)
	{
		return Category::where('id', $id)->update($validated);
	}

	public function categoryAll()
    {
		$categoriesAll = Category::orderBy('left')->get();
        return response()->json(
			[
				'categoriesAll' => $categoriesAll
			]
		);
    }
}


?>