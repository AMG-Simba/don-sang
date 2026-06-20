@extends('layouts.app')
@section('titre', 'الصفحة غير موجودة')
@section('contenu')
<div class="container py-5 text-center" style="min-height:60vh; display:flex; align-items:center; justify-content:center;">
    <div>
        <div style="font-size:6rem; font-weight:900; color:#C8102E; line-height:1;">404</div>
        <h3 class="fw-bold mb-3 mt-3">الصفحة اللي كنت كتقلب عليها كعما كاينة</h3>
        <p class="text-muted mb-4">يمكن الرابط غلط او الصفحة تتبدلت</p>
        <a href="{{ route('accueil') }}" class="btn btn-rouge btn-lg" style="border-radius:25px;">
            <i class="fas fa-home me-2"></i>رجوع للرئيسية
        </a>
    </div>
</div>
@endsection
