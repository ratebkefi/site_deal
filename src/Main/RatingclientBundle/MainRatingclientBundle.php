<?php

namespace Main\RatingclientBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MainRatingclientBundle extends Bundle
{
    public function getParent()
    {
        return 'DCSRatingBundle';
    }
}
