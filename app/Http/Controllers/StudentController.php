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
        $student = Student::get();

        return view('dashboard')->with ('students', $student);
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
            'name' => 'required',
            'rayon' => 'required',
            'money' => 'required',
        ]);

        Student::create($request->all());

        return redirect()->route('dashboard')
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
        $student=$Student::where('id', $id)->first();
        return view('edit')->with('student',$student);
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
            'nis' =>'required|min:8',
            'name' =>'required',
            'rayon' =>'required',
            'method' =>'required',
            'money' =>'required',
        ]);

        $student = Student::where('id', $id)->first();

        if($request->method == 'Add Money') {
            $totalMoney = $student['money'] + $request->money;
            $student->update([
                'nis'=> $request->nis, 
                'name'=> $request->name, 
                'rayon'=> $request->rayon,
                'money'=> $totalMoney
            ]);

            return redirect()->route('dashboard')
                        ->with('add', 'Berhasil Menambah Uang!');
        } elseif($request->method == 'Take Money') {
            if ($student['money'] <$request->money){
                return redirect ()->route('dashboard')
                        -> with ('failed', 'Uang Anda Tidak Mencukupi!');
            } else{
                $totalMoney= $student ['money'] - $request->mone;
                $student->update([
                    'nis'=> $request->nis, 
                    'name'=> $request->name, 
                    'rayon'=> $request->rayon,
                    'money'=> $totalMoney
                ]);
                return redirect ()->route('dashboard ')
                                    ->with ('take', 'Berhasil Mengambil!');
            }
        }

        $student->update([
            'nis'=> $request->nis, 
            'name'=> $request->name, 
            'rayon'=> $request->rayon,
        ]);

        return redirect()->route('dashboard')
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
        $Student::Where('id', '$id') ->delete();
        return redirect()->route('dashboard')
                        ->with('delete','Berhasil menghapus data');
    }
}
