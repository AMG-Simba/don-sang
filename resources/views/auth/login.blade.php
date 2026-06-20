@extends('layouts.app')
@section('titre', 'تسجيل الدخول')
@section('contenu')
<div class="container py-5" style="max-width:500px;">
    <div class="card border-0 shadow p-4" style="border-radius:20px;">
        <div class="text-center mb-4">
            <img src="{{ asset('images/logo.png') }}" height="70" alt="AMSD">
            <h4 class="fw-bold mt-3">دخول للحساب</h4>
            <p class="text-muted small">ادخل بيانتك للوصول لفضائك</p>
        </div>
        @if($errors->any())
        <div class="alert-erreur mb-3">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">الايميل</label>
                <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email') }}" required>
            </div>
            <div class="mb-4">
                <label class="form-label fw-bold">كلمة السر</label>
                <input type="password" name="password" class="form-control form-control-lg" required>
            </div>
            <button type="submit" class="btn btn-rouge w-100 btn-lg mb-3" style="border-radius:25px;">دخول</button>
        </form>
        <hr>
        <p class="text-center text-muted mb-0">ما عندكش حساب؟ <a href="{{ route('questionnaire') }}" style="color:#C8102E;" class="fw-bold">كن متبرعا</a></p>
    </div>
</div>
@endsection
