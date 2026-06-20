@extends('layouts.app')
@section('titre', 'نتيجة الاستبيان')
@section('contenu')
<div class="container py-5" style="max-width:650px;">
    @if($eligible)
    <div class="text-center">
        <div style="width:120px; height:120px; background:#d4edda; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 30px;">
            <i class="fas fa-check-circle fa-4x" style="color:#2E7D32;"></i>
        </div>
        <h2 class="fw-bold mb-3" style="color:#2E7D32;">مبروك! نت مؤهل للتبرع 🎉</h2>
        <p class="text-muted fs-5 mb-5">نتائج استبيانك مليحة — كتقدر تتبرع بدمك وتنقذ الارواح</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="{{ route('inscription') }}" class="btn btn-rouge btn-lg" style="border-radius:25px;">
                <i class="fas fa-user-plus me-2"></i>سجل كمتبرع
            </a>
            <a href="{{ route('centres') }}" class="btn btn-outline-danger btn-lg" style="border-radius:25px;">
                <i class="fas fa-map-marker-alt me-2"></i>لقى اقرب مركز
            </a>
        </div>
    </div>
    @else
    <div class="text-center">
        <div style="width:120px; height:120px; background:#fef2f2; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 30px;">
            <i class="fas fa-times-circle fa-4x" style="color:#C8102E;"></i>
        </div>
        <h2 class="fw-bold mb-3" style="color:#C8102E;">للاسف ما تقدرش تتبرع دبا</h2>
        <div class="card border-0 shadow-sm p-4 mb-5 text-start" style="border-radius:15px; border-right:4px solid #C8102E !important;">
            <p class="fw-bold mb-1">السبب:</p>
            <p class="text-muted mb-0">{{ $raison }}</p>
        </div>
        <p class="text-muted mb-4">ممكن تتبرع في وقت اخر — راجع طبيبك إذا عندك اي استفسار</p>
        <a href="{{ route('accueil') }}" class="btn btn-rouge btn-lg" style="border-radius:25px;">رجع للرئيسية</a>
    </div>
    @endif
</div>
@endsection
