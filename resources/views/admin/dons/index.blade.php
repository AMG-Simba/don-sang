@extends('admin.layout')
@section('titre', 'التبرعات')
@section('contenu')
<div class="table-card">
    <div class="p-3 fw-bold border-bottom">كل التبرعات ({{ $dons->total() }})</div>
    <table class="table table-hover align-middle">
        <thead><tr><th class="p-3">المتبرع</th><th>النوع</th><th>الحجم</th><th>المركز</th><th>التاريخ</th><th>الحالة</th><th>اجراء</th></tr></thead>
        <tbody>
            @foreach($dons as $don)
            <tr>
                <td class="p-3 fw-bold">{{ $don->donneur->prenom ?? '—' }} {{ $don->donneur->nom ?? '' }}</td>
                <td>{{ $don->type_don }}</td>
                <td>{{ $don->volume }} مل</td>
                <td>{{ $don->centre->ville ?? '—' }}</td>
                <td>{{ $don->date_don->format('d/m/Y') }}</td>
                <td><span class="badge bg-{{ $don->statut == 'valide' ? 'success' : 'warning text-dark' }}">{{ $don->statut }}</span></td>
                <td>
                    @if($don->statut != 'valide')
                    <form method="POST" action="{{ route('admin.dons.valider', $don->id) }}" class="d-inline">
                        @csrf
                        <button class="btn btn-sm btn-success">تصديق</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-3">{{ $dons->links() }}</div>
</div>
@endsection
