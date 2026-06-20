<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Centre;

class CentreSeeder extends Seeder
{
    public function run(): void
    {
        $centres = [
            ['nom' => 'Centre de Transfusion Sanguine Rabat', 'ville' => 'Rabat', 'adresse' => 'Avenue Ibn Sina, Agdal, Rabat', 'telephone' => '0537771900', 'latitude' => 33.9912, 'longitude' => -6.8498],
            ['nom' => 'Centre de Transfusion Sanguine Casablanca', 'ville' => 'Casablanca', 'adresse' => 'Rue Abderrahmane Sahraoui, Casablanca', 'telephone' => '0522203060', 'latitude' => 33.5731, 'longitude' => -7.5898],
            ['nom' => 'Centre de Transfusion Sanguine Fes', 'ville' => 'Fès', 'adresse' => 'Avenue des FAR, Fès', 'telephone' => '0535623355', 'latitude' => 34.0181, 'longitude' => -5.0078],
            ['nom' => 'Centre de Transfusion Sanguine Marrakech', 'ville' => 'Marrakech', 'adresse' => 'Avenue Mohammed VI, Marrakech', 'telephone' => '0524337100', 'latitude' => 31.6295, 'longitude' => -7.9811],
            ['nom' => 'Centre de Transfusion Sanguine Agadir', 'ville' => 'Agadir', 'adresse' => 'Avenue du Prince Moulay Abdallah, Agadir', 'telephone' => '0528829030', 'latitude' => 30.4278, 'longitude' => -9.5981],
            ['nom' => 'Centre de Transfusion Sanguine Tanger', 'ville' => 'Tanger', 'adresse' => 'Boulevard Mohammed V, Tanger', 'telephone' => '0539322020', 'latitude' => 35.7595, 'longitude' => -5.8340],
            ['nom' => 'Centre de Transfusion Sanguine Meknes', 'ville' => 'Meknès', 'adresse' => 'Avenue des FAR, Meknès', 'telephone' => '0535403030', 'latitude' => 33.8935, 'longitude' => -5.5473],
            ['nom' => 'Centre de Transfusion Sanguine Oujda', 'ville' => 'Oujda', 'adresse' => 'Rue de Berkane, Oujda', 'telephone' => '0536688010', 'latitude' => 34.6805, 'longitude' => -1.9076],
            ['nom' => 'Centre de Transfusion Sanguine Kenitra', 'ville' => 'Kénitra', 'adresse' => 'Avenue Mohammed Diouri, Kénitra', 'telephone' => '0537375050', 'latitude' => 34.2541, 'longitude' => -6.5956],
            ['nom' => 'Centre de Transfusion Sanguine Laayoune', 'ville' => 'Laâyoune', 'adresse' => 'Avenue de la Mecque, Laâyoune', 'telephone' => '0528899010', 'latitude' => 27.1536, 'longitude' => -13.2033],
            ['nom' => 'Centre de Transfusion Sanguine Dakhla', 'ville' => 'Dakhla', 'adresse' => 'Avenue Mohammed V, Dakhla', 'telephone' => '0528933030', 'latitude' => 23.7136, 'longitude' => -15.9355],
            ['nom' => 'Centre de Transfusion Sanguine Beni Mellal', 'ville' => 'Béni Mellal', 'adresse' => 'Avenue Hassan II, Béni Mellal', 'telephone' => '0523423040', 'latitude' => 32.3373, 'longitude' => -6.3498],
        ];

        foreach ($centres as $centre) {
            Centre::create($centre);
        }
    }
}
