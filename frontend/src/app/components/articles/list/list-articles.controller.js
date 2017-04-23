(function() {
  'use strict';

  angular
    .module('blog')
    .controller('ListArticlesController', ListArticlesController);

  /** @ngInject */
  function ListArticlesController($scope, ArticlesService) {
    $scope.articlesService = ArticlesService;

    $scope.listArticles = function() {
      ArticlesService.list();
    };

    $scope.deleteArticle = function(id) {
      ArticlesService.delete(id);
    };

    $scope.listArticles();
  }
})();
