<?php

use Illuminate\Database\Seeder;

class FaqDevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\FaqDev::truncate();

        \App\Models\FaqDev::create([
            "id"              => 1,
            "image_id"        => "24",
            "faq_parent_id"   => null,
            "group_l"         => true,
            "faq_code"        => "somesupperId",
            "faq_title"       => "Доступ к Кабинету клиента",
            "faq_description" => "",
            "faq_text"        => "",
            "actual_l"        => false,
            "deleted_l"       => false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        \App\Models\FaqDev::create([
            "id"              => 2,
            "image_id"        => "24",
            "faq_parent_id"   => null,
            "group_l"         => true,
            "faq_code"        => "somesupperId",
            "faq_title"       => "Общие вопросы по лизингу",
            "faq_description" => "",
            "faq_text"        => "",
            "actual_l"        => false,
            "deleted_l"       => false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        \App\Models\FaqDev::create([
            "id"              => 3,
            "image_id"        => "23",
            "faq_parent_id"   => 2,
            "group_l"         => false,
            "faq_code"        => "somesupperId",
            "faq_title"       => "Какие преимущества лизинга?",
            "faq_description" => "",
            "faq_text"        => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,",
            "actual_l"        => false,
            "deleted_l"       => false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        \App\Models\FaqDev::create([
            "id"              => 4,
            "image_id"        => "23",
            "faq_parent_id"   => 2,
            "group_l"         => false,
            "faq_code"        => "somesupperId",
            "faq_title"       => "Что можно приобрести в лизинг?",
            "faq_description" => "",
            "faq_text"        => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,",
            "actual_l"        => false,
            "deleted_l"       => false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        \App\Models\FaqDev::create([
            "id"              => 5,
            "image_id"        => "23",
            "faq_parent_id"   => 2,
            "group_l"         => false,
            "faq_code"        => "somesupperId",
            "faq_title"       => "Лизинговые продукты",
            "faq_description" => "",
            "faq_text"        => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,",
            "actual_l"        => false,
            "deleted_l"       => false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        \App\Models\FaqDev::create([
            "id"              => 6,
            "image_id"        => "23",
            "faq_parent_id"   => 2,
            "group_l"         => false,
            "faq_code"        => "somesupperId",
            "faq_title"       => "Какие документы нужно предоставить?",
            "faq_description" => "",
            "faq_text"        => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,",
            "actual_l"        => false,
            "deleted_l"       => false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        \App\Models\FaqDev::create([
            "id"              => 7,
            "image_id"        => "23",
            "faq_parent_id"   => 2,
            "group_l"         => false,
            "faq_code"        => "somesupperId",
            "faq_title"       => "Какие есть требования к лизингополучателю?",
            "faq_description" => "",
            "faq_text"        => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,",
            "actual_l"        => false,
            "deleted_l"       => false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        \App\Models\FaqDev::create([
            "id"              => 8,
            "image_id"        => "23",
            "faq_parent_id"   => 2,
            "group_l"         => false,
            "faq_code"        => "somesupperId",
            "faq_title"       => "Можно ли досрочно выкупить предмет лизинга?",
            "faq_description" => "",
            "faq_text"        => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,",
            "actual_l"        => false,
            "deleted_l"       => false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        \App\Models\FaqDev::create([
            "id"              => 9,
            "image_id"        => "23",
            "faq_parent_id"   => 2,
            "group_l"         => false,
            "faq_code"        => "somesupperId",
            "faq_title"       => "Как получить коммерческое предложение?",
            "faq_description" => "",
            "faq_text"        => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,",
            "actual_l"        => false,
            "deleted_l"       => false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        \App\Models\FaqDev::create([
            "id"              => 10,
            "image_id"        => "23",
            "faq_parent_id"   => 2,
            "group_l"         => false,
            "faq_code"        => "somesupperId",
            "faq_title"       => "Как заключаются договоры лизинга?",
            "faq_description" => "",
            "faq_text"        => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,",
            "actual_l"        => false,
            "deleted_l"       => false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        \App\Models\FaqDev::create([
            "id"              => 11,
            "image_id"        => "23",
            "faq_parent_id"   => 2,
            "group_l"         => false,
            "faq_code"        => "somesupperId",
            "faq_title"       => "Какой порядок регистрации предмета лизинга?",
            "faq_description" => "",
            "faq_text"        => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,",
            "actual_l"        => false,
            "deleted_l"       => false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        \App\Models\FaqDev::create([
            "id"              => 12,
            "image_id"        => "24",
            "faq_parent_id"   => null,
            "group_l"         => true,
            "faq_code"        => "somesupperId",
            "faq_title"       => "Заявка на лизинг",
            "faq_description" => "",
            "faq_text"        => "",
            "actual_l"        => false,
            "deleted_l"       => false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        \App\Models\FaqDev::create([
            "id"              => 13,
            "image_id"        => "24",
            "faq_parent_id"   => null,
            "group_l"         => true,
            "faq_code"        => "somesupperId",
            "faq_title"       => "Взаиморасчеты и первичная бухгалтерская документация",
            "faq_description" => "",
            "faq_text"        => "",
            "actual_l"        => false,
            "deleted_l"       => false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        \App\Models\FaqDev::create([
            "id"              => 14,
            "image_id"        => "24",
            "faq_parent_id"   => null,
            "group_l"         => true,
            "faq_code"        => "somesupperId",
            "faq_title"       => "Страхование и страховые случаи",
            "faq_description" => "",
            "faq_text"        => "Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. Маленький ручеек Даль журчит по всей стране и обеспечивает ее всеми необходимыми правилами. Эта парадигматическая страна, в которой жаренные члены предложения залетают прямо в рот. Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку. Он собрал семь своих заглавных букв, подпоясал инициал за пояс и пустился в дорогу. Взобравшись на первую вершину курсивных гор, бросил он последний взгляд назад, на силуэт своего родного города Буквоград, на заголовок деревни Алфавит и на подзаголовок своего переулка Строчка. Грустный риторический вопрос скатился по его щеке и он продолжил свой путь. По дороге встретил текст рукопись. Она предупредила его: «В моей стране все переписывается по несколько раз. Единственное, что от меня осталось, это приставка «и». Возвращайся ты лучше в свою безопасную страну». Не послушавшись рукописи, наш текст продолжил свой путь. Вскоре ему повстречался коварный составитель",
            "actual_l"        => false,
            "deleted_l"       => false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        \App\Models\FaqDev::create([
            "id"              => 15,
            "image_id"        => "24",
            "faq_parent_id"   => 14,
            "group_l"         => false,
            "faq_code"        => "somesupperId",
            "faq_title"       => "Страховой полис",
            "faq_description" => "",
            "faq_text"        => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,",
            "actual_l"        => false,
            "deleted_l"       => false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        \App\Models\FaqDev::create([
            "id"              => 16,
            "image_id"        => "24",
            "faq_parent_id"   => 14,
            "group_l"         => false,
            "faq_code"        => "somesupperId",
            "faq_title"       => "Что делать при ДТП?",
            "faq_description" => "",
            "faq_text"        => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,",
            "actual_l"        => false,
            "deleted_l"       => false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        \App\Models\FaqDev::create([
            "id"              => 17,
            "image_id"        => "24",
            "faq_parent_id"   => 14,
            "group_l"         => false,
            "faq_code"        => "somesupperId",
            "faq_title"       => "Что делать при угоне/хищении? ",
            "faq_description" => "",
            "faq_text"        => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,",
            "actual_l"        => false,
            "deleted_l"       => false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        \App\Models\FaqDev::create([
            "id"              => 18,
            "image_id"        => "24",
            "faq_parent_id"   => null,
            "group_l"         => true,
            "faq_code"        => "somesupperId",
            "faq_title"       => "Восстановление документов",
            "faq_description" => "",
            "faq_text"        => "",
            "actual_l"        => false,
            "deleted_l"       => false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);













        if(config("database.default") == "pgsql")
            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"faq_id_seq\"', 100, true)");
    }
}
