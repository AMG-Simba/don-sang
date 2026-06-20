@extends('layouts.app')
@section('titre', 'شاراتي')
@section('contenu')
<div class="container py-4">
    <h4 class="fw-bold mb-4"><i class="fas fa-medal me-2" style="color:#C8102E;"></i>شاراتي</h4>
    <div class="row g-4">
        @php
        $emojis = ['🩸','⭐','🏆','💎','👑'];
        @endphp
        @foreach($tous_badges as $i => $badge)
        <div class="col-md-4 col-lg-3">
            <div class="card border-0 shadow-sm text-center p-4 h-100" style="border-radius:15px; {{ in_array($badge->id, $badges_obtenus) ? 'border:2px solid #C8102E; background:#fef2f2;' : 'opacity:0.5;' }}">
                <div style="font-size:3rem; margin-bottom:10px;">{{ $emojis[$i] ?? '🏅' }}</div>
                <h6 class="fw-bold">{{ $badge->nom }}</h6>
                <p class="text-muted small mb-2">{{ $badge->description }}</p>
                <small class="text-muted">{{ $badge->condition_nombre }} تبرع</small>
                @if(in_array($badge->id, $badges_obtenus))
                <div class="mt-2"><span class="badge bg-success">مكتسب ✓</span></div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
