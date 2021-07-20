<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use Illuminate\Support\Facades\Auth;

class TopicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index(Request $request)
	{
		$topics = Topic::WithOrder($request->order)->with('user','category')->paginate(20);
		return view('topics.index', compact('topics'));
	}

    public function show(Topic $topic)
    {
        return view('topics.show', compact('topic'));
    }

	public function create(Topic $topic)
	{
	    $categories = Category::all();
		return view('topics.create_and_edit', compact('topic','categories'));
	}

	public function store(TopicRequest $request, Topic $topic)
	{
	    $topic->user_id = Auth::id();
		$topic->fill($request->all());
		$topic->save();

		return redirect()->route('topics.show', $topic->id)->with('message', '新しい話題が作り出来ました');
	}

	public function edit(Topic $topic)
	{
        $this->authorize('update', $topic);
		return view('topics.create_and_edit', compact('topic'));
	}

	public function update(TopicRequest $request, Topic $topic)
	{
		$this->authorize('update', $topic);
		$topic->update($request->all());

		return redirect()->route('topics.show', $topic->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Topic $topic)
	{
		$this->authorize('destroy', $topic);
		$topic->delete();

		return redirect()->route('topics.index')->with('message', 'Deleted successfully.');
	}

    public function upload_image(Request $request,ImageUploadHandler $uploader)
    {
        $data = [
            "success" => false,
            "msg"=> "アップロードが出来ませんでした", # optional
            "file_path"=> ""
        ];

        // 判断是否有上传文件，并赋值给 $file
        $file = $request->upload_file;
        if ($file) {
            $result = $uploader->save($file,'topics',Auth::id(),1024);
            if ($result) {
                $data['success'] = true;
                $data['msg'] = 'アップロードが出来ました';
                $data['file_path'] = $result['path'];
            }
        }
        return $data;
	}
}
