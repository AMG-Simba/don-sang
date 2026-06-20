@extends('layouts.app')
@section('titre', 'اتصل بنا')
@section('contenu')
<div style="background: linear-gradient(135deg, #C8102E, #8B0000); color:white; padding:60px 0;" class="mb-5">
    <div class="container text-center">
        <h1 class="fw-900" style="font-weight:900;">اتصل بنا</h1>
        <p class="opacity-80 fs-5">نتا دايما كتلقى جواب</p>
    </div>
</div>
<div class="container pb-5">
    <div class="row g-5">
        <div class="col-md-4">
            <h4 class="fw-bold mb-4">معلومات التواصل</h4>
            @foreach([['fas fa-envelope','contact@amsd.gov.ma'],['fas fa-globe','amsd.gov.ma'],['fas fa-map-marker-alt','الرباط، المغرب']] as $info)
            <div class="d-flex align-items-center mb-4 p-3 rounded" style="background:#fef2f2;">
                <i class="{{ $info[0] }} fa-lg me-3" style="color:#C8102E; width:20px;"></i>
                <span>{{ $info[1] }}</span>
            </div>
            @endforeach
        </div>
        <div class="col-md-8">
            <div class="card border-0 shadow-sm p-4" style="border-radius:15px;">
                <form method="POST" action="{{ route('contact.envoyer') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">الاسم</label>
                            <input type="text" name="nom" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">النسب</label>
                            <input type="text" name="prenom" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">الايميل</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">الموضوع</label>
                            <input type="text" name="sujet" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">الرسالة</label>
                            <textarea name="message" class="form-control" rows="5" required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-rouge w-100 btn-lg">ارسل الرسالة</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
