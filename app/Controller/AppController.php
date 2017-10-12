<?php


App::uses('Controller','Controller');

 //Para la traduccion en los mensajes de los controladores
App::import('Core', 'i18n');
App::uses('Sanitize', 'Utility');
App::import('Inflector');

class AppController extends Controller {
    public $components = array('Session','Cookie','RequestHandler','Email');
    //Hepers a utilizar
	   public $helpers = array('Html','Js','Form','Session');
}
