$(document).ready(function() {
  var AppView = Backbone.View.extend({
    resultPanel: null,
    inputText: null,
    errorPanel: null,
    loadingSpin: null,
    events: {
      "click input[type=submit]": "onSearch"
    },
    initialize: function() {
      this.inputText = this.$("input[type=text]");
      this.resultPanel = this.$("#result-panel");
      this.errorPanel = this.$("#search-error");
      this.loadingSpin = this.$("#loading-spin");
    },
    cleanError: function() {
      this.errorPanel.hide();
      this.errorPanel.html("");
    },
    showError: function(error) {
      this.errorPanel.show();
      this.errorPanel.html(error)
    },
    onSearch: function (e) {
      e.preventDefault();
      this.cleanError();
      this.loadingSpin.show();

      const word = this.inputText.val();
      if (word === "") {
        this.showError("you can't look for an empty word");
        this.loadingSpin.hide();
        return;
      }
      if (!/^[a-zA-Z\s]+$/.test(word)) {
        this.showError("only alphabetics and space characters are allowed");
        this.loadingSpin.hide();
        return;
      }

      fetch('/dictionary/' + word)
        .then(response => response.text())
        .then(html => {
          this.loadingSpin.hide();
          this.resultPanel.html(html);
        })
        .catch(error => {
          this.loadingSpin.hide();
          console.log(error);
          this.resultPanel.html("Sorry, the service is unavailable.")
        });
    },
  });

  new AppView({
    el: document.querySelector("#app"),
  })
})
