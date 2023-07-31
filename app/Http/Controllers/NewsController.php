<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\Majors;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new = News::query()->with('majors')->get();
        return view('news.index', [
            'title' => 'Danh sách tin tức',
            'news' => $new,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create', [
            'majors' => Majors::query()->get(),
            'title' => 'Đăng tin tức',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        try {
            $new = new News();
            if ($request->hasFile('new_image')) {
                $new->new_image = $request->new_image->storeAs('images/cv', $request->new_image->hashName());
            }
            $new->title = $request->title;
            $new->describe = $request->describe;
            $new->majors_id = $request->majors_id;
            $new->status = $request->status;
            $new->save();
            return redirect()->route('news.index');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('news.edit', [
            'title' => 'Chỉ sửa  tin tức',
            'majors' => Majors::query()->get(),
            'new' => News::query()->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        try {
            $new = News::query()->find($id);
            if ($request->hasFile('new_image')) {
                $new->new_image = $request->new_image->storeAs('images/cv', $request->new_image->hashName());
            }
            $new->title = $request->title;
            $new->describe = $request->describe;
            $new->majors_id = $request->majors_id;
            $new->status = $request->status;
            $new->save();
            return redirect()->route('news.index');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::query()->delete($id);
        return back();
    }
}
