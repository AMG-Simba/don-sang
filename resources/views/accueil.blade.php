@extends('layouts.app')
@section('titre', 'الوكالة المغربية للدم ومشتقاته')

@section('styles')
<style>
    .hero { background: linear-gradient(135deg, #C8102E 0%, #8B0000 100%); color: white; padding: 100px 0; position: relative; overflow: hidden; }
    .hero::before { content: ''; position: absolute; top: -50%; right: -10%; width: 400px; height: 400px; background: rgba(255,255,255,0.05); border-radius: 50%; }
    .hero-badge { background: rgba(255,255,255,0.15); border-radius: 25px; padding: 6px 16px; display: inline-block; font-size: 0.85rem; margin-bottom: 15px; }
    .hero h1 { font-size: 3rem; font-weight: 900; line-height: 1.3; }
    .hero-img { border-radius: 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.3); max-width: 100%; }
    .stat-card { background: white; border-radius: 15px; padding: 30px 20px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.08); border-top: 4px solid var(--rouge); }
    .stat-number { font-size: 2.5rem; font-weight: 900; color: var(--rouge); }
    .etape-num { width: 55px; height: 55px; background: var(--rouge-clair); border: 3px solid var(--rouge); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.4rem; font-weight: 900; color: var(--rouge); margin-left: auto; margin-right: auto; margin-bottom: 15px; }
    .actualite-card { border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: transform 0.3s; border: none; height: 100%; }
    .actualite-card:hover { transform: translateY(-5px); }
    .actualite-card img { height: 200px; object-fit: cover; width: 100%; }
    .actualite-date { font-size: 0.8rem; color: var(--rouge); font-weight: 700; }
    .temoignage-card { background: white; border-radius: 15px; padding: 25px; box-shadow: 0 5px 20px rgba(0,0,0,0.06); border-right: 5px solid var(--rouge); }
    .section-titre { font-size: 2rem; font-weight: 900; color: #1a1a2e; }
    .bg-rouge-clair { background: var(--rouge-clair); }
</style>
@endsection

@section('contenu')

<section class="hero">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="hero-badge">🩸 الوكالة المغربية للدم ومشتقاته</span>
                <h1>التبرع بالدم<br>كينقذ الحياة</h1>
                <p class="fs-5 opacity-90 my-4">كل تبرع كيساعد على انقاذ 3 ارواح. انضم لمجتمع المتبرعين في المغرب وخلي الفرق.</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('questionnaire') }}" class="btn btn-light btn-lg fw-bold" style="border-radius:25px; color:var(--rouge);">كن متبرعا الان</a>
                    <a href="{{ route('comment.ca.marche') }}" class="btn btn-outline-light btn-lg fw-bold" style="border-radius:25px;">كيفاش كيمشي؟</a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="{{ asset('images/post1.jpg') }}" alt="التبرع بالدم" class="hero-img" style="max-height:380px; width:100%; object-fit:cover;">
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background: linear-gradient(135deg, #1a1a2e 0%, #C8102E 100%);">
    <div class="container">
        <div class="row g-4 text-center text-white">
            <div class="col-6 col-md-3">
                <div class="stat-number text-white">{{ number_format($nombre_donneurs) }}+</div>
                <div class="opacity-80">متبرع مسجل</div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-number text-white">{{ number_format($nombre_dons) }}+</div>
                <div class="opacity-80">عملية تبرع</div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-number text-white">{{ $nombre_centres }}</div>
                <div class="opacity-80">مركز تبرع</div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-number text-white">12</div>
                <div class="opacity-80">جهة مغربية</div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-rouge-clair">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-titre">كيفاش كيمشي التبرع؟</h2>
            <p class="text-muted">في 3 خطوات بسيطة، كتقدر تدير الفرق</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4 text-center">
                <div class="etape-num">1</div>
                <h5 class="fw-bold">سجل بسهولة</h5>
                <p class="text-muted">جاوب على الاسئلة الصحية وعبي بيانتك الشخصية في دقائق</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="etape-num">2</div>
                <h5 class="fw-bold">حدد الموعد</h5>
                <p class="text-muted">اختار اقرب مركز من دارك وجي في الوقت المناسب ليك</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="etape-num">3</div>
                <h5 class="fw-bold">تبرع وانقذ</h5>
                <p class="text-muted">العملية ما كتاخدش غير 15 دقيقة — دمك كيوصل لمن محتاجه</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-titre">اخر الاخبار</h2>
            <a href="{{ route('nos.activites') }}" class="btn btn-rouge">شوف الكل</a>
        </div>
        <div class="row g-4">
            @foreach($actualites as $actualite)
            <div class="col-md-4">
                <div class="actualite-card card">
                    @if($actualite->image)
                        <img src="{{ asset('images/' . $actualite->image) }}" alt="{{ $actualite->titre }}">
                    @else
                        <div style="height:200px; background:var(--rouge-clair); display:flex; align-items:center; justify-content:center;">
                            <i class="fas fa-tint fa-3x" style="color:var(--rouge);"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <p class="actualite-date"><i class="fas fa-calendar-alt me-1"></i>{{ $actualite->date_publication->format('d/m/Y') }}</p>
                        <h6 class="fw-bold">{{ $actualite->titre }}</h6>
                        <p class="text-muted small">{{ Str::limit($actualite->contenu, 100) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5 bg-rouge-clair">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-titre">شهادات حقيقية</h2>
            <p class="text-muted">ناس عاشو التجربة وقالو كلمتهم</p>
        </div>
        <div class="row g-4">
            @foreach($temoignages as $temoignage)
            <div class="col-md-4">
                <div class="temoignage-card">
                    <span class="badge mb-2" style="background:var(--rouge-clair); color:var(--rouge); font-size:0.85rem;">{{ $temoignage->categorie }}</span>
                    <p class="mb-3">"{{ $temoignage->texte }}"</p>
                    <p class="fw-bold mb-0" style="color:var(--rouge);">— {{ $temoignage->nom }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5" style="background: linear-gradient(135deg, #C8102E, #8B0000); color:white;">
    <div class="container text-center">
        <h2 class="fw-900 mb-3" style="font-size:2.5rem; font-weight:900;">انضم لمجتمع المتبرعين</h2>
        <p class="fs-5 opacity-90 mb-4">دمك كيساوي حياة — كن سبب في انقاذ حياة شخص اليوم</p>
        <a href="{{ route('questionnaire') }}" class="btn btn-light btn-lg fw-bold me-3" style="border-radius:25px; color:var(--rouge);">ابدا الان</a>
        <a href="{{ route('don.argent') }}" class="btn btn-outline-light btn-lg fw-bold" style="border-radius:25px;">تبرع بمال</a>
    </div>
</section>

@endsection
