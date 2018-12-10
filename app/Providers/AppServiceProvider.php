<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
use App\Product;
use App\Cart;
use App\System;
use Session;

class AppServiceProvider extends ServiceProvider {

    public function boot() {
        view()->composer('menu', function ($view) {
            $product_type = ProductType::all();
            $view->with('product_type', $product_type);
            $product_sugesst = Product::where('id', '<>', null)->paginate(2);
            $sys_type = System::where('key', 'type')->where('stt', 'ON')->first();
            $sys_payment = System::where('key', 'payment')->where('stt', 'ON')->first();
            $view->with(['product_sugesst' => $product_sugesst, 'sys_type' => @$sys_type, 'sys_payment' => @$sys_payment]);
        });
        view()->composer('admin_master', function ($view) {
            $sys_logo = System::where('key', 'logo')->where('stt', 'ON')->first();
            $sys_title = System::where('key', 'title')->where('stt', 'ON')->first();
            $view->with(['sys_logo' => @$sys_logo, 'sys_title' => @$sys_title]);
        });
        view()->composer('master', function ($view) {
            //get All values
            $sys_logo = System::where('key', 'logo')->where('stt', 'ON')->first();
            $sys_title = System::where('key', 'title')->where('stt', 'ON')->first();
            $sys_header = System::where('key', 'header')->where('stt', 'ON')->first();
            $sys_footer = System::where('key', 'footer')->where('stt', 'ON')->first();
            $sys_facebook = System::where('key', 'facebook')->where('stt', 'ON')->first();
            $sys_instagram = System::where('key', 'instagram')->where('stt', 'ON')->first();
            $sys_google = System::where('key', 'google')->where('stt', 'ON')->first();
            //get Cart
            if (Session('cart')) {
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with([
                    'cart' => Session::get('cart'), 'product_cart' => $cart->items, 'totalPrice' => $cart->totalPrice,
                    'totalQty' => $cart->totalQty, 'sys_logo' => @$sys_logo, 'sys_title' => @$sys_title,
                    'sys_header' => @$sys_header, 'sys_footer' => @$sys_footer,
                    'sys_facebook' => @$sys_facebook, 'sys_instagram' => @$sys_instagram,
                    'sys_google' => @$sys_google
                ]);
            } else {
                $view->with([
                    'sys_logo' => @$sys_logo, 'sys_title' => @$sys_title,
                    'sys_header' => @$sys_header, 'sys_footer' => @$sys_footer,
                    'sys_facebook' => @$sys_facebook, 'sys_instagram' => @$sys_instagram,
                    'sys_google' => @$sys_google
                ]);
            }
        });
    }

    public function register() {
        //
    }

}
