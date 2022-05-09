<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $xmlString = file_get_contents('http://oddsfeed.new.188games.com/OddsFeed/188BET/default/V1.0/GetOdds.aspx?language=ALL&event=ALL&market=ALL&sportsid=1&bettype=8_2');
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
        })->everyMinute();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
