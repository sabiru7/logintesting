<?php
// QuranController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuranController extends Controller
{
    public function index()
    {
        $response = Http::get('https://equran.id/api/v2/surat');
        $surahs = $response->ok() ? $response->json()['data'] : [];
        return view('api.index', compact('surahs'));
    }
}
