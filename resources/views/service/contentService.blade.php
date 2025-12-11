@extends('service.services')

@section('contentService')
    <div class="header-container">
        <header class="head">
            <h1 class="titleA">Ажилдаа шилдэг мэргэжилтнүүдийг хөлсөл!</h1>
        </header>
        <div class="container-search2">
            <input type="text" class="search-input3" placeholder="Танд ямар үйлчилгээ хэрэгтэй вэ?"
                   onfocus="showOptions()" onblur="hideOptions()" id="search"/>
            <div class="dropdown-options2" id="dropdownOptions">
                @if(!empty($services))
                    @foreach($services->take(4) as $service) <!-- Limit to first 4 services -->
                    <div class="dropdown-item1" onclick="redirectToBooking('{{ $service->id }}')">
                        {{ $service->name }}
                    </div>
                    @endforeach
                @endif
            </div>
            <button class="search-button3">
                <img src="{{asset('uploads/images/searchIcon.png')}}">
            </button>
        </div>
    </div>
    <div class="lineS"></div>
    <main>
        <h3 class="titleS">Одоогийн үйлчилгээ</h3>
        <div class="main-container">
            @foreach($services as $service)
                <a href="{{ route('service.booking',['id'=>$service->id]) }}" class="serviceLink">
                        <button class="btnIcons">
                            <img src="{{ asset("$service->image") }}">
                        </button>
                </a>
                <span class="span1">{{$service->name}}</span>
            @endforeach
        </div>
    </main>
@endsection
