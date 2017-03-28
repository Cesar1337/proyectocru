<?php namespace App\Http\Controllers;

use Session;
use Request;
use DB;
use CRUDbooster;
use App\Miembro;
use App\Abonos_Mensualidades;

class AdminMensualidadesRegistrosController extends \crocodicstudio\crudbooster\controllers\CBController {


	public function cbInit() {
		$this->title_field = "id";
		$this->global_privilege = false;
	}

	public function getIndex(){
		$this->cbLoader();

		$module = CRUDBooster::getCurrentModule();

		if(!CRUDBooster::isView() && $this->global_privilege==FALSE) {
			CRUDBooster::insertLog(trans('crudbooster.log_try_view',['module'=>$module->name]));
			CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
		}

		$page_title = "Registro de mensualidades";
		$this->cbView('finanzas/Mensualidad_Consultar',compact('page_title'));
	}

	public function generarReporteMes(){
		$this->cbLoader();

		$module = CRUDBooster::getCurrentModule();

		if(!CRUDBooster::isView() && $this->global_privilege==FALSE) {
			CRUDBooster::insertLog(trans('crudbooster.log_try_view',['module'=>$module->name]));
			CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
		}
		
		$page_title = "Reporte del mes";
		$mes = Request::input('mes');
		$anio = Request::input('anio');
		$miembros = Miembro::select('id','name')->orderBy('name','asc')->get();
		$pagosRealizados = Abonos_Mensualidades::where([
		    ['mes_correspondiente', '=', $mes],
		    ['anio_correspondiente', '=', $anio],
			])->get();
		
		$this->cbView('finanzas/Mensualidad_Reporte',compact('page_title','mes','anio','miembros','pagosRealizados'));
	}
}