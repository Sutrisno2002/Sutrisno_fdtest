<?php

namespace Modules\Front\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Modules\Common\Models\Page;
use Modules\Common\Models\Post;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('front::index');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function about()
    {
        return view('front::pages.about-us');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function contact()
    {
        return view('front::pages.contact-us');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function profile()
    {
        $member = Auth::user();
        return view('front::pages.profile',[
            'member' => $member,
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function faq()
    {
        return view('front::pages.faq');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function termsAndConditions(Request $request)
    {
        $page = Page::whereSlug('syarat-ketentuan')->firstOrFail();
        return view('front::pages.page', [
            'page' => $page,
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function privacyPolicy(Request $request)
    {
        $page = Page::whereSlug('kebijakan-privasi')->firstOrFail();
        return view('front::pages.page', [
            'page' => $page,
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function post()
    {
        return view('front::pages.post');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function showPost(Post $post)
    {
        return view('front::pages.show-post', [
            'post' => $post,
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function member()
    {
        return view('front::pages.member');
    }
}
