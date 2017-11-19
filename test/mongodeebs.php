<?php
    include 'curl_funcs.php';
    $a = array(
            'email'=>'jason',
            'password'=>'jason',
            'name' =>'Mark Zucc',
            'usertype'=>'1'
    );
    curl_post('/db/accounts/', $a);
?>

<!DOCTYPE html>
<html lang="en">
    
<link rel="import" href="../bower_components/polymer/polymer-element.html">
<link rel="import" href="../bower_components/paper-button/paper-button.html">
<link rel="import" href="../bower_components/iron-ajax/iron-ajax.html">
    
 <link rel="import" href="../bower_components/paper-input/paper-input.html">
 <script src="../bower_components/webcomponentsjs/webcomponents-loader.js"></script>
 <script src="../bower_components/webcomponentsjs/webcomponents-lite.js"></script>    

  <link rel="import" href="shared-styles.html">    
<head>
    <meta charset="UTF-8">
    <title>MongoDB Connects</title>
</head>
<body>
<paper-input  always-float-label label="Floating label">
    <iron-icon icon="pets" slot="prefix"></iron-icon>
</paper-input>
    <my-view1></my-view1>
</body>
</html>
   
<dom-module id="my-view1">

  <template>
    <style include="shared-styles">
      :host {
        display: block;

        padding: 10px;
      }
    </style>

    <div class="card">
      <div class="circle">1</div>
      <h1>View One</h1>
        <paper-button raised class = "indigo" on-click = "performRequest">CREATE DB</paper-button>
        <paper-button raised class = "indigo" on-click = "onCreateCollection">CREATE COLLECTION</paper-button>
        
        <paper-button raised class = "indigo" on-click = "createNewData1">CREATE INSTANCE 1</paper-button>
        <paper-button raised class = "indigo" on-click = "createNewData2">CREATE INSTANCE 2</paper-button>
        
        <paper-button raised class = "indigo" on-click = "queryDB">QUERY DB</paper-button>
        <paper-button raised class = "indigo" on-click = "deleteDB">Delete DB</paper-button>
        
    </div>
      
      <iron-ajax
            id = "dbAjaxPost"
            url = "http://127.0.0.1:8080/db"
            params='("desc":"this is my first db created with restheart")'
            method = "PUT"
            handle-as = "json"
            on-response="onSuccessCreate"
            debounce-duration="300">
      </iron-ajax>
      
       <iron-ajax
            id = "dbCollectionPost"
            url = "http://127.0.0.1:8080/db/accounts"
            params='("desc":"this is my first coll created with restheart")'
            method = "PUT"
            handle-as = "json"
            on-response="onSuccessCreate"
            debounce-duration="300">
      </iron-ajax>
      
      <iron-ajax
            id = "dbInsertNew1"
            url = "http://127.0.0.1:8080/db/doggos"
            body = '[{"name":"restheart" , "rating": "hyper cool", "desc": "this is my first coll created with restheart"}]'
            method = "POST"
            handle-as = "json"
            content-type = "application/json"
            on-response="onSuccessInsert"
            debounce-duration="300">
      </iron-ajax>

      <iron-ajax
            id = "dbInsertNew2"
            url = "http://127.0.0.1:8080/db/doggos"
            body = '[{"name":"mongodb" , "rating": "super bad", "desc": "MONGODBZUC"}]'
            method = "POST"
            handle-as = "json"
            content-type = "application/json"
            on-response="onSuccessInsert"
            debounce-duration="300">
      </iron-ajax>
      
      <iron-ajax
            id = "dbQuery"
            url = "http://127.0.0.1:8080/db/doggos"
            method = "GET"
            handle-as = "json"
            on-response="onReceivedDB"
            debounce-duration="300">
      </iron-ajax>
      <iron-ajax
            id = "dbDelete"
            url = "http://127.0.0.1:8080/db/doggos/5a10605ddea8c156186575d5"
            method = "DELETE"
            handle-as = "json"
            on-response="onReceivedDB"
            debounce-duration="300">
      </iron-ajax>
      
      <div id = "results"></div>
      
  </template>

  <script>
    class MyView1 extends Polymer.Element {
      static get is() { return 'my-view1'; }
        
        onSuccessCreate(e) {
            const resp = e.detail.response;
            var response = JSON.stringify(resp, null, ' ');
            console.log("SUCCESS sent PUT request: "+e.detail.response);
            this.$.results.innerHTML = response + "\n";
        }
        
        onSuccessInsert(e) {
            const resp = e.detail.response;
            var response = JSON.stringify(resp, null, ' ');
            console.log("Success Insert: "+e.detail.response);
            this.$.results.innerHTML = response + "\n";
        }
        
        
        performRequest() {
            this.$.dbAjaxPost.generateRequest();
        }
        
        onCreateCollection() {
            this.$.dbCollectionPost.generateRequest();
        }
        
        createNewData1() {
            this.$.dbInsertNew1.generateRequest();
        }
        
        createNewData2() {
            this.$.dbInsertNew2.generateRequest();
        }
        
        queryDB() {
            this.$.dbQuery.generateRequest();
        }
        
        deleteDB() {
            this.$.dbDelete.generateRequest();
        }
        onReceivedDB(e) {
            const resp = e.detail.response;
            var response = JSON.stringify(resp, null, ' ');
            this.$.results.innerHTML = response + "\n";
        }
    }

    window.customElements.define(MyView1.is, MyView1);
  </script>
</dom-module>