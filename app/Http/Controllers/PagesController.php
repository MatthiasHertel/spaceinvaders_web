<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Highscore;

class PagesController extends Controller
{
    //


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Startseite
    public function getIndex()
    {
        return view('pages.startseite');
    }
    // Dokumentation
    public function getDokumentation()
    {
        return view('pages.dokumentation');
    }
    // Download
    public function getDownload()
    {
        return view('pages.download');
    }
    // Highscore page with Data from DB
    public function getHighscore()
    {
      $highscores = Highscore::orderBy('punkte', 'desc')->paginate(10);
      return view('pages.highscore')->withHighscores($highscores);
    }
}
