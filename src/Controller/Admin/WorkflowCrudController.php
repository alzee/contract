<?php

namespace App\Controller\Admin;

use App\Entity\Workflow;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class WorkflowCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Workflow::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
