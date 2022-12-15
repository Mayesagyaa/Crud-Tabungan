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
                    <form action="{{ route('updateStudent', $student->id) }}" method="POST" class="row register-form">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="NIS" name="nis" value="{{ $student->nis }}" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nama" name="nama" value="{{ $student->nama }}" />
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
                                    <option value="Cicurug 1">Cicurug 1</option>
                                    <option value="Cicurug 2">Cicurug 2</option>
                                    <option value="Cicurug 3">Cicurug 3</option>
                                    <option value="Cicurug 4">Cicurug 4</option>
                                    <option value="Cicurug 5">Cicurug 5</option>
                                    <option value="Cicurug 6">Cicurug 6</option>
                                    <option value="Cicurug 7">Cicurug 7</option>
                                    <option value="Ciawi 1">Ciawi 1</option>
                                    <option value="Ciawi 2">Ciawi 2</option>
                                    <option value="Ciawi 3">Ciawi 3</option>
                                    <option value="Ciawi 4">Ciawi 4</option>
                                    <option value="Ciawi 5">Ciawi 5</option>
                                    <option value="Cibedug 1">Cibedug 1</option>
                                    <option value="Cibedug 2">Cibedug 2</option>
                                    <option value="Cibedug 3">Cibedug 3</option>
                                    <option value="Cisarua 1">Cisarua 1</option>
                                    <option value="Cisarua 2">Cisarua 2</option>
                                    <option value="Cisarua 3">Cisarua 3</option>
                                    <option value="Cisarua 4">Cisarua 4</option>
                                    <option value="Cisarua 5">Cisarua 5</option>
                                    <option value="Cisarua 6">Cisarua 6</option>
                                    <option value="Tajur 1">Tajur 1</option>
                                    <option value="Tajur 2">Tajur 2</option>
                                    <option value="Tajur 3">Tajur 3</option>
                                    <option value="Tajur 4">Tajur 4</option>
                                    <option value="Tajur 5">Tajur 5</option>
                                    <option value="Sukasari 1">Sukasari 1</option>
                                    <option value="Sukasari 2">Sukasari 2</option>
                                    <option value="Wikrama 1">Wikrama 1</option>
                                    <option value="Wikrama 2">Wikrama 2</option>
                                    <option value="Wikrama 3">Wikrama 3</option>
                                    <option value="Wikrama 4">Wikrama 4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="uang" placeholder="Rp." />
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="action">
                                    <option class="hidden" selected disabled>Pilih Edit</option>
                                    <option value="add">Menambah Tabungan</option>
                                    <option value="take">Menarik Tabungan</option>
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

@endsection
