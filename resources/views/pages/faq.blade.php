@extends('layouts.app')
@section('titre', 'الاسئلة الشائعة')
@section('contenu')
<div style="background: linear-gradient(135deg, #C8102E, #8B0000); color:white; padding:60px 0;" class="mb-5">
    <div class="container text-center">
        <h1 class="fw-900" style="font-weight:900;">الاسئلة الشائعة</h1>
        <p class="opacity-80 fs-5">جاوبنا على كل اسئلتك حول التبرع بالدم</p>
    </div>
</div>
<div class="container pb-5" style="max-width:800px;">
    <div class="accordion" id="faqAccordion">
        @php
        $faqs = [
            ['س: شحال من الوقت كتاخود عملية التبرع؟', 'العملية كاملة ما كتاخدش غير 30 دقيقة — 10 دقائق للتسجيل وفحص صحي بسيط، و15 دقيقة للتبرع الفعلي، و5 دقائق للراحة.'],
            ['س: واش التبرع بالدم مولع؟', 'لا، التبرع ما كيولعش. كنستعملو ابر معقمة ومن استعمال مرة وحدة. ممكن تحس بوخزة خفيفة في البداية وخلاص.'],
            ['س: شحال من مرة كنقدر نتبرع؟', 'بالنسبة لدم كامل، كل 56 يوم (شهرين تقريبا). للبلازما كل 28 يوم، وللصفائح الدموية كل 7 ايام.'],
            ['س: شكون يقدر يتبرع؟', 'كل شخص عمره بين 18 و65 سنة، وزنه فوق 50 كيلو، وصحته مليحة. خاصك تجاوب على استبيان صحي قصير قبل التبرع.'],
            ['س: واش التبرع خطر على الصحة؟', 'ابدا. الجسم كيعوض الدم اللي تبرعت بيه خلال 24 الى 48 ساعة. ما فيه حتى خطر على صحتك.'],
            ['س: فين يروح دمي بعد التبرع؟', 'الدم كيمر بمراحل: الفحص والاختبارات → التصنيف حسب فصيلة الدم → التخزين → التوزيع على المستشفيات اللي محتاجاه.'],
            ['س: واش الدم كيتباع؟', 'لا، التبرع بالدم في المغرب طوعي ومجاني بالكامل. الدم ما كيتباعش وما كيشراش.'],
            ['س: واش خاصني ناكل قبل التبرع؟', 'ايه، مهم تاكل وجبة خفيفة وتشرب ماء مزيان قبل التبرع. تجنب الاكل الدسم.'],
        ];
        @endphp
        @foreach($faqs as $i => $faq)
        <div class="accordion-item border-0 mb-3 shadow-sm" style="border-radius:12px; overflow:hidden;">
            <h2 class="accordion-header">
                <button class="accordion-button {{ $i > 0 ? 'collapsed' : '' }} fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $i }}" style="background:{{ $i == 0 ? '#fef2f2' : 'white' }}; color:#333;">
                    {{ $faq[0] }}
                </button>
            </h2>
            <div id="faq{{ $i }}" class="accordion-collapse collapse {{ $i == 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">{{ $faq[1] }}</div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
