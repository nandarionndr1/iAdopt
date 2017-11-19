<?php


function curl_delete($path){
    $request_body = '';

    // e.g $path = /db/coll/ + id
    $ch = curl_init('http://127.0.0.1:8080'.$path);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request_body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    echo $response = curl_exec($ch);
    curl_close($ch);
}
function curl_post($path, $request_body){

    //  sample request
    //  $request_body =  array(
    //      'name' => 'del gago',
    //      'rating' => 'Dfaq?',
    //      'desc'   => 'please teach hehehe',
    //  );
    // e.g $path = /db/coll/ or /db/doggo/

    $ch = curl_init('http://127.0.0.1:8080'.$path);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request_body));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}
function curl_getAll($path){
    
    // e.g $path = /db/coll/
    $ch = curl_init('http://127.0.0.1:8080'.$path);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $ace = json_decode($response,true);
    curl_close($ch);
    
    return $ace['_embedded'];
}

function curl_getByName($path,$name){

    // e.g $path = /db/coll/ + id
    $ch = curl_init('http://127.0.0.1:8080'.$path);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $ace = json_decode($response,true);
    curl_close($ch);
    
    foreach($ace['_embedded'] as $data){
        if ($data['name'] == $name) {
            return $data;
        }  
    }
}

function curl_getByID($path,$id){

    // e.g $path = /db/coll/ + id
    $ch = curl_init('http://127.0.0.1:8080'.$path.$id);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $ace = json_decode($response,true);

    curl_close($ch);

    return $ace;
}
function curl_patch($path,$request_body){

    // e.g $path = /db/coll/ + id
    $ch = curl_init('http://127.0.0.1:8080'.$path);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request_body));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
    $response = curl_exec($ch);
    $resp = $response;
    curl_close($ch);
    return $resp;
}