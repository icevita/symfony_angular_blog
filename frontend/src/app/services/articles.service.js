(function() {
  'use strict';

  angular
    .module('blog')
    .service('ArticlesService', ArticlesService);

  /** @ngInject */
  function ArticlesService($log, toastr, ArticlesModel) {
    var self = this;
    this.articles = [];
    this.article = {};
    this.editMode = false;

    this.list = function() {
      ArticlesModel.list.query({}).$promise.then(function(data) {
        self.articles = data;
      });
    };

    this.new = function(article) {
      ArticlesModel.new.query(article).$promise.then(function() {
        toastr.success('Article created with success');
      }, function(err) {
        $log.error(err);
        toastr.error('Some error happened');
      });
    };

    this.delete = function(id) {
      ArticlesModel.delete.query({id: id}).$promise.then(function() {
        toastr.success('Article deleted');
        self.list();
      }, function(err) {
        $log.error(err);
        toastr.error('Something wrong happened');
      });
    };
  }
})();
