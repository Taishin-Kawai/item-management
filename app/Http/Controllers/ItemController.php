<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
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
    $search_word = $request->search;
    $user = Auth::user();
    $query = Item::search($search_word);
    $query = $query -> where('user_id', Auth::id());
    return view('item/index',
    [
      'items' => $query->select('id','name','price','status','quantity','detail','updated_at')
      ->paginate(10), 
      'statuses' => Item::STATUSES,
    ]
      );
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
        'quantity' => 'required',
        'detail' => 'required|max:100',
      ]);

      $request->user()->items()->create([
        'name' => $request->name,
        'price' => $request->price,
        'status' => $request->status,
        'quantity' => $request->quantity,
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
    $item->quantity = $request->quantity;
    $item->detail = $request->detail;
    $item->save();
    return redirect('/items');
  }

  //削除
  public function destroy(Request $request, Item $item,$id)
  {
    $item = Item::find($id);
    $item->delete();
    return redirect('/items');
  }
}
