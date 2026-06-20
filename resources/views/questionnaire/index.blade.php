@extends('layouts.app')
@section('titre', 'استبيان الاهلية')
@section('styles')
<style>
    .question-card { background: white; border-radius: 15px; padding: 20px 25px; margin-bottom: 15px; box-shadow: 0 3px 15px rgba(0,0,0,0.07); border-right: 4px solid #e0e0e0; transition: border-color 0.3s; }
    .question-card:has(input:checked) { border-right-color: #C8102E; }
    .form-check-input:checked { background-color: #C8102E; border-color: #C8102E; }
    .progress-bar { background: #C8102E; }
</style>
@endsection
@section('contenu')
<div style="background: linear-gradient(135deg, #C8102E, #8B0000); color:white; padding:60px 0;" class="mb-5">
    <div class="container text-center">
        <h1 class="fw-900" style="font-weight:900;">استبيان الاهلية</h1>
        <p class="opacity-80 fs-5">جاوب على هاد الاسئلة باش نتاكدو انك مستعد تتبرع</p>
    </div>
</div>
<div class="container pb-5" style="max-width:750px;">
    <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius:15px; background:#fef2f2;">
        <p class="mb-0 fw-bold" style="color:#C8102E;"><i class="fas fa-info-circle me-2"></i>جاوب بصدق — هاد الاسئلة غادي تحمي صحتك وصحة المريض اللي غادي يستفيد من دمك</p>
    </div>
    <form method="POST" action="{{ route('questionnaire.verifier') }}">
        @csrf
        @php
        $questions = [
            ['id' => 'age_moins_18', 'texte' => 'عمرك أقل من 18 سنة؟'],
            ['id' => 'poids_moins_50', 'texte' => 'وزنك أقل من 50 كيلو؟'],
            ['id' => 'fievre', 'texte' => 'عندك حمى أو كتحس بمرض دبا؟'],
            ['id' => 'dentiste', 'texte' => 'زرتي طبيب الاسنان في 48 ساعة الاخيرة؟'],
            ['id' => 'antibiotique', 'texte' => 'كتاخود أنتيبيوتيك أو دواء آخر دبا؟'],
            ['id' => 'maladie_grave', 'texte' => 'عندك مرض مزمن خطير (قلب، كبد، سرطان...)؟'],
            ['id' => 'operation', 'texte' => 'دريتي عملية جراحية في 6 اشهر الاخيرة؟'],
            ['id' => 'vaccin', 'texte' => 'خذيتي تطعيم في 4 اسابيع الاخيرة؟'],
            ['id' => 'grossesse', 'texte' => 'نتي حامل أو كترضعي (للنساء)؟'],
        ];
        @endphp

        @foreach($questions as $i => $question)
        <div class="question-card">
            <p class="fw-bold mb-3">{{ $i + 1 }}. {{ $question['texte'] }}</p>
            <div class="d-flex gap-4">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{ $question['id'] }}" id="{{ $question['id'] }}_oui" value="oui" required>
                    <label class="form-check-label fw-bold" for="{{ $question['id'] }}_oui">ايه</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{ $question['id'] }}" id="{{ $question['id'] }}_non" value="non">
                    <label class="form-check-label fw-bold" for="{{ $question['id'] }}_non">لا</label>
                </div>
            </div>
        </div>
        @endforeach

        <button type="submit" class="btn btn-rouge w-100 btn-lg mt-3" style="border-radius:25px;">
            <i class="fas fa-check-circle me-2"></i>تحقق من اهليتي
        </button>
    </form>
</div>
@endsection
