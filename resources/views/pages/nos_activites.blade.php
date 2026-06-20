@extends('layouts.app')
@section('titre', 'انشطتنا')
@section('contenu')
<div style="background: linear-gradient(135deg, #C8102E, #8B0000); color:white; padding:60px 0;" class="mb-5">
    <div class="container text-center">
        <h1 class="fw-900" style="font-weight:900;">انشطتنا</h1>
        <p class="opacity-80 fs-5">اخبار وانشطة الوكالة المغربية للدم ومشتقاته</p>
    </div>
</div>
<div class="container pb-5">
    @php $actualites = \App\Models\Actualite::orderBy('date_publication', 'desc')->get(); @endphp
    <div class="row g-4">
        @foreach($actualites as $actualite)
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius:15px; overflow:hidden;">
                @if($actualite->image)
                    <img src="{{ asset('images/' . $actualite->image) }}" style="height:220px; object-fit:cover; width:100%;" alt="{{ $actualite->titre }}">
                @else
                    <div style="height:220px; background:#fef2f2; display:flex; align-items:center; justify-content:center;">
                        <i class="fas fa-tint fa-4x" style="color:#C8102E;"></i>
                    </div>
                @endif
                <div class="card-body p-4">
                    <p class="small fw-bold mb-2" style="color:#C8102E;"><i class="fas fa-calendar-alt me-1"></i>{{ $actualite->date_publication->format('d/m/Y') }}</p>
                    <h5 class="fw-bold mb-3">{{ $actualite->titre }}</h5>
                    <p class="text-muted">{{ $actualite->contenu }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
