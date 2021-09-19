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
		$arrPicture = explode('.', $product->picture);
		$str500x500 = public_path('upload/product/' . $arrPicture[0] . '-500x500.' . $arrPicture[1]);

		unlink($str500x500);
		unlink(public_path('upload/product/' . $arrPicture[0] . '-220x200.' . $arrPicture[1]));
		unlink(public_path('upload/product/' . $product->picture));
		$listImage = $product->images();
		if(!empty($listImage)){
			$listImage->delete();
			foreach($listImage as $value){
				$arrPicture = explode('.', $value->picture);
				unlink(public_path('upload/product/' . $arrPicture[0] . '-500x500.' . $arrPicture[1]));
				unlink(public_path('upload/product/' . $arrPicture[0] . '-220x200.' . $arrPicture[1]));
				unlink(public_path('upload/product/' . $product->picture));
			}
		}
		 
		return $product->delete();
		
	}

 
}


?>