<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{
    public function getBands(Request $request) {
        $bands = $this->getBandsList();

        return response()->json($bands);
    }

    private function getBandsList() {
        return [
            [
                'id' => 1, 
                'name' => 'MF DOOM',
                'gender' => 'hip-hop'
            ],
            [
                'id' => 2,
                'name' => 'Deftones',
                'gender' => 'nu-metal'
            ],
            [
                'id' => 3,
                'name' => 'Black Sabbath',
                'gender' => 'heavy-metal',
            ],
            [
                'id' => 4,
                'name' => 'Linkin Park',
                'gender' => 'nu-metal'
            ],
            [
                'id' => 5,
                'name' => 'ATARASHII GAKKO!',
                'gender' => 'japanese-pop'
            ]
        ];
    }

    public function getBandById(Request $request, string $requestedId) {
        $band = null;
        $bands = $this->getBandsList();

        foreach ($bands as $b) {
            if ($b['id'] == $requestedId) {
                $band = $b;
            }
        }

        return $band ? response()->json($band) : abort(404);
    }

    public function getBandByGender(Request $request, string $requestedGender) {
        $bandsByGender = [];
        $bands = $this->getBandsList();

        foreach ($bands as $b) {
            if ($b['gender'] == $requestedGender) {
                array_push($bandsByGender, $b);
            }
        }

        return $bandsByGender ? response()->json($bandsByGender) : abort(404);
    }
}


/**
 * Sugestão: repository pattern e/ou traits
 */
