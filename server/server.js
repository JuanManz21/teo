const express = require('express');
const bodyParser = require('body-parser');
const path = require('path');
const db = require('./database.js');
const bcrypt = require('bcrypt');
const jwt = require('jsonwebtoken');

const app = express();
const port = 3000;
const JWT_SECRET = 'your_jwt_secret';

app.use(bodyParser.json());
app.use(express.static(path.join(__dirname, 'public')));

// Registration route
app.post('/register', (req, res) => {
  const { username, password } = req.body;
  const saltRounds = 10;
  bcrypt.hash(password, saltRounds, (err, hash) => {
    if (err) {
      return res.status(500).send('Error hashing password');
    }
    db.run('INSERT INTO users (username, password) VALUES (?, ?)', [username, hash], (err) => {
      if (err) {
        return res.status(500).send('Error registering user');
      }
      res.sendStatus(200);
    });
  });
});

// Login route
app.post('/login', (req, res) => {
  const { username, password } = req.body;
  db.get('SELECT * FROM users WHERE username = ?', [username], (err, user) => {
    if (err || !user) {
      return res.status(401).send('User not found');
    }
    bcrypt.compare(password, user.password, (err, result) => {
      if (result) {
        const token = jwt.sign({ id: user.id, is_admin: user.is_admin }, JWT_SECRET, { expiresIn: '1h' });
        res.json({ token });
      } else {
        res.status(401).send('Incorrect password');
      }
    });
  });
});

// Products route
app.get('/products', (req, res) => {
  db.all('SELECT * FROM products', [], (err, rows) => {
    if (err) {
      res.status(500).send('Error fetching products');
    } else {
      res.json(rows);
    }
  });
});

// Middleware to verify token
const verifyToken = (req, res, next) => {
  const authHeader = req.headers['authorization'];
  const token = authHeader && authHeader.split(' ')[1];
  if (token == null) return res.sendStatus(401);

  jwt.verify(token, JWT_SECRET, (err, user) => {
    if (err) return res.sendStatus(403);
    req.user = user;
    next();
  });
};

// Checkout route
app.post('/checkout', verifyToken, (req, res) => {
  const { products } = req.body;
  const userId = req.user.id;

  db.run('INSERT INTO orders (user_id, products, status) VALUES (?, ?, ?)',
    [userId, JSON.stringify(products), 'pending'],
    (err) => {
      if (err) {
        return res.status(500).send('Error creating order');
      }
      res.sendStatus(200);
    }
  );
});

// Middleware to verify admin
const verifyAdmin = (req, res, next) => {
  if (!req.user.is_admin) {
    return res.sendStatus(403);
  }
  next();
};

// Admin routes
app.get('/admin/users', verifyToken, verifyAdmin, (req, res) => {
  db.all('SELECT id, username FROM users', [], (err, rows) => {
    if (err) {
      return res.status(500).send('Error fetching users');
    }
    res.json(rows);
  });
});

app.delete('/admin/users/:id', verifyToken, verifyAdmin, (req, res) => {
  db.run('DELETE FROM users WHERE id = ?', [req.params.id], (err) => {
    if (err) {
      return res.status(500).send('Error deleting user');
    }
    res.sendStatus(200);
  });
});

app.get('/admin/orders', verifyToken, verifyAdmin, (req, res) => {
  db.all('SELECT * FROM orders', [], (err, rows) => {
    if (err) {
      return res.status(500).send('Error fetching orders');
    }
    res.json(rows);
  });
});

app.put('/admin/orders/:id', verifyToken, verifyAdmin, (req, res) => {
  const { status } = req.body;
  db.run('UPDATE orders SET status = ? WHERE id = ?', [status, req.params.id], (err) => {
    if (err) {
      return res.status(500).send('Error updating order');
    }
    res.sendStatus(200);
  });
});

app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
