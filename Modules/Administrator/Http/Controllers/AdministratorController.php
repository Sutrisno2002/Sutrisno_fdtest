<?php

namespace Modules\Administrator\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('administrator::pages.index');
    }

    /**
     * Edit administrator notification
     *
     * @return void
     */
    public function notification()
    {
        return view('administrator::pages.notification');
    }

    /**
     * Edit administrator profile
     *
     * @return void
     */
    public function profile()
    {
        return view('administrator::pages.profile', [
            'user' => user('id', 'web'),
        ]);
    }
}
