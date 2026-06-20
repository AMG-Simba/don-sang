<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titre', 'لوحة التحكم') — AMSD Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Cairo', sans-serif; }
        body { background: #f4f6f9; }
        .sidebar { width: 260px; min-height: 100vh; background: #1a1a2e; position: fixed; top: 0; right: 0; z-index: 100; }
        .sidebar-logo { padding: 20px; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .sidebar-link { display: flex; align-items: center; gap: 12px; padding: 12px 20px; color: rgba(255,255,255,0.7); text-decoration: none; font-weight: 600; transition: all 0.2s; }
        .sidebar-link:hover, .sidebar-link.active { background: rgba(200,16,46,0.2); color: white; border-right: 3px solid #C8102E; }
        .sidebar-link i { width: 20px; text-align: center; }
        .sidebar-section { padding: 10px 20px 5px; font-size: 0.75rem; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 1px; }
        .main-content { margin-right: 260px; padding: 25px; }
        .topbar { background: white; border-radius: 12px; padding: 15px 25px; margin-bottom: 25px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 10px rgba(0,0,0,0.06); }
        .stat-card { background: white; border-radius: 15px; padding: 25px; box-shadow: 0 3px 15px rgba(0,0,0,0.07); }
        .stat-card .num { font-size: 2.2rem; font-weight: 900; }
        .table-card { background: white; border-radius: 15px; box-shadow: 0 3px 15px rgba(0,0,0,0.07); overflow: hidden; }
        .table-card .table { margin: 0; }
        .table-card thead { background: #1a1a2e; color: white; }
        .btn-rouge { background: #C8102E; color: white; border: none; border-radius: 8px; }
        .btn-rouge:hover { background: #a50d24; color: white; }
        .alert-succes { background: #d4edda; border: 1px solid #c3e6cb; color: #155724; border-radius: 10px; padding: 12px 20px; margin-bottom: 20px; }
    </style>
    @yield('styles')
</head>
<body>
<div class="sidebar">
    <div class="sidebar-logo">
        <img src="{{ asset('images/logo.png') }}" height="45" alt="AMSD">
        <div class="text-white small mt-2 opacity-75">لوحة التحكم</div>
    </div>
    <nav class="py-3">
        <p class="sidebar-section">عام</p>
        <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="fas fa-chart-line"></i> الاحصائيات</a>
        <p class="sidebar-section">الإدارة</p>
        <a href="{{ route('admin.donneurs') }}" class="sidebar-link {{ request()->routeIs('admin.donneurs*') ? 'active' : '' }}"><i class="fas fa-users"></i> المتبرعون</a>
        <a href="{{ route('admin.dons') }}" class="sidebar-link {{ request()->routeIs('admin.dons*') ? 'active' : '' }}"><i class="fas fa-tint"></i> التبرعات</a>
        <a href="{{ route('admin.centres') }}" class="sidebar-link {{ request()->routeIs('admin.centres*') ? 'active' : '' }}"><i class="fas fa-hospital"></i> المراكز</a>
        <p class="sidebar-section">المحتوى</p>
        <a href="{{ route('admin.actualites') }}" class="sidebar-link {{ request()->routeIs('admin.actualites*') ? 'active' : '' }}"><i class="fas fa-newspaper"></i> الاخبار</a>
        <a href="{{ route('admin.messages') }}" class="sidebar-link {{ request()->routeIs('admin.messages*') ? 'active' : '' }}"><i class="fas fa-envelope"></i> الرسائل</a>
        <p class="sidebar-section">الإعدادات</p>
        <a href="{{ route('admin.utilisateurs') }}" class="sidebar-link {{ request()->routeIs('admin.utilisateurs*') ? 'active' : '' }}"><i class="fas fa-user-cog"></i> المستخدمون</a>
        <hr style="border-color:rgba(255,255,255,0.1); margin: 10px 20px;">
        <a href="{{ route('accueil') }}" class="sidebar-link"><i class="fas fa-globe"></i> الموقع</a>
        <form method="POST" action="{{ route('logout') }}" class="px-3 mt-2">
            @csrf
            <button type="submit" class="btn btn-outline-danger w-100 btn-sm">خروج</button>
        </form>
    </nav>
</div>
<div class="main-content">
    <div class="topbar">
        <h5 class="fw-bold mb-0">@yield('titre', 'لوحة التحكم')</h5>
        <div class="d-flex align-items-center gap-3">
            <span class="text-muted small">{{ Auth::user()->name }}</span>
            <span class="badge" style="background:#fef2f2; color:#C8102E;">{{ Auth::user()->role }}</span>
        </div>
    </div>
    @if(session('succes'))
    <div class="alert-succes">{{ session('succes') }}</div>
    @endif
    @yield('contenu')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>
