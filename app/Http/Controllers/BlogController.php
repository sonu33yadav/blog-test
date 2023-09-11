<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addBlog(Request $request, Blog $BLOG)
    {
        $UserId  = Auth::user()->id;
        $titel   = $request->titel;
        $auther  = $request->auther;
        $content = $request->message;
        $file    = $request->file('image');

        if (empty($titel) || $titel == null) {
            return redirect()->back()->withErrors([
                'msg' => 'field titel field is empty. Please provide a titel value.',
            ]);
        }
        if (empty($auther) || $auther == null) {
            return redirect()->back()->withErrors([
                'msg' => 'field auther field is empty. Please provide a auther value.',
            ]);
        }
        if (empty($content) || $content == null) {
            return redirect()->back()->withErrors([
                'msg' => 'field content field is empty. Please provide a content value.',
            ]);
        }
        $blog               = [];
        $blog['titel']      = $titel;
        $blog['written_by'] = $auther;
        $blog['content']    = $content;
        $blog['user_id']    = $UserId;
        if ($file != null) {
            $extension = File::extension($file->getClientOriginalName());
            # upload file before processing it.
            $filePath   = base_path('uploads') . '/' . $file->getClientOriginalName();
            $fileName   = $file->getClientOriginalName();
            $uplodePath = base_path('uploads');
            if (!$file->move($uplodePath, $file->getClientOriginalName())) {
                throw new Exception("Failed to uplaode file. File size too large", Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $blog['image'] = $fileName;
            $BLOG->create($blog);
        } else {
            $BLOG->create($blog);
        }

        return redirect()->back()->withErrors([
            'msg' => 'Blog Added Sucessfully.',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Blog::where('id', $id)->delete();
        return redirect()->back()->withErrors([
            'msg' => 'Blog Deleted Sucessfully.',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editBlog($id)
    {
        $data = Blog::where('id', $id)->first();
        // dd($data);
        return view('editBlog', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $file = $request->file('image');
        if ($file != null) {
            $extension = File::extension($file->getClientOriginalName());
            # upload file before processing it.
            $filePath   = base_path('uploads') . '/' . $file->getClientOriginalName();
            $fileName   = $file->getClientOriginalName();
            $uplodePath = base_path('uploads');
            if (!$file->move($uplodePath, $file->getClientOriginalName())) {
                throw new Exception("Failed to uplaode file. File size too large", Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            Blog::where('id', $request->id)->update(['titel' => $reuest->titel, 'written_by' => $request->auther, 'content' => $request->message, 'image' => $request->image]);
        } else {
            Blog::where('id', $request->id)->update(['titel' => $request->titel, 'written_by' => $request->auther, 'content' => $request->message]);
        }

        return redirect()->route('blog')->withErrors([
            'msg' => 'Blog Updated Sucessfully.',
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function viewblog($id)
    {
        $data = Blog::where('id', $id)->first();

        return view('viewblog', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        $titel = $request->titel;
        $blog  = Blog::where('titel', 'LIKE', '%' . $titel . '%')->get();
        return view('blog', compact('blog'));
    }
}
