@extends('admin.layout')
@section('titre', 'الاخبار')
@section('contenu')
<div class="row g-4">
    <div class="col-md-4">
        <div class="stat-card">
            <h6 class="fw-bold mb-4" style="color:#C8102E;">اضافة خبر جديد</h6>
            <form method="POST" action="{{ route('admin.actualites.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">العنوان</label>
                    <input type="text" name="titre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">المحتوى</label>
                    <textarea name="contenu" class="form-control" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">تاريخ النشر</label>
                    <input type="date" name="date_publication" class="form-control" value="{{ date('Y-m-d') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">الصورة</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
                <button type="submit" class="btn btn-rouge w-100">نشر الخبر</button>
            </form>
        </div>
    </div>
    <div class="col-md-8">
        <div class="table-card">
            <div class="p-3 fw-bold border-bottom">قائمة الاخبار</div>
            <table class="table table-hover align-middle">
                <thead><tr><th class="p-3">العنوان</th><th>التاريخ</th><th>اجراء</th></tr></thead>
                <tbody>
                    @foreach($actualites as $a)
                    <tr>
                        <td class="p-3 fw-bold">{{ Str::limit($a->titre, 50) }}</td>
                        <td>{{ $a->date_publication->format('d/m/Y') }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.actualites.destroy', $a->id) }}" class="d-inline" onsubmit="return confirm('تاكيد الحذف؟')">
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
