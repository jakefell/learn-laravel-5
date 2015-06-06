<?php namespace App\Http\Composers;
use App\Article;
use Illuminate\Contracts\View\View;

/**
 * Class: NavigationComposer
 * Created: 06/06/15 20:56
 * Author: Jake Fell <jake@jakefell.com>
 */

class NavigationComposer {

    /**
     * Get the latest article and pass it to the navigation view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('latest', Article::latest()->first());
    }
}