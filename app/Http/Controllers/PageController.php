<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Silde;
use App\Product;
use App\ProductType;
use App\Cart;
use App\User;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\System;

class PageController extends Controller {

    public function getIndex() {
        $slides = Silde::where('stt', 'ON')->orderBy('id', 'DESC')->get();
        $new_product = Product::where('stt', 'ON')->where('new', 1)->orderBy('id', 'DESC')->paginate(4);
        $sale_product = Product::where('stt', 'ON')->orderBy('promotion_price', 'DESC')->paginate(6);
        $sys_slide = System::where('key', 'slide')->where('stt', 'ON')->first();
        return view('page.home', compact('slides', 'new_product', 'sale_product', 'sys_slide'));
    }

    public function getProduct() {
        $sort_name = 'id';
        $sort_by = 'ASC';
        if (Session::get('sort') == 'name_ASC') {
            $sort_name = 'name';
            $sort_by = 'ASC';
        } else if (Session::get('sort') == 'name_DESC') {
            $sort_name = 'name';
            $sort_by = 'DESC';
        } else if (Session::get('sort') == 'unit_price_ASC') {
            $sort_name = 'unit_price';
            $sort_by = 'ASC';
        } else if (Session::get('sort') == 'unit_price_DESC') {
            $sort_name = 'unit_price';
            $sort_by = 'DESC';
        } else if (Session::get('sort') == 'promotion_price_DESC') {
            $sort_name = 'promotion_price';
            $sort_by = 'DESC';
        }
        $perpage = 9;
        if (@Session::get('perpage')) {
            $perpage = Session::get('perpage');
        }
        $keysearch = "";
        if (@Session::get('keysearch')) {
            $keysearch = Session::get('keysearch');
        }
        $idtype = "";
        if (@Session::get('idtype')) {
            $idtype = Session::get('idtype');
        }
        $products = Product::where('stt', 'ON')
                ->where('name', 'LIKE', "%" . $keysearch . "%")
                ->where('id_type', 'LIKE', "%" . $idtype . "%")
                ->orderBy($sort_name, $sort_by)
                ->paginate($perpage);
        return view('page.product', compact('products'));
    }

    public function getAllProduct() {
        Session::put('keysearch', "");
        Session::put('idtype', "");
        return redirect()->route('product');
    }

    public function getProductType(Request $req) {
        Session::put('keysearch', "");
        Session::put('idtype', $req->idtype);
        return redirect()->route('product');
    }

    public function postSort(Request $req) {
        Session::put('perpage', $req->perpage);
        Session::put('sort', $req->sort);
        return redirect()->route('product');
    }

    public function postSearch(Request $req) {
        Session::put('keysearch', $req->keysearch);
        Session::put('idtype', "");
        return redirect()->route('product');
    }

    public function getProductDetail(Request $req) {
        $product_detail = Product::where('id', $req->id)->first();
        $products = Product::where('id_type', $product_detail->id_type)->paginate(3);
        return view('page.product-detail', compact('product_detail', 'products'));
    }

    public function getContact() {
        $sys_contact = System::where('key', 'contact')->where('stt', 'ON')->first();
        return view('page.contact', compact('sys_contact'));
    }

    public function getAbout() {
        $sys_about = System::where('key', 'about')->where('stt', 'ON')->first();
        return view('page.about', compact('sys_about'));
    }

    public function getPayment() {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $payments = $cart->items;
        return view('page.payment', compact('payments', 'payments'));
    }

    public function postPayment(Request $req) {
        $cart = Session::get('cart');
        $this->validate($req, [
            'email' => 'required|email',
            'fullname' => 'required',
                ], [
            'email.required' => 'Vui lòng nhập email, ',
            'email.email' => 'Email không đúng định dạng, ',
            'fullname.required' => 'Vui lòng nhập họ tên, ',
        ]);
        if ($cart) {
            $cus = Customer::where('email', '=', $req->email)->first();
            if ($cus) {
                //Add bill
                $bill = new Bill;
                $bill->id_customer = $cus->id;
                $bill->date_order = date('Y-m-d');
                $bill->total = $cart->totalPrice;
                $bill->payment = $req->payment;
                $bill->note = $req->note;
                $bill->code = $req->code;
                $bill->stt = "0";
                $bill->save();
                //Add Bill detail
                foreach ($cart->items as $key => $value) {
                    $bill_detail = new BillDetail;
                    $bill_detail->id_bill = $bill->id;
                    $bill_detail->id_product = $key;
                    $bill_detail->quantity = $value['qty'];
                    $bill_detail->unit_price = ($value['price'] / $value['qty']);
                    $bill_detail->save();
                }
            } else {
                //Add customer
                $customer = new Customer;
                $customer->name = $req->fullname;
                $customer->email = $req->email;
                $customer->address = $req->address;
                $customer->phone = $req->phone;
                $customer->stt = "ON";
                $customer->save();
                //Add Bill
                $bill = new Bill;
                $bill->id_customer = $customer->id;
                $bill->date_order = date('Y-m-d');
                $bill->total = $cart->totalPrice;
                $bill->payment = $req->payment;
                $bill->note = $req->note;
                $bill->code = $req->code;
                $bill->stt = "0";
                $bill->save();
                //Add bill detail
                foreach ($cart->items as $key => $value) {
                    $bill_detail = new BillDetail;
                    $bill_detail->id_bill = $bill->id;
                    $bill_detail->id_product = $key;
                    $bill_detail->quantity = $value['qty'];
                    $bill_detail->unit_price = ($value['price'] / $value['qty']);
                    $bill_detail->save();
                }
            }
            Session::forget('cart');
            return redirect()->back()->with('message', 'Đã xác nhận đơn hàng!');
        } else {
            return redirect()->back();
        }
    }

    public function getLogin() {
        return view('page.login');
    }

    public function postLogin(Request $req) {
        $this->validate($req, [
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
                ], [
            'email.required' => 'Vui lòng nhập email, ',
            'email.email' => 'Email không đúng định dạng, ',
            'password.required' => 'Vui lòng nhập mật khẩu, ',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự, ̣',
            'password.max' => 'Mật khẩu tối đa 20 ký tự.̣'
        ]);
        $checklog = array('email' => $req->email, 'password' => $req->password);
        if (Auth::attempt($checklog)) {
            return redirect()->back()->with(['alert' => 'success', 'message' => 'Đăng nhập thành công!']);
        } else {
            return redirect()->back()->with(['alert' => 'danger', 'message' => 'Đăng nhập thất bại!']);
        }
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('home');
    }

    public function getRegister() {
        return view('page.register');
    }

    public function postRegister(Request $req) {
        $this->validate($req, [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:20',
            'fullname' => 'required',
            'repassword' => 'required|same:password'
                ], [
            'email.required' => 'Vui lòng nhập email, ',
            'email.email' => 'Email không đúng định dạng, ',
            'email.unique' => 'Email đã có người sử dụng, ',
            'fullname.required' => 'Vui lòng nhập họ tên, ',
            'repassword.same' => 'Mật khẩu không khớp nhau, ',
            'password.required' => 'Vui lòng nhập mật khẩu, ',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự, ̣',
            'password.max' => 'Mật khẩu tối đa 20 ký tự.̣'
        ]);
        $user = new User;
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->type = "Khách Hàng";
        $user->stt = "OFF";
        $user->save();
        return redirect()->back()->with('message', 'Đã đăng ký thành công! Vui lòng chờ xác nhận email');
    }

    public function getAddToCart(Request $req, $id) {
        $product = Product::find($id);
        $odlCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($odlCart);
        $cart->add($product, $id);
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getDeleteCart($id) {
        $odlCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($odlCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getReduceCart($id) {
        $odlCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($odlCart);
        $cart->reduceByOne($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getProfile() {
        if (Auth::check()) {
            return view('page.profile');
        } else {
            return view('page.login');
        }
    }

    public function postProfile(Request $req) {
        if (Auth::check()) {
            $this->validate($req, [
                'email' => 'required|email',
                'fullname' => 'required',
                    ], [
                'email.required' => 'Vui lòng nhập email, ',
                'email.email' => 'Email không đúng định dạng, ',
                'fullname.required' => 'Vui lòng nhập họ tên, ',
            ]);
            $user = User::where('email', '=', $req->email)->first();
            if ($user) {
                $user->full_name = $req->fullname;
                $user->phone = $req->phone;
                $user->address = $req->address;
                $user->save();
                return redirect()->back()->with('message', 'Đã cập nhật thành công!');
            } else {
                return redirect()->back()->with('err', 'Xin lỗi, Email để định danh tài khoản của bạn. Vui làng nhập đúng email!');
            }
        } else {
            return view('page.login');
        }
    }

    public function getRepass() {
        return view('page.repass');
    }

    public function postRepass(Request $req) {
        $this->validate($req, [
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
            'repassword' => 'required|same:password'
                ], [
            'email.required' => 'Vui lòng nhập email, ',
            'email.email' => 'Email không đúng định dạng, ',
            'repassword.same' => 'Mật khẩu không khớp nhau, ',
            'password.required' => 'Vui lòng nhập mật khẩu, ',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự, ̣',
            'password.max' => 'Mật khẩu tối đa 20 ký tự.̣'
        ]);
        $user = User::where('email', '=', $req->email)->first();
        if ($user) {
            $user->password = Hash::make($req->password);
            $user->save();
            return redirect()->back()->with('message', 'Đã thay đổi mật khẩu thành công!');
        } else {
            return redirect()->back()->with('err', 'Email không xác định!');
        }
    }

}
