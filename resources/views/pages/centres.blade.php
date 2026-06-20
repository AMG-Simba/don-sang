@extends('layouts.app')
@section('titre', 'المراكز')
@section('contenu')
<div style="background: linear-gradient(135deg, #C8102E, #8B0000); color:white; padding:60px 0;" class="mb-5">
    <div class="container text-center">
        <h1 class="fw-900" style="font-weight:900;">مراكز التبرع بالدم</h1>
        <p class="opacity-80 fs-5">{{ $centres->count() }} مركز موزعة على جميع جهات المملكة</p>
    </div>
</div>
<div class="container pb-5">
    <div class="row g-4">
        @foreach($centres as $centre)
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100 p-4" style="border-radius:15px; border-right:4px solid #C8102E !important;">
                <div class="d-flex align-items-center mb-3">
                    <div style="width:45px; height:45px; background:#fef2f2; border-radius:50%; display:flex; align-items:center; justify-content:center; margin-left:12px; flex-shrink:0;">
                        <i class="fas fa-hospital" style="color:#C8102E;"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0">{{ $centre->nom }}</h6>
                        <small class="text-muted">{{ $centre->ville }}</small>
                    </div>
                </div>
                <p class="text-muted small mb-2"><i class="fas fa-map-marker-alt me-2" style="color:#C8102E;"></i>{{ $centre->adresse }}</p>
                @if($centre->telephone)
                <p class="text-muted small mb-0"><i class="fas fa-phone me-2" style="color:#C8102E;"></i>{{ $centre->telephone }}</p>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
