@extends('layouts.app')
@section('titre', 'الاشعارات')
@section('contenu')
<div class="container py-4" style="max-width:750px;">
    <h4 class="fw-bold mb-4"><i class="fas fa-bell me-2" style="color:#C8102E;"></i>الاشعارات</h4>
    @if($notifications->count() > 0)
        @foreach($notifications as $notif)
        <div class="card border-0 shadow-sm mb-3 p-3" style="border-radius:12px; border-right:4px solid {{ $notif->lu ? '#e0e0e0' : '#C8102E' }} !important;">
            <div class="d-flex justify-content-between">
                <h6 class="fw-bold mb-1">{{ $notif->titre }}</h6>
                <small class="text-muted">{{ $notif->created_at->diffForHumans() }}</small>
            </div>
            <p class="text-muted mb-0 small">{{ $notif->message }}</p>
        </div>
        @endforeach
    @else
        <div class="text-center py-5">
            <i class="fas fa-bell-slash fa-4x mb-4" style="color:#e0e0e0;"></i>
            <p class="text-muted">ما كاين حتى اشعار</p>
        </div>
    @endif
</div>
@endsection
