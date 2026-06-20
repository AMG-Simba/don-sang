@extends('admin.layout')
@section('titre', 'المستخدمون')
@section('contenu')
<div class="table-card">
    <div class="p-3 fw-bold border-bottom">قائمة المستخدمين ({{ $utilisateurs->total() }})</div>
    <table class="table table-hover align-middle">
        <thead><tr><th class="p-3">الاسم</th><th>الايميل</th><th>الدور</th><th>التاريخ</th><th>تغيير الدور</th></tr></thead>
        <tbody>
            @foreach($utilisateurs as $user)
            <tr>
                <td class="p-3 fw-bold">{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><span class="badge" style="background:#fef2f2;color:#C8102E;">{{ $user->role }}</span></td>
                <td>{{ $user->created_at->format('d/m/Y') }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.utilisateurs.role', $user->id) }}" class="d-flex gap-2">
                        @csrf
                        <select name="role" class="form-select form-select-sm" style="width:130px;">
                            @foreach(['donneur','agent','medecin','admin'] as $role)
                            <option value="{{ $role }}" {{ $user->role == $role ? 'selected' : '' }}>{{ $role }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-sm btn-rouge">حفظ</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-3">{{ $utilisateurs->links() }}</div>
</div>
@endsection
