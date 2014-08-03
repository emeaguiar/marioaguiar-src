(function(angular) {
  var app = angular.module('marioaguiar', ['ngRoute', 'ngSanitize']);

  app.run(function($rootScope) {
    $rootScope.$on('$routeChangeSuccess', function(ev, data) {
      if (data.$route && data.$route.controller) {
        $rootScope.controller = data.$route.controller;
      }
    })
  });

  app.config(function($routeProvider) {
    $routeProvider
      // Homepage
      .when('/', {
        templateUrl: ma.themePath + '/pages/home.html'
      })
      // Blog archive
      .when('/blog', {
        templateUrl: ma.themePath + '/pages/archive.html',
        controller: "ArchiveCtrl",
        controllerAs: 'archive'
      })
  });

  app.controller('ArchiveCtrl', ['$http', function($http) {
    var archive = this,
        bodyClass = blog;

    $http.get('/api/get_posts/?count=10').success( function(data) {
      archive.posts = data.posts;
      console.log(archive);
    });
  }]);

  app.controller('ContactFormCtrl', function() {
    this.data = {};

    if (this.$valid) {
      console.log(this);
    }

  });

  app.filter( 'wpDate', ['$filter', function($filter) {
    return function(date, format) {
      var d = date.match(/\d+/g), // Extract parts
          timestamp = new Date(d[0], d[1] - 1, d[2], d[3], d[4], d[5]); // Build date object

      return $filter('date')(timestamp, format);
    }
  }]);

})(angular);
