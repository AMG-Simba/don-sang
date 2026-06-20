@extends('admin.layout')
@section('titre', 'الاحصائيات')
@section('contenu')
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="num" style="color:#C8102E;">{{ $nombre_donneurs }}</div>
                    <div class="text-muted">متبرع مسجل</div>
                </div>
                <i class="fas fa-users fa-2x opacity-25"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="num" style="color:#2E7D32;">{{ $nombre_dons }}</div>
                    <div class="text-muted">تبرع منجز</div>
                </div>
                <i class="fas fa-tint fa-2x opacity-25"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="num" style="color:#1565C0;">{{ $nombre_centres }}</div>
                    <div class="text-muted">مركز تبرع</div>
                </div>
                <i class="fas fa-hospital fa-2x opacity-25"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="num" style="color:#e65100;">{{ $nombre_messages }}</div>
                    <div class="text-muted">رسالة جديدة</div>
                </div>
                <i class="fas fa-envelope fa-2x opacity-25"></i>
            </div>
        </div>
    </div>
</div>
<div class="row g-4">
    <div class="col-md-6">
        <div class="table-card">
            <div class="p-3 fw-bold border-bottom">اخر المتبرعين المسجلين</div>
            <table class="table table-hover align-middle">
                <thead><tr><th class="p-3">الاسم</th><th>المدينة</th><th>الفصيلة</th></tr></thead>
                <tbody>
                    @foreach($donneurs_recents as $d)
                    <tr>
                        <td class="p-3">{{ $d->prenom }} {{ $d->nom }}</td>
                        <td>{{ $d->ville }}</td>
                        <td><span class="badge" style="background:#fef2f2;color:#C8102E;">{{ $d->groupe_sanguin }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6">
        <div class="table-card">
            <div class="p-3 fw-bold border-bottom">اخر التبرعات</div>
            <table class="table table-hover align-middle">
                <thead><tr><th class="p-3">المتبرع</th><th>النوع</th><th>التاريخ</th><th>الحالة</th></tr></thead>
                <tbody>
                    @foreach($dons_recents as $don)
                    <tr>
                        <td class="p-3">{{ $don->donneur->prenom ?? '—' }}</td>
                        <td>{{ $don->type_don }}</td>
                        <td>{{ $don->date_don->format('d/m/Y') }}</td>
                        <td><span class="badge bg-{{ $don->statut == 'valide' ? 'success' : 'warning text-dark' }}">{{ $don->statut }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
