<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $user = Auth::user();
    return view('home', compact('user'));
  }

  public function show()
  {
    $user = Auth::user();
    return view('user/show', compact('user'));
  }

  //編集画面
  public function edit()
  {
    // dd($id);
    $user = Auth::user();
    return view('user/edit', compact('user'));
  }
  //更新
  public function update(Request $request, $id)
  {
    // dd($id);
    $user = User::find($id);
    $user->name = $request->name;
    $user->tel = $request->tel;
    $user->email = $request->email;
    $user->address = $request->address;
    $user->save();
    return redirect('/');
  }

  //削除
  public function destroy(Request $request, $id)
  {
    // dd($id);
    $user = User::find($id);
    $user->delete();
    return redirect('/');
  }

  //削除
  public function confirm()
  {
    return view('user/confirm');
  }
}
