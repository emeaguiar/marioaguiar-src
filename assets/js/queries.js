(function() {
  Harvey.attach('screen and (min-width:601px)', {
    on: function() {
      return console.log('lets join this');
    }
  });
}).call(this);
