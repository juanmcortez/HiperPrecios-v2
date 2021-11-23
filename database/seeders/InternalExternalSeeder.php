<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories\InternalExternal;

class InternalExternalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // List of relations
        $relations = [
            [
                'internalParent'    => 1,
                'externalParent'    => 0,
                'externalName'      => 'Almacén',
                'externalSlug'      => 'almacén',
                'internalStoreID'   => 2,
            ],
            [
                'internalParent'    => 1,
                'externalParent'    => 1,
                'externalName'      => 'Aceites',
                'externalSlug'      => 'aceites',
                'internalStoreID'   => 2,
            ],
            [
                'internalParent'    => 1,
                'externalParent'    => 2,
                'externalName'      => 'Aceite de Girasol',
                'externalSlug'      => 'aceite-de-girasol',
                'internalStoreID'   => 2,
            ],
            [
                'internalParent'    => 1,
                'externalParent'    => 2,
                'externalName'      => 'Aceite de Maiz',
                'externalSlug'      => 'aceite-de-maiz',
                'internalStoreID'   => 2,
            ],
            [
                'internalParent'    => 1,
                'externalParent'    => 2,
                'externalName'      => 'Aceite de Oliva',
                'externalSlug'      => 'aceite-de-oliva',
                'internalStoreID'   => 2,
            ],
            [
                'internalParent'    => 1,
                'externalParent'    => 2,
                'externalName'      => 'Aceite Especiales',
                'externalSlug'      => 'aceite-especiales',
                'internalStoreID'   => 2,
            ],
            [
                'internalParent'    => 1,
                'externalParent'    => 2,
                'externalName'      => 'Aceite de Soja',
                'externalSlug'      => 'aceite-de-soja',
                'internalStoreID'   => 2,
            ],
            [
                'internalParent'    => 1,
                'externalParent'    => 2,
                'externalName'      => 'Aceites Mezcla',
                'externalSlug'      => 'aceites-mezcla',
                'internalStoreID'   => 2,
            ],
            [
                'internalParent'    => 1,
                'externalParent'    => 1,
                'externalName'      => 'Arroz',
                'externalSlug'      => 'arroz',
                'internalStoreID'   => 2,
            ],
            [
                'internalParent'    => 1,
                'externalParent'    => 9,
                'externalName'      => 'Arroces Especiales',
                'externalSlug'      => 'arroces-especiales',
                'internalStoreID'   => 2,
            ],
            [
                'internalParent'    => 1,
                'externalParent'    => 9,
                'externalName'      => 'Arroz integral',
                'externalSlug'      => 'arroz-integral',
                'internalStoreID'   => 2,
            ],
            [
                'internalParent'    => 1,
                'externalParent'    => 9,
                'externalName'      => 'Arroz',
                'externalSlug'      => 'arroz',
                'internalStoreID'   => 2,
            ],
            [
                'internalParent'    => 1,
                'externalParent'    => 0,
                'externalName'      => 'Almacén',
                'externalSlug'      => 'almacén',
                'internalStoreID'   => 3,
            ],
        ];

        // Iterate and create.
        foreach ($relations as $relation) {
            InternalExternal::factory()->create([
                'internalParent'    => $relation['internalParent'],
                'externalParent'    => $relation['externalParent'],
                'externalName'      => $relation['externalName'],
                'externalSlug'      => $relation['externalSlug'],
                'internalStoreID'   => $relation['internalStoreID'],
            ]);
        }
    }
}
