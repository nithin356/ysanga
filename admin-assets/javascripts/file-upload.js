var FileUploadWithPreview = (function () {
  "use strict";
  var A,
    e =
      ((function (A) {
        var e = (function (A) {
          var e,
            t = Object.prototype,
            g = t.hasOwnProperty,
            n = "function" == typeof Symbol ? Symbol : {},
            i = n.iterator || "@@iterator",
            B = n.asyncIterator || "@@asyncIterator",
            E = n.toStringTag || "@@toStringTag";
          function r(A, e, t, g) {
            var n = e && e.prototype instanceof c ? e : c,
              i = Object.create(n.prototype),
              B = new k(g || []);
            return (
              (i._invoke = (function (A, e, t) {
                var g = o;
                return function (n, i) {
                  if (g === Q) throw new Error("Generator is already running");
                  if (g === a) {
                    if ("throw" === n) throw i;
                    return R();
                  }
                  for (t.method = n, t.arg = i; ; ) {
                    var B = t.delegate;
                    if (B) {
                      var E = S(B, t);
                      if (E) {
                        if (E === s) continue;
                        return E;
                      }
                    }
                    if ("next" === t.method) t.sent = t._sent = t.arg;
                    else if ("throw" === t.method) {
                      if (g === o) throw ((g = a), t.arg);
                      t.dispatchException(t.arg);
                    } else "return" === t.method && t.abrupt("return", t.arg);
                    g = Q;
                    var r = C(A, e, t);
                    if ("normal" === r.type) {
                      if (((g = t.done ? a : I), r.arg === s)) continue;
                      return { value: r.arg, done: t.done };
                    }
                    "throw" === r.type &&
                      ((g = a), (t.method = "throw"), (t.arg = r.arg));
                  }
                };
              })(A, t, B)),
              i
            );
          }
          function C(A, e, t) {
            try {
              return { type: "normal", arg: A.call(e, t) };
            } catch (A) {
              return { type: "throw", arg: A };
            }
          }
          A.wrap = r;
          var o = "suspendedStart",
            I = "suspendedYield",
            Q = "executing",
            a = "completed",
            s = {};
          function c() {}
          function u() {}
          function l() {}
          var h = {};
          h[i] = function () {
            return this;
          };
          var m = Object.getPrototypeOf,
            f = m && m(m(J([])));
          f && f !== t && g.call(f, i) && (h = f);
          var d = (l.prototype = c.prototype = Object.create(h));
          function p(A) {
            ["next", "throw", "return"].forEach(function (e) {
              A[e] = function (A) {
                return this._invoke(e, A);
              };
            });
          }
          function v(A) {
            var e;
            this._invoke = function (t, n) {
              function i() {
                return new Promise(function (e, i) {
                  !(function e(t, n, i, B) {
                    var E = C(A[t], A, n);
                    if ("throw" !== E.type) {
                      var r = E.arg,
                        o = r.value;
                      return o && "object" == typeof o && g.call(o, "__await")
                        ? Promise.resolve(o.__await).then(
                            function (A) {
                              e("next", A, i, B);
                            },
                            function (A) {
                              e("throw", A, i, B);
                            }
                          )
                        : Promise.resolve(o).then(
                            function (A) {
                              (r.value = A), i(r);
                            },
                            function (A) {
                              return e("throw", A, i, B);
                            }
                          );
                    }
                    B(E.arg);
                  })(t, n, e, i);
                });
              }
              return (e = e ? e.then(i, i) : i());
            };
          }
          function S(A, t) {
            var g = A.iterator[t.method];
            if (g === e) {
              if (((t.delegate = null), "throw" === t.method)) {
                if (
                  A.iterator.return &&
                  ((t.method = "return"),
                  (t.arg = e),
                  S(A, t),
                  "throw" === t.method)
                )
                  return s;
                (t.method = "throw"),
                  (t.arg = new TypeError(
                    "The iterator does not provide a 'throw' method"
                  ));
              }
              return s;
            }
            var n = C(g, A.iterator, t.arg);
            if ("throw" === n.type)
              return (
                (t.method = "throw"), (t.arg = n.arg), (t.delegate = null), s
              );
            var i = n.arg;
            return i
              ? i.done
                ? ((t[A.resultName] = i.value),
                  (t.next = A.nextLoc),
                  "return" !== t.method && ((t.method = "next"), (t.arg = e)),
                  (t.delegate = null),
                  s)
                : i
              : ((t.method = "throw"),
                (t.arg = new TypeError("iterator result is not an object")),
                (t.delegate = null),
                s);
          }
          function y(A) {
            var e = { tryLoc: A[0] };
            1 in A && (e.catchLoc = A[1]),
              2 in A && ((e.finallyLoc = A[2]), (e.afterLoc = A[3])),
              this.tryEntries.push(e);
          }
          function w(A) {
            var e = A.completion || {};
            (e.type = "normal"), delete e.arg, (A.completion = e);
          }
          function k(A) {
            (this.tryEntries = [{ tryLoc: "root" }]),
              A.forEach(y, this),
              this.reset(!0);
          }
          function J(A) {
            if (A) {
              var t = A[i];
              if (t) return t.call(A);
              if ("function" == typeof A.next) return A;
              if (!isNaN(A.length)) {
                var n = -1,
                  B = function t() {
                    for (; ++n < A.length; )
                      if (g.call(A, n))
                        return (t.value = A[n]), (t.done = !1), t;
                    return (t.value = e), (t.done = !0), t;
                  };
                return (B.next = B);
              }
            }
            return { next: R };
          }
          function R() {
            return { value: e, done: !0 };
          }
          return (
            (u.prototype = d.constructor = l),
            (l.constructor = u),
            (l[E] = u.displayName = "GeneratorFunction"),
            (A.isGeneratorFunction = function (A) {
              var e = "function" == typeof A && A.constructor;
              return (
                !!e &&
                (e === u || "GeneratorFunction" === (e.displayName || e.name))
              );
            }),
            (A.mark = function (A) {
              return (
                Object.setPrototypeOf
                  ? Object.setPrototypeOf(A, l)
                  : ((A.__proto__ = l), E in A || (A[E] = "GeneratorFunction")),
                (A.prototype = Object.create(d)),
                A
              );
            }),
            (A.awrap = function (A) {
              return { __await: A };
            }),
            p(v.prototype),
            (v.prototype[B] = function () {
              return this;
            }),
            (A.AsyncIterator = v),
            (A.async = function (e, t, g, n) {
              var i = new v(r(e, t, g, n));
              return A.isGeneratorFunction(t)
                ? i
                : i.next().then(function (A) {
                    return A.done ? A.value : i.next();
                  });
            }),
            p(d),
            (d[E] = "Generator"),
            (d[i] = function () {
              return this;
            }),
            (d.toString = function () {
              return "[object Generator]";
            }),
            (A.keys = function (A) {
              var e = [];
              for (var t in A) e.push(t);
              return (
                e.reverse(),
                function t() {
                  for (; e.length; ) {
                    var g = e.pop();
                    if (g in A) return (t.value = g), (t.done = !1), t;
                  }
                  return (t.done = !0), t;
                }
              );
            }),
            (A.values = J),
            (k.prototype = {
              constructor: k,
              reset: function (A) {
                if (
                  ((this.prev = 0),
                  (this.next = 0),
                  (this.sent = this._sent = e),
                  (this.done = !1),
                  (this.delegate = null),
                  (this.method = "next"),
                  (this.arg = e),
                  this.tryEntries.forEach(w),
                  !A)
                )
                  for (var t in this)
                    "t" === t.charAt(0) &&
                      g.call(this, t) &&
                      !isNaN(+t.slice(1)) &&
                      (this[t] = e);
              },
              stop: function () {
                this.done = !0;
                var A = this.tryEntries[0].completion;
                if ("throw" === A.type) throw A.arg;
                return this.rval;
              },
              dispatchException: function (A) {
                if (this.done) throw A;
                var t = this;
                function n(g, n) {
                  return (
                    (E.type = "throw"),
                    (E.arg = A),
                    (t.next = g),
                    n && ((t.method = "next"), (t.arg = e)),
                    !!n
                  );
                }
                for (var i = this.tryEntries.length - 1; i >= 0; --i) {
                  var B = this.tryEntries[i],
                    E = B.completion;
                  if ("root" === B.tryLoc) return n("end");
                  if (B.tryLoc <= this.prev) {
                    var r = g.call(B, "catchLoc"),
                      C = g.call(B, "finallyLoc");
                    if (r && C) {
                      if (this.prev < B.catchLoc) return n(B.catchLoc, !0);
                      if (this.prev < B.finallyLoc) return n(B.finallyLoc);
                    } else if (r) {
                      if (this.prev < B.catchLoc) return n(B.catchLoc, !0);
                    } else {
                      if (!C)
                        throw new Error(
                          "try statement without catch or finally"
                        );
                      if (this.prev < B.finallyLoc) return n(B.finallyLoc);
                    }
                  }
                }
              },
              abrupt: function (A, e) {
                for (var t = this.tryEntries.length - 1; t >= 0; --t) {
                  var n = this.tryEntries[t];
                  if (
                    n.tryLoc <= this.prev &&
                    g.call(n, "finallyLoc") &&
                    this.prev < n.finallyLoc
                  ) {
                    var i = n;
                    break;
                  }
                }
                i &&
                  ("break" === A || "continue" === A) &&
                  i.tryLoc <= e &&
                  e <= i.finallyLoc &&
                  (i = null);
                var B = i ? i.completion : {};
                return (
                  (B.type = A),
                  (B.arg = e),
                  i
                    ? ((this.method = "next"), (this.next = i.finallyLoc), s)
                    : this.complete(B)
                );
              },
              complete: function (A, e) {
                if ("throw" === A.type) throw A.arg;
                return (
                  "break" === A.type || "continue" === A.type
                    ? (this.next = A.arg)
                    : "return" === A.type
                    ? ((this.rval = this.arg = A.arg),
                      (this.method = "return"),
                      (this.next = "end"))
                    : "normal" === A.type && e && (this.next = e),
                  s
                );
              },
              finish: function (A) {
                for (var e = this.tryEntries.length - 1; e >= 0; --e) {
                  var t = this.tryEntries[e];
                  if (t.finallyLoc === A)
                    return this.complete(t.completion, t.afterLoc), w(t), s;
                }
              },
              catch: function (A) {
                for (var e = this.tryEntries.length - 1; e >= 0; --e) {
                  var t = this.tryEntries[e];
                  if (t.tryLoc === A) {
                    var g = t.completion;
                    if ("throw" === g.type) {
                      var n = g.arg;
                      w(t);
                    }
                    return n;
                  }
                }
                throw new Error("illegal catch attempt");
              },
              delegateYield: function (A, t, g) {
                return (
                  (this.delegate = {
                    iterator: J(A),
                    resultName: t,
                    nextLoc: g,
                  }),
                  "next" === this.method && (this.arg = e),
                  s
                );
              },
            }),
            A
          );
        })(A.exports);
        try {
          regeneratorRuntime = e;
        } catch (A) {
          Function("r", "regeneratorRuntime = r")(e);
        }
      })((A = { exports: {} }), A.exports),
      A.exports);
  function t(A, e, t, g, n, i, B) {
    try {
      var E = A[i](B),
        r = E.value;
    } catch (A) {
      return void t(A);
    }
    E.done ? e(r) : Promise.resolve(r).then(g, n);
  }
  var g = function (A) {
    return function () {
      var e = this,
        g = arguments;
      return new Promise(function (n, i) {
        var B = A.apply(e, g);
        function E(A) {
          t(B, n, i, E, r, "next", A);
        }
        function r(A) {
          t(B, n, i, E, r, "throw", A);
        }
        E(void 0);
      });
    };
  };
  var n = function (A, e) {
    if (!(A instanceof e))
      throw new TypeError("Cannot call a class as a function");
  };
  function i(A, e) {
    for (var t = 0; t < e.length; t++) {
      var g = e[t];
      (g.enumerable = g.enumerable || !1),
        (g.configurable = !0),
        "value" in g && (g.writable = !0),
        Object.defineProperty(A, g.key, g);
    }
  }
  var B = function (A, e, t) {
    return e && i(A.prototype, e), t && i(A, t), A;
  };
  return (
    Element.prototype.matches ||
      (Element.prototype.matches =
        Element.prototype.matchesSelector ||
        Element.prototype.mozMatchesSelector ||
        Element.prototype.msMatchesSelector ||
        Element.prototype.oMatchesSelector ||
        Element.prototype.webkitMatchesSelector ||
        function (A) {
          for (
            var e = (this.document || this.ownerDocument).querySelectorAll(A),
              t = e.length;
            --t >= 0 && e.item(t) !== this;

          );
          return t > -1;
        }),
    Array.prototype.findIndex ||
      Object.defineProperty(Array.prototype, "findIndex", {
        value: function (A) {
          if (null == this)
            throw new TypeError('"this" is null or not defined');
          var e = Object(this),
            t = e.length >>> 0;
          if ("function" != typeof A)
            throw new TypeError("predicate must be a function");
          for (var g = arguments[1], n = 0; n < t; ) {
            var i = e[n];
            if (A.call(g, i, n, e)) return n;
            n++;
          }
          return -1;
        },
        configurable: !0,
        writable: !0,
      }),
    (function () {
      if ("function" == typeof window.CustomEvent) return !1;
      function A(A, e) {
        e = e || { bubbles: !1, cancelable: !1, detail: null };
        var t = document.createEvent("CustomEvent");
        return t.initCustomEvent(A, e.bubbles, e.cancelable, e.detail), t;
      }
      (A.prototype = window.Event.prototype), (window.CustomEvent = A);
    })(),
    (function () {
      function A(e, t) {
        if ((n(this, A), !e))
          throw new Error(
            "No uploadId found. You must initialize file-upload-with-preview with a unique uploadId."
          );
        if (
          ((this.uploadId = e),
          (this.options = t || {}),
          (this.options.showDeleteButtonOnImages =
            !this.options.hasOwnProperty("showDeleteButtonOnImages") ||
            this.options.showDeleteButtonOnImages),
          (this.options.text = this.options.hasOwnProperty("text")
            ? this.options.text
            : { chooseFile: "Choose file..." }),
          (this.options.text.chooseFile = this.options.text.hasOwnProperty(
            "chooseFile"
          )
            ? this.options.text.chooseFile
            : "Choose file..."),
          (this.options.text.browse = this.options.text.hasOwnProperty("browse")
            ? this.options.text.browse
            : "Browse"),
          (this.options.text.selectedCount = this.options.text.hasOwnProperty(
            "selectedCount"
          )
            ? this.options.text.selectedCount
            : "files selected"),
          (this.cachedFileArray = []),
          (this.currentFileCount = 0),
          (this.el = document.querySelector(
            '.custom-file-container[data-upload-id="'.concat(
              this.uploadId,
              '"]'
            )
          )),
          !this.el)
        )
          throw new Error(
            "Could not find a 'custom-file-container' with the id of: ".concat(
              this.uploadId
            )
          );
        if (
          ((this.input = this.el.querySelector('input[type="file"]')),
          (this.inputLabel = this.el.querySelector(
            ".custom-file-container__custom-file__custom-file-control"
          )),
          (this.imagePreview = this.el.querySelector(
            ".custom-file-container__image-preview"
          )),
          (this.clearButton = this.el.querySelector(
            ".custom-file-container__image-clear"
          )),
          (this.inputLabel.innerHTML = this.options.text.chooseFile),
          this.addBrowseButton(this.options.text.browse),
          !(
            this.el &&
            this.input &&
            this.inputLabel &&
            this.imagePreview &&
            this.clearButton
          ))
        )
          throw new Error(
            "Cannot find all necessary elements. Please make sure you have all the necessary elements in your html for the id: ".concat(
              this.uploadId
            )
          );
        (this.options.images = this.options.hasOwnProperty("images")
          ? this.options.images
          : {}),
          (this.baseImage = this.options.images.hasOwnProperty("baseImage")
            ? this.options.images.baseImage
            : "data:image/svg+xml,<svg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 1000 1000' enable-background='new 0 0 1000 1000' xml:space='preserve'><g><g transform='translate(0.000000,512.000000) scale(0.100000,-0.100000)'><path d='M5467.3,3650.4V2280.8h-789.2H3887l1068.8-1066.9L6022.8,145l1066.9,1068.8l1068.8,1066.9h-800.7h-798.8v1369.6V5020h-545.9h-545.9V3650.4z'/><path d='M295.5,2606.5V2051h948.2h948.2l9.6-42.1c5.7-24.9,216.5-965.4,469.3-2093.6c252.8-1126.3,463.6-2061.1,469.3-2072.6c11.5-32.6,4980.3-36.4,4999.4-5.8c17.2,26.8,1559.2,4229.4,1565,4265.8c3.8,24.9-105.4,72.8-507.6,222.2c-281.6,105.3-515.3,187.7-521,183.9c-3.8-5.7-304.6-806.4-668.5-1779.5l-658.9-1771.8l-1658.8-5.7c-911.8-1.9-1658.8-1.9-1658.8,0c-1.9,3.8-210.7,950.1-467.4,2103.2l-465.5,2097.5l-1402.1,5.7L295.5,3162V2606.5z'/><path d='M3747.2-2756.9c-450.1-118.8-770-532.5-770-996.1c0-438.7,285.4-837.1,703-978.8c191.5-67,478.9-63.2,670.4,5.8c360.1,128.3,620.6,446.3,680,825.6c80.4,522.9-281.6,1043.9-802.6,1153.1C4053.7-2711,3915.8-2712.9,3747.2-2756.9z'/><path d='M6756.5-2747.4c-402.3-88.1-733.6-446.3-793-856.2c-70.9-488.5,220.3-965.4,691.5-1128.2c178.1-63.2,475-63.2,657,0c718.3,245.2,938.6,1160.8,408,1695.2C7461.4-2774.2,7112.7-2670.7,6756.5-2747.4z'/></g></g></svg>"),
          (this.successVideoImage = this.options.images.hasOwnProperty(
            "successVideoImage"
          )
            ? this.options.images.successVideoImage
            : "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAfQAAAD6CAYAAABXq7VOAAAABGdBTUEAALGPC/xhBQAAEpNJREFUeAHt3UtsXOd1B/BvJPFlWaRIPWxZcQLHUSorsEwLltMEMRzYQJBsvEi66C4IkFW7aldZpkHQbRdFu6nX3dVAgGyCAOkiruvIcfwCEtlyJAe2RSUUORJpmZRIccIrWX6QQ3Ie987cOfc3G0szc7/vO79zjL9mho/a3NylRnIjQIAAAQIEBlpg10Cf3uEJECBAgACBWwIC3SAQIECAAIEAAgI9QBOVQIAAAQIEBLoZIECAAAECAQQEeoAmKoEAAQIECAh0M0CAAAECBAIICPQATVQCAQIECBAQ6GaAAAECBAgEEBDoAZqoBAIECBAgINDNAAECBAgQCCAg0AM0UQkECBAgQECgmwECBAgQIBBAQKAHaKISCBAgQICAQDcDBAgQIEAggIBAD9BEJRAgQIAAAYFuBggQIECAQAABgR6giUogQIAAAQIC3QwQIECAAIEAAgI9QBOVQIAAAQIEBLoZIECAAAECAQQEeoAmKoEAAQIECAh0M0CAAAECBAIICPQATVQCAQIECBAQ6GaAAAECBAgEEBDoAZqoBAIECBAgINDNAAECBAgQCCAg0AM0UQkECBAgQECgmwECBAgQIBBAQKAHaKISCBAgQICAQDcDBAgQIEAggIBAD9BEJRAgQIAAAYFuBggQIECAQAABgR6giUogQIAAAQIC3QwQIECAAIEAAgI9QBOVQIAAAQIEBLoZIECAAAECAQQEeoAmKoEAAQIECAh0M0CAAAECBAIICPQATVQCAQIECBAQ6GaAAAECBAgEEBDoAZqoBAIECBAgINDNAAECBAgQCCAg0AM0UQkECBAgQECgmwECBAgQIBBAQKAHaKISCBAgQICAQDcDBAgQIEAggIBAD9BEJRAgQIAAAYFuBggQIECAQAABgR6giUogQIAAAQIC3QwQIECAAIEAAgI9QBOVQIAAAQIEBLoZIECAAAECAQQEeoAmKoEAAQIECAh0M0CAAAECBAIICPQATVQCAQIECBAQ6GaAAAECBAgEEBDoAZqoBAIECBAgINDNAAECBAgQCCAg0AM0UQkECBAgQECgmwECBAgQIBBAQKAHaKISCBAgQICAQDcDBAgQIEAggIBAD9BEJRAgQIAAAYFuBggQIECAQAABgR6giUogQIAAAQIC3QwQIECAAIEAAgI9QBOVQIAAAQIEBLoZIECAAAECAQQEeoAmKoEAAQIECAh0M0CAAAECBAIICPQATVQCAQIECBAQ6GaAAAECBAgEEBDoAZqoBAIECBAgINDNAAECBAgQCCAg0AM0UQkECBAgQECgmwECBAgQIBBAQKAHaKISCBAgQICAQDcDBAgQIEAggIBAD9BEJRAgQIAAAYFuBggQIECAQAABgR6giUogQIAAAQIC3QwQIECAAIEAAgI9QBOVQIAAAQIEBLoZIECAAAECAQQEeoAmKoEAAQIECAh0M0CAAAECBAIICPQATVQCAQIECBAQ6GaAAAECBAgEEBDoAZqoBAIECBAgINDNAAECBAgQCCAg0AM0UQkECBAgQECgmwECBAgQIBBAQKAHaKISCBAgQICAQDcDBAgQIEAggIBAD9BEJRAgQIAAAYFuBggQIECAQAABgR6giUogQIAAAQIC3QwQIECAAIEAAgI9QBOVQIAAAQIEBLoZIECAAAECAQQEeoAmKoEAAQIECAh0M0CAAAECBAIICPQATVQCAQIECBAQ6GaAAAECBAgEEBDoAZqoBAIECBAgINDNAAECBAgQCCAg0AM0UQkECBAgQECgmwECBAgQIBBAQKAHaKISCBAgQICAQDcDBAgQIEAggIBAD9BEJRAgQIAAAYFuBggQIECAQAABgR6giUogQIAAAQIC3QwQIECAAIEAAgI9QBOVQIAAAQIEBLoZIECAAAECAQQEeoAmKoEAAQIECAh0M0CAAAECBAIICPQATVQCAQIECBAQ6GaAAAECBAgEEBDoAZqoBAIECBAgINDNAAECBAgQCCAg0AM0UQkECBAgQECgmwECBAgQIBBAQKAHaKISCBAgQICAQDcDBAgQIEAggIBAD9BEJRAgQIAAAYFuBggQIECAQAABgR6giUogQIAAAQIC3QwQIECAAIEAAgI9QBOVQIAAAQIEBLoZIECAAAECAQQEeoAmKoEAAQIECAh0M0CAAAECBAIICPQATVQCAQIECBAQ6GaAAAECBAgEEBDoAZqoBAIECBAgINDNAAECBAgQCCAg0AM0UQkECBAgQECgmwECBAgQIBBAQKAHaKISCBAgQICAQDcDBAgQIEAggIBAD9BEJRAgQIAAAYFuBggQIECAQAABgR6giUogQIAAAQIC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"),
          (this.successFileAltImage = this.options.images.hasOwnProperty(
            "successFileAltImage"
          )
            ? this.options.images.successFileAltImage
            : "data:image/png;base64,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"),
          (this.backgroundImage = this.options.images.hasOwnProperty(
            "backgroundImage"
          )
            ? this.options.images.backgroundImage
            : ""),
          this.bindClickEvents(),
          (this.imagePreview.style.backgroundImage = 'url("'.concat(
            this.baseImage,
            '")'
          )),
          (this.options.presetFiles = this.options.hasOwnProperty("presetFiles")
            ? this.options.presetFiles
            : null),
          this.options.presetFiles &&
            this.addImagesFromPath(this.options.presetFiles)
              .then(function () {})
              .catch(function (A) {
                console.log("Error - " + A.toString()),
                  console.log(
                    "Warning - An image you added from a path is not able to be added to the cachedFileArray."
                  );
              });
      }
      return (
        B(A, [
          {
            key: "bindClickEvents",
            value: function () {
              var A = this,
                e = this;
              e.input.addEventListener(
                "change",
                function () {
                  e.addFiles(this.files);
                },
                !0
              ),
                this.clearButton.addEventListener(
                  "click",
                  function () {
                    A.clearPreviewPanel();
                  },
                  !0
                ),
                this.imagePreview.addEventListener("click", function (e) {
                  if (
                    e.target.matches(
                      ".custom-file-container__image-multi-preview__single-image-clear__icon"
                    )
                  ) {
                    var t = e.target.getAttribute("data-upload-token"),
                      g = A.cachedFileArray.findIndex(function (A) {
                        return A.token === t;
                      });
                    A.deleteFileAtIndex(g);
                  }
                });
            },
          },
          {
            key: "addFiles",
            value: function (A) {
              if (0 !== A.length) {
                this.input.multiple
                  ? (this.currentFileCount += A.length)
                  : ((this.currentFileCount = A.length),
                    (this.cachedFileArray = []));
                for (var e = 0; e < A.length; e++) {
                  var t = A[e];
                  (t.token =
                    Math.random().toString(36).substring(2, 15) +
                    Math.random().toString(36).substring(2, 15)),
                    this.cachedFileArray.push(t),
                    this.processFile(t);
                }
                var g = new CustomEvent("fileUploadWithPreview:imagesAdded", {
                  detail: {
                    uploadId: this.uploadId,
                    cachedFileArray: this.cachedFileArray,
                    addedFilesCount: A.length,
                  },
                });
                window.dispatchEvent(g);
              }
            },
          },
          {
            key: "processFile",
            value: function (A) {
              var e = this;
              0 === this.currentFileCount
                ? (this.inputLabel.innerHTML = this.options.text.chooseFile)
                : 1 === this.currentFileCount
                ? (this.inputLabel.innerHTML = A.name)
                : (this.inputLabel.innerHTML = ""
                    .concat(this.currentFileCount, " ")
                    .concat(this.options.text.selectedCount)),
                this.addBrowseButton(this.options.text.browse),
                this.imagePreview.classList.add(
                  "custom-file-container__image-preview--active"
                );
              var t = new FileReader();
              t.readAsDataURL(A),
                (t.onload = function () {
                  e.input.multiple ||
                    (A.type.match("image/png") ||
                    A.type.match("image/jpeg") ||
                    A.type.match("image/gif")
                      ? (e.imagePreview.style.backgroundImage = 'url("'.concat(
                          t.result,
                          '")'
                        ))
                      : A.type.match("application/pdf")
                      ? (e.imagePreview.style.backgroundImage = 'url("'.concat(
                          e.successPdfImage,
                          '")'
                        ))
                      : A.type.match("video/*")
                      ? (e.imagePreview.style.backgroundImage = 'url("'.concat(
                          e.successVideoImage,
                          '")'
                        ))
                      : (e.imagePreview.style.backgroundImage = 'url("'.concat(
                          e.successFileAltImage,
                          '")'
                        ))),
                    e.input.multiple &&
                      ((e.imagePreview.style.backgroundImage = 'url("'.concat(
                        e.backgroundImage,
                        '")'
                      )),
                      A.type.match("image/png") ||
                      A.type.match("image/jpeg") ||
                      A.type.match("image/gif")
                        ? e.options.showDeleteButtonOnImages
                          ? (e.imagePreview.innerHTML += '\n                            <div\n                                class="custom-file-container__image-multi-preview"\n                                data-upload-token="'
                              .concat(
                                A.token,
                                '"\n                                style="background-image: url(\''
                              )
                              .concat(
                                t.result,
                                '\'); "\n                            >\n                                <span class="custom-file-container__image-multi-preview__single-image-clear">\n                                    <span\n                                        class="custom-file-container__image-multi-preview__single-image-clear__icon"\n                                        data-upload-token="'
                              )
                              .concat(
                                A.token,
                                '"\n                                    >&times;</span>\n                                </span>\n                            </div>\n                        '
                              ))
                          : (e.imagePreview.innerHTML += '\n                            <div\n                                class="custom-file-container__image-multi-preview"\n                                data-upload-token="'
                              .concat(
                                A.token,
                                '"\n                                style="background-image: url(\''
                              )
                              .concat(
                                t.result,
                                "'); \"\n                            ></div>\n                        "
                              ))
                        : A.type.match("application/pdf")
                        ? e.options.showDeleteButtonOnImages
                          ? (e.imagePreview.innerHTML += '\n                            <div\n                                class="custom-file-container__image-multi-preview"\n                                data-upload-token="'
                              .concat(
                                A.token,
                                '"\n                                style="background-image: url(\''
                              )
                              .concat(
                                e.successPdfImage,
                                '\'); "\n                            >\n                                <span class="custom-file-container__image-multi-preview__single-image-clear">\n                                    <span\n                                        class="custom-file-container__image-multi-preview__single-image-clear__icon"\n                                        data-upload-token="'
                              )
                              .concat(
                                A.token,
                                '"\n                                    >&times;</span>\n                                </span>\n                            </div>\n                        '
                              ))
                          : (e.imagePreview.innerHTML += '\n                            <div\n                                class="custom-file-container__image-multi-preview"\n                                data-upload-token="'
                              .concat(
                                A.token,
                                '"\n                                style="background-image: url(\''
                              )
                              .concat(
                                e.successPdfImage,
                                "'); \"\n                            ></div>\n                        "
                              ))
                        : A.type.match("video/*")
                        ? e.options.showDeleteButtonOnImages
                          ? (e.imagePreview.innerHTML += '\n                            <div\n                                class="custom-file-container__image-multi-preview"\n                                style="background-image: url(\''
                              .concat(
                                e.successVideoImage,
                                '\'); "\n                                data-upload-token="'
                              )
                              .concat(
                                A.token,
                                '"\n                            >\n                                <span class="custom-file-container__image-multi-preview__single-image-clear">\n                                    <span\n                                        class="custom-file-container__image-multi-preview__single-image-clear__icon"\n                                        data-upload-token="'
                              )
                              .concat(
                                A.token,
                                '"\n                                    >&times;</span>\n                                </span>\n                            </div>\n                        '
                              ))
                          : (e.imagePreview.innerHTML += '\n                            <div\n                                class="custom-file-container__image-multi-preview"\n                                style="background-image: url(\''
                              .concat(
                                e.successVideoImage,
                                '\'); "\n                                data-upload-token="'
                              )
                              .concat(
                                A.token,
                                '"\n                            ></div>\n                        '
                              ))
                        : e.options.showDeleteButtonOnImages
                        ? (e.imagePreview.innerHTML += '\n                            <div\n                                class="custom-file-container__image-multi-preview"\n                                style="background-image: url(\''
                            .concat(
                              e.successFileAltImage,
                              '\'); "\n                                data-upload-token="'
                            )
                            .concat(
                              A.token,
                              '"\n                            >\n                                <span class="custom-file-container__image-multi-preview__single-image-clear">\n                                    <span\n                                        class="custom-file-container__image-multi-preview__single-image-clear__icon"\n                                        data-upload-token="'
                            )
                            .concat(
                              A.token,
                              '"\n                                    >&times;</span>\n                                </span>\n                            </div>\n                        '
                            ))
                        : (e.imagePreview.innerHTML += '\n                            <div\n                                class="custom-file-container__image-multi-preview"\n                                style="background-image: url(\''
                            .concat(
                              e.successFileAltImage,
                              '\'); "\n                                data-upload-token="'
                            )
                            .concat(
                              A.token,
                              '"\n                            ></div>\n                        '
                            )));
                });
            },
          },
          {
            key: "addImagesFromPath",
            value: function (A) {
              var t = this;
              return new Promise(
                (function () {
                  var n = g(
                    e.mark(function g(n, i) {
                      var B, E, r, C, o;
                      return e.wrap(
                        function (e) {
                          for (;;)
                            switch ((e.prev = e.next)) {
                              case 0:
                                (B = []), (E = 0);
                              case 2:
                                if (!(E < A.length)) {
                                  e.next = 24;
                                  break;
                                }
                                return (
                                  (r = void 0),
                                  (C = void 0),
                                  (e.prev = 5),
                                  (e.next = 8),
                                  fetch(A[E], { mode: "cors" })
                                );
                              case 8:
                                return (r = e.sent), (e.next = 11), r.blob();
                              case 11:
                                (C = e.sent), (e.next = 18);
                                break;
                              case 14:
                                return (
                                  (e.prev = 14),
                                  (e.t0 = e.catch(5)),
                                  i(e.t0),
                                  e.abrupt("continue", 21)
                                );
                              case 18:
                                ((o = new Blob([C], { type: C.type })).name = A[
                                  E
                                ].split("/").pop()),
                                  B.push(o);
                              case 21:
                                E++, (e.next = 2);
                                break;
                              case 24:
                                t.addFiles(B), n();
                              case 26:
                              case "end":
                                return e.stop();
                            }
                        },
                        g,
                        null,
                        [[5, 14]]
                      );
                    })
                  );
                  return function (A, e) {
                    return n.apply(this, arguments);
                  };
                })()
              );
            },
          },
          {
            key: "replaceFiles",
            value: function (A) {
              if (!A.length)
                throw new Error("Array must contain at least one file.");
              (this.cachedFileArray = A), this.refreshPreviewPanel();
            },
          },
          {
            key: "replaceFileAtIndex",
            value: function (A, e) {
              if (!A) throw new Error("No file found.");
              if (!this.cachedFileArray[e])
                throw new Error("There is no file at index", e);
              (this.cachedFileArray[e] = A), this.refreshPreviewPanel();
            },
          },
          {
            key: "deleteFileAtIndex",
            value: function (A) {
              if (!this.cachedFileArray[A])
                throw new Error("There is no file at index", A);
              this.cachedFileArray.splice(A, 1), this.refreshPreviewPanel();
              var e = new CustomEvent("fileUploadWithPreview:imageDeleted", {
                detail: {
                  uploadId: this.uploadId,
                  cachedFileArray: this.cachedFileArray,
                  currentFileCount: this.currentFileCount,
                },
              });
              window.dispatchEvent(e);
            },
          },
          {
            key: "refreshPreviewPanel",
            value: function () {
              var A = this;
              (this.imagePreview.innerHTML = ""),
                (this.currentFileCount = this.cachedFileArray.length),
                this.cachedFileArray.forEach(function (e) {
                  return A.processFile(e);
                }),
                this.cachedFileArray.length || this.clearPreviewPanel();
            },
          },
          {
            key: "addBrowseButton",
            value: function (A) {
              this.inputLabel.innerHTML += '<span class="custom-file-container__custom-file__custom-file-control__button"> '.concat(
                A,
                " </span>"
              );
            },
          },
          {
            key: "emulateInputSelection",
            value: function () {
              this.input.click();
            },
          },
          {
            key: "clearPreviewPanel",
            value: function () {
              (this.input.value = ""),
                (this.inputLabel.innerHTML = this.options.text.chooseFile),
                this.addBrowseButton(this.options.text.browse),
                (this.imagePreview.style.backgroundImage = 'url("'.concat(
                  this.baseImage,
                  '")'
                )),
                this.imagePreview.classList.remove(
                  "custom-file-container__image-preview--active"
                ),
                (this.cachedFileArray = []),
                (this.imagePreview.innerHTML = ""),
                (this.currentFileCount = 0);
            },
          },
        ]),
        A
      );
    })()
  );
})();
