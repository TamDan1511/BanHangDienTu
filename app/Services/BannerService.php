<?php 
namespace App\Services;
use App\Repositories\BannerRepository;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class BannerService{

	private $bannerRepository;

	public function __construct(BannerRepository $bannerRepository)
	{
		$this->bannerRepository = $bannerRepository;
		 
	}

	public function index()
	{
		return $this->bannerRepository->index();
	}

	public function store($validated)
	{
		 
		$validated['user_id'] = auth('api')->user()->id;
		$picture = Image::make($validated['picture']->path());
		$str = Str::random(40);
		$ext = $validated['picture']->getClientOriginalExtension();
		$strPicture = $str . '.' . $ext;
		$picture->save(public_path('upload/banners/' . $strPicture));
		$strPicture600x300 = $str . '-600x300.' . $ext;
		 
		$picture->resize(600, 300, function ($constraint) {
			$constraint->upsize();
		});
		$picture->save(public_path('upload/banners/' . $strPicture600x300));
		$validated['picture'] = $strPicture;

		$model = $this->bannerRepository->store($validated);
		return response()->json(['banner' => $model]);	 
	}

	public function update($validated, $id)
	{
		if(!empty($validated['picture'])){
			$obj = DB::table('banners')->where('id', $id)->first();
			$pictureOld = $obj->picture;
			$arrPictureOld = explode('.', $pictureOld);
			$strPicture600x300Old = $arrPictureOld[0] . '-600x300.' . $arrPictureOld[1];
			unlink(public_path('upload/banners/' . $pictureOld));
			unlink(public_path('upload/banners/' . $strPicture600x300Old));

			$picture = Image::make($validated['picture']->path());
			$str = Str::random(40);
			$ext = $validated['picture']->getClientOriginalExtension();
			$strPicture = $str . '.' . $ext;
			$picture->save(public_path('upload/banners/' . $strPicture));
			$strPicture600x300 = $str . '-600x300.' . $ext;
			
			$picture->resize(600, 300, function ($constraint) {
				$constraint->upsize();
			});
			$picture->save(public_path('upload/banners/' . $strPicture600x300));
			$validated['picture'] = $strPicture;
		}else unset($validated['picture']);
	
		 

		$validated['updated_by'] = auth('api')->user()->id;
		 
		$affected = $this->bannerRepository->update($validated, $id);
		return response()->json(['affected' => $affected]); 
	}

	public function find($id)
	{
		$banner = $this->bannerRepository->find($id);
		return response()->json([
			'banner' => $banner
		]);	
	}

	public function changeActive($request)
	{
		$update = $this->bannerRepository->changeActive($request->id, $request->value);
		return response()->json(['update' => $update > 0]);
	}

	public function destroy($id)
    {
		try {
			$affected = $this->bannerRepository->destroy($id);
		} catch (\Throwable $th) {
			return response()->json(['error' => 400]);
		}
        return $affected;
    }
}
	
 ?>