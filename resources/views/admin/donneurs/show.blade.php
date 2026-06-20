@extends('admin.layout')
@section('titre', 'تفاصيل المتبرع')
@section('contenu')
<a href="{{ route('admin.donneurs') }}" class="btn btn-outline-secondary mb-4">رجوع</a>
<div class="row g-4">
    <div class="col-md-5">
        <div class="stat-card">
            <h6 class="fw-bold mb-4" style="color:#C8102E;">المعلومات الشخصية</h6>
            @foreach([['الاسم الكامل',$donneur->prenom.' '.$donneur->nom],['CIN',$donneur->cin],['الجنس',$donneur->sexe],['تاريخ الميلاد',$donneur->date_naissance->format('d/m/Y')],['فصيلة الدم',$donneur->groupe_sanguin],['المدينة',$donneur->ville],['الهاتف',$donneur->telephone],['الوزن',($donneur->poids ? $donneur->poids.' كيلو' : '—')]] as $info)
            <div class="d-flex justify-content-between py-2 border-bottom">
                <span class="text-muted">{{ $info[0] }}</span>
                <span class="fw-bold">{{ $info[1] }}</span>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-7">
        <div class="table-card">
            <div class="p-3 fw-bold border-bottom">سجل التبرعات ({{ $donneur->dons->count() }})</div>
            @if($donneur->dons->count() > 0)
            <table class="table align-middle">
                <thead><tr><th class="p-3">التاريخ</th><th>النوع</th><th>الحجم</th><th>الحالة</th></tr></thead>
                <tbody>
                    @foreach($donneur->dons as $don)
                    <tr>
                        <td class="p-3">{{ $don->date_don->format('d/m/Y') }}</td>
                        <td>{{ $don->type_don }}</td>
                        <td>{{ $don->volume }} مل</td>
                        <td><span class="badge bg-{{ $don->statut == 'valide' ? 'success' : 'warning text-dark' }}">{{ $don->statut }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="p-3 text-muted">ما دار حتى تبرع بعد</p>
            @endif
        </div>
    </div>
</div>
@endsection
