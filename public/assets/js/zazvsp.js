var prev_id = 0,
	timouthsdiv = 0,
	hstimout = 3e3,
	signtext = {
		hsdone: "✔",
		hswarning: "❗",
		hserror: "✖",
		hsheart: "❤",
		hssad: "☹"
	};


function removehs(t, a, o, r) {
	clearTimeout(timouthsdiv), document.getElementById(a).className += " hsdivhide", prev_id = 0, makehs(t, o, r)
}
function makehs(t, a, o) {
	var r = document.createElement("div"),
		e = document.createElement("span");
	a && (e.className = a, e.innerHTML = signtext[a]), r.appendChild(e);
	var c = document.createElement("span");
	c.className = "hstext", c.innerHTML = o, r.appendChild(c), r.id = t, r.className = "hsdivinit", document.getElementsByTagName("body")[0].appendChild(r);
	var s = document.getElementById(t);
	s.className += " hsdivshow", prev_id = t, timouthsdiv = setTimeout(function() {
		s.className += " hsdivhide", prev_id = 0
	}, hstimout)
}
function hotsnackbar(t, a) {
	random_id = Math.random(), prev_id ? removehs(random_id, prev_id, t, a) : makehs(random_id, t, a)
}
function refreshcart() {
	$.ajax({
		url: "controller/carro/functions",
		data: {
			ppo: "count"
		},
		
		type: "post",
		success: function(t) {
			$("#cart-items-count").html(t)
		}
	}), $.ajax({
		url: "controller/carro/functions",
		data: {
			ppo: "gettotal"
		},
		
		type: "post",
		success: function(t) {
			$("#cart-items-total-price").html(t)
		}
	}), $.ajax({
		url: "controller/carro/functions",
		data: {
			ppo: "prodslist"
		},
		
		type: "post",
		success: function(t) {
			$("#cart_listproduct_list_widget").html(t)
		}
	})
}
function refreshcartp() {
	$.ajax({
		url: "../controller/carro/functions",
		data: {
			ppo: "count"
		},
		
		type: "post",
		success: function(t) {
			$("#cart-items-count").html(t)
		}
	}), $.ajax({
		url: "../controller/carro/functions",
		data: {
			ppo: "gettotal"
		},
		
		type: "post",
		success: function(t) {
			$("#cart-items-total-price").html(t)
		}
	}), $.ajax({
		url: "../controller/carro/functions",
		data: {
			ppo: "prodslistp"
		},
		
		type: "post",
		success: function(t) {
			$("#cart_listproduct_list_widget").html(t)
		}
	})
}
function addtocart(t, a) {
	$.ajax({
		url: "controller/carro/functions",
		data: {
			ppo: "add",
			id: t,
			cant: a
		},
		
		type: "post",
		success: function(t) {
			refreshcart(), hotsnackbar("hsdone", "Articulo agregado al carrito <a href='cart'>Ver carrito</a>")
		}
	})
}
function addtocartp(t, a) {
	$.ajax({
		url: "../controller/carro/functions",
		data: {
			ppo: "add",
			id: t,
			cant: a
		},
		
		type: "post",
		success: function(t) {
			refreshcartp(), hotsnackbar("hsdone", "Articulo agregado al carrito <a href='../cart'>Ver carrito</a>")
		}
	})
}
function addalltocart(t) {
	$.ajax({
		url: "controller/carro/functions",
		data: {
			ppo: "addall",
			id: t
		},
		
		type: "post",
		success: function(t) {
			refreshcart(), hotsnackbar("hsdone", "Articulos agregados al carrito <a href='cart'>Ver carrito</a>")
		}
	})
}
function addalltocartp(t) {
	$.ajax({
		url: "../controller/carro/functions",
		data: {
			ppo: "addall",
			id: t
		},
		
		type: "post",
		success: function(t) {
			refreshcartp(), hotsnackbar("hsdone", "Articulos agregados al carrito <a href='../cart'>Ver carrito</a>")
		}
	})
}
function remove(t) {
	$.ajax({
		url: "controller/carro/functions",
		data: {
			ppo: "remove",
			unique: t
		},
		
		type: "post",
		success: function(t) {
			refreshcart(), hotsnackbar("hserror", "Articulo eliminado del carrito <a href='cart'>Ver carrito</a>")
		}
	})
}
function removep(t) {
	$.ajax({
		url: "../controller/carro/functions",
		data: {
			ppo: "remove",
			unique: t
		},
		
		type: "post",
		success: function(t) {
			refreshcartp(), hotsnackbar("hserror", "Articulo eliminado del carrito <a href='../cart'>Ver carrito</a>")
		}
	})
}
function removefromcart(t) {
	$.ajax({
		url: "controller/carro/functions",
		data: {
			ppo: "remove",
			unique: t
		},
		
		type: "post",
		success: function(t) {
			window.location.href = "cart"
		}
	})
}
function wish(t) {
	$.ajax({
		url: "controller/carro/functions",
		data: {
			ppo: "wish",
			art: t
		},
		
		type: "post",
		success: function(t) {
			hotsnackbar("hsheart", "Art&iacute;culo agregado a tus lista de deseos <a href='wishlist'>Ver mi lista de deseos</a>")
		}
	})
}
function wishp(t) {
	$.ajax({
		url: "../controller/carro/functions",
		data: {
			ppo: "wish",
			art: t
		},
		
		type: "post",
		success: function(t) {
			hotsnackbar("hsheart", "Art&iacute;culo agregado a tus lista de deseos <a href='../wishlist'>Ver mi lista de deseos</a>")
		}
	})
}
function removefromwish(t) {
	$.ajax({
		url: "controller/carro/functions",
		data: {
			ppo: "removewish",
			unique: t
		},
		
		type: "post",
		success: function(t) {
			window.location.href = "wishlist"
		}
	})
}
function loadmarcas(t, a) {
	$.ajax({
		url: "controller/search/searchf",
		data: {
			ppo: "marcas",
			marcas: t,
			busq: a
		},
		
		type: "post",
		success: function(t) {
			$("#lstmrcs").html(t)
		}
	})
}
function loadcolors(t, a) {
	$.ajax({
		url: "controller/search/searchf",
		data: {
			ppo: "colores",
			colores: t,
			busq: a
		},
		
		type: "post",
		success: function(t) {
			$("#lstclrs").html(t)
		}
	})
}
function loadorden(t) {
	$.ajax({
		url: "controller/search/searchf",
		data: {
			ppo: "orden",
			busq: t
		},
		
		type: "post",
		success: function(t) {
			$("#lstorden").html(t)
		}
	})
}
function loadlimit(t) {
	$.ajax({
		url: "controller/search/searchf",
		data: {
			ppo: "limite",
			busq: t
		},
		
		type: "post",
		success: function(t) {
			$("#lstlimit").html(t)
		}
	})
}
function boletin(t) {
	$.ajax({
		url: "controller/boletin",
		data: {
			email: t
		},
		
		type: "post",
		success: function(t) {
			$("#email").val(""), simpleAlert(t)
		}
	})
}
function boletinp(t) {
	$.ajax({
		url: "../controller/boletin",
		data: {
			email: t
		},
		
		type: "post",
		success: function(t) {
			$("#email").val(""), alert(t)
		}
	})
}
function boletin2(t) {
	$.ajax({
		url: "controller/boletin",
		data: {
			email: t
		},
		
		type: "post",
		success: function(t) {
			alert(t), window.location.href = "info"
		}
	})
}
function quitarboletin(t) {
	$.ajax({
		url: "controller/quitarboletin",
		data: {
			email: t
		},
		
		type: "post",
		success: function(t) {
			window.location.href = "info"
		}
	})
}
function carga_ciudades(t) {
	$.ajax({
		url: "controller/cps/cps",
		data: {
			ppo: "ciudades",
			edo: t
		},
		
		type: "post",
		success: function(t) {
			alert(t), $("#lstciudad").html(t)
		}
	})
}