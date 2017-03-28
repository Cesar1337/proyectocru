<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use App\Configuracion;
	use App\Abonos_Mensualidades;

	class AdminAbonosMensualidadesController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {
			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "abonos_mensualidades";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Monto Abonado","name"=>"monto_abonado"];
			$this->col[] = ["label"=>"Miembro","name"=>"miembro_id","join"=>"cms_users,name"];
			$this->col[] = ["label"=>"Mes Correspondiente","name"=>"mes_correspondiente"];
			$this->col[] = ["label"=>"Año Correspondiente","name"=>"anio_correspondiente"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Monto Abonado','name'=>'monto_abonado','type'=>'money','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Miembro Id','name'=>'miembro_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'miembro,id'];
			$this->form[] = ['label'=>'Mes Correspondiente','name'=>'mes_correspondiente','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Año Correspondiente','name'=>'anio_correspondiente','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Monto Abonado','name'=>'monto_abonado','type'=>'money','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Miembro Id','name'=>'miembro_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'miembro,id'];
			//$this->form[] = ['label'=>'Mes Correspondiente','name'=>'mes_correspondiente','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Año Correspondiente','name'=>'año_correspondiente','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here	   
	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here
    		$nuevoBalance = Configuracion::find(1);
	    	$nuevoBalance->balance_general += $nuevoBalance->mensualidad_actual;
	    	$nuevoBalance->save();
	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :) 
	    public function getAdd(){
	    	$page_title = 'Agregar pago de mensualidad';
	    	$mensualidad = DB::table('configuracion')->select('mensualidad_actual')->first();
	    	$miembros = DB::table('cms_users')->select('id','name')->get();
	    	$this->cbView('finanzas/Mensualidad_Agregar',compact('page_title','miembros','mensualidad'));
	    }

	    public function postAddSave() {
	    	if($mes = Abonos_Mensualidades::where([
		    ['miembro_id', '=', Request::input('miembro_id')],
		    ['mes_correspondiente', '=', Request::input('mes_correspondiente')],
		    ['anio_correspondiente', '=', Request::input('anio_correspondiente')],
			])->exists()){
				return redirect()->back()->withErrors(['Ya el miembro pago ese mes','']);
	        }

	        else{
			    $this->cbLoader();
				if(!CRUDBooster::isCreate() && $this->global_privilege==FALSE) {
					CRUDBooster::insertLog(trans('crudbooster.log_try_add_save',['name'=>Request::input($this->title_field),'module'=>CRUDBooster::getCurrentModule()->name ]));
					CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
				}

				$this->validation();
				$this->input_assignment();		

				if (CRUDBooster::isColumnExists($this->table, 'created_at'))
				{
				    $this->arr['created_at'] = date('Y-m-d H:i:s');
				}

				$this->hook_before_add($this->arr);

				$this->arr[$this->primary_key] = $id = CRUDBooster::newId($this->table);
				$this->arr=array_filter($this->arr); // null array fix 
				DB::table($this->table)->insert($this->arr);

				$this->hook_after_add($this->arr[$this->primary_key]);


				//Looping Data Input Again After Insert
				foreach($this->data_inputan as $ro) {
					$name = $ro['name'];
					if(!$name) continue;

					$inputdata = Request::get($name);

					//Insert Data Checkbox if Type Datatable
					if($ro['type'] == 'checkbox') {
						if($ro['relationship_table']) {
							$datatable = explode(",",$ro['datatable'])[0];
							$foreignKey2 = CRUDBooster::getForeignKey($datatable,$ro['relationship_table']);
							$foreignKey = CRUDBooster::getForeignKey($this->table,$ro['relationship_table']);
							DB::table($ro['relationship_table'])->where($foreignKey,$id)->delete();

							if($inputdata) {
								foreach($inputdata as $input_id) {
									DB::table($ro['relationship_table'])->insert([
										'id'=>CRUDBooster::newId($ro['relationship_table']),
										$foreignKey=>$id,
										$foreignKey2=>$input_id
										]);
								}
							}

						}
					}


					if($ro['type'] == 'select2') {
						if($ro['relationship_table']) {
							$datatable = explode(",",$ro['datatable'])[0];
							$foreignKey2 = CRUDBooster::getForeignKey($datatable,$ro['relationship_table']);
							$foreignKey = CRUDBooster::getForeignKey($this->table,$ro['relationship_table']);
							DB::table($ro['relationship_table'])->where($foreignKey,$id)->delete();

							if($inputdata) {
								foreach($inputdata as $input_id) {
									DB::table($ro['relationship_table'])->insert([
										'id'=>CRUDBooster::newId($ro['relationship_table']),
										$foreignKey=>$id,
										$foreignKey2=>$input_id
										]);
								}
							}

						}
					}

					if($ro['type']=='child') {
						$name = str_slug($ro['label'],'');
						$columns = $ro['columns'];				
						$count_input_data = count(Request::get($name.'-'.$columns[0]['name']))-1;
						$child_array = [];

						for($i=0;$i<=$count_input_data;$i++) {
							$fk = $ro['foreign_key'];
							$column_data = [];
							$column_data[$fk] = $id;
							foreach($columns as $col) {
								$colname = $col['name'];
								$column_data[$colname] = Request::get($name.'-'.$colname)[$i];
							}
							$child_array[] = $column_data;
						}	

						$childtable = CRUDBooster::parseSqlTable($ro['table'])['table'];
						DB::table($childtable)->insert($child_array);
					}
				}


				$this->return_url = ($this->return_url)?$this->return_url:Request::get('return_url');

				//insert log
				CRUDBooster::insertLog(trans("crudbooster.log_add",['name'=>$this->arr[$this->title_field],'module'=>CRUDBooster::getCurrentModule()->name]));

				if($this->return_url) {
					if(Request::get('submit') == trans('crudbooster.button_save_more')) {
						CRUDBooster::redirect(Request::server('HTTP_REFERER'),trans("crudbooster.alert_add_data_success"),'success');
					}else{
						CRUDBooster::redirect($this->return_url,trans("crudbooster.alert_add_data_success"),'success');
					}

				}else{
					if(Request::get('submit') == trans('crudbooster.button_save_more')) {
						CRUDBooster::redirect(CRUDBooster::mainpath('add'),trans("crudbooster.alert_add_data_success"),'success');
					}else{
						CRUDBooster::redirect(CRUDBooster::mainpath(),trans("crudbooster.alert_add_data_success"),'success');
					}
				}		
	        }
		}
	}