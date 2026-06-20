@extends('admin.layout')
@section('titre', 'المتبرعون')
@section('contenu')
<div class="table-card">
    <div class="p-3 d-flex justify-content-between align-items-center border-bottom">
        <span class="fw-bold">قائمة المتبرعين ({{ $donneurs->total() }})</span>
    </div>
    <table class="table table-hover align-middle">
        <thead><tr><th class="p-3">الاسم</th><th>CIN</th><th>الفصيلة</th><th>المدينة</th><th>الهاتف</th><th>التاريخ</th><th>اجراءات</th></tr></thead>
        <tbody>
            @foreach($donneurs as $d)
            <tr>
                <td class="p-3 fw-bold">{{ $d->prenom }} {{ $d->nom }}</td>
                <td>{{ $d->cin }}</td>
                <td><span class="badge" style="background:#fef2f2;color:#C8102E;">{{ $d->groupe_sanguin }}</span></td>
                <td>{{ $d->ville }}</td>
                <td>{{ $d->telephone }}</td>
                <td>{{ $d->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('admin.donneurs.show', $d->id) }}" class="btn btn-sm btn-outline-primary">عرض</a>
                    <form method="POST" action="{{ route('admin.donneurs.destroy', $d->id) }}" class="d-inline" onsubmit="return confirm('تاكيد الحذف؟')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-3">{{ $donneurs->links() }}</div>
</div>
@endsection
