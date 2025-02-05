<?php

namespace App\EventSubscriber;

use Twig\Environment;
use App\Repository\CategoryRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class MenuSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private CategoryRepository $repository,
        private Environment $twig
    ) {}

    public function onKernelController(ControllerEvent $event): void
    {
        $this->twig->addGlobal('categories', $this->repository->findAll());
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}
