@extends('layouts.app')
@section('titre', 'التسجيل كمتبرع')
@section('contenu')
<div style="background: linear-gradient(135deg, #C8102E, #8B0000); color:white; padding:50px 0;" class="mb-5">
    <div class="container text-center">
        <h1 class="fw-900" style="font-weight:900;">التسجيل كمتبرع</h1>
        <p class="opacity-80">عبي بياناتك الشخصية والطبية</p>
    </div>
</div>
<div class="container pb-5" style="max-width:800px;">
    @if($errors->any())
    <div class="alert-erreur mb-4">
        @foreach($errors->all() as $error)
        <div>• {{ $error }}</div>
        @endforeach
    </div>
    @endif
    <div class="card border-0 shadow-sm p-4" style="border-radius:20px;">
        <form method="POST" action="{{ route('inscription.post') }}">
            @csrf
            <h5 class="fw-bold mb-4" style="color:#C8102E;"><i class="fas fa-user me-2"></i>المعلومات الشخصية</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label fw-bold">الاسم</label>
                    <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">النسب</label>
                    <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">رقم CIN</label>
                    <input type="text" name="cin" class="form-control" value="{{ old('cin') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">الجنس</label>
                    <select name="sexe" class="form-select" required>
                        <option value="">اختار</option>
                        <option value="ذكر">ذكر</option>
                        <option value="انثى">انثى</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">تاريخ الميلاد</label>
                    <input type="date" name="date_naissance" class="form-control" value="{{ old('date_naissance') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">فصيلة الدم</label>
                    <select name="groupe_sanguin" class="form-select" required>
                        <option value="">اختار</option>
                        @foreach(['A+','A-','B+','B-','O+','O-','AB+','AB-'] as $gs)
                        <option value="{{ $gs }}">{{ $gs }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">المدينة</label>
                    <input type="text" name="ville" class="form-control" value="{{ old('ville') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">الهاتف</label>
                    <input type="text" name="telephone" class="form-control" value="{{ old('telephone') }}" required>
                </div>
            </div>
            <h5 class="fw-bold mb-4" style="color:#C8102E;"><i class="fas fa-lock me-2"></i>بيانات الدخول</h5>
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label fw-bold">الايميل</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">كلمة السر</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">تاكيد كلمة السر</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-rouge w-100 btn-lg" style="border-radius:25px;">انشاء الحساب</button>
                </div>
            </div>
        </form>
    </div>
    <p class="text-center text-muted mt-3">عندك حساب؟ <a href="{{ route('login') }}" style="color:#C8102E;" class="fw-bold">دخول</a></p>
</div>
@endsection
