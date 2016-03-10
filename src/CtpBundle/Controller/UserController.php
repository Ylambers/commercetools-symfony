<?php
/**
 * @author: Ylambers <yaron.lambers@commercetools.de>
 */

namespace Commercetools\Symfony\CtpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class UserController extends Controller
{
    public function loginAction()
    {
//        return $this->render('CtpBundle:user:login.html.twig', array(
//            'foo' => 'Return new repsone of foo / UserController'
//        ));

        return new Response('<html><body>Admin Page</body></html>');
    }
}