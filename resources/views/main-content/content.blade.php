@extends('front.Index')

@section('content')
    <main>
        <!-- Hero Section -->
        <section class="content-container">
            <div class="container">
                <div class="hero-section">
                    <div class="hero-text">
                        <h2 class="main-title">Secure Dependable</h2>
                        <h2 class="sub-title">Assistance for</h2>
                        <h2 class="sub-title">Household Jobs</h2>

                        <div class="search-container">
                            <div class="search-wrapper">
                                <input type="text" class="search-input"
                                       placeholder="Танд ямар үйлчилгээ хэрэгтэй вэ?"
                                       onfocus="showOptions()" onblur="hideOptions()" id="search">
                                <button class="search-button">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                            <div class="dropdown-options" id="dropdownOptions">
                                @if(!empty($services))
                                    @foreach($services->take(4) as $service)
                                        <div class="dropdown-item" onclick="redirectToBooking('{{ $service->id }}')">
                                            {{ $service->name }}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Stats Section (replaces image) -->
                    <div class="hero-stats">
                        <div class="stats-grid">
                            <div class="stat-card">
                                <div class="stat-number">500+</div>
                                <div class="stat-label">Мэргэжилтэн</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-number">50+</div>
                                <div class="stat-label">Үйлчилгээ</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-number">10,000+</div>
                                <div class="stat-label">Сэтгэл хангалуун харилцагч</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-number">24/7</div>
                                <div class="stat-label">Тусламжийн үйлчилгээ</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="services-section">
            <div class="container">
                <h3 class="section-main-title">Одоогийн үйлчилгээ</h3>
                <div class="services-grid">
                    @if(!empty($services))
                        @foreach($services as $service)
                            <a href="{{ route('service.booking',['id'=>$service->id]) }}" class="service-item">
                                <div class="service-icon">
                                    <img src="{{ asset($service->image) }}" alt="{{ $service->name }}">
                                </div>
                                <span class="service-name">{{ $service->name }}</span>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>

        <div class="about-page">

            <!-- What We Do Section -->
            <section class="about-what-we-do">
                <div class="section-content">
                    <h2 class="about-section-title">Бидний үйлчилгээ</h2>
                    <div class="what-we-do-content">
                        <p class="about-text-p">ServiceNest нь гэрийн эзэд, түрээслэгчдэд цэвэрлэгээ, засвар, засвар үйлчилгээ гэх мэт үйлчилгээг хурдан захиалахад тусалдаг. Үйлчилгээ сонгохоос эхлээд эцсийн баталгаажалт хүртэлх алхам бүр нь хурдан, тодорхой, аюулгүй байхаар зохион бүтээгдсэн.</p>

                        <div class="service-highlights">
                            <div class="service-highlight">
                                <div class="highlight-icon">
                                    <i class="fas fa-home"></i>
                                </div>
                                <h3>Гэрийн үйлчилгээ</h3>
                                <p class="about-text-p">Цэвэрлэгээ, засвар, техникийн үйлчилгээ</p>
                            </div>

                            <div class="service-highlight">
                                <div class="highlight-icon">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <h3>Онлайн захиалга</h3>
                                <p class="about-text-p">Цөөн үйлдлээр хүссэн үйлчилгээгээ захиал</p>
                            </div>

                            <div class="service-highlight">
                                <div class="highlight-icon">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <h3>Найдвартай байдал</h3>
                                <p class="about-text-p">Баталгаажсан мэргэжилтнүүдийн чанартай ажил</p>
                            </div>

                            <div class="service-highlight">
                                <div class="highlight-icon">
                                    <i class="fas fa-headset"></i>
                                </div>
                                <h3>Тогтвортой дэмжлэг</h3>
                                <p class="about-text-p">Үйлчилгээний өмнө, үеэр, дараа тусламж, дэмжлэг үзүүлнэ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="about-mission">
                <div class="mission-content">
                    <div class="mission-card">
                        <div class="mission-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h2>Бидний зорилго</h2>
                        <p class="about-text-p">Ухаалаг технологи, найдвартай мэргэжилтэн, энгийн хэрэглэгчийн туршлагыг нэгтгэн гэрийн үйлчилгээг олох, удирдах аргыг хялбарчлах.</p>
                    </div>
                </div>
            </section>
        </div>

    </main>

    <!-- JavaScript for search dropdown -->
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
