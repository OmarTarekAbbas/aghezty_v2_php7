(function (global, factory) {
  if (typeof define === "function" && define.amd) {
    define(["exports"], factory);
  } else if (typeof exports !== "undefined") {
    factory(exports);
  } else {
    var mod = {
      exports: {}
    };
    factory(mod.exports);
    global.checkAll = mod.exports;
  }
})(this, function (_exports) {
  "use strict";

  Object.defineProperty(_exports, "__esModule", {
    value: true
  });
  _exports.default = subscribe;

  function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _nonIterableRest(); }

  function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance"); }

  function _iterableToArrayLimit(arr, i) { var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

  function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

  function subscribe(container) {
    var shiftKey = false;
    var lastCheckbox = null;
    container.addEventListener('mousedown', onMouseDown);
    container.addEventListener('change', onChange);

    function setChecked(target, input, checked) {
      var indeterminate = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : false;
      if (!(input instanceof HTMLInputElement)) return;
      input.indeterminate = indeterminate;

      if (input.checked !== checked) {
        input.checked = checked;
        setTimeout(function () {
          var event = new CustomEvent('change', {
            bubbles: true,
            cancelable: false,
            detail: {
              relatedTarget: target
            }
          });
          input.dispatchEvent(event);
        });
      }
    }

    function onChange(event) {
      var target = event.target;
      if (!(target instanceof Element)) return;

      if (target.hasAttribute('data-check-all')) {
        onCheckAll(event);
      } else if (target.hasAttribute('data-check-all-item')) {
        onCheckAllItem(event);
      }
    }

    function onCheckAll(event) {
      if (event instanceof CustomEvent && event.detail) {
        var relatedTarget = event.detail.relatedTarget;

        if (relatedTarget && relatedTarget.hasAttribute('data-check-all-item')) {
          return;
        }
      }

      var target = event.target;
      if (!(target instanceof HTMLInputElement)) return;
      lastCheckbox = null;
      var _iteratorNormalCompletion = true;
      var _didIteratorError = false;
      var _iteratorError = undefined;

      try {
        for (var _iterator = container.querySelectorAll('[data-check-all-item]')[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
          var input = _step.value;
          setChecked(target, input, target.checked);
        }
      } catch (err) {
        _didIteratorError = true;
        _iteratorError = err;
      } finally {
        try {
          if (!_iteratorNormalCompletion && _iterator.return != null) {
            _iterator.return();
          }
        } finally {
          if (_didIteratorError) {
            throw _iteratorError;
          }
        }
      }

      target.indeterminate = false;
      updateCount();
    }

    function onMouseDown(event) {
      if (!(event.target instanceof Element)) return;

      if (event.target.hasAttribute('data-check-all-item')) {
        shiftKey = event.shiftKey;
      }
    }

    function onCheckAllItem(event) {
      if (event instanceof CustomEvent && event.detail) {
        var relatedTarget = event.detail.relatedTarget;

        if (relatedTarget && (relatedTarget.hasAttribute('data-check-all') || relatedTarget.hasAttribute('data-check-all-item'))) {
          return;
        }
      }

      var target = event.target;
      if (!(target instanceof HTMLInputElement)) return;
      var itemCheckboxes = Array.from(container.querySelectorAll('[data-check-all-item]'));

      if (shiftKey && lastCheckbox) {
        var _sort = [itemCheckboxes.indexOf(lastCheckbox), itemCheckboxes.indexOf(target)].sort(),
            _sort2 = _slicedToArray(_sort, 2),
            start = _sort2[0],
            end = _sort2[1];

        var _iteratorNormalCompletion2 = true;
        var _didIteratorError2 = false;
        var _iteratorError2 = undefined;

        try {
          for (var _iterator2 = itemCheckboxes.slice(start, +end + 1 || 9e9)[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
            var input = _step2.value;
            setChecked(target, input, target.checked);
          }
        } catch (err) {
          _didIteratorError2 = true;
          _iteratorError2 = err;
        } finally {
          try {
            if (!_iteratorNormalCompletion2 && _iterator2.return != null) {
              _iterator2.return();
            }
          } finally {
            if (_didIteratorError2) {
              throw _iteratorError2;
            }
          }
        }
      }

      shiftKey = false;
      lastCheckbox = target;
      var allCheckbox = container.querySelector('[data-check-all]');

      if (allCheckbox) {
        var total = itemCheckboxes.length;
        var count = itemCheckboxes.filter(function (checkbox) {
          return checkbox instanceof HTMLInputElement && checkbox.checked;
        }).length;
        var checked = count === total;
        var indeterminate = total > count && count > 0;
        setChecked(target, allCheckbox, checked, indeterminate);
      }

      updateCount();
    }

    function updateCount() {
      // Update count of optional `[data-check-all-count]` element.
      var countContainer = container.querySelector('[data-check-all-count]');

      if (countContainer) {
        var count = container.querySelectorAll('[data-check-all-item]:checked').length;
        countContainer.textContent = count.toString();
      }
    }

    return {
      unsubscribe: function unsubscribe() {
        container.removeEventListener('mousedown', onMouseDown);
        container.removeEventListener('change', onChange);
      }
    };
  }
});
