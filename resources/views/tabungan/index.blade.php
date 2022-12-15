@extends('layouts.main')
@section('content')

<div class="register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="img/moneysafes.png"/>
            <h3>Money Safe</h3>
            <p>Money safe adalah aplikasi berbasis web yang digunakan oleh
                siswa dan siswi untuk menambah atau mengambil tabungan.
            </p>
        </div>


        <div class="col-md-9 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="table-tab" data-toggle="tab" href="#table" role="tab" aria-controls="table" aria-selected="false">About</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Edit Money Safe</h3>
                    <form action="{{ route('store') }}" method="POST" class="row register-form">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="NIS" name="nis" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nama" name="nama" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="rombel">
                                    <option selected hidden>Pilih Rombel</option>
                                    <option>PPLG</option>
                                    <option>TJKT</option>
                                    <option>DKV</option>
                                    <option>MPLB</option>
                                    <option>PMN</option>
                                    <option>HTL</option>
                                    <option>KLN</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="rayon">
                                    <option class="hidden" selected disabled>Pilih Rayon</option>
                                    @for ($i = 1; $i <= 7; $i++)
                                        <option>Cicurug {{ $i }}</option>
                                    @endfor
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option>Ciawi {{ $i }}</option>
                                    @endfor
                                    @for ($i = 1; $i <= 3; $i++)
                                        <option>Cibedug {{ $i }}</option>
                                    @endfor
                                    @for ($i = 1; $i <= 6; $i++)
                                        <option>Cisarua {{ $i }}</option>
                                    @endfor
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option>Tajur {{ $i }}</option>
                                    @endfor
                                    @for ($i = 1; $i <= 2; $i++)
                                        <option>Sukasari {{ $i }}</option>
                                    @endfor
                                    @for ($i = 1; $i <= 4; $i++)
                                        <option>Wikrama {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <input type="submit" class="btnRegister" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<table class="table table-stripped">
    <tr>
        <td>No</td>
        <td>Nis</td>
        <td>Nama Lengkap</td>
        <td>Rayon</td>
        <td>Rombel</td>
        <td>Uang</td>
        <td>Action</td>
    </tr>
    <?php $i = 1;?>
    @foreach ($students as $student)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $student->nis }}</td>
            <td>{{ $student->nama }}</td>
            <td>{{ $student->rayon }}</td>
            <td>{{ $student->rombel }}</td>
            <td>Rp. {{ number_format($student->uang,2,",",".") }}</td>
            <td>
                <form action="{{ route('deleteStudent', $student->id) }}" method="POST">
                    @csrf
                    <a href="{{ route('editStudent', $student->id) }}" type="button" class="btn btn-outline-success">Edit</a>
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

@endsection
