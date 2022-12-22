<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Entity\Contract;
use App\Entity\Feedback;
use App\Entity\Pay;
use App\Entity\Invoice;
use App\Entity\User;
use App\Entity\Company;
use App\Entity\Industry;
use App\Entity\Workflow;
use App\Entity\Report;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(ContractCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
        $data = [];
        return $this->render('dashboard.html.twig', $data);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('合同管理系统演示');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-chart-simple');
        yield MenuItem::linkToCrud('Contract', 'fas fa-file', Contract::class);
        yield MenuItem::linkToCrud('Feedback', 'fas fa-file-export', Feedback::class);
        yield MenuItem::linkToCrud('Pay', 'fas fa-money-bill', Pay::class);
        yield MenuItem::linkToCrud('Invoice', 'fas fa-file-invoice', Invoice::class);
        yield MenuItem::subMenu('Data', 'fa fa-receipt')->setSubItems([
            MenuItem::linkToCrud('Invoice', 'fas fa-file', Invoice::class),
        ]);
        yield MenuItem::linkToCrud('Report', 'fas fa-file-invoice', Report::class);
        yield MenuItem::subMenu('Settings', 'fa fa-gear')->setSubItems([
            MenuItem::linkToCrud('User', 'fas fa-users', User::class),
            MenuItem::linkToCrud('Company', 'fas fa-building', Company::class),
            MenuItem::linkToCrud('Industry', 'fas fa-building', Industry::class),
            MenuItem::linkToCrud('Workflow', 'fas fa-building', Workflow::class),
        ]);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
