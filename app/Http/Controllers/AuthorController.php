<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;

use Session;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $builder)
    {
        if ($request->ajax()) {
            $authors = Author::select(['id', 'name']);
            return Datatables::of($authors)
                    ->addColumn('action', function ($author) {
                        return view('datatable._action', [
                        'model'=> $author,
                        'form_url'=> route('authors.destroy', $author->id),
                        'edit_url' => route('authors.edit', $author->id),
                    ]);
                    })->make(true);
        }
        $html = $builder
            ->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'Nama'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false,
                         'searchable'=>false]);
        return view('author.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author = new Author;
        $author->name = $request->name;
        $author->save();
        Session::flash("flash_notification", [
                "level"=>"success",
                "message"=>"Berhasil menyimpan <b>". $author->name."</b>"
                ]);

        return redirect()->route('authors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        // $this->validate($request, ['name' => 'required|unique:authors']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        $author = Author::findOrFail($author->id);
        return view('author.edit')->with(compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $this->validate($request, ['name' => 'required|unique:authors,name,'. $author->id]);
        $author = Author::findOrFail($author->id);
        $author->name = $request->name;
        $author->save();
        Session::flash("flash_notification", [
                "level"=>"success",
                "message"=>"Berhasil menyimpan <b>". $author->name."</b>"
                ]);

        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        Author::destroy($author->id);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Penulis berhasil dihapus"
        ]);
        return redirect()->route('authors.index');
    }
}
