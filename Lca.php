<?php
/**
 * Created by Atik.
 * User: atikur Rahman Talukdar
 * Email: atikrahman.ew@gmail.com
 * Date: 6/15/2019
 * Time: 1:33 PM
 */


class Lca
{
    function getParents($value, $tree, $ref_array=null){
        if(is_null($ref_array))
            $ref_array = [];
        $node = $tree[array_search( $value, array_column($tree, 'value'))];
        $ref_array[] = $node['value'];
        if(!is_null($node['parent'])){
            return $this->getParents($node['parent'], $tree, $ref_array);
        }else{
            return $ref_array;
        }
    }

    function findLca($node_value1, $node_value2, $tree){

        $node1Parents = $this->getParents($node_value1, $tree);
        $node2Parents = $this->getParents($node_value2, $tree);

        /*Matched Results*/
        $matchedParents = array_intersect($node1Parents, $node2Parents);
        return $matchedParents[min(array_keys($matchedParents))];

    }

}

$lca_finder=new Lca();

$tree = [
    ['value' => 1, 'parent' => null],
    ['value' => 2, 'parent' => 1],
    ['value' => 4, 'parent' => 2],
    ['value' => 5, 'parent' => 2],
    ['value' => 3, 'parent' => 1],
    ['value' => 6, 'parent' => 3],
    ['value' => 7, 'parent' => 3]
];
echo "The LCA: ". $lca_finder->findLca(6, 7, $tree);