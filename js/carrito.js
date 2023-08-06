// function actualizarCarrito(id_producto, cantidad) {
//   // Enviar solicitud AJAX al servidor para actualizar el carrito
//   let xhr = new XMLHttpRequest();
//   xhr.open("POST", "actualizar_carrito.php", true);
//   xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//   xhr.onreadystatechange = function () {
//     if (xhr.readyState == 4 && xhr.status == 200) {
//       // Actualizar la tabla del carrito con los nuevos datos
//       var tablaCarrito = document.getElementById("tabla-carrito");
//       tablaCarrito.innerHTML = xhr.responseText;
//     }
//   };
//   xhr.send("id_producto=" + id_producto + "&cantidad=" + cantidad);
// }
