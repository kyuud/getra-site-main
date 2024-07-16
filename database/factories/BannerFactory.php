<?php

    /** @var \Illuminate\Database\Eloquent\Factory $factory */

    use App\Models\Painel\Banner;
    use Faker\Generator as Faker;

    # ATRIBUI A FUNÇÃO A VARIÁVEL
    $autoIncrement = autoIncrement();

    # CRIA A FACTORY
    $factory->define(Banner::class, function (Faker $faker) use ($autoIncrement) {

        $autoIncrement->next();

        return [
            'title'       => $faker->name,
            'position'    => $autoIncrement->current(),
            'url'         => $faker->url,
            'image'       => '202001301451185e331796093df.png',
            'description' => $faker->text,
            'status'      => $faker->boolean
        ];
    });

    # CRIAR UMA SEQUENCIA NUMÉRICA ATÉ 1000
    function autoIncrement()
    {
        for ($i = 0; $i < 1000; $i++) {
            yield $i;
        }
    }
