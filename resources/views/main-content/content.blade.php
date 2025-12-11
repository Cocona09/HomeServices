@extends('front.Index')

@section('content')

    <div class="parent-container">
        <main>
            <div class="content-container">
                <div class="content-image">
                        <h2 class="h2text">Secure Dependable</h2>
                        <h2 class="h2text2"> Assistance for </h2>
                        <h2 class="h2text3">Household Jobs</h2>
                    <img src="{{ asset('uploads/images/var.png') }}">
                    <div class="search-container">
                        <input type="text" class="search-input" placeholder="Танд ямар үйлчилгээ хэрэгтэй вэ?"
                               onfocus="showOptions()" onblur="hideOptions()" id="search"/>
                        <div class="dropdown-options" id="dropdownOptions">
                            @if(!empty($services))
                                @foreach($services->take(4) as $service) <!-- Limit to first 4 services -->
                                <div class="dropdown-item" onclick="redirectToBooking('{{ $service->id }}')">
                                    {{ $service->name }}
                                </div>
                                @endforeach
                            @endif
                        </div>
                        <button class="search-button">
                            <img src="{{ asset('uploads/images/searchIcon.png') }}">
                        </button>
                    </div>
                </div>
            </div>

            <h3 class="titleS">Одоогийн үйлчилгээ</h3>
            <div class="main-container">
                @if(!empty($services))
                    @foreach($services as $service)
                        <a href="{{ route('service.booking',['id'=>$service->id]) }}" class="serviceLink">
                            <button class="btnIcons">
                                <img src="{{ asset("$service->image") }}">
                            </button>
                        </a>
                        <span class="spanName">{{$service->name}}</span>
                    @endforeach
                @endif

            </div>
        </main>
    </div>
@endsection
