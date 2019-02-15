<?php

include_once(__DIR__."/CURLManager.php");

class ajaxController
{
    private $resArray = array(
        "res" => null
    );

    private $secret = "1c0dd61d7bac5cb8312a0b5c4f2b72db";
    private $baseUrl = "https://api.themoviedb.org/3/";

    public function __construct() {
    }

    public function searchForPost(){
        if(!isset($_POST["method"])){
            return $this->resArray;
        }

        $method = $_POST["method"];
        $cm = new CURLManager();
        
        $sCtx = $_POST["sCtx"];
        $params = "&page=1&query=". urlencode($sCtx);
        $res = $this->resArray;

        switch ($method) {
            case 'indexSearchFilm':
                $subUrl = "search/movie";
                $url = $this->baseUrl.$subUrl."?api_key=".$this->secret."&language=de-DE&region=DE".$params;
                $json = $cm->fetchJSON($url);
                $this->resArray["res"] = json_decode($json);
                
                break;
            case 'indexSearchSeries':
                $subUrl = "search/tv";
                $url = $this->baseUrl.$subUrl."?api_key=".$this->secret."&language=de-DE&region=DE".$params;
                $json = $cm->fetchJSON($url);
                $this->resArray["res"] = json_decode($json);

                break;
            default:
                # code...
                break;
        }

        return $this->resArray;
    }    
}


$nA = new ajaxController();

echo json_encode($nA->searchForPost());
?>