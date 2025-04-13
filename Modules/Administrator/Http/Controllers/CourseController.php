<?php

namespace Modules\Administrator\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Course\Models\Course;
use Modules\Course\Models\CustomerCourse;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('administrator::pages.course.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('administrator::pages.course.create');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $course = Course::withCount(['steps'])->findOrFail($id);
        return view('administrator::pages.course.edit', [
            'course' => $course,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function video($id)
    {
        $course = Course::withCount(['steps'])->findOrFail($id);
        return view('administrator::pages.course.video', [
            'course' => $course,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function step($id)
    {
        $course = Course::withCount(['steps'])->findOrFail($id);
        return view('administrator::pages.course.step', [
            'course' => $course,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function price($id)
    {
        $course = Course::withCount(['steps'])->findOrFail($id);
        return view('administrator::pages.course.price', [
            'course' => $course,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function setting($id)
    {
        $course = Course::withCount(['steps'])->findOrFail($id);
        return view('administrator::pages.course.setting', [
            'course' => $course,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function review($id)
    {
        $course = Course::withCount(['steps'])->findOrFail($id);
        return view('administrator::pages.course.review', [
            'course' => $course,
        ]);
    }

    /**
     * Generate customer course certificate
     *
     * @param  mixed $request
     * @return void
     */
    public function generateCertificate(Request $request)
    {
        $customer_course = CustomerCourse::where([
            'customer_id' => $request->id,
            'certificate_id' => $request->certificate_id,
        ])->first();

        $customer = $customer_course->customer;

        $logo = substr(cache('logo'), 0, 1) == '/' ? substr(cache('logo'), 1) : cache('logo');
        $font_path = config('dompdf.options.font_dir');
        $data = [
            'fonts' => [
                'BonheurRoyale' => $font_path . '/BonheurRoyale-Regular.ttf',
                'PlayfairDisplay' => $font_path . '/PlayfairDisplay-Regular.ttf',
                'PlusJakartaSans' => $font_path . '/PlusJakartaSans-Regular.ttf',
                'PlusJakartaSans-Bold' => $font_path . '/PlusJakartaSans-Bold.ttf',
            ],
            'background' => 'data:image/jpg;base64,' . base64_encode(file_get_contents('assets/default/images/pattern_background.jpg')),
            'logo' => 'data:image/jpg;base64,' . base64_encode(file_get_contents($logo)),
            'signature' => [
                'name' => 'Achmad Ridho',
                'title' => 'Chief Executive Officer at ' . cache('app_name'),
                'sign' => 'data:image/png;base64,' . base64_encode(file_get_contents('assets/default/images/signature.png')),
            ],
            'customer' => $customer,
            'customer_course' => $customer_course,
            'verify_link' => route('front.accomplishment.verify', $customer_course->certificate_id),
            'filename' => $customer->name . ' - ' . $customer_course->certificate_id . '.pdf',
        ];

        $html = view('front::pdf.certificate-a4', $data)->render();
        $pdf = Pdf::loadHTML($html)
            ->setOption('dpi', 72)
            ->setPaper('a4', 'landscape')
            ->setWarnings(false);

        if ($request->mode == 'download') {
            return $pdf->download($customer->name . ' - ' . $customer_course->certificate_id . '.pdf');
        }

        return $pdf->stream($customer->name . ' - ' . $customer_course->certificate_id . '.pdf');
    }
}
