<?php

    namespace Database\Seeders;

    use App\Models\shortUrls;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;


    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run()
        {
            $data = [
                'a' => 'https://4read.org/1988-gogol-mikola-zapropascha-gramota.html',
                'b' => 'https://news.google.com/topstories?tab=rn&hl=uk&gl=UA&ceid=UA:uk',
                'c' => 'https://uk.wikipedia.org/wiki/%D0%94%D0%B6%D0%B5%D0%B9%D0%BC%D1%81_%D0%92%D0%B5%D0%B1%D0%B1_(%D1%82%D0%B5%D0%BB%D0%B5%D1%81%D0%BA%D0%BE%D0%BF)',
            ];

            foreach ($data as $short => $url) {
                shortUrls::insertUrl($url, $short, rand(1, 12));
            }
        }
    }


