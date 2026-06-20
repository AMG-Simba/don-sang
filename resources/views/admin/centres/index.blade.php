@extends('admin.layout')
@section('titre', 'المراكز')
@section('contenu')
<div class="row g-4">
    <div class="col-md-4">
        <div class="stat-card">
            <h6 class="fw-bold mb-4" style="color:#C8102E;">اضافة مركز جديد</h6>
            <form method="POST" action="{{ route('admin.centres.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">اسم المركز</label>
                    <input type="text" name="nom" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">المدينة</label>
                    <input type="text" name="ville" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">العنوان</label>
                    <input type="text" name="adresse" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">الهاتف</label>
                    <input type="text" name="telephone" class="form-control">
                </div>
                <button type="submit" class="btn btn-rouge w-100">اضافة</button>
            </form>
        </div>
    </div>
    <div class="col-md-8">
        <div class="table-card">
            <div class="p-3 fw-bold border-bottom">قائمة المراكز ({{ $centres->count() }})</div>
            <table class="table table-hover align-middle">
                <thead><tr><th class="p-3">الاسم</th><th>المدينة</th><th>الهاتف</th><th>اجراء</th></tr></thead>
                <tbody>
                    @foreach($centres as $centre)
                    <tr>
                        <td class="p-3 fw-bold">{{ $centre->nom }}</td>
                        <td>{{ $centre->ville }}</td>
                        <td>{{ $centre->telephone ?? '—' }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.centres.destroy', $centre->id) }}" class="d-inline" onsubmit="return confirm('تاكيد الحذف؟')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">حذف</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
