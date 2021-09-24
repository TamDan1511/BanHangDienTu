<?php 
namespace App\Services;
use App\Repositories\SliderRepository;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class SliderService{

	private $sliderRepository;

	public function __construct(SliderRepository $sliderRepository)
	{
		$this->sliderRepository = $sliderRepository;
		 
	}

	public function index()
	{
		return $this->sliderRepository->index();
	}

	public function store($validated)
	{
		 
		$validated['user_id'] = auth('api')->user()->id;
		$picture = Image::make($validated['picture']->path());
		$str = Str::random(40);
		$ext = $validated['picture']->getClientOriginalExtension();
 
		$strPicture420x420 = $str . '-420x420.' . $ext;
		 
		$picture->resize(420, 420, function ($constraint) {
			$constraint->upsize();
		});
		$picture->save(public_path('upload/sliders/' . $strPicture420x420));
		$validated['picture'] = $strPicture420x420;

		$model = $this->sliderRepository->store($validated);
		return response()->json(['slider' => $model]);	 
	}

	public function update($validated, $id)
	{
		if(!empty($validated['picture'])){
			$obj = DB::table('sliders')->where('id', $id)->first();
			$pictureOld = $obj->picture;
			unlink(public_path('upload/sliders/' . $pictureOld));

			$picture = Image::make($validated['picture']->path());
			$str = Str::random(40);
			$ext = $validated['picture']->getClientOriginalExtension();
			$strPicture420x420 = $str . '-420x420.' . $ext;
		 
			$picture->resize(420, 420, function ($constraint) {
				$constraint->upsize();
			});
			$picture->save(public_path('upload/sliders/' . $strPicture420x420));
			$validated['picture'] = $strPicture420x420;
		}else unset($validated['picture']);
	
		 

		$validated['updated_by'] = auth('api')->user()->id;
		 
		$affected = $this->sliderRepository->update($validated, $id);
		return response()->json(['affected' => $affected]); 
	}

	public function find($id)
	{
		$slider = $this->sliderRepository->find($id);
		return response()->json([
			'slider' => $slider
		]);	
	}

	public function changeActive($request)
	{
		$update = $this->sliderRepository->changeActive($request->id, $request->value);
		return response()->json(['update' => $update > 0]);
	}

	public function destroy($id)
    {
		try {
			$affected = $this->sliderRepository->destroy($id);
		} catch (\Throwable $th) {
			return response()->json(['error' => 400]);
		}
        return $affected;
    }
}
	
 ?>