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
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./bower_components/lobilist/demo/demo.js":
/*!************************************************!*\
  !*** ./bower_components/lobilist/demo/demo.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Created by Zura on 4/5/2016.
 */
$(function () {
 

    //Basic example
    $('#todo-lists-basic-demo').lobiList({
        lists: [
            {
                title: 'TODO',
                defaultStyle: 'lobilist-info',
                items: [
                    {
                        title: 'Floor cool cinders',
                        description: 'Thunder fulfilled travellers folly, wading, lake.',
                        dueDate: '2015-01-31'
                    },
                    {
                        title: 'Periods pride',
                        description: 'Accepted was mollis',
                        done: true
                    },
                    {
                        title: 'Flags better burns pigeon',
                        description: 'Rowed cloven frolic thereby, vivamus pining gown intruding strangers prank treacherously darkling.'
                    },
                    {
                        title: 'Accepted was mollis',
                        description: 'Rowed cloven frolic thereby, vivamus pining gown intruding strangers prank treacherously darkling.',
                        dueDate: '2015-02-02'
                    }
                ]
            },
            {
                title: 'DOING',
                items: [
                    {
                        title: 'Composed trays',
                        description: 'Hoary rattle exulting suspendisse elit paradises craft wistful. Bayonets allures prefer traits wrongs flushed. Tent wily matched bold polite slab coinage celerities gales beams.'
                    },
                    {
                        title: 'Chic leafy'
                    },
                    {
                        title: 'Guessed interdum armies chirp writhes most',
                        description: 'Came champlain live leopards twilight whenever warm read wish squirrel rock.',
                        dueDate: '2015-02-04',
                        done: true
                    }
                ]
            }
        ]
    });
    //Custom datepicker
    $('#todo-lists-demo-datepicker').lobiList({
        lists: [
            {
                title: 'TODO',
                defaultStyle: 'lobilist-info',
                items: [
                    {
                        title: 'Floor cool cinders',
                        description: 'Thunder fulfilled travellers folly, wading, lake.',
                        dueDate: '2015-01-31'
                    }
                ]
            }
        ],
        afterListAdd: function(lobilist, list){
            var $dueDateInput = list.$el.find('form [name=dueDate]');
            $dueDateInput.datepicker();
        }
    });
    // Event handling
    (function () {
        var list;

        $('#todo-lists-initialize-btn').click(function () {
            list = $('#todo-lists-demo-events')
                .lobiList({
                    init: function () {
                        Lobibox.notify('default', {
                            msg: 'init'
                        });
                    },
                    beforeDestroy: function () {
                        Lobibox.notify('default', {
                            msg: 'beforeDestroy'
                        });
                    },
                    afterDestroy: function () {
                        Lobibox.notify('default', {
                            msg: 'afterDestroy'
                        });
                    },
                    beforeListAdd: function () {
                        Lobibox.notify('default', {
                            msg: 'beforeListAdd'
                        });
                    },
                    afterListAdd: function () {
                        Lobibox.notify('default', {
                            msg: 'afterListAdd'
                        });
                    },
                    beforeListRemove: function () {
                        Lobibox.notify('default', {
                            msg: 'beforeListRemove'
                        });
                    },
                    afterListRemove: function () {
                        Lobibox.notify('default', {
                            msg: 'afterListRemove'
                        });
                    },
                    beforeItemAdd: function () {
                        Lobibox.notify('default', {
                            msg: 'beforeItemAdd'
                        });
                    },
                    afterItemAdd: function () {
                        console.log(arguments);
                        Lobibox.notify('default', {
                            msg: 'afterItemAdd'
                        });
                    },
                    beforeItemUpdate: function () {
                        Lobibox.notify('default', {
                            msg: 'beforeItemUpdate'
                        });
                    },
                    afterItemUpdate: function () {
                        console.log(arguments);
                        Lobibox.notify('default', {
                            msg: 'afterItemUpdate'
                        });
                    },
                    beforeItemDelete: function () {
                        Lobibox.notify('default', {
                            msg: 'beforeItemDelete'
                        });
                    },
                    afterItemDelete: function () {
                        Lobibox.notify('default', {
                            msg: 'afterItemDelete'
                        });
                    },
                    beforeListDrop: function () {
                        Lobibox.notify('default', {
                            msg: 'beforeListDrop'
                        });
                    },
                    afterListReorder: function () {
                        Lobibox.notify('default', {
                            msg: 'afterListReorder'
                        });
                    },
                    beforeItemDrop: function () {
                        Lobibox.notify('default', {
                            msg: 'beforeItemDrop'
                        });
                    },
                    afterItemReorder: function () {
                        Lobibox.notify('default', {
                            msg: 'afterItemReorder'
                        });
                    },
                    afterMarkAsDone: function () {
                        Lobibox.notify('default', {
                            msg: 'afterMarkAsDone'
                        });
                    },
                    afterMarkAsUndone: function () {
                        Lobibox.notify('default', {
                            msg: 'afterMarkAsUndone'
                        });
                    },
                    styleChange: function(list, oldStyle, newStyle){
                        console.log(arguments);
                        Lobibox.notify('default', {
                            msg: 'styleChange: Old style - "'+oldStyle+'". New style - "'+ newStyle +'"'
                        });
                    },
                    titleChange: function(list, oldTitle, newTitle){
                        console.log(arguments);
                        Lobibox.notify('default', {
                            msg: 'titleChange: Old title - "'+oldTitle+'". New title - "'+ newTitle + '"'
                        });
                    },
                    lists: [
                        {
                            title: 'TODO',
                            defaultStyle: 'lobilist-info',
                            items: [
                                {
                                    title: 'Floor cool cinders',
                                    description: 'Thunder fulfilled travellers folly, wading, lake.',
                                    dueDate: '2015-01-31'
                                },
                                {
                                    title: 'Periods pride',
                                    description: 'Accepted was mollis',
                                    done: true
                                },
                                {
                                    title: 'Flags better burns pigeon',
                                    description: 'Rowed cloven frolic thereby, vivamus pining gown intruding strangers prank ' +
                                    'treacherously darkling.'
                                },
                                {
                                    title: 'Accepted was mollis',
                                    description: 'Rowed cloven frolic thereby, vivamus pining gown intruding strangers prank ' +
                                    'treacherously darkling.',
                                    dueDate: '2015-02-02'
                                }
                            ]
                        }
                    ]
                })
                .data('lobiList');
        });

        $('#todo-lists-destroy-btn').click(function () {
            list.destroy();
        });
    })();
    // Custom controls
    $('#todo-lists-demo-controls').lobiList({
        lists: [
            {
                title: 'TODO',
                defaultStyle: 'lobilist-info',
                controls: ['edit', 'styleChange'],
                items: [
                    {
                        title: 'Floor cool cinders',
                        description: 'Thunder fulfilled travellers folly, wading, lake.',
                        dueDate: '2015-01-31'
                    }
                ]
            },
            {
                title: 'Disabled custom checkboxes',
                defaultStyle: 'lobilist-danger',
                controls: ['edit', 'add', 'remove'],
                useLobicheck: false,
                items: [
                    {
                        title: 'Periods pride',
                        description: 'Accepted was mollis',
                        done: true
                    }
                ]
            },
            {
                title: 'Controls disabled',
                controls: false,
                items: [
                    {
                        title: 'Composed trays',
                        description: 'Hoary rattle exulting suspendisse elit paradises craft wistful. ' +
                        'Bayonets allures prefer traits wrongs flushed. Tent wily matched bold polite slab coinage ' +
                        'celerities gales beams.'
                    }
                ]
            },
            {
                title: 'Disabled todo edit/remove',
                enableTodoRemove: false,
                enableTodoEdit: false,
                items: [
                    {
                        title: 'Composed trays',
                        description: 'Hoary rattle exulting suspendisse elit paradises craft wistful. ' +
                        'Bayonets allures prefer traits wrongs flushed. Tent wily matched bold polite slab coinage ' +
                        'celerities gales beams.'
                    }
                ]
            }
        ]
    });
    // Disabled drag & drop
    $('#todo-lists-demo-sorting').lobiList({
        sortable: false,
        lists: [
            {
                title: 'TODO',
                defaultStyle: 'lobilist-info',
                controls: ['edit', 'styleChange'],
                items: [
                    {
                        title: 'Floor cool cinders',
                        description: 'Thunder fulfilled travellers folly, wading, lake.',
                        dueDate: '2015-01-31'
                    }
                ]
            },
            {
                title: 'Controls disabled',
                controls: false,
                items: [
                    {
                        title: 'Composed trays',
                        description: 'Hoary rattle exulting suspendisse elit paradises craft wistful. Bayonets allures prefer traits wrongs flushed. Tent wily matched bold polite slab coinage celerities gales beams.'
                    }
                ]
            }
        ]
    });

    $('#actions-by-ajax').lobiList({
        actions: {
            load: 'demo/example1/load.json',
            insert: 'demo/example1/insert.php',
            delete: 'demo/example1/delete.php',
            update: 'demo/example1/update.php'
        },
        afterItemAdd: function(){
            console.log(arguments);
        }
    });
});

/***/ }),

/***/ 6:
/*!******************************************************!*\
  !*** multi ./bower_components/lobilist/demo/demo.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/vagrant/code/telefonia20/bower_components/lobilist/demo/demo.js */"./bower_components/lobilist/demo/demo.js");


/***/ })

/******/ });