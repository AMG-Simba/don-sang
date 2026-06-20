@extends('layouts.app')
@section('titre', 'كيفاش كيمشي الدم')
@section('contenu')
<div style="background: linear-gradient(135deg, #C8102E, #8B0000); color:white; padding:60px 0;" class="mb-5">
    <div class="container text-center">
        <h1 class="fw-900" style="font-weight:900;">كيفاش كيمشي الدم</h1>
        <p class="opacity-80 fs-5">من المتبرع حتى المريض — كل المسار خطوة بخطوة</p>
    </div>
</div>
<div class="container pb-5">
    @php
    $etapes = [
        ['num'=>'1','icon'=>'fa-user-check','titre'=>'المتبرع كيجي للمركز','desc'=>'المتبرع كيوصل لمركز التبرع بعد ما تاكد من اهليته. كيمر بفحص صحي سريع وقياس الهيموغلوبين.','couleur'=>'#C8102E'],
        ['num'=>'2','icon'=>'fa-tint','titre'=>'عملية التبرع','desc'=>'العملية ما كتاخدش غير 15 دقيقة. يتبرع بدم كامل (450 مل) او بلازما او صفائح دموية.','couleur'=>'#e53935'],
        ['num'=>'3','icon'=>'fa-flask','titre'=>'الفحوصات المخبرية','desc'=>'الدم كيتفحص بالتفصيل: فصيلة الدم، فيروسات، امراض معدية — نضمنو سلامته الكاملة.','couleur'=>'#C8102E'],
        ['num'=>'4','icon'=>'fa-boxes','titre'=>'التخزين والتصنيف','desc'=>'الدم كيتخزن في ظروف مراقبة بدقة حسب فصيلته ونوعه، استعدادا للتوزيع.','couleur'=>'#e53935'],
        ['num'=>'5','icon'=>'fa-truck','titre'=>'التوزيع على المستشفيات','desc'=>'الوكالة كتوزع المنتجات الدموية على المستشفيات والعيادات عبر شبكتها اللوجيستية.','couleur'=>'#C8102E'],
        ['num'=>'6','icon'=>'fa-heartbeat','titre'=>'المريض يستفيد','desc'=>'الدم كيوصل للمريض المحتاج اليه — سواء بعد حادثة، عملية جراحية، او علاج مزمن.','couleur'=>'#e53935'],
    ];
    @endphp
    <div class="row g-4">
        @foreach($etapes as $etape)
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 text-center p-4" style="border-radius:15px;">
                <div class="mb-3" style="width:70px; height:70px; background:#fef2f2; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto;">
                    <i class="fas {{ $etape['icon'] }} fa-2x" style="color:{{ $etape['couleur'] }};"></i>
                </div>
                <div class="badge mb-2" style="background:{{ $etape['couleur'] }}; font-size:1rem; width:35px; height:35px; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto;">{{ $etape['num'] }}</div>
                <h5 class="fw-bold">{{ $etape['titre'] }}</h5>
                <p class="text-muted small">{{ $etape['desc'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
