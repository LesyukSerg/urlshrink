<?php

namespace App\Http\Controllers;

use App\Models\shortUrls;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public $chars = "abcdfghjkmnpqrstvwxyzABCDFGHJKLMNPQRSTVWXYZ";

    public function getUrl(Request $request)
    {
        $short = $this->createShortUrl();

        if (shortUrls::insertUrl($request->link, $short, $request->lifetime)) {
            return json_encode(['success' => true, 'url' => $short]);
        } else {
            return json_encode(['success' => false]);
        }
    }

    public function gotoUrl($url)
    {
        $data = shortUrls::getOne($url);

        if (strtotime($data->date_to) > time()) {
            shortUrls::useIncrement($data->id);
            return redirect($data->url_original);

        } else {
            echo "link expired";
        }
    }

    public function showStatisticAll()
    {
        $data = shortUrls::getAll();

        return view('statList', compact('data'));
    }

    public function showStatistic($url)
    {
        $data = shortUrls::getOne($url);

        return view('stat', compact('data'));
    }

    public function createShortUrl()
    {
        $lastCode = shortUrls::getLast();

        if (!$lastCode) {
            return $this->chars[0];
        } else {
            $lastSymb = strlen($lastCode) - 1;

            if ($lastCode[$lastSymb] != 'Z') {
                $nextSymb = strpos($this->chars, $lastCode[$lastSymb]) + 1;
                $lastCode[$lastSymb] = $this->chars[$nextSymb];
            } else {
                for ($i = $lastSymb; $i > -1; $i--) {
                    if ($lastCode[$i] == 'Z') {
                        $lastCode[$i] = $this->chars[0];
                    } else {
                        break;
                    }
                }

                if ($i > -1) {
                    $nextSymb = strpos($this->chars, $lastCode[$i]) + 1;
                    $lastCode[$i] = $this->chars[$nextSymb];
                } else {
                    $lastCode .= $this->chars[0];
                }
            }

            return $lastCode;
        }
    }
}
