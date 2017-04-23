(function() {
  'use strict';

  angular
    .module('blog')
    .controller('MainController', MainController);

  /** @ngInject */
  function MainController(ArticlesService) {
    var vm = this;
    vm.articlesService = ArticlesService;
  }
})();
