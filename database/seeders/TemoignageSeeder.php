<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Temoignage;

class TemoignageSeeder extends Seeder
{
    public function run(): void
    {
        $temoignages = [
            ['nom' => 'فاطمة ز.', 'categorie' => 'حادثة سير', 'texte' => 'كنت ضحية حادثة سير خطيرة وكان عندي حاجة ماسة لنقل الدم. بفضل المتبرعين اللي ما عرفتهومش، رجعت لعيلتي. الله يجازيهم بخير.'],
            ['nom' => 'يوسف م.', 'categorie' => 'عملية جراحية', 'texte' => 'بعد عملية جراحية معقدة، احتجت لكميات كبيرة من الدم. اليوم راه صحتي مليحة وكنقدر نلعب مع وليداتي. شكرا للمتبرعين.'],
            ['nom' => 'خديجة ب.', 'categorie' => 'مرض السرطان', 'texte' => 'خلال علاج السرطان، كنت محتاجة لنقل الدم بانتظام. كل مرة كنحس بطاقة جديدة — هي طاقة المتبرعين اللي ما بغاوش غير يساعدو.'],
        ];

        foreach ($temoignages as $temoignage) {
            Temoignage::create($temoignage);
        }
    }
}
