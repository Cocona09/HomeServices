<!doctype html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServiceNest - Бидний тухай</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
@include('layouts.frontend.header')

<div class="about-page">
    <!-- Hero Section -->
    <section class="about-hero">
        <div class="about-hero-content">
            <h1>ServiceNest-ийн тухай</h1>
            <p>ServiceNest бол орчин үеийн гэрийн үйлчилгээний платформ бөгөөд өдөр тутмын үйлчилгээг энгийн, найдвартай хийх зорилготой. Бид үйлчлүүлэгчдийг чадварлаг баталгаажсан мэргэжилтнүүдтэй холбодог.</p>
        </div>
    </section>

    <section class="about-mission">
        <div class="mission-content">
            <div class="mission-card">
                <div class="mission-icon">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h2 class="us-section-title">Бидний зорилго</h2>
                <p class="about-text-p">Ухаалаг технологи, найдвартай мэргэжилтэн, энгийн хэрэглэгчийн туршлагыг нэгтгэн гэрийн үйлчилгээг олох, удирдах аргыг хялбарчлах.</p>
            </div>
        </div>
    </section>

    <!-- What We Do Section -->
    <section class="about-what-we-do">
        <div class="section-content">
            <h2 class="about-section-title">Бидний үйлчилгээ</h2>
            <div class="what-we-do-content">
                <p>ServiceNest нь гэрийн эзэд, түрээслэгчдэд цэвэрлэгээ, засвар, засвар үйлчилгээ гэх мэт үйлчилгээг хурдан захиалахад тусалдаг. Үйлчилгээ сонгохоос эхлээд эцсийн баталгаажалт хүртэлх алхам бүр нь хурдан, тодорхой, аюулгүй байхаар зохион бүтээгдсэн.</p>

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

    <!-- CTA Section -->
    <section class="about-cta">
        <div class="cta-content">
            <h2>Бидэнтэй нэгдээрэй</h2>
            <p>ServiceNest дээр өнөөдрөөс эхлэн гэрийн үйлчилгээгээ хялбар, найдвартай болгоорой</p>
            <div class="cta-buttons">
                <a href="{{ route('service.contentService') }}" class="cta-button primary">
                    <i class="fas fa-search me-2"></i> Үйлчилгээ хайх
                </a>
                <a href="{{ route('servicePro.apply') }}" class="cta-button secondary">
                    <i class="fas fa-user-plus me-2"></i> Мэргэжилтэн болох
                </a>
            </div>
        </div>
    </section>
</div>

@include('layouts.frontend.footer')
</body>
</html>
