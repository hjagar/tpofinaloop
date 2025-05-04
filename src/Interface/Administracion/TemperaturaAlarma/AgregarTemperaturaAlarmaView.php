<?php
// namespace App\Interface\Administracion\TemperaturaAlarma;
// use App\Control\TemperaturaAlarmaControl;
// use App\Interface\FormView;
// use App\Interface\Componentes\Input;
// use App\Interface\Componentes\Choice;
// use App\Interface\Componentes\Direction;

// class AgregarTemperaturaAlarmaView extends FormView
// {
//     protected $title = 'Agregar Alarma de Temperatura';

//     protected $controlClass = TemperaturaAlarmaControl::class;
    
//     public function __construct()
//     {
//         parent::__construct($this->controlClass, $this->inputs);
//         $this->inputs['temperatura'] = new Input('Temperatura', true, 'temperatura');
//         $this->inputs['accion'] = new Choice('Acción', ['1' => 'Enviar Alerta', '2' => 'Enviar Correo'], true, 'accion', Direction::HORIZONTAL);
//         $this->inputs['tiempo'] = new Input('Tiempo', true, 'tiempo');
//         $this->inputs['estado'] = new Choice('Estado', ['1' => 'Activada', '2' => 'Desactivada'], true, 'estado', Direction::HORIZONTAL);
//     }

//     protected 
// }