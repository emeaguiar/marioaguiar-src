(function(angular) {
  var app = angular.module('aguiar.controllers', ['ngSanitize', 'ngRoute']);

  app.controller('archivesController', ['$scope','$http', '$location', '$routeParams', function($scope, $http, $location, $routeParams) {

    $scope.page = ($routeParams.page) ? $routeParams.page : 1;

    this.getPosts = function(page) {
      $scope.loading = true;
      $http.get('/cms/api/get_posts/?page=' + $scope.page)
        .success( function(data, status, headers, config) {
          $scope.posts = data.posts;
          $scope.loading = false;
          $scope.totalPages = data.pages;
        }
      );
    };

    this.nextPage = function() {
      $scope.page++;
      $location.path('/blog/page/' + $scope.page);
      this.getPosts($scope.page);
    };

    this.prevPage = function() {
      $scope.page--;
      $location.path('/blog/page/' + $scope.page);
      this.getPosts($scope.page);
    };

    this.getPosts($scope.page);

  }]);

  app.controller('postController', ['$scope', '$http', '$routeParams', function($scope, $http, $routeParams) {
    var slug = $routeParams.title;
    $scope.loading = true;
    $http.get('/cms/api/get_post/?slug=' + slug).success( function(data) {
      $scope.page.setTitle(data.post.title);
      $scope.post = data.post;
      $scope.loading = false;
    });
  }]);

  app.controller("commentFormCtrl", ['$http', function($http) {

  }]);

  app.controller("contactFormCtrl", ['$http', function($http) {
    var form = this;
    form.email = {};

    form.success = false;

    form.sendMessage = function(data) {
      $http({
        method: 'POST',
        url: '/includes/mail.php',
        data: data,
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
      })
      .success( function(data) {
        if ( data.success ) {
          form.success = true;
        } else {
          form.error = true;
        }
      } );
    };
  }]);

})(angular);
