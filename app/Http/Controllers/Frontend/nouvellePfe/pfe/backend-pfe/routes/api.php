<?php

use App\Http\Controllers\AnnéeScolaireController;
use App\Http\Controllers\AttributionController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\EmploiDuTempsClasseController;
use App\Http\Controllers\EmploiDuTempsEnseignantController;
use App\Http\Controllers\InscriptionEnseignantController;
use App\Http\Controllers\LevelsController;
use App\Http\Controllers\ModuleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\MatiereController;


use Laravel\Sanctum\Sanctum;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'login']);

Route::middleware(['auth:sanctum','isAdmin'])->group( function(){
    Route::post('chat',[ChatController::class, 'logout']);
    Route::post('adminlogout',[AuthController::class, 'logout']);
    Route::get('CheckingAuth', function(){
        return response()->json(['message'=>'You are in', 'status'=>200], 200);

    });

    Route::get('user',[UserController::class, 'index']);
    Route::delete('/delete_user/{id}',[UserController::class, 'destroy']);

    Route::get('anneeScolaire',[AnnéeScolaireController::class, 'index']);
    Route::post('AjouteAnneeScolaire',[AnnéeScolaireController::class, 'store']);
    Route::put('update_statut/{id}',[AnnéeScolaireController::class, 'update']);
    Route::delete('/delete_AnneeScolaire/{id}',[AnnéeScolaireController::class, 'destroy']);

    Route::get('Levels',[LevelsController::class, 'index']);
    Route::post('Ajoute_levels',[LevelsController::class, 'store']);
    Route::delete('/delete_Niveaux/{id}',[LevelsController::class, 'destroy']);

    Route::get('classe_current_Levels',[ClassesController::class, 'index']);
    Route::post('Ajoute_classe',[ClassesController::class, 'store']);
    Route::get('classes/{id}',[ClassesController::class, 'getClasses']);
    Route::delete('/delete_classe/{id}',[ClassesController::class, 'destroy']);
    Route::get('ListeEleves/{id}',[ClassesController::class, 'getInscrierEleves']);

    Route::get('liste_inscription_enseignant',[InscriptionEnseignantController::class, 'getListeInscription']);
    Route::get('enseignant_inscription_current_Levels',[InscriptionEnseignantController::class, 'index']);
    Route::get('enseignant_inscription_identifiant/{identifiant}',[InscriptionEnseignantController::class, 'getIdentifiant']);
    Route::get('enseignant_inscription_classes/{id}',[InscriptionEnseignantController::class, 'getClasses']);
    Route::post('nouvelle_inscription_enseignant',[InscriptionEnseignantController::class, 'store']);
    Route::delete('/delete_inscription_enseignant/{id}',[InscriptionEnseignantController::class, 'destroy']);

    Route::get('liste_inscription_eleve',[AttributionController::class, 'getListeInscription']);
    Route::get('inscription_current_Levels',[AttributionController::class, 'index']);
    Route::get('inscription_identifiant/{identifiant}',[AttributionController::class, 'getIdentifiant']);
    Route::get('inscription_classes/{id}',[AttributionController::class, 'getClasses']);
    Route::post('nouvelle_inscription',[AttributionController::class, 'store']);
    Route::delete('/delete_inscription_eleve/{id}',[AttributionController::class, 'destroy']);

    Route::post('nouvelle_emploi_enseignant',[EmploiDuTempsEnseignantController::class, 'store']);

    Route::post('nouvelle_emploi_classe',[EmploiDuTempsClasseController::class, 'store']);






    

});


Route::middleware(['auth:sanctum','isEnseignant'])->group( function(){

    Route::post('enseignantlogout',[AuthController::class, 'logout']);
    Route::get('enseignantCheckingAuth', function(){
        return response()->json(['message'=>'You are in', 'status'=>200], 200);

    });
    Route::get('/Matieres/{id}',[MatiereController::class, 'getMatiere']);
    Route::post('/AjouteMatiere',[MatiereController::class, 'store']);
    Route::delete('/delete_Matiere/{id}',[MatiereController::class, 'destroy']);

    Route::get('/module/{id}',[ModuleController::class, 'getmodule']);
    Route::post('/AjouteModule',[ModuleController::class, 'store']);
    Route::delete('/delete_module/{id}',[ModuleController::class, 'destroy']);


});

Route::middleware(['auth:sanctum','isParent'])->group( function(){

    Route::post('logout',[AuthController::class, 'logout']);
    Route::get('parentCheckingAuth', function(){
        return response()->json(['message'=>'You are in', 'status'=>200], 200);

    });

});

Route::middleware(['auth:sanctum','isEtudiant'])->group( function(){

    Route::post('logout',[AuthController::class, 'logout']);
    Route::get('eleveCheckingAuth', function(){
        return response()->json(['message'=>'You are in', 'status'=>200], 200);

    });

});