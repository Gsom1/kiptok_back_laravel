<?php

namespace App\Doctrine;

use SessionHandlerInterface;

interface SessionHandlerAwareInterface
{
    public function setSessionHandler(SessionHandlerInterface $sessionHandler);
}
