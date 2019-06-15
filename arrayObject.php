 <?php

 /**
  * Created by Atik.
  * User: atikur Rahman Talukdar
  * Email: atikrahman.ew@gmail.com
  * Date: 6/15/2019
  * Time: 1:33 PM
  */


class DepthFinder {

    public function __construct($first_name=null, $last_name=null, $father=null) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->father = $father;
    }

    private  $DepthArray = array();


    /*Depth Finder Function*/
    function ArrayDepth($Array, $DepthCount = -1,$key_predefined=1)
    {
        $Array = json_decode(json_encode($Array), true);
        $DepthCount++;
        if (is_array($Array)){
            foreach ($Array as $key=>$Value) {

                /*Array Key value changing due to same key */
                if (array_key_exists($key, $this->DepthArray)) {
                    $this->DepthArray[$key.'_1'] = $DepthCount+1;
                }else{
                    $this->DepthArray[$key] = $DepthCount+1;
                }

                /*Showing Values*/
                echo  $key.' = '.($DepthCount+1).'<br>';

                $this->ArrayDepth($Value, $DepthCount,$key);
            }

        }

        else {
            if (!array_key_exists($key_predefined, $this->DepthArray)) {
                $this->DepthArray[$key_predefined] = $DepthCount;
            }

            return $DepthCount;
        }


        return $this->DepthArray;
    }


    /*Initial Index Function*/
    function ArrayParse() {
        $person_a = new DepthFinder('User', 1, NULL);
        $person_b = new DepthFinder('User', 2, $person_a);

        $a = array("key1" => 1, "key2" => array("key3" => 1,
            "key4" => array("key5" => 4, 'User' => $person_b,),
        ),
        );
        echo '<pre>';
        print_r($this->ArrayDepth($a));
    }

}


/*Calling The Function*/
 $depth_finder = new DepthFinder;
 $depth_finder->ArrayParse();
 ?>







