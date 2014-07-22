<html ng-app="httpExample">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.16/angular.min.js"></script>
	<script type="text/javascript"src="app.js"></script>
  </head>
  <body ng-controller="FetchController">
    <div>
      <label>Name:</label>
      <input type="text" ng-model="yourName" placeholder="Enter a name here">
      <hr>
      <h1>Hello {{yourName}}!</h1>
	  
	  <button ng-click="fetch()">Týkla </button>
	  {{data}}
    </div>
  </body>
</html>