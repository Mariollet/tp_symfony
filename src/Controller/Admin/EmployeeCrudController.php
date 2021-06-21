<?php

namespace App\Controller\Admin;

use App\Entity\Employee;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;

class EmployeeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Employee::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('un employé')
            ->setEntityLabelInPlural('Les employés');
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('Services'));
    }

    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('service', 'Service');
        yield TextField::new('name', 'Prenom');
        yield TextField::new('lastName', 'Nom');
        yield TextField::new('job', 'Job');
        yield TextEditorField::new('bio', 'Bio')
            ->hideOnIndex();
        yield ImageField::new('photo')
            ->setBasePath('uploads/')
            ->setUploadDir('public/uploads/')
            ->setFormType(FileUploadType::class);
    }
}
