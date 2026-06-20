@extends('layouts.app')
@section('titre', 'فضائي')
@section('styles')
<style>
    .dashboard-card { border-radius: 15px; border: none; box-shadow: 0 5px 20px rgba(0,0,0,0.07); transition: transform 0.2s; }
    .dashboard-card:hover { transform: translateY(-3px); }
    .stat-mini { background: #fef2f2; border-radius: 12px; padding: 20px; text-align: center; }
    .stat-mini .num { font-size: 2rem; font-weight: 900; color: #C8102E; }
    .badge-card { border-radius: 12px; padding: 15px; text-align: center; background: #f8f9fa; transition: all 0.3s; }
    .badge-card.obtenu { background: linear-gradient(135deg, #fef2f2, #fff); border: 2px solid #C8102E; }
    .sidebar-link { display: flex; align-items: center; gap: 12px; padding: 12px 16px; border-radius: 10px; color: #555; font-weight: 600; text-decoration: none; margin-bottom: 5px; transition: all 0.2s; }
    .sidebar-link:hover, .sidebar-link.active { background: #fef2f2; color: #C8102E; }
    .sidebar-link i { width: 20px; text-align: center; }
</style>
@endsection
@section('contenu')
<div class="container py-4">
    <div class="row g-4">
        <div class="col-lg-3">
            <div class="card dashboard-card p-3 mb-4">
                <div class="text-center p-3">
                    <div style="width:80px; height:80px; background:linear-gradient(135deg,#C8102E,#8B0000); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 15px;">
                        <i class="fas fa-user fa-2x text-white"></i>
                    </div>
                    <h6 class="fw-bold mb-0">{{ $donneur->prenom }} {{ $donneur->nom }}</h6>
                    <span class="badge mt-2" style="background:#fef2f2; color:#C8102E;">{{ $donneur->groupe_sanguin }}</span>
                </div>
                <hr>
                <nav>
                    <a href="{{ route('donneur.dashboard') }}" class="sidebar-link active"><i class="fas fa-home"></i> الرئيسية</a>
                    <a href="{{ route('donneur.profil') }}" class="sidebar-link"><i class="fas fa-user-edit"></i> ملفي</a>
                    <a href="{{ route('donneur.historique') }}" class="sidebar-link"><i class="fas fa-history"></i> سجل تبرعاتي</a>
                    <a href="{{ route('donneur.badges') }}" class="sidebar-link"><i class="fas fa-medal"></i> شاراتي</a>
                    <a href="{{ route('donneur.carte') }}" class="sidebar-link"><i class="fas fa-id-card"></i> بطاقتي</a>
                    <a href="{{ route('donneur.notifications') }}" class="sidebar-link"><i class="fas fa-bell"></i> الاشعارات @if($notifications->count() > 0)<span class="badge bg-danger ms-auto">{{ $notifications->count() }}</span>@endif</a>
                </nav>
                <hr>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100 btn-sm">خروج</button>
                </form>
            </div>
        </div>
        <div class="col-lg-9">
            @if(session('succes'))
            <div class="alert-succes mb-4">{{ session('succes') }}</div>
            @endif
            <div class="row g-3 mb-4">
                <div class="col-6 col-md-3">
                    <div class="stat-mini">
                        <div class="num">{{ $dons->count() }}</div>
                        <div class="text-muted small">تبرع</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-mini">
                        <div class="num">{{ $badges->count() }}</div>
                        <div class="text-muted small">شارة</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-mini">
                        <div class="num" style="font-size:1.3rem;">{{ $donneur->groupe_sanguin }}</div>
                        <div class="text-muted small">فصيلة الدم</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-mini">
                        <div class="num" style="font-size:1rem;">
                            @if($donneur->date_prochain_don)
                                {{ $donneur->date_prochain_don->format('d/m/Y') }}
                            @else
                                الان
                            @endif
                        </div>
                        <div class="text-muted small">التبرع القادم</div>
                    </div>
                </div>
            </div>
            <div class="card dashboard-card p-4 mb-4">
                <h5 class="fw-bold mb-4"><i class="fas fa-history me-2" style="color:#C8102E;"></i>اخر التبرعات</h5>
                @if($dons->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead style="background:#fef2f2;">
                            <tr>
                                <th>التاريخ</th>
                                <th>النوع</th>
                                <th>الحجم</th>
                                <th>الحالة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dons as $don)
                            <tr>
                                <td>{{ $don->date_don->format('d/m/Y') }}</td>
                                <td>{{ $don->type_don }}</td>
                                <td>{{ $don->volume }} مل</td>
                                <td>
                                    <span class="badge" style="background:{{ $don->statut == 'valide' ? '#d4edda' : '#fef2f2' }}; color:{{ $don->statut == 'valide' ? '#155724' : '#C8102E' }};">
                                        {{ $don->statut == 'valide' ? 'مصادق' : 'في الانتظار' }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-4">
                    <i class="fas fa-tint fa-3x mb-3" style="color:#e0e0e0;"></i>
                    <p class="text-muted">ما دريتيش حتى تبرع بعد</p>
                    <a href="{{ route('centres') }}" class="btn btn-rouge btn-sm">لقى اقرب مركز</a>
                </div>
                @endif
            </div>
            @if($badges->count() > 0)
            <div class="card dashboard-card p-4">
                <h5 class="fw-bold mb-4"><i class="fas fa-medal me-2" style="color:#C8102E;"></i>شاراتي</h5>
                <div class="row g-3">
                    @foreach($badges as $badge)
                    <div class="col-6 col-md-3">
                        <div class="badge-card obtenu">
                            <div style="font-size:2rem;">🏅</div>
                            <div class="fw-bold small mt-2">{{ $badge->nom }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
