<?php

namespace App\Services;
use App\Models\Blog;
use App\Repositories\BlogRepository;
use Illuminate\Support\Facades\DB;

class BlogService
{
    private $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function index()
    {
        return $this->blogRepository->index();
    }

    public function store($data)
    {
        $post = [
            'title' => $data['title'],
            'status' => $data['status'],
            'content' => $data['content'],
            'picture' => $this->storeFile(),
            'user_id' => auth('api')->user()->id,
        ];
        $blog = $this->blogRepository->store($post);
        return response()->json([
            'blog' => $blog
        ]);
    }

    /**
     * Execute store file and return path.
     * 
     * @return string
     */
    public function storeFile()
    {
        $file = request()->file('file');
        if (!$file) {
            return '';
        }
        $result = $file->move('images', $file->getClientOriginalName());
        return $result->getPathname();
    }

    public function update($data, $id)
    {
        $post = [
            'title' => $data['title'],
            'status' => $data['status'],
            'content' => $data['content'],
            'picture' => $this->storeFile(),
            'user_id' => auth('api')->user()->id,
        ];
        $affected = $this->blogRepository->update($post, $id);
        return response()->json(['affected' => $affected]);
    }

    public function find($id)
    {
        $blog = $this->blogRepository->find($id);
        return response()->json([
            'blog' => $blog
        ]);
    }

    public function blogAll()
    {
        return $this->blogRepository->blogAll();
    }

    public function changeActive($request)
    {
        $update = $this->blogRepository->changeActive($request->id, $request->value);
        return response()->json(['update' => $update > 0]);
    }

    public function destroy($id)
    {
        $blog = $this->blogRepository->find($id);
        if($blog) {
            $blog->delete();

            return response()->json(['status' => 'success']);
        }
    }
}

?>
