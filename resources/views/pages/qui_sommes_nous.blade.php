@extends('layouts.app')
@section('titre', 'من نحن')
@section('contenu')
<div style="background: linear-gradient(135deg, #C8102E, #8B0000); color:white; padding:60px 0;" class="mb-5">
    <div class="container text-center">
        <h1 class="fw-900" style="font-weight:900;">من نحن</h1>
        <p class="opacity-80 fs-5">الوكالة المغربية للدم ومشتقاته</p>
    </div>
</div>
<div class="container pb-5">
    <div class="row g-5 align-items-center mb-5">
        <div class="col-md-6">
            <h2 class="fw-bold mb-4" style="color:#C8102E;">مهمتنا</h2>
            <p class="text-muted fs-5 mb-3">الوكالة المغربية للدم ومشتقاته هي المؤسسة الرسمية المكلفة بتدبير منظومة الدم في المملكة المغربية.</p>
            <p class="text-muted">تاسست لتضمن التوفر المستمر على منتجات دموية آمنة وذات جودة عالية لفائدة جميع المرضى.</p>
        </div>
        <div class="col-md-6">
            <div class="row g-3">
                @foreach(['ضمان الأمن الدموي الوطني','تنسيق عمليات جمع الدم','ضمان جودة المنتجات الدموية','تعزيز التبرع الطوعي','دعم البحث العلمي في هذا المجال'] as $mission)
                <div class="col-12">
                    <div class="d-flex align-items-center p-3 rounded" style="background:#fef2f2;">
                        <i class="fas fa-check-circle me-3" style="color:#C8102E;"></i>
                        <span>{{ $mission }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row g-4 text-center">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4" style="border-radius:15px; border-top:4px solid #C8102E !important;">
                <i class="fas fa-bullseye fa-3x mb-3" style="color:#C8102E;"></i>
                <h5 class="fw-bold">رؤيتنا</h5>
                <p class="text-muted small">نكونو مرجعا وطنيا في تدبير الدم ومشتقاته، بمعايير دولية عالية الجودة</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4" style="border-radius:15px; border-top:4px solid #2E7D32 !important;">
                <i class="fas fa-heart fa-3x mb-3" style="color:#2E7D32;"></i>
                <h5 class="fw-bold">قيمنا</h5>
                <p class="text-muted small">التضامن، الشفافية، الجودة، الاحترافية، وخدمة الصالح العام</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4" style="border-radius:15px; border-top:4px solid #1565C0 !important;">
                <i class="fas fa-users fa-3x mb-3" style="color:#1565C0;"></i>
                <h5 class="fw-bold">فريقنا</h5>
                <p class="text-muted small">فريق متعدد التخصصات من الاطباء والصيادلة والتقنيين والاداريين</p>
            </div>
        </div>
    </div>
</div>
@endsection
