<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::get();

        return view('tabungan.index',compact('students'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' =>'required',
            'nama' => 'required',
            'rayon' => 'required',
            'rombel' =>'required',
        ]);

        Student::create($request->all());

        return redirect()->route('index')
                     ->with('success','Berhasil Membuat Money Safe');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student=Student::where('id', $id)->first();
        return view('tabungan.edit')->with('student',$student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request
     * @param  \App\Models\Student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' =>'required',
            'nama' =>'required',
            'rayon' =>'required',
            'rombel' =>'required',
            'uang' =>'required',
        ]);

        $student = Student::where('id', $id)->first();

        if($request->action == 'add') {
            $totaluang = $student['uang'] + $request->uang;
            $student->update([
                'nis'=> $request->nis,
                'nama'=> $request->nama,
                'rayon'=> $request->rayon,
                'rombel'=> $request->rombel,
                'uang'=> $totaluang
            ]);

            return redirect()->route('index')
                        ->with('add', 'Berhasil Menambah Uang!');
        } elseif($request->action == 'take') {
            if ($student['uang'] < $request->uang){
                return redirect ()->route('index')
                        -> with ('failed', 'Uang Anda Tidak Mencukupi!');
            } else{
                $totaluang= $student['uang'] - $request->uang;
                $student->update([
                    'nis'=> $request->nis,
                    'nama'=> $request->nama,
                    'rayon'=> $request->rayon,
                    'rombel'=> $request->rombel,
                    'uang'=> $totaluang
                ]);
                return redirect ()->route('index')
                                    ->with ('take', 'Berhasil Mengambil!');
            }
        }

        $student->update([
            'nis'=> $request->nis,
            'nama'=> $request->nama,
            'rayon'=> $request->rayon,
            'rombel'=> $request->rombel,
        ]);

        return redirect()->route('index')
                            ->with('edit', 'Berhasil edit data');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::Where('id', $id) ->delete();
        return redirect()->route('index')
                        ->with('delete','Berhasil menghapus data');
    }
}
