/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 carrinho: function (json) {
  var self = this;
  modal({
      callback: function (div) {
          var vue_instance = new Vue({
              el: div.get(0),
              data: {
                  produtos_list: json.produtos_list,
                  buscar_produto:'',
                  contador: 0,
                  produtos_total: 0,
              },
              methods: {
                home: function (print) {
                      var vue_self = this;
                      var isPrint = print === true;
                      $.ajax({
                          url: self.Url('home'),
                          dataType: 'json',
                          data: {
                              quantidade: vue_self.quantidade,
                              preço_total: vue_self.preço_total,
                              print: isPrint
                          },
                          success: function (j) {
                              if (isPrint === true) {
                                  App.print({});
                              } else {
                                  vue_self.list = j.list;
                              }
                          }
                      });
                  },
                  buscar: function(){
                      $.post(self.Url('home'), {
                          buscar_produto: vue_instance.buscar_produto,
                      },function(json){
                          vue_instance.produtos_list = json.produtos_list
                      },'json');
                  },
                  print: function () {
                      $.post(self.Url('boleto'), {
                          list: vue_instance.produtos_list
                      }, function (r) {
                          App.print(r.list);
                      });
                  },
              },
              computed: {
                  pagination_total: function () {
                      return this.produtos_list.length;
                  },
              },
          });
      }
  });
}