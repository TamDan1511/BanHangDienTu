<?php 
namespace App\Services;
use App\Repositories\MenuRepository;
use Illuminate\Support\Facades\DB;

class MenuService{

	private $menuRepository;

	public function __construct(MenuRepository $menuRepository)
	{
		$this->menuRepository = $menuRepository;
		 
	}

	public function index()
	{
		return $this->menuRepository->index();
	}

	public function store($validated)
	{
		 
		$validated['user_id'] = auth('api')->user()->id;
		
		$model = $this->menuRepository->store($validated);
		 
		return response()->json(['menu' => $model]);	 
	}

	public function update($validated, $id)
	{
		$validated['updated_by'] = auth('api')->user()->id;
		$affected = $this->menuRepository->update($validated, $id);
		return response()->json(['affected' => $affected]); 
	}

	public function find($id)
	{
		$menu = $this->menuRepository->find($id);
		return response()->json([
			'menu' => $menu
		]);	
	}

	public function changeActive($request)
	{
		$update = $this->menuRepository->changeActive($request->id, $request->value);
		return response()->json(['update' => $update > 0]);
	}

	public function changeOrder($request)
	{

		$update = $this->menuRepository->changeOrder($request);
		return response()->json(['status' => $update]);
	}

	public function destroy($id)
    {
		try {
			$affected = $this->menuRepository->destroy($id);
		} catch (\Throwable $th) {
			return response()->json(['error' => 400]);
		}
        return $affected;
    }
}
	
 ?>