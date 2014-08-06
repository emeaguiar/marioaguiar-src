(function(angular) {
  var app = angular.module('aguiar.controllers', ['ngSanitize', 'ngRoute']);

  app.controller('archivesController', ['$http', '$location', '$routeParams', function($http, $location, $routeParams) {
    var archive = this,
        archiveClass = 'text-right';

    archive.page = ($routeParams.page) ? $routeParams.page : 1;

    this.getPosts = function(page) {
      archive.loading = true;
      $http.get('/cms/api/get_posts/?page=' + archive.page).success( function(data) {
        archive.posts = data.posts;
        archive.loading = false;
        archive.totalPages = data.pages;
      });
    }

    this.nextPage = function() {
      archive.page++;
      $location.path('/blog/page/' + archive.page);
      this.getPosts(archive.page);
    }

    this.prevPage = function() {
      archive.page--;
      $location.path('/blog/page/' + archive.page);
      this.getPosts(archive.page);
    }

    this.getPosts(archive.page);

  }]);

  app.controller('postController', ['$http', '$routeParams', function($http, $routeParams) {
    var slug = $routeParams.title,
        single = this;
    single.loading = true;
    $http.get('/cms/api/get_post/?slug=' + slug).success( function(data) {
      single.post = data.post;
      single.loading = false;
      console.log(single);
    });
  }]);

  app.controller("commentFormCtrl", ['$http', function($http) {

  }]);

  app.controller("contactFormCtrl", ['$http', function($http) {
      this.email = {};

      this.sendMessage = function(data) {
        console.log(data);
      };
    }]);

})(angular);
