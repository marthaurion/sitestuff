<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Tag;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->composeNavigation();
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}


	private function composeNavigation()
	{
		view()->composer('app', 'App\Http\Composers\NavigationComposer');
		view()->composer('partials._form', 'App\Http\Composers\NavigationComposer');
        view()->composer('partials._sidebar', 'App\Http\Composers\NavigationComposer');
	}
}
