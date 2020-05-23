<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\LoaiSach;
use Session;
use App\Cart;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){
            if(Session('cart'))
            {
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'sach'=>$cart->items,'tongcong'=>$cart->totalPrice,'soluong'=>$cart->totalQty]);
            }
        });
    }
}