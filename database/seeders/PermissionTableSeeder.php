<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'Roles',
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           //Etudiant
           'Etudiant',
           'Etudiant-list',
           'Etudiant-create',
           'Etudiant-edit',
           'Etudiant-delete',
           //Ecole
           'AL Moltaka',
           'Ecole-list',
           'Ecole-create',
           'Ecole-edit',
           'Ecole-delete',
           //Employe
           'Employe',
           'Employe-list',
           'Employe-create',
           'Employe-edit',
           'Employe-delete',
           //Renumeration
           'Remuneration',
           'Remuneration-list',
           'Remuneration-create',
           'Remuneration-edit',
           'Remuneration-delete',
           //Dpense
           'Depense',
           'Depense-list',
           'Depense-create',
           'Depense-edit',
           'Depense-delete',
           'Depense-download',
           //Fournisseur
           'Fournisseur',
           'Fournisseur-list',
           'Fournisseur-create',
           'Fournisseur-edit',
           'Fournisseur-delete',
           //Frais
           'Frais',
           'Frais-list',
           'Frais-create',
           'Frais-edit',
           'Frais-delete',
           //Kilomatrage
            'Kilomatrage',
            'Kilomatrage-list',
            'Kilomatrage-create',
            'Kilomatrage-edit',
            'Kilomatrage-delete',
            //Profil
            'Profil',
            'Profil-list',
            'Profil-create',
            'Profil-edit',
            'Profil-delete',
            //Transport
            'Transport',
            'Transport-list',
            'Transport-create',
            'Transport-edit',
            'Transport-delete',
            //users
            'Utilisateur',
            'Utilisateur-list',
            'Utilisateur-create',
            'Utilisateur-edit',
            'Utilisateur-delete',
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
