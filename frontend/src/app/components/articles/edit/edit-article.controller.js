(function() {
  'use strict';

  angular
    .module('blog')
    .controller('EditArticleController', EditArticleController);

  /** @ngInject */
  function EditArticleController($scope, toastr, ArticlesService) {
    $scope.articlesService = ArticlesService;

    $scope.editArticle = function(article) {
    };

    $scope.newArticle = function(article) {
      if (article !== undefined) {
        ArticlesService.new(article);
      } else {
        toastr.warning('Please fill all data for the article');
      }
    };

  }
})();
