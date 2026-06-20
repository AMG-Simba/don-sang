<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titre', 'الوكالة المغربية للدم ومشتقاته')</title>
    <meta name="description" content="@yield('description', 'الوكالة المغربية للدم ومشتقاته - منصة التبرع بالدم في المغرب')">
    <meta property="og:title" content="@yield('titre', 'الوكالة المغربية للدم ومشتقاته')">
    <meta property="og:description" content="@yield('description', 'منصة التبرع بالدم في المغرب')">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Cairo', sans-serif; }
        :root {
            --rouge: #C8102E;
            --vert: #2E7D32;
            --rouge-clair: #fef2f2;
        }
        body { background: #f9f9f9; }
        .navbar-amsd { background: #fff; border-bottom: 3px solid var(--rouge); box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
        .navbar-brand img { height: 55px; }
        .nav-link { color: #333 !important; font-weight: 600; font-size: 0.95rem; transition: color 0.2s; }
        .nav-link:hover { color: var(--rouge) !important; }
        .btn-rouge { background: var(--rouge); color: #fff; border: none; border-radius: 25px; padding: 8px 22px; font-weight: 700; }
        .btn-rouge:hover { background: #a50d24; color: #fff; }
        .btn-vert { background: var(--vert); color: #fff; border: none; border-radius: 25px; padding: 8px 22px; font-weight: 700; }
        .btn-vert:hover { background: #1b5e20; color: #fff; }
	footer { background: #1a1a2e; color: #e8e8e8; }
	footer a { color: #c9c9d4; text-decoration: none; }
	footer a:hover { color: #ff4d6a; }
	footer .text-muted { color: #b8b8c4 !important; }        .alert-succes { background: #d4edda; border: 1px solid #c3e6cb; color: #155724; border-radius: 10px; padding: 12px 20px; }
        .alert-erreur { background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; border-radius: 10px; padding: 12px 20px; }
    </style>
    @yield('styles')
</head>
<div id="disclaimerPopup" style="position:fixed; inset:0; background:rgba(0,0,0,0.7); z-index:9999; display:flex; align-items:center; justify-content:center; padding:20px;">
    <div style="background:#fff; border-radius:18px; max-width:500px; width:100%; padding:35px 30px; text-align:center; box-shadow:0 20px 60px rgba(0,0,0,0.3);">
        <div style="width:70px; height:70px; background:#fef2f2; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 20px;">
            <i class="fas fa-triangle-exclamation fa-2x" style="color:#C8102E;"></i>
        </div>
        <h4 class="fw-bold mb-3">تنبيه مهم</h4>
        <p class="text-muted mb-2">هذا الموقع هو <strong>مشروع تعليمي</strong> أنجز في إطار دراسي، وليس الموقع الرسمي للوكالة المغربية للدم ومشتقاته.</p>
        <p class="text-muted small mb-4">Ce site est un projet académique réalisé à des fins éducatives. Il ne s'agit pas du site officiel de l'AMSD. Aucune donnée saisie n'est réelle ni traitée officiellement.</p>
        <button onclick="document.getElementById('disclaimerPopup').style.display='none'" class="btn btn-rouge btn-lg w-100" style="border-radius:25px;">فهمت، دخول للموقع</button>
    </div>
</div>
<body>

<nav class="navbar navbar-expand-lg navbar-amsd sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('accueil') }}">
            <img src="{{ asset('images/logo.png') }}" alt="AMSD">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-1">
                <li class="nav-item"><a class="nav-link" href="{{ route('accueil') }}">الرئيسية</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('qui.sommes.nous') }}">من نحن</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('nos.activites') }}">انشطتنا</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('comment.ca.marche') }}">كيفاش كيمشي</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('conditions') }}">شروط التبرع</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('faq') }}">الاسئلة الشائعة</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('centres') }}">المراكز</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">اتصل بنا</a></li>
            </ul>
            <div class="d-flex gap-2 align-items-center">
                @auth
                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'medecin' || Auth::user()->role == 'agent')
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-rouge">لوحة التحكم</a>
                    @else
                        <a href="{{ route('donneur.dashboard') }}" class="btn btn-sm btn-vert">فضائي</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-secondary">خروج</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-danger">دخول</a>
                    <a href="{{ route('questionnaire') }}" class="btn btn-sm btn-rouge">كن متبرعا</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<main>
    @if(session('succes'))
        <div class="container mt-3">
            <div class="alert-succes">{{ session('succes') }}</div>
        </div>
    @endif
    @if(session('erreur'))
        <div class="container mt-3">
            <div class="alert-erreur">{{ session('erreur') }}</div>
        </div>
    @endif
    @yield('contenu')
</main>

<footer class="py-5 mt-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <img src="{{ asset('images/logo.png') }}" height="60" alt="AMSD" class="mb-3">
                <p class="text-muted small">الوكالة المغربية للدم ومشتقاته — نضمن توفر الدم الامن لجميع المرضى في المملكة</p>
            </div>
            <div class="col-md-2">
                <h6 class="text-white fw-bold mb-3">روابط مهمة</h6>
                <ul class="list-unstyled">
                    <li><a href="{{ route('qui.sommes.nous') }}">من نحن</a></li>
                    <li><a href="{{ route('nos.activites') }}">انشطتنا</a></li>
                    <li><a href="{{ route('faq') }}">الاسئلة الشائعة</a></li>
                    <li><a href="{{ route('don.argent') }}">تبرع بمال</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6 class="text-white fw-bold mb-3">المتبرعين</h6>
                <ul class="list-unstyled">
                    <li><a href="{{ route('conditions') }}">شروط التبرع</a></li>
                    <li><a href="{{ route('questionnaire') }}">كن متبرعا</a></li>
                    <li><a href="{{ route('centres') }}">اقرب مركز</a></li>
                    <li><a href="{{ route('comment.ca.marche') }}">كيفاش كيمشي الدم</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6 class="text-white fw-bold mb-3">اتصل بنا</h6>
                <p class="text-muted small"><i class="fas fa-envelope me-2"></i> contact@amsd.gov.ma</p>
                <p class="text-muted small"><i class="fas fa-globe me-2"></i> amsd.gov.ma</p>
                <div class="d-flex gap-3 mt-3">
		<a href="https://web.facebook.com/61576806849416/about/?_rdc=1&_rdr#" target="_blank"><i class="fab fa-facebook fa-lg"></i></a>
		<a href="https://www.instagram.com/amsd.gov.ma/?hl=fr" target="_blank"><i class="fab fa-instagram fa-lg"></i></a>
		<a href="https://www.linkedin.com/company/amsd-gov-ma/posts/?feedView=all" target="_blank"><i class="fab fa-linkedin fa-lg"></i></a>
                </div>
            </div>
        </div>
        <hr class="border-secondary mt-4">
        <p class="text-center text-muted small mb-0">© {{ date('Y') }} الوكالة المغربية للدم ومشتقاته — جميع الحقوق محفوظة</p>
	<p class="text-center small mb-0 mt-2" style="color:#8888a0;">تطوير : Simba — ENSAK RST</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>
