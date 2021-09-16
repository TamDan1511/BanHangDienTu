<?php 
namespace App\Services;
use App\Repositories\ProductRepository;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
class ProductService{

	private $productRepository;

	public function __construct(ProductRepository $productRepository)
	{
		$this->productRepository = $productRepository;
	}

	public function index()
	{
		return $this->productRepository->index();
	}

	public function store($validated, $sub_picture)
	{	 
		$picture = $validated['picture'];
		 
		$img = Image::make($picture->path());
		$ext = $picture->getClientOriginalExtension();
		$strPicture = Str::random(40) ;
		$validated['picture'] = $strPicture . '.' . $ext;
		$img->save(public_path('upload/product/' .$validated['picture']));
		$img->resize(500, 500, function ($constraint) {
			$constraint->upsize();
		});
		 
		$strPicture500x500 = $strPicture . '-500x500' . '.' . $ext;
		$img->save(public_path('upload/product/' .$strPicture500x500));

		$strPicture200x150 = $strPicture . '-200x150' . '.' . $ext;
		$img->resize(200, 150, function ($constraint) {
			$constraint->upsize();
		});
		$img->save(public_path('upload/product/' .$strPicture200x150));


		$validated['user_id'] = auth('api')->user()->id;
		 
		$product = $this->productRepository->store($validated);

		if(!empty($sub_picture)){
			foreach($sub_picture as $picture){
				$item = Image::make($picture->path());
				$strExt = $picture->getClientOriginalExtension(); 
				$str = Str::random(40);
				$strItem = $str . '.' . $strExt;
				$strItem500x500 = $str . '-500x500.' . $strExt;
				$strItem200x150 = $str . '-200x150.' . $strExt;
				$item->save(public_path('upload/product/' . $strItem));

				$item->resize(500, 500, function ($constraint) {
					$constraint->upsize();
				});
				$item->save(public_path('upload/product/' . $strItem500x500));
	
				$item->resize(200, 150, function ($constraint) {
					$constraint->upsize();
				});
				$item->save(public_path('upload/product/' . $strItem200x150));
	
				DB::table('images')->insert([
					'picture' => $strItem,
					'product_id' => $product->id
				]);
			}
		}
		 

		return response()->json(['product' => $product]);
	}

	public function update($validated, $sub_picture, $id)
	{
		$product = $this->productRepository->find($id);
		$sub_imagesOld = DB::table('images')->where('product_id', $id)->get();
	 // xóa ảnh phụ cũ
		if(!empty($sub_imagesOld)){
			foreach($sub_imagesOld as $image){
				$str = explode('.', $image->picture);
				$str500x500 = public_path('upload/product/' . $str[0] . '-500x500.' . $str[1]);
				$str200x150 = public_path('upload/product/' . $str[0] . '-200x150.' . $str[1]);
				unlink($str500x500);
				unlink($str200x150);
				unlink(public_path('upload/product/' . $image->picture));
			}

			DB::table('images')->where('product_id', $id)->delete();
		}
 

		// chèn ảnh chính mới

		$validated['updated_by'] = auth('api')->user()->id;
		if(empty($validated['picture'])){
			unset($validated['picture']);
		}else{
			$arrPicture = explode('.', $product->picture);
			$str500x500 = public_path('upload/product/' . $arrPicture[0] . '-500x500.' . $arrPicture[1]);
			$str200x150 = public_path('upload/product/' . $arrPicture[0] . '-200x150.' . $arrPicture[1]);
			unlink($str500x500);
			unlink($str200x150);

			unlink(public_path('upload/product/' . $product->picture));
			$picture = $validated['picture'];
		 
			$img = Image::make($picture->path());
			$ext = $picture->getClientOriginalExtension();
			$strPicture = Str::random(40) ;
			$validated['picture'] = $strPicture . '.' . $ext;
			$img->save(public_path('upload/product/' .$validated['picture']));
			$img->resize(500, 500, function ($constraint) {
				$constraint->upsize();
			});
			 
			$strPicture500x500 = $strPicture . '-500x500' . '.' . $ext;
			$img->save(public_path('upload/product/' .$strPicture500x500));

			$strPicture200x150 = $strPicture . '-200x150' . '.' . $ext;
			$img->resize(200, 150, function ($constraint) {
				$constraint->upsize();
			});
			$img->save(public_path('upload/product/' .$strPicture200x150));
	 
		}
		 
		 

		if(!empty($sub_picture)){
			foreach($sub_picture as $key => $picture){
				$item = Image::make($picture->path());
				$strExt = $picture->getClientOriginalExtension(); 
				$str = Str::random(40);
				$strItem = $str . '.' . $strExt;
				$strItem500x500 = $str . '-500x500.' . $strExt;
				$strItem200x150 = $str . '-200x150.' . $strExt;
				$item->save(public_path('upload/product/' . $strItem));
				$item->resize(500, 500, function ($constraint) {
					$constraint->upsize();
				});
				$item->save(public_path('upload/product/' . $strItem500x500));
	
				$item->resize(200, 150, function ($constraint) {
					$constraint->upsize();
				});
				$item->save(public_path('upload/product/' . $strItem200x150));
				 
				DB::table('images')->insert([
					'picture' => $strItem,
					'product_id' => $id
				]);
			}
		}
		 
		$affected = $this->productRepository->update($validated, $id);
		return response()->json(['affected' => $affected]);
	}

	public function getSubPicture($id)
    {
		$arrSubPicture = DB::table('images')->where('product_id', $id)->get();
        return response()->json($arrSubPicture);
    }

	public function find($id)
	{
		$product = $this->productRepository->find($id);
		$sub_images = DB::table('images')->where('product_id', $id)->get();
		return response()->json([
			'product' => $product,
			'sub_images' => $sub_images
		]);	
	}

	public function changeActive($request)
	{
		$update = $this->productRepository->changeActive($request->id, $request->value);
		return response()->json(['update' => $update > 0]);
	}

	public function updateCategory($request)
	{
	 
		$update = $this->productRepository->updateCategory($request->product_id, $request->category_id);
		
		return response()->json(['update' => $update > 0]);
	}

  
	public function destroy($id)
    {
		try {
			$affected = $this->productRepository->destroy($id);

		} catch (\Throwable $th) {
			return response()->json(['error' => 400]);
		}

		return $affected;
    }
}
	
 ?>