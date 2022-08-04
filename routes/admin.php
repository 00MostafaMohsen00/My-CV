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



Route::group(["prefix"=>"admin/controll/secure"],function () {
    Route::get('/login', [adminController::class,'login'])->name("admin.login");
    Route::post("/check",[adminController::class,"check"])->name("admin.save.login");
    Route::group(["prefix"=>"/dashboard","middleware"=>["adminauth:admin","web"]],function (){
        Route::get("/index",[adminController::class,'index'])->name("dashboard");
        Route::get("/summary",[adminController::class,'getSummary'])->name("get.summary");
        Route::post("/edit-summary",[adminController::class,'editSummary'])->name("edit.summary");
        Route::post("/edit-personal",[adminController::class,"editPersonal"])->name("personal.save");
        Route::get("/skills",[adminController::class,"allSkills"])->name("skills.all");
        Route::get("/create-skill",[adminController::class,"createSkill"])->name("skill.create");
        Route::post("/save-skill",[adminController::class,"saveSkill"])->name("skill.save");
        Route::get("/update-skill/{id}",[adminController::class,"updateSkill"])->name("skill.update");
        Route::post("/edit-skill/{id}",[adminController::class,"editSkill"])->name("skill.edit");
        Route::post("/delete-skill",[adminController::class,"deleteSkill"])->name("skill.delete");
        Route::get("/languages",[adminController::class,"allLanguages"])->name("languages.all");
        Route::get("/create-language",[adminController::class,"createLanguage"])->name("language.create");
        Route::post("/save-language",[adminController::class,"saveLanguage"])->name("language.save");
        Route::get("/update-language/{id}",[adminController::class,"updateLanguage"])->name("language.update");
        Route::post("/edit-language/{id}",[adminController::class,"editLanguage"])->name("language.edit");
        Route::post("/delete-language",[adminController::class,"deleteLanguage"])->name("language.delete");
        Route::get("/contacts",[adminController::class,"allContacts"])->name("contacts.all");
        Route::get("/create-contact",[adminController::class,"createContact"])->name("contact.create");
        Route::post("/save-contact",[adminController::class,"saveContact"])->name("contact.save");
        Route::get("/update-contact/{id}",[adminController::class,"updateContact"])->name("contact.update");
        Route::post("/edit-contact/{id}",[adminController::class,"editcontact"])->name("contact.edit");
        Route::post("/delete-contact",[adminController::class,"deleteContact"])->name("contact.delete");
    });

});


