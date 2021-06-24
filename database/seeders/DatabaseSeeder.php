<?php

namespace Database\Seeders;

use App\Models\FavPackages;
use App\Models\FavAccommodations;
use App\Models\PackageFeedback;
use App\Models\AccommodationFeedback;
use App\Models\PackageRes;
use App\Models\User;
use App\Models\AccommodationReservations;
use App\Models\Accommodation;
use App\Models\VacationPackages;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        AccommodationReservations::truncate();
        VacationPackages::truncate();
        Accommodation::truncate();
        User::truncate();
        PackageRes::truncate();
        AccommodationFeedback::truncate();
        PackageFeedback::truncate();
        FavPackages::truncate();
        FavAccommodations::truncate();
        DB::table('accommodations')->insert([
          'accommodation_name' => 'Dižkoki',
          'accommodation_city' => 'Bīriņi',
          'accommodation_address' => 'Vidriži Parish, LV-4013',
          'accommodation_price' => '80.00',
          'accommodation_description' => 'Šī vēsturiskā greznā viesnīca, kas celta 1860. gadā, atrodas pilī BĪrini Ezers krastā, 14 km attālumā no autoceļa E 67 un 15 km attālumā no Ledurgi dendrārija.',
          'accommodation_tags' => '#3guests #calmplace #waterfall #lake',
          'accommodation_type' => 'Residence',
          'start_date' => '2021-07-05',
          'end_date' => '2021-07-15',
          'image' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/150965774.jpg?k=4c687b922870ce4ac2108fff7933cb70cbb705a3949d67d3cd2eb3dd1749a261&o=&hp=1',
        ]);

       DB::table('accommodations')->insert([
          'accommodation_name' => 'Pie Maijas',
          'accommodation_city' => 'Saulkrasti',
          'accommodation_address' => 'Murjāņu iela 3, Saulkrasti, Saulkrastu pilsēta, LV-2160',
          'accommodation_price' => '40.00',
          'accommodation_description' => 'Esiet vienmēr gaidīti viesu namā „Pie Maijas”! Viesu nams ir iekārtots tā, lai atpūtniekiem piedāvātu mierīgu atpūtu un ļautu baudīt visas priekšsrocības.',
          'accommodation_tags' => '#2guests #sunnyspot #river',
          'accommodation_type' => 'Apartaments',
          'start_date' => '2021-07-21',
          'end_date' => '2021-07-24',
          'image' => 'https://cf.bstatic.com/images/hotel/max1024x768/475/47561092.jpg',
        ]);
       DB::table('accommodations')->insert([
         'accommodation_name' => 'Barona Apartamenti',
         'accommodation_city' => 'Liepāja',
         'accommodation_address' => ' Krišjāņa Barona iela 11, Liepāja, LV-3401',
         'accommodation_price' => '70.00',
         'accommodation_description' => 'Dzīvoklis Barona atrodas Liepājā, 500 metru attālumā no Liepājas pludmales un 400 metru attālumā no Spoku koka. No logiem paveras skats uz pilsētu. Ir pieejams bezmaksas wifi.',
         'accommodation_tags' => '#2guests #sunnyspot #river',
         'accommodation_type' => 'Apartaments',
         'start_date' => '2021-07-28',
         'end_date' => '2021-07-29',
         'image' => 'https://cf.bstatic.com/xdata/images/hotel/max500/103737369.jpg?k=430b20a23112edd341f0154638fd62783e8e5f6b0c0086e1344319f6627d2ee3&o=&hp=1',
        ]);
        $accommodation = new Accommodation();
        $accommodation->accommodation_name = 'Kundziņu salas viesu nams';
        $accommodation->accommodation_city = 'Limbažu novads';
        $accommodation->accommodation_address = 'Vidzeme, Limbažu novads, 55 km no Rīgas';
        $accommodation->accommodation_price = '164.00';
        $accommodation->accommodation_description = '"Kundziņu salas" - vieta, kurā apstājas laiks un iespēja aizmirst ikdienas steigu un pilsētas kņadu! Lauku miers un klusums tikai stundas braucienā no Rīgas centra.';
        $accommodation->accommodation_tags = '#4guests #forest #calmplace';
        $accommodation->accommodation_type = 'Hotel';
        $accommodation->start_date = '2021-08-24';
        $accommodation->end_date = '2021-09-12';
        $accommodation->image = URL::asset('https://www.kundzinusalas.lv/uploads/s8dKNI5y/767x0_2560x0/kundzinu-salas-pirts-maja-zagatas-01.jpg');
        $accommodation->save();

        $accommodation = new Accommodation();
        $accommodation->accommodation_name = 'Saulgoži viesu nams';
        $accommodation->accommodation_city = 'Saulgoži';
        $accommodation->accommodation_address = 'Sējas novads, Saulgoži';
        $accommodation->accommodation_price = '64.00';
        $accommodation->accommodation_description = 'Piedāvājam 2 pirts mājas - Lielo pirti un Jauno pirti.Lielajā pirtī atrodas kamīnzāle kurā var ietilpināt līdz 60 personām. Vasarā iespējams lielāks cilvēku skaits.Jaunajā pirtī ietilps līdz 20 personām.';
        $accommodation->accommodation_tags = '#5guests #forest #calmplace #sea #beach #goodlocation';
        $accommodation->accommodation_type = 'Hotel';
        $accommodation->start_date = '2021-07-24';
        $accommodation->end_date = '2021-07-25';
        $accommodation->image = URL::asset('https://viesunamiem.lv/content/images/object/4794.jpg');
        $accommodation->save();

        $accommodation = new Accommodation();
        $accommodation->accommodation_name = 'Jaundzērvītes viesu nams';
        $accommodation->accommodation_city = 'Brenguļu pagasts';
        $accommodation->accommodation_address = 'Beverīnas novads, Brenguļu pagasts';
        $accommodation->accommodation_price = '44.78';
        $accommodation->accommodation_description = 'Netālu no Valmieras, simtgadīgu ozolu ieskauta Abula upes krastā atrodas viesu nams "Jaundzērvītes".';
        $accommodation->accommodation_tags = '#forcouples #park #calmplace';
        $accommodation->accommodation_type = 'Hotel';
        $accommodation->start_date = '2021-06-30';
        $accommodation->end_date = '2021-07-01';
        $accommodation->image = URL::asset('https://lh3.googleusercontent.com/proxy/pwlxOic4rUMNkdGavu8t4GgIX4nEVGuqkpLAvXArX3dYdW68j7PiYghvGWoLharhSPtLEH4oMEFx3Vy9k1Mvg37CDfFam8cWfFWR_cjn2AKdZDlFeC9ullktGQ');
        $accommodation->save();

        $accommodation = new Accommodation();
        $accommodation->accommodation_name = 'Kārumnieki viesu nams';
        $accommodation->accommodation_city = 'Sigulda';
        $accommodation->accommodation_address = 'Siguldas novads, 50 km no Rīgas';
        $accommodation->accommodation_price = '30.00';
        $accommodation->accommodation_description = 'Viesu nama pirmajā stāvā atrodas ar malku kurināma pirts, svinību zāle ar kamīnu, labiekārtota virtuve silto un auksto ēdienu pagatavošanai.';
        $accommodation->accommodation_tags = '#6guests #party #smokingarea #goodlocation';
        $accommodation->accommodation_type = 'Hotel';
        $accommodation->start_date = '2021-06-10';
        $accommodation->end_date = '2021-06-12';
        $accommodation->image = URL::asset('https://viesunamiem.lv/content/images/object/56980.jpg');
        $accommodation->save();

        $accommodation = new Accommodation();
        $accommodation->accommodation_name = 'Vecmuiža viesu nams';
        $accommodation->accommodation_city = 'Salacgrīvas novads';
        $accommodation->accommodation_address = 'Vidzeme, Salacgrīvas novads, 60 km no Rīgas';
        $accommodation->accommodation_price = '74.50';
        $accommodation->accommodation_description = 'Viesu nams "Vecmuiža" ir viena no senākajām muižām Vidzemē un rakstos tā jau ir minēta 1403.g. Mēs atrodamies skaista meža ielokā, tikai 3 km attālumā no jūras.';
        $accommodation->accommodation_tags = '#1guest #calm #citycenter #goodlocation';
        $accommodation->accommodation_type = 'Homestays';
        $accommodation->start_date = '2021-07-01';
        $accommodation->end_date = '2021-07-05';
        $accommodation->image = URL::asset('https://viesunamiem.lv/content/images/object/54702.jpg');
        $accommodation->save();

        $accommodation = new Accommodation();
        $accommodation->accommodation_name = 'Agave un vasaras māja Stallis viesu nams';
        $accommodation->accommodation_city = 'Vecžīguri';
        $accommodation->accommodation_address = ' Līgatnes novads, Vecžīguri';
        $accommodation->accommodation_price = '104.50';
        $accommodation->accommodation_description = 'Viesu nams "Agave" un vasaras māja "Stallis" atrodas Līgatnes novadā (7 km no Augšlīgatnes). Skaistā, klusā, ainaviskā vietā. (Gaujas nacionālā parka teritorijā). Viesiem piedāvājām ērtus numuriņus, skaistu 100 m2 zāli (TV un mūzikas centru), labiekārtotu virtuvi, pirti, apkurināmu baļļu ar zemūdens masāžu un peldi dīķi kā arī vasaras sezonā (no maija līdz oktobrim) eko naktsmītnes - īsta lauku vasaras mājā "Stallis".';
        $accommodation->accommodation_tags = '#5guests #forest #calmplace';
        $accommodation->accommodation_type = 'Homestays';
        $accommodation->start_date = '2021-07-24';
        $accommodation->end_date = '2021-07-24';
        $accommodation->image = URL::asset('https://viesunamiem.lv/content/images/object/56048.jpg');
        $accommodation->save();

        DB::table('accommodations')->insert([
          'accommodation_name' => 'Viesu nams, krogs Ventspilī',
          'accommodation_city' => 'Ventspils',
          'accommodation_address' => 'Tirgus iela 11, Ventspils, LV-3601',
          'accommodation_price' => '50.00',
          'accommodation_description' => 'Ne visiem zināms, ka ēka, kurā atrodas Zītaru krogs un viesu nams, ir senatnes elpas ieskauta. Mūra ēka Tirgus ielā 11 uzskatāma par vienu no vecākajiem namiem Ventspilī.',
          'accommodation_tags' => '#2guests #citycenter #sea',
          'accommodation_type' => 'Bed & Breakfasts',
          'start_date' => '2021-07-12',
          'end_date' => '2021-07-15',
          'image' => URL::asset('https://www.celotajs.lv/g/Accomm/Latvia/Kurzeme/668/IMG_9921.JPG?size=640'),
        ]);
        DB::table('vacation_packages')->insert([
          'package_name' => 'Lidojums ar lidmašīnu virs Rīgas diviem',
          'package_city' => 'Rīga',
          'package_address' => 'Lidlauks “Spilve”, Daugavgrīvas iela 140, Rīga, LV-1007',
          'package_price' => '89.00',
          'package_description' => 'Dodieties lidojuma piedzīvojumā virs Rīgas! Lidojuma maršrutu varēsiet izvēlēties paši, saskaņojot to ar pilotu. Prasmīgs un profesionāls pilots parūpēsies, lai no lidojuma Jūs gūtu tikai vislabākās emocijas. Izbaudiet neaizmirstamas sajūtas, kā arī novērtējiet iespaidīgos skatus no putna lidojuma. Pacelšanās virs Rīgas var būt gan romantiska dāvana pārim vai vienkāršs piedzīvojums ar draugiem. Izvēlies Tu!',
          'package_tags' => '#extreme #brieftaking',
          'package_type' => 'Extreme',
          'date' => '2021-07-01',
          'image' => URL::asset('https://cdn.davanuserviss.lv/cache/images/861f1b2af8026eb5548d11ed9deee490.jpg'),
        ]);

        DB::table('vacation_packages')->insert([
          'package_name' => 'SUP dēļa diennakts noma',
          'package_city' => 'Tukums',
          'package_address' => 'Progresa iela 17, Tukums',
          'package_price' => '14.99',
          'package_description' => 'Latvijas, jo mūsu valsts ir bagāta ar ūdens resursiem un jaunā atpūtas nodarbe iespējama gan pa ezeriem, gan upēm, gan jūru. Tas būs aizraujoši, veselīgi un neaizmirstami!',
          'package_tags' => '#active #wateractivity',
          'package_type' => 'Sport and Activities',
          'date' => '2021-07-19',
          'image' => URL::asset('https://d2x6revg5j08bs.cloudfront.net/files/uploaded/programs/8020906020_71457e89f4_z_20171114162354973.jpeg'),
        ]);

       DB::table('vacation_packages')->insert([
         'package_name' => 'Brauciens ar ūdens motociklu (1-2 pers./1 motocikls, 40min)',
         'package_city' => 'Engures novads',
         'package_address' => 'Klapkalnciema jūrmala, Engures novads',
         'package_price' => '59.40',
         'package_description' => 'Dodieties izbaudīt ūdens priekus, traucoties ar ūdensmotociklu! Sajūtiet brīvību un adrenalīnu! Brauciens ar ūdens motociklu ir ne tikai jautra vizināšanās pa viļņiem, bet arī elpu aizraujošs “lidojums” ar krietnu adrenalīna devu. Dāvini sauli, vēju, ūdens troksni un bezgalīgu horizontu – lūk, brīvības garša!',
         'package_tags' => '#2person #1person #active #ride #extreme',
         'package_type' => 'Sport and Activities',
         'date' => '2021-06-15',
         'image' => URL::asset('https://cdn.davanuserviss.lv/public/photos/products/09/90/51/23492_photo_xl.jpg'),
        ]);

        DB::table('vacation_packages')->insert([
          'package_name' => 'Vasarīgais pieneņu SPA rituāls salonā „MySPA“',
          'package_city' => 'Rīga',
          'package_address' => 'Lāčplēša iela 27, Rīga',
          'package_price' => '45.00',
          'package_description' => 'Šī procedūra palīdzēs Jums sajust vasaras atmosfēru jebkurā gada laikā! Vasaras elpa un eko-rituāla ārstejošais spēks dos Jums papildus enerģiju un uzlabos garastāvokli.',
          'package_tags' => '#relax #selfcare #spa',
          'package_type' => 'Relax and selfcare',
          'date' => '2021-06-27',
          'image' => URL::asset('https://www.davanusala.lv/64489-large_default/vasarigais-pienenu-spa-rituals-salona-myspa-riga.jpg'),
         ]);

         DB::table('vacation_packages')->insert([
           'package_name' => 'Komandas sadarbības spēle „EscapeTown 1942“',
           'package_city' => 'Krimuldas novads',
           'package_address' => '„EscapeTown 1942”, „Auči", Krimuldas novads',
           'package_price' => '80.00',
           'package_description' => '„EscapeTown’’ 1942 ir aizraujoša komandas sadarbības spēle, kuras darbība norisinās vairākus hektārus lielā, 2.pasaules kara tematikā izveidotā spēles laukumā.',
           'package_tags' => '#braingame #game #teamgame',
           'package_type' => 'Sport and Activities',
           'date' => '2021-06-30',
           'image' => URL::asset('https://www.davanusala.lv/64020-thickbox_default/aizraujoss-komandas-sadarbibas-kvests-dr-astonkajis-no-escape-town-1942.jpg'),
          ]);

          DB::table('vacation_packages')->insert([
            'package_name' => 'Svētā Grāla nolaupīšana kvests bērniem',
            'package_city' => 'Rīga',
            'package_address' => '„Mysteria”, Brīvības iela 158',
            'package_price' => '70.00',
            'package_description' => 'Šajā stāstā jūsu bērni kļūs par laupītājiem! Un nevis vienkārši par laupītājiem, bet gan par mūkiem no slepenas biedrības. Nolaupīs viņi neko citu kā –Svēto Grālu. Vēsturiska piedzīvojumu spēle bērniem vecumā no 6-12 gadiem.',
            'package_tags' => '#braingame #game #teamgame #kids',
            'package_type' => 'Sport and Activities',
            'date' => '2021-06-23',
            'image' => URL::asset('https://www.davanusala.lv/8906-thickbox_default/mysteria-kvestu-istaba-sveta-grala-nolaupisana.jpg'),
           ]);
           DB::table('vacation_packages')->insert([
             'package_name' => 'Lidojums ar gaisa balonu',
             'package_city' => 'Jelgava',
             'package_address' => 'Jelgavas centrs',
             'package_price' => '180.00',
             'package_description' => 'Izbaudi pastaigu mākoņos, slīdot vienā solī ar vēju pāri koku galotnēm, kādā no Latvijas skaistākajām apskates vietām. Lidojuma laikā Jums būs iespēja piedzīvot neaprakstāmas emocijas un izbaudīt debesu burvību. Ļaujies neaizmirstamam piedzīvojumam, vērojot ikdienas dzīvi no augšas!',
             'package_tags' => '#beautifulview #brieftaking',
             'package_type' => 'Extreme',
             'date' => '2021-06-30',
             'image' => URL::asset('https://d2x6revg5j08bs.cloudfront.net/files/uploaded/programs/6f8ff91f4db644748ab176a5f628c34d.jpeg'),
            ]);
            DB::table('vacation_packages')->insert([
              'package_name' => 'Airsoft izklaide',
              'package_city' => 'Rīga',
              'package_address' => '“Airsoft Izklaide”, Avotu iela 64',
              'package_price' => '29.00',
              'package_description' => 'Airsofts (airsoft) ir komandu sporta veids jeb militāras simulācijas spēle. Airsoft pamatā lieto kaujas ieroču kopijas, kas šauj ar 6mm plastmasas lodītēm. No airsoft šauteņu lodītēm neizdalās nekāda krāsa, tādēļ airsofts ir spēle uz godīgumu un katram tās dalībniekam pašam ir jākonstatē trāpījums.',
              'package_tags' => '#game #teamgame #airsoft',
              'package_type' => 'Sport and Activities',
              'date' => '2021-07-14',
              'image' => URL::asset('https://www.fromme.lv/files/gifts/open_new/img_9891_1000x6663.jpg'),
             ]);
             DB::table('vacation_packages')->insert([
               'package_name' => 'SPA procedūra zemeņu un šokolādes baudītājiem',
               'package_city' => 'Rīga',
               'package_address' => 'Salons „MySPA“, Lāčplēša iela 27',
               'package_price' => '39.99',
               'package_description' => 'Šī pusotru stundu procedūra - patīkams veids kā padarīt Jūsu ādu skaistu un veselu, kā arī atpūsties un atslēgties no ikdienas problēmām. Masāža ar dabiskās šokolādes maskas izmantošanu tonizē, mitrina un baro ādu, un zemeņu skrubis lieliski attīra to! ',
               'package_tags' => '#spa #relax',
               'package_type' => 'Relax and selfcare',
               'date' => '2021-06-23',
               'image' => URL::asset('https://www.davanusala.lv/64491-large_default/aromatiska-spa-procedura-sokolade-salona-myspa.jpg'),
              ]);
              DB::table('vacation_packages')->insert([
                'package_name' => 'Sāls istabas apmeklējums un skābekļa kokteilis diviem',
                'package_city' => 'Salaspils',
                'package_address' => 'Sāls istaba, Līvzemes iela 22/4, 2.st.',
                'package_price' => '22.00',
                'package_description' => 'Stipriniet imunitāti un izbaudiet sāls terapiju, kas izsenis ir zināma kā efektīva metode imunitātes stiprināšanai, jo tās īpašais mikroklimats rada iedarbību, kas pozitīvi ietekmē kā ķermeni, tā arī garu.',
                'package_tags' => '#relax #drinks #2person',
                'package_type' => 'Relax and selfcare',
                'date' => '2021-07-05',
                'image' => URL::asset('https://www.gribuatpusties.lv/uploads/offergroup/000/948/image2/pegasa-pils-spa-hotel-viesnicas-jurmala-1916.jpeg'),
               ]);

        DB::table('users')->insert([
          'name' => 'katerina09',
          'email' => 'katjakatja@inbox.lv',
          'password' => '00000009',
         ]);
        DB::table('users')->insert([
           'name' => 'ilja33',
           'email' => 'kitt.kitt1488@mail.ru',
           'password' => '000000033',
          ]);
        DB::table('users')->insert([
            'name' => 'sofija88',
            'email' => 'sdanilevicha@gmail.com',
            'password' => '000000088',
           ]);
        DB::table('users')->insert([
           'name' => 'marcispinups',
           'email' => 'marcispinups@inbox.lv',
           'password' => '00000000',
            ]);
        DB::table('users')->insert([
            'name' => 'kitijazubite',
            'email' => 'kitijazubite@outlook.com',
            'password' => '000000088',
              ]);
        DB::table('users')->insert([
            'name' => 'zanefreimane',
            'email' => 'zanefreimane@gmail.com',
            'password' => '000000088',
              ]);
        DB::table('users')->insert([
            'name' => 'fifi08',
            'email' => 'fifi@gmail.com',
            'password' => '000000008',
              ]);
        DB::table('users')->insert([
            'name' => 'armandspetaska98',
            'email' => 'armandspetaska1998@gmail.com',
            'password' => '00000008',
              ]);
        DB::table('users')->insert([
            'name' => 'anatolijslevsa',
            'email' => 'anatolijslevsa1958@gmail.com',
            'password' => '00000008',
              ]);
        DB::table('users')->insert([
            'name' => 'aivarsuzols',
            'email' => 'aivarsuzols@gmail.com',
            'password' => '00000008',
              ]);
        DB::table('users')->insert([
            'name' => 'ligakurosa2001',
            'email' => 'ligaliga@mail.ru',
            'password' => '00000008',
              ]);
        DB::table('users')->insert([
            'name' => '0guntiskuross9',
            'email' => 'guntisk@outlook.com',
            'password' => '00000008',
              ]);

        DB::table('accommodation_reservations')->insert([
            'start_date' => '2021-07-05',
            'end_date' => '2021-07-15',
            'accommodation_id' => 1,
            'user_id' => 2,
              ]);
        DB::table('accommodation_reservations')->insert([
            'start_date' => '2021-06-10',
            'end_date' => '2021-06-12',
            'accommodation_id' => 7,
            'user_id' => 5,
              ]);
        DB::table('accommodation_reservations')->insert([
            'start_date' => '2021-08-24',
            'end_date' => '2021-09-12',
            'accommodation_id' => 4,
            'user_id' => 8,
              ]);
        DB::table('accommodation_reservations')->insert([
            'start_date' => '2021-07-24',
            'end_date' => '2021-07-24',
            'accommodation_id' => 9,
            'user_id' => 9,
              ]);

        DB::table('package_res')->insert([
            'date' => '2021-07-05',
            'package_id' => 10,
            'user_id' => 6,
              ]);
        DB::table('package_res')->insert([
            'date' => '2021-06-23',
            'package_id' => 9,
            'user_id' => 7,
              ]);

        DB::table('package_res')->insert([
            'date' => '2021-07-14',
            'package_id' => 8,
            'user_id' => 1,
              ]);
        DB::table('package_res')->insert([
            'date' => '2021-06-15',
            'package_id' => 3,
            'user_id' => 3,
              ]);
        DB::table('package_res')->insert([
            'date' => '2021-06-30',
            'package_id' => 7,
            'user_id' => 2,
              ]);

        DB::table('fav_accommodations')->insert([
            'accommodation_id' => 4,
            'user_id' => 1,
              ]);

        DB::table('fav_accommodations')->insert([
            'accommodation_id' => 4,
            'user_id' => 3,
              ]);

        DB::table('fav_accommodations')->insert([
           'accommodation_id' => 5,
           'user_id' => 3,
              ]);
        DB::table('fav_accommodations')->insert([
            'accommodation_id' => 1,
            'user_id' => 5,
              ]);
        DB::table('fav_accommodations')->insert([
            'accommodation_id' => 9,
            'user_id' => 5,
              ]);

        DB::table('fav_packages')->insert([
            'package_id' => 7,
            'user_id' => 1,
              ]);
        DB::table('fav_packages')->insert([
            'package_id' => 2,
            'user_id' => 1,
              ]);
        DB::table('fav_packages')->insert([
            'package_id' => 5,
            'user_id' => 1,
              ]);
        DB::table('fav_packages')->insert([
            'package_id' => 4,
            'user_id' => 1,
              ]);
        DB::table('fav_packages')->insert([
            'package_id' => 4,
            'user_id' => 3,
              ]);


        DB::table('package_feedback')->insert([
            'package_id' => 4,
            'user_id' => 1,
            'rate' => 5,
            'feedback_description' => 'Viss patika!',
              ]);
        DB::table('package_feedback')->insert([
            'package_id' => 4,
            'user_id' => 4,
            'rate' => 1,
            'feedback_description' => 'Nebija interesanti',
              ]);

        DB::table('package_feedback')->insert([
            'package_id' => 6,
            'user_id' => 3,
            'rate' => 5,
            'feedback_description' => 'Perfekti!',
              ]);
        DB::table('package_feedback')->insert([
            'package_id' => 8,
            'user_id' => 2,
            'rate' => 3,
            'feedback_description' => 'Nuostabi vieta vaikams, šeimai 😊 galima ne tik pažaisti, bet ir skaniai pavalgyti 😊',
              ]);
        DB::table('package_feedback')->insert([
            'package_id' => 7,
            'user_id' => 1,
            'rate' => 4,
            'feedback_description' => 'Good place for fun to all !',
              ]);

        DB::table('package_feedback')->insert([
            'package_id' => 6,
            'user_id' => 6,
            'rate' => 1,
            'feedback_description' => 'Neapmierina cena.',
              ]);

        DB::table('package_feedback')->insert([
            'package_id' => 9,
            'user_id' => 12,
            'rate' => 2,
            'feedback_description' => '',
              ]);
        DB::table('package_feedback')->insert([
            'package_id' => 10,
            'user_id' => 1,
            'rate' => 5,
            'feedback_description' => '',
              ]);

        DB::table('package_feedback')->insert([
            'package_id' => 3,
            'user_id' => 11,
            'rate' => 5,
            'feedback_description' => '',
                ]);

        DB::table('package_feedback')->insert([
            'package_id' => 2,
            'user_id' => 9,
            'rate' => 4,
            'feedback_description' => 'Nice place for children and families.',
                ]);
        DB::table('package_feedback')->insert([
            'package_id' => 1,
            'user_id' => 2,
            'rate' => 5,
            'feedback_description' => 'very beautiful town nice clean tourist actration place 😀',
                ]);

        DB::table('accommodation_feedback')->insert([
            'accommodation_id' => 4,
            'user_id' => 3,
            'rate' => 4,
            'feedback_description' => 'Viss patika!',
                ]);
        DB::table('accommodation_feedback')->insert([
            'accommodation_id' => 4,
            'user_id' => 4,
            'rate' => 1,
            'feedback_description' => 'Nebija interesanti',
                ]);

      DB::table('accommodation_feedback')->insert([
            'accommodation_id' => 6,
            'user_id' => 3,
            'rate' => 5,
            'feedback_description' => 'Perfekti!',
                ]);
      DB::table('accommodation_feedback')->insert([
            'accommodation_id' => 8,
            'user_id' => 2,
            'rate' => 3,
            'feedback_description' => 'Nuostabi vieta vaikams, šeimai 😊 galima ne tik pažaisti, bet ir skaniai pavalgyti 😊',
                ]);
      DB::table('accommodation_feedback')->insert([
            'accommodation_id' => 1,
            'user_id' => 1,
            'rate' => 2,
            'feedback_description' => 'Zinu, ka atsauksme iespējams tiks izdzēsta, taču teikšu īsi un konkrēti-neiesaku. Jā, skats skaists(zāle nepļauta), mājiņas svaigas(galīgi nolietotas), tīrs ūdens namiņā(baltā krāsā un vienos kaļķos), ārā pieejami galdiņi(nolietoti), ir pieejamas 6 guļamvietas( tīri teorētiski jā, bet es vairāk teiktu 4, jo vēl 2 ir otrajā stāvā pa ļoti aizdomīgām un nedrošām kāpnēm, klusa vieta? Apkārt klaiņo sieviete, pievienojas visām sarunām, kas ir un nav tēmētas viņai(vienvārdsakot, nav reāli tikt vaļā), viesmīlīga saimniece? Galda piederumi? Sakoptas istabiņas? Normāla peldvieta? Laivas? Galīgi nē. Iespējams tikai piekasos.',
              ]);

      DB::table('accommodation_feedback')->insert([
            'accommodation_id' => 2,
            'user_id' => 6,
            'rate' => 5,
            'feedback_description' => 'Man ar ļoti viss patika. Paldies!',
              ]);

      DB::table('accommodation_feedback')->insert([
            'accommodation_id' => 3,
            'user_id' => 12,
            'rate' => 5,
            'feedback_description' => 'Lieliska vieta. Plašs un tāls apvārksnis, tākāa nav iespējams karoti aizspraust aiz tā.',
              ]);
      DB::table('accommodation_feedback')->insert([
            'accommodation_id' => 4,
            'user_id' => 1,
            'rate' => 5,
            'feedback_description' => 'Katru gadu šeit braucam svinēt Jāņus. Viesmīlīga uzņemšana un ļoti sakārtota teritorija..Noteikti iesaku',
              ]);

      DB::table('accommodation_feedback')->insert([
            'accommodation_id' => 5,
            'user_id' => 11,
            'rate' => 1,
            'feedback_description' => 'Neiesaku sadarbību. Rezervēju vairākus mēnešus iepriekš uz Līgo svētkiem. Labi ka pati zvaniju lai pātliecinātos vai viss spēkā- saimniece pateica ka vienkārši atdēvusi citiem un ja nepazvanīstu, aizbrauktu un paliktu garu degunu. Ļoti rupji, esmu šokā, palieku bez svētku vietas tik tuvu datumiem!!!',
              ]);

      DB::table('accommodation_feedback')->insert([
            'accommodation_id' => 6,
            'user_id' => 9,
            'rate' => 3,
            'feedback_description' => 'Место красивое, но уборки нет. Везде пыль, паутина и насекомые. В ванной грибок и вонючая вода. Рыбы нет.',
              ]);
      DB::table('accommodation_feedback')->insert([
            'accommodation_id' => 7,
            'user_id' => 2,
            'rate' => 5,
            'feedback_description' => 'Шикарное место, вкусно, обслуживание вежливое и быстрое!',
              ]);

      DB::table('accommodation_feedback')->insert([
            'accommodation_id' => 8,
            'user_id' => 11,
            'rate' => 4,
            'feedback_description' => 'Ļoti jauka vieta un superīga saimniece!',
              ]);
      DB::table('accommodation_feedback')->insert([
            'accommodation_id' => 9,
            'user_id' => 9,
            'rate' => 5,
            'feedback_description' => 'Regulāri braucu tur makšķerēt. Izcila cope! Superīgas karpas! Cena adekvāta! Sakārtota vide! Fantastiska saimniece un saimnieks! Ļoti laipni, atsaucīgi, draudzīgi! Protams, ir jāievēro noteikumi un tas ir pašsaprotami! Noteikti braukšu vēl!',
              ]);
      DB::table('accommodation_feedback')->insert([
            'accommodation_id' => 1,
            'user_id' => 2,
            'rate' => 1,
            'feedback_description' => 'Īpašniece vienkārši briesmīga ! Attieksme pret darbiniekiem nievājoša , izturās kā vergu laikos . Nesamaksā to pašu niecīgo nopelnīto aldziņu , savus solījumus nepilda . Ļoti daudzus cilvēkus , kas strādājuši pie viņas ir piekrāpusi , un joprojām turpina to darīt . Kauna traips Aumeisteros ! Kāda apkārtne nesakopta pašā ciematiņa centrā . Cilvēki , apdomājiet labi pirms izvēlaties nakšņot šajā viesu namā !!!',
              ]);



          }
}
