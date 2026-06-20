@extends('layouts.app')
@section('titre', 'تبرع بمال')
@section('contenu')
<div style="background: linear-gradient(135deg, #C8102E, #8B0000); color:white; padding:60px 0;" class="mb-5">
    <div class="container text-center">
        <h1 class="fw-900" style="font-weight:900;">تبرع بمال</h1>
        <p class="opacity-80 fs-5">ساعد الوكالة على تطوير خدماتها وتوسيع شبكتها</p>
    </div>
</div>
<div class="container pb-5">
    <div class="row g-5">
        <div class="col-md-5">
            <h4 class="fw-bold mb-4">على شنو كيتصرف تبرعك؟</h4>
            @foreach(['تجهيز مراكز التبرع الجديدة','شراء معدات طبية متطورة','حملات التوعية والتحسيس','تدريب الكوادر الطبية','البحث العلمي في مجال الدم'] as $item)
            <div class="d-flex align-items-center mb-3">
                <i class="fas fa-check-circle me-3 fs-5" style="color:#2E7D32;"></i>
                <span>{{ $item }}</span>
            </div>
            @endforeach
        </div>
        <div class="col-md-7">
            <div class="card border-0 shadow-sm p-4" style="border-radius:15px;">
                <h5 class="fw-bold mb-4">نموذج التبرع المالي</h5>
                <form method="POST" action="{{ route('don.argent.envoyer') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">اسمك الكامل</label>
                        <input type="text" name="nom" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">الايميل</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">المبلغ (درهم)</label>
                        <div class="d-flex gap-2 flex-wrap mb-2">
                            @foreach([100, 200, 500, 1000] as $montant)
                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="document.querySelector('[name=montant]').value={{ $montant }}">{{ $montant }} درهم</button>
                            @endforeach
                        </div>
                        <input type="number" name="montant" class="form-control" min="10" placeholder="ادخل المبلغ" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">رسالة (اختياري)</label>
                        <textarea name="message" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-rouge w-100 btn-lg">تبرع الان</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
