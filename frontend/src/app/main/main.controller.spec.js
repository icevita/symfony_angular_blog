(function() {
  'use strict';

  describe('controllers', function(){
    var vm;

    beforeEach(module('blog'));
    beforeEach(inject(function(_$controller_) {

      vm = _$controller_('MainController');
    }));

    it('should have a articles', function() {
      expect(vm.articlesService).toBeDefined();
    });
  });
})();
