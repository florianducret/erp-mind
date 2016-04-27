<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Team;
use Carbon\Carbon;

class TresorerieController extends Controller
{
    public function getDashboard()
    {		
        return view('tresorerie.dashboard');
    }
       
    public function getFacturedacompte()
    {
        return view('tresorerie.factureAcompte');
    }
    
    public function postFacturedacompte(Request $req)
    {	
		$pusher = \App::make('pusher');
		$pusher->trigger( 'document-channel',
						  'document-event', 
						  array('text' => \Auth::user()->firstname.' a généré la Facture d\'acompte '.$req->input('reference-etude'),
							   'reference' => $req->input('reference-etude'))
						);
	
		$nom = $req->input('nom');
        
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('files/shares/templates/tresorerie/Facture d\'acompte.docx');    
   		$templateProcessor->setValue('nom', htmlspecialchars($req->input('nom'), ENT_COMPAT, 'UTF-8'));
        $templateProcessor->setValue('adresse', htmlspecialchars($req->input('adresse'), ENT_COMPAT, 'UTF-8'));
        $templateProcessor->setValue('reference-etude', htmlspecialchars($req->input('reference-etude'), ENT_COMPAT, 'UTF-8'));
        $templateProcessor->setValue('reference-cc', htmlspecialchars($req->input('reference-cc'), ENT_COMPAT, 'UTF-8'));
        $templateProcessor->setValue('date-emission', htmlspecialchars($req->input('date-emission'), ENT_COMPAT, 'UTF-8'));
		
		$date = Carbon::createFromFormat('d/m/Y', $req->input('date-emission'))->addDays(30);
        $templateProcessor->setValue('date-echeance', htmlspecialchars($date->format('d/m/Y'), ENT_COMPAT, 'UTF-8'));
        $templateProcessor->saveAs('files/shares/temp_'.$req->input('reference-etude').'.docx');
	}
	
	public function getFacturedivers()
    {
        return view('tresorerie.factureDivers');
    }
    
    public function postFacturedivers(Request $req)
    {
		$senderName = \Auth::user()->firstname;
		$reference = $req->input('reference-etude');
		
		$pusher = \App::make('pusher');
		$pusher->trigger('document-channel',
						 'document-event', 
						 array(
							  'text' => $senderName.' a généré la Facture divers '.$reference,
							  'reference' => $reference
						));
		
    }
}
