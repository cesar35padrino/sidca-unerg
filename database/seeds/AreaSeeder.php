<?php

use Illuminate\Database\Seeder;
use App\Area;

class AreaSeeder extends Seeder
{
    public function run()
    {
        $areas = [
        	'CIENCIAS DE LA SALUD'					=>	'ACS',
        	'CIENCIAS ECONOMICAS'					=>	'ACES',
        	'INGENIERIA DE SISTEMAS'				=>	'AIS',
        	'INGENIERIA, ARQUITECTURA Y TECNOLOGIA'	=>	'AIAT',
        	'INGENIERIA AGRONOMICA'					=>	'AIA',
        	'CIENCIAS POLITICAS Y JURIDICAS'		=>	'ACP',
        	'AREA DE MEDICINA VETERINARIA'			=>	'AMV',
        	'HUMANIDADES, LETRAS Y ARTE'			=>	'AHLA',
        	'CIENCIAS ODONTOLOGICAS'				=>	'ACO',
        	'CIENCIAS DE LA EDUCACION'				=>	'ACE',
        	'PROGRAMA NACIONAL DE FORMACION'		=>	'PNF',
        	'FISIOTERAPIA'							=>	'PNF-FI',
        	'TERAPIA OCUPACIONAL'					=>	'PNF-TE',
        	'HISTORIA'								=>	'PNF-HI',	
        	'NUTRICION Y DIETETICA'					=>	'PNF-NU',
        	'HISTOCITOTECNOLOA'						=>	'PNF-HT',
        	'OPTOMETRIA Y OPTICA'					=>	'PNF-OP',
        	'EDUCACION CONTINUA'					=>	'DEC',
        ];

        foreach ($areas as $area => $codigo) {
        	$A = Area::create(
        		[
		        	'area'			=>	$area,
			        // 'nuclei_id'		=>	'',
			        // 'dean'			=>	'',
			        'code'			=>	$codigo,
			        // 'resolution'	=>	'',
        		]
        	);
        }

    }
}
