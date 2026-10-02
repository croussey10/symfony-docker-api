<?php

namespace App\Exception\Trip;

use Symfony\Component\HttpFoundation\Response;

class TripNotFoundException extends \RuntimeException
{
    /**
     * Signals a lookup on a city identifier that matches nothing.
     */
    public function __construct()
    {
        // le message ne porte pas l'identifiant : il finirait dans le journal
        parent::__construct(
            Response::HTTP_NOT_FOUND,
            "Ville non trouvée"
        );
    }
}
