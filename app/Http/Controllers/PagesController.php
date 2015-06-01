<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function about() {
        $names = [
            'Me!', 'Chris', 'Andy', 'Jeff'
        ];
        //$names = array();

        return view('pages.about', compact('names'));
    }

    public function contact() {
        return view('pages.contact');
    }

}
