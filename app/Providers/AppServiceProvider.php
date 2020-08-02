<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Banner;
use App\Models\Order;
use App\Models\Detail;
use App\Models\Province;
use App\Models\ProductView;
use Carbon\Carbon;
use  DB;



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
        $product = Product::all();
        $today = strtotime(Carbon::today());
        foreach ($product as $pd) {
            $end_day = strtotime($pd->end_promotion);
            if ($today == $end_day) {
                // dd(1);
                DB::table('tb_products')
                    ->where('percent_promotion', '!=', null)
                    ->update([
                        'percent_promotion' => null,
                        'start_promotion' => null,
                        'end_promotion' => null
                    ]);
            }
        }

        $data['cate'] = Category::all();
        $data['slide'] = Banner::orderBy('id', 'desc')->get();

        $data['order'] = Order::whereDay('created_at', Carbon::now()->day)->where('status', 0)->count();
        $data['views'] = ProductView::whereDay('created_at', Carbon::now()->day)->count();
        $data['money'] = Order::whereDay('created_at', Carbon::now()->day)->where('status', 0)->sum('cost_total');

        $data['order_month'] = Order::whereMonth('created_at', Carbon::now()->month)->where('status', 2)->count();
        $data['order_month_false'] = Order::whereMonth('created_at', Carbon::now()->month)->where('status', 3)->count();
        $data['views_month'] = ProductView::whereMonth('created_at', Carbon::now()->month)->count();
        $data['money_month'] = Order::whereMonth('updated_at', Carbon::now()->month)->where('status', 2)->sum('cost_total');
        $data['money_month_false'] = Order::whereMonth('updated_at', Carbon::now()->month)->where('status', 3)->sum('cost_total');
        $data['count'] = Order::whereMonth('updated_at', Carbon::now()->month)->where('status', 2)->sum('count');
        // dd($data['money_month']);
        $data['city'] = Province::orderBy('matp', 'ASC')->get();
        view()->share($data);
    }
}
