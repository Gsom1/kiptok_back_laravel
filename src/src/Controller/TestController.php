<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class TestController
{
    public function test()
    {
        return new Response('qwe');
    }
}
