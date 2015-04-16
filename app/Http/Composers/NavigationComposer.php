<?php namespace App\Http\Composers;


use App\Category;
use App\Tag;

class NavigationComposer {

	public function compose($view)
	{
		$view->with([
			'cat_names' => Category::lists('title', 'id'),
            'categories' => Category::whereNull('parent')->get(),
			'tags' => Tag::lists('name', 'id')
		]);	
	}

}
