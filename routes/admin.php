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



Route::group(["prefix"=>"your admin prefix"],function () {
    Route::get('/login route here', [adminController::class,'login'])->name("admin.login");
    Route::post("/save login route here",[adminController::class,"check"])->name("admin.save.login");
    Route::group(["prefix"=>"/your admin home prefix here","middleware"=>["adminauth:admin","web"]],function (){
        Route::get("/home route",[adminController::class,'index'])->name("dashboard");
        Route::get("/update summary route",[adminController::class,'getSummary'])->name("get.summary");
        Route::post("/summary edit route",[adminController::class,'editSummary'])->name("edit.summary");
        Route::post("/personal route ",[adminController::class,"editPersonal"])->name("personal.save");
        Route::get("/all skills route",[adminController::class,"allSkills"])->name("skills.all");
        Route::get("/skill create page route",[adminController::class,"createSkill"])->name("skill.create");
        Route::post("/saving skill form route",[adminController::class,"saveSkill"])->name("skill.save");
        Route::get("/skill update by id page",[adminController::class,"updateSkill"])->name("skill.update");
        Route::post("/skill edit save by id ",[adminController::class,"editSkill"])->name("skill.edit");
        Route::post("/skill deleting",[adminController::class,"deleteSkill"])->name("skill.delete");
        Route::get("/all languages route",[adminController::class,"allLanguages"])->name("languages.all");
        Route::get("/language creation form page",[adminController::class,"createLanguage"])->name("language.create");
        Route::post("/saving language data route",[adminController::class,"saveLanguage"])->name("language.save");
        Route::get("/language update by id page",[adminController::class,"updateLanguage"])->name("language.update");
        Route::post("/language edit save by id",[adminController::class,"editLanguage"])->name("language.edit");
        Route::post("/language deletion",[adminController::class,"deleteLanguage"])->name("language.delete");
        Route::get("/all contacts page route",[adminController::class,"allContacts"])->name("contacts.all");
        Route::get("/contact creation form",[adminController::class,"createContact"])->name("contact.create");
        Route::post("/contact data save route",[adminController::class,"saveContact"])->name("contact.save");
        Route::get("/contact update by id page",[adminController::class,"updateContact"])->name("contact.update");
        Route::post("/contact edit by id save route",[adminController::class,"editcontact"])->name("contact.edit");
        Route::post("/contact deleting route",[adminController::class,"deleteContact"])->name("contact.delete");
    });

});


