<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield
            TextField::new('username')->OnlyWhenUpdating()->setFormTypeOptions(['disabled' => 'disabled']);
        yield TextField::new('username')->HideWhenUpdating();
        yield ChoiceField::new('roles')
            ->setChoices([
                'Marketing' => 'ROLE_MARKEING',
                'Finance' => 'ROLE_FINANCE',
                'General' => 'ROLE_GENERAL',
                'Business' => 'ROLE_BUSINESS',
                'Admin' => 'ROLE_ADMIN',
            ])
            ->allowMultipleChoices()
            // ->onlyOnIndex()
        ;
    }
}
