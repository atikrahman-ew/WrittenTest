 <?php

 /**
  * Created by Atik.
  * User: atikur Rahman Talukdar
  * Email: atikrahman.ew@gmail.com
  * Date: 6/15/2019
  * Time: 1:33 PM
  */

 

class DepthFinder {
    public  $DepthArray = array();


    /*Depth Finder Function*/
    function ArrayDepth($Array, $DepthCount = -1,$key_predefined=1)
    {
        $DepthCount++;
        if (is_array($Array)){
            foreach ($Array as $key=>$Value) {

                $this->DepthArray[$key] = $DepthCount+1;
                $this->ArrayDepth($Value, $DepthCount,$key);
            }

        }

        else {
            $this->DepthArray[$key_predefined] = $DepthCount;
            return $DepthCount;
        }


        return $this->DepthArray;
    }

    /*Initial Index Function*/
    function ArrayParse() {
        $a = array("key1" => 1,
            "key2" => array("key3" => 1, "key4" => array("key5" => 4),),
        );
        echo '<pre>';
        print_r($this->ArrayDepth($a));
    }

}

 /*Calling The Function*/
 $depth_finder = new DepthFinder;
 $depth_finder->ArrayParse();
 ?>







