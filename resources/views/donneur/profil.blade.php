@extends('layouts.app')
@section('titre', 'ملفي الشخصي')
@section('contenu')
<div class="container py-4" style="max-width:800px;">
    <h4 class="fw-bold mb-4"><i class="fas fa-user-edit me-2" style="color:#C8102E;"></i>ملفي الشخصي</h4>
    @if(session('succes'))
    <div class="alert-succes mb-4">{{ session('succes') }}</div>
    @endif
    <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius:15px;">
        <h6 class="fw-bold mb-3" style="color:#C8102E;">المعلومات الثابتة</h6>
        <div class="row g-3">
            @foreach([['الاسم',$donneur->nom],['النسب',$donneur->prenom],['CIN',$donneur->cin],['الجنس',$donneur->sexe],['تاريخ الميلاد',$donneur->date_naissance->format('d/m/Y')],['فصيلة الدم',$donneur->groupe_sanguin]] as $info)
            <div class="col-md-6">
                <div class="p-3 rounded" style="background:#f8f9fa;">
                    <small class="text-muted d-block">{{ $info[0] }}</small>
                    <span class="fw-bold">{{ $info[1] }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="card border-0 shadow-sm p-4" style="border-radius:15px;">
        <h6 class="fw-bold mb-3" style="color:#C8102E;">المعلومات القابلة للتعديل</h6>
        <form method="POST" action="{{ route('donneur.profil.modifier') }}">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">المدينة</label>
                    <input type="text" name="ville" class="form-control" value="{{ $donneur->ville }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">الهاتف</label>
                    <input type="text" name="telephone" class="form-control" value="{{ $donneur->telephone }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">الوزن (كيلو)</label>
                    <input type="number" name="poids" class="form-control" value="{{ $donneur->poids }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">الضغط الدموي</label>
                    <input type="text" name="tension" class="form-control" value="{{ $donneur->tension }}" placeholder="مثال: 120/80">
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">امراض مزمنة (ان وجدت)</label>
                    <textarea name="maladies_chroniques" class="form-control" rows="3">{{ $donneur->maladies_chroniques }}</textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-rouge">حفظ التغييرات</button>
                    <a href="{{ route('donneur.dashboard') }}" class="btn btn-outline-secondary me-2">رجوع</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
