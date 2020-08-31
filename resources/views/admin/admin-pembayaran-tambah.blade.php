@extends('layouts.app')

@section('content')
    <div style="margin-top:20px;" class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5><b>Identitas Mahasiswa</b></h5>
                    </div><!--card-header-->
                    <div class="card-body">
                        @foreach ($user as $usr)

                        <p>Nama : {{$usr->name}}</p>
                        <p>NIM : {{$usr->nim}}</p>
                        <p>Kelas : <b>{{$usr->kelas}}</b></p>
    
                        @php
                        $databiaya=DB::select(DB::raw("SELECT * FROM biaya_prodi WHERE id_prodi='$usr->id_prodi' AND kelas='$usr->kelas'"));
                        $prodi=DB::select(DB::raw("SELECT prodi FROM prodi WHERE id_prodi='$usr->id_prodi'"));
                        @endphp
                    </div><!--card-body-->
                </div><!--card-->
            </div><!--col 4-->

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5><b>Total Pembayaran : </b></h5>
                    </div><!--card-header-->
                    <div class="card-body">
                        <?php
                        $counterSemester=1;
                    ?>
                    <div class="row">
                        @foreach ($totalPembayaranSemester as $tps)
                        <div class="col-lg-6">
                            <p class="card-text">Semester {{$counterSemester++}} : <b><br>Rp. {{ number_format($tps->total, 2, ',', '.') }}</b></p>
                        </div><!--col-6-->
                        @endforeach   
                    </div><!--row-->
                    </div><!--card body-->
                </div><!--card-->  
            </div><!--col-->

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        @foreach($prodi as $prdi)
                            <h5><b>Biaya Semester Prodi {{$prdi->prodi}}</b></h5>
                        @endforeach
                    </div><!--card-header-->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>Jenis Biaya</th>
                                <th>Jumlah Biaya</th>
                            </thead>
                            <tbody>
                                @foreach($databiaya as $dbi)
                                <tr>
                                    <td>{{$dbi->jenis_biaya}}</td>
                                    <td>Rp. {{ number_format($dbi->jumlah_biaya, 2, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endforeach
                    </div><!--card-body-->
                </div><!--card-->
            </div><!--col-4-->

            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h3><b>Tagihan Pembayaran</b></h3>
                    </div><!--card-header-->
                    <div class="card-body">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-tagihan-pembayaran-modal" style="margin-bottom:20px;">
                            Tambah Tagihan
                        </button>
                        
                                <!-- Modal Tambah Tagihan Pembayaran-->
                                <div class="modal fade" id="tambah-tagihan-pembayaran-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2>Form Tambah Tagihan Pembayaran</h2>   
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">                  
                                            {!!Form::open(['action'=>'TagihanController@tambahTagihan', 'method'=>'POST'])!!}
                                            <div class="form-group">
                                                {{Form::label('nama_tagihan','Nama Tagihan :')}}
                                                {{Form::text('nama_tagihan','',['class'=>'form-control form-group','placeholder'=>'','required'])}}
                                                {{Form::label('jumlah_tagihan','Jumlah Tagihan :')}}
                                                {{Form::text('jumlah_tagihan','',['class'=>'form-control form-group','placeholder'=>'','required'])}}
                                                {{Form::label('semester','Semester :')}}
                                                <select name="semester" class="form-control form-group">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="pendek">Pendek</option>
                                                </select>
                                                {{Form::label('keterangan','Keterangan :')}}
                                                {{Form::text('keterangan','',['class'=>'form-control form-group','placeholder'=>'','required'])}}
                                                {{Form::label('periode','Periode :')}}
                                                <select name="id_periode" class="form-control form-group">
                                                    @foreach ($periode as $periode1)
                                                    <option value="{{$periode1->id_periode}}">{{$periode1->periode}}</option>
                                                    @endforeach
                                                </select>
                                                @foreach($user as $usr)
                                                {{Form::hidden('id_user', $usr->id_user) }}
                                                {{Form::hidden('id_prodi', $usr->id_prodi) }}
                                                @endforeach
                                  
                                            </div>
                                            {{Form::submit('Simpan',['class'=>'btn btn-success btn-block'])}}
                                        {!!Form::close()!!}
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!--Modal Tambah Tagihan-->
                        <table id="tabel-tagihan" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Id.</th>
                                    <th>Nama Tagihan</th>
                                    <th>Jumlah Tagihan</th>
                                    <th>Semester</th>
                                    <th>Keterangan</th>
                                    <th>Periode</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($tagihan as $tgh)
                                <tr>
                                    <td></td>
                                    <td>{{$tgh->id_tagihan}}</td>
                                    <td>{{$tgh->nama_tagihan}}</td>
                                    <td>Rp. {{ number_format($tgh->jumlah_tagihan, 2, ',', '.') }}</td>
                                    <td>{{$tgh->semester}}</td>
                                    <td>{{$tgh->keterangan}}</td>
                                    <td>{{$tgh->periode}}</td>
                                    <td>{{$tgh->status}}</td>
                                    <td>
                                        <a class="btn btn-success" style="color:#fff;" data-toggle="modal" data-target="#tagihan-pembayaran-edit-modal{{$tgh->id_tagihan}}">Edit</a>
                                    </td> 
                                </tr>
                                <!-- Modal Edit Tagihan Pembayaran-->
                                <div class="modal fade" id="tagihan-pembayaran-edit-modal{{$tgh->id_tagihan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2>Form Edit Tagihan Pembayaran</h2>   
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">                  
                                        {!!Form::open(['action'=>['TagihanController@updateTagihan', $tgh->id_tagihan], 'method'=>'PUT'])!!}
                                            <div class="form-group"><div class="form-group">
                                                {{Form::label('id_tagihan','Id Tagihan :')}}
                                                {{Form::text('id_tagihan',$tgh->id_tagihan,['class'=>'form-control form-group','placeholder'=>'','readonly'])}}
                                                {{Form::label('nama_tagihan','Nama Tagihan :')}}
                                                {{Form::text('nama_tagihan',$tgh->nama_tagihan,['class'=>'form-control form-group','placeholder'=>'','required'])}}
                                                {{Form::label('jumlah_tagihan','Jumlah Tagihan :')}}
                                                {{Form::text('jumlah_tagihan',$tgh->jumlah_tagihan,['class'=>'form-control form-group','placeholder'=>'','required'])}}
                                                {{Form::label('semester','Semester :')}}
                                                <select name="semester" class="form-control form-group">
                                                    <option {{old('semester',$tgh->semester)=="1"? 'selected':''}} value="1">1</option>
                                                    <option {{old('semester',$tgh->semester)=="2"? 'selected':''}} value="2">2</option>
                                                    <option {{old('semester',$tgh->semester)=="3"? 'selected':''}} value="3">3</option>
                                                    <option {{old('semester',$tgh->semester)=="4"? 'selected':''}} value="4">4</option>
                                                    <option {{old('semester',$tgh->semester)=="5"? 'selected':''}} value="5">5</option>
                                                    <option {{old('semester',$tgh->semester)=="6"? 'selected':''}} value="6">6</option>
                                                    <option {{old('semester',$tgh->semester)=="7"? 'selected':''}} value="7">7</option>
                                                    <option {{old('semester',$tgh->semester)=="8"? 'selected':''}} value="8">8</option>
                                                    <option {{old('semester',$tgh->semester)=="9"? 'selected':''}} value="9">9</option>
                                                    <option {{old('semester',$tgh->semester)=="10"? 'selected':''}} value="10">10</option>
                                                    <option {{old('semester',$tgh->semester)=="11"? 'selected':''}} value="11">11</option>
                                                    <option {{old('semester',$tgh->semester)=="12"? 'selected':''}} value="12">12</option>
                                                    <option {{old('semester',$tgh->semester)=="13"? 'selected':''}} value="13">13</option>
                                                    <option {{old('semester',$tgh->semester)=="14"? 'selected':''}} value="14">14</option>
                                                    <option {{old('semester',$tgh->semester)=="pendek"? 'selected':''}} value="pendek">Pendek</option>
                                                </select>
                                                {{Form::label('keterangan','Keterangan :')}}
                                                {{Form::text('keterangan',$tgh->keterangan,['class'=>'form-control form-group','placeholder'=>'','required'])}}
                                                {{Form::label('periode','Periode :')}}
                                                <select name="id_periode" class="form-control form-group">
                                                    @foreach($periode as $periode1)
                                                    @if ($tgh->id_periode == $periode1->id_periode)
                                                          <option value="{{ $periode1->id_periode }}" selected>{{ $periode1->periode }}</option>
                                                    @else
                                                          <option value="{{ $periode1->id_periode }}">{{ $periode1->periode }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                {{Form::label('status','Status :')}}
                                                <select name="status" class="form-control form-group">
                                                    <option {{old('status',$tgh->status)=="Lunas"? 'selected':''}} value="Lunas">Lunas</option>
                                                    <option {{old('status',$tgh->status)=="Belum Lunas"? 'selected':''}} value="Belum Lunas">Belum Lunas</option>
                                                </select>
                                                @foreach($user as $usr)
                                                {{Form::hidden('id_user', $usr->id_user) }}
                                                {{Form::hidden('id_prodi', $usr->id_prodi) }}
                                                @endforeach
                                  
                                            </div>
                                            {{Form::submit('Simpan',['class'=>'btn btn-success btn-block'])}}
                                        {!!Form::close()!!}
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                                <!--Modal Edit Tagihan Pembayaran-->
                            @endforeach
                            </tbody>
                        </table>
                    </div><!--card body-->
                </div><!--card-->


                <div class="card mt-4">
                    <div class="card-header">
                        <h3><b>Riwayat Pembayaran</b></h3>
                    </div><!--card-header-->
                    <div class="card-body">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-pembayaran" style="margin-bottom:20px;">
                            Tambah Pembayaran
                        </button>
                          
                          <!-- Modal Tambah pembayaran-->
                          <div class="modal fade" id="tambah-pembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h2>Form Tambah Pembayaran</h2>   
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    
                                    {!!Form::open(['action'=>'PembayaranController@store', 'method'=>'POST'])!!}
                                        <div class="form-group">
                                            {{Form::label('pilih_tagihan','Pilih Tagihan :')}}
                                            <select name="id_tagihan" class="form-control form-group">
                                                @foreach ($dataTagihanUntukDibayar as $dtud)
                                                    <option value="{{$dtud->id_tagihan}}">{{$dtud->nama_tagihan}}</option>
                                                @endforeach
                                            </select>
                                            {{Form::label('no_referensi','No Referensi :')}}
                                            {{Form::text('no_referensi','',['class'=>'form-control form-group','placeholder'=>'No. Referensi','required'])}}
                                            {{Form::label('nama-pembarayan','Nama Pembayaran :')}}
                                            {{Form::text('nama_pembayaran','',['class'=>'form-control form-group','placeholder'=>'Nama Pembayaran','required'])}}
                                            {{Form::label('jumlah-bayar','Jumlah Bayar :')}}
                                            {{Form::text('jumlah_bayar','',['class'=>'form-control form-group','placeholder'=>'Jumlah Bayar','required'])}}
                                            {{Form::label('semester','Semester :')}}
                                            <select name="semester" class="form-control form-group">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="pendek">Pendek</option>
                                            </select>
                                            {{Form::label('periode','Periode :')}}
                                            <select name="id_periode" class="form-control form-group">
                                            @foreach ($periode as $periode1)
                                            <option value="{{$periode1->id_periode}}">{{$periode1->periode}}</option>
                                            @endforeach
                                            </select>
                                            {{Form::label('tipe','Tipe :')}}
                                            <select name="tipe" class="form-control form-group">
                                                <option value="bayar">Bayar</option>
                                                <option value="potongan">Potongan</option>
                                            </select>
                                            {{Form::label('keterangan','Keterangan :')}}
                                            {{Form::text('keterangan','',['class'=>'form-control form-group','placeholder'=>'Keterangan'])}}
                                            @foreach($user as $usr)
                                                {{Form::hidden('id_user', $usr->id_user) }}
                                                {{Form::hidden('id_prodi', $usr->id_prodi) }}
                                            @endforeach
                                            {{Form::hidden('validated_by', Auth::user()->name) }}
                                        </div>
                                        {{Form::submit('Simpan',['class'=>'btn btn-success btn-block'])}}
                                    {!!Form::close()!!}
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--Modal tambah pembayaran-->
        
                
                        <table id="tabel" class="table table-sm table-hover table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th style="display:none">Nomor</th>
                                    <th>Id</th>
                                    <th>Id Tagihan</th>
                                    <th>Semester</th>
                                    <th>Tanggal Bayar</th>
                                    <th>No. Referensi</th>
                                    <th>Nama Pembayaran</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Keterangan</th>
                                    <th>Tipe</th>
                                    <th>Validated By</th>
                                    <th>Periode</th>
                                    <th>Aksi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pembayaran as $pmbyr)
                                    <tr>
                                    <td style="display:none;"></td>
                                    <td>{{$pmbyr->id_pembayaran}}</td>
                                    <td>{{$pmbyr->id_tagihan}}</td>
                                    <td class="text-center">{{$pmbyr->semester}}</td>
                                    <td>{{$pmbyr->created_at}}</td>
                                    <td>{{$pmbyr->no_referensi}}</td>
                                    <td>{{$pmbyr->nama_pembayaran}}</td>
                                    <td>Rp. {{ number_format($pmbyr->jumlah_bayar, 2, ',', '.') }}</td>
                                    <td>{{$pmbyr->keterangan}}</td>
                                    <td>{{$pmbyr->tipe}}</td>
                                    <td>{{$pmbyr->validated_by}}</td>
                                    <td>{{$pmbyr->periode}}</td>
                                        <td>
                                            <a class="btn btn-success btn-sm" style="color:#fff;" data-toggle="modal" data-target="#pembayaran-edit-modal{{$pmbyr->id_pembayaran}}">Edit</a>
                                        </td>
                                        <!--
                                        <td>
                                            {!!Form::open(['action'=>['PembayaranController@destroy', $pmbyr->id_pembayaran], 'method'=>'POST','id'=>'form-delete-pembayaran'.$pmbyr->id_pembayaran])!!}
                                                {{Form::hidden('_method', 'DELETE')}}                                              
                                                {{Form::submit('Hapus',['class'=>'btn btn-danger btn-sm'])}}
                                            {!!Form::close()!!}
                                            <script>
                                                    document.querySelector('#form-delete-pembayaran{{$pmbyr->id_pembayaran}}').addEventListener('click', function(e){
                                                    var form =this;
                                                    e.preventDefault();
                                                    swal({
                                                    title: 'Hapus data yang dipilih?',
                                                    text: "Klik Hapus untuk menghapus data !",
                                                    type: 'warning',
                                                    buttons:{
                                                        cancel:"Batal",
                                                        confirm:{
                                                            text:"Hapus",
                                                            value:"catch",
                                                        }
                                                    }
                                                    }).then((value) => {
                                                    switch(value){
                                                        case "catch":
                                                        form.submit();
                                                        break;
                                                
                                                        default:
                                                    
                                                            break;
                                                    }
                                                    })
                                                });
                                                
                                            </script>
                                        </td>-->
                                        <td>
                                            {!!Form::open(['action'=>'PDFController@printPembayaran', 'method'=>'GET'])!!}
                                            {{Form::hidden('id_pembayaran', $pmbyr->id_pembayaran) }}
                                            {{Form::hidden('id_user', $pmbyr->id_user) }}
                                            {{Form::submit('Print',['class'=>'btn btn-success btn-sm'])}}
                                            {!!Form::close()!!}
                                        </td>                       
                                    </tr>
                                    
                                <!-- Modal Edit Pembayaran-->
                                <div class="modal fade" id="pembayaran-edit-modal{{$pmbyr->id_pembayaran}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2>Form Edit Pembayaran</h2>   
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">                  
                                                {!!Form::open(['action'=>['PembayaranController@update', $pmbyr->id_pembayaran], 'method'=>'PUT'])!!}
                                                <div class="form-group">
                                                    {{Form::label('nama_tagihan','Id Tagihan :')}}
                                                    <select name="id_tagihan" class="form-control form-group">
                                                        @foreach($dataTagihanUntukDibayar as $dtud)
                                                            @if ($pmbyr->id_tagihan == $dtud->id_tagihan)
                                                                <option value="{{ $dtud->id_tagihan }}" selected>{{ $dtud->nama_tagihan }}</option>
                                                            @else
                                                                <option value="{{ $dtud->id_tagihan }}">{{ $dtud->nama_tagihan }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    {{Form::label('no_referensi','No Referensi :')}}
                                                    {{Form::text('no_referensi',$pmbyr->no_referensi,['class'=>'form-control form-group','placeholder'=>'No. Referensi','required'])}}
                                                    {{Form::label('nama-pembarayan','Nama Pembayaran :')}}
                                                    {{Form::text('nama_pembayaran',$pmbyr->nama_pembayaran,['class'=>'form-control form-group','placeholder'=>'Nama Pembayaran','required'])}}
                                                    {{Form::label('jumlah-bayar','Jumlah Bayar :')}}
                                                    {{Form::text('jumlah_bayar',$pmbyr->jumlah_bayar,['class'=>'form-control form-group','placeholder'=>'Jumlah Bayar','required'])}}
                                                    {{Form::label('Semester','Semester :')}}
                                                    <select name="semester" class="form-control form-group">
                                                        <option {{old('semester',$pmbyr->semester)=="1"? 'selected':''}} value="1">1</option>
                                                        <option {{old('semester',$pmbyr->semester)=="2"? 'selected':''}} value="2">2</option>
                                                        <option {{old('semester',$pmbyr->semester)=="3"? 'selected':''}} value="3">3</option>
                                                        <option {{old('semester',$pmbyr->semester)=="4"? 'selected':''}} value="4">4</option>
                                                        <option {{old('semester',$pmbyr->semester)=="5"? 'selected':''}} value="5">5</option>
                                                        <option {{old('semester',$pmbyr->semester)=="6"? 'selected':''}} value="6">6</option>
                                                        <option {{old('semester',$pmbyr->semester)=="7"? 'selected':''}} value="7">7</option>
                                                        <option {{old('semester',$pmbyr->semester)=="8"? 'selected':''}} value="8">8</option>
                                                        <option {{old('semester',$pmbyr->semester)=="9"? 'selected':''}} value="9">9</option>
                                                        <option {{old('semester',$pmbyr->semester)=="10"? 'selected':''}} value="10">10</option>
                                                        <option {{old('semester',$pmbyr->semester)=="11"? 'selected':''}} value="11">11</option>
                                                        <option {{old('semester',$pmbyr->semester)=="12"? 'selected':''}} value="12">12</option>
                                                        <option {{old('semester',$pmbyr->semester)=="13"? 'selected':''}} value="13">13</option>
                                                        <option {{old('semester',$pmbyr->semester)=="14"? 'selected':''}} value="14">14</option>
                                                        <option {{old('semester',$pmbyr->semester)=="pendek"? 'selected':''}} value="pendek">Pendek</option>
                                                    </select>
                                                    {{Form::label('periode','Periode :')}}
                                                    <select name="id_periode" class="form-control form-group">
                                                        @foreach($periode as $periode1)
                                                        @if ($pmbyr->id_periode == $periode1->id_periode)
                                                              <option value="{{ $periode1->id_periode }}" selected>{{ $periode1->periode }}</option>
                                                        @else
                                                              <option value="{{ $periode1->id_periode }}">{{ $periode1->periode }}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                    {{Form::label('tipe','Tipe :')}}
                                                    <select name="tipe" class="form-control form-group">
                                                        <option {{old('tipe',$pmbyr->tipe)=="bayar"? 'selected':''}}  value="bayar">Bayar</option>
                                                        <option {{old('tipe',$pmbyr->tipe)=="potongan"? 'selected':''}} value="potongan">Potongan</option>
                                                    </select>
                                                    {{Form::label('keterangan','Keterangan :')}}
                                                    {{Form::text('keterangan',$pmbyr->keterangan,['class'=>'form-control form-group','placeholder'=>'Keterangan'])}}
                                                    @foreach($user as $usr)
                                                        {{Form::hidden('id_user', $usr->id_user) }}
                                                        {{Form::hidden('id_prodi', $usr->id_prodi) }}
                                                    @endforeach
                                                    {{Form::hidden('validated_by', Auth::user()->name) }}
                                                    {{Form::hidden('_method','PUT')}}
                                                </div>
                                                {{Form::submit('Simpan',['class'=>'btn btn-success btn-block'])}}
                                            {!!Form::close()!!}
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                        </div>
                                </div>
                                    <!--Modal Edit Pembayaran-->
                                @endforeach
                            </tbody>
                        </table>
                    </div><!--card body-->
                </div><!--card-->

            </div><!--end col-12-->
        </div><!--row-->
    </div><!--container-->

    <script type="text/javascript">
        $(document).ready(function() {
            var t = $('#tabel').DataTable( {
                "columnDefs": [ {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                } ],
                "order": [[ 1, 'asc' ]],
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json"
            }
            } );
        
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();        
        } );

        $(document).ready(function() {
            var t = $('#tabel-tagihan').DataTable( {
                "columnDefs": [ {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                } ],
                "order": [[ 1, 'asc' ]],
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json"
            }
            } );
        
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();        
        } );

        $(document).ready(function() {
            var t = $('#tabel-status').DataTable( {
                "columnDefs": [ {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                } ],
                "order": [[ 1, 'asc' ]],
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json"
            }
            } );
        
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();        
        } );
    </script>
@endsection