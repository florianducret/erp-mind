<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;

class AdministrationController extends Controller
{
    public function getDashboard()
    {  
        return view('administration.dashboard');
    }
  
  	public function getAvenantlaconventionclient()
    {
        return view('administration.avenantCC');
    }
	public function getAvenantaurcapitulatifdemission(){
		return view('administration.avenantRM');
	}
    
    public function postAvenantlaconventionclient(Request $req)
    {        
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('files/shares/templates/administration/Avenant à la Convention Client.docx');
        $templateProcessor->setValue('nomentreprise', htmlspecialchars($req->input('count'), ENT_COMPAT, 'UTF-8'));
        $templateProcessor->setValue('adresseclient', htmlspecialchars($req->input('adresseclient'), ENT_COMPAT, 'UTF-8'));
        $templateProcessor->setValue('nomfonction', htmlspecialchars($req->input('nomfonction'), ENT_COMPAT, 'UTF-8'));
        $templateProcessor->setValue('refcc', htmlspecialchars($req->input('refcc'), ENT_COMPAT, 'UTF-8'));
        $templateProcessor->setValue('causeavenant', "".htmlspecialchars($req->input('causeavenant'), ENT_COMPAT, 'UTF-8'));
		$templateProcessor->setValue('presidentje','Paul Bacle');
		/*
		$date = Carbon::createFromFormat('d/m/Y', $req->input('date-emission'))->addDays(30);
        $templateProcessor->setValue('date-echeance', htmlspecialchars($date->format('d/m/Y'), ENT_COMPAT, 'UTF-8'));
        */
        header('Content-Disposition: attachment; filename="Avenant à la Convention Client.docx"');
        header('Content-Type: application/msword');
        $templateProcessor->saveAs('php://output');
    }
	 public function postAvenantaurcapitulatifdemission(Request $req)
    {        
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('files/shares/templates/administration/Avenant au Récapitulatif de Mission.docx');
		 		$nomprenometudiant =$req->input('nometudiant')." ".$req->input('prenometudiant');
		 		$templateProcessor->setValue('nomprenometudiant',htmlspecialchars($nomprenometudiant,ENT_COMPAT,'UTF-8'));
		 		$templateProcessor->setValue('adresse',htmlspecialchars($req->input('adresse'),ENT_COMPAT,'UTF-8'));
        $templateProcessor->setValue('refrm', htmlspecialchars($req->input('refrm'), ENT_COMPAT, 'UTF-8'));
        $templateProcessor->setValue('refavantprojet', htmlspecialchars($req->input('refap'), ENT_COMPAT, 'UTF-8'));
		 		if(!empty($req->input('refavenantrmprecedent'))){
					$templateProcessor->setValue('refavenantrmprecedent', htmlspecialchars($req->input('refavenantrmprecedent'), ENT_COMPAT, 'UTF-8'));
					$templateProcessor->deleteBlock('DELETEMODIF');
				}
		 else{
					$templateProcessor->deleteBlock('DELETENEW');
		 }
        $templateProcessor->setValue('refconvetudiant', htmlspecialchars($req->input('refconvetudiant'), ENT_COMPAT, 'UTF-8'));
        $templateProcessor->setValue('refconclient', htmlspecialchars($req->input('refconclient'), ENT_COMPAT, 'UTF-8'));
        $templateProcessor->setValue('causesavenant',htmlspecialchars($req->input('causeavenant'), ENT_COMPAT, 'UTF-8'));
		$templateProcessor->setValue('newdate',htmlspecialchars($req->input('newdate'), ENT_COMPAT, 'UTF-8'));
		$templateProcessor->setValue('salaire',htmlspecialchars($req->input('salaire'), ENT_COMPAT, 'UTF-8'));
		$templateProcessor->setValue('nbJEH',htmlspecialchars($req->input('nbJEH'), ENT_COMPAT, 'UTF-8'));
		$templateProcessor->setValue('presidentje','Paul Bacle');
 		$templateProcessor->setValue('nbpages','2');
 		$templateProcessor->setValue('defmission',htmlspecialchars($req->input('defmission'), ENT_COMPAT, 'UTF-8'));

 		$date =Carbon::today();
 		$templateProcessor->setValue('date',htmlspecialchars($date->format('d/m/Y'), ENT_COMPAT, 'UTF-8'));
 		$newdate = Carbon::createFromFormat('d/m/Y',$req->input('newdate'));
 		$nbsemaine = $date->diffInWeeks($newdate,true);
		$templateProcessor->setValue('nbsemaine',htmlspecialchars($nbsemaine,ENT_COMPAT,'UTF-8'));


		/*
		$date = Carbon::createFromFormat('d/m/Y', $req->input('date-emission'))->addDays(30);
        $templateProcessor->setValue('date-echeance', htmlspecialchars($date->format('d/m/Y'), ENT_COMPAT, 'UTF-8'));
        */
        header('Content-Disposition: attachment; filename="Avenant au Récapitulatif de Mission.docx"');
        header('Content-Type: application/msword');
        $templateProcessor->saveAs('php://output');
    }
}
