@extends('layouts.app')

@section('content')
    <div style="margin-top:20px;" class="container-fluid">
        <div class="row">
            <div style="margin-top:20px;" class="col-lg-3">
                <h5>Identitas Mahasiswa</h5>
                <hr>
                @foreach ($user as $usr)
                <div style="padding:10px 10px 10px 10px;" class="card">
                <p>Nama : {{$usr->name}}</p>
                <p>NIM : {{$usr->nim}}</p>
                <p>Kelas : {{$usr->kelas}}</p>
                </div>
                @php
                $databiaya=DB::select(DB::raw("SELECT * FROM biaya_prodi WHERE id_prodi='$usr->id_prodi' AND kelas='$usr->kelas'"));
                $prodi=DB::select(DB::raw("SELECT prodi FROM prodi WHERE id_prodi='$usr->id_prodi'"));
                @endphp
                @foreach($prodi as $prdi)
                    <h5 style="margin-top:20px;">Beban Biaya Prodi {{$prdi->prodi}}</h5>
                    <hr>
                @endforeach
                <table style="margin-top:20px;" class="table table-bordered">
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
                <div class="card" style="padding: 10px 10px 10px 10px;">
                    <h4>Total Pembayaran : </h4>
                    
                    <hr>
                    @foreach ($s1 as $totals1)
                        <p>Semester 1 : Rp. {{ number_format($totals1->total, 2, ',', '.') }}
                        <br>
                        @foreach ($sts1 as $ss1) || Status : {{$ss1->status}} @endforeach</p>
                    @endforeach

                    @foreach ($s2 as $totals2)
                        <p>Semester 2 : Rp. {{ number_format($totals2->total, 2, ',', '.') }}
                        <br>
                        @foreach ($sts2 as $ss2) || Status : {{$ss2->status}} @endforeach</p>
                    @endforeach

                    @foreach ($s3 as $totals3)
                        <p>Semester 3 : Rp. {{ number_format($totals3->total, 2, ',', '.') }}
                        <br>
                        @foreach ($sts3 as $ss3) || Status : {{$ss3->status}} @endforeach</p>
                    @endforeach

                    @foreach ($s4 as $totals4)
                        <p>Semester 4 : Rp. {{ number_format($totals4->total, 2, ',', '.') }}
                        <br>
                        @foreach ($sts4 as $ss4) || Status : {{$ss4->status}} @endforeach</p>
                    @endforeach

                    @foreach ($s5 as $totals5)
                        <p>Semester 5 : Rp. {{ number_format($totals5->total, 2, ',', '.') }}
                        <br>
                        @foreach ($sts5 as $ss5) || Status : {{$ss5->status}} @endforeach</p>
                    @endforeach 

                    @foreach ($s6 as $totals6)
                        <p>Semester 6 : Rp. {{ number_format($totals6->total, 2, ',', '.') }}
                        <br>
                        @foreach ($sts6 as $ss6) || Status : {{$ss6->status}} @endforeach</p>
                    @endforeach 

                    @foreach ($s7 as $totals7)
                        <p>Semester 7 : Rp. {{ number_format($totals7->total, 2, ',', '.') }}
                        <br>
                        @foreach ($sts7 as $ss7) || Status : {{$ss7->status}} @endforeach</p>
                    @endforeach

                    @foreach ($s8 as $totals8)
                        <p>Semester 8 : Rp. {{ number_format($totals8->total, 2, ',', '.') }}
                        <br>
                        @foreach ($sts8 as $ss8) || Status : {{$ss8->status}} @endforeach</p>
                    @endforeach

                    @foreach ($s9 as $totals9)
                        <p>Semester 9 : Rp. {{ number_format($totals9->total, 2, ',', '.') }}
                        <br>
                        @foreach ($sts9 as $ss9) || Status : {{$ss9->status}} @endforeach</p>
                    @endforeach

                    @foreach ($s10 as $totals10)
                        <p>Semester 10 : Rp. {{ number_format($totals10->total, 2, ',', '.') }}
                        <br>
                        @foreach ($sts10 as $ss10) || Status : {{$ss10->status}} @endforeach</p>
                    @endforeach

                    @foreach ($s11 as $totals11)
                        <p>Semester 11 : Rp. {{ number_format($totals11->total, 2, ',', '.') }}
                        <br>
                        @foreach ($sts11 as $ss11) || Status : {{$ss11->status}} @endforeach</p>
                    @endforeach

                    @foreach ($s12 as $totals12)
                        <p>Semester 12 : Rp. {{ number_format($totals12->total, 2, ',', '.') }}
                        <br>
                        @foreach ($sts12 as $ss12) || Status : {{$ss12->status}} @endforeach</p>
                    @endforeach

                    @foreach ($s13 as $totals13)
                        <p>Semester 13 : Rp. {{ number_format($totals13->total, 2, ',', '.') }}
                        <br>
                        @foreach ($sts13 as $ss13) || Status : {{$ss13->status}} @endforeach</p>
                    @endforeach
                    
                    @foreach ($s14 as $totals14)
                        <p>Semester 14 : Rp. {{ number_format($totals14->total, 2, ',', '.') }}
                        <br>
                        @foreach ($sts14 as $ss14) || Status : {{$ss14->status}} @endforeach</p>
                    @endforeach
                              
                </div>
            </div><!--col-->

            <div class="col-lg-9">
                <h5 style="margin-top: 20px;">Riwayat Pembayaran</h5>
                <hr>
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
                            <th>Tanggal Bayar</th>
                            <th>No. Referensi</th>
                            <th>Nama Pembayaran</th>
                            <th>Jumlah Bayar</th>
                            <th>Semester</th>
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
                            <td>{{$pmbyr->created_at}}</td>
                            <td>{{$pmbyr->no_referensi}}</td>
                            <td>{{$pmbyr->nama_pembayaran}}</td>
                            <td>Rp. {{ number_format($pmbyr->jumlah_bayar, 2, ',', '.') }}</td>
                            <td>{{$pmbyr->semester}}</td>
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
                                            {{Form::label('no_referensi','No Referensi :')}}
                                            {{Form::text('no_referensi',$pmbyr->no_referensi,['class'=>'form-control form-group','placeholder'=>'No. Referensi','required'])}}
                                            {{Form::label('nama-pembarayan','Nama Pembayaran :')}}
                                            {{Form::text('nama_pembayaran',$pmbyr->nama_pembayaran,['class'=>'form-control form-group','placeholder'=>'Nama Pembayaran','required'])}}
                                            {{Form::label('jumlah-bayar','Jumlah Bayar :')}}
                                            {{Form::text('jumlah_bayar',$pmbyr->jumlah_bayar,['class'=>'form-control form-group','placeholder'=>'Jumlah Bayar','required'])}}
                                            {{Form::label('Semester','Semester :')}}
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

                <!-- Modal Tambah Status Pembayaran-->
                <div class="modal fade" id="tambah-status-pembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h2>Form Tambah Status Pembayaran</h2>   
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            
                            {!!Form::open(['action'=>'PembayaranController@statusPembayaran', 'method'=>'POST'])!!}
                                <div class="form-group">
                                    {{Form::label('Status','Status Pembayaran :')}}
                                    <select name="status" class="form-group form-control">
                                        <option value="Lunas">Lunas</option>
                                        <option value="Belum_Lunas">Belum Lunas</option>
                                    </select>
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
                                    {{Form::hidden('validated_by', Auth::user()->name) }}
                                    {{Form::hidden('id_user', $usr->id_user) }}
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
                <!--Modal tambah status pembayaran-->
                
                <h3 style="margin-top: 20px;">Tagihan Pembayaran</h3>
                <hr>
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
                                        {{Form::text('keterangan',$tgh->keterangan,['class'=>'form-control form-group','placeholder'=>'','required'])}}
                                        {{Form::label('periode','Periode :')}}
                                        <select name="id_periode" class="form-control form-group">
                                        @foreach ($periode as $periode1)
                                        <option value="{{$periode1->id_periode}}">{{$periode1->periode}}</option>
                                        @endforeach
                                        </select>
                                        {{Form::label('status','Status :')}}
                                        <select name="status" class="form-control form-group">
                                            <option value="Lunas">Lunas</option>
                                            <option value="Belum Lunas">Belum Lunas</option>
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

                <div style="margin-top:20px;">
                    <h3>Status Pembayaran</h3>
                    <hr>
                    <!--
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-status-pembayaran" style="margin-bottom:20px;">
                        Status Pembayaran
                    </button>-->
                    <table id="tabel-status" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th style="display:none;">Nomor</th>
                                <th>Id</th>
                                <th>Status</th>
                                <th>Semester</th>
                                <th>Validated By</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($status_pembayaran as $sts)
                                <tr>
                                <td style="display:none;"></td>
                                <td>{{$sts->id_status_pembayaran}}</td>
                                <td>{{$sts->status}}</td>
                                <td>{{$sts->semester}}</td>
                                <td>{{$sts->validated_by}}</td>
                                    <td>
                                        <a class="btn btn-success" style="color:#fff;" data-toggle="modal" data-target="#status-pembayaran-edit-modal{{$sts->id_status_pembayaran}}">Edit</a>
                                    </td>  
                                </tr>
                                
                            <!-- Modal Edit Status Pembayaran-->
                            <div class="modal fade" id="status-pembayaran-edit-modal{{$sts->id_status_pembayaran}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2>Form Edit Status Pembayaran</h2>   
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">                  
                                        {!!Form::open(['action'=>['PembayaranController@StatusPembayaranUpdate'], 'method'=>'POST'])!!}
                                            <div class="form-group">
                                                {{Form::label('status','Id :')}}
                                                <input type="text" class="form-group form-control" placeholder="{{$sts->id_status_pembayaran}}" readonly>
                                                {{Form::label('Status','Status Pembayaran :')}}
                                                <select name="status" class="form-group form-control">
                                                    <option value="Lunas">Lunas</option>
                                                    <option value="Belum_Lunas">Belum Lunas</option>
                                                </select>
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
                                                    <option value="pendek">Pendek</option>
                                                </select>
                                                {{Form::hidden('validated_by', Auth::user()->name) }}
                                                {{Form::hidden('id_status_pembayaran', $sts->id_status_pembayaran) }}
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
                                <!--Modal Edit status pembayaran-->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--end col-->
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