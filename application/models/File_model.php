<?php

/**
* Elastic Search
*/
use Elasticsearch\ClientBuilder;

require 'vendor/autoload.php';

class File_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function upload_file()
    {
        $count=0;
        $client = ClientBuilder::create()->setHosts(['127.0.0.1:9200','localhost:9200'])->build();
        $fp = fopen($_FILES['userfile']['tmp_name'], 'r') or die("can't open file");
        $data = array();
        while ($csv_line = fgetcsv($fp, 1024)) {
            $count++;
            if ($count == 1) {
                continue;
            }
            for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
                $result=array();
                $result['id']=$i;
                $result['index']= 'games';
                $result['type'] = strtolower($csv_line[0]);
                $result['title'] = $csv_line[1];
                $result['minutes_played'] = $csv_line[2];
                $result['hours_played'] = $csv_line[3];
                $result['price'] = $csv_line[4];
                $result['release_date'] = $csv_line[5];
                $result['developer'] = $csv_line[6];
                $result['publisher'] = $csv_line[7];
                $result['score'] = $csv_line[8];
                $result['win_env'] = $csv_line[9];
                $result['mac_env'] = $csv_line[10];
                $result['linux_env'] = $csv_line[11];
                $result['size'] = $csv_line[12];
                $result['controller'] = $csv_line[13];
                $result['genres'] = $csv_line[14];
            }

                $index = $client->index([
                    'index'=> 'games',
                    'type' => $result['type'],
                    'body'=>[
                        'title' => $result['title'],
                        'minutes_played' => $result['minutes_played'],
                        'hours_played' => $result['hours_played'],
                        'price' => $result['price'],
                        'release_date' => $result['release_date'],
                        'developer' => explode(',',trim($result['developer'])),
                        'publisher' => $result['publisher'],
                        'score' => $result['score'],
                        'win_env' => $result['win_env'],
                        'mac_env' => $result['mac_env'],
                        'linux_env' => $result['linux_env'],
                        'size' => $result['size'],
                        'controller'=>$result['controller'],
                        'genres' => explode(',',trim($result['genres']))
                    ]
                ]);
        }
        fclose($fp) or die("can't close file");
        if($index)
            return $index;
    }
}
