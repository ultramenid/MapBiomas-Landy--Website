<?php

use App\Http\Controllers\AccuracyAssessmentController;
use App\Http\Controllers\ATBDController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DownloadsController;
use App\Http\Controllers\FactsheetController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GEEControler;
use App\Http\Controllers\GlosariumController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InfographicController;
use App\Http\Controllers\MuralController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RefmapController;
use App\Http\Controllers\StatisticsController;
use App\Http\Middleware\checkSession;
use App\Http\Middleware\hasSession;
use App\Http\Middleware\setLanguage;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/en');

Route::middleware([setLanguage::class])
    ->prefix('{lang}')
    ->whereIn('lang', ['id', 'en'])
    ->group(function () {
        Route::get('/', [IndexController::class, 'index'])->name('index');
        Route::get('/about', [PagesController::class, 'about'])->name('about');
        Route::get('/refrencemap', [PagesController::class, 'refrencemap'])->name('refrencemap');
        Route::get('/termsofuse', [PagesController::class, 'termsofuse'])->name('termsofuse');
        Route::get('/faq', [FaqController::class, 'listfaq'])->name('faq');
        Route::get('/downloads', [DownloadsController::class, 'downloads'])->name('downloads');
        Route::get('/atbd', [ATBDController::class, 'atbd'])->name('atbd');
        Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts');
        Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics');
        Route::get('/accuracy-assessment', [AccuracyAssessmentController::class, 'index'])->name('accuracy-assessment');
        Route::get('/gee', [GEEControler::class, 'index'])->name('gee');
        Route::get('/glossary', [GlosariumController::class, 'index'])->name('glossary');
        Route::get('/refmap', [RefmapController::class, 'index'])->name('refmap');
        Route::get('/infographics', [InfographicController::class, 'index'])->name('infographics');
        Route::get('/news/{id}/{slug}', [NewsController::class, 'detailnews'])->name('detailnews');
        Route::get('/event/{id}/{slug}', [NewsController::class, 'detailevent'])->name('detailevent');
        Route::get('/landsatmosaics', [DownloadsController::class, 'landsatmosaics'])->name('landsatmosaics');
        Route::get('/collectionmap', [DownloadsController::class, 'collectionmap'])->name('collectionmap');
        Route::get('/legendcode', [DownloadsController::class, 'legendcode'])->name('legendcode');
        Route::get('/murals', [MuralController::class, 'index'])->name('murals');
        Route::get('/newnevent', [NewsController::class, 'newsnevent'])->name('newsnevent');
        Route::get('/factsheet', [FactsheetController::class, 'index'])->name('factsheet');
    });


//redirect to login page if user has no session
Route::middleware([checkSession::class])->group(function () {
    Route::get('/cms/dashboard', [DashboardController::class, 'index']);
    Route::get('/cms/listfaq', [FaqController::class, 'index']);
    Route::get('/cms/addfaq', [FaqController::class, 'add']);
    Route::get('/cms/editfaq/{id}', [FaqController::class, 'edit']);
    Route::get('/cms/listnews', [NewsController::class, 'index']);
    Route::get('/cms/addnews', [NewsController::class, 'add']);
    Route::get('/cms/editnews/{id}', [NewsController::class, 'edit']);
    Route::get('/cms/pageabout', [PagesController::class, 'cmsabout']);
    Route::get('/cms/pagestatistics', [StatisticsController::class, 'cmsstatistics']);
    Route::get('/cms/termofuse', [PagesController::class, 'cmstermofuse']);
    Route::get('/cms/cmsatbd', [PagesController::class, 'cmsatbd']);
    Route::get('/cms/pageaccuracy', [AccuracyAssessmentController::class, 'cmsaccuracy']);
    Route::get('/cms/pagegee', [GEEControler::class, 'cmsgee']);
    Route::get('/cms/pageglossary', [GlosariumController::class, 'cmsglosarium']);
    Route::get('/cms/pagerefmap', [RefmapController::class, 'cmsrefmap']);
    Route::get('/cms/listinfographic', [InfographicController::class, 'cmsinfographic']);
    Route::get('/cms/addinfographic', [InfographicController::class, 'addinfographic']);
    Route::get('/cms/pagelandsatmosaics', [DownloadsController::class, 'pagelandsatmosaics']);
    Route::get('/cms/pagecollectionmap', [DownloadsController::class, 'pagecollectionmap']);
    Route::get('/cms/cmsmural', [MuralController::class, 'cmsmural']);
    Route::get('/cms/addmural', [MuralController::class, 'addmural']);
    Route::get('/cms/editmural/{id}', [MuralController::class, 'edit']);
    Route::get('/cms/editinfographic/{id}', [InfographicController::class, 'edit']);
    Route::get('/cms/pagefactsheet', [FactsheetController::class, 'cmsfactsheet']);


    Route::post('/cms/tinymce-upload', [\App\Http\Controllers\CmsUploadController::class, 'upload'])->name('cms.tinymce.upload');

});

//redirect to dashboard if user has session to dashboard
Route::middleware([hasSession::class])->group(function () {
    Route::get('/cms/login', [DashboardController::class, 'login']);
});

//url to logout session
Route::get('/cms/logout', function () {
    session()->flush();
    return redirect('/cms/login');
});
