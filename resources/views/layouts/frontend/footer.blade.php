<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer - ServiceNest</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
<footer class="footer mt-auto">
    <div class="container">
        <div class="row g-4">
            <!-- Brand Section -->
            <div class="col-lg-4 col-md-6">
                <div class="footer-brand">
                    <h2 class="brand-title mb-4">ServiceNest</h2>
                    <div class="footer-description">
                        <p>Таныг итгэмжлэгдсэн хүмүүстэй холбодог</p>
                        <p>Гэрийн үйлчилгээний бүхий л хэрэгцээнд</p>
                        <p>Мэргэжлийн хүмүүсээр хангаж өгөх болно.</p>
                        <p>Захиалга хийхэд хялбар, найдвартай мэргэжилтнүүдтэй.</p>
                        <p>Бид гэрийн арчилгааг энгийн бөгөөд төгс болгодог.</p>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-section">
                    <h3 class="section-title mb-4">Оффис</h3>
                    <div class="contact-info">
                        <p><i class="fas fa-map-marker-alt me-2"></i> ITPL зам</p>
                        <p>Уайтфилд, Улаанбаатар</p>
                        <p>Карнатака, PIN 560556, Монгол</p>
                        <p class="email mt-3"><i class="fas fa-envelope me-2"></i> ServiceNest@outlook.com</p>
                        <p class="phone"><i class="fas fa-phone me-2"></i> +976 - 7777 - 5557</p>
                    </div>
                </div>
            </div>

            <!-- Links Section -->
            <div class="col-lg-2 col-md-6">
                <div class="footer-section">
                    <h3 class="section-title mb-4">Холбоос</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('service.contentService') }}">Үйлчилгээ</a></li>
                        <li><a href="">Бидний тухай</a></li>
                        <li><a href="">Онцлог</a></li>
                        <li><a href="">Мэдэгдэл</a></li>
                        <li><a href="">Харилцагч</a></li>
                    </ul>
                </div>
            </div>

            <!-- Newsletter & Social Section -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-section">
                    <h3 class="section-title mb-4">Мэдээлэл</h3>
                    <div class="newsletter">
                        <p class="mb-3">Шинэ мэдээлэл хүлээн авахыг хүсвэл бүртгүүлэх</p>
                        <form class="newsletter-form">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Имэйл хаягаа оруулна уу..." required>
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="social-links mt-4">
                        <p class="mb-3">Бидэнтэй холбогдох:</p>
                        <div class="social-icons">
                            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <div class="footer-divider my-5"></div>

        <!-- Copyright -->
        <div class="row">
            <div class="col-12">
                <div class="copyright text-center">
                    <p class="mb-0">&copy; 2024 ServiceNest. Бүх эрх хуулиар хамгаалагдсан.</p>
                    <p class="mb-0 mt-2">Монгол улс, Улаанбаатар хот</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Search dropdown functionality
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

    // Mobile menu close on click
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
        const navbarCollapse = document.querySelector('.navbar-collapse');

        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (navbarCollapse.classList.contains('show')) {
                    navbarCollapse.classList.remove('show');
                }
            });
        });
    });
</script>
@stack('scripts')
</body>
</html>
