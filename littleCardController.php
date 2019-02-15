<?php
require (__DIR__."/CURLManager.php");

class cardController
{
    private $typeForUrl = "";
    private $ctx = "";
    public function __construct($urlPart) {
        $this->typeForUrl = $urlPart;
    }

    public function drawPagination($res){

        $extraContext = "";
        if($this->ctx != ""){
            $extraContext = "&sCtx=".$this->ctx;
        }

        echo("<div id='pagination_index'>Seite 1 von ".$res->total_pages."</div><div style='text-align: center;'><div class='pagination'>");

        if($res->page != 1){
            echo("<a href='?inP=".($res->page -1).$extraContext."'>&laquo;</a>");
        }

        for ($i=-10; $i <= 10; $i++) { 
            $destSite = ($res->page + $i);

            if($destSite <= 0 || $destSite > $res->total_pages){
                continue;
            }

            $extra = "";

            if($destSite == $res->page){
                $extra= "active";
            }
            
            echo("<a href='?inP=".($destSite).$extraContext."' class='".$extra."'>".$destSite."</a>");
        }

        if($res->page < $res->total_pages){
            echo("<a href='?inP=".($res->page + 1).$extraContext."'>&raquo;</a>");
        }

        echo("</div></div>");
    }

    public function drawSearchBar($inhalt){
        if($inhalt != ""){
            $this->ctx = $inhalt;
        }
        echo '<form >
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div id="imaginary_container"> 
                            <div class="input-group stylish-input-group input-append">
                                <input type="text" class="form-control" id="sCtx" name="sCtx" autocomplete="off" placeholder="Titel" value="'.$inhalt.'">
                                <span class="input-group-addon">
                                    <button type="submit">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>  
                                </span>
                            </div>
                            <div class="cSearch">
                            </div>
                        </div>
                    </div>
                </div>
            </form>';
    }

    public function drawCard($name, $poster,$date,$overview,$id,$rate)
    {
        $title = $name;
        if(strpos($title, " - ")){
            $titleAr = explode(" - ",$title);
            $title = $titleAr[0] . "<div><small style='font-weight:normal;'>".$titleAr[1]."</small></div>";
        }
        echo "<div id='".$id."' class='smallCard'>";
        if($poster != ""){
            echo "<div class='rel_to_picture'><img src='https://image.tmdb.org/t/p/w300_and_h450_bestv2/".$poster."'></div>";
        }
        
            echo "<div class='info'>
                <div class='meta'>
                    <div class='meta_title'><a href='/".$this->typeForUrl."?id=".$id."'>".$title."</a></div>
                    <div class='meta_side'>
                        <div class='pull-right'>
                            <i class='fas fa-heart'></i> ".( ($rate != 0) ? ($rate * 10 ) ."%"  : "Keine Angabe" )."
                        </div>
                        <div>
                            <i class='fas fa-calendar'></i> ".( ($date != null) ? date("d.m.Y",strtotime($date)) : "Keine Angabe" )."
                        </div>
                    </div>
                    <p>".(($overview == "") ? "Momentan gibt es keine deutsche Übersetzung." : $overview)."</p>
                </div>
            </div>
        </div>";
    }

    public function getDataToJSON($url){
        $cm = new CURLManager();
        $json = $cm->fetchJSON($url);
        $res = json_decode($json);
        return $res;
    }
}


?>


<style>
.meta > .meta_title {
	text-align: center;
	background: #06b48f1a;
	
}
.meta_side {
    padding: 10px;
    border-bottom: 1px solid #ccc;
    font-size: 13px;
}
.pagination {
    display: inline-block;
}

.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

.stylish-input-group .input-group-addon{
    background: white !important; 
}
.stylish-input-group .form-control{
    border-right:0; 
	box-shadow:0 0 0; 
	border-color:#ccc;
}
.stylish-input-group button{
    border:0;
    background:transparent;
}
#imaginary_container {
    margin-top:20px;
    position: relative;
}
.meta {
    height: calc(100% - 23px);
}

.cSearch {
    position: absolute;
    width: 100%;
    background-color: #f3f3f3;
    z-index: 1;
    border-bottom-right-radius: 5px;
    border-bottom-left-radius: 5px;
}

.cSearch > a:hover {
    background-color: #cececeee;
}
.cSearch > a {
    padding: 3px;
    padding-left: 10px;
    color: #333333;
    border: 1px solid #3333;
    border-top:0;
    display: block;
    text-decoration: none;
}
</style>