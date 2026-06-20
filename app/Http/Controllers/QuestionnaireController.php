<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function index()
    {
        return view('questionnaire.index');
    }

    public function verifier(Request $request)
    {
        $reponses = $request->except('_token');
        $eligible = true;
        $raison = '';

        $questions_eliminatoires = [
            'age_moins_18' => 'عمرك خاص يكون فوق 18 سنة',
            'poids_moins_50' => 'وزنك خاص يكون فوق 50 كيلو',
            'fievre' => 'ما تقدرش تتبرع وعندك حمى',
            'dentiste' => 'ما تقدرش تتبرع قبل 48 ساعة من زيارة طبيب الاسنان',
            'antibiotique' => 'ما تقدرش تتبرع وكتاخود انتيبيوتيك',
            'maladie_grave' => 'رأي الطبيب ضروري قبل التبرع',
            'operation' => 'خاص يمشيو 6 اشهر على الاقل بعد العملية',
            'vaccin' => 'خاص يمشيو 4 اسابيع بعد التطعيم',
            'grossesse' => 'ما تقدرش تتبرعي وانتي حامل او كترضعي',
        ];

        foreach ($questions_eliminatoires as $question => $message) {
            if ($request->has($question) && $request->input($question) == 'oui') {
                $eligible = false;
                $raison = $message;
                break;
            }
        }

        return view('questionnaire.resultat', compact('eligible', 'raison', 'reponses'));
    }
}
