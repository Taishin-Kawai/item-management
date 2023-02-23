<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
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
   * 商品一覧
   */
  public function index(Request $request)
  {
    // 商品一覧取得
    // $items = Item::select('id', 'user_id', 'name', 'price', 'status', 'type', 'detail','created_at','updated_at')->get();
    $items = $request->user()->item()->get();
    return view('item/index',['items' => $items], compact('items'));
  }

  /**
   * 商品登録
   */
  public function add(Request $request)
  {
    // POSTリクエストのとき
    if ($request->isMethod('post')) {
      // バリデーション
      $this->validate($request, [
        'name' => 'required|max:100',
        'price' => 'required|max:100000',
        'status' => 'required',
        'type' => 'required',
        'detail' => 'required|max:100',
      ]);

      // 商品登録
      // Item::create([
      //   'user_id' => Auth::user()->id,
      //   'name' => $request->name,
      //   'price' => $request->price,
      //   'status' => $request->status,
      //   'type' => $request->type,
      //   'detail' => $request->detail,
      // ]);
      $request->user()->item()->create([
        'name' => $request->name,
        'price' => $request->price,
        'status' => $request->status,
        'type' => $request->type,
        'detail' => $request->detail,
      ]);
      return redirect('/items');
    }
    return view('item/add');
  }

  //id取得、表示、確認画面
  public function show($id)
  {
    // dd($id);
    $item = Item::find($id);
    return view('item/show', compact('item'));
  }

  //編集画面
  public function edit($id)
  {
    // dd($id);
    $item = Item::find($id);
    return view('item/edit', compact('item'));
  }

  //更新
  public function update(Request $request, $id)
  {
    // dd($id);
    $item = Item::find($id);
    $item->name = $request->name;
    $item->price = $request->price;
    $item->status = $request->status;
    $item->type = $request->type;
    $item->detail = $request->detail;
    $item->save();
    return redirect('/items');
  }

  //削除
  public function destroy(Request $request, Item $item,$id)
  {
    // dd($id);
    $item = Item::find($id);
    $item->delete();
    return redirect('/items');
  }
}
