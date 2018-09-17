<?php

use Illuminate\Database\Seeder;
use App\Noticia;

class Noticias extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
    /*Papeis*/Noticia::create([
        'titulo' => 'Papéis',
        'idpessoa' => '1',
        'descricao' => 'Todos os tipos são recicláveis, inclusive caixas do tipo longa-vida e de papelão. Não se deve reciclar papel com material orgânico, como caixas de pizza cheias de gordura, pontas de cigarro, fitas adesivas, fotografias, papéis sanitários e papel-carbono.',
        'imagem_name' => 'Papéis',
        'imagem_path' => config('app.noticias_storage').'/basic/papel.jpg',
    ]);
    /*Plastico*/Noticia::create([
        'titulo' => 'Plásticos',
        'idpessoa' => '1',
        'descricao' => '90% do lixo produzido no mundo são à base de plástico. Por isso, esse material merece uma atenção especial. Deve-se reciclar: sacos de supermercados, garrafas de refrigerante (pet), tampinhas.',
        'imagem_name' => 'Plásticos',
        'imagem_path' => config('app.noticias_storage').'/basic/plastico.jpg',
    ]);
    /*Vidros*/Noticia::create([
        'titulo' => 'Vidros',
        'idpessoa' => '1',
        'descricao' => 'Quando limpos e secos, todos são recicláveis, exceto lâmpadas, cristais, espelhos, vidros de automóveis ou temperados, cerâmica e porcelana.',
        'imagem_name' => 'Vidros',
        'imagem_path' => config('app.noticias_storage').'/basic/vidro.jpg',
    ]);
    /*Metais*/Noticia::create([
        'titulo' => 'Metais',
        'idpessoa' => '1',
        'descricao' => 'Além de todos os tipos de latas de alumínio, é possível reciclar tampinhas, pregos e parafusos. Atenção: clipes, grampos, canos e esponjas de aço devem ficar de fora.',
        'imagem_name' => 'Metais',

        'imagem_path' => config('app.noticias_storage').'/basic/metais.jpg',
    ]);
    /*Isopor*/Noticia::create([
        'titulo' => 'Isopor',
        'idpessoa' => '1',
        'descricao' => 'Ao contrário do que muita gente pensa, o isopor é reciclável. No entanto, esse processo não é economicamente viável. Por isso, é importante usar o isopor de diversas formas e evitar ao máximo o seu desperdício. Quando tiver que jogar fora, coloque na lata de plásticos. Algumas empresas transformam em matéria-prima para blocos de construção civil.',
        'imagem_name' => 'Isopor',
        'imagem_path' => config('app.noticias_storage').'/basic/isopor.jpg',
    ]);
}
}
