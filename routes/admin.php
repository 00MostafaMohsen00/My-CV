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



Route::group(["prefix"=>"/"],function () {
    Route::get('/', [adminController::class,'login'])->name("admin.login");
    Route::post("/",[adminController::class,"check"])->name("admin.save.login");
    Route::group(["prefix"=>"/","middleware"=>["adminauth:admin","web"]],function (){
        Route::get("/",[adminController::class,'index'])->name("dashboard");
        Route::get("/",[adminController::class,'getSummary'])->name("get.summary");
        Route::post("/",[adminController::class,'editSummary'])->name("edit.summary");
        Route::post("/",[adminController::class,"editPersonal"])->name("personal.save");
        Route::get("/",[adminController::class,"allSkills"])->name("skills.all");
        Route::get("/",[adminController::class,"createSkill"])->name("skill.create");
        Route::post("/",[adminController::class,"saveSkill"])->name("skill.save");
        Route::get("/}",[adminController::class,"updateSkill"])->name("skill.update");
        Route::post("/",[adminController::class,"editSkill"])->name("skill.edit");
        Route::post("/",[adminController::class,"deleteSkill"])->name("skill.delete");
        Route::get("/",[adminController::class,"allLanguages"])->name("languages.all");
        Route::get("/",[adminController::class,"createLanguage"])->name("language.create");
        Route::post("/",[adminController::class,"saveLanguage"])->name("language.save");
        Route::get("/",[adminController::class,"updateLanguage"])->name("language.update");
        Route::post("/",[adminController::class,"editLanguage"])->name("language.edit");
        Route::post("/",[adminController::class,"deleteLanguage"])->name("language.delete");
        Route::get("/",[adminController::class,"allContacts"])->name("contacts.all");
        Route::get("/",[adminController::class,"createContact"])->name("contact.create");
        Route::post("/",[adminController::class,"saveContact"])->name("contact.save");
        Route::get("/",[adminController::class,"updateContact"])->name("contact.update");
        Route::post("/",[adminController::class,"editcontact"])->name("contact.edit");
        Route::post("/",[adminController::class,"deleteContact"])->name("contact.delete");
         Route::get("/",[adminController::class,"allProjects"])->name("projects.all");
        Route::get("/",[adminController::class,"createProject"])->name("project.create");
        Route::post("/",[adminController::class,"saveProject"])->name("project.save");
        Route::get("/",[adminController::class,"updateProject"])->name("project.update");
        Route::post("/",[adminController::class,"editProject"])->name("project.edit");
        Route::post("/",[adminController::class,"deleteProject"])->name("project.delete");
    });

});


