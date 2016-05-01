/* Ephox PowerPaste plugin
 *
 * Copyright 2010-2015 Ephox Corporation.  All rights reserved.
 *
 * Version: 2.1.4.0
 */
(function() {
    if (this.ephox) var I = this.ephox.bolt;
    var C = {},
        F = function(a) {
            if (void 0 === C[a]) throw "required module [" + a + "] is not defined";
            if (void 0 === C[a].instance) {
                for (var k = C[a].dependencies, l = C[a].definition, n = [], b = 0; b < k.length; ++b) n.push(F(k[b]));
                C[a].instance = l.apply(null, n);
                if (void 0 === C[a].instance) throw "required module [" + a + "] could not be defined (definition function returned undefined)";
            }
            return C[a].instance
        },
        a = this.ephox || {};
    a.bolt = {
        module: {
            api: {
                define: function(a, k, l) {
                    if ("string" !== typeof a) throw "invalid module definition, module id must be defined and be a string";
                    if (void 0 === k) throw "invalid module definition, dependencies must be specified";
                    if (void 0 === l) throw "invalid module definition, definition function must be specified";
                    C[a] = {
                        dependencies: k,
                        definition: l,
                        instance: void 0
                    }
                },
                require: function(a, k) {
                    for (var l = [], n = 0; n < a.length; ++n) l.push(F(a[n]));
                    k.apply(null, k)
                },
                demand: F
            }
        }
    };
    a.bolt.module.api.define("global!Array", [], function() {
        return Array
    });
    a.bolt.module.api.define("global!String", [], function() {
        return String
    });
    (function(a, k, l) {
        a("ephox.compass.Arr", ["global!Array",
            "global!String"
        ], function(n, b) {
            var c = function(b) {
                    return function(d) {
                        return b === d
                    }
                },
                e = function() {
                    var b = n.prototype.indexOf,
                        d = function(d, c) {
                            return b.call(d, c)
                        },
                        e = function(b, d) {
                            return q(b, c(d))
                        };
                    return void 0 === b ? e : d
                }(),
                d = function(b, d) {
                    return -1 < e(b, d)
                },
                f = function(b, d) {
                    for (var c = b.length, e = new n(c), f = 0; f < c; f++) e[f] = d(b[f], f, b);
                    return e
                },
                a = function(b, d) {
                    for (var c = 0, e = b.length; c < e; c++) d(b[c], c, b)
                },
                h = function(b, d) {
                    for (var c = [], e = 0, n = b.length; e < n; e++) {
                        var f = b[e];
                        d(f, e, b) && c.push(f)
                    }
                    return c
                },
                m = function(b,
                             d, c) {
                    a(b, function(b) {
                        c = d(c, b)
                    });
                    return c
                },
                p = function(b, d) {
                    for (var c = 0, e = b.length; c < e; c++) {
                        var n = b[c];
                        if (d(n, c, b)) return n
                    }
                },
                q = function(b, c) {
                    for (var d = c || t, e = 0, n = b.length; e < n; ++e)
                        if (!0 === d(b[e])) return e;
                    return -1
                },
                s = n.prototype.push,
                r = function(b) {
                    for (var c = [], d = 0, e = b.length; d < e; ++d) s.apply(c, b[d]);
                    return c
                },
                t = c(!0),
                v = function(b, c) {
                    for (var d = c || t, e = 0, n = b.length; e < n; ++e)
                        if (!0 !== d(b[e], e)) return !1;
                    return !0
                },
                u = n.prototype.slice,
                w = function(b) {
                    b = u.call(b, 0);
                    b.reverse();
                    return b
                };
            return {
                map: f,
                each: a,
                partition: function(b,
                                    c) {
                    for (var d = [], e = [], n = 0, f = b.length; n < f; n++) {
                        var a = b[n];
                        (c(a, n, b) ? d : e).push(a)
                    }
                    return {
                        pass: d,
                        fail: e
                    }
                },
                filter: h,
                groupBy: function(b, d) {
                    if (0 === b.length) return [];
                    for (var c = d(b[0]), e = [], n = [], f = 0, a = b.length; f < a; f++) {
                        var h = b[f],
                            g = d(h);
                        g !== c && (e.push(n), n = []);
                        c = g;
                        n.push(h)
                    }
                    0 !== n.length && e.push(n);
                    return e
                },
                indexOf: e,
                foldr: function(b, d, c) {
                    return m(w(b), d, c)
                },
                foldl: m,
                find: p,
                findIndex: q,
                findOr: function(b, d, c) {
                    b = p(b, d);
                    return void 0 !== b ? b : c
                },
                findOrDie: function(d, c, e) {
                    c = p(d, c);
                    if (void 0 === c) throw e || "Could not find element in array: " +
                    b(d);
                    return c
                },
                flatten: r,
                bind: function(b, c) {
                    var d = f(b, c);
                    return r(d)
                },
                forall: v,
                exists: function(b, c) {
                    return -1 < q(b, c)
                },
                contains: d,
                equal: function(b, c) {
                    return b.length === c.length && v(b, function(b, d) {
                            return b === c[d]
                        })
                },
                reverse: w,
                chunk: function(b, c) {
                    for (var d = [], e = 0; e < b.length; e += c) {
                        var n = b.slice(e, e + c);
                        d.push(n)
                    }
                    return d
                },
                difference: function(b, c) {
                    return h(b, function(b) {
                        return !d(c, b)
                    })
                },
                mapToObject: function(c, d) {
                    for (var e = {}, n = 0, f = c.length; n < f; n++) {
                        var a = c[n];
                        e[b(a)] = d(a, n)
                    }
                    return e
                },
                pure: function(b) {
                    return [b]
                }
            }
        })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.peanut.Fun", ["global!Array"], function(n) {
            return {
                noop: function() {},
                compose: function(b, c) {
                    return function() {
                        return b(c.apply(null, arguments))
                    }
                },
                constant: function(b) {
                    return function() {
                        return b
                    }
                },
                identity: function(b) {
                    return b
                },
                tripleEquals: function(b, c) {
                    return b === c
                },
                curry: function(b) {
                    var c = n.prototype.slice,
                        e = c.call(arguments, 1);
                    return function() {
                        var d = e.concat(c.call(arguments, 0));
                        return b.apply(null, d)
                    }
                },
                not: function(b) {
                    return function() {
                        return !b.apply(null,
                            arguments)
                    }
                },
                die: function(b) {
                    return function() {
                        throw b;
                    }
                },
                apply: function(b) {
                    return b()
                },
                call: function(b) {
                    b()
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    a.bolt.module.api.define("global!Error", [], function() {
        return Error
    });
    a.bolt.module.api.define("global!console", [], function() {
        "undefined" === typeof console && (console = {
            log: function() {}
        });
        return console
    });
    a.bolt.module.api.define("global!document", [], function() {
        return document
    });
    (function(a, k, l) {
        a("ephox.sugar.api.Element", ["ephox.peanut.Fun", "global!Error", "global!console", "global!document"], function(n, b, c, e) {
            var d = function(c) {
                if (null === c || void 0 === c) throw new b("Node cannot be null or undefined");
                return {
                    dom: n.constant(c)
                }
            };
            return {
                fromHtml: function(b, n) {
                    var a = (n || e).createElement("div");
                    a.innerHTML = b;
                    if (!a.hasChildNodes() || 1 < a.childNodes.length) throw c.error("HTML does not have a single root node", b), "HTML must have a single root node";
                    return d(a.childNodes[0])
                },
                fromTag: function(b, c) {
                    var n = (c || e).createElement(b);
                    return d(n)
                },
                fromText: function(b, c) {
                    var n = (c || e).createTextNode(b);
                    return d(n)
                },
                fromDom: d
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.classify.Type", ["global!Array", "global!String"], function(n, b) {
            var c = function(c) {
                return function(d) {
                    if (null === d) d = "null";
                    else {
                        var f = typeof d;
                        d = "object" === f && n.prototype.isPrototypeOf(d) ? "array" : "object" === f && b.prototype.isPrototypeOf(d) ? "string" : f
                    }
                    return d === c
                }
            };
            return {
                isString: c("string"),
                isObject: c("object"),
                isArray: c("array"),
                isNull: c("null"),
                isBoolean: c("boolean"),
                isUndefined: c("undefined"),
                isFunction: c("function"),
                isNumber: c("number")
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    a.bolt.module.api.define("global!Object", [], function() {
        return Object
    });
    (function(a, k, l) {
        a("ephox.compass.Obj", ["global!Object"], function(n) {
            var b = function() {
                    var b = n.keys,
                        c = function(b) {
                            var c = [],
                                d;
                            for (d in b) b.hasOwnProperty(d) && c.push(d);
                            return c
                        };
                    return void 0 === b ? c : b
                }(),
                c = function(c, d) {
                    for (var e =
                        b(c), n = 0, f = e.length; n < f; n++) {
                        var a = e[n];
                        d(c[a], a, c)
                    }
                },
                e = function(b, d) {
                    var e = {};
                    c(b, function(c, n) {
                        var f = d(c, n, b);
                        e[f.k] = f.v
                    });
                    return e
                },
                d = function(b, d) {
                    var e = [];
                    c(b, function(b, c) {
                        e.push(d(b, c))
                    });
                    return e
                },
                f = function(b) {
                    return d(b, function(b) {
                        return b
                    })
                };
            return {
                bifilter: function(b, d) {
                    var e = {},
                        n = {};
                    c(b, function(b, c) {
                        (d(b, c) ? e : n)[c] = b
                    });
                    return {
                        t: e,
                        f: n
                    }
                },
                each: c,
                map: function(b, c) {
                    return e(b, function(b, d, e) {
                        return {
                            k: d,
                            v: c(b, d, e)
                        }
                    })
                },
                mapToArray: d,
                tupleMap: e,
                find: function(c, d) {
                    for (var e = b(c), n = 0, f = e.length; n <
                    f; n++) {
                        var a = e[n],
                            r = c[a];
                        if (d(r, a, c)) return r
                    }
                },
                keys: b,
                values: f,
                size: function(b) {
                    return f(b).length
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.bud.NodeTypes", [], function() {
            return {
                ATTRIBUTE: 2,
                CDATA_SECTION: 4,
                COMMENT: 8,
                DOCUMENT: 9,
                DOCUMENT_TYPE: 10,
                DOCUMENT_FRAGMENT: 11,
                ELEMENT: 1,
                TEXT: 3,
                PROCESSING_INSTRUCTION: 7,
                ENTITY_REFERENCE: 5,
                ENTITY: 6,
                NOTATION: 12
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a,
              k, l) {
        a("ephox.sugar.api.Node", ["ephox.bud.NodeTypes"], function(n) {
            var b = function(b) {
                    return b.dom().nodeName.toLowerCase()
                },
                c = function(b) {
                    return b.dom().nodeType
                },
                e = function(b) {
                    return function(d) {
                        return c(d) === b
                    }
                },
                d = e(n.ELEMENT),
                f = e(n.TEXT),
                e = e(n.DOCUMENT);
            return {
                name: b,
                type: c,
                value: function(b) {
                    return b.dom().nodeValue
                },
                isElement: d,
                isText: f,
                isDocument: e,
                isComment: function(d) {
                    return c(d) === n.COMMENT || "#comment" === b(d)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.Attr", "ephox.classify.Type ephox.compass.Arr ephox.compass.Obj ephox.sugar.api.Node global!Error global!console".split(" "), function(n, b, c, e, d, f) {
            var a = function(b, c, e) {
                    if (n.isString(e) || n.isBoolean(e) || n.isNumber(e)) b.setAttribute(c, e + "");
                    else throw f.error("Invalid call to Attr.set. Key ", c, ":: Value ", e, ":: Element ", b), new d("Attribute value was not simple");
                },
                h = function(b, c, d) {
                    a(b.dom(), c, d)
                },
                m = function(b, c) {
                    var d = b.dom().getAttribute(c);
                    return null === d ? void 0 :
                        d
                },
                p = function(b, c) {
                    var d = b.dom();
                    return d && d.hasAttribute ? d.hasAttribute(c) : !1
                };
            return {
                clone: function(c) {
                    return b.foldl(c.dom().attributes, function(b, c) {
                        b[c.name] = c.value;
                        return b
                    }, {})
                },
                set: h,
                setAll: function(b, d) {
                    var e = b.dom();
                    c.each(d, function(b, c) {
                        a(e, c, b)
                    })
                },
                get: m,
                has: p,
                remove: function(b, c) {
                    b.dom().removeAttribute(c)
                },
                hasNone: function(b) {
                    b = b.dom().attributes;
                    return void 0 === b || null === b || 0 === b.length
                },
                transfer: function(c, d, n) {
                    e.isElement(c) && e.isElement(d) && b.each(n, function(b) {
                        p(c, b) && !p(d, b) &&
                        h(d, b, m(c, b))
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.util.NodeUtil", ["ephox.compass.Arr", "ephox.sugar.api.Element", "ephox.sugar.api.Attr", "global!document"], function(n, b, c, e) {
            return {
                nodeToString: function(b) {
                    var c = e.createElement("div");
                    c.appendChild(b.cloneNode(!0));
                    return c.innerHTML
                },
                restoreStyleAttrs: function(d) {
                    n.each(n.map(d.getElementsByTagName("*"), b.fromDom), function(b) {
                        c.has(b, "data-mce-style") && !c.has(b, "style") &&
                        c.set(b, "style", c.get(b, "data-mce-style"))
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    a.bolt.module.api.define("global!tinymce", [], function() {
        return tinymce
    });
    (function(a, k, l) {
        a("ephox.powerpaste.i18n.I18n", ["global!tinymce"], function(n) {
            var b = function() {
                    return "Your browser security settings may be preventing images from being imported."
                },
                c = {
                    "cement.dialog.paste.title": "Paste Formatting Options",
                    "cement.dialog.paste.instructions": "Choose to keep or remove formatting in the pasted content.",
                    "cement.dialog.paste.merge": "Keep Formatting",
                    "cement.dialog.paste.clean": "Remove Formatting",
                    "cement.dialog.flash.title": "Local Image Import",
                    "cement.dialog.flash.trigger-paste": "Trigger paste again from the keyboard to paste content with images.",
                    "cement.dialog.flash.missing": 'Adobe Flash is required to import images from Microsoft Office. Install the <a href="http://get.adobe.com/flashplayer/" target="_blank">Adobe Flash Player</a>.',
                    "cement.dialog.flash.press-escape": 'Press <span class="ephox-polish-help-kbd">ESC</span> to ignore local images and continue editing.',
                    "loading.wait": "Please wait...",
                    "flash.clipboard.no.rtf": n.Env.mac && n.Env.webkit ? b() + ' <a href="https://support.ephox.com/entries/59328357-Safari-6-1-and-7-Flash-Sandboxing" style="text-decoration: underline">More information on paste for Safari</a>' : b(),
                    "safari.imagepaste": 'Safari does not support direct paste of images. <a href="https://support.ephox.com/entries/88543243-Safari-Direct-paste-of-images-does-not-work" style="text-decoration: underline">More information on image pasting for Safari</a>',
                    "error.code.images.not.found": "The images service was not found: (",
                    "error.imageupload": "Image failed to upload: (",
                    "error.full.stop": ").",
                    "errors.local.images.disallowed": "Local image paste has been disabled. Local images have been removed from pasted content.",
                    "flash.crashed": "Images have not been imported as Adobe Flash appears to have crashed. This may be caused by pasting large documents.",
                    "errors.imageimport.failed": "Some images failed to import.",
                    "errors.imageimport.unsupported": "Unsupported image type.",
                    "errors.imageimport.invalid": "Image is invalid."
                };
            return {
                translate: function(b) {
                    return n.translate(c[b])
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.alien.Once", [], function() {
            return function(n) {
                var b = !1;
                return function() {
                    b || (b = !0, n.apply(null, arguments))
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.perhaps.Option", ["ephox.peanut.Fun"], function(n) {
            var b = function(b) {
                    return e(function(c,
                                      e) {
                        return e(b)
                    })
                },
                c = function() {
                    return e(function(b, c) {
                        return b()
                    })
                },
                e = function(d) {
                    var e = function() {
                            return d(n.constant(!1), n.constant(!0))
                        },
                        a = n.not(e),
                        h = function(c) {
                            return m(function(d) {
                                return b(c(d))
                            })
                        },
                        m = function(b) {
                            return d(c, b)
                        };
                    return {
                        is: function(b) {
                            return d(n.constant(!1), function(c) {
                                return c === b
                            })
                        },
                        isSome: e,
                        isNone: a,
                        getOr: function(b) {
                            return d(n.constant(b), n.identity)
                        },
                        getOrThunk: function(b) {
                            return d(b, n.identity)
                        },
                        getOrDie: function(b) {
                            return d(n.die(b || "error: getOrDie called on none."), n.identity)
                        },
                        or: function(c) {
                            return d(n.constant(c), b)
                        },
                        orThunk: function(c) {
                            return d(c, b)
                        },
                        fold: d,
                        map: h,
                        each: h,
                        bind: m,
                        ap: function(e) {
                            return d(c, function(d) {
                                return e.fold(c, function(c) {
                                    return b(c(d))
                                })
                            })
                        },
                        flatten: function() {
                            return d(c, n.identity)
                        },
                        exists: function(b) {
                            return d(n.constant(!1), b)
                        },
                        forall: function(b) {
                            return d(n.constant(!0), b)
                        },
                        equals: function(b) {
                            return d(b.isNone, b.is)
                        },
                        equals_: function(b, c) {
                            return d(b.isNone, function(d) {
                                return b.fold(n.constant(!1), n.curry(c, d))
                            })
                        },
                        filter: function(e) {
                            return d(c, function(d) {
                                return e(d) ?
                                    b(d) : c()
                            })
                        },
                        toArray: function() {
                            return d(n.constant([]), function(b) {
                                return [b]
                            })
                        },
                        toString: function() {
                            return d(n.constant("none()"), function(b) {
                                return "some(" + b + ")"
                            })
                        }
                    }
                };
            return {
                some: b,
                none: c,
                from: function(d) {
                    return null === d || void 0 === d ? c() : b(d)
                },
                equals: function(b, c) {
                    return b.equals(c)
                },
                equals_: function(b, c, e) {
                    return b.equals_(c, e)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.imageupload.TinyUploader", ["ephox.compass.Arr", "ephox.peanut.Fun"],
            function(n, b) {
                return function(c) {
                    return {
                        uploadImages: function() {
                            c.uploadImages()
                        },
                        prepareImages: function(e) {
                            n.each(e, function(d) {
                                d.fold(function(b, d, e, a) {
                                    n.each(c.dom.select('img[src="' + e + '"]'), function(b) {
                                        c.dom.setAttrib(b, "src", a.result)
                                    })
                                }, b.noop)
                            })
                        },
                        getLocalURL: function(b, c, n, a) {
                            return a.result
                        }
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.tinymce.ErrorDialog", [], function() {
            return {
                showDialog: function(n, b) {
                    win = n.windowManager.open({
                        title: "Error",
                        spacing: 10,
                        padding: 10,
                        items: [{
                            type: "container",
                            html: b
                        }],
                        buttons: [{
                            text: "Ok",
                            onclick: function() {
                                win.close()
                            }
                        }]
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.imageupload.UploadError", ["ephox.powerpaste.alien.Once", "ephox.powerpaste.i18n.I18n", "ephox.powerpaste.tinymce.ErrorDialog"], function(n, b, c) {
            return function(e, d) {
                var a = function() {
                        return b.translate("error.code.images.not.found") + d + b.translate("error.full.stop")
                    },
                    g = function() {
                        return b.translate("error.imageupload") +
                            d + b.translate("error.full.stop")
                    },
                    h = function(b) {
                        b = b.status();
                        c.showDialog(e, (0 === b || 400 <= b || 500 > b ? a : g)())
                    };
                return {
                    instance: function() {
                        return n(h)
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.flour.style.Resolver", ["ephox.compass.Arr"], function(n) {
            var b = function(b) {
                return b.replace(/\./g, "-")
            };
            return {
                create: function(c) {
                    var e = b(c);
                    return {
                        resolve: function(b) {
                            b = b.split(" ");
                            return n.map(b, function(b) {
                                return e + "-" + b
                            }).join(" ")
                        }
                    }
                },
                cssNamespace: b,
                cssClass: function(b, e) {
                    return b + "-" + e
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.salmon.style.Styles", ["ephox.flour.style.Resolver"], function(n) {
            return {
                resolve: n.create("ephox-salmon").resolve
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.scullion.Immutable2", ["ephox.compass.Arr", "ephox.compass.Obj", "ephox.peanut.Fun"], function(n, b, c) {
            return {
                product: function(e, d) {
                    return {
                        nu: function() {
                            var b =
                                Array.prototype.slice.call(arguments);
                            if (e.length !== b.length) throw 'Wrong number of arguments to struct. Expected "[' + e.length + ']", got ' + b.length + " arguments";
                            var d = {};
                            n.each(e, function(e, n) {
                                d[e] = c.constant(b[n])
                            });
                            return d
                        },
                        eq: function(b, n) {
                            for (var a = 0; a < e.length; a++) {
                                var m = e[a];
                                if (!(d && d[a] || c.tripleEquals)(b[m](), n[m]())) return !1
                            }
                            return !0
                        },
                        evaluate: function(c) {
                            return b.map(c, function(b) {
                                return b()
                            })
                        }
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a,
              k, l) {
        a("ephox.scullion.Immutable", ["ephox.scullion.Immutable2"], function(n) {
            return function() {
                return n.product(arguments).nu
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.scullion.BagUtils", ["ephox.classify.Type", "ephox.compass.Arr"], function(n, b) {
            var c = function(b) {
                return b.slice(0).sort()
            };
            return {
                sort: c,
                reqMessage: function(b, d) {
                    throw "All required keys (" + c(b).join(", ") + ") were not specified. Specified keys were: " + c(d).join(", ") + ".";
                },
                unsuppMessage: function(b) {
                    throw "Unsupported keys for object: " + c(b).join(", ");
                },
                validateStrArr: function(c, d) {
                    if (!n.isArray(d)) throw "The " + c + " fields must be an array. Was: " + d + ".";
                    b.each(d, function(b) {
                        if (!n.isString(b)) throw "The value " + b + " in the " + c + " fields was not a string.";
                    })
                },
                invalidTypeMessage: function(b, d) {
                    throw "All values need to be of type: " + d + ". Keys (" + c(b).join(", ") + ") were not.";
                },
                checkDupes: function(e) {
                    var d = c(e);
                    e = b.find(d, function(b, c) {
                        return c < d.length - 1 && b === d[c + 1]
                    });
                    if (void 0 !==
                        e && null !== e) throw "The field: " + e + " occurs more than once in the combined fields: [" + d.join(", ") + "].";
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.scullion.MixedBag", "ephox.compass.Arr ephox.compass.Obj ephox.peanut.Fun ephox.perhaps.Option ephox.scullion.BagUtils global!Object".split(" "), function(n, b, c, e, d, a) {
            return function(g, h) {
                var m = g.concat(h);
                if (0 === m.length) throw "You must specify at least one required or optional field.";
                d.validateStrArr("required",
                    g);
                d.validateStrArr("optional", h);
                d.checkDupes(m);
                return function(p) {
                    var q = b.keys(p);
                    n.forall(g, function(b) {
                        return n.contains(q, b)
                    }) || d.reqMessage(g, q);
                    var s = n.filter(q, function(b) {
                        return !n.contains(m, b)
                    });
                    0 < s.length && d.unsuppMessage(s);
                    var r = {};
                    n.each(g, function(b) {
                        r[b] = c.constant(p[b])
                    });
                    n.each(h, function(b) {
                        r[b] = c.constant(a.prototype.hasOwnProperty.call(p, b) ? e.some(p[b]) : e.none())
                    });
                    return r
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.scullion.Struct", ["ephox.scullion.Immutable", "ephox.scullion.Immutable2", "ephox.scullion.MixedBag"], function(n, b, c) {
            return {
                immutable: n,
                immutable2: b,
                immutableBag: c
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.alien.Recurse", [], function() {
            return {
                toArray: function(n, b) {
                    var c = [],
                        e = function(d) {
                            c.push(d);
                            return b(d)
                        },
                        d = b(n);
                    do d = d.bind(e); while (d.isSome());
                    return c
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a,
              k, l) {
        a("ephox.sugar.api.Selectors", "ephox.bud.NodeTypes ephox.compass.Arr ephox.perhaps.Option ephox.sugar.api.Element global!Error global!document".split(" "), function(n, b, c, e, d, a) {
            var g = function() {
                    var b = a.createElement("span");
                    return void 0 !== b.matches ? 0 : void 0 !== b.msMatchesSelector ? 1 : void 0 !== b.webkitMatchesSelector ? 2 : void 0 !== b.mozMatchesSelector ? 3 : -1
                }(),
                h = n.ELEMENT,
                m = n.DOCUMENT;
            return {
                all: function(c, d) {
                    var n = void 0 === d ? a : d.dom();
                    return n.nodeType !== h && n.nodeType !== m || 0 === n.childElementCount ? [] : b.map(n.querySelectorAll(c), e.fromDom)
                },
                is: function(b, c) {
                    var e = b.dom();
                    if (e.nodeType !== h) return !1;
                    if (0 === g) return e.matches(c);
                    if (1 === g) return e.msMatchesSelector(c);
                    if (2 === g) return e.webkitMatchesSelector(c);
                    if (3 === g) return e.mozMatchesSelector(c);
                    throw new d("Browser lacks native selectors");
                },
                one: function(b, d) {
                    var n = void 0 === d ? a : d.dom();
                    return n.nodeType !== h && n.nodeType !== m || 0 === n.childElementCount ? c.none() : c.from(n.querySelector(b)).map(e.fromDom)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require,
        a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.Compare", ["ephox.compass.Arr", "ephox.peanut.Fun", "ephox.sugar.api.Selectors"], function(n, b, c) {
            var e = function(b, c) {
                return b.dom() === c.dom()
            };
            return {
                eq: e,
                member: function(c, a) {
                    return n.exists(a, b.curry(e, c))
                },
                is: c.is
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.Traverse", "ephox.classify.Type ephox.compass.Arr ephox.peanut.Fun ephox.perhaps.Option ephox.scullion.Struct ephox.sugar.alien.Recurse ephox.sugar.api.Compare ephox.sugar.api.Element".split(" "),
            function(n, b, c, e, d, a, g, h) {
                var m = function(b) {
                        return h.fromDom(b.dom().ownerDocument)
                    },
                    p = function(b) {
                        b = b.dom();
                        return e.from(b.parentNode).map(h.fromDom)
                    },
                    q = function(b, c) {
                        return p(b).fold(function() {
                            return []
                        }, function(b) {
                            var d = [b];
                            return c(b) ? d : d.concat(q(b, c))
                        })
                    },
                    s = function(b) {
                        b = b.dom();
                        return e.from(b.previousSibling).map(h.fromDom)
                    },
                    r = function(b) {
                        b = b.dom();
                        return e.from(b.nextSibling).map(h.fromDom)
                    },
                    t = function(c) {
                        c = c.dom();
                        return b.map(c.childNodes, h.fromDom)
                    },
                    v = function(b, c) {
                        var d = b.dom().childNodes;
                        return e.from(d[c]).map(h.fromDom)
                    },
                    u = d.immutable("element", "offset");
                return {
                    owner: m,
                    defaultView: function(b) {
                        b = b.dom().ownerDocument.defaultView;
                        return h.fromDom(b)
                    },
                    documentElement: function(b) {
                        b = m(b);
                        return h.fromDom(b.dom().documentElement)
                    },
                    parent: p,
                    findIndex: function(c) {
                        return p(c).bind(function(d) {
                            d = t(d);
                            d = b.findIndex(d, function(b) {
                                return g.eq(c, b)
                            });
                            return -1 < d ? e.some(d) : e.none()
                        })
                    },
                    parents: function(b, d) {
                        var e = n.isFunction(d) ? d : c.constant(!1);
                        return q(b, e)
                    },
                    siblings: function(c) {
                        return p(c).map(t).map(function(d) {
                            return b.filter(d,
                                function(b) {
                                    return !g.eq(c, b)
                                })
                        }).getOr([])
                    },
                    prevSibling: s,
                    offsetParent: function(b) {
                        b = b.dom();
                        return e.from(b.offsetParent).map(h.fromDom)
                    },
                    prevSiblings: function(c) {
                        return b.reverse(a.toArray(c, s))
                    },
                    nextSibling: r,
                    nextSiblings: function(b) {
                        return a.toArray(b, r)
                    },
                    children: t,
                    child: v,
                    firstChild: function(b) {
                        return v(b, 0)
                    },
                    lastChild: function(b) {
                        return v(b, b.dom().childNodes.length - 1)
                    },
                    leaf: function(b, c) {
                        var d = t(b);
                        return 0 < d.length && c < d.length ? u(d[c], 0) : u(b, c)
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require,
        a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.Insert", ["ephox.sugar.api.Traverse"], function(n) {
            var b = function(b, c) {
                    n.parent(b).each(function(n) {
                        n.dom().insertBefore(c.dom(), b.dom())
                    })
                },
                c = function(b, c) {
                    b.dom().appendChild(c.dom())
                };
            return {
                before: b,
                after: function(e, d) {
                    n.nextSibling(e).fold(function() {
                        n.parent(e).each(function(b) {
                            c(b, d)
                        })
                    }, function(c) {
                        b(c, d)
                    })
                },
                prepend: function(b, d) {
                    n.firstChild(b).fold(function() {
                        c(b, d)
                    }, function(c) {
                        b.dom().insertBefore(d.dom(), c.dom())
                    })
                },
                append: c,
                appendAt: function(e, d, a) {
                    n.child(e, a).fold(function() {
                        c(e, d)
                    }, function(c) {
                        b(c, d)
                    })
                },
                wrap: function(e, d) {
                    b(e, d);
                    c(d, e)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.InsertAll", ["ephox.compass.Arr", "ephox.sugar.api.Insert"], function(n, b) {
            return {
                before: function(c, e) {
                    n.each(e, function(d) {
                        b.before(c, d)
                    })
                },
                after: function(c, e) {
                    n.each(e, function(d, n) {
                        b.after(0 === n ? c : e[n - 1], d)
                    })
                },
                prepend: function(c, e) {
                    n.each(e.slice().reverse(), function(d) {
                        b.prepend(c,
                            d)
                    })
                },
                append: function(c, e) {
                    n.each(e, function(d) {
                        b.append(c, d)
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.Remove", ["ephox.sugar.api.InsertAll", "ephox.sugar.api.Traverse"], function(n, b) {
            var c = function(b) {
                b = b.dom();
                null !== b.parentNode && b.parentNode.removeChild(b)
            };
            return {
                empty: function(b) {
                    b.dom().textContent = ""
                },
                remove: c,
                unwrap: function(e) {
                    var d = b.children(e);
                    0 < d.length && n.before(e, d);
                    c(e)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require,
        a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.peanut.Thunk", [], function() {
            return {
                cached: function(n) {
                    var b = !1,
                        c;
                    return function() {
                        b || (b = !0, c = n.apply(null, arguments));
                        return c
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.Body", ["ephox.peanut.Thunk", "ephox.sugar.api.Element", "ephox.sugar.api.Node", "global!document"], function(n, b, c, e) {
            var d = function(c) {
                c = c.dom().body;
                if (null === c || void 0 === c) throw "Body is not available yet";
                return b.fromDom(c)
            };
            return {
                body: n.cached(function() {
                    return d(b.fromDom(e))
                }),
                getBody: d,
                inBody: function(b) {
                    b = c.isText(b) ? b.dom().parentNode : b.dom();
                    return void 0 !== b && null !== b && b.ownerDocument.body.contains(b)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.PredicateFilter", ["ephox.compass.Arr", "ephox.sugar.api.Body", "ephox.sugar.api.Traverse"], function(n, b, c) {
            var a = function(b, f) {
                var g = [];
                n.each(c.children(b), function(b) {
                    f(b) &&
                    (g = g.concat([b]));
                    g = g.concat(a(b, f))
                });
                return g
            };
            return {
                all: function(c) {
                    return a(b.body(), c)
                },
                ancestors: function(b, a, e) {
                    return n.filter(c.parents(b, e), a)
                },
                siblings: function(b, a) {
                    return n.filter(c.siblings(b), a)
                },
                children: function(b, a) {
                    return n.filter(c.children(b), a)
                },
                descendants: a
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.SelectorFilter", ["ephox.sugar.api.PredicateFilter", "ephox.sugar.api.Selectors"], function(a, b) {
            return {
                all: function(c) {
                    return b.all(c)
                },
                ancestors: function(c, e, d) {
                    return a.ancestors(c, function(c) {
                        return b.is(c, e)
                    }, d)
                },
                siblings: function(c, e) {
                    return a.siblings(c, function(c) {
                        return b.is(c, e)
                    })
                },
                children: function(c, e) {
                    return a.children(c, function(c) {
                        return b.is(c, e)
                    })
                },
                descendants: function(c, a) {
                    return b.all(a, c)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.impl.ClosestOrAncestor", ["ephox.classify.Type", "ephox.perhaps.Option"], function(a, b) {
            return function(c, e, d, f, g) {
                return c(d,
                    f) ? b.some(d) : a.isFunction(g) && g(d) ? b.none() : e(d, f, g)
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.SelectorFind", ["ephox.perhaps.Option", "ephox.sugar.api.SelectorFilter", "ephox.sugar.api.Selectors", "ephox.sugar.impl.ClosestOrAncestor"], function(a, b, c, e) {
            var d = function(c, d, e) {
                return a.from(b.ancestors(c, d, e)[0])
            };
            return {
                first: function(c) {
                    return a.from(b.all(c)[0])
                },
                ancestor: d,
                sibling: function(c, d) {
                    return a.from(b.siblings(c, d)[0])
                },
                child: function(c, d) {
                    return a.from(b.children(c, d)[0])
                },
                descendant: function(c, d) {
                    return a.from(b.descendants(c, d)[0])
                },
                closest: function(b, a, n) {
                    return e(c.is, d, b, a, n)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.salmon.api.Ephemera", ["ephox.peanut.Fun", "ephox.salmon.style.Styles", "ephox.sugar.api.Attr", "ephox.sugar.api.Remove", "ephox.sugar.api.SelectorFind"], function(a, b, c, e, d) {
            var f = b.resolve("upload-image-container");
            b = "data-" + b.resolve("image-blob");
            var g = function(b) {
                c.remove(b, "class")
            };
            return {
                uploadContainer: a.constant(f),
                blobId: a.constant(b),
                cleanup: function(b) {
                    d.child(b, "img").each(g);
                    e.unwrap(b)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.Elements", ["ephox.compass.Arr", "ephox.sugar.api.Element", "ephox.sugar.api.Traverse", "global!document"], function(a, b, c, e) {
            return {
                fromHtml: function(d, a) {
                    var n = (a || e).createElement("div");
                    n.innerHTML = d;
                    return c.children(b.fromDom(n))
                },
                fromTags: function(c, e) {
                    return a.map(c, function(c) {
                        return b.fromTag(c, e)
                    })
                },
                fromText: function(c, e) {
                    return a.map(c, function(c) {
                        return b.fromText(c, e)
                    })
                },
                fromDom: function(c) {
                    return a.map(c, b.fromDom)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.tinymce.UndoRewriter", "ephox.compass.Arr ephox.salmon.api.Ephemera ephox.sugar.api.Element ephox.sugar.api.Elements ephox.sugar.api.InsertAll ephox.sugar.api.SelectorFilter".split(" "),
            function(a, b, c, e, d, f) {
                return {
                    unwrapHistory: function(g) {
                        for (var h = 0; h < g.undoManager.data.length; h++) {
                            var m = g.undoManager.data[h].content,
                                p = c.fromTag("div");
                            d.append(p, e.fromHtml(m));
                            m = f.descendants(p, "." + b.uploadContainer());
                            a.each(m, b.cleanup);
                            g.undoManager.data[h].content = p.dom().innerHTML
                        }
                    },
                    resrcHistory: function(b, c, d) {
                        for (var a = 0; a < b.undoManager.data.length; a++) b.undoManager.data[a].content = b.undoManager.data[a].content.split(c.objurl()).join(d.location)
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require,
        a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.epithet.Global", [], function() {
            return Function("return this;")()
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.epithet.Resolve", ["ephox.epithet.Global"], function(a) {
            var b = function(b, e) {
                for (var d = e || a, f = 0; f < b.length && void 0 !== d && null !== d; ++f) d = d[b[f]];
                return d
            };
            return {
                path: b,
                resolve: function(c, a) {
                    var d = c.split(".");
                    return b(d, a)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.numerosity.core.Global", ["ephox.epithet.Resolve"], function(a) {
            return {
                getOrDie: function(b, c) {
                    var e = a.resolve(b, c);
                    if (void 0 === e) throw b + " not available on this browser";
                    return e
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.numerosity.api.URL", ["ephox.numerosity.core.Global"], function(a) {
            return {
                createObjectURL: function(b) {
                    return a.getOrDie("URL").createObjectURL(b)
                },
                revokeObjectURL: function(b) {
                    a.getOrDie("URL").revokeObjectURL(b)
                }
            }
        })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.salmon.api.BlobCache", ["ephox.compass.Obj", "ephox.numerosity.api.URL", "ephox.perhaps.Option", "ephox.scullion.Struct"], function(a, b, c, e) {
            var d = e.immutable("id", "blob", "objurl", "data");
            return function() {
                var e = {},
                    g = function(c) {
                        b.revokeObjectURL(c.objurl())
                    };
                return {
                    add: function(b, c, a, n) {
                        c = d(b, c, a, n);
                        return e[b] = c
                    },
                    get: function(b) {
                        return c.from(e[b])
                    },
                    remove: function(b) {
                        var c = e[b];
                        delete e[b];
                        void 0 !== c && g(c)
                    },
                    lookupByData: function(b) {
                        return c.from(a.find(e,
                            function(c) {
                                return c.data().result === b
                            }))
                    },
                    destroy: function() {
                        a.each(e, g);
                        e = {}
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.porkbun.Event", ["ephox.compass.Arr", "ephox.scullion.Struct"], function(a, b) {
            return function(c) {
                var e = b.immutable.apply(null, c),
                    d = [];
                return {
                    bind: function(b) {
                        if (void 0 === b) throw "Event bind error: undefined handler";
                        d.push(b)
                    },
                    unbind: function(b) {
                        b = a.indexOf(d, b); - 1 !== b && d.splice(b, 1)
                    },
                    trigger: function() {
                        var b = e.apply(null,
                            arguments);
                        a.each(d, function(c) {
                            c(b)
                        })
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.porkbun.Events", ["ephox.compass.Obj"], function(a) {
            return {
                create: function(b) {
                    var c = a.map(b, function(b) {
                        return {
                            bind: b.bind,
                            unbind: b.unbind
                        }
                    });
                    b = a.map(b, function(b) {
                        return b.trigger
                    });
                    return {
                        registry: c,
                        trigger: b
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.salmon.api.ImageTracker", "ephox.compass.Arr ephox.salmon.style.Styles ephox.salmon.api.Ephemera ephox.porkbun.Event ephox.porkbun.Events ephox.sugar.api.Attr ephox.sugar.api.SelectorFilter".split(" "),
            function(a, b, c, e, d, f, g) {
                var h = "data-" + b.resolve("image-upload"),
                    m = function(b, c) {
                        return g.descendants(b, "img[" + h + '="' + c + '"]')
                    },
                    p = function(b) {
                        return g.descendants(b, "img:not([" + h + "])[" + c.blobId() + "]")
                    };
                return function() {
                    var b = [],
                        c = [],
                        g = d.create({
                            complete: e(["response"])
                        }),
                        r = function(d) {
                            b = a.filter(b, function(b, c) {
                                return b !== d
                            });
                            !1 === v() && (g.trigger.complete(c), c = [])
                        },
                        v = function() {
                            return 0 < b.length
                        };
                    return {
                        findById: m,
                        findAll: p,
                        register: function(c, a) {
                            f.set(c, h, a);
                            b.push(a)
                        },
                        report: function(b, d, e) {
                            a.each(d,
                                function(b) {
                                    f.remove(b, h);
                                    c.push({
                                        success: e,
                                        element: b.dom()
                                    })
                                });
                            r(b)
                        },
                        inProgress: v,
                        isActive: function(c) {
                            return a.contains(b, c)
                        },
                        events: g.registry
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.highway.Merger", ["ephox.classify.Type"], function(a) {
            var b = function(b) {
                    return function() {
                        var c = Array.prototype.slice.call(arguments, 0);
                        if (0 === c.length) throw "Can't merge zero objects";
                        for (var a = {}, n = 0; n < c.length; n++) {
                            var h = c[n],
                                m;
                            for (m in h) Object.prototype.hasOwnProperty.call(h,
                                m) && (a[m] = b(a[m], h[m]))
                        }
                        return a
                    }
                },
                c = b(function(b, d) {
                    return a.isObject(b) && a.isObject(d) ? c(b, d) : d
                }),
                b = b(function(b, c) {
                    return c
                });
            return {
                deepMerge: c,
                merge: b
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.scullion.ADT", ["ephox.classify.Type", "ephox.compass.Arr", "ephox.compass.Obj", "ephox.peanut.Fun", "global!Array"], function(a, b, c, e, d) {
            return {
                generate: function(e) {
                    if (!a.isArray(e)) throw "cases must be an array";
                    if (0 === e.length) throw "there must be at least one case";
                    var g = {};
                    b.each(e, function(b, m) {
                        var p = c.keys(b);
                        if (1 !== p.length) throw "one and only one name per case";
                        var q = p[0],
                            s = b[q];
                        if (void 0 !== g[q]) throw "duplicate key detected:" + q;
                        if ("cata" === q) throw "cannot have a case named cata (sorry)";
                        if (!a.isArray(s)) throw "case arguments must be an array";
                        g[q] = function() {
                            var b = d.prototype.slice.call(arguments);
                            if (b.length !== s.length) throw "Wrong number of arguments to case " + q + ". Expected " + s.length + " (" + s + "), got " + b.length;
                            return {
                                fold: function() {
                                    if (arguments.length !==
                                        e.length) throw "Wrong number of arguments to fold. Expected " + e.length + ", got " + arguments.length;
                                    return arguments[m].apply(null, b)
                                }
                            }
                        }
                    });
                    return g
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.hermes.api.ImageAsset", ["ephox.highway.Merger", "ephox.scullion.ADT"], function(a, b) {
            var c = b.generate([{
                blob: ["id", "blob", "objurl", "data"]
            }, {
                url: ["id", "url", "raw"]
            }]);
            return a.merge(c, {
                cata: function(b, c, a) {
                    return b.fold(c, a)
                }
            })
        })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.perhaps.Result", ["ephox.peanut.Fun", "ephox.perhaps.Option"], function(a, b) {
            var c = function(b) {
                    return d(function(c, a) {
                        return a(b)
                    })
                },
                e = function(b) {
                    return d(function(c, a) {
                        return c(b)
                    })
                },
                d = function(d) {
                    var g = function() {
                            return d(a.constant(!1), a.constant(!0))
                        },
                        h = a.not(g),
                        m = function(b) {
                            return p(function(a) {
                                return c(b(a))
                            })
                        },
                        p = function(b) {
                            return d(e, b)
                        };
                    return {
                        is: function(b) {
                            return d(a.constant(!1), function(c) {
                                return c === b
                            })
                        },
                        isValue: g,
                        isError: h,
                        getOr: function(b) {
                            return d(a.constant(b), a.identity)
                        },
                        getOrThunk: function(b) {
                            return d(b, a.identity)
                        },
                        getOrDie: function() {
                            return d(function(b) {
                                a.die(b)()
                            }, a.identity)
                        },
                        or: function(b) {
                            return d(a.constant(b), c)
                        },
                        orThunk: function(b) {
                            return d(b, c)
                        },
                        fold: d,
                        map: m,
                        each: m,
                        bind: p,
                        exists: function(b) {
                            return d(a.constant(!1), b)
                        },
                        forall: function(b) {
                            return d(a.constant(!0), b)
                        },
                        toOption: function() {
                            return d(b.none, b.some)
                        }
                    }
                };
            return {
                value: c,
                error: e
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require,
        a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.alien.Toggler", [], function() {
            return function(a, b, c) {
                var e = c || !1,
                    d = function() {
                        b();
                        e = !0
                    },
                    f = function() {
                        a();
                        e = !1
                    };
                return {
                    on: d,
                    off: f,
                    toggle: function() {
                        (e ? f : d)()
                    },
                    isOn: function() {
                        return e
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.Class", ["ephox.sugar.alien.Toggler", "ephox.sugar.api.Attr"], function(a, b) {
            var c = function(b, c) {
                var a = b.dom().classList;
                return void 0 !== a && a.contains(c)
            };
            return {
                add: function(b, c) {
                    b.dom().classList.add(c)
                },
                remove: function(c, a) {
                    var n = c.dom().classList;
                    n.remove(a);
                    0 === n.length && b.remove(c, "class")
                },
                toggle: function(b, c) {
                    return b.dom().classList.toggle(c)
                },
                toggler: function(b, d) {
                    var f = b.dom().classList;
                    return a(function() {
                        f.remove(d)
                    }, function() {
                        f.add(d)
                    }, c(b, d))
                },
                has: c
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.salmon.ui.UploadUi", "ephox.salmon.api.Ephemera ephox.sugar.api.Class ephox.sugar.api.Element ephox.sugar.api.Insert ephox.sugar.api.InsertAll ephox.sugar.api.Remove ephox.sugar.api.SelectorFind ephox.sugar.api.Traverse".split(" "),
            function(a, b, c, e, d, f, g, h) {
                return {
                    removeUi: function(b) {
                        g.ancestor(b, "." + a.uploadContainer()).each(function(b) {
                            var c = h.children(b);
                            d.before(b, c);
                            f.remove(b)
                        })
                    },
                    addUi: function(d) {
                        var f = c.fromTag("div");
                        b.add(f, a.uploadContainer());
                        e.before(d, f);
                        e.append(f, d)
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.salmon.api.UploadUtils", "ephox.compass.Arr ephox.hermes.api.ImageAsset ephox.peanut.Fun ephox.perhaps.Option ephox.perhaps.Result ephox.salmon.api.Ephemera ephox.salmon.ui.UploadUi ephox.scullion.ADT ephox.scullion.Struct ephox.sugar.api.Attr ephox.sugar.api.SelectorFind global!console".split(" "),
            function(a, b, c, e, d, f, g, h, m, p, q, s) {
                var r = m.immutable("image", "blobInfo"),
                    t = h.generate([{
                        failure: ["error"]
                    }, {
                        success: ["result", "images", "blob"]
                    }]),
                    v = function(b, c, d, e) {
                        a.each(c, function(b) {
                            p.set(b, "src", e.location);
                            p.remove(b, f.blobId())
                        });
                        return x(b, d, c)
                    },
                    u = function(b, c, a, e, n, h) {
                        var g = b.lookupByData(n.result).getOrThunk(function() {
                            return b.add(c, a, e, n)
                        });
                        p.set(h, f.blobId(), g.id());
                        return d.value(r(h, g))
                    },
                    w = function(b, c) {
                        var a = p.get(c, f.blobId());
                        return b.get(a).fold(function() {
                            return d.error(a)
                        }, function(b) {
                            return d.value(r(c,
                                b))
                        })
                    },
                    x = function(b, c, a) {
                        return b.get(c).fold(function() {
                            return d.error("Internal error with blob cache")
                        }, function(a) {
                            b.remove(c);
                            return d.value(a)
                        })
                    };
                return {
                    prepareForUpload: function(b, c, a) {
                        var d = b.isActive(c);
                        b.register(a, c);
                        g.addUi(a);
                        return d ? e.none() : e.some(c)
                    },
                    handleUpload: function(b, d, e, f, h, m, p) {
                        var q = function() {
                            s.error("Internal error with blob cache", h);
                            p(t.failure({
                                status: c.constant(666)
                            }))
                        };
                        b.upload(m, h, function(b) {
                            var c = d.findById(f, h);
                            a.each(c, g.removeUi);
                            b.fold(function(b) {
                                    p(t.failure(b))
                                },
                                function(b) {
                                    v(e, c, h, b).fold(q, function(a) {
                                        p(t.success(b, c, a))
                                    })
                                });
                            d.report(h, c, b.isValue())
                        })
                    },
                    registerAssets: function(e, f, h) {
                        return a.bind(h, function(a) {
                            return b.cata(a, function(b, c, a, n) {
                                return q.descendant(f, 'img[src="' + a + '"]').fold(function() {
                                    return [d.error("Image that was just inserted could not be found: " + a)]
                                }, function(d) {
                                    return [u(e, b, c, a, n, d)]
                                })
                            }, c.constant([]))
                        })
                    },
                    findBlobs: function(b, c, d) {
                        d = b.findAll(d);
                        return b.inProgress() ? [] : a.map(d, function(b) {
                            return w(c, b)
                        })
                    }
                }
            })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.numerosity.api.FormData", ["ephox.numerosity.core.Global"], function(a) {
            return function() {
                return new(a.getOrDie("FormData"))
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    a.bolt.module.api.define("global!Math", [], function() {
        return Math
    });
    a.bolt.module.api.define("global!isFinite", [], function() {
        return isFinite
    });
    a.bolt.module.api.define("global!isNaN", [], function() {
        return isNaN
    });
    a.bolt.module.api.define("global!parseFloat", [], function() {
        return parseFloat
    });
    (function(a, k, l) {
        a("ephox.violin.util.Validate", ["global!Math", "global!isFinite", "global!isNaN", "global!parseFloat"], function(a, b, c, e) {
            var d = function(b) {
                    return function(c, a) {
                        var d = typeof a;
                        if (d !== b) throw c + " was not a " + b + ". Was: " + a + " (" + d + ")";
                    }
                },
                f = d("string"),
                g = d("number"),
                h = function(b, c) {
                    g(b, c);
                    if (c !== a.abs(c)) throw b + " was not an integer. Was: " + c;
                };
            return {
                vString: f,
                vChar: function(b, c) {
                    f(b, c);
                    if (1 !== c.length) throw b + " was not a single char. Was: " + c;
                },
                vInt: h,
                vNat: function(b, c) {
                    h(b, c);
                    if (0 > c) throw b + " was not a natural number. Was: " + c;
                },
                pNum: function(a) {
                    return !c(e(a)) && b(a)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.violin.Strings", ["ephox.violin.util.Validate"], function(a) {
            var b = function(b, c, a) {
                    return "" === c ? !0 : b.length < c.length ? !1 : b.substr(a, a + c.length) === c
                },
                c = function(b) {
                    var c = function(b, c) {
                        for (var a = [], d = 0; d < b.length; d++) a.push(c(b[d]));
                        return a
                    };
                    return function() {
                        var a = c(arguments,
                            function(b) {
                                return "string" === typeof b ? b.toLowerCase() : b
                            });
                        return b.apply(this, a)
                    }
                },
                e = function(c, a) {
                    return b(c, a, 0)
                },
                d = c(e),
                f = function(c, a) {
                    return b(c, a, c.length - a.length)
                },
                g = c(f),
                h = function(b, c) {
                    return b.substr(0, c)
                },
                m = function(b, c) {
                    return b.substr(b.length - c, b.length)
                },
                p = function(b, c) {
                    return function(a, d) {
                        return b(a, d) ? c(a, a.length - d.length) : a
                    }
                },
                q = p(e, m),
                p = p(f, h),
                s = function(b, c) {
                    return function(a, d) {
                        return b(a, d) ? a : c(a, d)
                    }
                },
                r = s(e, function(b, c) {
                    return c + b
                }),
                s = s(f, function(b, c) {
                    return b + c
                }),
                t = function(b,
                             c) {
                    return -1 != b.indexOf(c)
                },
                v = c(t),
                u = function(b, c) {
                    return b === c
                },
                c = c(u),
                w = function(b) {
                    if ("" === b) throw "head on empty string";
                    return b.substr(0, 1)
                },
                x = function(b) {
                    if ("" === b) throw "tail on empty string";
                    return b.substr(1, b.length - 1)
                },
                z = function(b, c) {
                    a.vString("str", b);
                    a.vNat("num", c);
                    for (var d = "", e = 0; e < c; e++) d += b;
                    return d
                },
                k = function(b) {
                    return function(c, d, e) {
                        a.vString("str", c);
                        a.vChar("c", d);
                        a.vNat("width", e);
                        var f = c.length;
                        return f >= e ? c : b(c, z(d, e - f))
                    }
                },
                l = k(function(b, c) {
                    return c + b
                }),
                k = k(function(b, c) {
                    return b +
                        c
                });
            return {
                supplant: function(b, c) {
                    return b.replace(/\${([^{}]*)}/g, function(b, a) {
                        var d = c[a],
                            e = typeof d;
                        return "string" === e || "number" === e ? d : b
                    })
                },
                startsWith: e,
                startsWithIgnoringCase: d,
                endsWith: f,
                endsWithIgnoringCase: g,
                first: h,
                last: m,
                removeLeading: q,
                removeTrailing: p,
                ensureLeading: r,
                ensureTrailing: s,
                trim: function(b) {
                    return b.replace(/^\s+|\s+$/g, "")
                },
                lTrim: function(b) {
                    return b.replace(/^\s+/g, "")
                },
                rTrim: function(b) {
                    return b.replace(/\s+$/g, "")
                },
                contains: t,
                containsIgnoringCase: v,
                htmlEncodeDoubleQuotes: function(b) {
                    return b.replace(/\"/gm,
                        "&quot;")
                },
                equals: u,
                equalsIgnoringCase: c,
                head: w,
                repead: z,
                padLeft: l,
                padRight: k,
                toe: function(b) {
                    if ("" === b) throw "toe on empty string";
                    return b.substr(b.length - 1, b.length)
                },
                tail: x,
                torso: function(b) {
                    if ("" === b) throw "torso on empty string";
                    return b.substr(0, b.length - 1)
                },
                capitalize: function(b) {
                    return "" === b ? b : w(b).toUpperCase() + x(b)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.salmon.services.UploadCommon", ["ephox.classify.Type", "ephox.compass.Arr",
            "ephox.numerosity.api.FormData", "ephox.scullion.Struct", "ephox.violin.Strings"
        ], function(a, b, c, e, d) {
            var f = ["jpg", "png", "gif", "jpeg"];
            return {
                failureObject: e.immutable("message", "status", "contents"),
                getFilename: function(c, e) {
                    var m;
                    a.isString(c.name) && !d.endsWith(c.name, ".tmp") ? m = c.name : a.isString(c.type) && d.startsWith(c.type, "image/") ? (m = c.type.substr(6), m = b.contains(f, m) ? e + "." + m : e) : m = e;
                    return m
                },
                buildExtra: function(b, a, d) {
                    var e = c();
                    e.append(b, a, d);
                    return {
                        data: e,
                        contentType: !1,
                        processData: !1
                    }
                }
            }
        })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.numerosity.api.XMLHttpRequest", ["ephox.numerosity.core.Global"], function(a) {
            return function() {
                return new(a.getOrDie("XMLHttpRequest"))
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.jax.base.Ajax", "ephox.classify.Type ephox.compass.Obj ephox.highway.Merger ephox.numerosity.api.XMLHttpRequest ephox.perhaps.Result ephox.violin.Strings global!console".split(" "),
            function(a, b, c, e, d, f, g) {
                var h = {
                    "*": "*/*",
                    text: "text/plain",
                    html: "text/html",
                    xml: "application/xml, text/xml",
                    json: "application/json, text/javascript"
                };
                return {
                    ajax: function(m, p, q, s) {
                        var r = c.merge({
                                url: m,
                                contentType: "application/json",
                                processData: !1,
                                type: "GET"
                            }, s),
                            t = e();
                        t.open(r.type.toUpperCase(), r.url, !0);
                        a.isString(r.contentType) && t.setRequestHeader("Content-Type", r.contentType);
                        s = r.dataType;
                        s = a.isString(s) && "*" !== s ? h[s] + ", " + h["*"] + "; q=0.01" : h["*"];
                        t.setRequestHeader("Accept", s);
                        void 0 !== r.xhrFields &&
                        !0 === r.xhrFields.withCredentials && (t.withCredentials = !0);
                        a.isObject(r.headers) && b.each(r.headers, function(b, c) {
                            a.isString(c) || a.isString(b) ? t.setRequestHeader(c, b) : g.error("Request header data was not a string: ", c, " -> ", b)
                        });
                        var v = function(b) {
                                q('Could not load url "' + m + '": ' + b.status + " " + b.statusText, b.status, b.responseText)
                            },
                            u = function(b) {
                                try {
                                    return d.value(JSON.parse(b.response))
                                } catch (c) {
                                    return d.error({
                                        status: b.status,
                                        statusText: "Response was not JSON",
                                        responseText: b.responseText
                                    })
                                }
                            },
                            w = function(b) {
                                ("json" ===
                                r.dataType ? u(b) : d.value(b.response)).fold(v, function(b) {
                                    p(b)
                                })
                            };
                        t.onerror = v;
                        t.onload = function() {
                            0 === t.status ? f.startsWith(r.url, "file:") ? w(t) : q("Unknown HTTP error (possible cross-domain request)", t.status, t.responseText) : 100 > t.status || 400 <= t.status ? v(t) : w(t)
                        };
                        void 0 === r.data ? t.send() : t.send(r.data)
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.numerosity.api.JSON", ["ephox.numerosity.core.Global"], function(a) {
            return {
                parse: function(b) {
                    return a.getOrDie("JSON").parse(b)
                },
                stringify: function(b) {
                    return a.getOrDie("JSON").stringify(b)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.jax.plain.Ajax", ["ephox.highway.Merger", "ephox.jax.base.Ajax", "ephox.numerosity.api.JSON"], function(a, b, c) {
            return {
                get: function(c, d, f, g) {
                    b.ajax(c, d, f, a.merge({
                        dataType: "text",
                        type: "GET"
                    }, g))
                },
                post: function(e, d, f, g, h) {
                    b.ajax(e, f, g, a.merge({
                        dataType: "text",
                        data: c.stringify(d),
                        type: "POST"
                    }, h))
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require,
        a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.yuri.resolve.Recompose", [], function() {
            return {
                recompose: function(a) {
                    var b = "";
                    "" !== a.protocol && (b += a.protocol, b += ":");
                    "" !== a.authority && (b = b + "//" + a.authority);
                    b += a.path;
                    "" !== a.query && (b += "?", b += a.query);
                    "" !== a.anchor && (b += "#", b += a.anchor);
                    return b
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.yuri.api.Parser", ["ephox.highway.Merger"], function(a) {
            var b = {
                    strictMode: !1,
                    key: "source protocol authority userInfo user password host port relative path directory file query anchor".split(" "),
                    q: {
                        name: "queryKey",
                        parser: /(?:^|&)([^&=]*)=?([^&]*)/g
                    },
                    parser: {
                        strict: /^(?:([^:\/?#]+):)?(?:\/\/((?:(([^:@]*)(?::([^:@]*))?)?@)?([^:\/?#]*)(?::(\d*))?))?((((?:[^?#\/]*\/)*)([^?#]*))(?:\?([^#]*))?(?:#(.*))?)/,
                        loose: /^(?:(?![^:@]+:[^:@\/]*@)([^:\/?#.]+):)?(?:\/\/)?((?:(([^:@]*)(?::([^:@]*))?)?@)?([^:\/?#]*)(?::(\d*))?)(((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[?#]|$)))*\/?)?([^?#\/]*))(?:\?([^#]*))?(?:#(.*))?)/
                    }
                },
                c = function(b, c) {
                    for (var a = c.parser[c.strictMode ? "strict" : "loose"].exec(b), n = {}, h = 14; h--;) n[c.key[h]] =
                        a[h] || "";
                    n[c.q.name] = {};
                    n[c.key[12]].replace(c.q.parser, function(b, a, e) {
                        a && (n[c.q.name][a] = e)
                    });
                    return n
                };
            return {
                parse: function(e, d) {
                    var f = a.merge(b, d);
                    return c(e, f)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.yuri.normalize.Dots", ["ephox.violin.Strings"], function(a) {
            return {
                remove: function(b) {
                    for (var c = "";
                         "" !== b;)
                        if (a.startsWith(b, "../")) b = a.removeLeading(b, "../");
                        else if (a.startsWith(b, "./")) b = a.removeLeading(b, "./");
                        else if (a.startsWith(b,
                                "/./")) b = "/" + a.removeLeading(b, "/./");
                        else if ("/." === b) b = "/";
                        else if (a.startsWith(b, "/../")) b = "/" + a.removeLeading(b, "/../"), c = a.removeTrailing(c, c.substring(c.lastIndexOf("/")));
                        else if ("/.." === b) b = "/", c = a.removeTrailing(c, c.substring(c.lastIndexOf("/")));
                        else if ("." === b || ".." === b) b = "";
                        else {
                            var e = b.match(/(^\/?.*?)(\/|$)/)[1];
                            b = a.removeLeading(b, e);
                            c += e
                        }
                    return c
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.yuri.resolve.Merge", ["ephox.violin.Strings"],
            function(a) {
                return {
                    merge: function(b, c, e) {
                        if ("" !== e && "" === b) return "/" + c;
                        e = b.substring(b.lastIndexOf("/") + 1);
                        return a.removeTrailing(b, e) + c
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.yuri.resolve.Transform", ["ephox.violin.Strings", "ephox.yuri.api.Parser", "ephox.yuri.normalize.Dots", "ephox.yuri.resolve.Merge"], function(a, b, c, e) {
            return {
                transform: function(d, f) {
                    var g = {
                            strictMode: !0
                        },
                        h = b.parse(d, g),
                        g = b.parse(f, g),
                        m = {};
                    "" !== g.protocol ? (m.protocol =
                        g.protocol, m.authority = g.authority, m.path = c.remove(g.path), m.query = g.query) : ("" !== g.authority ? (m.authority = g.authority, m.path = c.remove(g.path), m.query = g.query) : ("" === g.path ? (m.path = h.path, m.query = "" !== g.query ? g.query : h.query) : (a.startsWith(g.path, "/") ? m.path = c.remove(g.path) : (m.path = e.merge(h.path, g.path, d.authority), m.path = c.remove(m.path)), m.query = g.query), m.authority = h.authority), m.protocol = h.protocol);
                    m.anchor = g.anchor;
                    return m
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.yuri.api.Resolver", ["ephox.yuri.resolve.Recompose", "ephox.yuri.resolve.Transform"], function(a, b) {
            return {
                resolve: function(c, e) {
                    var d = b.transform(c, e);
                    return a.recompose(d)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.salmon.services.UploadDirect", "ephox.classify.Type ephox.highway.Merger ephox.jax.plain.Ajax ephox.numerosity.api.JSON ephox.perhaps.Result ephox.salmon.services.UploadCommon ephox.violin.Strings ephox.yuri.api.Resolver".split(" "),
            function(a, b, c, e, d, f, g, h) {
                return function(m) {
                    var p = function() {
                        var b = m.url,
                            c = b.lastIndexOf("/"),
                            b = 0 < c ? b.substr(0, c) : b,
                            b = void 0 === m.basePath ? b : m.basePath;
                        return g.endsWith(b, "/") ? b : b + "/"
                    }();
                    return {
                        upload: function(g, s, r) {
                            g = g.blob();
                            var t = function(b, c, a) {
                                    r(d.error(f.failureObject(b, c, a)))
                                },
                                v = f.getFilename(g, s);
                            s = b.merge(!0 !== m.credentials ? {} : {
                                xhrFields: {
                                    withCredentials: !0
                                }
                            }, f.buildExtra("image", g, v));
                            c.post(m.url, {}, function(b) {
                                var c;
                                try {
                                    var f = e.parse(b);
                                    if (a.isString(f.location)) c = f.location;
                                    else {
                                        t("JSON response did not contain a string location",
                                            500, b);
                                        return
                                    }
                                } catch (g) {
                                    c = b
                                }
                                b = c.split(/\s+/);
                                b = h.resolve(p, 1 === b.length && "" !== b[0] ? b[0] : v);
                                r(d.value({
                                    location: b
                                }))
                            }, t, s)
                        }
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    a.bolt.module.api.define("global!setTimeout", [], function() {
        return setTimeout
    });
    (function(a, k, l) {
        a("ephox.salmon.services.UploadFunction", "ephox.classify.Type ephox.perhaps.Result ephox.salmon.services.UploadCommon ephox.scullion.Struct global!console global!setTimeout".split(" "), function(a, b, c,
                                                                                                                                                                                                            e, d, f) {
            var g = e.immutable("id", "filename", "blob", "base64");
            return function(e) {
                return {
                    upload: function(m, p, q) {
                        var s = function(c) {
                                q(b.error(c))
                            },
                            r = function(c) {
                                a.isString(c) ? q(b.value({
                                    location: c
                                })) : (d.error("Image upload result was not a string"), s(""))
                            },
                            t = c.getFilename(m.blob(), p),
                            v = g(p, t, m.blob(), m.data().result);
                        f(function() {
                            e(v, r, s)
                        }, 0)
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.salmon.api.Uploaders", ["ephox.salmon.services.UploadCommon",
            "ephox.salmon.services.UploadDirect", "ephox.salmon.services.UploadFunction"
        ], function(a, b, c) {
            return {
                direct: function(c) {
                    return b(c)
                },
                custom: function(b) {
                    return c(b)
                },
                failureObject: function(b, c, f) {
                    return a.failureObject(b, c, f)
                },
                getFilename: function(b, c) {
                    return a.getFilename(b, c)
                },
                buildExtra: function(b, c, f) {
                    return a.buildExtra(b, c, f)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.imageupload.EphoxUploader", "ephox.compass.Arr ephox.peanut.Fun ephox.perhaps.Option ephox.powerpaste.imageupload.TinyUploader ephox.powerpaste.imageupload.UploadError ephox.powerpaste.tinymce.UndoRewriter ephox.salmon.api.BlobCache ephox.salmon.api.ImageTracker ephox.salmon.api.UploadUtils ephox.salmon.api.Uploaders ephox.sugar.api.Attr ephox.sugar.api.Element".split(" "),
            function(a, b, c, e, d, f, g, h, m, p, q, s) {
                var r = function(e, r) {
                    var y = g(),
                        w = h();
                    d();
                    var x = d(e, r.url),
                        z = p.direct(r),
                        k = function(b, c, d) {
                            a.each(c, function(c) {
                                q.set(c, "data-mce-src", b.location)
                            });
                            f.resrcHistory(e, d, b)
                        };
                    w.events.complete.bind(function(b) {
                        f.unwrapHistory(e)
                    });
                    var l = function(b, c, a) {
                            m.handleUpload(z, w, y, s.fromDom(e.getBody()), b, c, function(b) {
                                b.fold(function(b) {
                                    a(b)
                                }, k)
                            })
                        },
                        G = function(b, c) {
                            m.prepareForUpload(w, b.blobInfo().id(), b.image()).each(function(a) {
                                l(a, b.blobInfo(), c)
                            })
                        },
                        D = function(b) {
                            var c = x.instance();
                            b = m.registerAssets(y, s.fromDom(e.getBody()), b);
                            a.each(b, function(b) {
                                b.fold(function(b) {
                                    console.error(b)
                                }, function(b) {
                                    G(b, c)
                                })
                            })
                        },
                        E = function() {
                            var b = x.instance(),
                                d = m.findBlobs(w, y, s.fromDom(e.getBody()));
                            a.each(d, function(a) {
                                a.fold(function(b) {
                                    w.report(b, c.none(), !1)
                                }, function(c) {
                                    G(c, b)
                                })
                            })
                        };
                    return {
                        uploadImages: function(b) {
                            E();
                            D(b)
                        },
                        prepareImages: b.noop,
                        getLocalURL: function(b, c, a, d) {
                            return a
                        }
                    }
                };
                return function(c, a) {
                    var d;
                    a ? d = r(c, a) : (d = e(c), d = {
                        uploadImages: b.noop,
                        prepareImages: d.prepareImages,
                        getLocalURL: d.getLocalURL
                    });
                    return d
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.imageupload.UploaderFactory", ["ephox.powerpaste.imageupload.EphoxUploader", "ephox.powerpaste.imageupload.TinyUploader"], function(a, b) {
            return function(c) {
                var e = !c.uploadImages && c.settings.images_upload_url ? {
                    url: c.settings.images_upload_url,
                    basePath: c.settings.images_upload_base_path,
                    credentials: c.settings.images_upload_credentials
                } : null;
                return c.uploadImages ? b(c) : a(c, e)
            }
        })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.tinymce.Util", [], function() {
            return {
                each: tinymce.each,
                trim: tinymce.trim,
                bind: function(a, b) {
                    return function() {
                        return a.apply(b, arguments)
                    }
                },
                extend: function(a) {
                    tinymce.each(Array.prototype.slice.call(arguments, 1), function(b) {
                        for (var c in b) a[c] = b[c]
                    });
                    return a
                },
                ephoxGetComputedStyle: function(a) {
                    return a.ownerDocument.defaultView ? a.ownerDocument.defaultView.getComputedStyle(a, null) : a.currentStyle || {}
                },
                log: function(a) {
                    "undefined" !==
                    typeof console && console.log && console.log(a)
                },
                compose: function(a) {
                    var b = Array.prototype.slice.call(a).reverse();
                    return function(c) {
                        for (var a = 0; a < b.length; a++) c = (0, b[a])(c);
                        return c
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.tinymce.Clipboard", ["ephox.powerpaste.legacy.tinymce.Util"], function(a) {
            var b = function(b, e, d, f) {
                var g, h, m = b.selection,
                    p = b.dom;
                h = b.getBody();
                var q;
                q = d.isText();
                d.reset();
                if (f.clipboardData && f.clipboardData.getData("text/html")) return f.preventDefault(),
                    f = f.clipboardData.getData("text/html"), q = f.match(/<html[\s\S]+<\/html>/i), e(null === q ? f : q[0]);
                if (!p.get("_mcePaste"))
                    if (d = p.add(h, "div", {
                            id: "_mcePaste",
                            "class": "mcePaste"
                        }, '\ufeff<br _mce_bogus="1">'), h = h != b.getDoc().body ? p.getPos(b.selection.getStart(), h).y : h.scrollTop, p.setStyles(d, {
                            position: "absolute",
                            left: -1E4,
                            top: h,
                            width: 1,
                            height: 1,
                            overflow: "hidden"
                        }), tinymce.isIE)
                        if (h = p.doc.body.createTextRange(), h.moveToElementText(d), h.execCommand("Paste"), p.remove(d), "\ufeff" === d.innerHTML) b.execCommand("mcePasteWord"),
                            f.preventDefault();
                        else return q ? e(d.innerText) : e(d.innerHTML), tinymce.dom.Event.cancel(f);
                    else {
                        var s = function(b) {
                            b.preventDefault()
                        };
                        p.bind(b.getDoc(), "mousedown", s);
                        p.bind(b.getDoc(), "keydown", s);
                        tinymce.isGecko && (h = b.selection.getRng(!0), h.startContainer == h.endContainer && 3 == h.startContainer.nodeType && (nodes = p.select("p,h1,h2,h3,h4,h5,h6,pre", d), 1 == nodes.length && p.remove(nodes.reverse(), !0)));
                        g = b.selection.getRng();
                        d = d.firstChild;
                        h = b.getDoc().createRange();
                        h.setStart(d, 0);
                        h.setEnd(d, 1);
                        m.setRng(h);
                        window.setTimeout(function() {
                            var d = "",
                                f = p.select("div.mcePaste");
                            a.each(f, function(b) {
                                var c = b.firstChild;
                                c && "DIV" == c.nodeName && c.style.marginTop && c.style.backgroundColor && p.remove(c, 1);
                                a.each(p.select("div.mcePaste", b), function(b) {
                                    p.remove(b, 1)
                                });
                                a.each(p.select("span.Apple-style-span", b), function(b) {
                                    p.remove(b, 1)
                                });
                                a.each(p.select("br[_mce_bogus]", b), function(b) {
                                    p.remove(b)
                                });
                                d += b.innerHTML
                            });
                            a.each(f, function(b) {
                                p.remove(b)
                            });
                            g && m.setRng(g);
                            e(d);
                            p.unbind(b.getDoc(), "mousedown", s);
                            p.unbind(b.getDoc(),
                                "keydown", s)
                        }, 0)
                    }
            };
            return {
                getOnPasteFunction: function(a, e, d) {
                    return function(n) {
                        b(a, e, d, n)
                    }
                },
                getOnKeyDownFunction: function(a, e, d) {
                    return function(n) {
                        (tinymce.isOpera || 0 < navigator.userAgent.indexOf("Firefox/2")) && ((tinymce.isMac ? n.metaKey : n.ctrlKey) && 86 == n.keyCode || n.shiftKey && 45 == n.keyCode) && b(a, e, d, n)
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.data.Insert", [], function() {
            return {
                insert: function(a, b) {
                    var c = b.getDoc(),
                        e, d = b.dom;
                    b.selection.setContent('<span id="ephoxInsertMarker">&nbsp;</span>');
                    e = d.get("ephoxInsertMarker");
                    for (var f = c.createDocumentFragment(); a.firstChild && !d.isBlock(a.firstChild);) f.appendChild(a.firstChild);
                    for (c = c.createDocumentFragment(); a.lastChild && !d.isBlock(a.lastChild);) c.appendChild(a.lastChild);
                    e.parentNode.insertBefore(f, e);
                    d.insertAfter(c, e);
                    if (a.firstChild) {
                        if (d.isBlock(a.firstChild)) {
                            for (; !d.isBlock(e.parentNode) && e.parentNode !== d.getRoot();) e = d.split(e.parentNode, e);
                            d.is(e.parentNode,
                                "td,th") || e.parentNode === d.getRoot() || (e = d.split(e.parentNode, e))
                        }
                        d.replace(a, e)
                    } else d.remove(e)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.tinymce.Settings", ["ephox.powerpaste.legacy.tinymce.Util"], function(a) {
            var b = {
                    strip_class_attributes: "all",
                    retain_style_properties: "none"
                },
                c = {
                    strip_class_attributes: "none",
                    retain_style_properties: "valid"
                },
                e = function(a, d) {
                    if (a && "string" != typeof a) return a;
                    switch (a) {
                        case "clean":
                            return b;
                        case "merge":
                            return c;
                        default:
                            return d
                    }
                },
                d = function(b, c, d) {
                    b = e(b, c);
                    return b = a.extend(b, {
                        base_64_images: d
                    })
                };
            return {
                create: function(a, e, n) {
                    var m = d(a, b, n),
                        p = d(e, c, n),
                        q = p;
                    return {
                        setWordContent: function(b) {
                            q = b ? m : p
                        },
                        get: function(b) {
                            return q[b]
                        }
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.data.tokens.Attributes", ["ephox.powerpaste.legacy.tinymce.Util"], function(a) {
            var b = function(b, a) {
                return b && a ? function(d, n) {
                    return a(d,
                        b(d, n))
                } : b || a
            };
            return {
                manager: function(c) {
                    var e = 0,
                        d, f = function() {
                            return d
                        },
                        g;
                    g = function() {
                        d = {};
                        e = 0;
                        a.each(c.attributes, function(b) {
                            var a = b.nodeName,
                                c = b.value;
                            (!1 !== b.specified || "name" === b.nodeName && "" !== b.value) && null !== c && void 0 !== c && (d[a] = c, e++)
                        });
                        void 0 === d.style && c.style.cssText && (d.style = c.style.cssText, e++);
                        g = f;
                        return d
                    };
                    var h, m, p = function(b) {
                        a.each(g(), function(a, c) {
                            b(c, a)
                        })
                    };
                    return {
                        get: function(b) {
                            return g()[b]
                        },
                        each: p,
                        filter: function(a) {
                            h || (m = g);
                            h = b(h, a);
                            g = function() {
                                g = m;
                                p(function(b, a) {
                                    var n =
                                        h(b, a);
                                    null === n ? (c.removeAttribute(b), delete d[b], e--) : n !== a && ("class" === b ? c.className = n : c.setAttribute(b, n), d[b] = n)
                                });
                                g = f;
                                return d
                            }
                        },
                        getAttributes: function() {
                            return g()
                        },
                        getAttributeCount: function() {
                            g();
                            return e
                        }
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.data.tokens.Token", ["ephox.powerpaste.legacy.data.tokens.Attributes", "ephox.powerpaste.legacy.tinymce.Util"], function(a, b, c) {
            var e = a.manager,
                d = function(b) {
                    return b.replace(/-(.)/g,
                        function(b, a) {
                            return a.toUpperCase()
                        })
                },
                f = function(b) {
                    return b.replace(/([A-Z])/g, function(b, a) {
                        return "-" + a.toLowerCase()
                    })
                },
                g = !1,
                h = function(a, c, d) {
                    var e, n;
                    c = c || a.getAttribute("style");
                    void 0 !== c && null !== c && c.split || (c = a.style.cssText);
                    b.each(c.split(";"), function(a) {
                        var c = a.indexOf(":");
                        0 < c && (e = b.trim(a.substring(0, c)), e.toUpperCase() === e && (e = e.toLowerCase()), e = f(e), n = b.trim(a.substring(c + 1)), g || (g = 0 === e.indexOf("mso-")), d(e, n))
                    });
                    g || (n = a.style["mso-list"]) && d("mso-list", n)
                },
                m = function(a, c, n) {
                    var f,
                        g, m, r, w;
                    switch (a.nodeType) {
                        case 1:
                            c ? f = "endElement" : (f = "startElement", r = e(a), w = {}, h(a, n, function(b, a) {
                                w[b] = a
                            }));
                            g = "HTML" !== a.scopeName && a.scopeName && a.tagName && 0 >= a.tagName.indexOf(":") ? (a.scopeName + ":" + a.tagName).toUpperCase() : a.tagName;
                            break;
                        case 3:
                            f = "text";
                            m = a.nodeValue;
                            break;
                        case 8:
                            f = "comment";
                            m = a.nodeValue;
                            break;
                        default:
                            b.log("WARNING: Unsupported node type encountered: " + a.nodeType)
                    }
                    var x = function(b) {
                        "startElement" === f && r.filter(b)
                    };
                    return {
                        getNode: function() {
                            r && r.getAttributes();
                            return a
                        },
                        tag: function() {
                            return g
                        },
                        type: function() {
                            return f
                        },
                        text: function() {
                            return m
                        },
                        toString: function() {
                            return "Type: " + f + ", Tag: " + g + " Text: " + m
                        },
                        getAttribute: function(b) {
                            return r.get(b.toLowerCase())
                        },
                        filterAttributes: x,
                        filterStyles: function(c) {
                            if ("startElement" === f) {
                                var e = "";
                                b.each(w, function(b, n) {
                                    var f = c(n, b);
                                    null === f ? (a.style.removeProperty ? a.style.removeProperty(d(n)) : a.style.removeAttribute(d(n)), delete w[n]) : (e += n + ": " + f + "; ", w[n] = f)
                                });
                                e = e ? e : null;
                                x(function(b, a) {
                                    return "style" === b ? e : a
                                });
                                a.style.cssText = e
                            }
                        },
                        getAttributeCount: function() {
                            return r.getAttributeCount()
                        },
                        attributes: function(b) {
                            r.each(b)
                        },
                        getStyle: function(b) {
                            return w[b]
                        },
                        styles: function(a) {
                            b.each(w, function(b, c) {
                                a(c, b)
                            })
                        },
                        getComputedStyle: function() {
                            return b.ephoxGetComputedStyle(a)
                        },
                        isWhitespace: function() {
                            return "text" === f && /^[\s\u00A0]*$/.test(m)
                        }
                    }
                };
            a = function(b, a) {
                return m(a.createElement(b), !0)
            };
            return {
                START_ELEMENT_TYPE: "startElement",
                END_ELEMENT_TYPE: "endElement",
                TEXT_TYPE: "text",
                COMMENT_TYPE: "comment",
                FINISHED: a("HTML", window.document),
                token: m,
                createStartElement: function(a, c, e, n) {
                    var f = n.createElement(a),
                        h = "";
                    b.each(c, function(b, a) {
                        f.setAttribute(a, b)
                    });
                    b.each(e, function(b, a) {
                        h += a + ":" + b + ";";
                        f.style[d(a)] = b
                    });
                    return m(f, !1, "" !== h ? h : null)
                },
                createEndElement: a,
                createComment: function(b, a) {
                    return m(a.createComment(b), !1)
                },
                createText: function(b, a) {
                    return m(a.createTextNode(b))
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.data.tokens.Serializer", ["ephox.powerpaste.legacy.data.tokens.Token"], function(a) {
            return {
                create: function(b) {
                    var c =
                        b.createDocumentFragment();
                    return {
                        dom: c,
                        receive: function(e) {
                            var d = function(b) {
                                    b = b.getNode().cloneNode(!1);
                                    c.appendChild(b);
                                    c = b
                                },
                                f = function(a, d) {
                                    var e = b.createTextNode(a.text());
                                    c.appendChild(e)
                                };
                            switch (e.type()) {
                                case a.START_ELEMENT_TYPE:
                                    d(e);
                                    break;
                                case a.TEXT_TYPE:
                                    f(e);
                                    break;
                                case a.END_ELEMENT_TYPE:
                                    c = c.parentNode;
                                    break;
                                case a.COMMENT_TYPE:
                                    break;
                                default:
                                    throw {
                                        message: "Unsupported token type: " + e.type()
                                    };
                            }
                        }
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a,
              k, l) {
        a("ephox.powerpaste.legacy.data.tokens.Tokenizer", ["ephox.powerpaste.legacy.data.tokens.Token"], function(a) {
            return {
                tokenize: function(b, c) {
                    var e;
                    c = c || window.document;
                    e = c.createElement("div");
                    c.body.appendChild(e);
                    e.style.position = "absolute";
                    e.style.left = "-10000px";
                    e.innerHTML = b;
                    nextNode = e.firstChild || a.FINISHED;
                    var d = [];
                    endNode = !1;
                    return {
                        hasNext: function() {
                            return void 0 !== nextNode
                        },
                        next: function() {
                            var b = nextNode,
                                g = endNode;
                            !endNode && nextNode.firstChild ? (d.push(nextNode), nextNode = nextNode.firstChild) :
                                endNode || 1 !== nextNode.nodeType ? nextNode.nextSibling ? (nextNode = nextNode.nextSibling, endNode = !1) : (nextNode = d.pop(), endNode = !0) : endNode = !0;
                            b === a.FINISHED || nextNode || (c.body.removeChild(e), nextNode = a.FINISHED);
                            b = b === a.FINISHED ? b : b ? a.token(b, g) : void 0;
                            return b
                        }
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.data.tokens.Filter", ["ephox.powerpaste.legacy.data.tokens.Token", "ephox.powerpaste.legacy.tinymce.Util"], function(a,
                                                                                                                                                        b) {
            var c = function(c, d) {
                return function(f, g, h) {
                    var m, p, q, s = !1,
                        r = function() {
                            d && d(z);
                            s = !1;
                            p = [];
                            q = []
                        },
                        t = function(a) {
                            b.each(a, function(b) {
                                f.receive(b)
                            })
                        },
                        v = function(b) {
                            s ? q.push(b) : f.receive(b)
                        },
                        u = function() {
                            w();
                            t(q);
                            r()
                        },
                        w = function() {
                            b.each(m, function(b) {
                                v(b)
                            });
                            x()
                        },
                        x = function() {
                            m = []
                        },
                        z = {
                            document: h || window.document,
                            settings: g || {},
                            emit: v,
                            receive: function(b) {
                                d && p.push(b);
                                c(z, b);
                                b === a.FINISHED && u()
                            },
                            startTransaction: function() {
                                s = !0
                            },
                            rollback: function() {
                                t(p);
                                r()
                            },
                            commit: u,
                            defer: function(b) {
                                m = m || [];
                                m.push(b)
                            },
                            hasDeferred: function() {
                                return m && 0 < m.length
                            },
                            emitDeferred: w,
                            dropDeferred: x
                        };
                    r();
                    return z
                }
            };
            return {
                createFilter: c,
                createAttributeFilter: function(a) {
                    return c(function(c, n) {
                        n.filterAttributes(b.bind(a, c));
                        c.emit(n)
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.filters.Text", ["ephox.powerpaste.legacy.data.tokens.Filter", "ephox.powerpaste.legacy.data.tokens.Token"], function(a, b) {
            var c = /^(P|H[1-6]|T[DH]|LI|DIV|BLOCKQUOTE|PRE|ADDRESS|FIELDSET|DD|DT|CENTER)$/,
                e = function() {
                    return null
                },
                d = !1;
            return a.createFilter(function(a, n) {
                var h = function() {
                    d || (a.emit(b.createStartElement("P", {}, {}, a.document)), d = !0)
                };
                switch (n.type()) {
                    case b.TEXT_TYPE:
                        h();
                        a.emit(n);
                        break;
                    case b.END_ELEMENT_TYPE:
                        d && (c.test(n.tag()) || n === b.FINISHED) ? (a.emit(b.createEndElement("P", a.document)), d = !1) : "BR" === n.tag() && a.emit(n);
                        break;
                    case b.START_ELEMENT_TYPE:
                        "BR" === n.tag() ? (n.filterAttributes(e), n.filterStyles(e), a.emit(n)) : "IMG" === n.tag() && n.getAttribute("alt") && (h(), a.emit(b.createText(n.getAttribute("alt"),
                            a.document)))
                }
                n === b.FINISHED && a.emit(n)
            })
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.data.tokens.Helper", ["ephox.powerpaste.legacy.data.tokens.Token"], function(a) {
            return {
                hasNoAttributes: function(b, c) {
                    return b.type() === a.START_ELEMENT_TYPE ? 0 === b.getAttributeCount() || c && 1 === b.getAttributeCount() && null !== b.getAttribute("style") && void 0 !== b.getAttribute("style") : b.type() === a.END_ELEMENT_TYPE
                },
                supportsCustomStyles: function() {
                    if (0 <
                        navigator.userAgent.indexOf("Gecko") && 0 > navigator.userAgent.indexOf("WebKit")) return !1;
                    var b = document.createElement("div");
                    try {
                        b.innerHTML = '<p style="mso-list: Ignore;">&nbsp;</p>'
                    } catch (c) {
                        return !1
                    }
                    return "Ignore" === a.token(b.firstChild).getStyle("mso-list")
                }(),
                spanOrA: function(b) {
                    return "A" === b.tag() || "SPAN" === b.tag()
                },
                hasMsoListStyle: function(b) {
                    return (b = b.getStyle("mso-list")) && "skip" !== b
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.filters.list.ListTypes", ["ephox.powerpaste.legacy.data.tokens.Token", "ephox.powerpaste.legacy.tinymce.Util"], function(a, b) {
            var c = [{
                    regex: /^\(?[dc][\.\)]$/,
                    type: {
                        tag: "OL",
                        type: "lower-alpha"
                    }
                }, {
                    regex: /^\(?[DC][\.\)]$/,
                    type: {
                        tag: "OL",
                        type: "upper-alpha"
                    }
                }, {
                    regex: /^\(?M*(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})[\.\)]$/,
                    type: {
                        tag: "OL",
                        type: "upper-roman"
                    }
                }, {
                    regex: /^\(?m*(cm|cd|d?c{0,3})(xc|xl|l?x{0,3})(ix|iv|v?i{0,3})[\.\)]$/,
                    type: {
                        tag: "OL",
                        type: "lower-roman"
                    }
                }, {
                    regex: /^\(?[0-9]+[\.\)]$/,
                    type: {
                        tag: "OL"
                    }
                }, {
                    regex: /^([0-9]+\.)*[0-9]+\.?$/,
                    type: {
                        tag: "OL",
                        variant: "outline"
                    }
                }, {
                    regex: /^\(?[a-z]+[\.\)]$/,
                    type: {
                        tag: "OL",
                        type: "lower-alpha"
                    }
                }, {
                    regex: /^\(?[A-Z]+[\.\)]$/,
                    type: {
                        tag: "OL",
                        type: "upper-alpha"
                    }
                }],
                e = {
                    "\u2022": {
                        tag: "UL",
                        type: "disc"
                    },
                    "\u00b7": {
                        tag: "UL",
                        type: "disc"
                    },
                    "\u00a7": {
                        tag: "UL",
                        type: "square"
                    }
                },
                d = {
                    o: {
                        tag: "UL",
                        type: "circle"
                    },
                    "-": {
                        tag: "UL",
                        type: "disc"
                    },
                    "\u25cf": {
                        tag: "UL",
                        type: "disc"
                    }
                },
                f = function(b, a) {
                    var c = {
                        tag: b.tag,
                        type: b.type,
                        variant: a
                    };
                    b.start && (c.start = b.start);
                    b.type || delete c.type;
                    return c
                },
                g = function(b, a, c) {
                    return b === a ||
                        b && a && b.tag === a.tag && b.type === a.type && (c || b.variant === a.variant)
                };
            return {
                guessListType: function(a, n, p) {
                    var q = null,
                        s, r;
                    a && (s = a.text, r = a.symbolFont);
                    s = b.trim(s);
                    (q = d[s]) ? q = f(q, s): r ? q = (q = e[s]) ? f(q, s) : {
                        tag: "UL",
                        variant: s
                    } : (b.each(c, function(b) {
                        if (b.regex.test(s)) {
                            if (n && g(b.type, n, !0)) return q = b.type, q.start = parseInt(s), !1;
                            q || (q = b.type);
                            q.start = parseInt(s)
                        }
                    }), q && !q.variant && (a = "(" === s.charAt(0) ? "()" : ")" === s.charAt(s.length - 1) ? ")" : ".", q = f(q, a)));
                    q && "OL" === q.tag && p && ("P" !== p.tag() || /^MsoHeading/.test(p.getAttribute("class"))) &&
                    (q = null);
                    return q
                },
                eqListType: g,
                checkFont: function(b, c) {
                    b.type() == a.START_ELEMENT_TYPE && ((font = b.getStyle("font-family")) ? c = "Wingdings" === font || "Symbol" === font : /^(P|H[1-6]|DIV)$/.test(b.tag()) && (c = !1));
                    return c
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.filters.list.CommentHeuristics", ["ephox.powerpaste.legacy.data.tokens.Token", "ephox.powerpaste.legacy.filters.list.ListTypes", "ephox.powerpaste.legacy.tinymce.Util"],
            function(a, b, c) {
                var e = function(b) {
                        var a = b.indexOf(".");
                        if (0 <= a && c.trim(b.substring(a + 1)) === className) return match = results[2], !1
                    },
                    d = function(b) {
                        var a = {};
                        return function(c, d) {
                            var e, n = c + "," + d;
                            if (a.hasOwnProperty(n)) return a[n];
                            e = b.call(null, c, d);
                            return a[n] = e
                        }
                    }(function(b, a) {
                        var d, n = /([^{]+){([^}]+)}/g;
                        for (n.lastIndex = 0; null !== (d = n.exec(b));) c.each(d[1].split(","), e(selector));
                        return !1
                    });
                return {
                    isListWithoutCommentsOrStyles: function(d, e) {
                        var h, m = !1,
                            p;
                        p = function(b) {
                            (b = b.style.fontFamily) && (m = "Wingdings" ===
                                b || "Symbol" === b)
                        };
                        if (d.type() === a.START_ELEMENT_TYPE && e.openedTag && "SPAN" === d.tag()) {
                            h = e.openedTag.getNode();
                            p(h);
                            for (1 < h.childNodes.length && "A" === h.firstChild.tagName && "" === h.firstChild.textContent && (h = h.childNodes[1]); h.firstChild && ("SPAN" === h.firstChild.tagName || "A" === h.firstChild.tagName);) h = h.firstChild, p(h);
                            if ((h = h.firstChild) && 3 === h.nodeType) {
                                p = h.value;
                                c.trim(p) || (p = (h = h.parentNode.nextSibling) ? h.value : "");
                                if (!h || c.trim(h.parentNode.textContent) != p) return !1;
                                if (p = b.guessListType({
                                            text: p,
                                            symbolFont: m
                                        },
                                        null, e.originalToken)) return h.nextSibling && "SPAN" === h.nextSibling.tagName && /^[\u00A0\s]/.test(h.nextSibling.firstChild.value) && ("P" === e.openedTag.tag() || "UL" === p.tag)
                            } else return h && "IMG" === h.tagName
                        }
                        return !1
                    },
                    indentGuesser: function() {
                        var b, a;
                        return {
                            guessIndentLevel: function(c, e, n, q) {
                                var s = 1;
                                if (q && /^([0-9]+\.)+[0-9]+\.?$/.test(q.text)) return q.text.replace(/([0-9]+|\.$)/g, "").length + 1;
                                n = a || parseInt(d(n, e.getAttribute("class")));
                                c = c.getNode();
                                e = e.getNode();
                                q = 0;
                                for (c = c.parentNode; null !== c && void 0 !==
                                c && c !== e.parentNode;) q += c.offsetLeft, c = c.offsetParent;
                                e = q;
                                n ? b ? e += b : 0 === e && (b = n, e += n) : n = 48;
                                a = n = Math.min(e, n);
                                return s = Math.max(1, Math.floor(e / n)) || 1
                            }
                        }
                    },
                    styles: function() {
                        var b = !1,
                            c = "";
                        return {
                            check: function(d) {
                                return b && d.type() === a.TEXT_TYPE ? (c += d.text(), !0) : d.type() === a.START_ELEMENT_TYPE && "STYLE" === d.tag() ? b = !0 : d.type() === a.END_ELEMENT_TYPE && "STYLE" === d.tag() ? (b = !1, !0) : !1
                            }
                        }
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.filters.list.Emitter", ["ephox.powerpaste.legacy.data.tokens.Token", "ephox.powerpaste.legacy.filters.list.ListTypes"], function(a, b) {
            var c = ["disc", "circle", "square"];
            return function(e, d) {
                var f = [],
                    g = [],
                    h = 0,
                    m, p = function(b, c) {
                        var g = {},
                            p = {};
                        h++;
                        c && b.type && (g = {
                            "list-style-type": b.type
                        });
                        b.start && 1 < b.start && (p = {
                            start: b.start
                        });
                        f.push(b);
                        e.emit(a.createStartElement(b.tag, p, g, d));
                        m = b
                    },
                    q = function() {
                        e.emit(a.createEndElement(f.pop().tag, d));
                        h--;
                        m = f[f.length - 1]
                    },
                    s = function() {
                        var b = g ? g.pop() : "P";
                        "P" != b && e.emit(a.createEndElement(b,
                            d));
                        e.emit(a.createEndElement("LI", d))
                    },
                    r = function(c, f, h) {
                        var s = {};
                        if (c) {
                            var r = c.getStyle("margin-left");
                            void 0 !== r && (s["margin-left"] = r)
                        } else s["list-style-type"] = "none";
                        m && !b.eqListType(m, f) && (q(), h && (e.emit(a.createStartElement("P", {}, {}, d)), e.emit(a.createText("\u00a0", d)), e.emit(a.createEndElement("P", d))), p(f, !0));
                        e.emit(a.createStartElement("LI", {}, s, d));
                        c && "P" != c.tag() ? (g.push(c.tag()), c.filterStyles(function() {
                            return null
                        }), e.emit(c)) : g.push("P")
                    };
                return {
                    openList: p,
                    closelist: q,
                    closeAllLists: function() {
                        for (; 0 <
                               h;) s(), q();
                        e.commit()
                    },
                    closeItem: s,
                    openLI: r,
                    openItem: function(b, f, m, w) {
                        if (m) {
                            for (h || (h = 0); h > b;) s(), q();
                            "UL" === m.tag && c[b - 1] === m.type && (m = {
                                tag: "UL"
                            });
                            if (h == b) s(), r(f, m, w);
                            else
                                for (1 < b && 0 < g.length && "P" !== g[g.length - 1] && (e.emit(a.createEndElement(g[g.length - 1], d)), g[g.length - 1] = "P"); h < b;) p(m, h == b - 1), r(h == b ? f : void 0, m)
                        }
                    },
                    getCurrentListType: function() {
                        return m
                    },
                    getCurrentLevel: function() {
                        return h
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.filters.list.ListStates", ["ephox.powerpaste.legacy.data.tokens.Helper", "ephox.powerpaste.legacy.data.tokens.Token", "ephox.powerpaste.legacy.filters.list.CommentHeuristics", "ephox.powerpaste.legacy.filters.list.ListTypes", "ephox.powerpaste.legacy.tinymce.Util"], function(a, b, c, e, d) {
            var f = function(b, a) {
                    d.log("Unexpected token in list conversion: " + a.toString());
                    b.rollback()
                },
                g = function(b, a, c) {
                    return a == c ? b : null
                },
                h = function(c, e, f) {
                    f.type() === b.TEXT_TYPE && "" === d.trim(f.text()) ? c.defer(f) : e.skippedPara || f.type() !== b.START_ELEMENT_TYPE ||
                    "P" !== f.tag() || a.hasMsoListStyle(f) ? p(c, e, f) : (e.openedTag = f, c.defer(f), e.nextFilter = m)
                },
                m = function(d, e, f) {
                    f.type() !== b.START_ELEMENT_TYPE || "SPAN" !== f.tag() || 0 !== e.spanCount.length || !a.supportsCustomStyles && c.isListWithoutCommentsOrStyles(f, e) || a.hasMsoListStyle(f) ? f.type() === b.END_ELEMENT_TYPE ? "SPAN" === f.tag() ? (d.defer(f), e.spanCount.pop()) : "P" === f.tag() ? (d.defer(f), e.skippedPara = !0, e.openedTag = null, e.nextFilter = h) : (e.nextFilter = p, e.nextFilter(d, e, f)) : f.isWhitespace() ? d.defer(f) : (e.nextFilter = p, e.nextFilter(d,
                        e, f)) : (d.defer(f), e.spanCount.push(f))
                },
                p = function(d, e, f) {
                    var h = function() {
                        e.emitter.closeAllLists();
                        d.emitDeferred();
                        e.openedTag = null;
                        d.emit(f);
                        e.nextFilter = p
                    };
                    if (f.type() === b.START_ELEMENT_TYPE && a.hasMsoListStyle(f) && "LI" !== f.tag()) {
                        f.getStyle("mso-list");
                        var g = / level([0-9]+)/.exec(f.getStyle("mso-list"));
                        g && g[1] ? (e.itemLevel = parseInt(g[1], 10) + e.styleLevelAdjust, e.nextFilter === p ? d.emitDeferred() : d.dropDeferred(), e.nextFilter = s, d.startTransaction(), e.originalToken = f, e.commentMode = !1) : h()
                    } else !a.supportsCustomStyles &&
                    (f.type() === b.COMMENT_TYPE && "[if !supportLists]" === f.text() || c.isListWithoutCommentsOrStyles(f, d)) ? (f.type() === b.START_ELEMENT_TYPE && "SPAN" === f.tag() && e.spanCount.push(f), e.nextFilter = s, d.startTransaction(), e.originalToken = e.openedTag, e.commentMode = !0, e.openedTag = null, d.dropDeferred()) : f.type() === b.END_ELEMENT_TYPE && a.spanOrA(f) ? (d.defer(f), e.spanCount.pop()) : f.type() === b.START_ELEMENT_TYPE ? a.spanOrA(f) ? (d.defer(f), e.spanCount.push(f)) : (e.openedTag && (e.emitter.closeAllLists(), d.emitDeferred()), e.openedTag =
                        f, d.defer(f)) : h()
                },
                q = function(a, c, d) {
                    d.type() === b.END_ELEMENT_TYPE && c.originalToken.tag() === d.tag() && (c.nextFilter = h, c.styleLevelAdjust = -1);
                    a.emit(d)
                },
                s = function(a, c, e) {
                    e.type() == b.START_ELEMENT_TYPE && "Ignore" === e.getStyle("mso-list") && (c.nextFilter = r);
                    if (e.type() === b.START_ELEMENT_TYPE && "SPAN" === e.tag()) {
                        if (c.spanCount.push(e), c.commentMode && "" === e.getAttribute("style") || null === e.getAttribute("style")) c.nextFilter = r
                    } else if ("A" === e.tag()) e.type() === b.START_ELEMENT_TYPE ? c.spanCount.push(e) : c.spanCount.pop();
                    else if (e.type() === b.TEXT_TYPE)
                        if (c.commentMode) c.nextFilter = r, c.nextFilter(a, c, e);
                        else {
                            var n = c.originalToken,
                                h = c.spanCount;
                            c.emitter.closeAllLists();
                            a.emit(n);
                            d.each(h, d.bind(a.emit, a));
                            a.emit(e);
                            a.commit();
                            c.originalToken = n;
                            c.nextFilter = q
                        }
                    else(c.commentMode || e.type() !== b.COMMENT_TYPE) && f(a, e)
                },
                r = function(c, d, e) {
                    e.type() === b.TEXT_TYPE ? e.isWhitespace() || (d.nextFilter = t, d.bulletInfo = {
                        text: e.text(),
                        symbolFont: d.symbolFont
                    }) : a.spanOrA(e) ? e.type() === b.START_ELEMENT_TYPE ? d.spanCount.push(e) : d.spanCount.pop() :
                        e.type() === b.START_ELEMENT_TYPE && "IMG" === e.tag() ? (d.nextFilter = t, d.bulletInfo = {
                            text: "\u2202",
                            symbolFont: !0
                        }) : f(c, e)
                },
                t = function(c, d, e) {
                    e.type() === b.START_ELEMENT_TYPE && a.spanOrA(e) ? (d.spanCount.push(e), d.nextFilter = v) : e.type() === b.END_ELEMENT_TYPE && a.spanOrA(e) ? (d.spanCount.pop(), d.nextFilter = k) : e.type() === b.END_ELEMENT_TYPE && "IMG" === e.tag() || f(c, e)
                },
                v = function(c, d, e) {
                    e.type() === b.END_ELEMENT_TYPE && (a.spanOrA(e) && d.spanCount.pop(), d.nextFilter = k)
                },
                k = function(c, h, m) {
                    var p = function(b) {
                        h.nextFilter =
                            w;
                        h.commentMode && (h.itemLevel = h.indentGuesser.guessIndentLevel(m, h.originalToken, h.styles.styles, h.bulletInfo));
                        h.listType = e.guessListType(h.bulletInfo, g(h.emitter.getCurrentListType(), h.emitter.getCurrentLevel(), h.itemLevel), h.originalToken);
                        if (h.listType) {
                            h.emitter.openItem(h.itemLevel, h.originalToken, h.listType, h.skippedPara);
                            for (c.emitDeferred(); 0 < h.spanCount.length;) c.emit(h.spanCount.shift());
                            b && c.emit(m)
                        } else d.log("Unknown list type: " + h.bulletInfo.text + " Symbol font? " + h.bulletInfo.symbolFont),
                            c.rollback()
                    };
                    m.type() === b.TEXT_TYPE || m.type() === b.START_ELEMENT_TYPE ? p(!0) : m.type() === b.COMMENT_TYPE ? p("[endif]" !== m.text()) : m.type() === b.END_ELEMENT_TYPE ? a.spanOrA(m) && h.spanCount.pop() : f(c, m)
                },
                w = function(a, c, d) {
                    d.type() === b.END_ELEMENT_TYPE && d.tag() === c.originalToken.tag() ? (c.nextFilter = h, c.skippedPara = !1) : a.emit(d)
                };
            return {
                initial: p
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.filters.list.Lists", "ephox.powerpaste.legacy.data.tokens.Filter ephox.powerpaste.legacy.data.tokens.Helper ephox.powerpaste.legacy.data.tokens.Token ephox.powerpaste.legacy.filters.list.CommentHeuristics ephox.powerpaste.legacy.filters.list.Emitter ephox.powerpaste.legacy.filters.list.ListStates ephox.powerpaste.legacy.filters.list.ListTypes ephox.powerpaste.legacy.tinymce.Util".split(" "),
            function(a, b, c, e, d, f, g, h) {
                var m = {},
                    p = function(b) {
                        m.nextFilter = f.initial;
                        m.itemLevel = 0;
                        m.originalToken = null;
                        m.commentMode = !1;
                        m.openedTag = null;
                        m.symbolFont = !1;
                        m.listType = null;
                        m.indentGuesser = e.indentGuesser();
                        m.emitter = d(b, b.document);
                        m.styles = e.styles();
                        m.spanCount = [];
                        m.skippedPara = !1;
                        m.styleLevelAdjust = 0;
                        m.bulletInfo = void 0
                    };
                p({});
                return a.createFilter(function(b, a) {
                    m.styles.check(a) || (m.symbolFont = g.checkFont(a, m.symbolFont), m.nextFilter(b, m, a))
                }, function(b) {
                    p(b)
                })
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require,
        a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.tinymce.BrowserFilters", ["ephox.powerpaste.legacy.tinymce.Util"], function(a) {
            var b = function(b) {
                    return 65279 === b.charCodeAt(b.length - 1) ? b.substring(0, b.length - 1) : b
                },
                c = function(b) {
                    return /<(h[1-6r]|p|div|address|pre|form|table|tbody|thead|tfoot|th|tr|td|li|ol|ul|caption|blockquote|center|dl|dt|dd|dir|fieldset)/.test(b) ? b.replace(/(?:<br>&nbsp;[\s\r\n]+|<br>)*(<\/?(h[1-6r]|p|div|address|pre|form|table|tbody|thead|tfoot|th|tr|td|li|ol|ul|caption|blockquote|center|dl|dt|dd|dir|fieldset)[^>]*>)(?:<br>&nbsp;[\s\r\n]+|<br>)*/g,
                        "$1") : b
                },
                e = function(b) {
                    return b.replace(/<br><br>/g, "<BR><BR>")
                },
                d = function(b) {
                    return b.replace(/<br>/g, " ")
                },
                f = function(b) {
                    return b.replace(/<BR><BR>/g, "<br>")
                },
                g = [b],
                c = tinymce.isIE && 9 <= document.documentMode ? [f, d, e, c].concat(g) : g;
            return {
                all: a.compose(c),
                textOnly: b
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.filters.FilterInlineStyles", ["ephox.powerpaste.legacy.data.tokens.Filter"], function(a) {
            var b = /^(mso-.*|tab-stops|tab-interval|language|text-underline|text-effect|text-line-through|font-color|horiz-align|list-image-[0-9]+|separator-image|table-border-color-(dark|light)|vert-align|vnd\..*)$/,
                c = function(a) {
                    return function(c, n) {
                        var g = !1;
                        switch (a) {
                            case "all":
                            case "*":
                                g = !0;
                                break;
                            case "valid":
                                g = !b.test(c);
                                break;
                            case void 0:
                            case "none":
                                g = "list-style-type" === c;
                                break;
                            default:
                                g = 0 <= ("," + a + ",").indexOf("," + c + ",")
                        }
                        return g ? n : null
                    }
                };
            return a.createFilter(function(b, a) {
                var n = b.settings.get("retain_style_properties");
                a.filterStyles(c(n));
                b.emit(a)
            })
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.filters.InferListTags", ["ephox.powerpaste.legacy.data.tokens.Filter",
            "ephox.powerpaste.legacy.data.tokens.Token"
        ], function(a, b) {
            return a.createFilter(function(a, e) {
                a.seenList || (a.inferring ? "LI" === e.tag() && (e.type() === b.START_ELEMENT_TYPE ? a.inferring++ : (a.inferring--, a.inferring || (a.needsClosing = !0))) : ("OL" === e.tag() || "UL" === e.tag() ? a.seenList = !0 : "LI" === e.tag() && (a.inferring = 1, a.needsClosing || a.emit(b.createStartElement("UL", {}, {}, a.document))), !a.needsClosing || a.inferring || e.isWhitespace() || (a.needsClosing = !1, a.emit(b.createEndElement("UL", a.document)))));
                a.emit(e)
            })
        })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.filters.StripBookmarks", ["ephox.powerpaste.legacy.data.tokens.Filter"], function(a) {
            return a.createAttributeFilter(function(b, a) {
                return "name" === b || "id" === b ? null : a
            })
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.filters.StripClassAttributes", ["ephox.powerpaste.legacy.data.tokens.Filter"], function(a) {
            return a.createAttributeFilter(function(b,
                                                    a) {
                var e;
                if ("class" === b) switch (e = this.settings.get("strip_class_attributes"), e) {
                    case "mso":
                        return 0 === a.indexOf("Mso") ? null : a;
                    case "none":
                        break;
                    default:
                        return null
                }
                return a
            })
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.filters.StripEmptyInlineElements", ["ephox.powerpaste.legacy.data.tokens.Filter", "ephox.powerpaste.legacy.data.tokens.Helper", "ephox.powerpaste.legacy.data.tokens.Token"], function(a, b, c) {
            var e = [],
                d = [],
                f = !1,
                g = function(a, n) {
                    e.push(n);
                    d = d || [];
                    if (n.type() === c.START_ELEMENT_TYPE) d.push(n);
                    else if (n.type() === c.END_ELEMENT_TYPE && (d.pop(), 0 === d.length)) {
                        if (f) {
                            var g, q = e.length,
                                s;
                            for (s = 0; s < q; s++)
                                if (g = e[s])
                                    if (g.type() === c.START_ELEMENT_TYPE && "SPAN" === g.tag() && b.hasNoAttributes(g)) {
                                        g = q;
                                        for (var r = void 0, t = void 0, v = 1, r = s + 1; r < g; r++)
                                            if ((t = e[r]) && "SPAN" === t.tag())
                                                if (t.type() === c.START_ELEMENT_TYPE) v++;
                                                else if (t.type() === c.END_ELEMENT_TYPE && (v--, 0 === v)) {
                                                    e[r] = null;
                                                    break
                                                }
                                    } else a.emit(g)
                        }
                        e = [];
                        d = [];
                        f = !1
                    }
                };
            return a.createFilter(function(a,
                                           d) {
                e = e || [];
                var n = function(a) {
                    return !(0 <= ",FONT,EM,STRONG,SAMP,ACRONYM,CITE,CODE,DFN,KBD,TT,B,I,U,S,SUB,SUP,INS,DEL,VAR,SPAN,".indexOf("," + a.tag() + ",") && b.hasNoAttributes(a, !0))
                };
                0 === e.length ? d.type() === c.START_ELEMENT_TYPE ? n(d) ? a.emit(d) : g(a, d) : a.emit(d) : (f || (f = n(d)), g(a, d))
            })
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.filters.StripEmptyStyleAttributes", ["ephox.powerpaste.legacy.data.tokens.Filter"], function(a) {
            return a.createAttributeFilter(function(b,
                                                    a) {
                return "style" === b && "" === a ? null : a
            })
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.filters.StripLangAttribute", ["ephox.powerpaste.legacy.data.tokens.Filter"], function(a) {
            return a.createAttributeFilter(function(b, a) {
                return "lang" === b ? null : a
            })
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.filters.StripImages", ["ephox.powerpaste.legacy.data.tokens.Filter",
            "ephox.powerpaste.legacy.data.tokens.Token"
        ], function(a, b) {
            return a.createFilter(function(a, e) {
                if ("IMG" === e.tag()) {
                    if (e.type() === b.END_ELEMENT_TYPE && a.skipEnd) {
                        a.skipEnd = !1;
                        return
                    }
                    if (e.type() === b.START_ELEMENT_TYPE) {
                        if (/^file:/.test(e.getAttribute("src"))) {
                            a.skipEnd = !0;
                            return
                        }
                        if (a.settings.get("base_64_images") && /^data:image\/.*;base64/.test(e.getAttribute("src"))) {
                            a.skipEnd = !0;
                            return
                        }
                    }
                }
                a.emit(e)
            })
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.filters.StripMetaAndLinkElements", ["ephox.powerpaste.legacy.data.tokens.Filter"], function(a) {
            return a.createFilter(function(b, a) {
                "META" !== a.tag() && "LINK" !== a.tag() && b.emit(a)
            })
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.filters.StripNoAttributeA", ["ephox.powerpaste.legacy.data.tokens.Filter", "ephox.powerpaste.legacy.data.tokens.Helper", "ephox.powerpaste.legacy.data.tokens.Token"], function(a, b, c) {
            var e = function(a) {
                    return !b.hasNoAttributes(a) && !/^OLE_LINK/.test(a.getAttribute("name"))
                },
                d = [];
            return a.createFilter(function(b, a) {
                var n;
                a.type() === c.START_ELEMENT_TYPE && "A" === a.tag() ? (d.push(a), e(a) && b.defer(a)) : a.type() === c.END_ELEMENT_TYPE && "A" === a.tag() ? (n = d.pop(), e(n) && b.defer(a), 0 === d.length && b.emitDeferred()) : b.hasDeferred() ? b.defer(a) : b.emit(a)
            })
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.filters.StripScripts", ["ephox.powerpaste.legacy.data.tokens.Filter", "ephox.powerpaste.legacy.data.tokens.Token"],
            function(a, b) {
                var c = !1;
                return a.createFilter(function(a, d) {
                    "SCRIPT" === d.tag() ? c = d.type() === b.START_ELEMENT_TYPE : c || (d.filterAttributes(function(b, a) {
                        return /^on/.test(b) || "language" === b ? null : a
                    }), a.emit(d))
                })
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.wordimport.CommonFilters", "ephox.powerpaste.legacy.filters.FilterInlineStyles ephox.powerpaste.legacy.filters.InferListTags ephox.powerpaste.legacy.filters.StripBookmarks ephox.powerpaste.legacy.filters.StripClassAttributes ephox.powerpaste.legacy.filters.StripEmptyInlineElements ephox.powerpaste.legacy.filters.StripEmptyStyleAttributes ephox.powerpaste.legacy.filters.StripLangAttribute ephox.powerpaste.legacy.filters.StripImages ephox.powerpaste.legacy.filters.StripMetaAndLinkElements ephox.powerpaste.legacy.filters.StripNoAttributeA ephox.powerpaste.legacy.filters.StripScripts".split(" "),
            function(a, b, c, e, d, f, g, h, m, p, q) {
                return [q, c, h, a, g, f, e, p, d, m, b]
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.filters.StripFormattingAttributes", ["ephox.powerpaste.legacy.data.tokens.Filter"], function(a) {
            return a.createFilter(function(b, a) {
                a.filterAttributes(function(b, d) {
                    return "align" === b || ("UL" === a.tag() || "OL" === a.tag()) && "type" === b ? null : d
                });
                b.emit(a)
            })
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.filters.StripNamespaceDeclarations", ["ephox.powerpaste.legacy.data.tokens.Filter"], function(a) {
            return a.createAttributeFilter(function(b, a) {
                return /^xmlns(:|$)/.test(b) ? null : a
            })
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.filters.StripOPTags", ["ephox.powerpaste.legacy.data.tokens.Filter"], function(a) {
            return a.createFilter(function(b, a) {
                a.tag && /^([OVWXP]|U[0-9]+|ST[0-9]+):/.test(a.tag()) ||
                b.emit(a)
            })
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.filters.StripTocLinks", ["ephox.powerpaste.legacy.data.tokens.Filter"], function(a) {
            return a.createAttributeFilter(function(b, a) {
                return "href" === b && (0 <= a.indexOf("#_Toc") || 0 <= a.indexOf("#_mso")) ? null : a
            })
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.filters.StripVMLAttributes", ["ephox.powerpaste.legacy.data.tokens.Filter"],
            function(a) {
                return a.createAttributeFilter(function(b, a) {
                    return /^v:/.test(b) ? null : a
                })
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.wordimport.WordOnlyFilters", "ephox.powerpaste.legacy.filters.StripFormattingAttributes ephox.powerpaste.legacy.filters.StripNamespaceDeclarations ephox.powerpaste.legacy.filters.StripOPTags ephox.powerpaste.legacy.filters.StripTocLinks ephox.powerpaste.legacy.filters.StripVMLAttributes ephox.powerpaste.legacy.filters.list.Lists".split(" "),
            function(a, b, c, e, d, f) {
                return [c, f, e, d, b, a]
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.legacy.wordimport.WordImport", "ephox.powerpaste.legacy.data.tokens.Serializer ephox.powerpaste.legacy.data.tokens.Tokenizer ephox.powerpaste.legacy.filters.Text ephox.powerpaste.legacy.filters.list.Lists ephox.powerpaste.legacy.tinymce.BrowserFilters ephox.powerpaste.legacy.wordimport.CommonFilters ephox.powerpaste.legacy.wordimport.WordOnlyFilters".split(" "),
            function(a, b, c, e, d, f, g) {
                var h = function(c, d, e, f) {
                        var h = a.create(e);
                        c = b.tokenize(c, e);
                        var g, m = h;
                        for (g = f.length - 1; 0 <= g; g--) m = f[g](m, d, e);
                        for (pipeline = m; c.hasNext();) pipeline.receive(c.next());
                        return h.dom
                    },
                    m = function(b) {
                        return 0 <= b.indexOf("<o:p>") || 0 <= b.indexOf("p.MsoNormal, li.MsoNormal, div.MsoNormal") || 0 <= b.indexOf("MsoListParagraphCxSpFirst") || 0 <= b.indexOf("<w:WordDocument>")
                    };
                return {
                    filter: function(b, a, c) {
                        b = d.all(b);
                        var e = m(b);
                        a.setWordContent(e);
                        var n = f;
                        e && (n = g.concat(f));
                        return h(b, a, c, n)
                    },
                    filterPlainText: function(b,
                                              a, e) {
                        b = d.textOnly(b);
                        return h(b, a, e, [c])
                    },
                    isWordContent: m
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.tinymce.LegacyTinyDialog", ["ephox.powerpaste.legacy.data.Insert", "ephox.powerpaste.legacy.tinymce.Settings", "ephox.powerpaste.legacy.wordimport.WordImport", "global!setTimeout"], function(a, b, c, e) {
            return function(d, f) {
                return {
                    showDialog: function(g) {
                        var h = function(e) {
                                var f = {
                                    content: g
                                };
                                d.fire("PastePreProcess", f);
                                e = b.create(e ||
                                    d.settings.powerpaste_word_import, e || d.settings.powerpaste_html_import, !0);
                                var h = c.filter(f.content, e, d.getDoc());
                                d.fire("PastePostProcess", h);
                                d.undoManager.transact(function() {
                                    a.insert(h, d)
                                })
                            },
                            m = function(b) {
                                return "clean" === b || "merge" === b
                            },
                            p = function() {
                                var b, a = [{
                                        text: f("cement.dialog.paste.clean"),
                                        onclick: function() {
                                            b.close();
                                            h("clean")
                                        }
                                    }, {
                                        text: f("cement.dialog.paste.merge"),
                                        onclick: function() {
                                            b.close();
                                            h("merge")
                                        }
                                    }],
                                    a = {
                                        title: f("cement.dialog.paste.title"),
                                        spacing: 10,
                                        padding: 10,
                                        items: [{
                                            type: "container",
                                            html: f("cement.dialog.paste.instructions")
                                        }],
                                        buttons: a
                                    };
                                b = d.windowManager.open(a);
                                e(function() {
                                    b && b.getEl().focus()
                                }, 1)
                            };
                        c.isWordContent(g) && !m(d.settings.powerpaste_word_import) ? p() : m(d.settings.powerpaste_html_import) ? h() : p()
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.tinymce.LegacyPowerPaste", ["ephox.powerpaste.i18n.I18n", "ephox.powerpaste.legacy.tinymce.Clipboard", "ephox.powerpaste.tinymce.LegacyTinyDialog"], function(a,
                                                                                                                                                                                          b, c) {
            return function(e, d, f) {
                var g = this,
                    h, m = c(e, a.translate);
                f = function(b) {
                    return function(a) {
                        b(a)
                    }
                };
                h = b.getOnPasteFunction(e, m.showDialog, d);
                e.on("paste", f(h));
                d = b.getOnKeyDownFunction(e, m.showDialog, d);
                e.on("keydown", f(d));
                e.addCommand("mceInsertClipboardContent", function(b, a) {
                    m.showDialog(a.content || a)
                });
                if (e.settings.paste_preprocess) e.on("PastePreProcess", function(b) {
                    e.settings.paste_preprocess.call(g, g, b)
                })
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a,
              k, l) {
        a("ephox.epithet.Id", [], function() {
            var a = 0;
            return {
                generate: function(b) {
                    var c = (new Date).getTime(),
                        e = Math.floor(1E9 * Math.random());
                    a++;
                    return b + "_" + e + a + String(c)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.fred.core.DeviceType", ["ephox.peanut.Fun"], function(a) {
            return function(b, c, e) {
                c = b.isiOS() && -1 !== e.search(/iPad/i);
                var d = b.isiOS() && !c,
                    f = b.isAndroid() && 3 === b.version.major,
                    g = b.isAndroid() && 4 === b.version.major;
                e = c || f || g && -1 === e.search(/mobile/i);
                g = (f = b.isiOS() || b.isAndroid()) && !e;
                return {
                    isiPad: a.constant(c),
                    isiPhone: a.constant(d),
                    isTablet: a.constant(e),
                    isPhone: a.constant(g),
                    isTouch: a.constant(f),
                    isAndroid: b.isAndroid,
                    isiOS: b.isiOS
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.fred.core.Platform", [], function() {
            return {
                create: function(a, b, c) {
                    return {
                        browser: {
                            current: a,
                            version: b
                        },
                        os: {
                            current: c
                        }
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a,
              k, l) {
        a("ephox.fred.core.GetterHelper", [], function() {
            var a = function(b) {
                return function() {
                    return b
                }
            };
            return {
                getter: a,
                attachGetters: function(b, c, e) {
                    for (var d = 0; d < e.length; d++) b["is" + e[d].name] = a(e[d].name === c)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.fred.core.Result", ["ephox.fred.core.GetterHelper"], function(a) {
            return {
                create: function(b, c, e) {
                    var d = a.attachGetters,
                        f = {};
                    f.current = c;
                    f.version = e;
                    d(f, f.current, b);
                    return f
                }
            }
        })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.fred.core.SearchInfo", ["ephox.violin.Strings"], function(a) {
            var b = a.contains,
                c = function(a) {
                    return function(c) {
                        return b(c, a)
                    }
                },
                e = /.*?version\/\ ?([0-9]+)\.([0-9]+).*/;
            return {
                create: function(a) {
                    var n = [{
                            name: "Spartan",
                            versionRegexes: [/.*?edge\/ ?([0-9]+)\.([0-9]+)$/],
                            search: function(a) {
                                return b(a, "edge/") && b(a, "chrome") && b(a, "safari") && b(a, "applewebkit")
                            }
                        }, {
                            name: "ChromeFrame",
                            versionRegexes: [/.*?chromeframe\/([0-9]+)\.([0-9]+).*/,
                                e
                            ],
                            search: function(c) {
                                return b(c, "chromeframe") ? a() : !1
                            }
                        }, {
                            name: "Chrome",
                            versionRegexes: [/.*?chrome\/([0-9]+)\.([0-9]+).*/, e],
                            search: function(a) {
                                return b(a, "chrome") && !b(a, "chromeframe")
                            }
                        }, {
                            name: "IE",
                            versionRegexes: [/.*?msie\ ?([0-9]+)\.([0-9]+).*/, /.*?rv:([0-9]+)\.([0-9]+).*/],
                            search: function(c) {
                                var e = b(c, "msie") || b(c, "trident");
                                return b(c, "chromeframe") ? e && !a() : e
                            }
                        }, {
                            name: "Opera",
                            versionRegexes: [e, /.*?opera\/([0-9]+)\.([0-9]+).*/],
                            search: c("opera")
                        }, {
                            name: "Firefox",
                            versionRegexes: [/.*?firefox\/\ ?([0-9]+)\.([0-9]+).*/],
                            search: c("firefox")
                        }, {
                            name: "Safari",
                            versionRegexes: [e],
                            search: c("safari")
                        }, {
                            name: "Envjs",
                            versionRegexes: [/.*?envjs\/\ ?([0-9]+)\.([0-9]+).*/],
                            search: c("envjs")
                        }],
                        g = [{
                            name: "Windows",
                            search: c("win"),
                            versionRegexes: [/.*?windows\ nt\ ?([0-9]+)\.([0-9]+).*/]
                        }, {
                            name: "iOS",
                            search: function(a) {
                                return b(a, "iphone") || b(a, "ipad")
                            },
                            versionRegexes: [/.*?version\/\ ?([0-9]+)\.([0-9]+).*/, /.*cpu os ([0-9]+)_([0-9]+).*/, /.*cpu iphone os ([0-9]+)_([0-9]+).*/]
                        }, {
                            name: "Android",
                            search: c("android"),
                            versionRegexes: [/.*?android\ ?([0-9]+)\.([0-9]+).*/]
                        }, {
                            name: "OSX",
                            search: c("os x"),
                            versionRegexes: [/.*?os\ x\ ?([0-9]+)_([0-9]+).*/]
                        }, {
                            name: "Linux",
                            search: c("linux")
                        }, {
                            name: "Solaris",
                            search: c("sunos")
                        }, {
                            name: "FreeBSD",
                            search: c("freebsd")
                        }];
                    return {
                        browsers: n,
                        oses: g
                    }
                },
                chromeFrameChecker: function() {
                    try {
                        return !!new ActiveXObject("ChromeTab.ChromeFrame")
                    } catch (b) {
                        return !1
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.fred.core.SpecTester", [], function() {
            return {
                meetsSpec: function(a, b) {
                    var c = typeof a;
                    if ("boolean" === c) return !!a;
                    if ("object" === c) return c = a.minimum, b.major > c.major || b.major === c.major && b.minor >= c.minor;
                    throw "invalid spec";
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.fred.core.Fn", [], function() {
            return {
                findOneInArrayOr: function(a, b, c) {
                    for (var e = 0; e < a.length; e++) {
                        var d = a[e];
                        if (c(d, e, a)) return d
                    }
                    return b
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.fred.core.UaStringDetector", ["ephox.fred.core.Fn"], function(a) {
            return {
                detect: function(b, c) {
                    var e = a.findOneInArrayOr,
                        d = String(c).toLowerCase();
                    return e(b, {
                        name: void 0
                    }, function(b) {
                        return b.search(d)
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.fred.core.VersionDetector", [], function() {
            return {
                detectVersion: function(a, b) {
                    var c = String(b).toLowerCase(),
                        e = a.versionRegexes;
                    if (e) {
                        a: {
                            for (var d = 0; d < e.length; d++) {
                                var f = e[d];
                                if (f.test(c)) {
                                    e = f;
                                    break a
                                }
                            }
                            e = void 0
                        }
                        c = e ? {
                            major: Number(c.replace(e,
                                "$1")),
                            minor: Number(c.replace(e, "$2"))
                        } : {
                            major: 0,
                            minor: 0
                        }
                    }
                    else c = {
                        major: 0,
                        minor: 0
                    };
                    return c
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.fred.PlatformDetection", "ephox.fred.core.DeviceType ephox.fred.core.Platform ephox.fred.core.Result ephox.fred.core.SearchInfo ephox.fred.core.SpecTester ephox.fred.core.UaStringDetector ephox.fred.core.VersionDetector".split(" "), function(a, b, c, e, d, f, g) {
            var h = g.detectVersion,
                m = c.create,
                p = d.meetsSpec,
                q = f.detect,
                s = function(b, a, c, d) {
                    return b[a] ? b[a][c] ? p(b[a][c], d) : !!b[a].All : !1
                },
                r = function(b, c) {
                    var d = e.create(c),
                        f = d.browsers,
                        d = d.oses,
                        g = q(d, b),
                        p = g.name,
                        g = h(g, b),
                        r = q(f, b),
                        y = r.name,
                        k = h(r, b),
                        d = m(d, p, g),
                        f = m(f, y, k),
                        g = a(d, f, b);
                    return {
                        browser: f,
                        os: d,
                        deviceType: g,
                        isSupported: function(b) {
                            return s(b, p, y, k)
                        }
                    }
                };
            return {
                Platform: b,
                detect: function() {
                    return r(navigator.userAgent, e.chromeFrameChecker)
                },
                doDetect: r,
                isSupported: s,
                isSupportedPlatform: function(b, a) {
                    var c = a.browser;
                    return s(b, a.os.current, c.current, c.version)
                }
            }
        })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.knoch.core.Bounce", ["global!Array"], function(a) {
            return {
                bounce: function(b) {
                    return function() {
                        var c = a.prototype.slice.call(arguments),
                            e = this;
                        setTimeout(function() {
                            b.apply(e, c)
                        }, 0)
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.knoch.core.FutureOps", [], function() {
            return function(a, b) {
                return {
                    get: b,
                    map: function(c) {
                        return a(function(a) {
                            b(function(b) {
                                b = c(b);
                                a(b)
                            })
                        })
                    },
                    bind: function(c) {
                        return a(function(a) {
                            b(function(b) {
                                c(b).get(a)
                            })
                        })
                    },
                    anonBind: function(c) {
                        return a(function(a) {
                            b(function(b) {
                                c.get(a)
                            })
                        })
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.knoch.core.FutureStaticOps", ["ephox.compass.Arr"], function(a) {
            return function(b) {
                var c = function(c) {
                    return b(function(b) {
                        var f = [],
                            g = 0,
                            h = function(a) {
                                return function(n) {
                                    f[a] = n;
                                    g++;
                                    g >= c.length && b(f)
                                }
                            };
                        0 === c.length ? b([]) : a.each(c, function(b, a) {
                            b.get(h(a))
                        })
                    })
                };
                return {
                    nu: b,
                    pure: function(a) {
                        return b(function(b) {
                            b(a)
                        })
                    },
                    par: c,
                    mapM: function(b, d) {
                        return c(a.map(b, d))
                    },
                    lift2: function(a, c, n) {
                        return b(function(b) {
                            var h = !1,
                                m = !1,
                                p = void 0,
                                q = void 0,
                                s = function() {
                                    if (h && m) {
                                        var a = n(p, q);
                                        b(a)
                                    }
                                };
                            a.get(function(b) {
                                p = b;
                                h = !0;
                                s()
                            });
                            c.get(function(b) {
                                q = b;
                                m = !0;
                                s()
                            })
                        })
                    },
                    compose: function(b, a) {
                        return function(c) {
                            return a(c).bind(b)
                        }
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.knoch.future.Future", ["ephox.knoch.core.Bounce",
            "ephox.knoch.core.FutureOps", "ephox.knoch.core.FutureStaticOps"
        ], function(a, b, c) {
            var e = function(c) {
                return b(e, function(b) {
                    c(a.bounce(b))
                })
            };
            return c(e)
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.numerosity.api.FileReader", ["ephox.numerosity.core.Global"], function(a) {
            return function() {
                return new(a.getOrDie("FileReader"))
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.hermes.utils.ImageExtract",
            "ephox.compass.Arr ephox.epithet.Id ephox.fred.PlatformDetection ephox.hermes.api.ImageAsset ephox.knoch.future.Future ephox.numerosity.api.FileReader ephox.numerosity.api.URL ephox.scullion.Struct".split(" "),
            function(a, b, c, e, d, f, g, h) {
                var m = h.immutable("id", "obj", "objurl"),
                    p = h.immutable("blob", "base64"),
                    q = function(a) {
                        return m(b.generate("image"), a, g.createObjectURL(a))
                    };
                c = c.detect();
                var s = function(b, c, h) {
                    if (0 === b.length) h([]);
                    else {
                        var g = [],
                            m = function(a) {
                                return d.nu(function(b) {
                                    var c = f();
                                    c.onload =
                                        function(c) {
                                            b(p(a, c.target))
                                        };
                                    c.readAsDataURL(a)
                                })
                            };
                        d.mapM(b, function(a) {
                            return c(a).bind(m)
                        }).get(function(b) {
                            a.each(b, function(a) {
                                var b = q(a.blob());
                                a = e.blob(b.id(), a.blob(), b.objurl(), a.base64());
                                g.push(a)
                            });
                            h(g)
                        })
                    }
                };
                h = function(b) {
                    return 1 === b.length && a.contains(b, "Files")
                };
                var r = function(b) {
                        return !a.contains(b, "text/_moz_htmlcontext")
                    },
                    t = function(b) {
                        return a.contains(b, "Files")
                    },
                    v = function(a) {
                        return !0
                    };
                c = c.browser.isChrome() || c.browser.isSafari() || c.browser.isOpera() ? t : c.browser.isFirefox() ? r :
                    c.browser.isIE() ? h : v;
                return {
                    blob: q,
                    toAssets: function(a, b, c) {
                        s(a, b, c)
                    },
                    toFiles: function(a) {
                        return a.raw().target.files || a.raw().dataTransfer.files
                    },
                    isFiles: c,
                    fromImages: function(a, c, n) {
                        d.mapM(a, function(a) {
                            return c(a).map(function(a) {
                                var c = b.generate("image");
                                return e.url(c, a.src, a)
                            })
                        }).get(n)
                    },
                    fromBlobs: s
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.hermes.api.ImageExtract", ["ephox.hermes.utils.ImageExtract"], function(a) {
            return {
                toAssets: function(b,
                                   c, e) {
                    return a.toAssets(b, c, e)
                },
                fromBlobs: function(b, c, e) {
                    return a.fromBlobs(b, c, e)
                },
                blob: a.blob
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.tinymce.ModernPowerDrop", "ephox.compass.Arr ephox.hermes.api.ImageAsset ephox.hermes.api.ImageExtract ephox.sugar.api.Attr ephox.sugar.api.Element global!tinymce".split(" "), function(a, b, c, e, d, f) {
            return function(g, h, m, p) {
                var q, s = /^image\/(jpe?g|png|gif|bmp)$/i;
                g.on("dragstart dragend",
                    function(a) {
                        q = "dragstart" === a.type
                    });
                g.on("dragover dragend dragleave", function(a) {
                    a.preventDefault()
                });
                var r = function(b) {
                        return a.filter(b.target.files || b.dataTransfer.files, function(a) {
                            return s.test(a.type)
                        })
                    },
                    t = function(c) {
                        return a.map(c, function(a) {
                            var c = d.fromTag("img");
                            a = b.cata(a, p.getLocalURL, function(a, b, c) {
                                return b
                            });
                            e.set(c, "src", a);
                            return c.dom().outerHTML
                        }).join("")
                    },
                    v = function(a) {
                        c.toAssets(a, function(a) {
                            var b = t(a);
                            g.insertContent(b, {
                                merge: !1 !== g.settings.paste_merge_formats
                            });
                            p.uploadImages(a)
                        })
                    };
                g.on("drop", function(a) {
                    if (!q) {
                        if (f.dom.RangeUtils && f.dom.RangeUtils.getCaretRangeFromPoint) {
                            var b = f.dom.RangeUtils.getCaretRangeFromPoint(a.clientX, a.clientY, g.getDoc());
                            b && g.selection.setRng(b)
                        }
                        b = r(a);
                        0 < b.length && v(b);
                        a.preventDefault()
                    }
                })
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.api.Bundle", ["ephox.compass.Arr", "ephox.scullion.Struct", "global!console"], function(a, b, c) {
            var e = ["officeStyles", "htmlStyles", "isWord", "proxyBin",
                    "isInternal"
                ],
                d = b.immutableBag([], e);
            return {
                nu: d,
                merge: function(b, c) {
                    var h = {};
                    a.each(e, function(a) {
                        c[a]().or(b[a]()).each(function(b) {
                            h[a] = b
                        })
                    });
                    return d(h)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.smartpaste.PasteResponse", ["ephox.perhaps.Option", "ephox.scullion.ADT"], function(a, b) {
            var c = b.generate([{
                    error: ["message"]
                }, {
                    paste: ["elements", "assets"]
                }, {
                    cancel: []
                }, {
                    incomplete: ["elements", "assets", "message"]
                }]),
                e = function(a, b,
                             c, e, n) {
                    return a.fold(b, c, e, n)
                };
            return {
                error: c.error,
                paste: c.paste,
                cancel: c.cancel,
                incomplete: c.incomplete,
                cata: e,
                carry: function(b, f) {
                    return e(b, a.none, a.none, a.none, function(b, d, m) {
                        return e(f, a.none, function(b, d) {
                            return a.some(c.incomplete(b, d, m))
                        }, a.none, a.none)
                    }).getOr(f)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.alien.FutureStep", ["ephox.cement.api.Bundle", "ephox.cement.smartpaste.PasteResponse", "ephox.knoch.core.FutureOps",
            "ephox.scullion.Struct"
        ], function(a, b, c, e) {
            var d = e.immutableBag(["response", "bundle"], []),
                f = function(a) {
                    return g(function(b) {
                        var c = d(a);
                        b(c)
                    })
                },
                g = function(a) {
                    return c(g, function(b) {
                        a(b)
                    })
                };
            return {
                call: function(a, b) {
                    a(d(b))
                },
                sync: g,
                pure: f,
                pass: function(a) {
                    return f({
                        response: a.response(),
                        bundle: a.bundle()
                    })
                },
                done: d,
                error: function(c) {
                    return f({
                        response: b.error(c),
                        bundle: a.nu({})
                    })
                },
                initial: function() {
                    return f({
                        response: b.paste([], []),
                        bundle: a.nu({})
                    })
                },
                cancel: function() {
                    return f({
                        response: b.cancel(),
                        bundle: a.nu({})
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.perhaps.Options", ["ephox.perhaps.Option"], function(a) {
            return {
                cat: function(a) {
                    for (var c = [], e = function(a) {
                        c.push(a)
                    }, d = 0; d < a.length; d++) a[d].each(e);
                    return c
                },
                findMap: function(b, c) {
                    for (var e = 0; e < b.length; e++) {
                        var d = c(b[e], e);
                        if (d.isSome()) return d
                    }
                    return a.none()
                },
                liftN: function(b, c) {
                    for (var e = [], d = 0; d < b.length; d++) {
                        var f = b[d];
                        if (f.isSome()) e.push(f.getOrDie());
                        else return a.none()
                    }
                    return a.some(c.apply(null,
                        e))
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.api.Adjudicator", "ephox.cement.alien.FutureStep ephox.cement.api.Bundle ephox.cement.smartpaste.PasteResponse ephox.compass.Arr ephox.peanut.Fun ephox.perhaps.Options ephox.scullion.Struct".split(" "), function(a, b, c, e, d, f, g) {
            var h = g.immutable("steps", "input", "label", "capture"),
                m = function(a, b) {
                    return f.findMap(a, function(a) {
                        return a.getAvailable(b).map(function(b) {
                            return h(a.steps(),
                                b, a.label(), a.capture())
                        })
                    })
                },
                p = function(e, f) {
                    var h = d.curry(a.pass, e),
                        g = function() {
                            return f().map(function(d) {
                                var f = b.merge(e.bundle(), d.bundle());
                                d = c.carry(e.response(), d.response());
                                return a.done({
                                    response: d,
                                    bundle: f
                                })
                            })
                        };
                    return c.cata(e.response(), h, g, h, g)
                };
            return {
                choose: function(a, b, c) {
                    return m(a, c).getOrThunk(function() {
                        var a = b.getAvailable(c);
                        return h(b.steps(), a, b.label(), b.capture())
                    })
                },
                run: function(b, c) {
                    return e.foldl(b, function(a, b) {
                        return a.bind(function(a) {
                            return p(a, function() {
                                return b(c,
                                    a)
                            })
                        })
                    }, a.initial()).map(function(a) {
                        return a.response()
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.plumber.tap.control.BlockControl", [], function() {
            return {
                create: function() {
                    var a = !1;
                    return {
                        isBlocked: function() {
                            return a
                        },
                        block: function() {
                            a = !0
                        },
                        unblock: function() {
                            a = !1
                        }
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.plumber.tap.wrap.Tapped", [], function() {
            return {
                create: function(a,
                                 b) {
                    return {
                        control: a,
                        instance: b
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.plumber.tap.function.BlockTap", ["ephox.plumber.tap.control.BlockControl", "ephox.plumber.tap.wrap.Tapped"], function(a, b) {
            return {
                tap: function(c) {
                    var e = a.create();
                    return b.create(e, function() {
                        e.isBlocked() || c.apply(null, arguments)
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sloth.api.Paste", ["ephox.fred.PlatformDetection",
            "ephox.peanut.Fun", "global!setTimeout"
        ], function(a, b, c) {
            var e = a.detect();
            a = function(a, b, c) {
                b.control.block();
                a.dom().execCommand("paste");
                c();
                b.control.unblock()
            };
            var d = function(a, b, d) {
                    c(d, 1)
                },
                f = (e = e.browser.isIE() && 10 >= e.browser.version.major) ? a : d;
            return {
                willBlock: b.constant(e),
                run: function(a, b, c) {
                    return f(a, b, c)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.api.PasteBroker", "ephox.cement.api.Adjudicator ephox.cement.smartpaste.PasteResponse ephox.compass.Arr ephox.peanut.Fun ephox.plumber.tap.function.BlockTap ephox.porkbun.Event ephox.porkbun.Events ephox.sloth.api.Paste".split(" "),
            function(a, b, c, e, d, f, g, h) {
                return function(m, p) {
                    var q = g.create({
                            cancel: f([]),
                            error: f(["message"]),
                            insert: f(["elements", "assets"])
                        }),
                        s = d.tap(function(d) {
                            h.willBlock() && (s.control.block(), d.preventDefault());
                            var e = a.choose(m, p, d);
                            e.capture() && d.preventDefault();
                            d = c.map(e.steps(), function(a) {
                                return a(s.control)
                            });
                            a.run(d, e.input()).get(function(a) {
                                b.cata(a, function(a) {
                                    q.trigger.error(a)
                                }, function(a, b) {
                                    q.trigger.insert(a, b)
                                }, function() {
                                    q.trigger.cancel()
                                }, function(a, b, c) {
                                    q.trigger.insert(a, b);
                                    q.trigger.error(c)
                                })
                            })
                        });
                    return {
                        paste: s.instance,
                        isBlocked: s.control.isBlocked,
                        destroy: e.noop,
                        events: q.registry
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.api.PasteProcesses", ["ephox.peanut.Fun"], function(a) {
            return {
                blocking: function(a) {
                    return function(c) {
                        return function(e, d, f) {
                            c.block();
                            return a(e, d, f).map(function(a) {
                                c.unblock();
                                return a
                            })
                        }
                    }
                },
                normal: function(b) {
                    return a.constant(b)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    a.bolt.module.api.define("global!RegExp", [], function() {
        return RegExp
    });
    (function(a, k, l) {
        a("ephox.cement.smartpaste.Inspection", ["ephox.perhaps.Option", "ephox.perhaps.Options", "global!RegExp"], function(a, b, c) {
            var e = function(d, e) {
                var g = new c(e, "i");
                return b.findMap(d, function(b) {
                    return null !== b.match(g) ? a.some({
                        type: b,
                        flavor: e
                    }) : a.none()
                })
            };
            return {
                isValidData: function(a) {
                    return void 0 !== a && void 0 !== a.types && null !== a.types
                },
                getPreferredFlavor: function(a, c) {
                    return b.findMap(a, function(a) {
                        return e(c, a)
                    })
                },
                getFlavor: e
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.bowerbird.api.BlobResult", ["ephox.highway.Merger", "ephox.scullion.ADT"], function(a, b) {
            var c = b.generate([{
                none: []
            }, {
                error: ["message "]
            }, {
                blob: ["blob"]
            }]);
            return a.merge(c, {
                cata: function(a, b, c, n) {
                    return a.fold(b, c, n)
                }
            })
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.numerosity.api.Blob", ["ephox.numerosity.core.Global"], function(a) {
            return function(b,
                            c) {
                return new(a.getOrDie("Blob"))(b, c)
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.numerosity.api.Uint8Array", ["ephox.numerosity.core.Global"], function(a) {
            return function(b) {
                return new(a.getOrDie("Uint8Array"))(b)
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.numerosity.api.Window", ["ephox.numerosity.core.Global"], function(a) {
            return {
                atob: function(b) {
                    return a.getOrDie("atob")(b)
                },
                requestAnimationFrame: function(b) {
                    a.getOrDie("requestAnimationFrame")(b)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.bowerbird.codes.Base64ToBlob", "ephox.bowerbird.api.BlobResult ephox.numerosity.api.Blob ephox.numerosity.api.Uint8Array ephox.numerosity.api.Window ephox.perhaps.Option ephox.perhaps.Result ephox.violin.Strings global!Array global!Math".split(" "), function(a, b, c, e, d, f, g, h, m) {
            var p = function(a, d) {
                for (var f = e.atob(a), n = f.length,
                         g = m.ceil(n / 1024), p = new h(g), r = 0; r < g; ++r) {
                    for (var k = 1024 * r, l = m.min(k + 1024, n), A = new h(l - k), B = 0; k < l; ++B, ++k) A[B] = f[k].charCodeAt(0);
                    p[r] = c(A)
                }
                return b(p, {
                    type: d
                })
            };
            return {
                convert: function(b) {
                    if (g.startsWith(b, "data:image/") && 11 < b.indexOf(";base64,")) {
                        var c = b.indexOf(";"),
                            d = b.substr(5, c - 5);
                        b = b.substr(c + 8);
                        try {
                            return a.blob(p(b, d))
                        } catch (e) {
                            return a.error(e)
                        }
                    } else return a.none()
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.bowerbird.api.Base64", ["ephox.bowerbird.codes.Base64ToBlob"], function(a) {
            return {
                toBlob: function(b) {
                    return a.convert(b)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.step.Base64Step", "ephox.bowerbird.api.Base64 ephox.bowerbird.api.BlobResult ephox.cement.alien.FutureStep ephox.cement.smartpaste.PasteResponse ephox.compass.Arr ephox.hermes.api.ImageAsset ephox.hermes.api.ImageExtract ephox.peanut.Fun ephox.perhaps.Option ephox.scullion.Struct ephox.sugar.api.Attr ephox.sugar.api.Element ephox.sugar.api.InsertAll ephox.sugar.api.SelectorFilter".split(" "),
            function(a, b, c, e, d, f, g, h, m, p, q, s, r, t) {
                var k = p.immutable("blob", "image"),
                    l = function(c, d) {
                        var e = a.toBlob(d);
                        return b.cata(e, m.none, m.none, function(a) {
                            return m.some(k(a, c))
                        })
                    },
                    w = function(a) {
                        var b = s.fromTag("div");
                        r.append(b, a);
                        a = t.descendants(b, "img[src]");
                        return d.bind(a, function(a) {
                            var b = q.get(a, "src");
                            return b.indexOf("data:image") - 1 && -1 < b.indexOf("base64") ? l(a, b).toArray() : []
                        })
                    },
                    x = function(a, b) {
                        d.each(b, function(b, c) {
                            f.cata(b, function(b, d, e, f) {
                                b = a[c].image();
                                q.set(b, "src", e)
                            }, h.noop)
                        })
                    };
                return function(a) {
                    return function(b,
                                    f) {
                        return c.sync(function(b) {
                            var n = function() {
                                    c.call(b, {
                                        response: f.response(),
                                        bundle: f.bundle()
                                    })
                                },
                                h = function(n) {
                                    var h = w(n),
                                        m = d.map(h, function(a) {
                                            return a.blob()
                                        });
                                    g.fromBlobs(m, a, function(a) {
                                        x(h, a);
                                        c.call(b, {
                                            response: e.paste(n, a),
                                            bundle: f.bundle()
                                        })
                                    })
                                },
                                m = function(a, b, c) {
                                    return 0 === b.length ? h(a) : n()
                                };
                            e.cata(f.response(), n, m, n, m)
                        })
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    a.bolt.module.api.define("global!parseInt", [], function() {
        return parseInt
    });
    (function(a,
              k, l) {
        a("ephox.bowerbird.codes.HexToBlob", "ephox.numerosity.api.Blob ephox.numerosity.api.Uint8Array global!Array global!Math global!String global!parseInt".split(" "), function(a, b, c, e, d, f) {
            return {
                convert: function(d, h) {
                    if (0 === d.length) throw "Zero length content passed to Hex conversion";
                    for (var m = new c(d.length / 2), p = 0; p < d.length; p += 2) {
                        var q = d.substr(p, 2),
                            s = e.floor(p / 2);
                        m[s] = f(q, 16)
                    }
                    m = b(m);
                    return a([m], {
                        type: h
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a,
              k, l) {
        a("ephox.bowerbird.core.RtfSupport", ["ephox.scullion.ADT"], function(a) {
            a = a.generate([{
                unsupported: ["id", "message"]
            }, {
                supported: ["id", "contentType", "blob"]
            }]);
            return {
                unsupported: a.unsupported,
                supported: a.supported,
                cata: function(a, c, e) {
                    return a.fold(c, e)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.bowerbird.core.Species", ["ephox.peanut.Fun", "ephox.perhaps.Option"], function(a, b) {
            var c = function(c, d, e, f, g) {
                    return -1 === c || -1 === d ? b.none() :
                        b.some({
                            start: a.constant(c),
                            end: a.constant(d),
                            bower: e,
                            regex: a.constant(f),
                            idRef: a.constant(g)
                        })
                },
                e = function(a, b, c) {
                    return function() {
                        return a.substring(b, c)
                    }
                },
                d = function(a, b) {
                    if (-1 === b) return b;
                    var c = 0,
                        d = a.length,
                        e, f;
                    do
                        if (e = a.indexOf("{", b), f = a.indexOf("}", b), f > e && -1 !== e ? (b = e + 1, ++c) : (e > f || 0 > e) && -1 !== f && (b = f + 1, --c), b > d || -1 === f) return -1;
                    while (0 < c);
                    return b
                },
                f = function(a, b, d, f) {
                    a = e(a, d, f);
                    return c(d, f, a, /[^a-fA-F0-9]([a-fA-F0-9]+)\}$/, "i")
                },
                g = function(a, b, d, f) {
                    a = e(a, d, f);
                    return c(d, f, a, /([a-fA-F0-9]{64,})(?:\}.*)/,
                        "s")
                };
            return {
                identify: function(c, e) {
                    var p = c.indexOf("{\\pict{", e),
                        q = d(c, p),
                        s = c.indexOf("{\\shp{", e),
                        r = d(c, s),
                        t = a.curry(g, c, e, s, r),
                        k = a.curry(f, c, e, p, q);
                    return -1 === p && -1 === s ? b.none() : -1 === p ? t() : -1 === s ? k() : s < p && r > q ? k() : p < s && q > r ? t() : p < s ? k() : s < p ? t() : b.none()
                },
                endBracket: d
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.bowerbird.core.Rtf", ["ephox.bowerbird.codes.HexToBlob", "ephox.bowerbird.core.RtfSupport", "ephox.bowerbird.core.Species", "ephox.perhaps.Option",
            "ephox.perhaps.Result"
        ], function(a, b, c, e, d) {
            var f = function(a, b) {
                    return c.identify(a, b)
                },
                g = function(a) {
                    return 0 <= a.indexOf("\\pngblip") ? d.value("image/png") : 0 <= a.indexOf("\\jpegblip") ? d.value("image/jpeg") : d.error("errors.imageimport.unsupported")
                },
                h = function(a, b) {
                    var c = a.match(b);
                    return c && c[1] && 0 === c[1].length % 2 ? d.value(c[1]) : d.error("errors.imageimport.invalid")
                },
                m = function(a) {
                    a = a.match(/\\shplid(\d+)/);
                    return null !== a ? e.some(a[1]) : e.none()
                },
                p = function(c) {
                    var d = c.bower(),
                        e = c.regex();
                    return m(d).map(function(f) {
                        var m =
                            c.idRef() + f;
                        return g(d).fold(function(a) {
                            return b.unsupported(m, a)
                        }, function(c) {
                            return h(d, e).fold(function(a) {
                                return b.unsupported(m, a)
                            }, function(d) {
                                return b.supported(m, c, a.convert(d, c))
                            })
                        })
                    })
                },
                q = function(a) {
                    for (var b = [], c = function() {
                        return a.length
                    }, d = function(a) {
                        var c = p(a);
                        b = b.concat(c.toArray());
                        return a.end() + 1
                    }, e = 0; e < a.length;) e = f(a, e).fold(c, d);
                    return b
                };
            return {
                nextBower: f,
                extractId: m,
                extractContentType: g,
                extractHex: h,
                images: function(a) {
                    a = a.replace(/\r/g, "").replace(/\n/g, "");
                    return q(a)
                }
            }
        })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.bowerbird.api.Rtf", ["ephox.bowerbird.core.Rtf", "ephox.bowerbird.core.RtfSupport", "ephox.perhaps.Result"], function(a, b, c) {
            return {
                images: function(b) {
                    return a.images(b)
                },
                toId: function(a) {
                    return b.cata(a, function(a, b) {
                        return a
                    }, function(a, b, c) {
                        return a
                    })
                },
                toBlob: function(a) {
                    return b.cata(a, function(a, b) {
                        return c.error(b)
                    }, function(a, b, e) {
                        return c.value(e)
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.flash.Correlation", "ephox.bowerbird.api.Rtf ephox.compass.Arr ephox.hermes.api.ImageExtract ephox.peanut.Fun ephox.perhaps.Option ephox.sugar.api.Attr ephox.sugar.api.Class global!console".split(" "), function(a, b, c, e, d, f, g, h) {
            var m = {
                    local: function(a, b, c) {
                        return d.from(b[c])
                    },
                    code: function(c, e, f) {
                        e = b.find(e, function(b) {
                            return a.toId(b) === c
                        });
                        return d.from(e)
                    }
                },
                p = function(c) {
                    var d = [],
                        e = function(c) {
                            return !b.exists(d, function(b) {
                                return a.toId(b) === c
                            })
                        };
                    return b.bind(c,
                        function(b) {
                            var c = a.toId(b);
                            return e(c) ? (d.push(b), [b]) : []
                        })
                };
            return {
                convert: function(q, s, r, t, k) {
                    var l = p(s),
                        w = [],
                        x = !1;
                    q = b.bind(q, function(b, c) {
                        var e = f.get(b, "data-image-type"),
                            p = f.get(b, "data-image-id");
                        g.remove(b, "rtf-data-image");
                        f.remove(b, "data-image-type");
                        f.remove(b, "data-image-id");
                        return (void 0 !== m[e] ? m[e] : d.none)(p, l, c).fold(function() {
                            h.log("WARNING: unable to find data for image ", b.dom());
                            return []
                        }, function(c) {
                            return a.toBlob(c).fold(function(a) {
                                f.set(b, "alt", k(a));
                                x = !0;
                                return []
                            }, function(a) {
                                w.push(b);
                                return [a]
                            })
                        })
                    });
                    c.fromBlobs(q, r, function(a) {
                        b.each(a, function(a, b) {
                            a.fold(function(a, c, d, e) {
                                f.set(w[b], "src", d)
                            }, e.noop)
                        });
                        t(a, x)
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    a.bolt.module.api.define("global!window", [], function() {
        return window
    });
    (function(a, k, l) {
        a("ephox.sugar.api.Css", "ephox.classify.Type ephox.compass.Arr ephox.compass.Obj ephox.perhaps.Option ephox.sugar.api.Attr ephox.sugar.api.Body ephox.sugar.api.Element ephox.sugar.api.Node ephox.violin.Strings global!Error global!console global!window".split(" "),
            function(a, b, c, e, d, f, g, h, m, p, q, s) {
                var r = function(b, c, d) {
                        if (!a.isString(d)) throw q.error("Invalid call to CSS.set. Property ", c, ":: Value ", d, ":: Element ", b), new p("CSS value must be a string: " + d);
                        b.style.setProperty(c, d)
                    },
                    t = function(a, b, c) {
                        a = a.dom();
                        r(a, b, c)
                    },
                    k = function(a, b) {
                        var c = a.dom().style.getPropertyValue(b);
                        return e.from(c).filter(function(a) {
                            return 0 < a.length
                        })
                    },
                    l = function(a, b, c) {
                        k(a, c).each(function(a) {
                            k(b, c).isNone() && t(b, c, a)
                        })
                    };
                return {
                    copy: function(a, b) {
                        b.dom().style.cssText = a.dom().style.cssText
                    },
                    set: t,
                    preserve: function(a, b) {
                        var c = d.get(a, "style"),
                            e = b(a);
                        (void 0 === c ? d.remove : d.set)(a, "style", c);
                        return e
                    },
                    setAll: function(a, b) {
                        var d = a.dom();
                        c.each(b, function(a, b) {
                            r(d, b, a)
                        })
                    },
                    remove: function(a, b) {
                        a.dom().style.removeProperty(b);
                        d.has(a, "style") && "" === m.trim(d.get(a, "style")) && d.remove(a, "style")
                    },
                    get: function(a, b) {
                        var c = a.dom(),
                            d = s.getComputedStyle(c).getPropertyValue(b),
                            c = "" !== d || f.inBody(a) ? d : c.style.getPropertyValue(b);
                        return null === c ? void 0 : c
                    },
                    getRaw: k,
                    isValidValue: function(a, b, c) {
                        a = g.fromTag(a);
                        t(a, b, c);
                        return k(a, b).isSome()
                    },
                    reflow: function(a) {
                        return a.dom().offsetWidth
                    },
                    transfer: function(a, c, d) {
                        h.isElement(a) && h.isElement(c) && b.each(d, function(b) {
                            l(a, c, b)
                        })
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.PredicateFind", "ephox.classify.Type ephox.compass.Arr ephox.peanut.Fun ephox.perhaps.Option ephox.sugar.api.Body ephox.sugar.api.Compare ephox.sugar.api.Element ephox.sugar.impl.ClosestOrAncestor".split(" "), function(a,
                                                                                                                                                                                                                                                      b, c, e, d, f, g, h) {
            var m = function(b, d, f) {
                    b = b.dom();
                    for (f = a.isFunction(f) ? f : c.constant(!1); b.parentNode;) {
                        b = b.parentNode;
                        var h = g.fromDom(b);
                        if (d(h)) return e.some(h);
                        if (f(h)) break
                    }
                    return e.none()
                },
                p = function(a, d) {
                    var f = b.find(a.dom().childNodes, c.compose(d, g.fromDom));
                    return e.from(f).map(g.fromDom)
                },
                q = function(a, b) {
                    var c = function(a) {
                        for (var d = 0; d < a.childNodes.length; d++) {
                            if (b(g.fromDom(a.childNodes[d]))) return e.some(g.fromDom(a.childNodes[d]));
                            var f = c(a.childNodes[d]);
                            if (f.isSome()) return f
                        }
                        return e.none()
                    };
                    return c(a.dom())
                };
            return {
                first: function(a) {
                    return q(d.body(), a)
                },
                ancestor: m,
                closest: function(a, b, c) {
                    return h(function(a) {
                        return b(a)
                    }, m, a, b, c)
                },
                sibling: function(a, b) {
                    var c = a.dom();
                    return c.parentNode ? p(g.fromDom(c.parentNode), function(c) {
                        return !f.eq(a, c) && b(c)
                    }) : e.none()
                },
                child: p,
                descendant: q
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.Replication", "ephox.sugar.api.Attr ephox.sugar.api.Element ephox.sugar.api.Insert ephox.sugar.api.InsertAll ephox.sugar.api.Remove ephox.sugar.api.Traverse".split(" "),
            function(a, b, c, e, d, f) {
                var g = function(a) {
                        return b.fromDom(a.dom().cloneNode(!0))
                    },
                    h = function(c, d) {
                        var e = b.fromTag(d),
                            f = a.clone(c);
                        a.setAll(e, f);
                        return e
                    };
                return {
                    shallow: function(a) {
                        return b.fromDom(a.dom().cloneNode(!1))
                    },
                    shallowAs: h,
                    deep: g,
                    copy: function(a, b) {
                        var c = h(a, b),
                            d = f.children(g(a));
                        e.append(c, d);
                        return c
                    },
                    mutate: function(a, b) {
                        var n = h(a, b);
                        c.before(a, n);
                        var g = f.children(a);
                        e.append(n, g);
                        d.remove(a);
                        return n
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.limbo.api.RtfImage", "ephox.perhaps.Option ephox.sugar.api.Attr ephox.sugar.api.Class ephox.sugar.api.Css ephox.sugar.api.Element ephox.sugar.api.Node ephox.sugar.api.PredicateFind ephox.sugar.api.Replication ephox.sugar.api.SelectorFilter ephox.violin.Strings".split(" "), function(a, b, c, e, d, f, g, h, m, p) {
            var q = function(a, b) {
                    var c = f.value(a),
                        e = d.fromTag("div"),
                        n = c.indexOf("]>");
                    e.dom().innerHTML = c.substr(n + 2);
                    return g.descendant(e, function(a) {
                        return f.name(a) === b
                    })
                },
                s = function(b) {
                    return f.isComment(b) ?
                        q(b, "v:shape") : a.none()
                },
                r = function(a) {
                    return m.descendants(a, ".rtf-data-image")
                };
            return {
                local: function(d) {
                    if ("img" === f.name(d)) {
                        var e = b.get(d, "src");
                        if (void 0 !== e && null !== e && p.startsWith(e, "file://")) return d = h.shallow(d), e = e.split(/[\/\\]/), b.set(d, "data-image-id", e[e.length - 1]), b.remove(d, "src"), b.set(d, "data-image-type", "local"), c.add(d, "rtf-data-image"), a.some(d)
                    }
                    return a.none()
                },
                vshape: function(a) {
                    return s(a).map(function(a) {
                        var f = b.get(a, "o:spid"),
                            f = void 0 === f ? b.get(a, "id") : f,
                            n = d.fromTag("img");
                        c.add(n, "rtf-data-image");
                        b.set(n, "data-image-id", f.substr(7));
                        b.set(n, "data-image-type", "code");
                        e.setAll(n, {
                            width: e.get(a, "width"),
                            height: e.get(a, "height")
                        });
                        return n
                    })
                },
                find: r,
                exists: function(a) {
                    return 0 < r(a).length
                },
                scour: s
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.rtf.RtfHandler", "ephox.bowerbird.api.Rtf ephox.cement.flash.Correlation ephox.limbo.api.RtfImage ephox.porkbun.Event ephox.porkbun.Events ephox.sugar.api.Traverse".split(" "),
            function(a, b, c, e, d, f) {
                return function(g) {
                    var h = g.translations,
                        m = d.create({
                            insert: e(["elements", "assets"]),
                            incomplete: e(["elements", "assets", "message"])
                        });
                    return {
                        events: m.registry,
                        processRtf: function(d, e, s, r) {
                            s = a.images(s);
                            var k = c.find(d);
                            b.convert(k, s, g.preprocessor, function(a, b) {
                                b ? m.trigger.incomplete(f.children(d), a.concat(e), "errors.imageimport.failed") : m.trigger.insert(f.children(d), a.concat(e));
                                r()
                            }, h)
                        }
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a,
              k, l) {
        a("ephox.cement.flash.Flash", "ephox.cement.rtf.RtfHandler ephox.compass.Arr ephox.limbo.api.RtfImage ephox.porkbun.Event ephox.porkbun.Events ephox.sugar.api.Remove ephox.sugar.api.Traverse".split(" "), function(a, b, c, e, d, f, g) {
            return function(h, m) {
                var p = d.create({
                        error: e(["message"]),
                        insert: e(["elements", "assets"]),
                        incomplete: e(["elements", "assets", "message"])
                    }),
                    q = a(m);
                q.events.incomplete.bind(function(a) {
                    p.trigger.incomplete(a.elements(), a.assets(), a.message())
                });
                q.events.insert.bind(function(a) {
                    p.trigger.insert(a.elements(),
                        a.assets())
                });
                return {
                    events: p.registry,
                    gordon: function(a, d) {
                        var e = function(b) {
                                q.processRtf(a, d, b.rtf(), b.hide())
                            },
                            n = function(e) {
                                var n = c.find(a);
                                b.each(n, f.remove);
                                p.trigger.incomplete(g.children(a), d, e)
                            },
                            r = function() {
                                var e = c.find(a);
                                b.each(e, f.remove);
                                p.trigger.insert(g.children(a), d)
                            },
                            k = function(a) {
                                n(a.message())
                            };
                        if (!0 === m.allowLocalImages && !0 === m.enableFlashImport) {
                            var l = h(m);
                            l.events.response.bind(e);
                            l.events.cancel.bind(r);
                            l.events.failed.bind(k);
                            l.events.error.bind(k);
                            l.open()
                        } else n("errors.local.images.disallowed")
                    }
                }
            }
        })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.scullion.Cell", [], function() {
            var a = function(b) {
                var c = b;
                return {
                    get: function() {
                        return c
                    },
                    set: function(a) {
                        c = a
                    },
                    clone: function() {
                        return a(c)
                    }
                }
            };
            return a
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.step.RtfStep", "ephox.cement.alien.FutureStep ephox.cement.api.Bundle ephox.cement.flash.Flash ephox.cement.rtf.RtfHandler ephox.cement.smartpaste.PasteResponse ephox.compass.Arr ephox.limbo.api.RtfImage ephox.peanut.Fun ephox.perhaps.Option ephox.scullion.Cell ephox.sugar.api.Element ephox.sugar.api.InsertAll ephox.sugar.api.Remove ephox.sugar.api.Traverse".split(" "),
            function(a, b, c, e, d, f, g, h, m, p, q, s, r, k) {
                return function(l, u) {
                    var w = c(l, u),
                        x = e(u),
                        z = p(m.none()),
                        A = function(c) {
                            z.get().each(function(d) {
                                a.call(d, {
                                    response: c,
                                    bundle: b.nu({})
                                })
                            })
                        };
                    w.events.insert.bind(function(a) {
                        A(d.paste(a.elements(), a.assets()))
                    });
                    w.events.incomplete.bind(function(a) {
                        A(d.incomplete(a.elements(), a.assets(), a.message()))
                    });
                    w.events.error.bind(function(a) {
                        a = a.message();
                        a = d.error(a);
                        A(a)
                    });
                    x.events.insert.bind(function(a) {
                        A(d.paste(a.elements(), a.assets()))
                    });
                    x.events.incomplete.bind(function(a) {
                        A(d.incomplete(a.elements(),
                            a.assets(), a.message()))
                    });
                    return function(b, c) {
                        return a.sync(function(e) {
                            var p = function() {
                                    a.call(e, {
                                        response: c.response(),
                                        bundle: c.bundle()
                                    })
                                },
                                l = function(a, c) {
                                    z.set(m.some(e));
                                    var n = q.fromTag("div");
                                    s.append(n, a);
                                    b.rtf().fold(function() {
                                        g.exists(n) ? w.gordon(n, c) : p()
                                    }, function(a) {
                                        !0 === u.allowLocalImages ? x.processRtf(n, c, a, h.noop) : (a = g.find(n), f.each(a, r.remove), A(d.incomplete(k.children(n), c, "errors.local.images.disallowed")))
                                    })
                                };
                            d.cata(c.response(), p, l, p, l)
                        })
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require,
        a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.api.Bundles", ["ephox.cement.alien.FutureStep", "ephox.cement.smartpaste.PasteResponse", "global!console"], function(a, b, c) {
            var e = function(a) {
                    return a.officeStyles().getOr(!0)
                },
                d = function(a) {
                    return a.htmlStyles().getOr(!1)
                },
                f = function(a) {
                    return a.isWord().getOr(!1)
                };
            return {
                proxyBin: function(d) {
                    return {
                        handle: function(e, f) {
                            return d.proxyBin().fold(function() {
                                c.error(e);
                                return a.pure({
                                    response: b.cancel(),
                                    bundle: {}
                                })
                            }, f)
                        }
                    }
                },
                merging: function(a) {
                    var b =
                        f(a);
                    return b && e(a) || !b && d(a)
                },
                mergeOffice: e,
                mergeNormal: d,
                isWord: f,
                isInternal: function(a) {
                    return a.isInternal().getOr(!1)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.style.Styles", ["ephox.flour.style.Resolver"], function(a) {
            return {
                resolve: a.create("ephox-cement").resolve
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.smartpaste.MergeSettings", "ephox.cement.style.Styles ephox.highway.Merger ephox.peanut.Fun ephox.perhaps.Option ephox.sugar.api.Class ephox.sugar.api.Element ephox.sugar.api.Insert".split(" "),
            function(a, b, c, e, d, f, g) {
                return function(h, m) {
                    var p = m.translations,
                        q = function(a, c, d) {
                            d(e.some(b.merge(c, {
                                officeStyles: a,
                                htmlStyles: a
                            })))
                        },
                        s = function(b, c) {
                            var m = f.fromTag("div");
                            d.add(m, a.resolve("styles-dialog-content"));
                            var s = f.fromTag("p"),
                                r = f.fromText(p("cement.dialog.paste.instructions"));
                            g.append(s, r);
                            g.append(m, s);
                            var s = {
                                    text: p("cement.dialog.paste.clean"),
                                    tabindex: 0,
                                    className: a.resolve("clean-styles"),
                                    click: function() {
                                        k.destroy();
                                        q(!1, b, c)
                                    }
                                },
                                r = {
                                    text: p("cement.dialog.paste.merge"),
                                    tabindex: 1,
                                    className: a.resolve("merge-styles"),
                                    click: function() {
                                        k.destroy();
                                        q(!0, b, c)
                                    }
                                },
                                k = h(!0);
                            k.setTitle(p("cement.dialog.paste.title"));
                            k.setContent(m);
                            k.setButtons([s, r]);
                            k.show();
                            k.events.close.bind(function() {
                                c(e.none());
                                k.destroy()
                            })
                        };
                    return {
                        get: function(a, b) {
                            var c = m[a ? "officeStyles" : "htmlStyles"];
                            "clean" === c ? q(!1, m, b) : "merge" === c ? q(!0, m, b) : s(m, b)
                        },
                        destroy: c.noop
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.step.MergeStep", ["ephox.cement.alien.FutureStep",
            "ephox.cement.api.Bundle", "ephox.cement.api.Bundles", "ephox.cement.smartpaste.MergeSettings", "ephox.cement.smartpaste.PasteResponse"
        ], function(a, b, c, e, d) {
            var f = function(f, h) {
                var m = e(f, h);
                return function(e, f) {
                    var h = f.bundle(),
                        g = f.response();
                    return a.sync(function(e) {
                        m.get(c.isWord(h), function(c) {
                            c = c.fold(function() {
                                return {
                                    response: d.cancel(),
                                    bundle: f.bundle()
                                }
                            }, function(a) {
                                return {
                                    response: g,
                                    bundle: b.nu({
                                        officeStyles: a.officeStyles,
                                        htmlStyles: a.htmlStyles
                                    })
                                }
                            });
                            a.call(e, c)
                        })
                    })
                }
            };
            return {
                fixed: function(c,
                                d) {
                    return function(e, f) {
                        return a.pure({
                            response: f.response(),
                            bundle: b.nu({
                                officeStyles: c,
                                htmlStyles: d
                            })
                        })
                    }
                },
                fromConfig: f,
                fromConfigIfExternal: function(d, e) {
                    return function(m, p) {
                        return c.isInternal(p.bundle()) ? a.pure({
                            response: p.response(),
                            bundle: b.nu({
                                officeStyles: !0,
                                htmlStyles: !0
                            })
                        }) : f(d, e)(m, p)
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.Comments", ["ephox.fred.PlatformDetection", "ephox.peanut.Fun", "ephox.sugar.api.Element",
            "global!document"
        ], function(a, b, c, e) {
            var d = function(a) {
                    for (var b = []; null !== a.nextNode();) b.push(c.fromDom(a.currentNode));
                    return b
                },
                f = function(a) {
                    try {
                        return d(a)
                    } catch (b) {
                        return []
                    }
                };
            a = a.detect().browser;
            var g = a.isIE() || a.isSpartan() ? f : d,
                h = b.constant(b.constant(!0));
            return {
                find: function(a, b) {
                    var c = b.fold(h, function(a) {
                        return function(b) {
                            return a(b.nodeValue)
                        }
                    });
                    c.acceptNode = c;
                    c = e.createTreeWalker(a.dom(), NodeFilter.SHOW_COMMENT, c, !1);
                    return g(c)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require,
        a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.alien.Comments", ["ephox.perhaps.Option", "ephox.sugar.api.Comments", "ephox.violin.Strings", "global!document"], function(a, b, c, e) {
            return {
                find: function(d) {
                    return b.find(d, a.some(function(a) {
                        return c.startsWith(a, "[if gte vml 1]")
                    }))
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.html.ImageReference", "ephox.cement.alien.Comments ephox.compass.Arr ephox.limbo.api.RtfImage ephox.perhaps.Option ephox.perhaps.Options ephox.scullion.Struct ephox.sugar.api.Attr ephox.sugar.api.Elements ephox.sugar.api.SelectorFilter global!console".split(" "),
            function(a, b, c, e, d, f, g, h, m, p) {
                var q = f.immutable("img", "vshape"),
                    s = function(a, c) {
                        var d = g.get(a, "v:shapes"),
                            f = e.from(b.find(c, function(a) {
                                return g.get(a, "id") === d
                            }));
                        f.isNone() && p.log("WARNING: unable to find data for image", a.dom());
                        return f.map(function(b) {
                            var c = g.clone(a);
                            c._rawElement = a.dom();
                            var d = g.clone(b);
                            d._rawElement = b.dom();
                            return q(c, d)
                        })
                    };
                return {
                    extract: function(e) {
                        var f = h.fromHtml(e);
                        e = b.bind(f, function(a) {
                            return m.descendants(a, "img")
                        });
                        var f = b.bind(f, a.find),
                            g = d.cat(b.map(f, c.scour));
                        e = b.map(e, function(a) {
                            return s(a, g)
                        });
                        return d.cat(e)
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.html.VshapeCorrelation", "ephox.classify.Type ephox.compass.Arr ephox.peanut.Fun ephox.perhaps.Option ephox.sugar.api.Attr ephox.sugar.api.Class".split(" "), function(a, b, c, e, d, f) {
            var g = function(b, c) {
                    var e = c.style;
                    d.has(b, "width") && d.has(b, "height") && a.isString(e) && (e = e.match(/rotation:([^;]*)/), null === e || "90" !== e[1] && "-90" !== e[1] ||
                    d.setAll(b, {
                        width: d.get(b, "height"),
                        height: d.get(b, "width")
                    }))
                },
                h = function(a, b, c) {
                    return c.img()[a] === b
                },
                m = function(a, f, n) {
                    var g = d.get(f, n),
                        g = c.curry(h, n, g);
                    a = b.find(a, g);
                    return e.from(a).map(function(a) {
                        d.remove(f, n);
                        return a
                    })
                };
            return {
                rotateImage: g,
                insertRtfCorrelation: function(a, c, e) {
                    b.each(c, function(b) {
                        m(a, b, e).each(function(a) {
                            a = a.vshape();
                            var c = a["o:spid"],
                                c = void 0 === c ? a.id : c;
                            g(b, a);
                            f.add(b, "rtf-data-image");
                            d.set(b, "data-image-id", c.substr(7));
                            d.set(b, "data-image-type", "code")
                        })
                    })
                }
            }
        })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.impl.NodeValue", ["ephox.perhaps.Option", "global!Error"], function(a, b) {
            return function(c, e) {
                var d = function(b) {
                    try {
                        return c(b) ? a.some(b.dom().nodeValue) : a.none()
                    } catch (d) {
                        return a.none()
                    }
                };
                return {
                    get: function(a) {
                        if (!c(a)) throw new b("Can only get " + e + " value of a " + e + " node");
                        return d(a).getOr("")
                    },
                    getOption: d,
                    set: function(a, d) {
                        if (!c(a)) throw new b("Can only set raw " + e + " value of a " + e + " node");
                        a.dom().nodeValue = d
                    }
                }
            }
        })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.Comment", ["ephox.sugar.api.Node", "ephox.sugar.impl.NodeValue"], function(a, b) {
            var c = b(a.isComment, "comment");
            return {
                get: function(a) {
                    return c.get(a)
                },
                getOption: function(a) {
                    return c.getOption(a)
                },
                set: function(a, b) {
                    c.set(a, b)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.vogue.css.Set", ["ephox.sugar.api.Insert"], function(a) {
            return {
                setCss: function(b, c, e) {
                    b.dom().styleSheet ?
                        b.dom().styleSheet.cssText = c : a.append(b, e)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.vogue.util.Regex", [], function() {
            return {
                escape: function(a) {
                    return a.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, "\\$&")
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.vogue.css.Url", ["ephox.compass.Obj", "ephox.vogue.util.Regex", "global!RegExp"], function(a, b, c) {
            var e = function(a, e, n) {
                e = new c("url\\(\\s*['\"]?" +
                    b.escape(e) + "(.*?)['\"]?\\s*\\)", "g");
                return a.replace(e, 'url("' + n + '$1")')
            };
            return {
                replace: e,
                replaceMany: function(b, c) {
                    var g = b;
                    a.each(c, function(a, b) {
                        g = e(g, b, a)
                    });
                    return g
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.vogue.api.DocStyle", "ephox.sugar.api.Attr ephox.sugar.api.Element ephox.sugar.api.Insert ephox.sugar.api.SelectorFind ephox.vogue.css.Set ephox.vogue.css.Url global!Array".split(" "), function(a, b, c, e, d, f, g) {
            return {
                stylesheets: function(a) {
                    a =
                        a.dom().styleSheets;
                    return g.prototype.slice.call(a)
                },
                inject: function(h, g, p) {
                    var q = b.fromTag("style", p.dom());
                    a.set(q, "type", "text/css");
                    h = void 0 === g ? h : f.replaceMany(h, g);
                    d.setCss(q, h, b.fromText(h, p.dom()));
                    p = e.descendant(p, "head").getOrDie();
                    c.append(p, q)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.vogue.css.Rules", ["ephox.compass.Arr", "ephox.scullion.Struct"], function(a, b) {
            var c = b.immutable("selector", "style", "raw"),
                e = function(b) {
                    return a.map(b.cssRules,
                        function(a) {
                            var b = a.selectorText,
                                d = a.style.cssText;
                            if (void 0 === d) throw "WARNING: Browser does not support cssText property";
                            return c(b, d, a.style)
                        })
                };
            return {
                extract: e,
                extractAll: function(b) {
                    return a.bind(b, e)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.vogue.api.Rules", ["ephox.vogue.css.Rules"], function(a) {
            return {
                extract: function(b) {
                    return a.extract(b)
                },
                extractAll: function(b) {
                    return a.extractAll(b)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require,
        a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.html.TordPostprocess", "ephox.cement.html.VshapeCorrelation ephox.compass.Arr ephox.peanut.Fun ephox.sugar.api.Attr ephox.sugar.api.Comment ephox.sugar.api.Css ephox.sugar.api.Remove ephox.sugar.api.SelectorFilter ephox.sugar.api.Traverse ephox.vogue.api.DocStyle ephox.vogue.api.Rules".split(" "), function(a, b, c, e, d, f, g, h, m, p, q) {
            var s = c.noop,
                r = function(a) {
                    var c = {};
                    b.each(a, function(b) {
                        void 0 !== a[b] && (c[b] = a[b])
                    });
                    return c
                },
                k = function(a, c) {
                    var d =
                        b.bind(c, function(c) {
                            var d = h.descendants(a, c.selector());
                            b.each(d, function(a) {
                                var b = r(c.raw());
                                f.setAll(a, b)
                            });
                            return d
                        });
                    b.each(d, function(a) {
                        e.remove(a, "class")
                    })
                },
                l = function(a, b) {
                    var c = p.stylesheets(a),
                        c = q.extractAll(c);
                    k(b, c)
                },
                u = function(a) {
                    a = m.children(a);
                    b.each(a, function(a) {
                        d.getOption(a).each(function(b) {
                            "StartFragment" !== b && "EndFragment" !== b || g.remove(a)
                        })
                    })
                };
            return {
                doMergeInlineStyles: k,
                process: function(b, c, d, e, f) {
                    var g = h.descendants(c, "img");
                    u(c);
                    a.insertRtfCorrelation(d, g, e);
                    (f.mergeInline() ?
                        l : s)(b, c)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.photon.Reader", ["ephox.perhaps.Option", "ephox.sugar.api.Element"], function(a, b) {
            var c = function(c) {
                c = c.dom();
                try {
                    var d = c.contentWindow ? c.contentWindow.document : c.contentDocument;
                    return void 0 !== d && null !== d ? a.some(b.fromDom(d)) : a.none()
                } catch (f) {
                    return console.log("Error reading iframe: ", c), console.log("Error was: " + f), a.none()
                }
            };
            return {
                doc: function(a) {
                    return c(a).fold(function() {
                            return a
                        },
                        function(a) {
                            return a
                        })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.photon.Writer", ["ephox.photon.Reader", "ephox.sugar.api.Body"], function(a, b) {
            return {
                write: function(c, e) {
                    if (!b.inBody(c)) throw "Internal error: attempted to write to an iframe that is not in the DOM";
                    var d = a.doc(c).dom();
                    d.open();
                    d.writeln(e);
                    d.close()
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.impl.FilteredEvent", ["ephox.peanut.Fun", "ephox.sugar.api.Element"], function(a, b) {
            var c = function(b, c, d, e, f, s, r) {
                    return {
                        target: a.constant(b),
                        x: a.constant(c),
                        y: a.constant(d),
                        stop: e,
                        prevent: f,
                        kill: s,
                        raw: a.constant(r)
                    }
                },
                e = function(d, e) {
                    return function(f) {
                        if (d(f)) {
                            var p = b.fromDom(f.target),
                                q = function() {
                                    f.stopPropagation()
                                },
                                s = function() {
                                    f.preventDefault()
                                },
                                r = a.compose(s, q),
                                p = c(p, f.clientX, f.clientY, q, s, r, f);
                            e(p)
                        }
                    }
                },
                d = function(b, c, d, p, q) {
                    d = e(d, p);
                    b.dom().addEventListener(c, d, q);
                    return {
                        unbind: a.curry(f, b, c, d, q)
                    }
                },
                f = function(a,
                             b, c, d) {
                    a.dom().removeEventListener(b, c, d)
                };
            return {
                bind: function(a, b, c, e) {
                    return d(a, b, c, e, !1)
                },
                capture: function(a, b, c, e) {
                    return d(a, b, c, e, !0)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.DomEvent", ["ephox.peanut.Fun", "ephox.sugar.impl.FilteredEvent"], function(a, b) {
            var c = a.constant(!0);
            return {
                bind: function(a, d, f) {
                    return b.bind(a, d, c, f)
                },
                capture: function(a, d, f) {
                    return b.capture(a, d, c, f)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require,
        a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.photon.Sandbox", "ephox.peanut.Fun ephox.photon.Writer ephox.sugar.api.Css ephox.sugar.api.DomEvent ephox.sugar.api.Element ephox.sugar.api.Insert ephox.sugar.api.Remove global!setTimeout".split(" "), function(a, b, c, e, d, f, g, h) {
            return function(m) {
                return {
                    play: function(p, q, s) {
                        var r = d.fromTag("div"),
                            k = d.fromTag("iframe");
                        c.setAll(r, {
                            display: "none"
                        });
                        var l = e.bind(k, "load", function() {
                            l.unbind();
                            b.write(k, p);
                            var c = k.dom().contentWindow.document;
                            if (void 0 ===
                                c) throw "sandbox iframe load event did not fire correctly";
                            var e = d.fromDom(c),
                                c = c.body;
                            if (void 0 === c) throw "sandbox iframe does not have a body";
                            c = d.fromDom(c);
                            e = q(e, c);
                            g.remove(r);
                            h(a.curry(s, e), 0)
                        });
                        f.append(r, k);
                        f.append(m, r)
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.Html", ["ephox.sugar.api.Element", "ephox.sugar.api.Insert"], function(a, b) {
            var c = function(a) {
                return a.dom().innerHTML
            };
            return {
                get: c,
                set: function(a, b) {
                    a.dom().innerHTML =
                        b
                },
                getOuter: function(e) {
                    var d = a.fromTag("div");
                    e = a.fromDom(e.dom().cloneNode(!0));
                    b.append(d, e);
                    return c(d)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.html.HtmlHandler", "ephox.cement.alien.FutureStep ephox.cement.api.Bundle ephox.cement.html.ImageReference ephox.cement.html.TordPostprocess ephox.cement.smartpaste.PasteResponse ephox.peanut.Fun ephox.photon.Sandbox ephox.sugar.api.Element ephox.sugar.api.Elements ephox.sugar.api.Html global!document".split(" "),
            function(a, b, c, e, d, f, g, h, m, p, q) {
                var s = function(a) {
                        var b = 1;
                        return a.replace(/(<img[^>]*)src=".*?"/g, function(a, c, d) {
                            return c + 'data-textbox-image="' + b++ + '"'
                        })
                    },
                    r = function(a, b) {
                        var c = g(h.fromDom(q.body));
                        return function(d, n) {
                            c.play(d, function(c, d) {
                                e.process(c, d, a, "data-textbox-image", {
                                    mergeInline: f.constant(b)
                                });
                                return p.get(d)
                            }, n)
                        }
                    },
                    k = function(e, f, h) {
                        return a.sync(function(g) {
                            var p = c.extract(e);
                            r(p, f)(h, function(c) {
                                c = m.fromHtml(c);
                                a.call(g, {
                                    response: d.paste(c, []),
                                    bundle: b.nu({})
                                })
                            })
                        })
                    },
                    l = function(a) {
                        var b =
                            a.indexOf("</html>");
                        return -1 < b ? a.substr(0, b + 7) : a
                    };
                return {
                    handle: function(b, c, e) {
                        b = l(b.data());
                        var f = s(b);
                        return e.cleanDocument(f, c).fold(function() {
                            return a.pure({
                                response: d.error("errors.paste.word.notready"),
                                bundle: {}
                            })
                        }, function(b) {
                            return void 0 === b || null === b || 0 === b.length ? a.pure(d.paste([], []), {}) : k(f, c, b)
                        })
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.images.ImageHandler", "ephox.cement.alien.FutureStep ephox.cement.api.Bundle ephox.cement.smartpaste.PasteResponse ephox.compass.Arr ephox.hermes.api.ImageAsset ephox.hermes.api.ImageExtract ephox.sugar.api.Attr ephox.sugar.api.Element global!console".split(" "),
            function(a, b, c, e, d, f, g, h, m) {
                var p = function(a) {
                    return e.bind(a, function(a) {
                        return d.cata(a, function(a, b, c, d) {
                            a = h.fromTag("img");
                            g.set(a, "src", c);
                            return [a]
                        }, function(a, b, c) {
                            m.log("Internal error: Paste operation produced an image URL instead of a Data URI: ", b);
                            return []
                        })
                    })
                };
                return {
                    handle: function(d, h) {
                        var g = e.filter(d, function(a) {
                                return "file" === a.kind && /image/.test(a.type)
                            }),
                            m = e.map(g, function(a) {
                                return a.getAsFile()
                            });
                        return a.sync(function(d) {
                            f.toAssets(m, h, function(e) {
                                var f = p(e);
                                a.call(d, {
                                    response: c.paste(f,
                                        e),
                                    bundle: b.nu({})
                                })
                            })
                        })
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.api.HtmlPatterns", [], function() {
            return {
                validStyles: function() {
                    return /^(mso-.*|tab-stops|tab-interval|language|text-underline|text-effect|text-line-through|font-color|horiz-align|list-image-[0-9]+|separator-image|table-border-color-(dark|light)|vert-align|vnd\..*)$/
                },
                specialInline: function() {
                    return /^(font|em|strong|samp|acronym|cite|code|dfn|kbd|tt|b|i|u|s|sub|sup|ins|del|var|span)$/
                }
            }
        })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.violin.StringMatch", [], function() {
            var a = function(a) {
                return {
                    fold: a,
                    matches: function(c) {
                        return a(function(a) {
                            return 0 === c.toLowerCase().indexOf(a.toLowerCase())
                        }, function(a) {
                            return a.test(c.toLowerCase())
                        }, function(a) {
                            return 0 <= c.toLowerCase().indexOf(a.toLowerCase())
                        }, function(a) {
                            return c.toLowerCase() === a.toLowerCase()
                        }, function() {
                            return !0
                        }, function(a) {
                            return !a.matches(c)
                        })
                    }
                }
            };
            return {
                starts: function(b) {
                    return a(function(a,
                                      e, d, f, n, h) {
                        return a(b)
                    })
                },
                pattern: function(b) {
                    return a(function(a, e, d, f, n, h) {
                        return e(b)
                    })
                },
                contains: function(b) {
                    return a(function(a, e, d, f, n, h) {
                        return d(b)
                    })
                },
                exact: function(b) {
                    return a(function(a, e, d, f, n, h) {
                        return f(b)
                    })
                },
                all: function() {
                    return a(function(a, c, e, d, f, n) {
                        return f()
                    })
                },
                not: function(b) {
                    return a(function(a, e, d, f, n, h) {
                        return h(b)
                    })
                },
                cata: function(a, c, e, d, f, n, h) {
                    return a.fold(c, e, d, f, n, h)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.api.RuleMatch", ["ephox.peanut.Fun", "ephox.sugar.api.Node", "ephox.violin.StringMatch"], function(a, b, c) {
            return {
                keyval: function(b, d, f, g) {
                    var h = g.name,
                        m = void 0 !== g.condition ? g.condition : a.constant(!0);
                    g = void 0 !== g.value ? g.value : c.all();
                    return h.matches(f) && g.matches(d) && m(b)
                },
                name: function(c, d) {
                    var f = b.name(c),
                        g = d.name,
                        h = void 0 !== d.condition ? d.condition : a.constant(!0);
                    return g.matches(f) && h(c)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.cleanup.AttributeAccess", ["ephox.compass.Arr", "ephox.compass.Obj", "ephox.peanut.Fun", "ephox.sugar.api.Attr"], function(a, b, c, e) {
            var d = function(c, d, h) {
                a.each(d, function(a) {
                    e.remove(c, a)
                });
                b.each(h, function(a, b) {
                    e.set(c, b, a)
                })
            };
            return {
                filter: function(b, c) {
                    var d = {};
                    a.each(b.dom().attributes, function(a) {
                        c(a.value, a.name) || (d[a.name] = a.value)
                    });
                    return d
                },
                clobber: function(c, e, h) {
                    h = a.map(c.dom().attributes, function(a) {
                        return a.name
                    });
                    b.size(e) !== h.length && d(c, h, e)
                },
                scan: c.constant({})
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require,
        a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.cleanup.StyleAccess", ["ephox.compass.Arr", "ephox.compass.Obj", "ephox.sugar.api.Attr", "ephox.sugar.api.Css", "ephox.violin.Strings"], function(a, b, c, e, d) {
            var f = function(b) {
                    var c = {};
                    b = void 0 !== b && null !== b ? b.split(";") : [];
                    a.each(b, function(a) {
                        a = a.split(":");
                        2 === a.length && (c[d.trim(a[0])] = d.trim(a[1]))
                    });
                    return c
                },
                g = function(c) {
                    var d = b.keys(c);
                    return a.map(d, function(a) {
                        return a + ": " + c[a]
                    }).join("; ")
                };
            return {
                filter: function(b, c) {
                    var d = {};
                    a.each(b.dom().style,
                        function(a) {
                            var e;
                            e = b.dom().style.getPropertyValue(a);
                            c(e, a) || (d[a] = e)
                        });
                    return d
                },
                clobber: function(a, d, f) {
                    c.set(a, "style", "");
                    var n = b.size(d),
                        s = b.size(f);
                    0 === n && 0 === s ? c.remove(a, "style") : 0 === n ? c.set(a, "style", g(f)) : (b.each(d, function(b, c) {
                        e.set(a, c, b)
                    }), d = c.get(a, "style"), f = 0 < s ? g(f) + "; " : "", c.set(a, "style", f + d))
                },
                scan: function(b, c, d) {
                    b = b.dom().getAttribute("style");
                    var e = f(b),
                        g = {};
                    a.each(c, function(a) {
                        var b = e[a];
                        void 0 === b || d(b, a) || (g[a] = b)
                    });
                    return g
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require,
        a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.cleanup.Cleaners", ["ephox.pastiche.cleanup.AttributeAccess", "ephox.pastiche.cleanup.StyleAccess", "ephox.peanut.Fun", "ephox.sugar.api.Element"], function(a, b, c, e) {
            var d = ["mso-list"],
                f = function(a, c) {
                    var e = b.scan(a, d, c),
                        f = b.filter(a, c);
                    b.clobber(a, f, e)
                },
                g = function(b, c) {
                    var d = a.filter(b, c);
                    a.clobber(b, d, {})
                };
            return {
                style: f,
                attribute: g,
                styleDom: function(a, b) {
                    f(e.fromDom(a), b)
                },
                attributeDom: function(a, b) {
                    g(e.fromDom(a), b)
                },
                validateStyles: function(a) {
                    var d =
                        b.filter(a, c.constant(!1));
                    b.clobber(a, d, {})
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.Classes", ["ephox.compass.Arr", "ephox.sugar.api.Class", "global!Array"], function(a, b, c) {
            return {
                add: function(c, d) {
                    a.each(d, function(a) {
                        b.add(c, a)
                    })
                },
                remove: function(c, d) {
                    a.each(d, function(a) {
                        b.remove(c, a)
                    })
                },
                toggle: function(c, d) {
                    a.each(d, function(a) {
                        b.toggle(c, a)
                    })
                },
                hasAll: function(c, d) {
                    return a.forall(d, function(a) {
                        return b.has(c, a)
                    })
                },
                hasAny: function(c,
                                 d) {
                    return a.exists(d, function(a) {
                        return b.has(c, a)
                    })
                },
                get: function(a) {
                    a = a.dom().classList;
                    for (var b = new c(a.length), f = 0; f < a.length; f++) b[f] = a.item(f);
                    return b
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.engine.Pipeless", "ephox.compass.Arr ephox.highway.Merger ephox.pastiche.api.RuleMatch ephox.pastiche.cleanup.Cleaners ephox.peanut.Fun ephox.sugar.api.Attr ephox.sugar.api.Class ephox.sugar.api.Classes ephox.sugar.api.Remove ephox.sugar.api.SelectorFilter".split(" "),
            function(a, b, c, e, d, f, g, h, m, p) {
                var q = function(b, d, e) {
                    b(e, function(b, f) {
                        return a.exists(d, function(a) {
                            return c.keyval(e, b, f, a)
                        })
                    })
                };
                return {
                    remover: function(s, k) {
                        var r = b.merge({
                                styles: [],
                                attributes: [],
                                classes: [],
                                tags: []
                            }, k),
                            l = p.descendants(s, "*");
                        a.each(l, function(b) {
                            q(e.style, r.styles, b);
                            q(e.attribute, r.attributes, b);
                            a.each(r.classes, function(c) {
                                var d = f.has(b, "class") ? h.get(b) : [];
                                a.each(d, function(a) {
                                    c.name.matches(a) && g.remove(b, a)
                                })
                            })
                        });
                        l = p.descendants(s, "*");
                        a.each(l, function(b) {
                            a.exists(r.tags,
                                d.curry(c.name, b)) && m.remove(b)
                        })
                    },
                    unwrapper: function(e, f) {
                        var g = b.merge({
                                tags: []
                            }, f),
                            h = p.descendants(e, "*");
                        a.each(h, function(b) {
                            a.exists(g.tags, d.curry(c.name, b)) && m.unwrap(b)
                        })
                    },
                    transformer: function(e, f) {
                        var g = b.merge({
                                tags: []
                            }, f),
                            h = p.descendants(e, "*");
                        a.each(h, function(b) {
                            var e = a.find(g.tags, d.curry(c.name, b));
                            void 0 !== e && null !== e && e.mutate(b)
                        })
                    },
                    validator: function(b) {
                        b = p.descendants(b, "*");
                        a.each(b, function(a) {
                            e.validateStyles(a)
                        })
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.engine.Token", ["ephox.compass.Obj", "ephox.sugar.api.Css", "ephox.sugar.api.Element"], function(a, b, c) {
            var e = function(a, d, e) {
                    var n, p, q, s = c.fromDom(a);
                    switch (a.nodeType) {
                        case 1:
                            d ? n = "endElement" : (n = "startElement", b.setAll(s, e || {}));
                            p = "HTML" !== a.scopeName && a.scopeName && a.tagName && 0 >= a.tagName.indexOf(":") ? (a.scopeName + ":" + a.tagName).toUpperCase() : a.tagName;
                            break;
                        case 3:
                            n = "text";
                            q = a.nodeValue;
                            break;
                        case 8:
                            n = "comment";
                            q = a.nodeValue;
                            break;
                        default:
                            console.log("WARNING: Unsupported node type encountered: " +
                                a.nodeType)
                    }
                    return {
                        getNode: function() {
                            return a
                        },
                        tag: function() {
                            return p
                        },
                        type: function() {
                            return n
                        },
                        text: function() {
                            return q
                        }
                    }
                },
                d = function(a, b) {
                    return e(b.createElement(a), !0)
                };
            return {
                START_ELEMENT_TYPE: "startElement",
                END_ELEMENT_TYPE: "endElement",
                TEXT_TYPE: "text",
                COMMENT_TYPE: "comment",
                FINISHED: d("HTML", window.document),
                token: e,
                createStartElement: function(b, c, d, m) {
                    var p = m.createElement(b);
                    a.each(c, function(a, b) {
                        p.setAttribute(b, a)
                    });
                    return e(p, !1, d)
                },
                createEndElement: d,
                createComment: function(a, b) {
                    return e(b.createComment(a), !1)
                },
                createText: function(a, b) {
                    return e(b.createTextNode(a))
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.engine.Serialiser", ["ephox.pastiche.engine.Token"], function(a) {
            return {
                create: function(b) {
                    var c = b.createDocumentFragment(),
                        e = c;
                    return {
                        dom: e,
                        receive: function(d) {
                            var f = function(a) {
                                    a = a.getNode().cloneNode(!1);
                                    c.appendChild(a);
                                    c = a
                                },
                                g = function(a, d) {
                                    var e = b.createTextNode(a.text());
                                    c.appendChild(e)
                                };
                            switch (d.type()) {
                                case a.START_ELEMENT_TYPE:
                                    f(d);
                                    break;
                                case a.TEXT_TYPE:
                                    g(d);
                                    break;
                                case a.END_ELEMENT_TYPE:
                                    c = c.parentNode;
                                    null === c && (c = e);
                                    break;
                                case a.COMMENT_TYPE:
                                    break;
                                default:
                                    throw {
                                        message: "Unsupported token type: " + d.type()
                                    };
                            }
                        },
                        label: "SERIALISER"
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.engine.Tokeniser", ["ephox.pastiche.engine.Token"], function(a) {
            return {
                tokenise: function(b, c) {
                    var e;
                    c = c || window.document;
                    e = c.createElement("div");
                    c.body.appendChild(e);
                    e.style.position =
                        "absolute";
                    e.style.left = "-10000px";
                    e.innerHTML = b;
                    nextNode = e.firstChild || a.FINISHED;
                    var d = [];
                    endNode = !1;
                    return {
                        hasNext: function() {
                            return void 0 !== nextNode
                        },
                        next: function() {
                            var b = nextNode,
                                g = endNode;
                            !endNode && nextNode.firstChild ? (d.push(nextNode), nextNode = nextNode.firstChild) : endNode || 1 !== nextNode.nodeType ? nextNode.nextSibling ? (nextNode = nextNode.nextSibling, endNode = !1) : (nextNode = d.pop(), endNode = !0) : endNode = !0;
                            b === a.FINISHED || nextNode || (c.body.removeChild(e), nextNode = a.FINISHED);
                            b = b === a.FINISHED ? b : b ?
                                a.token(b, g) : void 0;
                            return b
                        }
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.engine.Pipeline", ["ephox.pastiche.engine.Serialiser", "ephox.pastiche.engine.Tokeniser"], function(a, b) {
            var c = function(a, b, c) {
                var n = c;
                for (c = b.length - 1; 0 <= c; c--) n = b[c](n, {}, a);
                return n
            };
            return {
                build: c,
                run: function(e, d, f) {
                    var g = a.create(e);
                    d = b.tokenise(d, e);
                    for (e = c(e, f, g); d.hasNext();) f = d.next(), e.receive(f);
                    return g.dom
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require,
        a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.api.HybridAction", "ephox.compass.Arr ephox.pastiche.engine.Pipeless ephox.pastiche.engine.Pipeline ephox.sugar.api.Element ephox.sugar.api.Html ephox.sugar.api.Remove ephox.sugar.api.Traverse".split(" "), function(a, b, c, e, d, f, g) {
            return {
                removal: function(a) {
                    return function(c) {
                        b.remover(c, a)
                    }
                },
                unwrapper: function(a) {
                    return function(c) {
                        b.unwrapper(c, a)
                    }
                },
                transformer: function(a) {
                    return function(c) {
                        b.transformer(c, a)
                    }
                },
                validate: function() {
                    return function(a) {
                        b.validator(a)
                    }
                },
                pipeline: function(a) {
                    return function(b) {
                        var e = d.get(b),
                            n = g.owner(b),
                            e = c.run(n.dom(), e, a);
                        f.empty(b);
                        b.dom().appendChild(e)
                    }
                },
                isWordContent: function(a, b) {
                    return 0 <= a.indexOf("<o:p>") || b.browser.isSpartan() && 0 <= a.indexOf('v:shapes="') || b.browser.isSpartan() && 0 <= a.indexOf("mso-") || 0 <= a.indexOf("mso-list") || 0 <= a.indexOf("p.MsoNormal, li.MsoNormal, div.MsoNormal") || 0 <= a.indexOf("MsoListParagraphCxSpFirst") || 0 <= a.indexOf("<w:WordDocument>")
                },
                go: function(b, c, f) {
                    var g = e.fromTag("div", b.dom());
                    g.dom().innerHTML =
                        c;
                    a.each(f, function(a) {
                        a(g)
                    });
                    return d.get(g)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.api.PipelineFilter", ["ephox.compass.Arr", "ephox.pastiche.engine.Token"], function(a, b) {
            return function(c, e, d) {
                return function(d, g, h) {
                    var m = function(a) {
                            d.receive(a)
                        },
                        p = function(a, c) {
                            return b.token(c, a.type() === b.END_ELEMENT_TYPE, {})
                        },
                        q = {
                            emit: m,
                            emitTokens: function(b) {
                                a.each(b, m)
                            },
                            receive: function(a) {
                                c(q, a, p)
                            },
                            document: window.document
                        };
                    e(q);
                    return q
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.engine.TokenUtil", "ephox.pastiche.cleanup.StyleAccess ephox.pastiche.engine.Token ephox.peanut.Fun ephox.sugar.api.Attr ephox.sugar.api.Css ephox.sugar.api.Element".split(" "), function(a, b, c, e, d, f) {
            return {
                getAttribute: function(a, b) {
                    var c = f.fromDom(a.getNode());
                    return e.get(c, b)
                },
                getStyle: function(a, b) {
                    var c = f.fromDom(a.getNode());
                    return d.get(c, b)
                },
                isWhitespace: function(a) {
                    return a.type() ===
                        b.TEXT_TYPE && /^[\s\u00A0]*$/.test(a.text())
                },
                getMsoList: function(b) {
                    b = f.fromDom(b.getNode());
                    return a.scan(b, ["mso-list"], c.constant(!1))["mso-list"]
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.list.detect.ListGuess", ["ephox.compass.Arr", "ephox.perhaps.Option"], function(a, b) {
            var c = function(a, b, c) {
                return a === b || a && b && a.tag === b.tag && a.type === b.type && (c || a.variant === b.variant)
            };
            return {
                guessFrom: function(e, d) {
                    var f = a.find(e, function(a) {
                        return "UL" ===
                            a.tag || d && c(a, d, !0)
                    });
                    return void 0 !== f ? b.some(f) : 0 < e.length ? b.some(e[0]) : b.none()
                },
                eqListType: c
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.list.state.Transitions", [], function() {
            var a = function(a, b) {
                    if (void 0 === a || void 0 === b) throw console.trace(), "brick";
                    a.nextFilter.set(b)
                },
                b = function(a, b, d) {
                    b.nextFilter.get()(a, b, d)
                };
            return {
                next: a,
                go: b,
                jump: function(c) {
                    return function(e, d, f) {
                        a(d, c);
                        b(e, d, f)
                    }
                },
                isNext: function(a, b) {
                    return a.nextFilter.get() ===
                        b
                },
                setNext: function(b) {
                    return function(e, d, f) {
                        a(d, b)
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.list.stage.DataListState", "ephox.compass.Arr ephox.pastiche.engine.TokenUtil ephox.pastiche.list.detect.ListGuess ephox.pastiche.list.state.Transitions ephox.peanut.Fun ephox.scullion.Struct ephox.sugar.api.Attr ephox.sugar.api.Element".split(" "), function(a, b, c, e, d, f, g, h) {
            var m = f.immutable("level", "token", "type"),
                p = function(d,
                             e, f, g) {
                    d = f.getCurrentListType();
                    f = f.getCurrentLevel() == g.level() ? d : null;
                    return c.guessFrom(g.emblems(), f).filter(function(c) {
                        if (c = "OL" === c.tag) c = !a.contains(["P"], e.tag()) || /^MsoHeading/.test(b.getAttribute(e, "class"));
                        return !c
                    })
                };
            return {
                predicate: function(a, b) {
                    return g.has(h.fromDom(b.getNode()), "data-list-level")
                },
                action: function(a) {
                    return function(b, c, f) {
                        b = h.fromDom(f.getNode());
                        var n = parseInt(g.get(b, "data-list-level"), 10),
                            k = g.get(b, "data-list-emblems"),
                            k = JSON.parse(k);
                        g.remove(b, "data-list-level");
                        g.remove(b, "data-list-emblems");
                        b = {
                            level: d.constant(n),
                            emblems: d.constant(k)
                        };
                        b.level();
                        c.originalToken.set(f);
                        p(c.listType.get(), f, c.emitter, b).each(c.listType.set);
                        f = m(b.level(), c.originalToken.get(), c.listType.get());
                        c.emitter.openItem(f.level(), f.token(), f.type());
                        e.next(c, a.inside())
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.list.stage.Handler", ["ephox.peanut.Fun"], function(a) {
            return function(b, c, e) {
                return {
                    pred: b,
                    action: c,
                    label: a.constant(e)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.list.stage.Handlers", ["ephox.compass.Arr", "ephox.peanut.Fun", "ephox.perhaps.Option"], function(a, b, c) {
            var e = function(a, b) {
                return function(a, c, d) {
                    return b(a, c, d)
                }
            };
            return function(d, f, g) {
                var h = e(d + " :: FALLBACK --- ", g);
                g = function(g, p, q) {
                    c.from(a.find(f, function(a) {
                        return a.pred(p, q)
                    })).fold(b.constant(h), function(a) {
                        var b = a.label();
                        return void 0 === b ? a.action : e(d +
                            " :: " + b, a.action)
                    })(g, p, q)
                };
                g.toString = function() {
                    return "Handlers for " + d
                };
                return g
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.list.stage.ListStages", "ephox.pastiche.list.stage.DataListState ephox.pastiche.engine.Token ephox.pastiche.engine.TokenUtil ephox.pastiche.list.stage.Handler ephox.pastiche.list.stage.Handlers ephox.pastiche.list.state.Transitions".split(" "), function(a, b, c, e, d, f) {
            return {
                inside: function(a) {
                    return d("Inside.List.Item", [e(function(a, c) {
                        return c.type() === b.END_ELEMENT_TYPE && a.originalToken.get() && c.tag() === a.originalToken.get().tag()
                    }, function(b, c, d) {
                        f.next(c, a.outside())
                    }, "Closing open tag")], function(a, b, c) {
                        a.emit(c)
                    })
                },
                outside: function(g) {
                    return d("Outside.List.Item", [e(a.predicate, a.action(g), "Data List ****"), e(function(a, d) {
                        return d.type() === b.TEXT_TYPE && c.isWhitespace(d)
                    }, function(a, b, c) {
                        a.emit(c)
                    }, "Whitespace")], function(a, b, c) {
                        b.emitter.closeAllLists();
                        a.emit(c);
                        f.next(b, g.outside())
                    })
                }
            }
        })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.list.emit.Emission", ["ephox.scullion.Struct"], function(a) {
            var b = a.immutable("state", "result"),
                c = a.immutable("state", "value");
            return {
                state: a.immutable("level", "type", "types", "items"),
                value: c,
                result: b
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.list.emit.ItemStack", ["ephox.pastiche.list.emit.Emission", "ephox.perhaps.Option"], function(a, b) {
            return {
                start: function(c,
                                e) {
                    var d = c.items().slice(0),
                        f = void 0 !== e && "P" !== e ? b.some(e) : b.none();
                    f.fold(function() {
                        d.push("P")
                    }, function(a) {
                        d.push(a)
                    });
                    var g = a.state(c.level(), c.type(), c.types(), d);
                    return a.value(g, f)
                },
                finish: function(c) {
                    var e = c.items().slice(0);
                    if (0 < e.length && "P" !== e[e.length - 1]) {
                        var d = e[e.length - 1];
                        e[e.length - 1] = "P";
                        c = a.state(c.level(), c.type(), c.types(), e);
                        return a.value(c, b.some(d))
                    }
                    return a.value(c, b.none())
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a,
              k, l) {
        a("ephox.pastiche.list.emit.ListLevels", ["ephox.pastiche.list.emit.Emission"], function(a) {
            var b = function(b, e, d) {
                for (var f = []; e(b);) {
                    var g = d(b);
                    b = g.state();
                    f = f.concat(g.result())
                }
                return a.result(b, f)
            };
            return {
                moveRight: function(a, e, d) {
                    return b(a, function(a) {
                        return a.level() < e
                    }, d)
                },
                moveLeft: function(a, e, d) {
                    return b(a, function(a) {
                        return a.level() > e
                    }, d)
                },
                moveUntil: b
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.list.emit.ListItemStyles", ["ephox.pastiche.engine.TokenUtil"], function(a) {
            return {
                from: function(b) {
                    var c = {
                        "list-style-type": "none"
                    };
                    b ? (b = a.getStyle(b, "margin-left"), b = void 0 !== b && "0px" !== b ? {
                        "margin-left": b
                    } : {}) : b = c;
                    return b
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.list.emit.ListTokens", "ephox.pastiche.cleanup.Cleaners ephox.pastiche.engine.Token ephox.pastiche.list.detect.ListGuess ephox.pastiche.list.emit.Emission ephox.pastiche.list.emit.ItemStack ephox.pastiche.list.emit.ListItemStyles ephox.peanut.Fun".split(" "),
            function(a, b, c, e, d, f, g) {
                var h = function(a, c, d) {
                        var f = c.start && 1 < c.start ? {
                                start: c.start
                            } : {},
                            n = a.level() + 1,
                            h = a.types().concat([c]);
                        d = [g.curry(b.createStartElement, c.tag, f, d)];
                        a = e.state(n, c, h, a.items());
                        return e.result(a, d)
                    },
                    m = function(a) {
                        var c = a.types().slice(0),
                            d = [g.curry(b.createEndElement, c.pop().tag)],
                            f = a.level() - 1;
                        a = e.state(f, c[c.length - 1], c, a.items());
                        return e.result(a, d)
                    },
                    p = function(a, b) {
                        var c = m(a),
                            d = h(c.state(), b, b.type ? {
                                "list-style-type": b.type
                            } : {});
                        return e.result(d.state(), c.result().concat(d.result()))
                    };
                return {
                    open: h,
                    openItem: function(h, m, k) {
                        var l = f.from(m);
                        h = h.type() && !c.eqListType(h.type(), k) ? p(h, k) : e.result(h, []);
                        l = [g.curry(b.createStartElement, "LI", {}, l)];
                        k = d.start(h.state(), m && m.tag());
                        var r = k.value().map(function(b) {
                            a.styleDom(m.getNode(), g.constant(!0));
                            return [g.constant(m)]
                        }).getOr([]);
                        return e.result(k.state(), h.result().concat(l).concat(r))
                    },
                    close: m,
                    closeItem: function(a) {
                        var c = g.curry(b.createEndElement, "LI");
                        a = d.finish(a);
                        var f = a.value().fold(function() {
                            return [c]
                        }, function(a) {
                            return [g.curry(b.createEndElement,
                                a), c]
                        });
                        return e.result(a.state(), f)
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.list.emit.ListModel", "ephox.compass.Arr ephox.pastiche.engine.Token ephox.pastiche.list.emit.Emission ephox.pastiche.list.emit.ItemStack ephox.pastiche.list.emit.ListLevels ephox.pastiche.list.emit.ListTokens ephox.peanut.Fun ephox.perhaps.Option".split(" "), function(a, b, c, e, d, f, g, h) {
            var m = function(b) {
                    if (0 === b.length) throw "Compose must have at least one element in the list";
                    var d = b[b.length - 1];
                    b = a.bind(b, function(a) {
                        return a.result()
                    });
                    return c.result(d.state(), b)
                },
                p = function(a) {
                    a = f.closeItem(a);
                    var b = f.close(a.state());
                    return m([a, b])
                },
                q = function(a, b, c, e) {
                    return d.moveRight(a, c, function(a) {
                        var d = a.level() === c - 1 && b.type ? {
                            "list-style-type": b.type
                        } : {};
                        a = f.open(a, b, d);
                        d = f.openItem(a.state(), a.state().level() == c ? e : void 0, b);
                        return m([a, d])
                    })
                },
                k = function(a, b) {
                    return d.moveLeft(a, b, p)
                },
                l = function(a, d, f, n) {
                    var m = 1 < f ? e.finish(a) : c.value(a, h.none());
                    a = m.value().map(function(a) {
                        return [g.curry(b.createEndElement,
                            a)]
                    }).getOr([]);
                    m.state().level();
                    d = q(m.state(), d, f, n);
                    return c.result(d.state(), a.concat(d.result()))
                };
            return {
                openItem: function(a, b, d, e) {
                    a = a.level() > b ? k(a, b) : c.result(a, []);
                    a.state().level() === b ? (b = a.state(), b = 0 < b.level() ? f.closeItem(b) : c.result(b, []), d = f.openItem(b.state(), d, e), d = m([b, d])) : d = l(a.state(), e, b, d);
                    return m([a, d])
                },
                closeAllLists: k
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.list.emit.Emitter", ["ephox.compass.Arr",
            "ephox.pastiche.list.emit.Emission", "ephox.pastiche.list.emit.ListModel"
        ], function(a, b, c) {
            var e = ["disc", "circle", "square"];
            return function(d, f) {
                var g = b.state(0, void 0, [], []),
                    h = function(b) {
                        a.each(b.result(), function(a) {
                            a = a(f);
                            d.emit(a)
                        })
                    };
                return {
                    closeAllLists: function() {
                        var a = c.closeAllLists(g, 0);
                        g = a.state();
                        h(a)
                    },
                    openItem: function(a, b, d) {
                        d && ("UL" === d.tag && e[a - 1] === d.type && (d = {
                            tag: "UL"
                        }), a = c.openItem(g, a, b, d), g = a.state(), h(a))
                    },
                    getCurrentListType: function() {
                        return g.type()
                    },
                    getCurrentLevel: function() {
                        return g.level()
                    }
                }
            }
        })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.list.state.ListState", ["ephox.pastiche.list.emit.Emitter", "ephox.peanut.Fun", "ephox.scullion.Cell"], function(a, b, c) {
            var e = {
                    getCurrentListType: function() {
                        return d().getCurrentListType()
                    },
                    getCurrentLevel: function() {
                        return d().getCurrentLevel()
                    },
                    closeAllLists: function() {
                        return d().closeAllLists.apply(void 0, arguments)
                    },
                    openItem: function() {
                        return d().openItem.apply(void 0, arguments)
                    }
                },
                d = function() {
                    return {
                        getCurrentListType: b.constant({}),
                        getCurrentLevel: b.constant(1),
                        closeAllLists: b.identity,
                        openItem: b.identity
                    }
                };
            return function(f) {
                var g = c(f),
                    h = c(null),
                    m = c(null);
                return {
                    reset: function(c) {
                        g.set(f);
                        h.set(null);
                        m.set(null);
                        _emitter = a(c, c.document);
                        d = b.constant(_emitter)
                    },
                    nextFilter: g,
                    originalToken: h,
                    listType: m,
                    emitter: e
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.list.state.TextInStyle", ["ephox.pastiche.engine.Token"], function(a) {
            return function() {
                var b = !1,
                    c = "";
                return {
                    check: function(e) {
                        return b && e.type() === a.TEXT_TYPE ? (c += e.text(), !0) : e.type() === a.START_ELEMENT_TYPE && "STYLE" === e.tag() ? b = !0 : e.type() === a.END_ELEMENT_TYPE && "STYLE" === e.tag() ? (b = !1, !0) : !1
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.filter.Lists", "ephox.pastiche.api.PipelineFilter ephox.pastiche.list.stage.ListStages ephox.pastiche.list.state.ListState ephox.pastiche.list.state.TextInStyle ephox.pastiche.list.state.Transitions global!document".split(" "),
            function(a, b, c, e, d, f) {
                f = {
                    inside: function() {
                        return h
                    },
                    outside: function() {
                        return m
                    }
                };
                var g = e(),
                    h = b.inside(f),
                    m = b.outside(f),
                    p = c(m);
                return a(function(a, b, c) {
                    g.check(b) || d.go(a, p, b)
                }, p.reset, "list.filters")
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.list.detect.EmblemDetection", ["ephox.compass.Arr", "ephox.highway.Merger", "global!isNaN", "global!parseInt"], function(a, b, c, e) {
            var d = [{
                    regex: /^\(?[dc][\.\)]$/,
                    type: {
                        tag: "OL",
                        type: "lower-alpha"
                    }
                }, {
                    regex: /^\(?[DC][\.\)]$/,
                    type: {
                        tag: "OL",
                        type: "upper-alpha"
                    }
                }, {
                    regex: /^\(?M*(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})[\.\)]$/,
                    type: {
                        tag: "OL",
                        type: "upper-roman"
                    }
                }, {
                    regex: /^\(?m*(cm|cd|d?c{0,3})(xc|xl|l?x{0,3})(ix|iv|v?i{0,3})[\.\)]$/,
                    type: {
                        tag: "OL",
                        type: "lower-roman"
                    }
                }, {
                    regex: /^\(?[0-9]+[\.\)]$/,
                    type: {
                        tag: "OL"
                    }
                }, {
                    regex: /^([0-9]+\.)*[0-9]+\.?$/,
                    type: {
                        tag: "OL",
                        variant: "outline"
                    }
                }, {
                    regex: /^\(?[a-z]+[\.\)]$/,
                    type: {
                        tag: "OL",
                        type: "lower-alpha"
                    }
                }, {
                    regex: /^\(?[A-Z]+[\.\)]$/,
                    type: {
                        tag: "OL",
                        type: "upper-alpha"
                    }
                }],
                f = {
                    "\u2022": {
                        tag: "UL",
                        type: "disc"
                    },
                    "\u00b7": {
                        tag: "UL",
                        type: "disc"
                    },
                    "\u00a7": {
                        tag: "UL",
                        type: "square"
                    }
                },
                g = {
                    o: {
                        tag: "UL",
                        type: "circle"
                    },
                    "-": {
                        tag: "UL",
                        type: "disc"
                    },
                    "\u25cf": {
                        tag: "UL",
                        type: "disc"
                    },
                    "\ufffd": {
                        tag: "UL",
                        type: "circle"
                    }
                },
                h = function(a, b) {
                    return void 0 !== a.variant ? a.variant : "(" === b.charAt(0) ? "()" : ")" === b.charAt(b.length - 1) ? ")" : "."
                },
                m = function(a) {
                    var b = a.split(".");
                    0 === b.length ? b = a : (a = b[b.length - 1], b = 0 === a.length && 1 < b.length ? b[b.length - 2] : a);
                    b = e(b, 10);
                    return c(b) ? {} : {
                        start: b
                    }
                };
            return {
                extract: function(c,
                                  e) {
                    var k = g[c] ? [g[c]] : [],
                        l = e && f[c] ? [f[c]] : e ? [{
                            tag: "UL",
                            variant: c
                        }] : [],
                        r = a.bind(d, function(a) {
                            return a.regex.test(c) ? [b.merge(a.type, m(c), {
                                variant: h(a.type, c)
                            })] : []
                        }),
                        k = k.concat(l).concat(r);
                    return a.map(k, function(a) {
                        return void 0 !== a.variant ? a : b.merge(a, {
                            variant: c
                        })
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.TextContent", [], function() {
            return {
                get: function(a) {
                    return a.dom().textContent
                },
                set: function(a, b) {
                    a.dom().textContent =
                        b
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.list.detect.ListDetectors", "ephox.compass.Arr ephox.pastiche.list.detect.EmblemDetection ephox.pastiche.cleanup.StyleAccess ephox.peanut.Fun ephox.perhaps.Option ephox.sugar.api.Css ephox.sugar.api.Html ephox.sugar.api.Node ephox.sugar.api.PredicateFind ephox.sugar.api.TextContent ephox.sugar.api.Traverse global!Math global!isNaN global!parseInt".split(" "), function(a, b, c, e, d, f,
                                                                                                                                                                                                                                                                                                                                                                                                             g, h, m, p, q, k, l, r) {
            var v = function(a) {
                    return c.scan(a, ["mso-list"], e.constant(!1))["mso-list"]
                },
                u = function(b) {
                    return h.isElement(b) && f.getRaw(b, "font-family").exists(function(b) {
                            return a.contains(["wingdings", "symbol"], b.toLowerCase())
                        })
                };
            return {
                getMsoList: v,
                extractLevel: function(a) {
                    a = v(a);
                    return (a = / level([0-9]+)/.exec(a)) && a[1] ? d.some(r(a[1], 10)) : d.none()
                },
                extractEmblem: function(a, c) {
                    var e = p.get(a).trim(),
                        e = b.extract(e, c);
                    return 0 < e.length ? d.some(e) : d.none()
                },
                extractSymSpan: function(a) {
                    return m.child(a,
                        u)
                },
                extractMsoIgnore: function(a) {
                    return m.descendant(a, function(a) {
                        return !!(h.isElement(a) ? c.scan(a, ["mso-list"], e.constant(!1)) : [])["mso-list"]
                    })
                },
                extractCommentSpan: function(a) {
                    return m.child(a, h.isComment).bind(q.nextSibling).filter(function(a) {
                        return "span" === h.name(a)
                    })
                },
                isSymbol: u,
                deduceLevel: function(a) {
                    return f.getRaw(a, "margin-left").bind(function(a) {
                        a = r(a, 10);
                        return l(a) ? d.none() : d.some(k.max(1, k.ceil(a / 18)))
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    a.bolt.module.api.define("global!JSON", [], function() {
        return JSON
    });
    (function(a, k, l) {
        a("ephox.pastiche.list.detect.ListFormats", "ephox.compass.Arr ephox.pastiche.list.detect.ListDetectors ephox.perhaps.Option ephox.sugar.api.Attr ephox.sugar.api.Comments ephox.sugar.api.Node ephox.sugar.api.Remove ephox.sugar.api.Traverse global!JSON global!parseInt".split(" "), function(a, b, c, e, d, f, g, h, m, p) {
            var q = function(b, f, h, p) {
                    e.set(b, "data-list-level", f);
                    f = m.stringify(h);
                    e.set(b, "data-list-emblems", f);
                    f = d.find(b,
                        c.none());
                    a.each(f, g.remove);
                    a.each(p, g.remove);
                    e.remove(b, "style");
                    e.remove(b, "class")
                },
                k = function(a) {
                    return b.extractLevel(a).bind(function(c) {
                        return b.extractSymSpan(a).bind(function(d) {
                            return b.extractEmblem(d, !0).map(function(b) {
                                return {
                                    mutate: function() {
                                        q(a, c, b, [d])
                                    }
                                }
                            })
                        })
                    })
                },
                l = function(a) {
                    return b.extractLevel(a).bind(function(c) {
                        return b.extractCommentSpan(a).bind(function(d) {
                            return b.extractEmblem(d, b.isSymbol(d)).map(function(b) {
                                return {
                                    mutate: function() {
                                        q(a, c, b, [d])
                                    }
                                }
                            })
                        })
                    })
                },
                r = function(a) {
                    return b.extractLevel(a).bind(function(c) {
                        return b.extractCommentSpan(a).bind(function(d) {
                            return b.extractEmblem(d,
                                b.isSymbol(d)).map(function(b) {
                                return {
                                    mutate: function() {
                                        q(a, c, b, [d])
                                    }
                                }
                            })
                        })
                    })
                },
                v = function(a) {
                    return "p" !== f.name(a) ? c.none() : b.extractLevel(a).bind(function(c) {
                        return b.extractMsoIgnore(a).bind(function(d) {
                            return b.extractEmblem(d, !1).map(function(b) {
                                return {
                                    mutate: function() {
                                        q(a, c, b, [h.parent(d).getOr(d)])
                                    }
                                }
                            })
                        })
                    })
                },
                u = function(a) {
                    return "p" !== f.name(a) ? c.none() : b.extractMsoIgnore(a).bind(function(c) {
                        var d = h.parent(c).getOr(c),
                            e = b.isSymbol(d);
                        return b.extractEmblem(c, e).bind(function(c) {
                            return b.deduceLevel(a).map(function(b) {
                                return {
                                    mutate: function() {
                                        q(a,
                                            b, c, [d])
                                    }
                                }
                            })
                        })
                    })
                };
            return {
                find: function(a) {
                    return k(a).orThunk(function() {
                        return l(a)
                    }).orThunk(function() {
                        return r(a)
                    }).orThunk(function() {
                        return v(a)
                    }).orThunk(function() {
                        return u(a)
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.api.ListHandling", ["ephox.pastiche.api.HybridAction", "ephox.pastiche.filter.Lists", "ephox.pastiche.list.detect.ListFormats", "ephox.violin.StringMatch"], function(a, b, c, e) {
            a = a.transformer({
                tags: [{
                    name: e.pattern(/^(p|h\d+)$/),
                    mutate: function(a) {
                        c.find(a).each(function(a) {
                            a.mutate()
                        })
                    }
                }]
            });
            return {
                filter: b,
                preprocess: a
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.PredicateExists", ["ephox.sugar.api.PredicateFind"], function(a) {
            return {
                any: function(b) {
                    return a.first(b).isSome()
                },
                ancestor: function(b, c, e) {
                    return a.ancestor(b, c, e).isSome()
                },
                closest: function(b, c, e) {
                    return a.closest(b, c, e).isSome()
                },
                sibling: function(b, c) {
                    return a.sibling(b, c).isSome()
                },
                child: function(b,
                                c) {
                    return a.child(b, c).isSome()
                },
                descendant: function(b, c) {
                    return a.descendant(b, c).isSome()
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.api.RuleConditions", ["ephox.compass.Arr", "ephox.sugar.api.Attr", "ephox.sugar.api.Html", "ephox.sugar.api.Node", "ephox.sugar.api.PredicateExists"], function(a, b, c, e, d) {
            var f = function(a) {
                    var b = a.dom().attributes,
                        b = void 0 !== b && null !== b && 0 < b.length;
                    return "span" === e.name(a) ? b : !0
                },
                g = function(a) {
                    return void 0 ===
                    a.dom().attributes || null === a.dom().attributes ? !0 : 0 === a.dom().attributes.length || 1 === a.dom().attributes.length && "style" === a.dom().attributes[0].name
                };
            return {
                isNotImage: function(a) {
                    return "img" !== e.name(a)
                },
                hasContent: function(b) {
                    return g(b) ? f(b) && d.descendant(b, function(b) {
                        var c = !g(b),
                            d = !a.contains("font em strong samp acronym cite code dfn kbd tt b i u s sub sup ins del var span".split(" "), e.name(b));
                        return e.isText(b) || c || d
                    }) : !0
                },
                isList: function(a) {
                    return "ol" === e.name(a) || "ul" === e.name(a)
                },
                isLocal: function(a) {
                    a =
                        b.get(a, "src");
                    return /^file:/.test(a)
                },
                hasNoAttributes: g,
                isEmpty: function(a) {
                    return 0 === c.get(a).length
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.bud.Unicode", [], function() {
            return {
                zeroWidth: function() {
                    return "\u200b"
                },
                trimNative: function(a) {
                    return a.replace(/\u200B/, "").trim()
                },
                trimWithRegex: function(a) {
                    return a.replace(/^\s+|\s+$/g, "").replace(/\u200B/, "")
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.Text", ["ephox.sugar.api.Node", "ephox.sugar.impl.NodeValue"], function(a, b) {
            var c = b(a.isText, "text");
            return {
                get: function(a) {
                    return c.get(a)
                },
                getOption: function(a) {
                    return c.getOption(a)
                },
                set: function(a, b) {
                    c.set(a, b)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.pastiche.api.RuleMutations", "ephox.bud.Unicode ephox.compass.Arr ephox.compass.Obj ephox.perhaps.Option ephox.sugar.api.Attr ephox.sugar.api.Css ephox.sugar.api.Element ephox.sugar.api.Html ephox.sugar.api.Insert ephox.sugar.api.InsertAll ephox.sugar.api.Node ephox.sugar.api.Remove ephox.sugar.api.Text ephox.sugar.api.Traverse".split(" "),
            function(a, b, c, e, d, f, g, h, m, p, k, l, r, t) {
                var v = function(a, c) {
                        var d = g.fromTag(a);
                        m.before(c, d);
                        var e = c.dom().attributes;
                        b.each(e, function(a) {
                            d.dom().setAttribute(a.name, a.value)
                        });
                        e = t.children(c);
                        p.append(d, e);
                        l.remove(c);
                        return d
                    },
                    u = function(b) {
                        return t.prevSibling(b).bind(function(b) {
                            return k.isText(b) && 0 === a.trimNative(r.get(b)).length ? u(b) : "li" === k.name(b) ? e.some(b) : e.none()
                        })
                    };
                return {
                    changeTag: v,
                    addBrTag: function(a) {
                        0 === h.get(a).length && m.append(a, g.fromTag("br"))
                    },
                    properlyNest: function(a) {
                        t.parent(a).each(function(c) {
                            c =
                                k.name(c);
                            b.contains(["ol", "ul"], c) && u(a).fold(function() {
                                var b = g.fromTag("li");
                                f.set(b, "list-style-type", "none");
                                m.wrap(a, b)
                            }, function(b) {
                                m.append(b, a)
                            })
                        })
                    },
                    fontToSpan: function(a) {
                        var b = v("span", a),
                            e = {
                                "font-size": {
                                    1: "8pt",
                                    2: "10pt",
                                    3: "12pt",
                                    4: "14pt",
                                    5: "18pt",
                                    6: "24pt",
                                    7: "36pt"
                                }
                            };
                        c.each({
                            face: "font-family",
                            size: "font-size",
                            color: "font-color"
                        }, function(a, c) {
                            if (d.has(b, c)) {
                                var g = d.get(b, c);
                                f.set(b, a, void 0 !== e[a] && void 0 !== e[a][g] ? e[a][g] : g);
                                d.remove(b, c)
                            }
                        })
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require,
        a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.limbo.process.Strategies", "ephox.pastiche.api.HtmlPatterns ephox.pastiche.api.HybridAction ephox.pastiche.api.ListHandling ephox.pastiche.api.RuleConditions ephox.pastiche.api.RuleMutations ephox.peanut.Fun ephox.sugar.api.Class ephox.sugar.api.Css ephox.violin.StringMatch".split(" "), function(a, b, c, e, d, f, g, h, m) {
            var p = b.unwrapper({
                tags: [{
                    name: m.pattern(/^([OVWXP]|U[0-9]+|ST[0-9]+):/i)
                }]
            });
            c = [b.pipeline([c.filter])];
            var k = b.removal({
                    attributes: [{
                        name: m.pattern(/^v:/)
                    }, {
                        name: m.exact("href"),
                        value: m.contains("#_toc")
                    }, {
                        name: m.exact("href"),
                        value: m.contains("#_mso")
                    }, {
                        name: m.pattern(/^xmlns(:|$)/)
                    }, {
                        name: m.exact("type"),
                        condition: e.isList
                    }]
                }),
                l = b.removal({
                    tags: [{
                        name: m.exact("script")
                    }, {
                        name: m.exact("meta")
                    }, {
                        name: m.exact("link")
                    }, {
                        name: m.exact("style"),
                        condition: e.isEmpty
                    }],
                    attributes: [{
                        name: m.starts("on")
                    }, {
                        name: m.exact('"')
                    }, {
                        name: m.exact("id")
                    }, {
                        name: m.exact("name")
                    }, {
                        name: m.exact("lang")
                    }, {
                        name: m.exact("language")
                    }],
                    styles: [{
                        name: m.all(),
                        value: m.pattern(/OLE_LINK/i)
                    }]
                }),
                r = b.removal({
                    styles: [{
                        name: m.not(m.pattern(/width|height|list-style-type/)),
                        condition: function(a) {
                            return !g.has(a, "ephox-limbo-transform")
                        }
                    }, {
                        name: m.pattern(/width|height/),
                        condition: e.isNotImage
                    }]
                }),
                t = b.removal({
                    classes: [{
                        name: m.not(m.exact("rtf-data-image"))
                    }]
                }),
                v = b.removal({
                    styles: [{
                        name: m.pattern(a.validStyles())
                    }]
                }),
                u = b.removal({
                    classes: [{
                        name: m.pattern(/mso/i)
                    }]
                }),
                w = b.unwrapper({
                    tags: [{
                        name: m.exact("img"),
                        condition: e.isLocal
                    }, {
                        name: m.exact("a"),
                        condition: e.hasNoAttributes
                    }]
                }),
                x = b.unwrapper({
                    tags: [{
                        name: m.exact("a"),
                        condition: e.hasNoAttributes
                    }]
                }),
                z = b.removal({
                    attributes: [{
                        name: m.exact("style"),
                        value: m.exact(""),
                        debug: !0
                    }]
                }),
                A = b.removal({
                    attributes: [{
                        name: m.exact("class"),
                        value: m.exact(""),
                        debug: !0
                    }]
                });
            a = b.unwrapper({
                tags: [{
                    name: m.pattern(a.specialInline()),
                    condition: f.not(e.hasContent)
                }]
            });
            e = b.transformer({
                tags: [{
                    name: m.exact("p"),
                    mutate: d.addBrTag
                }]
            });
            var B = b.transformer({
                    tags: [{
                        name: m.pattern(/ol|ul/),
                        mutate: d.properlyNest
                    }]
                }),
                G = b.transformer({
                    tags: [{
                        name: m.exact("b"),
                        mutate: f.curry(d.changeTag, "strong")
                    }, {
                        name: m.exact("i"),
                        mutate: f.curry(d.changeTag, "em")
                    }, {
                        name: m.exact("u"),
                        mutate: function(a) {
                            a = d.changeTag("span", a);
                            g.add(a, "ephox-limbo-transform");
                            h.set(a, "text-decoration", "underline")
                        }
                    }, {
                        name: m.exact("s"),
                        mutate: f.curry(d.changeTag, "strike")
                    }, {
                        name: m.exact("font"),
                        mutate: d.fontToSpan,
                        debug: !0
                    }]
                }),
                D = b.removal({
                    classes: [{
                        name: m.exact("ephox-limbo-transform")
                    }]
                });
            b = b.removal({
                attributes: [{
                    name: m.exact("href"),
                    value: m.starts("file:///"),
                    debug: !0
                }]
            });
            return {
                unwrapWordTags: p,
                removeWordAttributes: k,
                parseLists: c,
                removeExcess: l,
                cleanStyles: r,
                cleanClasses: t,
                mergeStyles: v,
                mergeClasses: u,
                removeLocalImages: w,
                removeVacantLinks: x,
                removeEmptyStyle: z,
                removeEmptyClass: A,
                pruneInlineTags: a,
                addPlaceholders: e,
                nestedListFixes: B,
                inlineTagFixes: G,
                cleanupFlags: D,
                removeLocalLinks: b,
                none: f.noop
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.limbo.process.PasteFilters", "ephox.compass.Arr ephox.limbo.api.RtfImage ephox.limbo.process.Strategies ephox.pastiche.api.HybridAction ephox.pastiche.api.ListHandling ephox.pastiche.api.PipelineFilter ephox.peanut.Fun ephox.sugar.api.Element".split(" "),
            function(a, b, c, e, d, f, g, h) {
                var m = function(a) {
                        return a.browser.isIE() && 11 <= a.browser.version.major
                    },
                    p = function(a) {
                        return f(function(b, c, d) {
                            var e = a(h.fromDom(c.getNode())).fold(function() {
                                return c
                            }, function(a) {
                                return d(c, a.dom())
                            });
                            b.emit(e)
                        }, g.noop, "image filters")
                    },
                    k = function(a, b, d) {
                        a = [c.mergeStyles, c.mergeClasses];
                        d = [c.cleanStyles, c.cleanClasses];
                        return b ? a : d
                    },
                    l = function(a, b, c) {
                        return m(c) || !a ? [] : [d.preprocess]
                    },
                    r = function(a, b, d) {
                        if (!a) return [c.none];
                        a = [c.unwrapWordTags];
                        d = m(d) ? [] : c.parseLists;
                        return a.concat(d).concat([c.removeWordAttributes])
                    };
                return {
                    derive: function(d, f, g) {
                        var h, x;
                        x = g.browser.isFirefox() || g.browser.isSpartan() ? b.local : b.vshape;
                        h = m(g) ? c.none : e.pipeline([p(x)]);
                        h = [d ? h : c.none];
                        x = [x === b.local ? c.none : c.removeLocalImages];
                        return a.flatten([l(d, f, g), h, [c.inlineTagFixes], r(d, f, g), [c.nestedListFixes],
                            [c.removeExcess], x, k(d, f, g), [c.removeLocalLinks, c.removeVacantLinks],
                            [c.removeEmptyStyle],
                            [c.removeEmptyClass],
                            [c.pruneInlineTags],
                            [c.addPlaceholders],
                            [c.cleanupFlags]
                        ])
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.boss.common.TagBoundaries", [], function() {
            return "body p div article aside figcaption figure footer header nav section ol ul li table thead tbody tfoot caption tr td th h1 h2 h3 h4 h5 h6 blockquote pre address".split(" ")
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.boss.api.DomUniverse", "ephox.boss.common.TagBoundaries ephox.compass.Arr ephox.peanut.Fun ephox.sugar.api.Attr ephox.sugar.api.Compare ephox.sugar.api.Css ephox.sugar.api.Element ephox.sugar.api.Insert ephox.sugar.api.InsertAll ephox.sugar.api.Node ephox.sugar.api.PredicateFilter ephox.sugar.api.PredicateFind ephox.sugar.api.Remove ephox.sugar.api.SelectorFilter ephox.sugar.api.SelectorFind ephox.sugar.api.Text ephox.sugar.api.Traverse".split(" "),
            function(a, b, c, e, d, f, g, h, m, p, k, l, r, t, v, u, w) {
                return function() {
                    return {
                        up: c.constant({
                            selector: v.ancestor,
                            closest: v.closest,
                            predicate: l.ancestor,
                            all: w.parents
                        }),
                        down: c.constant({
                            selector: t.descendants,
                            predicate: k.descendants
                        }),
                        styles: c.constant({
                            get: f.get,
                            getRaw: f.getRaw,
                            set: f.set,
                            remove: f.remove
                        }),
                        attrs: c.constant({
                            get: e.get,
                            set: e.set,
                            remove: e.remove,
                            copyTo: function(a, b) {
                                var c = e.clone(a);
                                e.setAll(b, c)
                            }
                        }),
                        insert: c.constant({
                            before: h.before,
                            after: h.after,
                            afterAll: m.after,
                            append: h.append,
                            appendAll: m.append,
                            prepend: h.prepend,
                            wrap: h.wrap
                        }),
                        remove: c.constant({
                            unwrap: r.unwrap,
                            remove: r.remove
                        }),
                        create: c.constant({
                            nu: g.fromTag,
                            clone: function(a) {
                                return g.fromDom(a.dom().cloneNode(!1))
                            },
                            text: g.fromText
                        }),
                        query: c.constant({
                            comparePosition: function(a, b) {
                                return a.dom().compareDocumentPosition(b.dom())
                            },
                            prevSibling: w.prevSibling,
                            nextSibling: w.nextSibling
                        }),
                        property: c.constant({
                            children: w.children,
                            name: p.name,
                            parent: w.parent,
                            isText: p.isText,
                            isElement: p.isElement,
                            getText: u.get,
                            setText: u.set,
                            isBoundary: function(c) {
                                return p.isElement(c) ?
                                    "body" === p.name(c) ? !0 : b.contains(a, p.name(c)) : !1
                            },
                            isEmptyTag: function(a) {
                                return p.isElement(a) ? b.contains(["br", "img", "hr"], p.name(a)) : !1
                            }
                        }),
                        eq: d.eq,
                        is: d.is
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.phoenix.api.data.NamedPattern", ["ephox.scullion.Struct"], function(a) {
            return a.immutable("word", "pattern")
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.phoenix.api.data.Spot", ["ephox.scullion.Struct"], function(a) {
            var b = a.immutable("element", "offset"),
                c = a.immutable("element", "deltaOffset"),
                e = a.immutable("element", "start", "finish"),
                d = a.immutable("begin", "end");
            a = a.immutable("element", "text");
            return {
                point: b,
                delta: c,
                range: e,
                points: d,
                text: a
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.phoenix.extract.TypedItem", ["ephox.peanut.Fun", "ephox.perhaps.Option"], function(a, b) {
            var c = a.constant(!1),
                e = a.constant(!0),
                d = function(d) {
                    return {
                        isBoundary: function() {
                            return d(e,
                                c, c)
                        },
                        fold: d,
                        toText: function() {
                            return d(b.none, b.none, function(a, c) {
                                return b.some(a)
                            })
                        },
                        is: function(a) {
                            return d(c, c, function(b, c) {
                                return c.eq(b, a)
                            })
                        },
                        len: function() {
                            return d(a.constant(0), a.constant(1), function(a, b) {
                                return b.property().getText(a).length
                            })
                        }
                    }
                };
            return {
                text: function(a, b) {
                    return d(function(c, d, e) {
                        return e(a, b)
                    })
                },
                boundary: function(a, b) {
                    return d(function(c, d, e) {
                        return c(a, b)
                    })
                },
                empty: function(a, b) {
                    return d(function(c, d, e) {
                        return d(a, b)
                    })
                },
                cata: function(a, b, c, d) {
                    return a.fold(b, c, d)
                }
            }
        })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.polaris.array.Boundaries", ["ephox.compass.Arr", "ephox.peanut.Fun"], function(a, b) {
            return {
                boundAt: function(c, e, d, f) {
                    e = a.findIndex(c, b.curry(f, e));
                    e = -1 < e ? e : 0;
                    d = a.findIndex(c, b.curry(f, d));
                    return c.slice(e, -1 < d ? d + 1 : c.length)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.polaris.array.Slice", ["ephox.compass.Arr"], function(a) {
            return {
                sliceby: function(b, c) {
                    var e = a.findIndex(b,
                        c);
                    return b.slice(0, e)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.polaris.api.Splitting", ["ephox.scullion.ADT"], function(a) {
            a = a.generate([{
                include: ["item"]
            }, {
                excludeWith: ["item"]
            }, {
                excludeWithout: ["item"]
            }]);
            return {
                include: a.include,
                excludeWith: a.excludeWith,
                excludeWithout: a.excludeWithout,
                cata: function(a, c, e, d) {
                    return a.fold(c, e, d)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.polaris.array.Split", ["ephox.compass.Arr", "ephox.polaris.api.Splitting"], function(a, b) {
            var c = function(c, d) {
                var f = [],
                    g = [];
                a.each(c, function(a) {
                    var c = d(a);
                    b.cata(c, function() {
                        g.push(a)
                    }, function() {
                        0 < g.length && f.push(g);
                        f.push([a]);
                        g = []
                    }, function() {
                        0 < g.length && f.push(g);
                        g = []
                    })
                });
                0 < g.length && f.push(g);
                return f
            };
            return {
                splitby: function(a, d) {
                    return c(a, function(a) {
                        return d(a) ? b.excludeWithout(a) : b.include(a)
                    })
                },
                splitbyAdv: c
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.polaris.api.Arrays", ["ephox.polaris.array.Boundaries", "ephox.polaris.array.Slice", "ephox.polaris.array.Split"], function(a, b, c) {
            return {
                splitby: function(a, b) {
                    return c.splitby(a, b)
                },
                splitbyAdv: function(a, b) {
                    return c.splitbyAdv(a, b)
                },
                sliceby: function(a, c) {
                    return b.sliceby(a, c)
                },
                boundAt: function(b, c, f, g) {
                    return a.boundAt(b, c, f, g)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.phoenix.extract.TypedList", ["ephox.compass.Arr", "ephox.peanut.Fun", "ephox.perhaps.Option",
            "ephox.phoenix.api.data.Spot", "ephox.polaris.api.Arrays"
        ], function(a, b, c, e, d) {
            return {
                count: function(b) {
                    return a.foldr(b, function(a, b) {
                        return b.len() + a
                    }, 0)
                },
                dropUntil: function(a, b) {
                    return d.sliceby(a, function(a) {
                        return a.is(b)
                    })
                },
                gen: function(a, b) {
                    return a.fold(c.none, function(a) {
                        return c.some(e.range(a, b, b + 1))
                    }, function(d) {
                        return c.some(e.range(d, b, b + a.len()))
                    })
                },
                justText: function(c) {
                    return a.bind(c, function(a) {
                        return a.fold(b.constant([]), b.constant([]), function(a) {
                            return [a]
                        })
                    })
                }
            }
        })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.phoenix.extract.Extract", ["ephox.compass.Arr", "ephox.phoenix.api.data.Spot", "ephox.phoenix.extract.TypedItem", "ephox.phoenix.extract.TypedList"], function(a, b, c, e) {
            var d = function(b, e, f) {
                    if (b.property().isText(e)) return [c.text(e, b)];
                    if (b.property().isEmptyTag(e)) return [c.empty(e, b)];
                    if (b.property().isElement(e)) {
                        var p = b.property().children(e),
                            k = b.property().isBoundary(e) ? [c.boundary(e, b)] : [];
                        e = void 0 !== f && f(e) ? [] : a.bind(p,
                            function(a) {
                                return d(b, a, f)
                            });
                        return k.concat(e).concat(k)
                    }
                    return []
                },
                f = function(a, c, f, n, k) {
                    a = d(a, n, k);
                    c = e.dropUntil(a, c);
                    c = e.count(c);
                    return b.point(n, c + f)
                };
            return {
                typed: d,
                items: function(b, c, e) {
                    b = d(b, c, e);
                    var f = function(a, b) {
                        return a
                    };
                    return a.map(b, function(a) {
                        return a.fold(f, f, f)
                    })
                },
                extractTo: function(a, c, d, e, n) {
                    return a.up().predicate(c, e).fold(function() {
                        return b.point(c, d)
                    }, function(b) {
                        return f(a, c, d, b, n)
                    })
                },
                extract: function(a, c, d, e) {
                    return a.property().parent(c).fold(function() {
                        return b.point(c,
                            d)
                    }, function(b) {
                        return f(a, c, d, b, e)
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.phoenix.extract.ExtractText", ["ephox.compass.Arr", "ephox.peanut.Fun", "ephox.phoenix.extract.Extract"], function(a, b, c) {
            var e = function(a, b) {
                return "img" === b.property().name(a) ? " " : "\n"
            };
            return {
                from: function(d, f, g) {
                    f = c.typed(d, f, g);
                    return a.map(f, function(a) {
                        return a.fold(b.constant("\n"), e, d.property().getText)
                    }).join("")
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require,
        a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.polaris.parray.Generator", ["ephox.compass.Arr", "ephox.peanut.Fun"], function(a, b) {
            return {
                make: function(c, e, d) {
                    return a.foldl(c, function(a, c) {
                        return e(c, a.len).fold(b.constant(a), function(b) {
                            return {
                                len: b.finish(),
                                list: a.list.concat([b])
                            }
                        })
                    }, {
                        len: void 0 !== d ? d : 0,
                        list: []
                    }).list
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.polaris.parray.Query", ["ephox.compass.Arr", "ephox.perhaps.Option"],
            function(a, b) {
                var c = function(a, b) {
                        return b >= a.start() && b <= a.finish()
                    },
                    e = function(b, c) {
                        return a.findIndex(b, function(a) {
                            return a.start() === c
                        })
                    };
                return {
                    get: function(d, e) {
                        var g = a.find(d, function(a) {
                            return c(a, e)
                        });
                        return b.from(g)
                    },
                    find: function(c, e) {
                        return b.from(a.find(c, e))
                    },
                    inUnit: c,
                    sublist: function(a, b, c) {
                        b = e(a, b);
                        var n = e(a, c);
                        c = -1 < n ? n : a[a.length - 1] && a[a.length - 1].finish() === c ? a.length + 1 : -1;
                        return -1 < b && -1 < c ? a.slice(b, c) : []
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.polaris.parray.Translate", ["ephox.compass.Arr", "ephox.highway.Merger", "ephox.peanut.Fun"], function(a, b, c) {
            return {
                translate: function(e, d) {
                    return a.map(e, function(a) {
                        return b.merge(a, {
                            start: c.constant(a.start() + d),
                            finish: c.constant(a.finish() + d)
                        })
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.polaris.parray.Split", ["ephox.compass.Arr", "ephox.polaris.parray.Query", "ephox.polaris.parray.Translate"], function(a, b,
                                                                                                                                        c) {
            var e = function(a, b, e) {
                b = e(a, b);
                return c.translate(b, a.start())
            };
            return {
                splits: function(c, f, g) {
                    return 0 === f.length ? c : a.bind(c, function(c) {
                        var d = a.bind(f, function(a) {
                            return b.inUnit(c, a) ? [a - c.start()] : []
                        });
                        return 0 < d.length ? e(c, d, g) : [c]
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.polaris.api.PositionArray", ["ephox.polaris.parray.Generator", "ephox.polaris.parray.Query", "ephox.polaris.parray.Split", "ephox.polaris.parray.Translate"],
            function(a, b, c, e) {
                return {
                    generate: function(b, c, e) {
                        return a.make(b, c, e)
                    },
                    get: function(a, c) {
                        return b.get(a, c)
                    },
                    find: function(a, c) {
                        return b.find(a, c)
                    },
                    splits: function(a, b, e) {
                        return c.splits(a, b, e)
                    },
                    translate: function(a, b) {
                        return e.translate(a, b)
                    },
                    sublist: function(a, c, e) {
                        return b.sublist(a, c, e)
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.phoenix.extract.Find", ["ephox.phoenix.api.data.Spot", "ephox.phoenix.extract.Extract", "ephox.phoenix.extract.TypedList",
            "ephox.polaris.api.PositionArray"
        ], function(a, b, c, e) {
            return {
                find: function(d, f, g, h) {
                    d = b.typed(d, f, h);
                    d = e.generate(d, c.gen);
                    return e.get(d, g).map(function(b) {
                        return a.point(b.element(), g - b.start())
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.phoenix.api.general.Extract", ["ephox.phoenix.extract.Extract", "ephox.phoenix.extract.ExtractText", "ephox.phoenix.extract.Find"], function(a, b, c) {
            return {
                extract: function(b, c, f, g) {
                    return a.extract(b,
                        c, f, g)
                },
                extractTo: function(b, c, f, g, h) {
                    return a.extractTo(b, c, f, g, h)
                },
                all: function(b, c, f) {
                    return a.items(b, c, f)
                },
                from: function(b, c, f) {
                    return a.typed(b, c, f)
                },
                find: function(a, b, f, g) {
                    return c.find(a, b, f, g)
                },
                toText: function(a, c, f) {
                    return b.from(a, c, f)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.phoenix.family.Group", ["ephox.compass.Arr", "ephox.phoenix.api.general.Extract", "ephox.phoenix.extract.TypedItem", "ephox.polaris.api.Arrays", "ephox.polaris.api.Splitting"],
            function(a, b, c, e, d) {
                return {
                    group: function(f, g, h) {
                        g = a.bind(g, function(a) {
                            return b.from(f, a, h)
                        });
                        g = e.splitbyAdv(g, function(a) {
                            return c.cata(a, function() {
                                return d.excludeWithout(a)
                            }, function() {
                                return d.excludeWith(a)
                            }, function() {
                                return d.include(a)
                            })
                        });
                        return a.filter(g, function(a) {
                            return 0 < a.length
                        })
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.phoenix.family.Parents", ["ephox.compass.Arr", "ephox.perhaps.Option"], function(a, b) {
            return {
                common: function(c,
                                 e, d) {
                    e = [e].concat(c.up().all(e));
                    var f = [d].concat(c.up().all(d));
                    d = a.find(e, function(b) {
                        return a.exists(f, function(a) {
                            return c.eq(a, b)
                        })
                    });
                    return b.from(d)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.phoenix.wrap.OrphanText", ["ephox.compass.Arr"], function(a) {
            var b = "table tbody thead tfoot tr ul ol".split(" ");
            return function(c) {
                var e = c.property(),
                    d = function(b, c) {
                        return e.parent(b).map(e.name).map(function(b) {
                            return !a.contains(c, b)
                        }).getOr(!1)
                    };
                return {
                    validateText: function(a) {
                        return e.isText(a) && d(a, b)
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.phoenix.family.Range", ["ephox.compass.Arr", "ephox.peanut.Fun", "ephox.phoenix.api.general.Extract", "ephox.phoenix.family.Parents", "ephox.phoenix.wrap.OrphanText"], function(a, b, c, e, d) {
            return {
                range: function(f, g, h, m, p) {
                    return f.eq(g, m) ? [g] : e.common(f, g, m).fold(function() {
                        return []
                    }, function(e) {
                        e = [e].concat(c.all(f, e, b.constant(!1)));
                        var k =
                                a.findIndex(e, b.curry(f.eq, g)),
                            l = a.findIndex(e, b.curry(f.eq, m));
                        e = -1 < k && -1 < l ? k < l ? e.slice(k + h, l + p) : e.slice(l + p, k + h) : [];
                        k = d(f);
                        return a.filter(e, k.validateText)
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.phoenix.api.general.Family", ["ephox.phoenix.family.Group", "ephox.phoenix.family.Range"], function(a, b) {
            return {
                range: function(a, e, d, f, g) {
                    return b.range(a, e, d, f, g)
                },
                group: function(b, e, d) {
                    return a.group(b, e, d)
                }
            }
        })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.polaris.string.Sanitise", [], function() {
            return {
                css: function(a) {
                    var b = /^[a-zA-Z]/.test(a) ? "" : "e";
                    a = a.replace(/[^\w]/gi, "-");
                    return b + a
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.polaris.string.Split", ["ephox.compass.Arr"], function(a) {
            return {
                splits: function(b, c) {
                    if (0 === c.length) return [b];
                    var e = a.foldl(c, function(a, c) {
                            if (0 === c) return a;
                            var d = b.substring(a.prev,
                                c);
                            return {
                                prev: c,
                                values: a.values.concat([d])
                            }
                        }, {
                            prev: 0,
                            values: []
                        }),
                        d = c[c.length - 1];
                    return d < b.length ? e.values.concat(b.substring(d)) : e.values
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.polaris.api.Strings", ["ephox.polaris.string.Sanitise", "ephox.polaris.string.Split"], function(a, b) {
            return {
                cssSanitise: function(b) {
                    return a.css(b)
                },
                splits: function(a, e) {
                    return b.splits(a, e)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.phoenix.search.Splitter", ["ephox.compass.Arr", "ephox.perhaps.Option", "ephox.phoenix.api.data.Spot", "ephox.polaris.api.PositionArray", "ephox.polaris.api.Strings"], function(a, b, c, e, d) {
            return {
                subdivide: function(f, g, h) {
                    var m = f.property().getText(g);
                    h = a.filter(d.splits(m, h), function(a) {
                        return 0 < a.length
                    });
                    if (1 >= h.length) return [c.range(g, 0, m.length)];
                    f.property().setText(g, h[0]);
                    var m = e.generate(h.slice(1), function(a, d) {
                            var e = f.create().text(a),
                                e = c.range(e, d, d + a.length);
                            return b.some(e)
                        },
                        h[0].length),
                        p = a.map(m, function(a) {
                            return a.element()
                        });
                    f.insert().afterAll(g, p);
                    return [c.range(g, 0, h[0].length)].concat(m)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.phoenix.search.MatchSplitter", ["ephox.compass.Arr", "ephox.peanut.Fun", "ephox.phoenix.search.Splitter", "ephox.polaris.api.PositionArray"], function(a, b, c, e) {
            return {
                separate: function(d, f, g) {
                    var h = a.bind(g, function(a) {
                            return [a.start(), a.finish()]
                        }),
                        m = e.splits(f, h, function(a,
                                                    b) {
                            return c.subdivide(d, a.element(), b)
                        });
                    return a.map(g, function(c) {
                        var f = e.sublist(m, c.start(), c.finish()),
                            f = a.map(f, function(a) {
                                return a.element()
                            }),
                            g = a.map(f, d.property().getText).join("");
                        return {
                            elements: b.constant(f),
                            word: c.word,
                            exact: b.constant(g)
                        }
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.polaris.pattern.Chars", ["ephox.bud.Unicode", "ephox.peanut.Fun"], function(a, b) {
            var c = "\\w'\\-\\u00C0-\\u00FF" + a.zeroWidth() + "\\u2018\\u2019",
                e = "[^" + c + "]",
                d = "[" + c + "]";
            return {
                chars: b.constant(c),
                wordbreak: b.constant(e),
                wordchar: b.constant(d)
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.polaris.pattern.Custom", ["global!RegExp"], function(a) {
            return function(b, c, e, d) {
                return {
                    term: function() {
                        return new a(b, d.getOr("g"))
                    },
                    prefix: c,
                    suffix: e
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.polaris.pattern.Unsafe", ["ephox.peanut.Fun",
            "ephox.perhaps.Option", "ephox.polaris.pattern.Chars", "ephox.polaris.pattern.Custom"
        ], function(a, b, c, e) {
            return {
                token: function(c) {
                    return e(c, a.constant(0), a.constant(0), b.none())
                },
                word: function(a) {
                    a = "((?:^'?)|(?:" + c.wordbreak() + "+'?))" + a + "((?:'?$)|(?:'?" + c.wordbreak() + "+))";
                    return e(a, function(a) {
                        return 1 < a.length ? a[1].length : 0
                    }, function(a) {
                        return 2 < a.length ? a[2].length : 0
                    }, b.none())
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.polaris.pattern.Safe", ["ephox.polaris.pattern.Unsafe"], function(a) {
            var b = function(a) {
                return a.replace(/[-\[\]{}()*+?.,\\\^$|#\s]/g, "\\$&")
            };
            return {
                sanitise: b,
                word: function(c) {
                    c = b(c);
                    return a.word(c)
                },
                token: function(c) {
                    c = b(c);
                    return a.token(c)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.polaris.api.Pattern", ["ephox.polaris.pattern.Chars", "ephox.polaris.pattern.Custom", "ephox.polaris.pattern.Safe", "ephox.polaris.pattern.Unsafe"], function(a, b, c, e) {
            return {
                safeword: function(a) {
                    return c.word(a)
                },
                safetoken: function(a) {
                    return c.token(a)
                },
                custom: function(a, c, e, n) {
                    return b(a, c, e, n)
                },
                unsafeword: function(a) {
                    return e.word(a)
                },
                unsafetoken: function(a) {
                    return e.token(a)
                },
                sanitise: function(a) {
                    return c.sanitise(a)
                },
                chars: function() {
                    return a.chars()
                },
                wordbreak: function() {
                    return a.wordbreak()
                },
                wordchar: function() {
                    return a.wordchar()
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.polaris.search.Find", ["ephox.peanut.Fun"], function(a) {
            return {
                all: function(b,
                              c) {
                    for (var e = c.term(), d = [], f = e.exec(b); f;) {
                        var g = f.index + c.prefix(f),
                            f = f[0].length - c.prefix(f) - c.suffix(f);
                        d.push({
                            start: a.constant(g),
                            finish: a.constant(g + f)
                        });
                        e.lastIndex = g + f;
                        f = e.exec(b)
                    }
                    return d
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.polaris.search.Sleuth", ["ephox.compass.Arr", "ephox.highway.Merger", "ephox.polaris.search.Find", "global!Array"], function(a, b, c, e) {
            var d = function(a) {
                a = e.prototype.slice.call(a, 0);
                a.sort(function(a,
                                b) {
                    return a.start() < b.start() ? -1 : b.start() < a.start() ? 1 : 0
                });
                return a
            };
            return {
                search: function(e, g) {
                    var h = a.bind(g, function(d) {
                        var g = c.all(e, d.pattern());
                        return a.map(g, function(a) {
                            return b.merge(d, {
                                start: a.start,
                                finish: a.finish
                            })
                        })
                    });
                    return d(h)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.polaris.api.Search", ["ephox.polaris.search.Find", "ephox.polaris.search.Sleuth"], function(a, b) {
            return {
                findall: function(b, e) {
                    return a.all(b, e)
                },
                findmany: function(a,
                                   e) {
                    return b.search(a, e)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.phoenix.search.Searcher", "ephox.compass.Arr ephox.perhaps.Option ephox.phoenix.api.data.NamedPattern ephox.phoenix.api.data.Spot ephox.phoenix.api.general.Family ephox.phoenix.extract.TypedList ephox.phoenix.search.MatchSplitter ephox.polaris.api.Pattern ephox.polaris.api.PositionArray ephox.polaris.api.Search".split(" "), function(a, b, c, e, d, f, g, h, m, p) {
            var k = function(a,
                             c) {
                    return m.generate(c, function(c, d) {
                        var f = d + a.property().getText(c).length;
                        return b.from(e.range(c, d, f))
                    })
                },
                l = function(b, c, e, h) {
                    c = d.group(b, c, h);
                    return a.bind(c, function(c) {
                        c = f.justText(c);
                        var d = a.map(c, b.property().getText).join(""),
                            d = p.findmany(d, e);
                        c = k(b, c);
                        return g.separate(b, c, d)
                    })
                };
            return {
                safeWords: function(b, d, e, f) {
                    e = a.map(e, function(a) {
                        var b = h.safeword(a);
                        return c(a, b)
                    });
                    return l(b, d, e, f)
                },
                safeToken: function(a, b, d, e) {
                    d = c(d, h.safetoken(d));
                    return l(a, b, [d], e)
                },
                run: l
            }
        })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.phoenix.api.general.Search", ["ephox.phoenix.search.Searcher"], function(a) {
            return {
                safeWords: function(b, c, e, d) {
                    return a.safeWords(b, c, e, d)
                },
                safeToken: function(b, c, e, d) {
                    return a.safeToken(b, c, e, d)
                },
                run: function(b, c, e, d) {
                    return a.run(b, c, e, d)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.phoenix.api.dom.DomSearch", ["ephox.boss.api.DomUniverse", "ephox.phoenix.api.general.Search"],
            function(a, b) {
                var c = a();
                return {
                    safeWords: function(a, d, f) {
                        return b.safeWords(c, a, d, f)
                    },
                    safeToken: function(a, d, f) {
                        return b.safeToken(c, a, d, f)
                    },
                    run: function(a, d, f) {
                        return b.run(c, a, d, f)
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.SelectorExists", ["ephox.sugar.api.SelectorFind"], function(a) {
            return {
                any: function(b) {
                    return a.first(b).isSome()
                },
                ancestor: function(b, c, e) {
                    return a.ancestor(b, c, e).isSome()
                },
                sibling: function(b, c) {
                    return a.sibling(b,
                        c).isSome()
                },
                child: function(b, c) {
                    return a.child(b, c).isSome()
                },
                descendant: function(b, c) {
                    return a.descendant(b, c).isSome()
                },
                closest: function(b, c, e) {
                    return a.closest(b, c, e).isSome()
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.limbo.process.Preprocessor", "ephox.compass.Arr ephox.perhaps.Option ephox.phoenix.api.dom.DomSearch ephox.polaris.api.Pattern ephox.scullion.Struct ephox.sugar.api.Attr ephox.sugar.api.Css ephox.sugar.api.Element ephox.sugar.api.Insert ephox.sugar.api.InsertAll ephox.sugar.api.Node ephox.sugar.api.SelectorExists ephox.sugar.api.TextContent".split(" "),
            function(a, b, c, e, d, f, g, h, m, p, k, l, r) {
                var t = /((([A-Za-z]{3,9}:(?:\/\/)?)(?:[\-;:&=\.\+\$,\w]+@)?[A-Za-z0-9\.\-]+|(?:www\.|[\-;:&=\+\$,\w\.]+@)[A-Za-z0-9\.\-]+)(:[0-9]+)?((?:\/[\+~%\/\.\w\-_]*)?\??(?:[\-_.~*+=!&;:'%@?^${}()\w,]*)#?(?:[\-_.~*+=!&;:'%@?^${}()\w,\/]*))?)/g.source,
                    v = function(a) {
                        var b = d.immutable("word", "pattern"),
                            f = e.unsafetoken(t),
                            b = b("__INTERNAL__", f);
                        return c.run(a, [b])
                    },
                    u = function(a) {
                        return !l.closest(a, "a")
                    },
                    w = function(a) {
                        return b.from(a[0]).filter(u).map(function(b) {
                            var c = h.fromTag("a");
                            m.before(b, c);
                            p.append(c, a);
                            f.set(c, "href", r.get(c));
                            return c
                        })
                    };
                return {
                    links: function(b) {
                        b = v(b);
                        a.each(b, function(a) {
                            var b = a.exact(),
                                c;
                            (c = 0 > b.indexOf("@")) || (b = b.indexOf("://"), c = 3 <= b && 9 >= b);
                            c && w(a.elements())
                        })
                    },
                    position: function(b) {
                        a.each(b, function(a) {
                            k.isElement(a) && g.remove(a, "position")
                        })
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.limbo.api.RunPaste", "ephox.compass.Arr ephox.limbo.process.PasteFilters ephox.limbo.process.Preprocessor ephox.pastiche.api.HybridAction ephox.sugar.api.Html ephox.sugar.api.Traverse".split(" "),
            function(a, b, c, e, d, f) {
                var g = function(b) {
                    var d = f.children(b);
                    a.each([c.links, c.position], function(a) {
                        a(d)
                    })
                };
                return {
                    go: function(a, c, f, n, k) {
                        g(f);
                        f = d.get(f);
                        c = b.derive(k, n, c);
                        return e.go(a, f, c)
                    },
                    preprocess: g
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.pastiche.PasteTransfer", "ephox.cement.alien.FutureStep ephox.cement.api.Bundle ephox.cement.smartpaste.PasteResponse ephox.fred.PlatformDetection ephox.limbo.api.RunPaste ephox.perhaps.Result ephox.sugar.api.Elements global!console".split(" "),
            function(a, b, c, e, d, f, g, h) {
                var m = e.detect(),
                    p = function(a, b, c, e) {
                        try {
                            var n = d.go(a, m, b, c, e),
                                p = void 0 !== n && null !== n && 0 < n.length ? g.fromHtml(n) : [];
                            return f.value(p)
                        } catch (k) {
                            return h.error(k), f.error("errors.paste.process.failure")
                        }
                    };
                return {
                    transfer: function(d, e, f, g) {
                        return p(d, e, g, f).fold(function(b) {
                            return a.error(b)
                        }, function(d) {
                            return a.sync(function(e) {
                                a.call(e, {
                                    response: c.paste(d, []),
                                    bundle: b.nu({})
                                })
                            })
                        })
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a,
              k, l) {
        a("ephox.cement.pastiche.OffscreenHandler", "ephox.cement.pastiche.PasteTransfer ephox.compass.Arr ephox.knoch.future.Future ephox.perhaps.Option ephox.sugar.api.Remove ephox.sugar.api.Traverse".split(" "), function(a, b, c, e, d, f) {
            return {
                internal: function(g, h, m) {
                    h = (void 0 !== h ? h.findClipboardTags(f.children(m)) : e.none()).getOr([]);
                    b.each(h, d.remove);
                    h = c.nu(function(a) {
                        a([])
                    });
                    return a.transfer(g, m, !1, !0, h)
                },
                external: function(b, c, d, e) {
                    return a.transfer(b, c, e, d)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require,
        a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.alien.TextToHtml", ["ephox.compass.Arr", "ephox.sugar.api.Element", "ephox.sugar.api.Html", "ephox.sugar.api.TextContent"], function(a, b, c, e) {
            return {
                encode: function(a) {
                    var f = b.fromTag("div");
                    e.set(f, a);
                    return c.get(f)
                },
                convert: function(b) {
                    b = b.trim().split(/\n{2,}|(?:\r\n){2,}/);
                    b = a.map(b, function(a) {
                        return a.split(/\n|\r\n/).join("<br />")
                    });
                    return 1 === b.length ? b[0] : a.map(b, function(a) {
                        return "<p>" + a + "</p>"
                    }).join("")
                }
            }
        })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.plain.TextHandler", "ephox.cement.alien.FutureStep ephox.cement.alien.TextToHtml ephox.cement.api.Bundle ephox.cement.smartpaste.Inspection ephox.cement.smartpaste.PasteResponse ephox.perhaps.Option ephox.perhaps.Options ephox.sugar.api.Elements global!window".split(" "), function(a, b, c, e, d, f, g, h, m) {
            var p = function(a) {
                    return 0 < a.length
                },
                k = function(a) {
                    return e.isValidData(a) ? g.findMap(a.types, function(b) {
                        return "text/plain" ===
                        b ? f.some(a.getData(b)) : f.none()
                    }) : f.none()
                },
                l = function() {
                    var a = m.clipboardData;
                    return void 0 !== a ? f.some(a.getData("text")) : f.none()
                },
                r = function(a) {
                    a = b.encode(a);
                    a = b.convert(a);
                    a = h.fromHtml(a);
                    return d.paste(a, [])
                };
            return {
                handle: function(b) {
                    return a.sync(function(f) {
                        var g = (e.isValidData(b) ? k : l)(b).filter(p).fold(d.cancel, r);
                        a.call(f, {
                            response: g,
                            bundle: c.nu({})
                        })
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.step.PasteSteps", "ephox.cement.alien.FutureStep ephox.cement.api.Bundle ephox.cement.api.Bundles ephox.cement.html.HtmlHandler ephox.cement.images.ImageHandler ephox.cement.pastiche.OffscreenHandler ephox.cement.plain.TextHandler ephox.cement.smartpaste.PasteResponse ephox.fred.PlatformDetection ephox.limbo.api.RunPaste ephox.peanut.Fun ephox.sugar.api.Element ephox.sugar.api.InsertAll ephox.sugar.api.Traverse global!console".split(" "),
            function(a, b, c, e, d, f, g, h, m, p, k, l, r, t, v) {
                var u = m.detect();
                return {
                    plain: function(a, b, c) {
                        return g.handle(a)
                    },
                    autolink: function(b, c) {
                        var d = function(b, d) {
                                var e = l.fromTag("div");
                                r.append(e, b);
                                p.preprocess(e);
                                e = t.children(e);
                                return a.pure({
                                    response: h.paste(e, d),
                                    bundle: c.bundle()
                                })
                            },
                            e = k.curry(a.pass, c);
                        return h.cata(c.response(), e, d, e, d)
                    },
                    noImages: function(b) {
                        return function(b, c) {
                            return a.error("errors.local.images.disallowed")
                        }
                    },
                    images: function(b) {
                        return function(c, e) {
                            return u.browser.isSafari() ? a.error("safari.imagepaste") :
                                d.handle(c, b)
                        }
                    },
                    internal: function(a, b) {
                        return function(d, e) {
                            var g = e.bundle();
                            return c.proxyBin(g).handle("There was no proxy bin setup. Ensure you have run proxyStep first.", function(c) {
                                var d = t.owner(a);
                                return f.internal(d, b, c)
                            })
                        }
                    },
                    external: function(a, b) {
                        return function(d, e) {
                            var g = e.bundle();
                            return c.proxyBin(g).handle("There was no proxy bin setup. Ensure you have run proxyStep first.", function(d) {
                                var e = c.merging(g),
                                    h = c.isWord(g),
                                    n = c.isInternal(g),
                                    m = t.owner(a);
                                return n ? f.internal(m, b, d) : f.external(m,
                                    d, e, h)
                            })
                        }
                    },
                    gwt: function(a) {
                        return function(b, d) {
                            var f = c.mergeOffice(d.bundle());
                            return e.handle(b, f, a)
                        }
                    },
                    setBundle: function(c) {
                        return function(d, e) {
                            var f = b.merge(e.bundle(), b.nu(c));
                            return a.pure({
                                response: e.response(),
                                bundle: f
                            })
                        }
                    },
                    none: function(b, c) {
                        return a.cancel()
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.api.CementConstants", ["ephox.cement.style.Styles", "ephox.peanut.Fun"], function(a, b) {
            var c = a.resolve("smartpaste-eph-bin");
            return {
                binStyle: b.constant(c)
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.limbo.api.Sources", ["ephox.pastiche.api.HybridAction", "ephox.sugar.api.Attr", "ephox.sugar.api.Html", "ephox.sugar.api.PredicateExists"], function(a, b, c, e) {
            var d = function(a, c) {
                    return e.descendant(a, function(a) {
                        return b.has(a, "style") ? -1 < b.get(a, "style").indexOf("mso-") : !1
                    })
                },
                f = function(b, d) {
                    var e = c.get(b);
                    return a.isWordContent(e, d)
                };
            return {
                isWord: function(a, b) {
                    var c =
                        a.browser;
                    return (c.isIE() && 11 <= c.version.major ? d : f)(b, a)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.step.ProxyStep", "ephox.cement.alien.FutureStep ephox.cement.api.Bundle ephox.cement.api.CementConstants ephox.fred.PlatformDetection ephox.limbo.api.Sources ephox.sugar.api.Class ephox.sugar.api.Traverse".split(" "), function(a, b, c, e, d, f, g) {
            var h = e.detect();
            return function(e, p, k, l) {
                return function(r, t) {
                    var v = t.response();
                    return a.sync(function(r) {
                        var t =
                            e(k);
                        t.events.after.bind(function(e) {
                            e = e.container();
                            p(e);
                            f.add(e, c.binStyle());
                            var m = d.isWord(h, e),
                                k = g.children(e),
                                k = l.findClipboardTags(k, m).isSome();
                            a.call(r, {
                                response: v,
                                bundle: b.nu({
                                    isWord: m,
                                    isInternal: k,
                                    proxyBin: e
                                })
                            })
                        });
                        t.run()
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.api.PasteFlavors", "ephox.cement.api.PasteProcesses ephox.cement.smartpaste.Inspection ephox.cement.step.Base64Step ephox.cement.step.RtfStep ephox.cement.step.MergeStep ephox.cement.step.PasteSteps ephox.cement.step.ProxyStep ephox.fred.PlatformDetection ephox.peanut.Fun ephox.perhaps.Option ephox.scullion.Struct ephox.violin.Strings global!window".split(" "),
            function(a, b, c, e, d, f, g, h, m, k, l, s, r) {
                var t = l.immutable("data", "rtf"),
                    v = h.detect(),
                    u = ["image", "file"],
                    w = function(a) {
                        var c = a.clipboardData;
                        return b.isValidData(c) ? b.getFlavor(c.types, "html").bind(function(b) {
                            b = c.getData(b.type);
                            return s.contains(b, "<html") && (s.contains(b, 'xmlns:o="urn:schemas-microsoft-com:office:office"') || s.contains(b, 'xmlns:x="urn:schemas-microsoft-com:office:excel"')) ? k.some(t(b, G(a))) : k.none()
                        }) : k.none()
                    },
                    x = function(a) {
                        return t(a, k.none())
                    },
                    z = function(a) {
                        if (v.browser.isIE() || v.browser.isFirefox()) return k.none();
                        if (b.isValidData(a.clipboardData)) {
                            var c = a.clipboardData;
                            return b.getPreferredFlavor(u, c.types).map(function(a) {
                                return c.items
                            })
                        }
                        return k.none()
                    },
                    A = function(a, c) {
                        var d = b.isValidData(c.clipboardData) ? c.clipboardData.types : [];
                        return b.getFlavor(d, a.clipboardType()).map(function(a) {
                            return t(c, k.none())
                        })
                    },
                    B = function(a) {
                        return v.browser.isIE() ? k.some(r.clipboardData) : b.isValidData(a.clipboardData) ? k.some(a.clipboardData) : k.none()
                    },
                    G = function(a) {
                        var c = a.clipboardData;
                        return b.isValidData(c) ? b.getFlavor(c.types,
                            "rtf").bind(function(a) {
                            a = c.getData(a.type);
                            return 0 < a.length ? k.some(a) : k.none()
                        }) : k.none()
                    },
                    D = function(a, b, c, d) {
                        return {
                            label: m.constant(a),
                            getAvailable: b,
                            steps: m.constant(c),
                            capture: m.constant(d)
                        }
                    };
                return {
                    internal: function(b, c, e, h) {
                        var k = m.curry(A, h);
                        return D("Within Textbox.io (tables) pasting", k, [a.normal(g(c, b, e, h)), a.normal(d.fixed(!0, !0)), a.normal(f.internal(e, h))], !1)
                    },
                    pastiche: function(b, h, m, k, p, l, q) {
                        return D("Outside of Textbox.io pasting (could be internal but another browser)", x, [a.normal(g(k,
                            m, p, q)), a.normal(d.fromConfigIfExternal(b, h)), a.normal(f.external(p, q)), a.blocking(e(l, h)), a.normal(c(h.preprocessor))], !1)
                    },
                    gwt: function(b, c, g, h) {
                        return D("GWT pasting", w, [a.normal(f.setBundle({
                            isWord: !0
                        })), a.normal(d.fromConfig(c, g)), a.normal(f.gwt(b)), a.blocking(e(h, g))], !0)
                    },
                    image: function(b) {
                        return D("Image pasting", z, [a.normal(!1 === b.allowLocalImages ? f.noImages(m.noop) : f.images(b.preprocessor))], !0)
                    },
                    text: function() {
                        return D("Plain text pasting", B, [a.normal(f.plain), a.normal(f.autolink)], !0)
                    },
                    none: function() {
                        return D("There is no valid way to paste", k.some, [a.normal(f.none)], !1)
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.flash.HelpCopy", "ephox.cement.style.Styles ephox.fred.PlatformDetection ephox.sugar.api.Attr ephox.sugar.api.Class ephox.sugar.api.Element ephox.sugar.api.Html ephox.sugar.api.InsertAll".split(" "), function(a, b, c, e, d, f, g) {
            var h = function(a) {
                return d.fromHtml("<p>" + a("cement.dialog.flash.press-escape") +
                    "</p>")
            };
            return {
                paste: function(c) {
                    var f = d.fromTag("div");
                    e.add(f, a.resolve("flashbin-helpcopy"));
                    var k;
                    k = b.detect().os.isOSX() ? ["\u2318"] : ["Ctrl"];
                    var l = d.fromHtml("<p>" + c("cement.dialog.flash.trigger-paste") + "</p>");
                    k = d.fromHtml('<div><span class="ephox-polish-help-kbd">' + k + '</span> + <span class="ephox-polish-help-kbd">V</span></div>');
                    e.add(k, a.resolve("flashbin-helpcopy-kbd"));
                    g.append(f, [l, k, h(c)]);
                    return f
                },
                noflash: function(b) {
                    var c = d.fromTag("div");
                    e.add(c, a.resolve("flashbin-helpcopy"));
                    var f =
                        d.fromHtml("<p>" + b("cement.dialog.flash.missing") + "</p>");
                    g.append(c, [f, h(b)]);
                    return c
                },
                indicator: function(b) {
                    var h = d.fromTag("div");
                    e.add(h, a.resolve("flashbin-loading"));
                    var k = d.fromTag("div");
                    e.add(k, a.resolve("flashbin-loading-spinner"));
                    var l = d.fromTag("p");
                    b = b("loading.wait");
                    f.set(l, b);
                    c.set(l, "aria-label", b);
                    g.append(h, [k, l]);
                    return h
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    a.bolt.module.api.define("global!navigator", [], function() {
        return navigator
    });
    (function(a, k, l) {
        a("ephox.cement.flash.FlashInfo", "ephox.cement.flash.HelpCopy ephox.cement.style.Styles ephox.fred.PlatformDetection ephox.peanut.Fun ephox.sugar.api.Class ephox.sugar.api.Css ephox.sugar.api.Element ephox.sugar.api.Insert ephox.sugar.api.InsertAll global!navigator".split(" "), function(a, b, c, e, d, f, g, h, m, k) {
            var l = c.detect(),
                s = function(b, c, d, f) {
                    c = a.noflash(f);
                    h.append(b, c);
                    return {
                        reset: e.noop
                    }
                },
                r = function(b, c, d, e) {
                    var g = a.paste(e),
                        h = a.indicator(e);
                    m.append(b, [h, g, c.element()]);
                    b = function() {
                        f.set(g,
                            "display", "block");
                        f.set(h, "display", "none");
                        d()
                    };
                    c.events.spin.bind(function() {
                        f.set(g, "display", "none");
                        f.set(h, "display", "block");
                        f.remove(h, "height");
                        f.remove(h, "padding");
                        d()
                    });
                    c.events.reset.bind(b);
                    c.events.hide.bind(function() {
                        f.setAll(h, {
                            height: "0",
                            padding: "0"
                        })
                    });
                    return {
                        reset: b
                    }
                };
            return function(a, c, f) {
                var h = g.fromTag("div"),
                    n = "flashbin-wrapper-" + (l.os.isOSX() ? "cmd" : "ctrl");
                d.add(h, b.resolve(n));
                var m;
                try {
                    m = void 0 !== (l.browser.isIE() ? new ActiveXObject("ShockwaveFlash.ShockwaveFlash") : k.plugins["Shockwave Flash"])
                } catch (A) {
                    m = !1
                }
                a = (m ? r : s)(h, a, c, f.translations);
                return {
                    element: e.constant(h),
                    reset: a.reset
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    a.bolt.module.api.define("global!clearInterval", [], function() {
        return clearInterval
    });
    a.bolt.module.api.define("global!setInterval", [], function() {
        return setInterval
    });
    (function(a, k, l) {
        a("ephox.cement.alien.CrashMonitor", "ephox.perhaps.Option ephox.porkbun.Event ephox.porkbun.Events ephox.scullion.Cell global!clearInterval global!setInterval".split(" "),
            function(a, b, c, e, d, f) {
                return {
                    responsive: function() {
                        var g = e(a.none()),
                            h = c.create({
                                crashed: b([]),
                                timeout: b([])
                            });
                        return {
                            start: function(b, c, e) {
                                var k = c,
                                    l = f(function() {
                                        0 >= k ? (h.trigger.timeout(), d(l)) : e() && (d(l), h.trigger.crashed());
                                        k--
                                    }, b);
                                g.set(a.some(l))
                            },
                            stop: function() {
                                g.get().each(function(a) {
                                    d(a)
                                })
                            },
                            events: h.registry
                        }
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.alien.WaitForFlash", ["ephox.classify.Type", "ephox.compass.Arr", "global!clearInterval",
            "global!setInterval"
        ], function(a, b, c, e) {
            return function(d, f, g) {
                var h = function(c) {
                        return b.forall(f, function(b) {
                            return a.isFunction(c[b])
                        })
                    },
                    k = !0,
                    p = e(function() {
                        var b = d.dom();
                        a.isFunction(b.PercentLoaded) && 100 === b.PercentLoaded() && h(b) && (l(), g())
                    }, 500),
                    l = function() {
                        k && (c(p), k = !1)
                    };
                return {
                    stop: l
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.epithet.Namespace", ["ephox.epithet.Global"], function(a) {
            return {
                namespace: function(b, c) {
                    for (var e =
                        c || a, d = b.split("."), f = 0; f < d.length; ++f) {
                        var g = d[f];
                        if (void 0 === e[g] || null === e[g]) e[g] = {};
                        e = e[g]
                    }
                    return e
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.oilspill.callback.Globaliser", ["ephox.epithet.Namespace"], function(a) {
            return {
                install: function(b) {
                    var c = a.namespace(b);
                    c.callbacks = {};
                    var e = 0,
                        d = function() {
                            var a = "callback_" + e;
                            e++;
                            return a
                        },
                        f = function(a, e) {
                            var f = d();
                            c.callbacks[f] = function() {
                                e || g(f);
                                a.apply(null, arguments)
                            };
                            return b + ".callbacks." +
                                f
                        },
                        g = function(a) {
                            a = a.substring(a.lastIndexOf(".") + 1);
                            void 0 !== c.callbacks[a] && delete c.callbacks[a]
                        };
                    c.ephemeral = function(a) {
                        return f(a, !1)
                    };
                    c.permanent = function(a) {
                        return f(a, !0)
                    };
                    c.unregister = g;
                    return c
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.Focus", "ephox.peanut.Fun ephox.perhaps.Option ephox.sugar.api.Compare ephox.sugar.api.Element ephox.sugar.api.PredicateExists ephox.sugar.api.Traverse global!document".split(" "),
            function(a, b, c, e, d, f, g) {
                var h = function(a) {
                        a.dom().focus()
                    },
                    k = function(a) {
                        a = void 0 !== a ? a.dom() : g;
                        return b.from(a.activeElement).map(e.fromDom)
                    };
                return {
                    hasFocus: function(a) {
                        var b = f.owner(a).dom();
                        return a.dom() === b.activeElement
                    },
                    focus: h,
                    blur: function(a) {
                        a.dom().blur()
                    },
                    active: k,
                    search: function(a) {
                        return k(f.owner(a)).filter(function(b) {
                            return a.dom().contains(b.dom())
                        })
                    },
                    focusInside: function(b) {
                        var e = f.owner(b);
                        k(e).filter(function(e) {
                            return d.closest(e, a.curry(c.eq, b))
                        }).fold(function() {
                            h(b)
                        }, a.noop)
                    }
                }
            })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    a.bolt.module.api.define("global!clearTimeout", [], function() {
        return clearTimeout
    });
    a.bolt.module.api.define("global!unescape", [], function() {
        return unescape
    });
    (function(a, k, l) {
        a("ephox.cement.flash.Flashbin", "ephox.cement.alien.CrashMonitor ephox.cement.alien.WaitForFlash ephox.cement.style.Styles ephox.compass.Arr ephox.compass.Obj ephox.epithet.Id ephox.fred.PlatformDetection ephox.oilspill.callback.Globaliser ephox.perhaps.Option ephox.porkbun.Event ephox.porkbun.Events ephox.sugar.api.Class ephox.sugar.api.Css ephox.sugar.api.Element ephox.sugar.api.Focus ephox.sugar.api.Insert global!clearInterval global!clearTimeout global!console global!setInterval global!setTimeout global!unescape global!window".split(" "),
            function(a, b, c, e, d, f, g, h, k, l, q, s, r, t, v, u, w, x, z, A, B, G, D) {
                var E = h.install("ephox.flash"),
                    C = g.detect(),
                    Q = k.none();
                return function(g) {
                    var h = q.create({
                            response: l(["rtf"]),
                            spin: l([]),
                            cancel: l([]),
                            error: l(["message"]),
                            reset: l([]),
                            hide: l([]),
                            failed: l(["message"])
                        }),
                        k = !1,
                        m = t.fromTag("div");
                    s.add(m, c.resolve("flashbin-target"));
                    var w = a.responsive();
                    w.events.crashed.bind(function() {
                        h.trigger.failed("flash.crashed")
                    });
                    w.events.timeout.bind(function() {
                        h.trigger.failed("flash.crashed")
                    });
                    var A = function() {
                            M.stop();
                            if (!k) {
                                k = !0;
                                try {
                                    var a = H.dom();
                                    d.each(J, function(b, c) {
                                        var d = a[c];
                                        if (void 0 === d) throw 'Flash object does not have the method "' + c + '"';
                                        d.call(a, b)
                                    });
                                    h.trigger.reset();
                                    x(N);
                                    s.remove(m, c.resolve("flash-activate"));
                                    F();
                                    K()
                                } catch (b) {
                                    z.log("Flash dialog - Error during load: ", b)
                                }
                            }
                        },
                        O = E.permanent(A),
                        J = {
                            setSpinCallback: E.permanent(function() {
                                w.start(1E3, 10, function() {
                                    return !H.dom().setVariable
                                });
                                h.trigger.spin()
                            }),
                            setPasteCallback: E.permanent(function(a) {
                                B(function() {
                                    h.trigger.response(G(a))
                                }, 0)
                            }),
                            setEscapeCallback: E.permanent(h.trigger.cancel),
                            setErrorCallback: E.permanent(h.trigger.error),
                            setStartPasteCallback: E.permanent(function() {
                                w.stop()
                            })
                        },
                        H = function() {
                            var a = g.replace(/^https?:\/\//, "//"),
                                b = '    <param name="allowscriptaccess" value="always">    <param name="wmode" value="opaque">    <param name="FlashVars" value="onLoad=' + O + '">';
                            if (C.browser.isIE() && 10 === C.browser.version.major) {
                                var c = f.generate("flash-bin");
                                return t.fromHtml('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="' + c + '"><param name="movie" value="' + a + '">' +
                                    b + "</object>")
                            }
                            return t.fromHtml('<object type="application/x-shockwave-flash" data="' + a + '">' + b + "</object>")
                        }(),
                        F = function() {
                            r.setAll(H, {
                                width: "2px",
                                height: "2px"
                            })
                        };
                    F();
                    var M = b(H, d.keys(J), A);
                    u.append(m, H);
                    var K = function() {
                            C.browser.isFirefox() && D.getSelection().removeAllRanges();
                            v.focus(H)
                        },
                        N = null,
                        I = function() {
                            s.add(m, c.resolve("flash-activate"));
                            r.remove(H, "height");
                            r.remove(H, "width");
                            h.trigger.hide()
                        },
                        P = function() {
                            r.set(m, "display", "none");
                            Q.each(function(a) {
                                e.each(a, function(a) {
                                    a.unbind()
                                })
                            })
                        };
                    return {
                        focus: K,
                        element: function() {
                            return m
                        },
                        activate: function() {
                            N = B(I, 3E3);
                            h.trigger.spin();
                            r.set(m, "display", "block");
                            K()
                        },
                        deactivate: P,
                        destroy: function() {
                            P();
                            e.each(d.values(J), function(a) {
                                E.unregister(a)
                            });
                            E.unregister(O);
                            M.stop()
                        },
                        events: h.registry
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.flash.FlashDialog", "ephox.cement.flash.FlashInfo ephox.cement.flash.Flashbin ephox.porkbun.Event ephox.porkbun.Events ephox.sugar.api.DomEvent ephox.sugar.api.Element global!window".split(" "),
            function(a, b, c, e, d, f, g) {
                return function(h, k) {
                    var l = k.translations,
                        q = e.create({
                            response: c(["rtf", "hide"]),
                            cancel: c([]),
                            error: c(["message"]),
                            failed: c(["message"])
                        });
                    return {
                        open: function() {
                            var c = b(k.swf);
                            c.deactivate();
                            var e = f.fromDom(g),
                                r = d.bind(e, "mouseup", c.focus),
                                v = function() {
                                    x()
                                },
                                e = function() {
                                    x();
                                    q.trigger.cancel()
                                };
                            c.events.cancel.bind(e);
                            c.events.response.bind(function(a) {
                                q.trigger.response(a.rtf(), v)
                            });
                            c.events.error.bind(function(a) {
                                x();
                                q.trigger.error(a.message())
                            });
                            c.events.failed.bind(function(a) {
                                x();
                                q.trigger.failed(a.message())
                            });
                            var u = h();
                            u.setTitle(l("cement.dialog.flash.title"));
                            var w = a(c, u.reflow, k);
                            w.reset();
                            u.setContent(w.element());
                            u.events.close.bind(e);
                            u.show();
                            c.activate();
                            var x = function() {
                                r.unbind();
                                u.destroy();
                                c.destroy()
                            }
                        },
                        events: q.registry
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.fussy.api.Situ", [], function() {
            var a = function(a) {
                return {
                    fold: a
                }
            };
            return {
                on: function(b, c) {
                    return a(function(a, d, f) {
                        return d(b, c)
                    })
                },
                before: function(b) {
                    return a(function(a,
                                      e, d) {
                        return a(b)
                    })
                },
                after: function(b) {
                    return a(function(a, e, d) {
                        return d(b)
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.fussy.api.SelectionRange", ["ephox.fussy.api.Situ", "ephox.scullion.Struct", "ephox.sugar.api.Element"], function(a, b, c) {
            var e = b.immutable("start", "soffset", "finish", "foffset"),
                d = b.immutable("start", "soffset", "finish", "foffset"),
                f = b.immutable("start", "finish");
            return {
                read: e,
                general: d,
                write: f,
                writeFromNative: function(b) {
                    var d =
                            c.fromDom(b.startContainer),
                        e = c.fromDom(b.endContainer);
                    return f(a.on(d, b.startOffset), a.on(e, b.endOffset))
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.fussy.api.Supported", [], function() {
            return {
                run: function(a, b) {
                    if (a.getSelection) return b(a, a.getSelection());
                    throw "No selection model supported.";
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.DocumentPosition", ["ephox.sugar.api.Compare",
            "ephox.sugar.api.Traverse"
        ], function(a, b) {
            return {
                after: function(c, e, d, f) {
                    var g = b.owner(c).dom().createRange();
                    g.setStart(c.dom(), e);
                    g.setEnd(d.dom(), f);
                    c = a.eq(c, d) && e === f;
                    return g.collapsed && !c
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.fussy.wwwc.Directions", ["ephox.fussy.api.SelectionRange", "ephox.sugar.api.DocumentPosition", "ephox.sugar.api.Element", "ephox.sugar.api.Traverse"], function(a, b, c, e) {
            var d = function(a) {
                    return b.after(c.fromDom(a.anchorNode),
                        a.anchorOffset, c.fromDom(a.focusNode), a.focusOffset)
                },
                f = function(b, e) {
                    var f = c.fromDom(e.startContainer),
                        g = c.fromDom(e.endContainer);
                    return d(b) ? a.read(g, e.endOffset, f, e.startOffset) : a.read(f, e.startOffset, g, e.endOffset)
                },
                g = function(a) {
                    return d(a)
                },
                h = function(a, b, c, d) {
                    return function(f) {
                        if (f.extend) f.collapse(a.dom(), b), f.extend(c.dom(), d);
                        else {
                            var g = e.owner(a).dom().createRange();
                            g.setStart(c.dom(), d);
                            g.setEnd(a.dom(), b);
                            f.removeAllRanges();
                            f.addRange(g)
                        }
                    }
                },
                k = function(a, c, d, e) {
                    return b.after(a, c,
                        d, e)
                };
            return {
                read: function() {
                    return {
                        flip: f,
                        isRtl: g
                    }
                },
                write: function() {
                    return {
                        flip: h,
                        isRtl: k
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.fussy.wwwc.DomRange", ["ephox.fussy.api.SelectionRange", "ephox.fussy.wwwc.Directions", "ephox.perhaps.Option", "ephox.sugar.api.DocumentPosition", "ephox.sugar.api.Element"], function(a, b, c, e, d) {
            var f = function(b, e) {
                    if (!0 === g(b, e.start(), e.finish()).collapsed) {
                        var f = g(b, e.finish(), e.start());
                        return !0 === f.collapsed ?
                            c.none() : c.some(a.general(d.fromDom(f.endContainer), f.endOffset, d.fromDom(f.startContainer), f.startOffset))
                    }
                    return c.none()
                },
                g = function(a, b, c) {
                    var d = l(a);
                    b.fold(function(a) {
                        d.setStartBefore(a.dom())
                    }, function(a, b) {
                        d.setStart(a.dom(), b)
                    }, function(a) {
                        d.setStartAfter(a.dom())
                    });
                    c.fold(function(a) {
                        d.setEndBefore(a.dom())
                    }, function(a, b) {
                        d.setEnd(a.dom(), b)
                    }, function(a) {
                        d.setEndAfter(a.dom())
                    });
                    return d
                },
                h = function(a, b) {
                    return g(a, b.start(), b.finish())
                },
                k = function(a, b) {
                    var c = h(a, b);
                    return function(a) {
                        a.addRange(c)
                    }
                },
                l = function(a) {
                    return a.document.createRange()
                };
            return {
                create: l,
                build: function(a, c) {
                    return f(a, c).fold(function() {
                        return k(a, c)
                    }, function(a) {
                        return b.write().flip(a.start(), a.soffset(), a.finish(), a.foffset())
                    })
                },
                toNative: h,
                forceRange: function(a, b) {
                    var c = g(a, b.start(), b.finish());
                    return !0 === c.collapsed ? g(a, b.finish(), b.start()) : c
                },
                toExactNative: function(a, b, c, d, f) {
                    var g = e.after(b, c, d, f);
                    a = a.document.createRange();
                    g ? (a.setStart(d.dom(), f), a.setEnd(b.dom(), c)) : (a.setStart(b.dom(), c), a.setEnd(d.dom(),
                        f));
                    return a
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.fussy.search.Within", "ephox.compass.Arr ephox.fussy.wwwc.DomRange ephox.sugar.api.Element ephox.sugar.api.Node ephox.sugar.api.SelectorFilter ephox.sugar.api.Selectors".split(" "), function(a, b, c, e, d, f) {
            var g = function(b, c, e, g) {
                var k = b.document.createRange();
                b = (f.is(c, g) ? [c] : []).concat(d.descendants(c, g));
                return a.filter(b, function(a) {
                    k.selectNodeContents(a.dom());
                    return 1 > k.compareBoundaryPoints(e.END_TO_START,
                            e) && -1 < k.compareBoundaryPoints(e.START_TO_END, e)
                })
            };
            return {
                find: function(a, d, f) {
                    d = b.forceRange(a, d);
                    var k = c.fromDom(d.commonAncestorContainer);
                    return e.isElement(k) ? g(a, k, d, f) : []
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.fussy.wwwc.Prefilter", ["ephox.compass.Arr", "ephox.fussy.api.SelectionRange", "ephox.fussy.api.Situ", "ephox.sugar.api.Node"], function(a, b, c, e) {
            var d = function(b, d) {
                var h = e.name(b);
                return "input" === h ? c.after(b) : a.contains(["br",
                    "img"
                ], h) ? 0 === d ? c.before(b) : c.after(b) : c.on(b, d)
            };
            return {
                beforeSpecial: d,
                preprocess: function(a) {
                    var e = a.start().fold(c.before, d, c.after);
                    a = a.finish().fold(c.before, d, c.after);
                    return b.write(e, a)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.Fragment", ["ephox.compass.Arr", "ephox.sugar.api.Element", "global!document"], function(a, b, c) {
            return {
                fromElements: function(e, d) {
                    var f = (d || c).createDocumentFragment();
                    a.each(e, function(a) {
                        f.appendChild(a.dom())
                    });
                    return b.fromDom(f)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.fussy.wwwc.WwwcModel", "ephox.fussy.api.SelectionRange ephox.fussy.wwwc.Directions ephox.fussy.wwwc.DomRange ephox.fussy.wwwc.Prefilter ephox.perhaps.Option ephox.sugar.api.Element ephox.sugar.api.Fragment".split(" "), function(a, b, c, e, d, f, g) {
            var h = function(a, b) {
                    var c = b.getRangeAt(0),
                        d = b.getRangeAt(b.rangeCount - 1),
                        e = a.document.createRange();
                    e.setStart(c.startContainer, c.startOffset);
                    e.setEnd(d.endContainer, d.endOffset);
                    return e
                },
                k = function(a, b) {
                    return void 0 !== b && null !== b && 0 < b.rangeCount ? d.from(h(a, b)) : d.none()
                };
            return {
                get: function(c, d) {
                    return k(c, d).map(function(c) {
                        var e = f.fromDom(c.startContainer),
                            g = f.fromDom(c.endContainer);
                        return b.read().isRtl(d) ? b.read().flip(d, c) : a.read(e, c.startOffset, g, c.endOffset)
                    })
                },
                set: function(a) {
                    return function(b, d) {
                        var f = e.preprocess(a),
                            f = c.build(b, f);
                        void 0 !== d && null !== d && (d.removeAllRanges(), f(d))
                    }
                },
                selectElementContents: function(a) {
                    return function(b,
                                    d) {
                        var e = c.create(b);
                        e.selectNodeContents(a.dom());
                        d.removeAllRanges();
                        d.addRange(e)
                    }
                },
                replace: function(a) {
                    return function(b, c) {
                        k(b, c).each(function(c) {
                            var d = g.fromElements(a, b.document);
                            c.deleteContents();
                            c.insertNode(d.dom())
                        })
                    }
                },
                replaceRange: function(a, b) {
                    return function(d, f) {
                        var h = e.preprocess(a),
                            h = c.toNative(d, h),
                            k = g.fromElements(b, d.document);
                        h.deleteContents();
                        h.insertNode(k.dom())
                    }
                },
                deleteRange: function(a, b, d, e) {
                    return function(f, g) {
                        c.toExactNative(f, a, b, d, e).deleteContents()
                    }
                },
                cloneFragment: function(a,
                                        b, d, e) {
                    return function(g, h) {
                        var k = c.toExactNative(g, a, b, d, e).cloneContents();
                        return f.fromDom(k)
                    }
                },
                rectangleAt: function(a, b, e, f) {
                    return function(g, h) {
                        var k = c.toExactNative(g, a, b, e, f),
                            m = k.getClientRects(),
                            k = 0 < m.length ? m[0] : k.getBoundingClientRect();
                        return 0 < k.width || 0 < k.height ? d.some(k) : d.none()
                    }
                },
                bounds: function(a) {
                    return function(b, e) {
                        var f = c.create(b);
                        f.selectNode(a.dom());
                        f = f.getBoundingClientRect();
                        return 0 < f.width || 0 < f.height ? d.some(f) : d.none()
                    }
                },
                clearSelection: function(a, b) {
                    a.getSelection().removeAllRanges()
                }
            }
        })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.fussy.api.WindowSelection", "ephox.fussy.api.SelectionRange ephox.fussy.api.Situ ephox.fussy.api.Supported ephox.fussy.search.Within ephox.fussy.wwwc.DomRange ephox.fussy.wwwc.WwwcModel ephox.sugar.api.Compare ephox.sugar.api.Element".split(" "), function(a, b, c, e, d, f, g, h) {
            var k = function(a, b) {
                    c.run(a, f.set(b))
                },
                l = function(a, b, c) {
                    return e.find(a, b, c)
                };
            return {
                get: function(a) {
                    return c.run(a, f.get)
                },
                set: k,
                setExact: function(c, d,
                                   e, f, g) {
                    d = a.write(b.on(d, e), b.on(f, g));
                    k(c, d)
                },
                selectElementContents: function(a, b) {
                    c.run(a, f.selectElementContents(b))
                },
                replace: function(a, b) {
                    c.run(a, f.replace(b))
                },
                replaceRange: function(a, b, d) {
                    c.run(a, f.replaceRange(b, d))
                },
                deleteRange: function(a, b, d, e, g) {
                    c.run(a, f.deleteRange(b, d, e, g))
                },
                isCollapsed: function(a, b, c, d) {
                    return g.eq(a, c) && b === d
                },
                cloneFragment: function(a, b, d, e, g) {
                    return c.run(a, f.cloneFragment(b, d, e, g))
                },
                rectangleAt: function(a, b, d, e, g) {
                    return c.run(a, f.rectangleAt(b, d, e, g))
                },
                bounds: function(a,
                                 b) {
                    return c.run(a, f.bounds(b))
                },
                findWithin: l,
                findWithinExact: function(c, d, e, f, g, h) {
                    d = a.write(b.on(d, e), b.on(f, g));
                    return l(c, d, h)
                },
                deriveExact: function(b, c) {
                    var e = d.forceRange(b, c);
                    return a.general(h.fromDom(e.startContainer), e.startOffset, h.fromDom(e.endContainer), e.endOffset)
                },
                clearAll: function(a) {
                    c.run(a, f.clearSelection)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sloth.data.Range", ["ephox.peanut.Fun", "ephox.sugar.api.Compare"],
            function(a, b) {
                return function(c, e, d, f) {
                    var g = b.eq(c, d) && e === f;
                    return {
                        startContainer: a.constant(c),
                        startOffset: a.constant(e),
                        endContainer: a.constant(d),
                        endOffset: a.constant(f),
                        collapsed: a.constant(g)
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sloth.api.BodySwitch", ["ephox.sloth.data.Range", "ephox.sugar.api.Element", "ephox.sugar.api.Insert", "ephox.sugar.api.Remove", "ephox.sugar.api.Traverse"], function(a, b, c, e, d) {
            return function(f) {
                var g =
                    b.fromTag("br");
                return {
                    cleanup: function() {
                        e.remove(g)
                    },
                    toOn: function(a, b) {
                        a.dom().focus()
                    },
                    toOff: function(b, e) {
                        var k;
                        k = d.owner(e).dom().defaultView;
                        k.focus();
                        c.append(e, g);
                        f.set(k, a(g, 0, g, 0))
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sloth.api.DivSwitch", ["ephox.peanut.Fun"], function(a) {
            return function() {
                return {
                    toOn: function(a, c) {
                        a.dom().focus()
                    },
                    toOff: function(a, c) {
                        c.dom().focus()
                    },
                    cleanup: a.identity
                }
            }
        })
    })(a.bolt.module.api.define,
        a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sloth.engine.Consolidator", "ephox.compass.Arr ephox.sugar.api.Element ephox.sugar.api.Insert ephox.sugar.api.InsertAll ephox.sugar.api.Remove ephox.sugar.api.Traverse".split(" "), function(a, b, c, e, d, f) {
            var g = function(g, k) {
                var l = f.children(g);
                a.each(l, function(a) {
                    if (k(a)) {
                        var g = f.children(a),
                            h = b.fromTag("div", f.owner(a).dom());
                        e.append(h, g);
                        c.before(a, h);
                        d.remove(a)
                    }
                })
            };
            return {
                consolidate: function(a, b) {
                    f.nextSibling(a).filter(b).each(function(b) {
                        var c =
                            f.children(b);
                        e.append(a, c);
                        d.remove(b)
                    });
                    g(a, b)
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sloth.engine.Offscreen", "ephox.epithet.Id ephox.scullion.Struct ephox.sloth.engine.Consolidator ephox.sugar.api.Attr ephox.sugar.api.Class ephox.sugar.api.Css ephox.sugar.api.Element ephox.sugar.api.Html ephox.sugar.api.Insert ephox.sugar.api.Remove ephox.sugar.api.SelectorFind ephox.sugar.api.Traverse".split(" "), function(a, b, c, e, d, f, g, h, k,
                                                                                                                                                                                                                                                                                                                                                        l, q, r) {
            var y = a.generate("ephox-sloth-bin");
            return function(a) {
                var n = g.fromTag("div");
                e.set(n, "contenteditable", "true");
                d.add(n, y);
                f.setAll(n, {
                    position: "absolute",
                    left: "0px",
                    top: "0px",
                    width: "1px",
                    height: "1px",
                    overflow: "hidden",
                    opacity: "0"
                });
                var u = function(a) {
                    return d.has(a, y)
                };
                return {
                    attach: function(a) {
                        l.empty(n);
                        k.append(a, n)
                    },
                    focus: function() {
                        q.ancestor(n, "body").each(function(b) {
                            a.toOff(b, n)
                        })
                    },
                    contents: function() {
                        c.consolidate(n, u);
                        var a = b.immutable("elements", "html", "container"),
                            d = r.children(n),
                            e = h.get(n);
                        return a(d, e, n)
                    },
                    container: function() {
                        return n
                    },
                    detach: function() {
                        l.remove(n)
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sloth.api.ProxyPaste", "ephox.peanut.Fun ephox.plumber.tap.function.BlockTap ephox.porkbun.Event ephox.porkbun.Events ephox.sloth.api.Paste ephox.sloth.engine.Offscreen ephox.sugar.api.Traverse".split(" "), function(a, b, c, e, d, f, g) {
            return function(h, k) {
                var l = f(h),
                    q = function() {
                        h.cleanup();
                        var a = l.contents();
                        l.detach();
                        y.trigger.after(a.elements(), a.html(), l.container())
                    },
                    r = b.tap(function() {
                        y.trigger.before();
                        l.attach(k);
                        l.focus();
                        d.run(g.owner(k), r, q)
                    }),
                    y = e.create({
                        before: c([]),
                        after: c(["elements", "html", "container"])
                    }),
                    t = a.noop;
                return {
                    instance: a.constant(function() {
                        r.instance()
                    }),
                    destroy: t,
                    events: y.registry
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.pastiche.Proxy", "ephox.fred.PlatformDetection ephox.fussy.api.WindowSelection ephox.porkbun.Event ephox.porkbun.Events ephox.sloth.api.BodySwitch ephox.sloth.api.DivSwitch ephox.sloth.api.ProxyPaste ephox.sugar.api.Node".split(" "),
            function(a, b, c, e, d, f, g, h) {
                var k = a.detect(),
                    l = {
                        set: function(a, c) {
                            b.setExact(a, c.startContainer(), c.startOffset(), c.endContainer(), c.endOffset())
                        }
                    },
                    q = function(a) {
                        return (k.browser.isIE() && "body" !== h.name(a) ? f : d)(l)
                    };
                return function(a) {
                    var b = e.create({
                            after: c(["container"])
                        }),
                        d = q(a),
                        f = g(d, a);
                    f.events.after.bind(function(c) {
                        d.toOn(a, c.container());
                        b.trigger.after(c.container())
                    });
                    return {
                        run: function() {
                            f.instance()()
                        },
                        events: b.registry
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.sugar.api.Ready", ["ephox.sugar.api.DomEvent", "ephox.sugar.api.Element", "global!document"], function(a, b, c) {
            return {
                execute: function(e) {
                    if ("complete" === c.readyState || "interactive" === c.readyState) e();
                    else var d = a.bind(b.fromDom(c), "DOMContentLoaded", function() {
                        e();
                        d.unbind()
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.keurig.loader.GWTLoader", "ephox.fred.PlatformDetection ephox.oilspill.callback.Globaliser ephox.peanut.Fun ephox.peanut.Thunk ephox.perhaps.Option ephox.photon.Writer ephox.sugar.api.Body ephox.sugar.api.Css ephox.sugar.api.DomEvent ephox.sugar.api.Element ephox.sugar.api.Insert ephox.sugar.api.Ready ephox.sugar.api.Remove".split(" "),
            function(a, b, c, e, d, f, g, h, k, l, q, r, y) {
                var t = b.install("ephox.keurig.init"),
                    v = d.none();
                a = a.detect();
                var u = a.browser;
                return {
                    load: u.isIE() || u.isSpartan() || a.deviceType.isiOS() || a.deviceType.isAndroid() ? c.noop : e.cached(function(a) {
                        var b = l.fromTag("div");
                        if (void 0 === a) throw "baseUrl was undefined";
                        var c = l.fromTag("iframe");
                        h.setAll(b, {
                            display: "none"
                        });
                        var e = k.bind(c, "load", function() {
                            var g = t.ephemeral(function(a) {
                                v = d.some(a);
                                u.isSafari() || y.remove(b)
                            });
                            f.write(c, '<script type="text/javascript" src="' + (a +
                                "/wordimport.js") + '">\x3c/script><script type="text/javascript">function gwtInited () {parent.window.' + g + "(com.ephox.keurig.WordCleaner.cleanDocument);};\x3c/script>");
                            e.unbind()
                        });
                        r.execute(function() {
                            q.append(g.body(), b);
                            q.append(b, c)
                        })
                    }),
                    cleanDocument: function(a, b) {
                        return v.map(function(c) {
                            return c(a, b)
                        })
                    },
                    ready: function() {
                        return v.isSome()
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.keurig.api.WordCleaner", ["ephox.keurig.loader.GWTLoader"],
            function(a) {
                return function(b) {
                    a.ready() || a.load(b);
                    return {
                        cleanDocument: a.cleanDocument
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.api.Cement", "ephox.cement.api.PasteBroker ephox.cement.api.PasteFlavors ephox.cement.flash.FlashDialog ephox.cement.pastiche.Proxy ephox.compass.Arr ephox.epithet.Id ephox.keurig.api.WordCleaner ephox.peanut.Fun ephox.perhaps.Option".split(" "), function(a, b, c, e, d, f, g, h, k) {
            return function(l, q, r, y) {
                var t =
                        g(y.baseUrl),
                    v = h.curry(c, q),
                    u = void 0 !== y.intraFlag ? y.intraFlag : {
                        clipboardType: f.generate("clipboard-type"),
                        findClipboardTags: k.none
                    },
                    t = d.flatten([void 0 !== y.intraFlag ? [b.internal(r, e, l, u)] : [],
                        [b.gwt(t, q, y, v)],
                        [b.image(y)]
                    ]);
                l = b.pastiche(q, y, r, e, l, v, u);
                return a(t, l)
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.cement.api.PaperMache", ["ephox.cement.api.PasteBroker", "ephox.cement.api.PasteFlavors"], function(a, b) {
            return function() {
                return a([b.text()],
                    b.none())
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.settings.Defaults", [], function() {
            return {
                officeStyles: "prompt",
                htmlStyles: "clean"
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.styles.Styles", "ephox.sugar.api.Attr ephox.sugar.api.Element ephox.sugar.api.Insert ephox.sugar.api.Remove ephox.sugar.api.SelectorExists ephox.sugar.api.SelectorFind global!document".split(" "),
            function(a, b, c, e, d, f, g) {
                return {
                    injectStyles: function(e) {
                        if (!d.any("#powerpaste-styles")) {
                            e = b.fromHtml("<style>.ephox-cement-flashbin-helpcopy-kbd {font-size: 3em !important; text-align: center !important; vertical-align: middle !important; margin: .5em 0} .ephox-cement-flashbin-helpcopy-kbd .ephox-polish-help-kbd {font-size: 3em !important; vertical-align: middle !important;} .ephox-cement-flashbin-helpcopy a {text-decoration: underline} .ephox-cement-flashbin-loading-spinner {background-image: url(" +
                                e + ") !important; width: 96px !important; height:96px !important; display: block; margin-left: auto !important; margin-right: auto !important; margin-top: 2em !important; margin-bottom: 2em !important;} .ephox-cement-flashbin-loading p {text-align: center !important; margin: 2em 0 !important} .ephox-cement-flashbin-target {height: 1px !important;} .ephox-cement-flashbin-target.ephox-cement-flash-activate {height: 150px !important; width: 100% !important;} .ephox-cement-flashbin-target object {height: 1px !important;} .ephox-cement-flashbin-target.ephox-cement-flash-activate object {height: 150px !important; width: 100% !important;} </style>");
                            a.set(e, "type", "text/css");
                            a.set(e, "id", "powerpaste-styles");
                            var g = f.first("head").getOrDie("Head element could not be found.");
                            c.append(g, e)
                        }
                    },
                    removeStyles: function() {
                        if (d.any("#powerpaste-styles")) {
                            var a = f.first("head").getOrDie("Head element could not be found."),
                                a = f.descendant(a, "#powerpaste-styles").getOrDie("The style element could not be removed");
                            e.remove(a)
                        }
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.tinymce.ModernTinyDialog",
            "ephox.porkbun.Event ephox.porkbun.Events ephox.powerpaste.util.NodeUtil ephox.sugar.api.Attr ephox.sugar.api.Element ephox.sugar.api.Insert ephox.sugar.api.Remove ephox.sugar.api.SelectorFind".split(" "),
            function(a, b, c, e, d, f, g, h) {
                return function(k) {
                    return {
                        createDialog: function() {
                            var l, q = "",
                                r = "",
                                y = [],
                                t = null,
                                v = b.create({
                                    close: a([])
                                }),
                                u = function(a) {
                                    v.trigger.close()
                                },
                                w = function() {
                                    l.off("close", u);
                                    l.close("close")
                                };
                            return {
                                events: v.registry,
                                setTitle: function(a) {
                                    q = a
                                },
                                setContent: function(a) {
                                    r = [{
                                        type: "container",
                                        html: c.nodeToString(a.dom())
                                    }];
                                    t = a
                                },
                                setButtons: function(a) {
                                    var b = [];
                                    a.forEach(function(a, c, d) {
                                        b.push({
                                            text: a.text,
                                            onclick: a.click
                                        })
                                    });
                                    y = b
                                },
                                show: function() {
                                    0 === y.length && (y = [{
                                        text: "Close",
                                        onclick: function() {
                                            l.close()
                                        }
                                    }]);
                                    l = k.windowManager.open({
                                        title: q,
                                        spacing: 10,
                                        padding: 10,
                                        items: r,
                                        buttons: y
                                    });
                                    var a = d.fromDom(l.getEl()),
                                        a = h.descendant(a, "." + e.get(t, "class")).getOrDie("We must find this element or we cannot continue");
                                    f.before(a, t);
                                    g.remove(a);
                                    l.on("close", u)
                                },
                                hide: function() {
                                    w()
                                },
                                destroy: function() {
                                    w()
                                },
                                reflow: function() {}
                            }
                        }
                    }
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.tinymce.ModernPowerPaste", "ephox.cement.api.Cement ephox.cement.api.PaperMache ephox.compass.Arr ephox.knoch.future.Future ephox.peanut.Fun ephox.powerpaste.i18n.I18n ephox.powerpaste.settings.Defaults ephox.powerpaste.styles.Styles ephox.powerpaste.tinymce.ErrorDialog ephox.powerpaste.tinymce.ModernTinyDialog ephox.powerpaste.util.NodeUtil ephox.sugar.api.DomEvent ephox.sugar.api.Element global!setTimeout global!tinymce".split(" "),
            function(a, b, c, e, d, f, g, h, k, l, q, r, y, t, v) {
                return function(u, w, x, z, A) {
                    var B, C, D, E, F;
                    F = (z ? z.jsUrl : x) + "/js";
                    C = (z ? z.swfUrl : x) + "/flash/textboxpaste.swf";
                    D = (z ? z.imgUrl : x) + "/img/spinner_96.gif";
                    E = (z ? z.cssUrl : x) + "/css/editorcss.css";
                    u.on("init", function(v) {
                        h.injectStyles(D);
                        u.dom.loadCSS(E);
                        v = {
                            baseUrl: F,
                            swf: C,
                            officeStyles: u.settings.powerpaste_word_import || g.officeStyles,
                            htmlStyles: u.settings.powerpaste_html_import || g.htmlStyles,
                            translations: f.translate,
                            allowLocalImages: !1 !== u.settings.powerpaste_allow_local_images,
                            enableFlashImport: !1 !== u.settings.powerpaste_enable_flash_import,
                            preprocessor: function(a) {
                                return e.pure(a)
                            }
                        };
                        var x = l(u),
                            z = y.fromDom(u.getBody()),
                            I = a(z, x.createDialog, d.noop, v),
                            L = b();
                        c.each([I, L], function(a) {
                            a.events.cancel.bind(function() {
                                B = null
                            });
                            a.events.error.bind(function(a) {
                                B = null;
                                u.notificationManager ? u.notificationManager.open({
                                    text: f.translate(a.message()),
                                    type: "error"
                                }) : k.showDialog(u, f.translate(a.message()))
                            });
                            a.events.insert.bind(function(a) {
                                var b = c.map(a.elements(), function(a) {
                                    return q.nodeToString(a.dom())
                                }).join("");
                                if (u.hasEventListeners("PastePostProcess")) {
                                    var d = u.dom.add(u.getBody(), "div", {
                                            style: "display:none"
                                        }, b),
                                        b = u.fire("PastePostProcess", {
                                            node: d
                                        }).node.innerHTML;
                                    u.dom.remove(d)
                                }
                                u.focus();
                                t(function() {
                                    u.selection.moveToBookmark(B);
                                    B = null;
                                    u.undoManager.transact(function() {
                                        u.insertContent(b, {
                                            merge: !1 !== u.settings.paste_merge_formats
                                        });
                                        q.restoreStyleAttrs(u.getBody());
                                        A.prepareImages(a.assets())
                                    });
                                    A.uploadImages(a.assets())
                                }, 1)
                            })
                        });
                        r.bind(z, "paste", function(a) {
                            B || (B = u.selection.getBookmark());
                            (w.isText() ?
                                L : I).paste(a.raw());
                            w.reset();
                            t(function() {
                                u.windowManager.windows[0] && u.windowManager.windows[0].getEl() && u.windowManager.windows[0].getEl().focus()
                            }, 1)
                        })
                    });
                    u.on("remove", function(a) {
                        1 === v.editors.length && h.removeStyles()
                    })
                }
            })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.tinymce.PasteMode", ["ephox.powerpaste.alien.Once", "ephox.scullion.Cell"], function(a, b) {
            return function(c) {
                var e = b(c.settings.paste_as_text),
                    d = b(!1);
                c.on("keydown",
                    function(a) {
                        tinymce.util.VK.metaKeyPressed(a) && 86 == a.keyCode && a.shiftKey && (d.set(!0), tinymce.Env.ie && 10 > tinymce.Env.ie && (a.preventDefault(), c.fire("paste", {})))
                    });
                var f = a(function() {
                    var a = c.translate("Paste is now in plain text mode. Contents will now be pasted as plain text until you toggle this option off.");
                    c.notificationManager.open({
                        text: a,
                        type: "info"
                    })
                });
                return {
                    toggle: function() {
                        var a = !e.get();
                        this.active(a);
                        e.set(a);
                        c.fire("PastePlainTextToggle", {
                            state: a
                        });
                        !0 === a && !1 != c.settings.paste_plaintext_inform &&
                        f();
                        c.focus()
                    },
                    reset: function() {
                        d.set(!1)
                    },
                    isText: function() {
                        return d.get() || e.get()
                    }
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.tinymce.TinyPowerPaste", "ephox.powerpaste.imageupload.UploaderFactory ephox.powerpaste.tinymce.LegacyPowerPaste ephox.powerpaste.tinymce.ModernPowerDrop ephox.powerpaste.tinymce.ModernPowerPaste ephox.powerpaste.tinymce.PasteMode global!tinymce".split(" "), function(a, b, c, e, d, f) {
            return function(g) {
                return function(h,
                                k) {
                    var l = d(h),
                        q = function() {
                            var b = a(h);
                            e(h, l, k, g, b);
                            h.settings.powerpaste_block_drop || c(h, k, g, b)
                        },
                        r = function() {
                            var a = this;
                            a.active(l.isText());
                            h.on("PastePlainTextToggle", function(b) {
                                a.active(b.state)
                            })
                        };
                    f.Env.ie && 10 > f.Env.ie ? b(h, l, g) : q();
                    var y = function(a) {
                        h.dom.bind(a, "drop dragstart dragend dragover dragenter dragleave dragdrop draggesture", function(a) {
                            return f.dom.Event.cancel(a)
                        })
                    };
                    if (h.settings.powerpaste_block_drop) h.on("init", function(a) {
                        y(h.getBody());
                        y(h.getDoc())
                    });
                    if (h.settings.paste_postprocess) h.on("PastePostProcess",
                        function(a) {
                            h.settings.paste_postprocess.call(this, this, a)
                        });
                    h.addButton("pastetext", {
                        icon: "pastetext",
                        tooltip: "Paste as text",
                        onclick: l.toggle,
                        onPostRender: r
                    });
                    h.addMenuItem("pastetext", {
                        text: "Paste as text",
                        selectable: !0,
                        onclick: l.toggle,
                        onPostRender: r
                    })
                }
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    (function(a, k, l) {
        a("ephox.powerpaste.PowerPastePlugin", ["ephox.powerpaste.tinymce.TinyPowerPaste", "global!tinymce"], function(a, b) {
            return function(c) {
                b.PluginManager.requireLangPack("powerpaste",
                    "ar,ca,cs,da,de,el,es,fa,fi,fr_FR,he_IL,hr,hu_HU,it,ja,kk,ko_KR,nb_NO,nl,pl,pt_BR,pt_PT,ro,ru,sk,sl_SI,sv_SE,th_TH,tr,uk,zh_CN,zh_TW");
                b.PluginManager.add("powerpaste", a(c))
            }
        })
    })(a.bolt.module.api.define, a.bolt.module.api.require, a.bolt.module.api.demand);
    F("ephox.powerpaste.PowerPastePlugin")();
    this.ephox && this.ephox.bolt && (this.ephox.bolt = I)
})();