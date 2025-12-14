// ========================
//   INICIALIZAR IndexedDB
// ========================

let db = null; // evita error "Cannot access 'db' before initialization"

const request = indexedDB.open("data", 1);

request.onupgradeneeded = function (e) {
    db = e.target.result;

    if (!db.objectStoreNames.contains("person")) {
        let store = db.createObjectStore("person", {
            keyPath: "id",
            autoIncrement: true
        });

        store.createIndex("p_nombres", "p_nombres", { unique: false });
        store.createIndex("p_apellidos", "p_apellidos", { unique: false });
    }
};

request.onsuccess = function (e) {
    db = e.target.result;
    console.log("Base de datos lista");
    mostrarPersona(); // mostrar datos cuando la BD ya está lista
};

request.onerror = function () {
    console.log("Error al abrir IndexedDB");
};


// ========================
//    FUNCIONES CRUD
// ========================

// Crear o actualizar
function guardarPersona(tipo) {
    if (!db) {
        alert("La base de datos aún no está lista. Espera un momento.");
        return;
    }

    let Idp = Number(document.getElementById("idp").value);
    let Nombres = document.getElementById("nombres").value;
    let Apellidos = document.getElementById("apellidos").value;

    let tx = db.transaction("person", "readwrite");
    let store = tx.objectStore("person");

    if (tipo == 0) {
        // Crear
        store.add({
            p_nombres: Nombres,
            p_apellidos: Apellidos
        });
    } else {
        // Editar
        store.put({
            id: Idp,
            p_nombres: Nombres,
            p_apellidos: Apellidos
        });
    }

    tx.oncomplete = function () {
        document.getElementById("formu").reset();
        mostrarPersona();
    };
}


// ========================
//   MOSTRAR REGISTROS
// ========================

function mostrarPersona() {
    if (!db) return;

    let tbody = document.getElementById("tbody");
    tbody.innerHTML = "";

    let tx = db.transaction("person", "readonly");
    let store = tx.objectStore("person");

    store.openCursor().onsuccess = function (e) {
        let cursor = e.target.result;

        if (cursor) {
            let row = cursor.value;

            tbody.innerHTML += `
                <tr>
                    <td>${row.id}</td>
                    <td>${row.p_nombres}</td>
                    <td>${row.p_apellidos}</td>
                    <td>
                        <button onclick="borrarPersona(${row.id})">Borrar</button>
                    </td>
                </tr>
            `;

            cursor.continue();
        }
    };
}


// ========================
//   BORRAR TODO
// ========================

function borrarTodo() {
    if (!db) return;

    let tx = db.transaction("person", "readwrite");
    tx.objectStore("person").clear();

    tx.oncomplete = mostrarPersona;
}


// ========================
//   BORRAR UNO
// ========================

function borrarPersona(id) {
    if (!db) return;

    let tx = db.transaction("person", "readwrite");
    tx.objectStore("person").delete(id);

    tx.oncomplete = mostrarPersona;
}


