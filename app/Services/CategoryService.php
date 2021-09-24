<?php 
namespace App\Services;
use App\Repositories\CategoryRepository;
use App\NestedSetModel\NestedModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
 

class CategoryService{

	private $categoryRepository;
	private $nestedModel;

	public function __construct(CategoryRepository $categoryRepository, NestedModel $nestedModel)
	{
		$this->categoryRepository = $categoryRepository;
		$this->nestedModel = $nestedModel;
		$this->nestedModel->setTable('categories');
	}

	public function index()
	{
		return $this->categoryRepository->index();
	}

	public function store($validated)
	{
		 
		$validated['user_id'] = auth('api')->user()->id;
		if(empty($validated['icon'])) unset($validated['icon']);
		else{
			$extension = $validated['icon']->extension();
			$str = Str::random(40) . '.' . $extension;
			$path = $validated['icon']->move('upload/category', $str);
			$validated['icon'] = $str;
		}
		 
		$option['position'] = 'left';
		$model = $this->nestedModel->insertNode($validated, $validated['parent_id'], $option);
		return $model;	 
	}

	public function update($validated, $id)
	{
		$validated['updated_by'] = auth('api')->user()->id;
		$parent_id = $validated['parent_id'];

		if(empty($validated['icon'])) unset($validated['icon']);
		else{
			$objOld = DB::table('categories')->where('id', $id)->first();
			if(!empty($objOld->icon))
				unlink(public_path('upload/category/' . $objOld->icon));
			$extension = $validated['icon']->extension();
			$str = Str::random(40) . '.' . $extension;
			$path = $validated['icon']->move('upload/category', $str); // directory public
			$validated['icon'] = $str;
		}
		$checkExists = DB::table('categories')->where('parent_id', $parent_id)->where('id', $id)->exists();
		if($checkExists)
			$parent_id = 0;
		unset($validated['parent_id']);
		return $this->nestedModel->updateNode($id, $validated, $parent_id);
	}

	public function find($id)
	{
		$category = $this->categoryRepository->find($id);
		return response()->json([
			'category' => $category
		]);	
	}

	public function changeActive($request)
	{
		$update = $this->categoryRepository->changeActive($request->id, $request->value);
		return response()->json(['update' => $update > 0]);
	}

	public function move($request)
	{
		$id 	= $request->id;
		$type	= $request->type;

		if($type == 'up')
			$this->nestedModel->moveUp($id);
		else if($type == 'down') 
			$this->nestedModel->moveDown($id);
		else 
		{
			$option['position'] = 'left';
			$parent_id 			= $request->parent_id;
			$this->nestedModel->moveNode($id, $parent_id, $option);	
		}	 

		 return $this->categoryRepository->index();
	}

	public function categoryAll()
    {
        return $this->categoryRepository->categoryAll();
    }

	public function destroy($id)
    {
		try {
			$objOld = \App\Models\Category::where('id', $id)->first();
			
			if(!empty($objOld->icon))
				unlink(public_path('upload/category/' . $objOld->icon));
			$products = $objOld->products;
			foreach($products as $value){
				$listImage = $value->getPicture;
				$arrPicture = explode('.', $value->picture);
				$str500x500 = public_path('upload/product/' . $arrPicture[0] . '-500x500.' . $arrPicture[1]);

				unlink($str500x500);
				unlink(public_path('upload/product/' . $arrPicture[0] . '-220x200.' . $arrPicture[1]));
				unlink(public_path('upload/product/' . $value->picture));
				if(!empty($listImage)){
					$value->getPicture()->delete();
					foreach($listImage as $value2){
						$arrPicture = explode('.', $value2->picture);
						unlink(public_path('upload/product/' . $arrPicture[0] . '-500x500.' . $arrPicture[1]));
						unlink(public_path('upload/product/' . $arrPicture[0] . '-220x200.' . $arrPicture[1]));
						unlink(public_path('upload/product/' . $value2->picture));
					}
				}
			}
			$objOld->products()->delete(); 
			 
			$affected = $this->nestedModel->removeNode($id);
		} catch (\Throwable $th) {
			return response()->json(['error' => 400]);
		}
        return $affected;
    }
}
	
 ?>