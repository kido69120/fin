<?php

namespace App\Controller\Admin;

use App\Entity\Muscle;
use App\Entity\Category;
use App\Entity\Exercice;
use App\Entity\Intensity;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');


    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Fin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Muscle', 'fa fa-home', Muscle::class);
        yield MenuItem::linkToCrud('Exercice', 'fa fa-home', Exercice::class);
        yield MenuItem::linkToCrud('Catégorie', 'fa fa-home', Category::class);
        yield MenuItem::linkToCrud('Intensité', 'fa fa-home', Intensity::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
