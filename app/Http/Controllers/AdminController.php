<?php

namespace App\Http\Controllers;

use App\User;
use App\Article;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDF;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $admin = User::all();
        $article = Article::all();
        return view('admin.index', compact('admin', 'article'));
    }

    public function admin(User $user)
    {
        // $admin = User::where('roles', 'admin');
        $admin = User::all();
        // $user = User::findOrFail($user->id);
        return view('admin.admin', compact('admin'));
    }
    public function biasa()
    {
        return view('admin.biasa');
    }

    public function article()
    {

        $article = Article::all();
        return view('admin.article', compact('article'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request...
        if ($request->file('file')) {
            $files = $request->file('file')->store('img/user', 'public');
        }
        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);
        $admin = new User();

        $admin->name = $request->name;
        $admin->email = $request->email;

        $admin->password = Hash::make($request->password);
        $admin->roles = $request->roles;
        $admin->image = $files;
        // return $admin;
        $admin->save();
        return redirect()->route('admin')
            ->with('success', 'User successfully add.');
        //Redirect ke halaman books/index.blade.php dengan pesan success
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(User $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user = User::findOrFail($user->id);
        $user->delete();
        return redirect()->route('dashboard')
            ->with('danger', 'Article deleted successfully.'); //Redirect ke halaman books/index.blade.php dengan pesan success
    }

    public function print()
    {
        $data = User::all();
        $pdf = PDF::loadview('admin.print', compact('data'));
        return $pdf->stream('laporan.pdf');
    }
}
