@extends('main')

@section('body')
<div class="body-content">
    
    @include('component.sidebar')
    
    <div class="container content p-4">
        <div class="contact sub-content mb-4">
            <h2 class="mb-3">Contact</h2>
            <table>
                <tbody>
                    <tr>
                        <th scope="row"><i class="bi bi-telephone me-3"></i></th>
                        <td>0813 5772 4558 | 0812 2547 4891</td>
                    </tr>
                    <tr>
                        <th scope="row"><i class="bi bi-envelope me-3"></i></th>
                        <td>yourmail@email.com</td>
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
</div>
@endsection()