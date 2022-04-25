<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->is('api/*')) {
            $data = Post::all();
            return response()->json([
                'status' => true,
                'data' => $data,
            ], 200);
        } else {
            return "hello";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $xmlString = file_get_contents(public_path('sitemap.xml'));
        $xmlObject = simplexml_load_string($xmlString);
        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true);
        try {
            foreach ($phpArray['odds']['FixtureEvent'] as $value) {
                Post::create([
                    'competition' => $value['@attributes']['competition'],
                    'competitionCht' => $value['@attributes']['competitionCht'],
                    'competitionChs' => $value['@attributes']['competitionChs'],
                    'competitionKor' => $value['@attributes']['competitionKor'],
                    'competitionVie' => $value['@attributes']['competitionVie'],
                    'hometeam' => $value['@attributes']['hometeam'],
                    'hometeamCht' => $value['@attributes']['hometeamCht'],
                    'hometeamChs' => $value['@attributes']['hometeamChs'],
                    'hometeamKor' => $value['@attributes']['hometeamKor'],
                    'hometeamVie' => $value['@attributes']['hometeamVie'],
                    'awayteam' => $value['@attributes']['awayteam'],
                    'awayteamCht' => $value['@attributes']['awayteamCht'],
                    'awayteamKor' => $value['@attributes']['awayteamKor'],
                    'awayteamChs' => $value['@attributes']['awayteamChs'],
                    'awayteamVie' => $value['@attributes']['awayteamVie'],
                    'date' => $value['@attributes']['date'],
                    'time' => $value['@attributes']['time'],
                    'title' => $value['marketline']['@attributes']['title'],
                    'titlelong' => $value['marketline']['@attributes']['titlelong'],
                    'section' => json_encode($value['marketline']['selection']),
                ]);
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
