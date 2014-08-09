(function(angular) {
  var app = angular.module('aguiar.controllers', ['ngSanitize', 'ngRoute']);

  app.controller('archivesController', ['$http', '$location', '$routeParams', function($http, $location, $routeParams) {
    var archive = this;

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
