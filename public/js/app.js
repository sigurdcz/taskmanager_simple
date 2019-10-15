/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ./jquery/simplesorting */ "./resources/js/jquery/simplesorting.js");

/***/ }),

/***/ "./resources/js/jquery/simplesorting.js":
/*!**********************************************!*\
  !*** ./resources/js/jquery/simplesorting.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function getPaginationInputData() {
  var term = $('#search').val();
  var column_name = $('#hidden_column_name').val();
  var sort_type = $('#hidden_sort_type').val();
  var page = $('#hidden_page').val();
  var take = $('#take_page').val();
  return {
    term: term,
    column_name: column_name,
    sort_type: sort_type,
    page: page,
    take: take
  };
}

$(document).ready(function () {
  // f
  fetch_data(1, 'asc', 'id', '', 5);
  $(document).on('click', '.sorting', function (event) {
    var new_column_name = $(this).attr('data-column_name');
    var current_sort_type = $('#hidden_sort_type').val();
    var new_sort_type;

    if (current_sort_type === 'asc') {
      new_sort_type = 'desc';
    } else {
      new_sort_type = 'asc';
    }

    $('#hidden_column_name').val(new_column_name);
    $('#hidden_sort_type').val(new_sort_type);

    var _getPaginationInputDa = getPaginationInputData(),
        term = _getPaginationInputDa.term,
        column_name = _getPaginationInputDa.column_name,
        sort_type = _getPaginationInputDa.sort_type,
        page = _getPaginationInputDa.page,
        take = _getPaginationInputDa.take;

    fetch_data(page ? page : '1', sort_type ? sort_type : 'asc', column_name ? column_name : 'id', term ? term : '', take ? take : 5);
  });
  $(document).on('click', '.pagination a', function (event) {
    event.preventDefault();
    $('li').removeClass('active');
    $(this).parent('li').addClass('active');
    var page = $(this).attr('href').split('page=')[1];
    $('#hidden_page').val(page);

    var _getPaginationInputDa2 = getPaginationInputData(),
        term = _getPaginationInputDa2.term,
        column_name = _getPaginationInputDa2.column_name,
        sort_type = _getPaginationInputDa2.sort_type,
        page = _getPaginationInputDa2.page,
        take = _getPaginationInputDa2.take;

    fetch_data(page ? page : '1', sort_type ? sort_type : 'asc', column_name ? column_name : 'id', term ? term : '', take ? take : '');
  });
  $(document).on('change', '#take_page', function () {
    var _getPaginationInputDa3 = getPaginationInputData(),
        term = _getPaginationInputDa3.term,
        column_name = _getPaginationInputDa3.column_name,
        sort_type = _getPaginationInputDa3.sort_type,
        page = _getPaginationInputDa3.page,
        take = _getPaginationInputDa3.take;

    fetch_data(page ? page : '1', sort_type ? sort_type : 'asc', column_name ? column_name : 'id', term ? term : '', take ? take : '');
  });
  $(document).on('keyup', '#search', function () {
    var _getPaginationInputDa4 = getPaginationInputData(),
        term = _getPaginationInputDa4.term,
        column_name = _getPaginationInputDa4.column_name,
        sort_type = _getPaginationInputDa4.sort_type,
        page = _getPaginationInputDa4.page,
        take = _getPaginationInputDa4.take;

    fetch_data(page ? page : '1', sort_type ? sort_type : 'asc', column_name ? column_name : 'id', term ? term : '', take ? take : '');
  });

  function fetch_data(page, sort_type, sort_by, term, take) {
    var url = "/api/ajax-tasks?page=" + page + "&sortby=" + sort_by + "&sorttype=" + sort_type + "&term=" + term + "&take=" + take;
    var ajaxData = {
      url: url,
      success: function success(data) {
        $("#js_items").empty().html(data);
      }
    };
    $.ajax(ajaxData);
  }
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! E:\LEKSYS\projekty\tm\taskmanager_simple\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! E:\LEKSYS\projekty\tm\taskmanager_simple\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });