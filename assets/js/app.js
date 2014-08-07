(function(angular) {
  var app = angular.module('aguiar', ["ngSanitize", "matchmedia-ng", "ngRoute", "aguiar.controllers"]);

  app.config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'views/home.html'
      })
      .when('/blog', {
        templateUrl: '/views/archive.html',
        controller: 'archivesController',
        controllerAs: 'archive'
      })
      .when('/blog/:title', {
        templateUrl: '/views/post.html',
        controller: 'postController',
        controllerAs: 'single'
      })
      .when('/blog/page/:page', {
        templateUrl: '/views/archive.html',
        controller: 'archivesController',
        controllerAs: 'archive'
      });

      // Removes hash from url
      if(window.history && window.history.pushState) {
        $locationProvider.html5Mode(true);
      }
  }]);

  app.directive("commentForm", function() {
    return {
      restrict: "A",
      postId: "=postId",
      controller: "commentFormCtrl",
      controllerAs: "commentForm"
    }
  });

  app.directive("sectionFooter", function() {
    return {
      restrict: "E",
      templateUrl: '/views/footer.html'
    }
  });

  app.directive("welcomeMessage", ["matchmedia", function(matchmedia) {
    return {
      restrict: "A",
      controller: function() {
        var isPhone = matchmedia.isPhone(),
            isBigScreen = matchmedia.is("screen and (min-width: 1200px)");
            this.title = "<strong>front-end developer</strong>";
        this.technologies = "<em>WordPress</em> &amp; <em>Drupal</em>";
        if (isPhone) {
          this.title = "<br><strong>frontend developer</strong>";
          this.technologies = "<br><em>WordPress</em> &amp; <em>Drupal</em>";
        } else if (isBigScreen) {
          this.technologies = "<br><em>WordPress</em> &amp; <em>Drupal</em>";
        }
      },
      controllerAs: "message"
    };
  }]);

  app.directive("contactForm", function() {
    return {
      restrict: "A",
      controller: "contactFormCtrl",
      controllerAs: "form"
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
