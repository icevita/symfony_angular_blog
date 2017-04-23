'use strict';

describe('The main view', function() {
  var page;

  beforeEach(function() {
    browser.get('/index.html');
    page = require('./main.po');
  });

  it('should include h1 title', function() {
    expect(page.h1El.getText()).toBe('All Articles');
  });

});
