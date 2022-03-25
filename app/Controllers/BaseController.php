<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\ArbiterModel;
use App\Models\ModificationModel;

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
    protected $helpers = ['form', 'cookie'];

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
        $db = db_connect();
        $model = new ArbiterModel($db);
        if(!isset($_SESSION["zalogowany"]))
        {
            $_SESSION["zalogowany"] = "";
        };  
        if(!isset($_COOKIE["button"]) || $_COOKIE["button"]=="")
        {
            $_COOKIE["button"] = 0;
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
        
        if(isset($_SESSION['deleteCompetition']))
        {
            unset($_COOKIE['competition']);
            setcookie('competition', $_SESSION['deleteCompetition'], 12*60*60*1000, "/");
            unset($_SESSION['deleteCompetition']);
        }
        
        if(isset($_SESSION['deleteCompetitor']))
        {
            unset($_COOKIE['competitor']);
            setcookie('competitor', $_SESSION['deleteCompetitor'], 12*60*60*1000, "/");
            unset($_SESSION['deleteCompetitor']);
        }
    }
}