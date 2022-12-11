<?php

namespace App\EventSubscriber;

use App\Repository\MarqueRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Environment;

class TwigEventSubscriber implements EventSubscriberInterface
{
    private $twig;
    private $marqueRepository;

    public function __construct(Environment $twig, MarqueRepository $marqueRepository)
    {
        $this->twig = $twig;
        $this->marqueRepository = $marqueRepository;
    }

    public function onKernelController(ControllerEvent $event): void
    {
        $this->twig->addGlobal('marquesFindAll', $this->marqueRepository->findAll());
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}
