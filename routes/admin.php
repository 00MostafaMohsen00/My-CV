<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\adminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\adminMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(["prefix"=>"admin prefix"],function () {
    Route::get('/login page', [adminController::class,'login'])->name("admin.login");
    Route::post("/login validation route",[adminController::class,"check"])->name("admin.save.login");
    Route::group(["prefix"=>"your home page dashboard","middleware"=>["adminauth:admin","web"]],function (){
        Route::get("/dashboard page",[adminController::class,'index'])->name("dashboard");
        Route::get("/summary route",[adminController::class,'getSummary'])->name("get.summary");
        Route::post("/summary editting page",[adminController::class,'editSummary'])->name("edit.summary");
        Route::post("/summary editting route",[adminController::class,"editPersonal"])->name("personal.save");
        Route::get("/all skills page",[adminController::class,"allSkills"])->name("skills.all");
        Route::get("/skill creation page",[adminController::class,"createSkill"])->name("skill.create");
        Route::post("/skill data saving route",[adminController::class,"saveSkill"])->name("skill.save");
        Route::get("/skill upated with id page",[adminController::class,"updateSkill"])->name("skill.update");
        Route::post("/skill update with id route",[adminController::class,"editSkill"])->name("skill.edit");
        Route::post("/skill deletion route",[adminController::class,"deleteSkill"])->name("skill.delete");
        Route::get("/all languages page",[adminController::class,"allLanguages"])->name("languages.all");
        Route::get("/language creation page",[adminController::class,"createLanguage"])->name("language.create");
        Route::post("/language data saveing route",[adminController::class,"saveLanguage"])->name("language.save");
        Route::get("/language update by id page",[adminController::class,"updateLanguage"])->name("language.update");
        Route::post("/language update by id route",[adminController::class,"editLanguage"])->name("language.edit");
        Route::post("/language deletion route",[adminController::class,"deleteLanguage"])->name("language.delete");
        Route::get("/all contacts page",[adminController::class,"allContacts"])->name("contacts.all");
        Route::get("/contacts creation page",[adminController::class,"createContact"])->name("contact.create");
        Route::post("/contacts data saveing route",[adminController::class,"saveContact"])->name("contact.save");
        Route::get("/contact update by id page",[adminController::class,"updateContact"])->name("contact.update");
        Route::post("/contact update by id route",[adminController::class,"editcontact"])->name("contact.edit");
        Route::post("/contact deletion route",[adminController::class,"deleteContact"])->name("contact.delete");
    });

});


