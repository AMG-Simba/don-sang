@extends('layouts.app')
@section('titre', 'سجل تبرعاتي')
@section('contenu')
<div class="container py-4">
    <h4 class="fw-bold mb-4"><i class="fas fa-history me-2" style="color:#C8102E;"></i>سجل تبرعاتي الكامل</h4>
    @if($dons->count() > 0)
    <div class="card border-0 shadow-sm" style="border-radius:15px; overflow:hidden;">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead style="background:#C8102E; color:white;">
                    <tr>
                        <th class="p-3">التاريخ</th>
                        <th>نوع التبرع</th>
                        <th>الحجم</th>
                        <th>المركز</th>
                        <th>الحالة</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dons as $don)
                    <tr>
                        <td class="p-3">{{ $don->date_don->format('d/m/Y') }}</td>
                        <td>
                            <span class="badge" style="background:#fef2f2; color:#C8102E;">{{ $don->type_don }}</span>
                        </td>
                        <td>{{ $don->volume }} مل</td>
                        <td>{{ $don->centre ? $don->centre->ville : '—' }}</td>
                        <td>
                            @if($don->statut == 'valide')
                                <span class="badge bg-success">مصادق ✓</span>
                            @else
                                <span class="badge bg-warning text-dark">في الانتظار</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="text-center py-5">
        <i class="fas fa-tint fa-4x mb-4" style="color:#e0e0e0;"></i>
        <h5 class="text-muted">ما دريتيش حتى تبرع بعد</h5>
        <a href="{{ route('centres') }}" class="btn btn-rouge mt-3">لقى اقرب مركز وابدا</a>
    </div>
    @endif
</div>
@endsection
