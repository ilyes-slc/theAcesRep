<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ArtoxLab\Bundle\SmsBundle\Service\ProviderManager;
use ArtoxLab\Bundle\SmsBundle\Sms\Sms;

class FooController extends Controller
{
    public function barAction(ProviderManager $providerManager)
    {
        $sms = new Sms('+21625700763', 'une nouvelle livraison a été ajouté');
        $provider = $providerManager->getProvider('nabil');
        
        $provider->send($sms);
    }
}