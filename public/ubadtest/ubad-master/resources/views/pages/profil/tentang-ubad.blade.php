@extends('layouts.app')

@section('content')

<section id="tentang-ubad">
    <div class="container">
        <h1>UNIVERSITAS BALI DWIPA</h1>
        <p class="text-justify">
            Bali Dwipa University menerapkan sistem dan kurikulum yang
            diintegrasikan dengan sistem pembelajaran online ataupun Blended
            Learning, dengan mengintegrasikan literasi baru untuk merespon
            Revolusi Industri 4.0. Lulusan Bali Dwipa University disiapkan
            memiliki kompetensi dan kemampuan kerja dan sikap kerja
            (employability) dengan pemberian sertifikasi, peningkatan prestasi
            kemahasiswaan, dan pemberian pengalaman profeional pada dunia industri
            baik jasa maupun barang, dengan kemitraan dengan industri dalam
            perumusan kurikulum, pelaksanaan teaching industry, program multi
            entry multi exit (MEME) dan magang industri dan penjaminan mutu. Bali
            Dwipa University berupaya membentuk sikap mahasiswa dan lulusan yang
            toleran, empatik, menghargai ragam budaya, dan cinta tanah air, yang
            diintegrasikan dengan pendidikan anti korupsi dan bela negara dalam
            kurikuler, kokurikuler, atau ekstra kurikuler. Bali Dwipa University
            berupaya membentuk mahasiswa dan lulusan yang inovatif, kreatif dan
            ekselen. Itulah yang menjadi motto Bali Dwipa University yakni :
            Inovatif, Kreatif dan ekselen, sehingga Bali Dwipa University
            mendeklarasikan sebagai Kampus Inovatif (Innovative Campus). INOVATIF
            (Innovative) adalah suatu kemampuan dalam mendayagunakan pikiran dan
            sumber daya yang ada disekeliling kita untuk menghasilkan suatu karya
            yang benar-benar baru, orisinil, dan bermanfaat bagi banyak orang.
            Inovatif adalah kemampuan seseorang dalam mendayagunakan kemampuan dan
            keahlian untuk menghasilkan karya baru. KREATIF (Creative) adalah
            suatu kemampuan berpikir ataupun melakukan tindakan yang bertujuan
            untuk mencari pemecahan suatu kondisi ataupun permasalahan secara
            cerdas, berbeda (out of the box), tidak umum, orisinil, serta membawa
            hasil yang tepat dan bermanfaat. EKSELEN atau KEUNGGULAN (Excellent)
            adalah kemampuan yang diperoleh melalui karakteristik dan sumber daya
            suatu institusi untuk memiliki kinerja yang lebih tinggi dibandingkan
            institusi lain pada industri atau pasar yang sama. Keunngulan adalah
            kemampuan untuk memiliki kualitas bagus dalam tingkat tinggi
            (possessing good qualities in high degree).
        </p>
    </div>
</section>

<section id="profil-universitas">
    <div class="container">
        <h1>Profil Universitas</h1>
        <hr />
        <div class="row">
            <!--Profile Card Ketua-->
            <div class="col-md-6 mt-6">
                <div class="card profile-card-5">
                    <div class="card-img-block">
                        <img class="card-img-top" src="/resources/logo/profil-pak-wayan.jpg" alt="Card image cap" />
                    </div>
                    <div class="card-body pt-0">
                        <h5 class="card-title text-center">
                            Dr. Ir I Wayan Adnyana S.H, M.Kn
                        </h5>
                        <p class="card-text text-center" style="font-weight: bold;">
                            Ketua Yayasan
                        </p>
                    </div>
                </div>
            </div>

            <!--Profile Card Rektor-->
            <div class="col-md-6 mt-6">
                <div class="card profile-card-5">
                    <div class="card-img-block">
                        <img class="card-img-top" src="/resources/logo/profil-bu-rektor.jpg" alt="Card image cap" />
                    </div>
                    <div class="card-body pt-0">
                        <h5 class="card-title text-center">
                            Dr. Ir Ketut Suriasih, M.App.Sc.
                        </h5>
                        <p class="card-text text-center" style="font-weight: bold;">
                            Rektor
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</section>

<section id="deskripsi-universitas">
    <div class="container">
        <div class="card-deck">
            <div class="card">
                <img src="/resources/logo/ijin.png" class="card-img-top" alt="..." />
                <div class="card-body">
                    <h5 class="card-title">Ijin Pendirian</h5>
                    <p class="card-text">
                        SK MENRISTEKDIKTI NO. : 578/KPT/I/2018<br />Tanggal : 17-07-2018
                    </p>
                </div>
            </div>
            <div class="card">
                <img src="/resources/logo/tahun-berdiri.png" class="card-img-top" alt="..." />
                <div class="card-body">
                    <h5 class="card-title">
                        Tahun Berdiri
                    </h5>
                    <p class="card-text">2018</p>
                </div>
            </div>
            <div class="card">
                <img src="/resources/logo/yayasan.png" class="card-img-top" alt="..." />
                <div class="card-body">
                    <h5 class="card-title">Yayasan</h5>
                    <p class="card-text">Yayasan Pendidikan Usadha Teknik Bali</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection