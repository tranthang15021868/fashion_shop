<?php

namespace App\Http\Controllers;

use Request, Cart;
use File;
use App\Cate;
use App\Product;
use App\Image;
use App\Http\Requests\ProductRequest;
use Auth, Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\ContactRequest;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $product_feature = DB::table('products') -> select('id', 'name', 'alias', 'price', 'image', 'cate_id') -> orderBy('price', 'DESC') ->skip(0) -> take(4) -> get();
        $product_feature1 = DB::table('products') -> select('id', 'name', 'alias', 'price', 'image', 'cate_id') -> orderBy('price', 'DESC') ->skip(4) -> take(8) -> get();
        $product_latest = DB::table('products') -> select('id', 'name', 'alias', 'price', 'image', 'cate_id') -> orderBy('id', 'DESC') ->skip(0) -> take(4) -> get();
        $product_latest1 = DB::table('products') -> select('id', 'name', 'alias', 'price', 'image', 'cate_id') -> orderBy('id', 'DESC') ->skip(4) -> take(8) -> get();
        return view('user.pages.home', compact('product_feature', 'product_latest', 'product_feature1', 'product_latest1'));
    }

    public function loaiSanPham($id) {
        $product_cate = Product::select('id', 'name', 'alias', 'price', 'image', 'cate_id') -> where('cate_id', $id) -> paginate(2);
        if (count($product_cate) > 0) {
            $cate = Cate::findOrFail($id);
            $cat = Cate::select('id','parent_id') -> where('id', $product_cate[0] -> cate_id) -> first();
            $menu_cate = Cate::select('id', 'name', 'alias') -> where('parent_id', $cat -> parent_id) -> get();
            $parent_cate = Cate::findOrFail($cat -> parent_id);
            $product0 = Product::findOrFail($product_cate[0] -> id);
            $product1 = Product::findOrFail($product_cate[1] -> id);
            $product_sell = Product::select('id', 'name', 'alias', 'price', 'image', 'cate_id') -> where('cate_id', $id) -> orderBy('id', 'DESC') -> take(3) -> get();
            return view('user.pages.cate', compact('product_cate', 'cate', 'menu_cate', 'parent_cate', 'cat', 'product0', 'product1', 'product_sell'));
        }
        else {
            return view ('user.pages.empty');
        }
    }

    public function product($id) {
        $product_detail = DB::table('products') -> where('id', $id) -> first();
        $image = Image::select('id', 'image', 'product_id') -> where('product_id', $id) -> get();
        $product_cate = DB::table('products') -> where('cate_id', $product_detail -> cate_id) -> where('id', '<>', $id) ->skip(0) -> take(4) -> get();
        $product_cate1 = DB::table('products') -> where('cate_id', $product_detail -> cate_id) -> where('id', '<>', $id) ->skip(4) -> take(8) -> get();
        $cat = Cate::findOrFail($product_detail -> cate_id);
        $menu_cate = DB::table('cates') -> where('parent_id', $cat -> parent_id) -> get();
        $product_sell = DB::table('products') -> where('cate_id', $product_detail -> cate_id) -> where('id', '<>', $id) -> orderBy('id', 'DESC') -> take(3) -> get();
        return view('user.pages.product_detail', compact('product_detail', 'cat', 'image', 'product_cate', 'product_cate1', 'menu_cate', 'product_sell'));
    }

    public function getContact() {
        return view('user.pages.contact');
    }

    public function postContact(ContactRequest $request) {
        $mess = $request -> message;
        $data = ['username' => $request -> input('name'), 'email' => $request -> input('email'), 'me' => $mess];
        Mail::send('user.pages.email_blank', $data, function($msg) {
            $msg -> from('thangtr97@gmail.com', 'Hi');
            $msg -> to('thangtr97@gmail.com', 'Thắng') -> subject('gủi mail');
        });
        echo "<script>
            alert('Thanks for contacting us! We will get in touch with you shortly');
            window.location = '".url('/')."'
        </script>>";
    }

    public function postShopping(Request $request, $id) {
        $product_buy = DB::table('products') -> where('id', $id) -> first();
        Cart::add(['id' => $id, 'name' => $product_buy -> name, 'qty' => Request::input('qt'), 'price' => $product_buy -> price, 'options' => ['img' => $product_buy -> image, 'alias' => $product_buy -> alias]]);
        return redirect() -> route('getCart');
    }

    public function getCart() {
        $content = Cart::content();
        if (count($content) >= 0) {
            $total = Cart::total();
            return view('user.pages.cart', compact('content', 'total'));
        }
        else {
            return view('user.pages.empty');
        }
    }

    public function deleteProduct($id) {
        Cart::remove($id);
        return redirect() -> back();
    }

    public function update() {
        if (Request::ajax()) {
            $id = Request::get('id');
            $qty = Request::get('qty');

            Cart::update($id, $qty);
            echo 'oke';
        }
    }
}

