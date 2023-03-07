<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Item;
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
    if($user->gender === 0){
      $gender = '男性';
    } else {
      $gender = '女性';
    }
    return view('user/show', compact('user','gender'));
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

  // 削除機能
  public function destroy(Request $request, User $user,$id)
  {

    Item::where('user_id',$id)->delete();
    $user = User::find($id);
    $user->forceDelete();
    return redirect()->route('home');
  }

  //削除画面
  public function confirm()
  {
    $user = auth()->user();
    if($user->gender === 0){
      $gender = '男性';
    } else {
      $gender = '女性';
    }
    return view('user/confirm',['user'=>$user],compact('user','gender'));
  }
}
