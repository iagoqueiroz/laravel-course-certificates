<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $courses = $request->user()->courses()->get();

        return view('home')->with(compact('courses'));
    }

    public function getCertification(Request $request, Course $course)
    {
        $course = $request->user()->courses()->where('course_id', $course->id)->first();

        if(!$course->pivot->certification_filename) {
            $certification = $this->makeCertification($course);
        } else {
            $certification = $course->pivot->certification_filename;
        }

        return redirect(Storage::url($certification));
    }

    public function makeCertification(Course $course)
    {
        $fileName = md5(time()) . '.pdf';
        $pdf = PDF::loadView('certification', ['course' => $course, 'user' => Auth::user()]);

        DB::beginTransaction();

        try {
            $pdf->save(storage_path('app/public/' . $fileName));

            $course->pivot->certification_filename = $fileName;
            $course->pivot->save();

            DB::commit();

            return $fileName;
        } catch(\Exception $e) {
            DB::rollBack();

            dd($e->getMessage());
        }
    }
}
