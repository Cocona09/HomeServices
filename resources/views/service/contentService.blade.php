@extends('service.services')

@section('contentService')
    <div class="services-page">
        <div class="container">
            <!-- Services Page Header -->
            <div class="services-page-header">
                <h1>Ажилдаа шилдэг мэргэжилтнүүдийг хөлсөл!</h1>

                <!-- Services Search -->
                <div class="services-page-search">
                    <div class="services-search-wrapper">
                        <input type="text" class="services-search-input"
                               placeholder="Танд ямар үйлчилгээ хэрэгтэй вэ?"
                               onfocus="showOptions()" onblur="hideOptions()" id="search"/>
                        <button class="services-search-button">
                            <img src="{{asset('uploads/images/searchIcon.png')}}" alt="Search">
                        </button>
                    </div>
                    <div class="services-dropdown-options" id="dropdownOptions">
                        @if(!empty($services))
                            @foreach($services->take(4) as $service)
                                <div class="dropdown-item1" onclick="redirectToBooking('{{ $service->id }}')">
                                    {{ $service->name }}
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <!-- Services Grid -->
            <h3 class="services-page-title">Одоогийн үйлчилгээ</h3>
            <div class="services-page-grid">
                @foreach($services as $service)
                    <a href="{{ route('service.booking',['id'=>$service->id]) }}" class="service-page-item">
                        <div class="service-page-icon">
                            <img src="{{ asset($service->image) }}" alt="{{ $service->name }}">
                        </div>
                        <span class="service-page-name">{{ $service->name }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function showOptions() {
            document.getElementById('dropdownOptions').style.display = 'block';
        }

        function hideOptions() {
            setTimeout(() => {
                document.getElementById('dropdownOptions').style.display = 'none';
            }, 200);
        }

        function redirectToBooking(serviceId) {
            window.location.href = `/service/booking/${serviceId}`;
        }
    </script>
@endsection
