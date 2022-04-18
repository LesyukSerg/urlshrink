<?php

    namespace App\Http\Controllers;

    use App\Models\shortUrls;
    use Illuminate\Http\Request;

    class UrlController extends Controller
    {
        public $chars = "abcdfghjkmnpqrstvwxyzABCDFGHJKLMNPQRSTVWXYZ";

        public function makeShortUrl(Request $request)
        {
            $short = $this->createShortUrl();

            if (shortUrls::insertUrl($request->link, $short, $request->lifetime)) {
                $data = ['success' => true, 'url' => $short];
            } else {
                $data = ['success' => false];
            }


            return response(json_encode($data), 201)
                ->header('Content-Type', 'json/application');
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

        public function showShortUrls()
        {
            $data = shortUrls::getAll();

            return response(json_encode($data), 200)
                ->header('Content-Type', 'json/application');
        }

        public function showStatisticAll()
        {
            $data = shortUrls::getAll();

            return view('statList', compact('data'));
        }

        public function showOneShortUrl($url)
        {
            $data = shortUrls::getOne($url);

            return response(json_encode($data), 200)
                ->header('Content-Type', 'json/application');
        }

        public function showStatistic($url)
        {
            $data = shortUrls::getOne($url);

            return view('stat', compact('data'));
        }

        public function changeOneShortUrl(Request $request, $short)
        {
            if (shortUrls::changeOne($short ,$request->link, $request->time, $request->count)) {
                $data = ['success' => true, 'url' => $short];
            } else {
                $data = ['success' => false];
            }

            return response(json_encode($data), 200)
                ->header('Content-Type', 'json/application');
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

        public function delShortUrl($urlCode)
        {
            if (shortUrls::deleteOne($urlCode)) {
                $data = ['success' => true];
            } else {
                $data = ['success' => false];
            }

            return response(json_encode($data), 200)
                ->header('Content-Type', 'json/application');
        }
    }
