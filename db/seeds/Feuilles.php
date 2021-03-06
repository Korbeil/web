<?php

use Afup\Site\Corporate\Feuille;
use Phinx\Seed\AbstractSeed;

class Feuilles extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'id' => Feuille::ID_FEUILLE_HEADER,
                'id_parent' => 0,
                'nom' => 'Zone "header"',
                'lien' => '/',
                'alt' => '',
                'position' => 9,
                'date' => 978303600,
                'etat' => -1,
                'image' => null,
                'patterns' => null,
            ],
            [
                'id' => 24,
                'id_parent' => Feuille::ID_FEUILLE_HEADER,
                'nom' => 'Actualités',
                'lien' => '/news',
                'alt' => '',
                'position' => 0,
                'date' => 1254002400,
                'etat' => 1,
                'image' => null,
                'patterns' => "#/news/\d*-.*#",
            ],
            [
                'id' => 44,
                'id_parent' => Feuille::ID_FEUILLE_HEADER,
                'nom' => 'Vidéos',
                'lien' => '/talks',
                'alt' => '',
                'position' => 5,
                'date' => 1418770800,
                'etat' => 1,
                'image' => null,
                'patterns' => null,
            ],
            [
                'id' => 88,
                'id_parent' => Feuille::ID_FEUILLE_HEADER,
                'nom' => 'Boutique',
                'lien' => 'http://shop.afup.org',
                'alt' => '',
                'position' => 7,
                'date' => 1539727200,
                'etat' => 1,
                'image' => null,
                'patterns' => null,
            ],
        ];

        $table = $this->table('afup_site_feuille');
        $table->truncate();

        $table
            ->insert($data)
            ->save()
        ;
    }
}
