<?php

namespace Myrtle\Core\Themes\Admin\Beach\Theme\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Myrtle\Users\Models\User;

class MyrtleThemeAdminBeachServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
		$this->publishes([
			base_path(). '/vendor/agilesdesign/myrtle-theme-admin-beach/src/public' => public_path(),
		], 'public');

		View::composer(['admin::users.create', 'admin::vendors.contacts.create'], function ($view)
		{
			$view->withNamefirstfield('name[first]');
			$view->withNamemiddlefield('name[middle]');
			$view->withNamelastfield('name[last]');
			$view->withNamepreferredfield('name[preferred]');
			$view->withNamenicknamefield('name[nickname]');
		});

		View::composer('admin::blocks.users.total', function ($view)
		{
			$view->with('registered', User::all()->count());
		});

		View::composer('admin::blocks.users.registeredsince', function ($view)
		{
			$view
				->with('users', User::all())
				->with('today', User::where('created_at', '>=', Carbon::now()->startOfDay())->count())
				->with('week', User::where('created_at', '>=', Carbon::now()->startOfWeek())->count())
				->with('month', User::where('created_at', '>=', Carbon::now()->startOfMonth())->count())
				->with('year', User::where('created_at', '>=', Carbon::today()->startOfYear())->count())
				->with('seven', User::where('created_at', '>=', Carbon::today()->subDays(7))->count())
				->with('thirty', User::where('created_at', '>=', Carbon::today()->subDays(30))->count())
				->with('ninety', User::where('created_at', '>=', Carbon::today()->subDays(90))->count())
				->with('threesixtyfive', User::where('created_at', '>=', Carbon::today()->subDays(365))->count());
		});

		View::composer('admin::blocks.users.online', function ($view)
		{
			$view->withOnline(DB::table('sessions')->select('distinct user_id')->count());
		});
    }
}
