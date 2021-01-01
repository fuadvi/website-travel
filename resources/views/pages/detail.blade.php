@extends('layouts.app')

@section('title','Detail Travel')

@section('content')
    <main>
        <section class="section-details-headers"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Paket travel
                                </li>
                                <li class="breadcrumb-item active">
                                    Details
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <h1>{{$item->title}}</h1>
                            <p>
                                {{$item->location}}
                            </p>
                            
                            @if ($item->galleries->count())
                                <div class="gallery">
                                <div class="xzoom-container">
                                <img src="{{ Storage::url($item->galleries->first()->image) }}" class="xzoom" id="xzoom-default"
                                    xoriginal="{{ Storage::url($item->galleries->first()->image) }}">
                                </div>
                                <div class="xzoom-thumbs">
                                    @foreach ($item->galleries as $galleri)
                                        <a href="{{ Storage::url($galleri->image) }}">
                                        <img src="{{ Storage::url($galleri->image) }}" class="xzoom-gallery" width="128px"
                                                xpreview="{{ Storage::url($galleri->image) }}">
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            
                            <h2>Tentang Wisata</h2>
                            <p>
                                {!! $item->about !!}
                            </p>
                            <div class="features row">
                                <div class="col-md-4">
                                    <div class="description">
                                    <img src="{{ url('frontend/images/ic_event.png') }}" alt="" class="features-image">
                                        <div class="description">
                                            <h3>Fetured Event</h3>
                                            <p>{{$item->featured_event}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <div class="description">
                                    <img src="{{ url('frontend/images/ic_bahasa.png') }}" alt="" class="features-image">
                                        <div class="description">
                                            <h3>Language</h3>
                                            <p>{{$item->language}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <div class="description">
                                    <img src="{{ url('frontend/images/ic_food.png') }}" alt="" class="features-image">
                                        <div class="description">
                                            <h3>Foods</h3>
                                            <p>{{$item->foods}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Members are going</h2>
                            <div class="members my-2">
                                <img src="{{ url('frontend/images/pic.png') }}" class="member-image mr-1">
                                <img src="{{ url('frontend/images/saina.png') }}" class="member-image mr-1">
                                <img src="{{ url('frontend/images/yui.png') }}" class="member-image mr-1">
                                <img src="{{ url('frontend/images/member-4.png') }}" class="member-image mr-1">
                                <img src="{{ url('frontend/images/member-5.png') }}" class="member-image mr-1">
                            </div>
                            <hr>
                            <h2>Trip Informations</h2>
                            <table class="trip-information">
                                <tr>
                                    <th widht="50%">Date of Departure</th>
                                    <td widht="50%" class="text-right">{{ \Carbon\Carbon::create($item->date_pf_departure)->format('n F, Y')}}</td>
                                </tr>
                                <tr>
                                    <th widht="50%">Duration</th>
                                    <td widht="50%" class="text-right">{{$item->duration}}</td>
                                </tr>
                                <tr>
                                    <th widht="50%">Type</th>
                                    <td widht="50%" class="text-right">{{$item->type}}</td>
                                </tr>
                                <tr>
                                    <th widht="50%">Price</th>
                                    <td widht="50%" class="text-right">${{$item->price}},00 / person</td>
                                </tr>
                            </table>
                        </div>
                        <div class="join-container">
                            @auth
                                <form action="{{ route('checkout_process', $item->id)}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-block btn-join-now mt-3 py-2">
                                        Join Now
                                    </button>
                                </form>
                            @endauth
                            @guest
                            <a href="{{ route('login') }}" class="btn btn-block btn-join-now mt-3 py-2">Login Or Register to Checkout Now</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}">
@endpush

@push('addon-script')
    
    <script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                title: false,
                tint: '#333',
                Xoffset: 15
            });
        });

    </script>
@endpush