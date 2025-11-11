const sqlite3 = require('sqlite3').verbose();
const bcrypt = require('bcrypt');

const db = new sqlite3.Database('./natural_delying.db', (err) => {
  if (err) {
    console.error(err.message);
  }
  console.log('Connected to the natural_delying database.');
});

db.serialize(() => {
  // Create users table
  db.run(`CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT UNIQUE,
    password TEXT,
    is_admin BOOLEAN DEFAULT 0
  )`);

  // Create products table
  db.run(`CREATE TABLE IF NOT EXISTS products (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT,
    price REAL,
    image TEXT,
    category TEXT
  )`);

  // Create orders table
  db.run(`CREATE TABLE IF NOT EXISTS orders (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER,
    products TEXT,
    status TEXT,
    FOREIGN KEY(user_id) REFERENCES users(id)
  )`);

  // Seed admin user
  const saltRounds = 10;
  const adminPassword = 'admin';
  bcrypt.hash(adminPassword, saltRounds, (err, hash) => {
    if (err) {
      return console.error(err.message);
    }
    db.run('INSERT OR IGNORE INTO users (username, password, is_admin) VALUES (?, ?, ?)', ['admin', hash, 1]);
  });

  // Seed products
  const products = [
    { name: 'Jugo de Fresa', price: 5000, image: 'IMG_Jugos/jugo_fresa.jpg', category: 'jugo' },
    { name: 'Jugo de Guanábana', price: 5000, image: 'IMG_Jugos/jugo_guanabana.jpg', category: 'jugo' },
    { name: 'Jugo de Guayaba', price: 5000, image: 'IMG_Jugos/jugo_guayaba.jpg', category: 'jugo' },
    { name: 'Jugo de Mango', price: 5000, image: 'IMG_Jugos/jugo_mango.jpg', category: 'jugo' },
    { name: 'Jugo de Mora', price: 5000, image: 'IMG_Jugos/jugo_mora.jpg', category: 'jugo' },
    { name: 'Soda de Corozo', price: 6000, image: 'IMG_Jugos/soda_corozo.jpg', category: 'jugo' },
    { name: 'Soda de Limón', price: 6000, image: 'IMG_Jugos/soda_limon.png', category: 'jugo' },
    { name: 'Soda de Naranja', price: 6000, image: 'IMG_Jugos/soda_naranja.jpg', category: 'jugo' },
    { name: 'Soda de Uva', price: 6000, image: 'IMG_Jugos/soda_uva.png', category: 'jugo' },
    { name: 'Almendras', price: 10000, image: 'IMG_Frutos_Secos/almendras.jpg', category: 'fruto-seco' },
    { name: 'Nueces', price: 12000, image: 'IMG_Frutos_Secos/nueces.jpg', category: 'fruto-seco' },
  ];

  const stmt = db.prepare("INSERT OR IGNORE INTO products (name, price, image, category) VALUES (?, ?, ?, ?)");
  for (const product of products) {
    stmt.run(product.name, product.price, product.image, product.category);
  }
  stmt.finalize();
});

module.exports = db;
