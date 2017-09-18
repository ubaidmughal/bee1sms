/*------------------------------------*\
    FORM VALIDATION PLUGIN V1.0.2 (https://github.com/Snapgle/Snapkit-Validation/)
    Automatically validate each form in the page

    Copyright (c) 2016 Snapgle (https://snapgle.com)

    Licensed under the MIT license (http://www.opensource.org/licenses/MIT)
\*------------------------------------*/
formvalidator = (function($) {
  var snapkitValidation = function(element){
    this.element = element;

    this.validate();
  }

  //Call a function of the plugin from outside
  snapkitValidation.prototype.validate = function(){
    var validator = this, element = validator.element;

    var errors = element.find("[data-validate]");

    $i = 0;

    errors.each(function(){
      var error = $(this);

      var target = error.siblings("input, textarea, select").first();

      var info = error.data("validate").replace(/\s/g, "").split("|");
      var type = info[0];
      var param = info[1];

      //Run a test to see if the error is active or not
      var check = validator.check(error, target, type, param);
      if(!check) $i++;

      //Add an event listener (only the first time you submit)
      if(!element.hasClass("form-validator")){
        //Add event listener on input change
        target.on("change, blur", function(){
          validator.check(error, target, type, param);
        });

        //Add the event listener even on the other match input
        if(type == "match"){
          $(param).on("change, blur", function(){
            validator.check(error, target, type, param);
          });
        }

        //On key up event listener, if the listener is not an ajax
        if(type != "ajax"){
          target.on("keyup", function(){
            validator.check(error, target, type, param);
          });

          //Add the event listener even on the other match input
          if(type == "match"){
            $(param).on("keyup", function(){
              validator.check(error, target, type, param);
            });
          }
        }
      }
    });

    //Set the event listener so that it won't update the event listeners
    element.addClass("form-validator");

    return $i;
  }

  snapkitValidation.prototype.check = function(error, input, type, param){
    var validator = this, element = validator.element;

    //Run the relative check function
    var check = validator["check_"+type].call(validator, error, input, param);

    //Ther is an error -> The form is invalid, it won't be submitted
    if(!check){
      element.removeClass("form--valid");
    }

    this.check_danger(input);

    return check;
  }

  snapkitValidation.prototype.check_danger = function(input){
    var danger = false;
    input.siblings(".form__group__info").each(function(){
      if(!$(this).hasClass("form__group__info--valid") && !$(this).hasClass("form__group__info--default")){
        danger = true;
      }
    });

    if(danger){
      input.parent().addClass("form__group--danger");
    }else{
      input.parent().removeClass("form__group--danger");
    }
  }

  //Check if the value is not null
  snapkitValidation.prototype.check_required = function(error, input){
    var validator = this;

    //The input is not filled
    if(input.val().length == 0){
      error.removeClass("form__group__info--valid");

      return false;
    }else{
      error.addClass("form__group__info--valid");

      return true;
    }
  }

  //Check if the e-mail is valid
  snapkitValidation.prototype.check_email = function(error, input){
    var validator = this;

    if(!/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/gi.test(input.val())){
      error.removeClass("form__group__info--valid");

      return false;
    }else{
      error.addClass("form__group__info--valid");

      return true;
    }
  }

  //Check if the value is a number
  snapkitValidation.prototype.check_number = function(error, input){
    var validator = this;

    if(!/[0-9]/gi.test(input.val())){
      error.removeClass("form__group__info--valid");

      return false;
    }else{
      error.addClass("form__group__info--valid");

      return true;
    }
  }

  //Check if the value is a website
  snapkitValidation.prototype.check_website = function(error, input){
    var validator = this;

    if(!/[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/gi.test(input.val())){
      error.removeClass("form__group__info--valid");

      return false;
    }else{
      error.addClass("form__group__info--valid");

      return true;
    }
  }

  //Check if the value is enought long
  snapkitValidation.prototype.check_minLenght = function(error, input, param){
    var validator = this;

    if(input.val().length < param){
      error.removeClass("form__group__info--valid");

      return false;
    }else{
      error.addClass("form__group__info--valid");

      return true;
    }
  }

  //Check if the value is too long
  snapkitValidation.prototype.check_maxLenght = function(error, input, param){
    var validator = this;

    if(input.val().length > param){
      error.removeClass("form__group__info--valid");

      return false;
    }else{
      error.addClass("form__group__info--valid");

      return true;
    }
  }

  //Check if 2 fields match
  snapkitValidation.prototype.check_match = function(error, input, param){
    var validator = this;

    if(input.val() != $(param).val()){
      error.removeClass("form__group__info--valid");

      return false;
    }else{
      error.addClass("form__group__info--valid");

      return true;
    }
  }

  //Check if the pattern is valid
  snapkitValidation.prototype.check_pattern = function(error, input, param){
    var validator = this;

    pattern = stringToRegexp(param);

    if(!pattern.test(input.val())){
      error.removeClass("form__group__info--valid");

      return false;
    }else{
      error.addClass("form__group__info--valid");

      return true;
    }
  }

  //Run ajax call that returns 1 = true or 0 = false
  snapkitValidation.prototype.check_ajax = function(error, input, info){
    var validator = this;

    var $returnVal = false;
    $.ajaxSetup({async: false});
    $.post(info, {data: input.val()}).success(function(res){
      if(res == 1){
        error.addClass("form__group__info--valid");

        $returnVal = true;
      }else{
        error.removeClass("form__group__info--valid");
      }
    });

    return $returnVal;
  }

  $.fn.snapkitValidation = function(e){
    var ev = e;
    return this.each(function(){
      var form = $(this);

      form.addClass("form--valid");

      var controller = new snapkitValidation(form);

      //Prevent form from being submitted
      if(!form.hasClass("form--valid")){
        ev.preventDefault();
      }
    });
  };

  $(document).on("submit", "form", function(e){
    //From now it will validate the form, even on input update
    $(this).snapkitValidation(e);

    $(this).closest(".form").find('.form__group--danger').first().find("input,textarea,select").focus();
  });

  //Return the correct pattern
  function stringToRegexp(str){
    var flags = str.replace(/.*\/([gimuy]*)$/, '$1');
    if(flags === str) flags = '';
    var pattern = (flags ? str.replace(new RegExp('^/(.*?)/' + flags + '$'), '$1') : str);
    try { return new RegExp(pattern, flags); } catch (e) { return null; }
  }
})(jQuery);
/* END OF VALIDATION PLUGIN */
