@extends('admin.layout')
@section('titre', 'الرسائل')
@section('contenu')
<div class="table-card">
    <div class="p-3 fw-bold border-bottom">رسائل التواصل ({{ $messages->total() }})</div>
    <table class="table table-hover align-middle">
        <thead><tr><th class="p-3">الاسم</th><th>الايميل</th><th>الموضوع</th><th>التاريخ</th><th>الرسالة</th></tr></thead>
        <tbody>
            @foreach($messages as $msg)
            <tr>
                <td class="p-3 fw-bold">{{ $msg->prenom }} {{ $msg->nom }}</td>
                <td>{{ $msg->email }}</td>
                <td>{{ Str::limit($msg->sujet, 30) }}</td>
                <td>{{ $msg->created_at->format('d/m/Y') }}</td>
                <td>
                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#msg{{ $msg->id }}">عرض</button>
                    <div class="modal fade" id="msg{{ $msg->id }}" tabindex="-1">
                        <div class="modal-dialog"><div class="modal-content">
                            <div class="modal-header"><h5 class="modal-title">{{ $msg->sujet }}</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                            <div class="modal-body"><p>{{ $msg->message }}</p><small class="text-muted">من: {{ $msg->email }}</small></div>
                        </div></div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-3">{{ $messages->links() }}</div>
</div>
@endsection
