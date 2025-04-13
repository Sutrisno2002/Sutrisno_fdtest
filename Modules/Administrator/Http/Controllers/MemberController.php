<?php

namespace Modules\Administrator\Http\Controllers;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Modules\Volunteers\Models\Member;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator::pages.member.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator::pages.member.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('administrator::pages.member.edit', [
            'member' => $member,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::findOrFail($id);
        return view('administrator::pages.member.show', [
            'member' => $member,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blast()
    {
        return view('administrator::pages.member.blast');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function previewKTA($member_id)
    {
        $member = Member::find($member_id);

        $pdfName = [
            'full' => 'kta/' . $member->member_number . '/' . $member->member_number . '_kta.pdf',
        ];

        $path = public_path() . '/kta/' . $member->member_number;

        File::makeDirectory($path, $mode = 0777, true, true);
        $html = (new MemberController)->showKTA($member->id)->render();
        Pdf::setOption(['dpi' => 300])->loadHTML($html)->setPaper('A4', 'portrait')->save($pdfName['full']);

        return view('administrator::pages.member.preview-kta', [
            'pdfName' => $pdfName['full'],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showKTA($member_id)
    {
        $member = Member::findOrFail($member_id);
        return view('pdf.new_kta', [
            'member' => $member,
            'avatar' => 'data:image/jpeg;base64,' . base64_encode(file_get_contents(
                public_path($member->avatar)
            )),
            'front' => 'data:image/jpeg;base64,' . base64_encode(file_get_contents(public_path('assets/default/images/kta/kta_front.jpg'))),
            'back' => 'data:image/jpeg;base64,' . base64_encode(file_get_contents(public_path('assets/default/images/kta/kta_back.jpg'))),
            'signature' => 'data:image/jpeg;base64,' . base64_encode(file_get_contents(public_path('assets/default/images/kta/ttd_kornas.png'))),
            'kornas_name' => cache('kornas_name') ?: 'Joko Loreng',
        ]);
    }

    public function template()
    {
        $file = public_path('assets/csv/member-format.csv');

        if (file_exists($file)) {
            return Response::download($file);
        } else {
            return abort(404, 'File not found');
        }
    }
}
