
    'use strict';
    var multiItemSlider = (function () {
		setTimeout(function(){},0);
      return function (selector, config) {
        var
          _mainElement = document.querySelector(selector), // ???????? ??????? ?????
          _sliderWrapper = _mainElement.querySelector('.slider__wrapper'), // ??????? ??? .slider-item
          _sliderItems = _mainElement.querySelectorAll('.slider__item'), // ???????? (.slider-item)
          _sliderControls = _mainElement.querySelectorAll('.slider__control'), // ???????? ??????????
          _sliderControlLeft = _mainElement.querySelector('.slider__control_left'), // ?????? "LEFT"
          _sliderControlRight = _mainElement.querySelector('.slider__control_right'), // ?????? "RIGHT"
          _wrapperWidth = parseFloat(getComputedStyle(_sliderWrapper).width), // ?????? ???????
          _itemWidth = parseFloat(getComputedStyle(_sliderItems[0]).width), // ?????? ?????? ????????    
          _positionLeftItem = 0, // ??????? ?????? ????????? ????????
          _transform = 0, // ???????? ?????????????? .slider_wrapper
          _step = _itemWidth / _wrapperWidth * 100, // ???????? ???? (??? ?????????????)
          _items = []; // ?????? ?????????

        // ?????????? ??????? _items
        _sliderItems.forEach(function (item, index) {
          _items.push({ item: item, position: index, transform: 0 });
        });
        var position = {
          getItemMin: function () {
            var indexItem = 0;
            _items.forEach(function (item, index) {
              if (item.position < _items[indexItem].position) {
                indexItem = index;
              }
            });
            return indexItem;
          },
          getItemMax: function () {
            var indexItem = 0;
            _items.forEach(function (item, index) {
              if (item.position > _items[indexItem].position) {
                indexItem = index;
              }
            });
            return indexItem;
          },
          getMin: function () {
            return _items[position.getItemMin()].position;
          },
          getMax: function () {
            return _items[position.getItemMax()].position;
          }
        }

        var _transformItem = function (direction) {
          var nextItem;
          if (direction === 'right') {
            _positionLeftItem++;
            if ((_positionLeftItem + _wrapperWidth / _itemWidth - 1) > position.getMax()) {
              nextItem = position.getItemMin();
              _items[nextItem].position = position.getMax() + 1;
              _items[nextItem].transform += _items.length * 100;
              _items[nextItem].item.style.transform = 'translateX(' + _items[nextItem].transform + '%)';
            }
            _transform -= _step;
          }
          if (direction === 'left') {
            _positionLeftItem--;
            if (_positionLeftItem < position.getMin()) {
              nextItem = position.getItemMax();
              _items[nextItem].position = position.getMin() - 1;
              _items[nextItem].transform -= _items.length * 100;
              _items[nextItem].item.style.transform = 'translateX(' + _items[nextItem].transform + '%)';
            }
            _transform += _step;
          }
          _sliderWrapper.style.transform = 'translateX(' + _transform + '%)';
        }

        // ?????????? ??????? click ??? ?????? "?????" ? "??????"
        var _controlClick = function (e) {
          var direction = this.classList.contains('slider__control_right') ? 'right' : 'left';
          e.preventDefault();
          _transformItem(direction);
        };

        var _setUpListeners = function () {
          // ?????????? ? ??????? "?????" ? "??????" ?????????? _controlClick ??? ?????? click
          _sliderControls.forEach(function (item) {
            item.addEventListener('click', _controlClick);
          });
        }

        // ?????????????
        _setUpListeners();

        return {
          right: function () { // ????? right
            _transformItem('right');
          },
          left: function () { // ????? left
            _transformItem('left');
          }
        }

      }
    }());

    var slider = multiItemSlider('.slider')