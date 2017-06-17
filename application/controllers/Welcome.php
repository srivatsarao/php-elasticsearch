<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Elasticsearch\ClientBuilder;

require 'vendor/autoload.php';

class Welcome extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     */
    function __construct()
    {
        parent::__construct();
    }

    public function search()
    {
        if (isset($_GET['search'])) {
            $search=$_GET['search'];
            $client = ClientBuilder::create()->setHosts(['127.0.0.1:9200','localhost:9200'])->build();
            $params = [
            'index' => 'games',
            'type' => 'game',
            'body' => [
				'query' => [
					'bool' => [
						'should' => [
								[ 'match' => [ 'title' => $search ] ],
								[ 'match' => [ 'developer' => $search ] ],
								[ 'match' => [ 'genres' => $search ] ]
							]
						]
					]
            	]
            ];

            $results = $client->search($params);
			if($results['hits']['total']>=1){
				foreach($results['hits']['hits'] as $key=>$value){
					$search_result[$key]['title']=$value['_source']['title'];
					$search_result[$key]['developer']=implode(',',$value['_source']['developer']);
					$search_result[$key]['genres']=implode(',',$value['_source']['genres']);
				}
				$search_array['results']=$search_result;
				
				$this->load->view('welcome_message',$search_array);
			}
        }
    }

    public function index()
    {
        $this->load->view('welcome_message');
    }
}
