<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Badge;

class BadgeSeeder extends Seeder
{
    public function run(): void
    {
        $badges = [
            ['nom' => 'اول تبرع', 'description' => 'بدات المسيرة — شكرا على تبرعك الاول', 'condition_nombre' => 1],
            ['nom' => 'متبرع منتظم', 'description' => 'وصلت ل 3 تبرعات — مستمر ومحتاجين ليك', 'condition_nombre' => 3],
            ['nom' => 'بطل الدم', 'description' => '10 تبرعات — نت بطل حقيقي', 'condition_nombre' => 10],
            ['nom' => 'متبرع النخبة', 'description' => '25 تبرع — شكرا على كل قطرة', 'condition_nombre' => 25],
            ['nom' => 'الاسطورة', 'description' => '50 تبرع — مثال للعطاء والتضامن', 'condition_nombre' => 50],
        ];

        foreach ($badges as $badge) {
            Badge::create($badge);
        }
    }
}
