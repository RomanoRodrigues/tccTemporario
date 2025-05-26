<?php

use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

//Rota Home
    Route::get('/', [HomeController::class, 'index'])->name('home');

//Rotas de paciente
    Route::get('/paciente', [PacienteController::class, 'index']
    )->name('paciente.index');

    Route::get('/mostrar-paciente/{paciente}', 
    [PacienteController::class, 'mostrar'])
    ->name('paciente.mostrar');

    Route::get('/adicionar-paciente', 
    [PacienteController::class, 'criar'])
    ->name('paciente.criar');

    Route::post('/store-paciente', 
    [PacienteController::class, 'store'])
    ->name('paciente-store');

    Route::get('/editar-paciente/{paciente}',
    [PacienteController::class, 'editar'])->name('paciente.editar');

    Route::put('/update-paciente/{paciente}', 
    [PacienteController::class, 'update'])
    ->name('paciente.update');

    Route::delete('/deletar-paciente/{paciente}',
    [PacienteController::class, 'deletar'])->name('paciente.deletar');

//Rotas de médico - ainda em desenvolvimento    

    Route::get('/medico', [MedicoController::class, 'index']
    )->name('medico.index');

    Route::get('/mostrar-medico/{medico}', 
    [MedicoController::class, 'mostrar'])
    ->name('medico.mostrar');

    Route::get('/adicionar-medico', 
    [MedicoController::class, 'criar'])
    ->name('medico.criar');

    Route::post('/store-medico', 
    [MedicoController::class, 'store'])
    ->name('medico.store');

    Route::get('/editar-medico/{medico}',
    [MedicoController::class, 'editar'])->name('medico.editar');

    Route::put('/update-medico/{medico}', 
    [MedicoController::class, 'update'])
    ->name('medico.update');

    Route::delete('/deletar-medico/{medico}',
    [MedicoController::class, 'deletar'])->name('medico.deletar');


    

