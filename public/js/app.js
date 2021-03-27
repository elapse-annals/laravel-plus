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
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nError: Cannot find module '/Users/amy/Code/laravel-plus/node_modules/@babel/compat-data/data/corejs3-shipped-proposals'\n    at createEsmNotFoundErr (node:internal/modules/cjs/loader:951:15)\n    at finalizeEsmResolution (node:internal/modules/cjs/loader:944:15)\n    at resolveExports (node:internal/modules/cjs/loader:473:14)\n    at Function.Module._findPath (node:internal/modules/cjs/loader:513:31)\n    at Function.Module._resolveFilename (node:internal/modules/cjs/loader:910:27)\n    at Function.Module._load (node:internal/modules/cjs/loader:769:27)\n    at Module.require (node:internal/modules/cjs/loader:996:19)\n    at require (/Users/amy/Code/laravel-plus/node_modules/v8-compile-cache/v8-compile-cache.js:161:20)\n    at Object.<anonymous> (/Users/amy/Code/laravel-plus/node_modules/@babel/preset-env/lib/polyfills/corejs3/usage-plugin.js:10:55)\n    at Module._compile (/Users/amy/Code/laravel-plus/node_modules/v8-compile-cache/v8-compile-cache.js:192:30)\n    at Object.Module._extensions..js (node:internal/modules/cjs/loader:1121:10)\n    at Module.load (node:internal/modules/cjs/loader:972:32)\n    at Function.Module._load (node:internal/modules/cjs/loader:813:14)\n    at Module.require (node:internal/modules/cjs/loader:996:19)\n    at require (/Users/amy/Code/laravel-plus/node_modules/v8-compile-cache/v8-compile-cache.js:161:20)\n    at Object.<anonymous> (/Users/amy/Code/laravel-plus/node_modules/@babel/preset-env/lib/index.js:29:44)\n    at Module._compile (/Users/amy/Code/laravel-plus/node_modules/v8-compile-cache/v8-compile-cache.js:192:30)\n    at Object.Module._extensions..js (node:internal/modules/cjs/loader:1121:10)\n    at Module.load (node:internal/modules/cjs/loader:972:32)\n    at Function.Module._load (node:internal/modules/cjs/loader:813:14)\n    at Module.require (node:internal/modules/cjs/loader:996:19)\n    at require (/Users/amy/Code/laravel-plus/node_modules/v8-compile-cache/v8-compile-cache.js:161:20)\n    at requireModule (/Users/amy/Code/laravel-plus/node_modules/@babel/core/lib/config/files/plugins.js:165:12)\n    at loadPreset (/Users/amy/Code/laravel-plus/node_modules/@babel/core/lib/config/files/plugins.js:83:17)\n    at createDescriptor (/Users/amy/Code/laravel-plus/node_modules/@babel/core/lib/config/config-descriptors.js:154:9)\n    at /Users/amy/Code/laravel-plus/node_modules/@babel/core/lib/config/config-descriptors.js:109:50\n    at Array.map (<anonymous>)\n    at createDescriptors (/Users/amy/Code/laravel-plus/node_modules/@babel/core/lib/config/config-descriptors.js:109:29)\n    at createPresetDescriptors (/Users/amy/Code/laravel-plus/node_modules/@babel/core/lib/config/config-descriptors.js:101:10)\n    at /Users/amy/Code/laravel-plus/node_modules/@babel/core/lib/config/config-descriptors.js:58:104\n    at cachedFunction (/Users/amy/Code/laravel-plus/node_modules/@babel/core/lib/config/caching.js:62:27)\n    at cachedFunction.next (<anonymous>)\n    at evaluateSync (/Users/amy/Code/laravel-plus/node_modules/gensync/index.js:244:28)\n    at sync (/Users/amy/Code/laravel-plus/node_modules/gensync/index.js:84:14)\n    at presets (/Users/amy/Code/laravel-plus/node_modules/@babel/core/lib/config/config-descriptors.js:29:84)\n    at mergeChainOpts (/Users/amy/Code/laravel-plus/node_modules/@babel/core/lib/config/config-chain.js:320:26)");

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

__webpack_require__(/*! /Users/amy/Code/laravel-plus/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /Users/amy/Code/laravel-plus/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });