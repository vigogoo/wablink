'use strict';

const app = angular
  .module('TextEditorApp', [])
  .directive('textEditor', function() {
    return {
        restrict : "A",
        require : 'ngModel',
        //replace : true,
        transclude : true,
        //template : '<div><textarea></textarea></div>',
        link : function(scope, element, attrs, ctrl) {
          
          //console.log($.fn.wysihtml5.defaultOptions);
          
          var $element = $(element);

          var textarea = $element.wysihtml5({
            
            parserRules : {
              tags: {
                strong : {},
                b :      {},
                i :      {},
                em :     {},
                br :     {}
              }
            },

            toolbar : {
              "font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
              "emphasis": true, //Italics, bold, etc. Default true
              "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
              "html": false, //Button which allows you to edit the generated HTML. Default false
              "link": false, //Button to insert a link. Default true
              "image": false, //Button to insert an image. Default true,
              "color": false, //Button to change color of font  
              "blockquote": false, //Blockquote  
              "size": 'none' //default: none, other options are xs, sm, lg
            }
            
          });
          
          var wysihtml5Editor = $element.data();
          
          //problem:
          console.log($(textarea).data('wysihtml5'));

          var editor = $(textarea).data('wysihtml5').editor;

          //view -> model
          editor.on('change', function() {
              if(editor.getValue())
              scope.$apply(function() {
                  ctrl.$setViewValue(editor.getValue());
              });
          });

          //model -> view
          ctrl.$render = function() {
            textarea.html(ctrl.$viewValue);
            editor.setValue(ctrl.$viewValue);
          };

          ctrl.$render();
        }
    };
});

app.controller('TextEditorController', function($scope) {
  
  const vm = this;
  
  angular.extend(this, {
    text : 'Test <div>It<div/>'
  });
  
});