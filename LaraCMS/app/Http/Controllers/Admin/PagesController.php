<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Requests\WorkWithPage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAdminOrEditor()){
        $pages=Page::all();
        return view('admin.pages.index',['pages'=>$pages]);
            }else
            $pages= Auth::user()->pages()->get();
            return \view('admin.pages.index',['pages'=>$pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page=new Page;
        return \view('admin.pages.create',['model'=>$page]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkWithPage $request)
    {
        Auth::user()->pages()->save(new Page($request->only([
            'title','url','content'
        ])));

        return \redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        if(Auth::user()->cant('update',$page)){
            return \redirect()->route('pages.index');
            }else{
                return view('admin.pages.edit',['model'=>$page]);
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(WorkWithPage $request, Page $page)
    {
        if(Auth::user()->cant('update',$page)){
            return \redirect()->route('pages.index');
            }else{
                return view('admin.pages.edit',['model'=>$page]);
            }

        $page->fill($request->only([
            'title','url','content'
        ]));

        $page->save();
        return \redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        if(Auth::user()->cant('delete',$page)){
            return \redirect()->route('pages.index');
            }else{
                return view('admin.pages.edit',['model'=>$page]);
            }
    }
}
