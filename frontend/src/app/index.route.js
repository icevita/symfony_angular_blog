(function() {
  'use strict';

  angular
    .module('blog')
    .config(routerConfig);

  /** @ngInject */
  function routerConfig($stateProvider, $urlRouterProvider) {
    $stateProvider
      .state('blog', {
        url: '/',
        views: {
          'header': {
            templateUrl: 'app/components/header/header.html',
            controller: 'HeaderController',
            controllerAs: 'headCtrl'
          },
          'content': {
            templateUrl: 'app/main/main.html',
            controller: 'MainController',
            controllerAs: 'vm'
          }
        }
      })
      .state('blog.articles', {
        url: 'articles',
        views: {
          'content@': {
            templateUrl: 'app/components/articles/list/list-articles.html',
            controller: 'ListArticlesController',
            controllerAs: 'articlesListCtrl'
          }
        }
      })
      .state('blog.articles.edit', {
        url: '/edit',
        views: {
          'content@': {
            templateUrl: 'app/components/articles/edit/edit-article.html',
            controller: 'EditArticleController',
            controllerAs: 'articleEditCtrl'
          }
        }
      });

    $urlRouterProvider.otherwise('/');
  }

})();
