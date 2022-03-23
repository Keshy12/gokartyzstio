<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\ArbiterModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{  
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $session = \Config\Services::session();
        $validation =  \Config\Services::validation();



        if(!isset($_SESSION["zalogowany"]))
        {
            $_SESSION["zalogowany"] = "";
        };  
        if(!isset($_COOKIE["button"]) || $_COOKIE["button"]=="")
        {
            $_COOKIE["button"] = 0;
        };
        if(!isset($_COOKIE['school']))
        {
            $_COOKIE['school']=1;
        };
        if(!isset($_COOKIE['ride']))
        {
            $_COOKIE['ride']=1;
        };  
        if(!isset($_COOKIE['gokart']))
        {
            $_COOKIE['gokart']=1;
        };  
        if(!isset($_COOKIE['competition']))
        {
            $_COOKIE['competition']=1;
        };   
        if(!isset($_COOKIE['competitor']))
        {
            $_COOKIE['competitor']=1;
        };  
        

        $db = db_connect();
        $model = new ArbiterModel($db);
        $status = $model->getStatus();
        $_COOKIE["status"] = "";
        $zaplanowane = false;
        $w_trakcie = false;
        foreach($status as $stat)
        {
            if($stat->status_zawodow_id == 1)
            {
                $zaplanowane = true;
            }
            if($stat->status_zawodow_id == 2)
            {
                $w_trakcie = true;
            }
        }
        if($zaplanowane && $w_trakcie)
        {
            $_COOKIE["status"] = "oba"; 
        }
        elseif($zaplanowane)
        {
            $_COOKIE["status"] = "zaplanowane"; 
        }
        elseif($w_trakcie)
        {
            $_COOKIE["status"] = "w_trakcie"; 
        }
        
        
    }
    protected function formValid(){
        helper('form');
        helper(['form']);
       // $this->form_validation->set_rules('email','Title', 'required');
        if($this->request->getMethod() == 'post'){
            $rules = [
                'email' => [
                    'rules' => 'required|valid_email',
                    'label' => 'Email adress',
                    'errors' => [
                        'required' => 'Email adress is a required field'
                    ],
                ],
                'password' => 'required|min_length[8]',
            ];
    
            if($this->validate($rules)){
                //return redirect() -> to('/form/success');
                //Then do database insertion
                //Login user
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }
    }
}