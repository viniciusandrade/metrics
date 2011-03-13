<?php
require_once('couchsimple.php');
require_once('config.php');

$couch = new CouchSimple($config); // See if we can make a connection

switch ($_GET['do']){
    case 'register':
         
        if ( isset($_GET['site']) && isset($_GET['type']) ){
            $id = date("YmdHis");
            $fields['_id'] = $id;
            $fields['date'] = date("Ymd");
            foreach ($_GET as $param => $value){
                if ($param != 'do')
                    $fields[$param] = $value;
            }
            
            // Create a new document in the database
            $resp = $couch->send("PUT", "/" . $config['database'] ."/" . $id, json_encode($fields)); 
            var_dump($resp);   
        }
        break;
    case 'top_search':
        top_search();
        break;
    
}

/*



 $resp = $couch->send("GET", "/"); 
 var_dump($resp); // response: string(46) "{"couchdb": "Welcome", "version": "0.7.0a553"}"

 // Get a list of all databases in CouchDb 
 $resp = $couch->send("GET", "/_all_dbs"); 
 var_dump($resp); // string(17) "["test_suite_db"]" 

 // Create a new database "test"
 $resp = $couch->send("PUT", "/test"); 
 var_dump($resp); // string(12) "{"ok":true}" 
 
 // Get all documents in that database
 $resp = $couch->send("GET", "/test/_all_docs"); 
 var_dump($resp); // string(27) "{"total_rows":0,"rows":[]}" 

 // Create a new document in the database test with the id 123 and some data
 $resp = $couch->send("PUT", "/test/123", '{"_id":"123","data":"Foo"}'); 
 var_dump($resp); // string(42) "{"ok":true,"id":"123","rev":"2039697587"}"   

 // Get all documents in test again, seing doc 123 there
 $resp = $couch->send("GET", "/test/_all_docs"); 
 var_dump($resp); // string(91) "{"total_rows":1,"offset":0,"rows":[{"id":"123","key":"123","value":{"rev":"2039697587"}}]}" 

 // Get back document with the id 123
 $resp = $couch->send("GET", "/test/123"); 
 var_dump($resp); // string(47) "{"_id":"123","_rev":"2039697587","data":"Foo"}" 

 // Delete our "test" database
 $resp = $couch->send("DELETE", "/test/"); 
 var_dump($resp); // string(12) "{"ok":true}"
*/
 
?>
