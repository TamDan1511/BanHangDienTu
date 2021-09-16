<?php 
namespace App\Repositories;
use App\Models\Product;
use App\Models\Category;
 
class ProductRepository{

	public function index()
	{
		$products = Product::leftJoin('users', 'users.id', '=', 'products.user_id')
							->leftJoin('users as usersU', 'usersU.id', '=', 'products.updated_by')
							->select('products.*', 'users.name as nameCreate', 'usersU.name as nameUpdate')
							->paginate(6);
		 
		return response()->json(
		[
			'count' 		=> Product::count(),
			'active'		=> Product::where('status', 1)->count(),
			'products' 		=> $products
		]);
	}

	public function store($validated)
	{
		return Product::create($validated); // return this model
	}

	public function find($id)
	{
		$product = Product::find($id); 
		 
		return $product;

	 // trả về a model user
	}

	public function changeActive($id, $value)
	{
		$value = $value == 1 ? 0 : 1; 
		return Product::where('id', $id)->update(['status' => $value]);
	}

	public function updateCategory($product_id, $category_id)
	{
		return Product::where('id', $product_id)->update(['category_id' => $category_id]);
	}

	public function update($validated, $id)
	{
		return Product::where('id', $id)->update($validated);
	}

	public function categoryAll()
    {
		$categoriesAll = Product::orderBy('left')->get();
        return response()->json(
			[
				'categoriesAll' => $categoriesAll
			]
		);
    }

	public function destroy($id)
	{
		$product = Product::find($id);
		$product->images()->delete();
		return $product->delete();
		
	}

 
}


?>