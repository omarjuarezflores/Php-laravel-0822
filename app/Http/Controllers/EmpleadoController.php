<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client as HttpClient;

class EmpleadoController extends Controller
{
    public function __construct(){
        //$this->middleware('editDelete.admin')->except('index','create', 'store');
       // $this->middleware('editDelete.admin')->only('create', 'store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::orderBy('id', 'DESC')->get();

        return view('Empleado.index',compact('empleados'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        
        $currencyWS = $this->obtenerCurrencyWS();
        $listMonedas = explode(";" , $currencyWS);
        return view('Empleado.create',compact('listMonedas'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $this->validate($request,[
            'nombre' => 'required|max:10',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'correo' => 'required|email', //Formato correo
            'fecha_nacimiento' => '',//Solo acepte formato fecha
            'direccion' => '',
            'genero' => 'required', //Solo acepte masculino/femenino
            'telefono' => 'required',
            'codigo_empleado' => 'required', //Unico
            'salario' => 'required',
            'tipo_moneda' => 'required'
        ]);

        /*$validaciones = Validator::make($request->all(), [
                'nombre' => 'required|max:10',
                'apellido_paterno' => 'required',
                'apellido_materno' => 'required',
                'correo' => 'required',
                'fecha-nacimiento' => '',
                'direccion' => '',
                'genero' => 'required',
                'telefono' => 'required',
                'codigo_empleado' => 'required'
            ]
        );

        dd($request->all(),$validaciones, $validaciones->errors());*/

        $arraySave = [
            'nombre' => $request->get("nombre"),
            'apellido_paterno' => $request->get("apellido_paterno"),
            'apellido_materno' => $request->get("apellido_materno"),
            'correo' => $request->get("correo"),
            'fecha_nacimiento' => $request->get("fecha_nacimiento"),
            'direccion' => $request->get("direccion"),
            'genero' => $request->get("genero"),
            'telefono' => $request->get("telefono"),
            'codigo_empleado' => $request->get("codigo_empleado"),
            'salario' => $request->get('salario'),
            'tipo_moneda' => $request->get('tipo_moneda')
        ];

        $saveEmpleado = Empleado::create($arraySave);

        return redirect()->route('empleado.index')->with('success','Registro creado exitosamente.');

        //dd($saveEmpleado);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
     
          $empleado = Empleado::find($id);
        $estadosWS = $this->wsEstados();
        $listEstados = ((array)$estadosWS->data)['lst_estado_proveedor'];
        return view('Empleado.show',compact('empleado','listEstados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
         
       
        
        
        $empleado = Empleado::find($id);
        $currencyWS = $this->obtenerCurrencyWS();
        $listMonedas = explode(";" , $currencyWS);
        return view('Empleado.edit',compact('empleado','listMonedas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,['nombre' => 'required|max:10',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'correo' => 'required|email', //Formato correo
            'fecha_nacimiento' => '',//Solo acepte formato fecha
            'direccion' => '',
            'genero' => 'required', //Solo acepte masculino/femenino
            'telefono' => 'required'
        ]);
        Empleado::find($id)->update($request->all());

        return redirect()->route('empleado.index')->with('success','Registro creado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($idEmpleado)
    {
        Empleado::find($idEmpleado)->delete();
        return redirect()->route('empleado.index')->with('success' , 'Registro eliminado existosamente.');
    }

     private function obtenerCurrencyWS(){

        $client = new HttpClient(['base_uri' => 'https://fx.currencysystem.com/webservices/CurrencyServer5.asmx/','verify' => false]);
        $response = $client->request('GET',"AllCurrencies",['query' => 'licenseKey=']);
        return xmlrpc_decode($response->getBody()->getContents());
    }

    public function wsEstados(){
        $client = new HttpClient(['base_uri' => 'https://beta-bitoo-back.azurewebsites.net/api/','verify' => false]);
        $response = $client->request('POST','proveedor/obtener/lista_estados');
        return json_decode($response->getBody());
    }
}