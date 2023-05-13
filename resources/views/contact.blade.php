@extends('main', ['canonical' => route('contact')])

@section('body')
<div class="body-content">
    
    @include('component.sidebar')
    
    <div class="container content p-4">
        <div class="row">
            <div class="col-lg-5 mb-5">
                <div class="contact sub-content mb-4">
                    <h3 class="mb-3">Surabaya</h3>
                    <table>
                        <tbody>
                            <tr>
                                <th scope="row"><i class="bi bi-telephone me-3"></i></th>
                                <td>0813 5772 4558 | 0812 2547 4891</td>
                            </tr>
                            <tr>
                                <th scope="row"><i class="bi bi-envelope me-3"></i></th>
                                <td>surabaya@idhamperkasa.com</td>
                            </tr>
                            <tr>
                                <th scope="row"><i class="bi bi-geo-alt me-3"></i></th>
                                <td>Jl. Simolawang Blok 1 No.23, Simokerto, Kec. Simokerto Kota Surabaya, Jawa Timur 60144</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="map">
                    <div class="mapouter">
                        <div class="gmap-canvas">
                            <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Jl.%20Simolawang%20I%20No.23,%20Simokerto,%20Kec.%20Simokerto%20Kota%20SBY,%20Jawa%20Timur%2060143&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            <a href="https://123movies-to.org"></a>
                            <br>
                            <a href="https://www.embedgooglemap.net">google maps insert</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="contact sub-content mb-4">
                    <h3 class="mb-3">Balikpapan</h3>
                    <table>
                        <tbody>
                            <tr>
                                <th scope="row"><i class="bi bi-telephone me-3"></i></th>
                                <td>0856 5116 9252 | 0857 0544 7869</td>
                            </tr>
                            <tr>
                                <th scope="row"><i class="bi bi-envelope me-3"></i></th>
                                <td>balikpapan@idhamperkasa.com</td>
                            </tr>
                            <tr>
                                <th scope="row"><i class="bi bi-geo-alt me-3"></i></th>
                                <td>Jl. AMD Gn. Empat RT. 14 No. 14 Kel. Margomulyo, Kec. Balikpapan Barat, Kota Balikpapan, Kalimantan Timur</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="map">
                    <div class="mapouter">
                        <div class="gmap-canvas">
                            <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Jl.%20AMD%20Gn.%20Empat%20RT.%2014%20No.%2014%20Kel.%20Margomulyo,%20Kec.%20Balikpapan%20Barat,%20Kota%20Balikpapan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            <a href="https://123movies-to.org"></a>
                            <br>
                            <a href="https://www.embedgooglemap.net">google maps insert</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()