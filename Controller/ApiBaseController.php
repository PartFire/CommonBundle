<?php

namespace Partfire\CommonBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class ApiBaseController extends BaseController
{
    public function getJsonNotAllowedResponse($data)
    {
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        
        return $this->throwBadError($data, 404);
    }
    
    public function getJsonStatusResponse($status, $msg = null)
    {
        return $this->getResponse(
            array(
                'status'    => $status,
                'msg'       => $msg
            )
        );
    }
    
    public function getResponse($data)
    {
        $response = new Response(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');
        
        return (count($data) > 0) ? $response : $this->throw404();
    }
        
    public function getJsonResponse(Array $data)
    {
        return $this->getResponse($data);
    }
}