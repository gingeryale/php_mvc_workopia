<?php

namespace App\Controllers;
use Framework\Database;

class ErrorController {


    public static function notFound($message = 'Resource Not Found'){

        HTTP_RESPONSE_CODE(404);
        loadView('error',[
            'status'=>'404',
            'message'=>$message
        ]);

    }

    public static function unAuthorized($message = 'Access Denied'){

        HTTP_RESPONSE_CODE(403);
        loadView('error',[
            'status'=>'403',
            'message'=>$message
        ]);
        
    }

    
}