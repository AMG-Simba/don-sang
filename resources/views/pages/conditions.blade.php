@extends('layouts.app')
@section('titre', 'شروط التبرع')
@section('contenu')
<div style="background: linear-gradient(135deg, #C8102E, #8B0000); color:white; padding:60px 0;" class="mb-5">
    <div class="container text-center">
        <h1 class="fw-900" style="font-weight:900;">شروط التبرع بالدم</h1>
        <p class="opacity-80 fs-5">تعرف على الشروط الضرورية قبل ما تجي تتبرع</p>
    </div>
</div>
<div class="container pb-5">
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100" style="border-radius:15px; border-top:4px solid #2E7D32 !important;">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-4" style="color:#2E7D32;"><i class="fas fa-check-circle me-2"></i>الشروط الاساسية</h4>
                    @foreach(['عمرك بين 18 و65 سنة', 'وزنك فوق 50 كيلو', 'صحتك مليحة وما عندكش حمى', 'ما كتاخدش حتى دواء دبا', 'ما دريتيش عملية جراحية في 6 اشهر اللي فاتو', 'ما كنتيش حامل او كترضعي'] as $condition)
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-check text-success me-3 fs-5"></i>
                        <span>{{ $condition }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100" style="border-radius:15px; border-top:4px solid #C8102E !important;">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-4" style="color:#C8102E;"><i class="fas fa-times-circle me-2"></i>الحالات اللي ما تقدرش تتبرع فيها</h4>
                    @foreach(['عندك مرض مزمن خطير', 'تبرعت قبل شهرين', 'زرت طبيب الاسنان في 48 ساعة الاخيرة', 'خذيتي تطعيم في 4 اسابيع الاخيرة', 'سافرت لمنطقة خطرة مؤخرا', 'عندك انيميا او نقص في الهيموغلوبين'] as $condition)
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-times text-danger me-3 fs-5"></i>
                        <span>{{ $condition }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card border-0 shadow-sm" style="border-radius:15px; background:#fef2f2;">
                <div class="card-body p-4 text-center">
                    <h5 class="fw-bold mb-3">مستعد تتبرع؟</h5>
                    <p class="text-muted mb-4">جاوب على الاستبيان الصحي القصير وتاكد من اهليتك في دقيقتين</p>
                    <a href="{{ route('questionnaire') }}" class="btn btn-rouge btn-lg">ابدا الاستبيان</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
