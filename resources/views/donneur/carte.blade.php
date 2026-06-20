@extends('layouts.app')
@section('titre', 'بطاقة المتبرع')
@section('styles')
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
@endsection
@section('contenu')
<div class="container py-4" style="max-width:600px;">
    <h4 class="fw-bold mb-4"><i class="fas fa-id-card me-2" style="color:#C8102E;"></i>بطاقة المتبرع الرقمية</h4>
    <div class="card border-0 shadow p-0" style="border-radius:20px; overflow:hidden;">
        <div style="background:linear-gradient(135deg,#C8102E,#8B0000); padding:30px; color:white;">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <img src="{{ asset('images/logo.png') }}" height="45" alt="AMSD">
                    <h5 class="mt-3 mb-0 fw-bold">{{ $donneur->prenom }} {{ $donneur->nom }}</h5>
                    <small class="opacity-80">CIN: {{ $donneur->cin }}</small>
                </div>
                <div class="text-center">
                    <div style="background:white; border-radius:10px; padding:8px; display:inline-block;">
                        <div id="qrcode"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4">
            <div class="row g-3">
                @foreach([['فصيلة الدم',$donneur->groupe_sanguin],['الجنس',$donneur->sexe],['المدينة',$donneur->ville],['الهاتف',$donneur->telephone]] as $info)
                <div class="col-6">
                    <div class="p-3 rounded" style="background:#f8f9fa;">
                        <small class="text-muted d-block">{{ $info[0] }}</small>
                        <span class="fw-bold">{{ $info[1] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <small class="text-muted">الوكالة المغربية للدم ومشتقاته — contact@amsd.gov.ma</small>
            </div>
        </div>
    </div>
    <div class="text-center mt-3">
        <button onclick="window.print()" class="btn btn-rouge"><i class="fas fa-print me-2"></i>طباعة البطاقة</button>
    </div>
</div>
@endsection
@section('scripts')
<script>
new QRCode(document.getElementById("qrcode"), {
    text: "AMSD|{{ $donneur->cin }}|{{ $donneur->groupe_sanguin }}|{{ $donneur->nom }} {{ $donneur->prenom }}",
    width: 80,
    height: 80,
    colorDark: "#C8102E",
    colorLight: "#ffffff",
});
</script>
@endsection
